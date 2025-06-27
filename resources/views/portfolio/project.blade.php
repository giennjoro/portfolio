@extends('layouts.public')

@section('content')
    <div class="container">
        <h1>{{ $project->title }}</h1>
        <img src="{{ Str::startsWith($project->image, 'http') ? $project->image : asset('storage/' . $project->image) }}" class="img-fluid mb-4" alt="{{ $project->title }}">
        <p>{{ $project->description }}</p>
        <p><strong>Technologies:</strong> {{ $project->technologies }}</p>
        @if ($project->url)
            <a href="{{ $project->url }}" class="btn btn-primary" target="_blank">Visit Project</a>
        @endif
        <a href="{{ route('portfolio.index') }}" class="btn btn-secondary">Back to Projects</a>
    </div>
@endsection
