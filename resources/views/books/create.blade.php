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
			<input id="name" type="text" class="form-control @if ($errors->has('name')) is-invalid @endif" name="name" value="{{ old('name') }}" required autofocus>
			@if ($errors->has('name'))
				<span class="invalid-feedback" role="alert">
					{{ $errors->first('name') }}
				</span>
			@endif
		</div>
		<div class="form-group">
			<label for="phonetic">{{ __('Phonetic') }}</label>
			<input id="phonetic" type="text" class="form-control @if ($errors->has('phonetic')) is-invalid @endif" name="phonetic" value="{{ old('phonetic') }}">
			@if ($errors->has('phonetic'))
				<span class="invalid-feedback" role="alert">
					{{ $errors->first('phonetic') }}
				</span>
			@endif
		</div>
		<button type="submit" name="submit" class="btn btn-primary">{{ __('Submit') }}</button>
	</form>
</div>
@endsection
