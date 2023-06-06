<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Sports;
use App\Models\Videos;

class SiteController extends Controller
{
    public function index()
    {
        $news = News::orderBy('id', 'desc')->paginate(5);
        $videos = Videos::all();
        $sports = Sports::orderBy('id', 'desc')->get();
        $categories = Category::orderBy('id', 'desc')->get();

        return view('site.index', [
            'news' => $news,
            'videos' => $videos,
            'sports' => $sports,
            'categories' => $categories
        ]);
    }

    public function view()
    {
        $news = News::orderBy('id', 'desc')->paginate(5);

        return view('site.view', [
            'news' => $news
        ]);
    }

    public function about()
    {
        return view('site.about');
    }
}
