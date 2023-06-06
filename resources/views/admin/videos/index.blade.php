@extends('admin.layouts.default')

@section('title', 'Manage Video')

@section('content')

<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <h2>Manage Videos</h2>
            </div>
            <div class="col-md-12 mb-5">
                <div clas="col-md-6" style="float:left;">
                    <a class="btn btn-success" href="{{ route('videos.create') }}"> Create Videos</a>
                </div>
                <div class="col-md-6" style="float:right;">
                    <form action="{{ route('videos.index') }}" method="GET" role="search">
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
                    <th>Title</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th>Url</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $videos)
                <tr>
                    <td>{{ $videos->id }}</td>
                    <td>{{ $videos->title }}</td>
                    <td>{{ strip_tags($videos->content)}}</td>
                    <td><img src="/uploads/{{ $videos->image }}" width="100px"></td>
                    <td>{{ strip_tags($videos->url)}}</td>
                    <td>{{ $videos->created_at}}</td>
                    <td>{{ $videos->updated_at }}</td>
                    <td>
                        <form action="{{ route('videos.destroy',$videos->id) }}" method="Post">
                            <a class="btn btn-success" href="{{ route('videos.show',$videos->id) }}">View</a>
                            <a class="btn btn-primary" href="{{ route('videos.edit',$videos->id) }}">Edit</a>
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