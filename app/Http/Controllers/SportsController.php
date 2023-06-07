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

    public function show($id)
    {
        $sports = Sports::findOrFail($id);
        return view('sports.show', compact('sports'));
    }
}
