@extends('admin.layouts.master')

@section('admin_content')
    <h2 class="text-gold mb-4">Skills Admin</h2>

    <a href="{{ route('admin.skills.create') }}" class="btn btn-admin-primary mb-3">Add New Skill</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-admin table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($skills as $skill)
                <tr>
                    <td>{{ $skill->id }}</td>
                    <td>{{ $skill->name }}</td>
                    <td>{{ $skill->category }}</td>
                    <td>
                        <a href="{{ route('admin.skills.show', $skill) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('admin.skills.edit', $skill) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
