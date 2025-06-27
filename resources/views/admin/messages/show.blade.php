@extends('admin.layouts.master')

@section('admin_content')
    <h2 class="text-gold mb-4">View Message</h2>

    <h1>Message from {{ $message->name }}</h1>
    <p><strong>Email:</strong> {{ $message->email }}</p>
    <p><strong>Message:</strong></p>
    <p>{{ $message->message }}</p>
    <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete Message</button>
    </form>
    <a href="{{ route('admin.messages.index') }}" class="btn btn-secondary">Back to Messages</a>
@endsection