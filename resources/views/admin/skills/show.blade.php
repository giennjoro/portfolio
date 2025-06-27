@extends('admin.layouts.master')

@section('admin_content')
    <h2 class="text-gold mb-4">View Skill</h2>

    <h1>{{ $skill->name }}</h1>
    <p><strong>Category:</strong> {{ $skill->category }}</p>
    <a href="{{ route('admin.skills.edit', $skill) }}" class="btn btn-warning">Edit Skill</a>
    <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete Skill</button>
    </form>
    <a href="{{ route('admin.skills.index') }}" class="btn btn-secondary">Back to Skills</a>
@endsection