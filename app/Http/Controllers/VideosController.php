<?php

namespace App\Http\Controllers;

use App\Models\Videos;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    public function index()
    {
        return 'all Videos';
    } 

    public function show($id)
    {
        $videos = Videos::findOrFail($id);
        return view('videos.show', compact('videos'));
    }
}
