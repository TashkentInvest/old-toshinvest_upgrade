<?php

// Controller: app/Http/Controllers/Admin/NewsController.php
namespace App\Http\Controllers\Admin;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $query = News::query();

        // Handle search
        if (request('search')) {
            $search = request('search');
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        // Handle status filter
        if (request('status')) {
            switch (request('status')) {
                case 'published':
                    $query->where('published_at', '<=', now())
                          ->whereNotNull('published_at');
                    break;
                case 'draft':
                    $query->where(function($q) {
                        $q->whereNull('published_at')
                          ->orWhere('published_at', '>', now());
                    });
                    break;
                case 'scheduled':
                    $query->where('published_at', '>', now());
                    break;
            }
        }

        // Handle sorting
        switch (request('sort', 'newest')) {
            case 'oldest':
                $query->orderBy('published_at', 'asc');
                break;
            case 'title':
                $query->orderBy('title', 'asc');
                break;
            default:
                $query->orderBy('published_at', 'desc');
                break;
        }

        $news = $query->paginate(10)->withQueryString();

        // Get statistics
        $totalNews = News::count();
        $publishedNews = News::where('published_at', '<=', now())
                            ->whereNotNull('published_at')
                            ->count();
        $draftNews = News::whereNull('published_at')
                        ->orWhere('published_at', '>', now())
                        ->count();

        return view('admin.news.index', compact('news', 'totalNews', 'publishedNews', 'draftNews'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|url|max:1000',
            'image_files' => 'nullable|array',
            'image_files.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120', // 5MB max per image
            'link' => 'nullable|url|max:1000',
            'published_at' => 'nullable|date',
        ]);

        // Handle image upload
        $imageUrl = $request->image; // URL from input

        // If files are uploaded, process them
        if ($request->hasFile('image_files')) {
            $uploadedImages = [];

            foreach ($request->file('image_files') as $file) {
                $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('news/images', $filename, 'public');
                $uploadedImages[] = Storage::url($path);
            }

            // If we have uploaded images, use them instead of URL
            // For multiple images, we'll store them as JSON in the image field
            if (count($uploadedImages) === 1) {
                $imageUrl = $uploadedImages[0];
            } else if (count($uploadedImages) > 1) {
                $imageUrl = json_encode($uploadedImages);
            }
        }

        $news = News::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imageUrl,
            'link' => $request->link,
            'published_at' => $request->published_at ?? now(),
        ]);

        return redirect()->route('admin.news.index')->with('success', 'Новость успешно создана!');
    }

    public function show(News $news)
    {
        return view('admin.news.show', compact('news'));
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|url|max:1000',
            'image_files' => 'nullable|array',
            'image_files.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'link' => 'nullable|url|max:1000',
            'published_at' => 'nullable|date',
            'keep_existing_images' => 'nullable|boolean',
        ]);

        $imageUrl = $request->image;

        // Handle new file uploads
        if ($request->hasFile('image_files')) {
            $uploadedImages = [];

            foreach ($request->file('image_files') as $file) {
                $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('news/images', $filename, 'public');
                $uploadedImages[] = Storage::url($path);
            }

            // If keeping existing images and we have them
            if ($request->keep_existing_images && $news->image) {
                $existingImages = $news->getImageArray();
                $allImages = array_merge($existingImages, $uploadedImages);

                if (count($allImages) === 1) {
                    $imageUrl = $allImages[0];
                } else {
                    $imageUrl = json_encode($allImages);
                }
            } else {
                // Replace existing images
                if (count($uploadedImages) === 1) {
                    $imageUrl = $uploadedImages[0];
                } else if (count($uploadedImages) > 1) {
                    $imageUrl = json_encode($uploadedImages);
                }

                // Clean up old uploaded files
                $this->cleanupOldImages($news);
            }
        } else if (!$request->keep_existing_images && !$request->image) {
            // If not keeping existing and no new URL provided, clean up
            $this->cleanupOldImages($news);
            $imageUrl = null;
        }

        $news->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imageUrl,
            'link' => $request->link,
            'published_at' => $request->published_at,
        ]);

        return redirect()->route('admin.news.index')->with('success', 'Новость успешно обновлена!');
    }

    public function destroy(News $news)
    {
        // Clean up associated images
        $this->cleanupOldImages($news);

        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'Новость успешно удалена!');
    }

    /**
     * Remove a specific image from news
     */
    public function removeImage(Request $request, News $news)
    {
        $imageToRemove = $request->input('image_url');
        $images = $news->getImageArray();

        // Remove the specific image from array
        $updatedImages = array_filter($images, function($img) use ($imageToRemove) {
            return $img !== $imageToRemove;
        });

        // Delete file if it's an uploaded file
        if (Str::startsWith($imageToRemove, '/storage/')) {
            $filePath = str_replace('/storage/', '', $imageToRemove);
            Storage::disk('public')->delete($filePath);
        }

        // Update the news record
        if (empty($updatedImages)) {
            $news->update(['image' => null]);
        } else if (count($updatedImages) === 1) {
            $news->update(['image' => reset($updatedImages)]);
        } else {
            $news->update(['image' => json_encode(array_values($updatedImages))]);
        }

        return response()->json(['success' => true]);
    }

    /**
     * Clean up old uploaded image files
     */
    private function cleanupOldImages(News $news)
    {
        if (!$news->image) return;

        $images = $news->getImageArray();

        foreach ($images as $image) {
            // Only delete uploaded files (those starting with /storage/)
            if (Str::startsWith($image, '/storage/')) {
                $filePath = str_replace('/storage/', '', $image);
                Storage::disk('public')->delete($filePath);
            }
        }
    }
}
