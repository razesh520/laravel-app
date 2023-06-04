<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class MagzineController extends Controller
{
    public function index(Request $request)
    {
        $news = News::orderBy('id', 'desc')->paginate(null);

        return view('magzine.index', [
            'news' => $news
        ]);
    }

    public function view(News $news)
    {
        return view('magzine.view', compact('news'));
    }
}
