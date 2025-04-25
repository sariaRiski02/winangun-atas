<?php

namespace App\Http\Controllers;

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
    public function news()
    {
        return view('app.page.news');
    }
    public function service()
    {
        return view('app.page.service');
    }
}
