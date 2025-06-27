@extends('admin.layouts.master')

@section('admin_content')
    <h2 class="text-gold mb-4">Create New Project</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control form-control-admin" id="title" name="title" value="{{ old('title') }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control form-control-admin" id="description" name="description" rows="5" required>{{ old('description') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="technologies" class="form-label">Technologies (comma-separated)</label>
            <input type="text" class="form-control form-control-admin" id="technologies" name="technologies" value="{{ old('technologies') }}" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Project Image</label>
            <input type="file" class="form-control form-control-admin" id="image" name="image">
        </div>
        <div class="mb-3">
            <label for="url" class="form-label">Project URL</label>
            <input type="url" class="form-control form-control-admin" id="url" name="url" value="{{ old('url') }}">
        </div>
        <button type="submit" class="btn btn-admin-primary">Create Project</button>
    </form>
@endsection