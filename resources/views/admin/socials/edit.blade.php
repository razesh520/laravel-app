@extends('admin.layouts.default')

@section('title', 'Edit Socials')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Edit Socials</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('socials.index') }}"> Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('socials.update', $social->id) }} " method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">  
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Content:</strong>
                        <input type="text" name="content" value="{{ $social->content }}" class="form-control" placeholder="Socials Content">
                        @error('content')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Facebook Link:</strong>
                        <input type="text" name="facebook_link" value="{{ $social->facebook_link }}" class="form-control" placeholder="Facebook Link">
                        @error('facebook_link')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
               
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Youtube Link:</strong>
                        <input type="text" name="youtube_link" value="{{ $social->youtube_link }}" class="form-control" placeholder="Youtube Link">
                        @error('youtube_link')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Twitter Link:</strong>
                        <input type="text" name="twitter_link" value="{{ $social->twitter_link }}" class="form-control" placeholder="Socials Twitter Link">
                        @error('twitter_link')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Socials Status:</strong>
                        <select class="form-control" type="status" name="status">
                            <option value="active" {{ $social->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive"  {{ $social->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
</div>
@stop