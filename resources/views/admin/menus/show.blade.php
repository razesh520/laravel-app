@extends('admin.layouts.default')

@section('title', 'Show Menu')

@section('content')
<div class="content">
    <div class="container-fluid">

        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('menus.index') }}"> Back</a>
        </div>


        <table boarder="1">
            <tr>
                <th>Title</th>
                <td>{{ $menu->title }}</td>
            </tr>

            <tr>
                <th>Content</th>
                <td>{{ $menu->content }}</td>
            </tr>
            <tr>
                <th>Url</th>
                <td>{{ $menu->url }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ $menu->status }}</td>
            </tr>
        </table>

    </div>
</div>


@stop