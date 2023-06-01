@extends('layouts.default')

@section('title', 'Signin')

@section('content')
<h1 class="text-center">Signin</h1>
<form action="/signin" method="POST">

	@csrf
	<div class="form-group">
		<label for="">Email</label>

		<input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="" aria-describedby="helpId">
		@error('email')
		<div class="alert alert-danger">{{ $message }}</div>
		@enderror

		@if ($errors->has('email'))
		<span class="text-danger">{{ $errors->first('email') }}</span>
		@endif

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