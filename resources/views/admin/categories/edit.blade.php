@extends('admin.layouts.default')

@section('title', 'Edit Categories')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Edit Categories</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('categories.index') }}"> Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('categories.update', $category->id) }} " method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Title:</strong>
                        <input type="text" name="title" value="{{ $category->title }}" class="form-control" placeholder="Categories Title">
                        @error('title')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Content:</strong>
                        <input type="text" name="content" value="{{ $category->content }}" class="form-control" placeholder="Categories content">
                        @error('content')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Url:</strong>
                        <input type="text" name="url" value="{{ $category->url }}" class="form-control" placeholder="Categories content">
                        @error('url')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Image:</strong>
                        <input type="file" name="image" value="{{ $category->image }}" class="form-control" placeholder="Categories Image">
                        <img src="/uploads/{{ $category->image }}" width="300px">
                        @error('image')
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