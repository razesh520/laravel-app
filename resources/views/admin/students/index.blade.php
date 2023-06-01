@extends('admin.layouts.default')

@section('title', 'Manage Posts')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h2>Manage Students</h2>
    </div>
    <div class="col-md-12 mb-5">
        <div clas="col-md-6" style="float:left;">
            <a class="btn btn-success" href="{{ route('students.create') }}"> Create Student</a>
        </div>
        <div class="col-md-6" style="float:right;">
            <form class="form">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            </form>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>S.No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Fathername</th>
            <th>Address</th>
            <th>Rollno</th>
            <th>Class</th>
            <th width="280px">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->fathername}}</td>
            <td>{{ $student->address }}</td>
            <td>{{ $student->rollno}}</td>
            <td>{{ $student->class }}</td>
            <td>
                <form action="{{ route('students.destroy',$student->id) }}" method="Post">
                    <a class="btn btn-success" href="{{ route('students.show',$student->id) }}">View</a>
                    <a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{!! $students->links() !!}

@stop