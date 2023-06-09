<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;

class CategoriesController extends Controller
{
    public function index()
    {
        return 'all Categories';
    } 

    public function show($slug)
    {
        $category = Category::where('slug', $slug)->first();

        $news = News::orderBy('id', 'desc')->where('category_id', $category->id)->get();
        return view('categories.show', [
            'category' => $category,
            'news' => $news,
        ]);
    }
}
