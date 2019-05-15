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
            <label for="title">{{ __('Title') }}</label>
            <input id="title" type="text" class="form-control @if ($errors->has('title')) is-invalid @endif" name="title" value="{{ old('title') }}" required autofocus>
            @if ($errors->has('title'))
                <span class="invalid-feedback" role="alert">
                    {{ $errors->first('title') }}
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
