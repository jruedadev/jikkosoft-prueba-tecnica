@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Libraries</h1>
        <a href="{{ route('libraries.create') }}" class="btn btn-primary mb-3">Create Library</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($libraries as $library)
                    <tr>
                        <td>{{ $library->name }}</td>
                        <td>{{ $library->address }}</td>
                        <td>
                            <a href="{{ route('libraries.show', $library) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('libraries.edit', $library) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('libraries.destroy', $library) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete this library?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection