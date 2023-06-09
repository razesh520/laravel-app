<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return 'all News';
    }

    public function show($slug)
    {

        $news = News::where('slug', $slug)->first();
        return view('news.show', compact('news'));
    }
}
