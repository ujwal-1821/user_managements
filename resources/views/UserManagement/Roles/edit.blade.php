@extends('layouts.master')

@section('content')
    <div class="container">
        <h2>Edit Role</h2>
        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name">Role Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $role->name) }}" required>
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description', $role->description) }}</textarea>
                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Update Role</button>
        </form>
    </div>
@endsection
