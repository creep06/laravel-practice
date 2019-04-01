@php
	$title = __('Books');
@endphp
@extends('layouts.app')
@section('content')
<div class="container">
	<h1>{{ $title }}</h1>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>{{ __('User') }}</th>
					<th>{{ __('Title') }}</th>
					<th>{{ __('Phonetic') }}</th>
					<th>{{ __('Created') }}</th>
					<th>{{ __('Updated') }}</th>
				</tr>
			</thead>
			<tbody>
			@foreach ($books as $book)
				<tr>
					<td>
						<a href="{{ url('users/' . $book->user->id) }}">
							{{ $book->user->name }}
						</a>
					</td>
					<td>
						<a href="{{ url('books/'.$book->id) }}">{{ $book->name }}</a>
					</td>
					<td>{{ $book->phonetic }}</td>
					<td>{{ $book->created_at }}</td>
					<td>{{ $book->updated_at }}</td>
				 </tr>
			@endforeach
			</tbody>
		</table>
	</div>
	{{ $books->links() }}
</div>
@endsection
