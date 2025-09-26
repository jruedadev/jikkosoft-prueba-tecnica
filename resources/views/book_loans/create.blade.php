@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Book Loan</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('book_loans.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="book_id" class="form-label">Book</label>
                <select name="book_id" id="book_id" class="form-select @error('book_id') is-invalid @enderror">
                    <option value="">Select a Book</option>
                    @foreach($books as $book)
                        <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>{{ $book->title }}
                        </option>
                    @endforeach
                </select>
                @error('book_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="member_id" class="form-label">Member</label>
                <select name="member_id" id="member_id" class="form-select @error('member_id') is-invalid @enderror">
                    <option value="">Select a Member</option>
                    @foreach($members as $member)
                        <option value="{{ $member->id }}" {{ old('member_id') == $member->id ? 'selected' : '' }}>
                            {{ $member->name }}</option>
                    @endforeach
                </select>
                @error('member_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="borrowed_at" class="form-label">Borrowed At</label>
                <input type="date" name="borrowed_at" id="borrowed_at"
                    class="form-control @error('borrowed_at') is-invalid @enderror"
                    value="{{ old('borrowed_at', date('Y-m-d')) }}">
                @error('borrowed_at') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <button class="btn btn-primary">Create Loan</button>
        </form>
    </div>
@endsection