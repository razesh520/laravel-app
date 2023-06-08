<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Socials;
use Illuminate\Http\Request;

class SocialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $socials =Socials::where('content', 'LIKE', '%' . $request->search . '%')->orderBy('id', 'desc')->paginate(5);

        return view('admin.socials.index', [
            'socials' => $socials,
            'search_value' => $request->search
        ]);
    }
      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.socials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'facebook_link' => 'required',
            'youtube_link' => 'required',
            'twitter_link' => 'required',
            'status' => 'required'
        ]);

        Socials::create($request->post());

        return redirect()->route('socials.index')->with('success', 'Socials has been created successfully.');
    }
    public function show(Socials $social)
    {
        return view('admin.socials.show', compact('social'));
    }
    public function edit(Socials $social)
    {
        return view('admin.socials.edit',[
            'social' => $social
        ]);
    }
    public function update(Request $request, Socials $social)
    {
    

        $request->validate([
            'content' => 'required',
            'facebook_link' => 'required',
            'youtube_link' => 'required',
            'twitter_link' => 'required',
            'status' => 'required'
        ]);

        
        $social->fill($request->post())->save();

        return redirect()->route('socials.index')->with('success', 'Socials Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Socials  $social
     * @return \Illuminate\Http\Response
     */
    public function destroy(Socials $social)
    {
        $social->delete();
        return redirect()->route('socials.index')->with('success', 'Socials has been deleted successfully');
    }
}
