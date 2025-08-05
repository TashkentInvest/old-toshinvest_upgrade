<?php

// 1. Controller: app/Http/Controllers/Admin/NewsController.php
namespace App\Http\Controllers\Admin;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('published_at', 'desc')->paginate(10);
        return view('admin.news.index', compact('news'));
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
            'link' => 'nullable|url|max:1000',
            'published_at' => 'nullable|date',
        ]);

        $news = News::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->image,
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
            'link' => 'nullable|url|max:1000',
            'published_at' => 'nullable|date',
        ]);

        $news->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->image,
            'link' => $request->link,
            'published_at' => $request->published_at,
        ]);

        return redirect()->route('admin.news.index')->with('success', 'Новость успешно обновлена!');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'Новость успешно удалена!');
    }
}
