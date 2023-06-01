<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Students;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Builder\Stub;

class NewsController extends Controller
{
    public function index(Request $request)
    {

        $news = News::where('title', 'LIKE', '%' . $request->search . '%')->orderBy('id', 'desc')->paginate(5);
        // $news = News::all(); 
        // $items = News::orderBy('id', 'desc')->paginate(5);

        return view('admin.news.index', [
            'items' => $news,

            'search_value' => $request->search
        ]);
    }

    public function create(Request $request)
    {
        $students = Students::all();


        return view('admin.news.create', [
            'students' => $students,
        ]);
    }

    public function store(Request $request)
    {
        print_r($request->post('students_id'));


        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'category' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move(public_path($destinationPath), $profileImage);
            $input['image'] = "$profileImage";
        }



        $input = [
            'students_id' => $request->post('students_id'),
            'title' => $request->post('title'),
            'slug' => $request->post('slug'),
            'category' => $request->post('category'),
            'content' => $request->post('content'),
            'image' => $profileImage,
            'created_by' => $request->user()->id,
            'updated_by' => $request->user()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        News::create($input);

        return redirect()->route('news.index')->with('success', 'News has been created successfully.');
    }


    public function show(News $news)
    {
        return view('admin.news.show', compact('news'));
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', [
            'news' => $news
        ]);
    }


    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'category' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $destinationPath = 'images/';
            if ($news->image != ''  && $news->image != null) {
                $image_old = public_path($destinationPath) . $news->image;
                if (file_exists($image_old)) {
                    unlink($image_old);
                }
            }

            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move(public_path($destinationPath), $profileImage);
            $input['image'] = "$profileImage";
        }

        $news->fill($input)->save();

        return redirect()->route('news.index')->with('success', 'News Has Been updated successfully');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index')->with('success', 'News has been deleted successfully');
    }
}
