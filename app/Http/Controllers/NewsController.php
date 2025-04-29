<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = News::query();

        // Kalau ada pencarian
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Kalau ada kategori
        if ($request->filled('category') && $request->category != 'all') {
            $query->where('category_id', $request->category);
        }

        $news = $query->orderBy('created_at', 'desc')->paginate(10);

        $categories = Category::all();

        return view('app.dashboard.news-dash', compact('news', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3072', // 3MB
            'category' => 'required|integer|exists:categories,id'
        ]);

        $data = $request->all();

        $imagePath = 'default.png'; // Default gambar kalau tidak upload apa-apa

        // Kalau ada upload gambar
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . '.' . $file->extension(); // Bikin nama unik
            $file->move(public_path('images'), $filename); // Pindahkan ke public/images
            $imagePath = 'images/' . $filename; // Simpan pathnya
        }

        $category = Category::findOrFail($data['category']);
        $result = $category->news()->create([
            'title' => $data['title'],
            'author' => $data['author'],
            'content' => $data['content'],
            'image' => $imagePath, // Path gambar disimpan
        ]);

        if (!$result) {
            return redirect()->route('dash.news')->with('error', 'Perubahan Gagal Diterapkan. Coba Lagi!');
        }

        return redirect()->route('dash.news')->with('success', 'Perubahan berhasil Diterapkan');
    }



    // NewsController.php

    public function edit($id)
    {
        $news = News::findOrFail($id);
        $categories = Category::all(); // Kalau mau ubah kategori juga
        return view('app.dashboard.update-news', compact('news', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3072', // Tambahkan validasi image
        ]);

        $news = News::findOrFail($id);

        $data = [
            'title' => $request->title,
            'author' => $request->author,
            'category_id' => $request->category_id,
        ];

        // Kalau user upload gambar baru
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->extension(); // Bikin nama unik
            $file->move(public_path('images'), $filename);

            $data['image'] = 'images/' . $filename;
        } else {
            // Kalau tidak upload gambar baru, gunakan gambar lama
            $data['image'] = $news->image;
        }

        $news->update($data);

        return redirect()->route('dash.news')->with('success', 'Berita berhasil diperbarui.');
    }

    public function delete(Request $request, $id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        return redirect()->route('dash.news')->with('success', 'Berita berhasil dihapus.');
    }
}
