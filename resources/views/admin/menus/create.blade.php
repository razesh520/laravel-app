@extends('admin.layouts.default')

@section('title', 'Create Menu')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Add Menu</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('menus.index') }}"> Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Menu Title:</strong>
                        <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Menu Title">
                        @error('title')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Menu Position:</strong>
                        <input type="text" name="position" value="{{ old('position') }}" class="form-control" placeholder="Menu Position">
                        @error('position')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Menu Url:</strong>
                        <input type="text" name="url" value="{{ old('url') }}" class="form-control" placeholder="Menu Url">
                        @error('url')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Menu Type:</strong>
                        <select class="form-control" type="type" name="type">
                            <option value="menu">Menu</option>
                            <option value="ribbon">Ribbon</option>
                        </select>

                        <!-- @error('status')
                        <input type="status" name="status" value="{{ old('status') }}" class="form-control" placeholder="Menu Status">
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror -->
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Menu Status:</strong>
                        <select class="form-control" type="status" name="status">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>

                        <!-- @error('status')
                        <input type="status" name="status" value="{{ old('status') }}" class="form-control" placeholder="Menu Status">
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror -->
                    </div>
                </div>



                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
</div>
@stop