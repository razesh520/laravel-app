<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::where('title', 'LIKE', '%' . $request->search . '%')->orderBy('id', 'desc')->paginate(5);

        return view('admin.categories.index', [
            'categories' => $categories,
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
        return view('admin.categories.create');
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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'uploads';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move(public_path($destinationPath), $profileImage);
            $input['image'] = "$profileImage";
        }

        $input = [
            
            'title' => $request->post('title'),
            'content' => $request->post('content'),
            'url' => $request->post('url'),
            'image' => $profileImage,
            'created_by' => $request->user()->id,
            'updated_by' => $request->user()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        Category::create($input);

        return redirect()->route('categories.index')->with('success', 'categories has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit',[
            'category' => $category
        ]);
    }

    public function update(Request $request, Category $category)
    {
    

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'url' => 'required|url',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        
        $input = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $destinationPath = 'uploads/';
            if ($category->image != ''  && $category->image != null) {
                $image_old = public_path($destinationPath) . $category->image;
                if (file_exists($image_old)) {
                    unlink($image_old);
                }
            }

            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move(public_path($destinationPath), $profileImage);
            $input['image'] = "$profileImage";
        }

        $category->fill($input)->save();
        return redirect()->route('categories.index')->with('success', 'Category Has Been updated successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category has been deleted successfully');
    }
}
