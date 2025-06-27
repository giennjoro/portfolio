@extends('admin.layouts.master')

@section('admin_content')
    <h2 class="text-gold mb-4">Edit Skill: {{ $skill->name }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.skills.update', $skill) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Skill Name</label>
            <input type="text" class="form-control form-control-admin" id="name" name="name" value="{{ old('name', $skill->name) }}" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <input type="text" class="form-control form-control-admin" id="category" name="category" value="{{ old('category', $skill->category) }}" required>
        </div>
        <button type="submit" class="btn btn-admin-primary">Update Skill</button>
    </form>
@endsection