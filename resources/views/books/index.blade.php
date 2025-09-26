@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Books</h1>
        <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Create Book</a>
        <a href="{{ route('book_loans.index') }}" class="btn btn-secondary mb-3">Manage Book Loans</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>ISBN</th>
                    <th>Library</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->isbn }}</td>
                        <td>{{ $book->library ? $book->library->name : 'N/A' }}</td>
                        <td>
                            <a href="{{ route('books.show', $book) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('books.edit', $book) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete this book?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection