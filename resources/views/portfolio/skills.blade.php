@extends('layouts.public')

@section('content')
    <div class="container">
        <h1>My Skills</h1>
        <div class="row">
            @foreach ($skills->groupBy('category') as $category => $skills)
                <div class="col-md-6">
                    <h2>{{ $category }}</h2>
                    <ul class="list-group">
                        @foreach ($skills as $skill)
                            <li class="list-group-item"><span class="skill-badge">{{ $skill->name }}</span></li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
@endsection
