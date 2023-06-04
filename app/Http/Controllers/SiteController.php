<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $news = News::orderBy('id', 'desc')->paginate(5);

        return view('site.index', [
            'news' => $news
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
