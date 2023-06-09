@extends('admin.layouts.default')

@section('title', 'Manage Category')

@section('content')

<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <h2>Manage Category</h2>
            </div>
            <div class="col-md-12 mb-5">
                <div clas="col-md-6" style="float:left;">
                    <a class="btn btn-success" href="{{ route('categories.create') }}"> Create Category</a>
                </div>
                <div class="col-md-6" style="float:right;">
                    <form action="{{ route('categories.index') }}" method="GET" role="search">
                        @csrf
                        <input type="search" class="form-control" placeholder="Find category here" value="{{$search_value}}" name="search" id="search">
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
                    <th>ID</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Content</th>
                    <th>Url</th>
                    <th>Image</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>{{ $category->content }}</td>
                    <td>{{ $category->url }}</td>
                    <td><img src="/uploads/{{ $category->image }}" width="100px"></td>
                    <td>
                        <form action="{{ route('categories.destroy',$category->id) }}" method="Post">
                            <a class="btn btn-success" href="{{ route('categories.show',$category->id) }}">View</a>
                            <a class="btn btn-primary" href="{{ route('categories.edit',$category->id) }}">Edit</a>

                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


    </div>
</div>
@stop