<?php

namespace App\Http\Controllers;

use App\Models\Sports;
use Illuminate\Http\Request;

class SportsController extends Controller
{
    public function index()
    {
        return 'all Sports';
    }

    public function show($slug)
    {
        $sports = Sports::where('slug', $slug)->first();
        return view('sports.show', compact('sports'));
    }
}
