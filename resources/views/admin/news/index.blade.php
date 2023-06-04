@extends('admin.layouts.default')

@section('title', 'Manage News')

@section('content')

<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <h2>Manage News</h2>
            </div>
            <div class="col-md-12 mb-5">
                <div clas="col-md-6" style="float:left;">
                    <a class="btn btn-success" href="{{ route('news.create') }}"> Create News</a>
                </div>
                <div class="col-md-6" style="float:right;">
                    <form action="{{ route('news.index') }}" method="GET" role="search">
                        <input type="search" class="form-control" placeholder="Find user here" value="{{$search_value}}" name="search" id="search">
                    </form>
                </div>
            </div>
        </div>


        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Student_ID</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Category</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th>Created_at</th>
                    <th>Created_by</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $news)
                <tr>
                    <td>{{ $news->id }}</td>
                    <td>{{$news->category_id}}</td>
                    <td>{{ $news->title }}</td>
                    <td>{{ $news->slug }}</td>
                    <td>{{ $news->category }}</td>
                    <td>{{ $news->content}}</td>
                    <td><img src="/images/{{ $news->image }}" width="100px"></td>
                    <td>{{ $news->created_at}}</td>
                    <td>{{ $news->created_by }}</td>
                    <td>
                        <form action="{{ route('news.destroy',$news->id) }}" method="Post">
                            <a class="btn btn-success" href="{{ route('news.show',$news->id) }}">View</a>
                            <a class="btn btn-primary" href="{{ route('news.edit',$news->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                            
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {!! $items->links() !!}

    </div>
</div>




@stop