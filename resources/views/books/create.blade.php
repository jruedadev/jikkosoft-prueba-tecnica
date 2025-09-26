@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Book</h1>

        <form action="{{ route('books.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title') }}">
                @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author"
                    value="{{ old('author') }}">
                @error('author') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text" class="form-control @error('isbn') is-invalid @enderror" id="isbn" name="isbn"
                    value="{{ old('isbn') }}">
                @error('isbn') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="library_id" class="form-label">Library</label>
                <select class="form-select @error('library_id') is-invalid @enderror" id="library_id" name="library_id">
                    <option value="">Select a library</option>
                    @foreach($libraries as $library)
                        <option value="{{ $library->id }}" {{ old('library_id') == $library->id ? 'selected' : '' }}>
                            {{ $library->name }}
                        </option>
                    @endforeach
                </select>
                @error('library_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <button class="btn btn-primary">Save</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection