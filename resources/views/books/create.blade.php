@php
	$title = __('Create Book');
@endphp
@extends('layouts.app')
@section('content')
<div class="container">
	<h1>{{ $title }}</h1>
	<form action="{{ url('books') }}" method="post">
		@csrf
		@method('POST')
		<div class="form-group">
			<label for="name">{{ __('Name') }}</label>
			<input id="name" type="text" class="form-control" name="name" required autofocus>
		</div>
		<div class="form-group">
			<label for="phonetic">{{ __('Phonetic') }}</label>
			<textarea id="phonetic" class="form-control" name="phonetic" rows="8" required></textarea>
		</div>
		<button type="submit" name="submit" class="btn btn-primary">{{ __('Submit') }}</button>
	</form>
</div>
@endsection
