@extends('admin.layouts.default')

@section('title', 'Manage Menu')

@section('content')

<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <h2>Manage Menu</h2>
            </div>
            <div class="col-md-12 mb-5">
                <div clas="col-md-6" style="float:left;">
                    <a class="btn btn-success" href="{{ route('menus.create') }}"> Create Menu</a>
                </div>
                <div class="col-md-6" style="float:right;">
                    <form action="{{ route('menus.index') }}" method="GET" role="search">
                        <input type="search" class="form-control" placeholder="Find menu here" value="{{$search_value}}" name="search" id="search">
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
                    <th>Position</th>
                    <th>Url</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menus as $menu)
                <tr>
                    <td>{{ $menu->id }}</td>
                    <td>{{ $menu->title }}</td>
                    <td>{{ $menu->position }}</td>
                    <td>{{ $menu->url }}</td>
                    <td>{{ $menu->type }}</td>
                    <td>{{ $menu->status == 'active' ? 'Active' : 'Inctive' }}</td>
                    <td>
                        <form action="{{ route('menus.destroy',$menu->id) }}" method="Post">
                            <a class="btn btn-success" href="{{ route('menus.show',$menu->id) }}">View</a>
                            <a class="btn btn-primary" href="{{ route('menus.edit',$menu->id) }}">Edit</a>
                       
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