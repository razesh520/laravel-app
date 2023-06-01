@extends('admin.layouts.default')

@section('title', 'Create Student')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mb-2">
            <h2>Add Student</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('students.index') }}"> Back</a>
        </div>
    </div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
    {{ session('status') }}
</div>
@endif
<form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Student Name:</strong>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Student Name">
                @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Student Email:</strong>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Student Email">
                @error('email')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Student Password:</strong>
                <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="Student Password">
                @error('password')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Student Content:</strong>
                <input type="text" name="content" value="{{ old('content') }}" class="form-control" placeholder="Student Content">
                @error('content')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Student Fathername:</strong>
                <input type="text" name="fathername" value="{{ old('fathername') }}" class="form-control" placeholder="Student Fathername">
                @error('fathername')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Student Address:</strong>
                <input type="text" name="address" value="{{ old('address') }}" class="form-control" placeholder="Student Address">
                @error('address')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Student Rollno:</strong>
                <input type="num" name="rollno" value="{{ old('rollno') }}" class="form-control" placeholder="Student Rollno">
                @error('rollno')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Student Class:</strong>
                <input type="text" name="class" value="{{ old('class') }}" class="form-control" placeholder="Student Class">
                @error('class')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Student Subject:</strong>
                <input type="text" name="subject" value="{{ old('subject') }}" class="form-control" placeholder="Student Subject">
                @error('subject')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Student Classteacher:</strong>
                <input type="text" name="classteacher" value="{{ old('classteacher') }}" class="form-control" placeholder="Student Classteacher">
                @error('classteacher')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary ml-3">Submit</button>
    </div>
</form>
@stop