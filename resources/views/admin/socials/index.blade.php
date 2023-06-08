@extends('admin.layouts.default')

@section('title', 'Manage Socials')

@section('content')

<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <h2>Manage Socials</h2>
            </div>
            <div class="col-md-12 mb-5">
                <div clas="col-md-6" style="float:left;">
                    <a class="btn btn-success" href="{{ route('socials.create') }}"> Create Socials</a>
                </div>
                <div class="col-md-6" style="float:right;">
                    <form action="{{ route('socials.index') }}" method="GET" role="search">
                        <input type="search" class="form-control" placeholder="Find socials here" value="{{$search_value}}" name="search" id="search">
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
                    <th>Content</th>
                    <th>Facebook Link</th>
                    <th>Youtube Link</th>
                    <th>Twitter Link</th>
                    <th>Status</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($socials as $social)
                <tr>
                    <td>{{ $social->id }}</td>
                    <td>{{strip_tags($social->content )}}</td>
                    <td>{{ $social->facebook_link }}</td>
                    <td>{{ $social->youtube_link }}</td>
                    <td>{{ $social->twitter_link }}</td>
                    <td>{{ $social->status == 'active' ? 'Active' : 'Inctive' }}</td>
                    <td>
                        <form action="{{ route('socials.destroy',$social->id) }}" method="Post">
                            <a class="btn btn-success" href="{{ route('socials.show',$social->id) }}">View</a>
                            <a class="btn btn-primary" href="{{ route('socials.edit',$social->id) }}">Edit</a>
                       
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