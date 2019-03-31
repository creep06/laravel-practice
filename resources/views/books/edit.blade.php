@php
	$title = __('Edit') . ': ' . $book->name;
@endphp
@extends('layouts.app')
@section('content')
<div class="container">
	<h1>{{ $title }}</h1>
	<form action="{{ url('books/'.$book->id) }}" method="post">
		@csrf
		@method('PUT')
		<div class="form-group">
			<label for="name">{{ __('Name') }}</label>
			<input id="name" type="text" class="form-control" name="name" value="{{ $book->name }}" required autofocus>
		</div>
		<div class="form-group">
			<label for="phonetic">{{ __('Phonetic') }}</label>
			<textarea id="phonetic" class="form-control" name="phonetic" rows="8" required>{{ $book->phonetic }}</textarea>
		</div>
		<button type="submit" name="submit" class="btn btn-primary">{{ __('Submit') }}</button>
	</form>
</div>
@endsection
