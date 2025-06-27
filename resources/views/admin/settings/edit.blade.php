@extends('admin.layouts.master')

@section('admin_content')
    <h2 class="text-gold mb-4">Edit Settings</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="portfolio_name" class="form-label">Portfolio Name</label>
            <input type="text" class="form-control form-control-admin" id="portfolio_name" name="portfolio_name" value="{{ old('portfolio_name', $nameSetting->value) }}" required>
        </div>
        <div class="mb-3">
            <label for="github_url" class="form-label">GitHub URL</label>
            <input type="url" class="form-control form-control-admin" id="github_url" name="github_url" value="{{ old('github_url', $githubSetting->value) }}">
        </div>
        <div class="mb-3">
            <label for="x_url" class="form-label">X (Twitter) URL</label>
            <input type="url" class="form-control form-control-admin" id="x_url" name="x_url" value="{{ old('x_url', $xSetting->value) }}">
        </div>
        <div class="mb-3">
            <label for="contact_email" class="form-label">Contact Email</label>
            <input type="email" class="form-control form-control-admin" id="contact_email" name="contact_email" value="{{ old('contact_email', $emailSetting->value) }}">
        </div>
        <button type="submit" class="btn btn-admin-primary">Update Settings</button>
    </form>
@endsection