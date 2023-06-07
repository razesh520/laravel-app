@extends('admin.layouts.default')

@section('title', 'Show Category')

@section('content')
<div class="content">
    <div class="container-fluid">

        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('categories.index') }}"> Back</a>
        </div>


        <table boarder="1">
            <tr>
                <th>Title</th>
                <td>{{ $category->title }}</td>
            </tr>
            <tr>
                <th>Content</th>
                <td>{{ $category->content }}</td>
            </tr>
            <tr>
                <th>Url</th>
                <td>{{ $category->url }}</td>
            </tr>
            <tr>
                <th>Image</th>
              <td>
              <img src="/uploads/{{ $category->image }}" width="500px">
              </td>
            </tr>
            <tr>
                <th>Created_at</th>
                <td>{{ $category->created_at }}</td>
            </tr>
            <tr>
                <th>Updated_at</th>
                <td>{{ $category->updated_at }}</td>
            </tr>

        </table>

    </div>
</div>


@stop