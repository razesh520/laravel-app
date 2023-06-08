@extends('admin.layouts.default')

@section('title', 'Create Socials')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Add Socials</h2>
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
        <form action="{{ route('socials.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>Content</label>
                        <textarea class="tinymce-editor" name="content"></textarea>
                        @error('content')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong> Facebook link:</strong>
                        <input type="text" name="facebook_link" value="{{ old('facebook_link') }}" class="form-control" placeholder="Facebook Link">
                        @error('facebook_link')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong> Youtube link:</strong>
                        <input type="text" name="youtube_link" value="{{ old('youtube_link') }}" class="form-control" placeholder="Youtube Link">
                        @error('youtube_link')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong> Twitter link:</strong>
                        <input type="text" name="twitter_link" value="{{ old('twitter_link') }}" class="form-control" placeholder="Twitter Link">
                        @error('twitter_link')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong> Status:</strong>
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
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script type="text/javascript">
            tinymce.init({
                selector: 'textarea.tinymce-editor',
                height: 300,
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount', 'image'
                ],
                toolbar: 'undo redo | formatselect | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help',
                content_css: '//www.tiny.cloud/css/codepen.min.css'
            });
        </script>
    </div>
</div>
    </div>
</div>
@stop
