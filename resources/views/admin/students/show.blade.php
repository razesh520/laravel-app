@extends('admin.layouts.default')

@section('title', 'Create Student')

@section('content')

<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('students.index') }}"> Back</a>
</div>


<table boarder="1">
    <tr>
        <th>name</th>
        <td>{{ $student->name }}</td>
    </tr>
    <tr>
        <th>email</th>
        <td>{{ $student->email}}</td>
    </tr>
    <tr>
        <th>password</th>
        <td>{{ $student->password }}</td>
    </tr>
    <tr>
        <th>content</th>
        <td>{{ $student->content }}</td>
    </tr>
    <tr>
        <th>fathername</th>
        <td>{{ $student->fathername }}</td>
    </tr>
    <tr>
        <th>address</th>
        <td>{{ $student->address }}</td>
    </tr>
    <tr>
        <th>rollno</th>
        <td>{{ $student->rollno }}</td>
    </tr>
    <tr>
        <th>class</th>
        <td>{{ $student->class }}</td>
    </tr>
    <tr>
        <th>subject</th>
        <td>{{ $student->subject }}</td>
    </tr>
    <tr>
        <th>classteacher</th>
        <td>{{ $student->classteacher }}</td>
    </tr>
</table>


@stop