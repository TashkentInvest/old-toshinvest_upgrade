<?php

namespace App\Http\Controllers\Admin;

use App\Models\OpenData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class OpenDataController extends Controller
{
    public function index()
    {
        $query = OpenData::query();

        if (request('search')) {
            $search = request('search');
            $query->where(function($q) use ($search) {
                $q->where('title_uz', 'like', "%{$search}%")
                  ->orWhere('title_ru', 'like', "%{$search}%")
                  ->orWhere('title_en', 'like', "%{$search}%");
            });
        }

        if (request('status')) {
            $query->where('is_active', request('status') === 'active');
        }

        $openData = $query->orderBy('sort_order', 'asc')
                          ->orderBy('created_at', 'desc')
                          ->paginate(15)
                          ->withQueryString();

        return view('admin.open-data.index', compact('openData'));
    }

    public function create()
    {
        return view('admin.open-data.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_uz' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'description_uz' => 'nullable|string',
            'description_ru' => 'nullable|string',
            'description_en' => 'nullable|string',
            'file' => 'required|file|mimes:pdf,xlsx,xls,doc,docx,ppt,pptx,jpg,jpeg,png,gif,zip|max:50000',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean'
        ]);

        $filePath = null;
        $fileType = null;
        $fileSize = null;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('open-data', $filename, 'public');
            $fileType = strtoupper($file->getClientOriginalExtension());
            $fileSize = $file->getSize();
        }

        OpenData::create([
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'description_uz' => $request->description_uz,
            'description_ru' => $request->description_ru,
            'description_en' => $request->description_en,
            'file_path' => $filePath,
            'file_type' => $fileType,
            'file_size' => $fileSize,
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->is_active ? true : false
        ]);

        return redirect()->route('admin.open-data.index')
                       ->with('success', 'Open data created successfully');
    }

    public function show($id)
    {
        $openData = OpenData::findOrFail($id);
        return view('admin.open-data.show', compact('openData'));
    }

    public function edit($id)
    {
        $openData = OpenData::findOrFail($id);
        return view('admin.open-data.edit', compact('openData'));
    }

    public function update(Request $request, $id)
    {
        $openData = OpenData::findOrFail($id);

        $request->validate([
            'title_uz' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'description_uz' => 'nullable|string',
            'description_ru' => 'nullable|string',
            'description_en' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,xlsx,xls,doc,docx,ppt,pptx,jpg,jpeg,png,gif,zip|max:50000',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean'
        ]);

        if ($request->hasFile('file')) {
            if ($openData->file_path && Storage::disk('public')->exists($openData->file_path)) {
                Storage::disk('public')->delete($openData->file_path);
            }

            $file = $request->file('file');
            $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('open-data', $filename, 'public');
            $fileType = strtoupper($file->getClientOriginalExtension());
            $fileSize = $file->getSize();

            $openData->file_path = $filePath;
            $openData->file_type = $fileType;
            $openData->file_size = $fileSize;
        }

        $openData->update([
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'description_uz' => $request->description_uz,
            'description_ru' => $request->description_ru,
            'description_en' => $request->description_en,
            'sort_order' => $request->sort_order ?? $openData->sort_order,
            'is_active' => $request->is_active ? true : false
        ]);

        return redirect()->route('admin.open-data.index')
                       ->with('success', 'Open data updated successfully');
    }

    public function destroy($id)
    {
        $openData = OpenData::findOrFail($id);

        if ($openData->file_path && Storage::disk('public')->exists($openData->file_path)) {
            Storage::disk('public')->delete($openData->file_path);
        }

        $openData->delete();

        return redirect()->route('admin.open-data.index')
                       ->with('success', 'Open data deleted successfully');
    }

    public function removeFile($id)
    {
        $openData = OpenData::findOrFail($id);

        if ($openData->file_path && Storage::disk('public')->exists($openData->file_path)) {
            Storage::disk('public')->delete($openData->file_path);
            $openData->update([
                'file_path' => null,
                'file_type' => null,
                'file_size' => null
            ]);
        }

        return redirect()->back()->with('success', 'File removed successfully');
    }
}

