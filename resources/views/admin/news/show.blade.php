@extends('admin.layouts.default')

@section('title', 'Show News')

@section('content')
<div class="content">
    <div class="container-fluid">

        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('news.index') }}"> Back</a>
        </div>


        <table boarder="1">
            <tr>
                <th>Title</th>
                <td>{{ $news->title }}</td>
            </tr>
            <tr>
                <th>Slug</th>
                <td>{{ $news->slug}}</td>
            </tr>
            
            <tr>
                <th>Content</th>
                <td>{{ $news->content }}</td>
            </tr>
            <tr>
                <th>Image</th>
              <td>
              <img src="/uploads/{{ $news->image }}" width="500px">
              </td>
            </tr>
            <tr>
                <th>created_at</th>
                <td>{{ $news->created_at }}</td>
            </tr>
            <tr>
                <th>created_by</th>
                <td>{{ $news->created_by }}</td>
            </tr>

        </table>

    </div>
</div>


@stop