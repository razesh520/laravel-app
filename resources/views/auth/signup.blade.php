

@extends('layouts.default')

@section('title', 'Registration')

@section('content')
<h1 class="text-center">Registration</h1>
<form action="/save" method="POST">

	@csrf


	<div class="form-group">
		<label for="">Name </label>

		<input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="" aria-describedby="helpId">
		@error('name')
		<div class="alert alert-danger">{{ $message }}</div>
		@enderror
	</div>
	<div class="form-group">
		<label for="">Email</label>

		<input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="" aria-describedby="helpId">
		@error('email')
		<div class="alert alert-danger">{{ $message }}</div>
		@enderror

	</div>
	<div class="form-group">
		<label for="">Password </label>

		<input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="" aria-describedby="helpId">
		@error('password')
		<div class="alert alert-danger">{{ $message }}</div>
		@enderror

	</div>
	<div>
		<input type="submit" class="btn btn-primary" value="Submit">
	</div>

	</div>
</form>
@stop