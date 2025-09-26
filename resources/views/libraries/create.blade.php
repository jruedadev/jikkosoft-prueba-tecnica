@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Library</h1>

        <form action="{{ route('libraries.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name') }}">
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control @error('address') is-invalid @enderror" id="address"
                    name="address">{{ old('address') }}</textarea>
                @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <button class="btn btn-primary">Save</button>
            <a href="{{ route('libraries.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection