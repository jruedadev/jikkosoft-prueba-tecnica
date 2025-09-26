@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Member</h1>

        <form action="{{ route('members.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name') }}">
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                    value="{{ old('email') }}">
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <button class="btn btn-primary">Save</button>
            <a href="{{ route('members.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection