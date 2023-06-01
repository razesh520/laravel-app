@extends('admin.layouts.default')

@section('title', 'Edit Post')

@section('content')
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Post</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('posts.index') }}" enctype="multipart/form-data">
                        Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('posts.update',$post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Post Name:</strong>
                        <input type="text" name="title" value="{{ $post->title }}" class="form-control" placeholder="Post title">
                        @error('title')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Post Content:</strong>
                        <input type="text" name="content" value="{{ $post->content }}" class="form-control" placeholder="Post Content">
                        @error('content')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
</div>

@stop