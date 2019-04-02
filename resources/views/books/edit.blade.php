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
			<input id="name" type="text" class="form-control @if ($errors->has('name')) is-invalid @endif" name="name" value="{{ old('name', $book->name) }}" required autofocus>
		</div>
		<div class="form-group">
			<label for="phonetic">{{ __('Phonetic') }}</label>
			<input id="phonetic" type="text" class="form-control @if ($errors->has('phonetic')) is-invalid @endif" name="phonetic" value="{{ old('phonetic', $book->phonetic) }}">
		</div>
		<button type="submit" name="submit" class="btn btn-primary">{{ __('Submit') }}</button>
	</form>
</div>
@endsection
