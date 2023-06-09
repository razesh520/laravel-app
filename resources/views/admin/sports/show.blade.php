@extends('admin.layouts.default')

@section('title', 'Show Sports')

@section('content')
<div class="content">
    <div class="container-fluid">

        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('sports.index') }}"> Back</a>
        </div>


        <table boarder="1">
            <tr>
                <th>Title</th>
                <td>{{ $sport->title }}</td>
            </tr>
            <tr>
                <th>Slug</th>
                <td>{{ $sport->slug }}</td>
            </tr>
            <tr>
                <th>Content</th>
                <td>{{ $sport->content }}</td>
            </tr>
            <tr>
                <th>Image</th>
              <td>
              <img src="/uploads/{{ $sport->image }}" width="500px">
              </td>
            </tr>
            <tr>
                <th>created_at</th>
                <td>{{ $sport->created_at }}</td>
            </tr>
            <tr>
                <th>updated_at</th>
                <td>{{ $sport->updated_at }}</td>
            </tr>

        </table>

    </div>
</div>


@stop