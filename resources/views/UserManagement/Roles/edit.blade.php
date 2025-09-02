@extends('layouts.master')

@section('content')
<div class="container">
    <h2>Edit Role</h2>
    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name">Role Name</label>
            <input type="text" name="name" class="form-control"
                   value="{{ old('name', $role->name) }}" required>
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

        <h4 class="mt-4">Assign Permissions</h4>
        @foreach ($modules as $module)
            <div class="card mb-3">
                <div class="card-header">
                    <strong>{{ $module->name }}</strong>
                </div>
                <div class="card-body">
                    @foreach ($permissions as $permission)
                        <div class="form-check">
                            <input type="checkbox"
                                   name="permissions[{{ $module->id }}][]"
                                   value="{{ $permission->id }}"
                                   class="form-check-input"
                                   id="perm{{ $module->id }}_{{ $permission->id }}"
                                   @if(isset($rolePermissions[$module->id]) && in_array($permission->id, $rolePermissions[$module->id])) checked @endif>
                            <label for="perm{{ $module->id }}_{{ $permission->id }}" class="form-check-label">
                                {{ $permission->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

        <button type="submit" class="btn btn-success">Update Role</button>
    </form>
</div>
@endsection
