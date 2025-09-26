@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Book</h1>

        <form action="{{ route('books.update', $book) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title', $book->title) }}">
                @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author"
                    value="{{ old('author', $book->author) }}">
                @error('author') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text" class="form-control @error('isbn') is-invalid @enderror" id="isbn" name="isbn"
                    value="{{ old('isbn', $book->isbn) }}">
                @error('isbn') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="library_id" class="form-label">Library</label>
                <select class="form-select @error('library_id') is-invalid @enderror" id="library_id" name="library_id">
                    <option value="">Select a library</option>
                    @foreach($libraries as $library)
                        <option value="{{ $library->id }}" {{ (old('library_id', $book->library_id) == $library->id) ? 'selected' : '' }}>
                            {{ $library->name }}
                        </option>
                    @endforeach
                </select>
                @error('library_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection