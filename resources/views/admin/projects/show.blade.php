@extends('admin.layouts.master')

@section('admin_content')
    <h2 class="text-gold mb-4">View Project</h2>

    <h1>{{ $project->title }}</h1>
    <img src="{{ $project->image ? asset('storage/' . $project->image) : 'https://via.placeholder.com/1140x400' }}" class="img-fluid mb-4" alt="{{ $project->title }}">
    <p>{{ $project->description }}</p>
    <p><strong>Technologies:</strong> {{ $project->technologies }}</p>
    @if ($project->url)
        <p><strong>URL:</strong> <a href="{{ $project->url }}" target="_blank" class="text-info">{{ $project->url }}</a></p>
    @endif
    <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning">Edit Project</a>
    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete Project</button>
    </form>
    <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Back to Projects</a>
@endsection