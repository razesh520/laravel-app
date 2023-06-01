@extends('admin.layouts.default')

@section('title', 'Create News')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mb-2">
            <h2>Add News</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('news.index') }}"> Back</a>
        </div>
    </div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
    {{ session('status') }}
</div>
@endif
<form action="{{ route('news.index') }} " method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Student Title">
                @error('title')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Slug:</strong>
                <input type="slug" name="slug" value="{{ old('slug') }}" class="form-control" placeholder="Student Slug">
                @error('slug')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category:</strong>
                <input type="category" name="category" value="{{ old('category') }}" class="form-control" placeholder="Student Category">
                @error('category')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Content:</strong>
                <input type="text" name="content" value="{{ old('content') }}" class="form-control" placeholder="Student Content">
                @error('content')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <input type="img" name="image" value="{{ old('image') }}" class="form-control" placeholder="Student Image">
                @error('image')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address:</strong>
                <input type="text" name="address" value="{{ old('address') }}" class="form-control" placeholder="Student Address">
                @error('address')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong> Created_at:</strong>
                <input type="num" name="created_at" value="{{ old('created_at') }}" class="form-control" placeholder="Student Created_at">
                @error('created_at')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Student Created_by:</strong>
                <input type="text" name="created_by" value="{{ old('created_by') }}" class="form-control" placeholder="Student Created_by">
                @error('created_by')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        
        <button type="submit" class="btn btn-primary ml-3">Submit</button>
    </div>
</form>
@stop