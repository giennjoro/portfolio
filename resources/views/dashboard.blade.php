@extends('admin.layouts.master')

@section('admin_content')
    <h2 class="text-gold">Welcome {{ Auth::user()->name }}</h2>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card card-admin text-center">
                <div class="card-body">
                    <h3 class="card-title text-gold">{{ $projectCount }}</h3>
                    <p class="card-text">Projects</p>
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-admin-primary">Manage Projects</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card card-admin text-center">
                <div class="card-body">
                    <h3 class="card-title text-gold">{{ $skillCount }}</h3>
                    <p class="card-text">Skills</p>
                    <a href="{{ route('admin.skills.index') }}" class="btn btn-admin-primary">Manage Skills</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card card-admin text-center">
                <div class="card-body">
                    <h3 class="card-title text-gold">{{ $messageCount }}</h3>
                    <p class="card-text">Contact Messages</p>
                    <a href="{{ route('admin.messages.index') }}" class="btn btn-admin-primary">View Messages</a>
                </div>
            </div>
        </div>
    </div>
@endsection