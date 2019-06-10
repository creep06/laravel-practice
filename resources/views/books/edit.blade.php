@php
    $title = __('Edit') . ': ' . $book->title;
@endphp
@extends('layouts.my')
@section('content')
<div class="container">
    <h1>{{ $title }}</h1>
    <form action="{{ url('books/'.$book->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">{{ __('Title') }}</label>
            <input id="title" type="text" class="form-control @if ($errors->has('title')) is-invalid @endif" name="title" value="{{ old('title', $book->title) }}" required autofocus>
            @if ($errors->has('title'))
                <span class="invalid-feedback" role="alert">
                    {{ $errors->first('title') }}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="phonetic">{{ __('Phonetic') }}</label>
            <input id="phonetic" type="text" class="form-control @if ($errors->has('phonetic')) is-invalid @endif" name="phonetic" value="{{ old('phonetic', $book->phonetic) }}">
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
