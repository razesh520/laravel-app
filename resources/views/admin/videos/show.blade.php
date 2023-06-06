@extends('admin.layouts.default')

@section('title', 'Show Videos')

@section('content')
<div class="content">
    <div class="container-fluid">

        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('videos.index') }}"> Back</a>
        </div>


        <table boarder="1">
            <tr>
                <th>Title</th>
                <td>{{ $video->title }}</td>
            </tr>
            
            
            <tr>
                <th>Content</th>
                <td>{{ $video->content }}</td>
            </tr>
            <tr>
                <th>Image</th>
              <td>
              <img src="/uploads/{{ $video->image }}" width="500px">
              </td>
            </tr>
             
            <tr>
                <th>Url</th>
                <td>{{ $video->url }}</td>
            </tr>
            <tr>
                <th>created_at</th>
                <td>{{ $video->created_at }}</td>
            </tr>
            <tr>
                <th>updated_at</th>
                <td>{{ $video->created_by }}</td>
            </tr>

        </table>

    </div>
</div>


@stop