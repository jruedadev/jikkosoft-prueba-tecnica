<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use Illuminate\Http\Request;

class BookLoanController extends Controller
{
    public function index()
    {
        $members = Member::with([
            'books' => function ($query) {
                $query->withPivot('borrowed_at', 'returned_at');
            }
        ])->get();

        return view('book_loans.index', compact('members'));
    }


    public function create()
    {
        $books = Book::all();
        $members = Member::all();
        return view('book_loans.create', compact('books', 'members'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'book_id' => 'required|exists:books,id',
            'member_id' => 'required|exists:members,id',
            'borrowed_at' => 'required|date',
        ]);

        $book = Book::findOrFail($data['book_id']);
        $member = Member::findOrFail($data['member_id']);

        $member->books()->attach($book->id, [
            'borrowed_at' => $data['borrowed_at'],
            'returned_at' => null,
        ]);

        return redirect()->route('book_loans.create')->with('success', 'Book loan created successfully.');
    }

    public function returnBook(Request $request, Member $member, Book $book)
    {
        $member->books()->updateExistingPivot($book->id, [
            'returned_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Book marked as returned.');
    }
}
