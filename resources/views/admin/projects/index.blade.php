@extends('admin.layouts.master')

@section('admin_content')
    <h2 class="text-gold mb-4">Projects Admin</h2>

    <a href="{{ route('admin.projects.create') }}" class="btn btn-admin-primary mb-3">Add New Project</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach ($projects as $project)
            <div class="col-md-4 mb-4">
                <div class="card card-admin h-100">
                    <img src="{{ Str::startsWith($project->image, 'http') ? $project->image : asset('storage/' . $project->image) }}" class="card-img-top" alt="{{ $project->title }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-gold">{{ $project->title }}</h5>
                        <p class="card-text flex-grow-1">{{ Str::limit($project->description, 100) }}</p>
                        <div class="mt-auto">
                            <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
