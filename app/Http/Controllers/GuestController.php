<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function home()
    {
        return view('app.page.home');
    }

    public function gov()
    {
        return view('app.page.gov');
    }
    public function demo()
    {
        return view('app.page.demo');
    }
    public function geo()
    {
        return view('app.page.geo');
    }
    public function news(Request $request)
    {
        if (!$request['query']) {
            $news = News::with('Category')->orderBy('created_at', 'desc')->paginate(6);
            return view('app.page.news', compact('news'));
        }
        $news = News::with('Category')->where('title', 'like', '%' . $request['query'] . '%')->paginate();
        return view('app.page.news', compact('news'));
    }

    public function content(News $news)
    {
        return view('app.page.content-news', compact('news'));
    }

    public function service()
    {
        return view('app.page.service');
    }
}
