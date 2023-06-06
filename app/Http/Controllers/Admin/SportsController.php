<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sports;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SportsController extends Controller
{
    public function index(Request $request)
    {
        $sports = Sports::where('title', 'LIKE', '%' . $request->search . '%')->orderBy('id', 'desc')->paginate(5);


        return view('admin.sports.index', [
            'items' => $sports,

            'search_value' => $request->search
        ]);
    }
    public function create(Request $request)
    {
        $sports = Sports::all();


        return view('admin.sports.create', [
            'sports' => $sports
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10024'
           
        ]);

        $input = $request->all();
        // $profileImage='';
        if ($image = $request->file('image')) {
            $destinationPath = 'uploads';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move(public_path($destinationPath), $profileImage);
            $input['image'] = "$profileImage";
        }

        $input = [
            'title' => $request->post('title'),
            'content' => $request->post('content'),
            'image' => $profileImage,
            'created_by' => $request->user()->id,
            'updated_by' => $request->user()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        Sports::create($input);

        return redirect()->route('sports.index')->with('success', 'Sports has been created successfully.');
    }
    public function show(Sports $sport)
    {
        return view('admin.sports.show', compact('sport'));
    }

    public function edit(Sports $sport)
    {
        return view('admin.sports.edit', [
            'sport' => $sport
        ]);
    }

    public function update(Request $request, Sports $sport)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10024'
        ]);

        $input = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $destinationPath = 'uploads/';
            if ($sport->image != ''  && $sport->image != null) {
                $image_old = public_path($destinationPath) . $sport->image;
                if (file_exists($image_old)) {
                    unlink($image_old);
                }
            }

            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move(public_path($destinationPath), $profileImage);
            $input['image'] = "$profileImage";
        }

        $sport->fill($input)->save();

        return redirect()->route('sports.index')->with('success', 'Sports Has Been updated successfully');
    } 
    public function destroy(Sports $sport)
    {
        $sport->delete();
        return redirect()->route('sports.index')->with('success', 'Sports has been deleted successfully');
    }

}
