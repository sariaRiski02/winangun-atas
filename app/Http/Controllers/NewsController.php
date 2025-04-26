<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $news = News::with('Category')->get();
        return view('app.dashboard.news-dash', compact('categories', 'news'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3072',
            'category' => 'required|integer|exists:categories,id'
        ]);


        $data = $request->all();

        $category = Category::findOrFail($data['category']);
        $result = $category->news()->create([
            'title' => $data['title'],
            'author' => $data['author'],
            'content' => $data['content'],
            'image' => $request->file('image') ? $request->file('image')->store('images', 'public') : 'default.png',
        ]);

        if (!$result) {
            return redirect()->route('dash.news')->with('error', 'Perubahan Gagal Diterapkan. Coba Lagi!');
        }
        return redirect()->route('dash.news')->with('success', 'Perubahan berhasil Diterapkan');
    }
}
