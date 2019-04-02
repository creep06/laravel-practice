@php
    $title = __('Not Found');
@endphp
@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{ $title }}</h1>
    <p><strong>{{ __('Error') }}: <span class="error-code">404</span></strong></p>
    <p>{{ __('The requested page does not exist.') }}</p>
</div>
@endsection
