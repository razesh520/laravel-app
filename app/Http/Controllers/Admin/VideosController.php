<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Videos;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    
    public function index(Request $request)
    {
        $videos = Videos::where('title', 'LIKE', '%' . $request->search . '%')->orderBy('id', 'desc')->paginate(5);
       

        return view('admin.videos.index', [
            'items' => $videos,

            'search_value' => $request->search
        ]);
    }

    public function create(Request $request)
    {
        $videos = Videos::all();


        return view('admin.videos.create', [
            'videos' => $videos
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10024',
            'url' => 'required',
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
            'image' => $profileImage,
            'url' => $request->post('url'),
            'created_by' => $request->user()->id,
            'updated_by' => $request->user()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        Videos::create($input);

        return redirect()->route('videos.index')->with('success', 'Videos has been created successfully.');
    }

    public function show(Videos $video)
    {
        return view('admin.videos.show', compact('video'));
    }

    public function edit(Videos $video)
    {
        return view('admin.videos.edit', [
            'video' => $video
        ]);
    }


    public function update(Request $request, Videos $video)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10024',
            'url' => 'required',
        ]);

        $input = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $destinationPath = 'uploads/';
            if ($video->image != ''  && $video->image != null) {
                $image_old = public_path($destinationPath) . $video->image;
                if (file_exists($image_old)) {
                    unlink($image_old);
                }
            }

            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move(public_path($destinationPath), $profileImage);
            $input['image'] = "$profileImage";
        }

        $video->fill($input)->save();

        return redirect()->route('videos.index')->with('success', 'Videos Has Been updated successfully');
    }

    public function destroy(Videos $video)
    {
        $video->delete();
        return redirect()->route('videos.index')->with('success', 'Videos has been deleted successfully');
    }
}
