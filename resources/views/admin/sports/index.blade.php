@extends('admin.layouts.default')

@section('title', 'Manage Sports')

@section('content')

<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <h2>Manage Sports</h2>
            </div>
            <div class="col-md-12 mb-5">
                <div clas="col-md-6" style="float:left;">
                    <a class="btn btn-success" href="{{ route('sports.create') }}"> Create Sports</a>
                </div>
                <div class="col-md-6" style="float:right;">
                    <form action="{{ route('sports.index') }}" method="GET" role="search">
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
                    <th>Slug</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $sports)
                <tr>
                    <td>{{ $sports->id }}</td>
                    <td>{{ $sports->title }}</td>
                    <td>{{ $sports->slug }}</td>
                    <td>{{ strip_tags($sports->content)}}</td>
                    <td><img src="/uploads/{{ $sports->image }}" width="100px"></td>
                    <td>{{ $sports->created_at}}</td>
                    <td>{{ $sports->updated_at }}</td>
                    <td>
                        <form action="{{ route('sports.destroy',$sports->id) }}" method="Post">
                            <a class="btn btn-success" href="{{ route('sports.show',$sports->id) }}">View</a>
                            <a class="btn btn-primary" href="{{ route('sports.edit',$sports->id) }}">Edit</a>
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