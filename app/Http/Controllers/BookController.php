<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Http\Requests\StoreBook;

class BookController extends Controller
{
    // 各アクションの前に実行させるミドルウェア
    public function __construct()
    {
        $this->middleware('verified')->except(['index', 'show']);
    }

    public function index()
    {
        $books = Book::latest()->paginate(10);
        return view('books.index', ['books' => $books]);
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(StoreBook $request)
    {
        $book = new Book;
        $book->title = $request->title;
        $book->phonetic = $request->phonetic;
        $book->user_id = $request->user()->id;
        $book->save();
        return redirect('books/'.$book->id)->with('my_status', __('Posted new article.'));
    }

    public function show(Book $book)
    {
        return view('books.show', ['book' => $book]);
    }

    public function edit(Book $book)
    {
        $this->authorize('edit', $book);
        return view('books.edit', ['book' => $book]);
    }

    public function update(StorePost $request, Book $book)
    {
        $this->authorize('edit', $book);
        $book->title = $request->title;
        $book->phonetic = $request->phonetic;
        $book->save();
        return redirect('books/'.$book->id)->with('my_status', __('Updated an article.'));
    }

    public function destroy(Book $book)
    {
        $this->authorize('edit', $book);
        $book->delete();
        return redirect('books')->with('my_status', __('Deleted an article.'));
    }
}
