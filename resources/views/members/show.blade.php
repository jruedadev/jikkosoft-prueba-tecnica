@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Member Details</h1>
    
    <p><strong>Name:</strong> {{ $member->name }}</p>
    <p><strong>Email:</strong> {{ $member->email }}</p>
    
    <a href="{{ route('members.index') }}" class="btn btn-secondary">Back to list</a>
</div>
@endsection
