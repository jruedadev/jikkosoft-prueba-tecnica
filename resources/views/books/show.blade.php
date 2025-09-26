@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Book Details</h1>

        <p><strong>Title:</strong> {{ $book->title }}</p>
        <p><strong>Author:</strong> {{ $book->author }}</p>
        <p><strong>ISBN:</strong> {{ $book->isbn }}</p>
        <p><strong>Library:</strong> {{ $book->library ? $book->library->name : 'N/A' }}</p>

        <a href="{{ route('books.index') }}" class="btn btn-secondary">Back to list</a>
    </div>
@endsection