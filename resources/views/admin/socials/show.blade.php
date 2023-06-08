@extends('admin.layouts.default')

@section('title', 'Show Socials')

@section('content')
<div class="content">
    <div class="container-fluid">

        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('socials.index') }}"> Back</a>
        </div>


        <table boarder="1">
            <tr>
                <th>Content</th>
                <td>{{ $social->content }}</td>
            </tr>
            <tr>
                <th>Facebook</th>
                <td>{{ $social->facebook_link }}</td>
            </tr>
            <tr>
                <th>Youtube</th>
                <td>{{ $social->youtube_link }}</td>
            </tr>
            <tr>
                <th>Twitter</th>
                <td>{{ $social->twitter_link }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ $social->status }}</td>
            </tr>
        </table>

    </div>
</div>


@stop