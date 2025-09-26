<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Library;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('library')->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $libraries = Library::all();
        return view('books.create', compact('libraries'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'required|string|max:100|unique:books,isbn',
            'library_id' => 'nullable|exists:libraries,id',
        ]);

        Book::create($data);

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    public function show(Book $book)
    {
        $book->load('library');
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $libraries = Library::all();
        return view('books.edit', compact('book', 'libraries'));
    }

    public function update(Request $request, Book $book)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'required|string|max:100|unique:books,isbn,' . $book->id,
            'library_id' => 'nullable|exists:libraries,id',
        ]);

        $book->update($data);

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
