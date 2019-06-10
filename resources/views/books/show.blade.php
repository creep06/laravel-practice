@php
    $title = $book->title;
@endphp
@extends('layouts.my')
@section('content')
<div class="container">
    <h1 id="book-title">{{ $title }}</h1>

    {{-- 編集・削除ボタン --}}
    @can('edit', $book)
        <div class="edit">
            <a href="{{ url('books/'.$book->id.'/edit') }}" class="btn btn-primary">
                {{ __('Edit') }}
            </a>
            @component('components.btn-del')
                @slot('controller', 'books')
                @slot('id', $book->id)
                @slot('name', $book->title)
            @endcomponent
        </div>
    @endcan

    {{-- 記事内容 --}}
    <dl class="row">
        <dt class="col-md-2">{{ __('User') }}:</dt>
        <dd class="col-md-10">
            <a href="{{ url('users/' . $book->user->id) }}">
                {{ $book->user->name }}
            </a>
        </dd>
        <dt class="col-md-2">{{ __('Created') }}:</dt>
        <dd class="col-md-10">
            <time itemprop="dateCreated" datetime="{{ $book->created_at }}">
                {{ $book->created_at }}
            </time>
        </dd>
        <dt class="col-md-2">{{ __('Updated') }}:</dt>
        <dd class="col-md-10">
            <time itemprop="dateModified" datetime="{{ $book->updated_at }}">
                {{ $book->updated_at }}
            </time>
        </dd>
    </dl>
    <hr>
    <div id="book-phonetic">
        {{ $book->phonetic }}
    </div>
</div>
@endsection
