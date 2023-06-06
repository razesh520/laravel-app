@extends('admin.layouts.default')

@section('title', 'Edit News')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Edit News</h2>
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
        <form action="{{ route('news.update', $news->id) }} " method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">  
                
            <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <select class="form-control m-bot15" name="category_id">
                            @if ($categories->count())
                            @foreach($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                            @endif
                        </select>

                        @error('category_id')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Title:</strong>
                        <input type="text" name="title" value="{{ $news->title }}" class="form-control" placeholder="News Title">
                        @error('title')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Slug:</strong>
                        <input type="slug" name="slug" value="{{ $news->slug }}" class="form-control" placeholder="News Slug">
                        @error('slug')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
               
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Content:</strong>
                        <input type="text" name="content" value="{{ $news->content }}" class="form-control" placeholder="News content">
                        @error('content')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Image:</strong>
                        <input type="file" name="image" value="{{ $news->image }}" class="form-control" placeholder="News Image">
                        <img src="/uploads/{{ $news->image }}" width="300px">
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