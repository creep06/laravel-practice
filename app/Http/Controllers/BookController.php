<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
	public function index()
	{
		$books = Book::latest()->get();
		return view('books.index', ['books' => $books]);
	}

	public function create()
	{
		return view('books.create');
	}

	public function store(Request $request)
	{
		$book = new Book;
		$book->name = $request->name;
		$book->phonetic = $request->phonetic;
		$book->save();
		return redirect('books/'.$book->id);
	}

	public function show(Book $book)
	{
		return view('books.show', ['book' => $book]);
	}

	public function edit(Book $book)
	{
		return view('books.edit', ['book' => $book]);
	}

	public function update(Request $request, Book $book)
	{
		$book->name = $request->name;
		$book->phonetic = $request->phonetic;
		$book->save();
		return redirect('books/'.$book->id);
	}

	public function destroy(Book $book)
	{
		$book->delete();
		return redirect('books');
	}
}
