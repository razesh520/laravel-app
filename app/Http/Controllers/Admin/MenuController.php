<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $menus = Menu::where('title', 'LIKE', '%' . $request->search . '%')->orderBy('id', 'desc')->paginate(5);

        return view('admin.menus.index', [
            'menus' => $menus,
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
        return view('admin.menus.create');
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
            'title' => 'required',
            'content' => 'required',
            'url' => 'required|url',
            'status' => 'required'
        ]);

        Menu::create($request->post());

        return redirect()->route('menus.index')->with('success', 'Menu has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        return view('admin.menus.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('admin.menus.edit',[
            'menu' => $menu
        ]);
    }

    public function update(Request $request, Menu $menu)
    {
    

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'url' => 'required|url',
            'status' => 'required',
        ]);

        
        $menu->fill($request->post())->save();

        return redirect()->route('menus.index')->with('success', 'Menu Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'Menu has been deleted successfully');
    }
}
