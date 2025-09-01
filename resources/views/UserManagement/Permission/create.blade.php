@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Add New Module and Permission</h1>

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

    <form action="{{ route('permissions.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="module_name" class="form-label">Module Name</label>
            <input type="text" name="module_name" id="module_name" class="form-control @error('module_name') is-invalid @enderror" value="{{ old('module_name') }}" required>
            @error('module_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="access" class="form-label">Access</label>
            <input type="text" name="access" id="access" class="form-control @error('access') is-invalid @enderror" placeholder="Access Name (e.g., view_users)" value="{{ old('access') }}" required>
            @error('access')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" name="description" id="description" class="form-control" placeholder="Description (optional)" value="{{ old('description') }}">
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Save Module and Permission</button>
        <a href="{{ route('permissions.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection