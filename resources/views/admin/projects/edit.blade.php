@extends('admin.layouts.master')

@section('admin_content')
    <h2 class="text-gold mb-4">Edit Project: {{ $project->title }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control form-control-admin" id="title" name="title" value="{{ old('title', $project->title) }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control form-control-admin" id="description" name="description" rows="5" required>{{ old('description', $project->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="technologies" class="form-label">Technologies (comma-separated)</label>
            <input type="text" class="form-control form-control-admin" id="technologies" name="technologies" value="{{ old('technologies', $project->technologies) }}" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Project Image</label>
            <input type="file" class="form-control form-control-admin" id="image" name="image">
            @if ($project->image)
                <img src="{{ asset('storage/' . $project->image) }}" alt="Current Image" class="img-thumbnail mt-2" width="150">
            @endif
        </div>
        <div class="mb-3">
            <label for="url" class="form-label">Project URL</label>
            <input type="url" class="form-control form-control-admin" id="url" name="url" value="{{ old('url', $project->url) }}">
        </div>
        <button type="submit" class="btn btn-admin-primary">Update Project</button>
    </form>
@endsection