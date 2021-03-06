@php
    $title = __('User') . ': ' . $user->name;
@endphp
@extends('layouts.my')
@section('content')
<div class="container">
    <h1>{{ $title }}</h1>

    {{-- 編集・削除ボタン --}}
    @can('edit', $user)
        <div>
            <a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-primary">
                {{ __('Edit') }}
            </a>
            @component('components.btn-del')
                @slot('controller', 'users')
                @slot('id', $user->id)
                @slot('name', $user->name)
            @endcomponent
        </div>
    @endcan

    {{-- ユーザー1件の情報 --}}
    <dl class="row">
        <dt class="col-md-2">{{ __('ID') }}</dt>
        <dd class="col-md-10">{{ $user->id }}</dd>
        <dt class="col-md-2">{{ __('Name') }}</dt>
        <dd class="col-md-10">{{ $user->name }}</dd>
        <dt class="col-md-2">{{ __('E-Mail Address') }}</dt>
        <dd class="col-md-10">{{ $user->email }}</dd>
    </dl>

    {{-- ユーザーの本一覧 --}}
    <h2>{{ __('Books') }}</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Phonetic') }}</th>
                    <th>{{ __('Created') }}</th>
                    <th>{{ __('Updated') }}</th>

                    {{-- 本の編集・削除ボタンのカラム --}}
                    @can('edit', $user) <th></th> @endcan
                </tr>
            </thead>
            <tbody>
                @foreach ($user->books as $book)
                    <tr>
                        <td>
                            <a href="{{ url('books/' . $book->id) }}">
                                {{ $book->title }}
                            </a>
                        </td>
                        <td>{{ $book->phonetic }}</td>
                        <td>{{ $book->created_at }}</td>
                        <td>{{ $book->updated_at }}</td>
                        @can('edit', $user)
                            <td nowrap>
                                <a href="{{ url('books/' . $book->id . '/edit') }}" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </a>
                                @component('components.btn-del')
                                    @slot('controller', 'books')
                                    @slot('id', $book->id)
                                    @slot('name', $book->title)
                                @endcomponent
                            </td>
                        @endcan
                     </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $user->books->links() }}
</div>
@endsection
