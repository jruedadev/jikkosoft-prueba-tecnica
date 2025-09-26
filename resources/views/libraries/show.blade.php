@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Library Details</h1>
    
    <p><strong>Name:</strong> {{ $library->name }}</p>
    <p><strong>Address:</strong> {{ $library->address }}</p>
    
    <a href="{{ route('libraries.index') }}" class="btn btn-secondary">Back to list</a>
</div>
@endsection
