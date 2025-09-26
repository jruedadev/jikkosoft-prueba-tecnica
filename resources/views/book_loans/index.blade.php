@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Book Loans</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('book_loans.create') }}" class="btn btn-primary mb-3">Create New Loan</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Book</th>
                    <th>Member</th>
                    <th>Borrowed At</th>
                    <th>Returned At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
                    @foreach($member->books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $member->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($book->pivot->borrowed_at)->format('Y-m-d') }}</td>
                            <td>
                                {{ $book->pivot->returned_at ? \Carbon\Carbon::parse($book->pivot->returned_at)->format('Y-m-d') : 'Not returned' }}
                            </td>
                            <td>
                                @if(!$book->pivot->returned_at)
                                    <form action="{{ route('book_loans.return', ['member' => $member->id, 'book' => $book->id]) }}"
                                        method="POST" style="display:inline-block;">
                                        @csrf
                                        <button class="btn btn-success btn-sm"
                                            onclick="return confirm('Mark this book as returned?')">Return</button>
                                    </form>
                                @else
                                    <span class="text-success">Returned</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
@endsection