@extends('layouts.master')

@section('content')
<div class="container">
    <h2>Edit User</h2>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
            @error('name') <small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
            @error('email') <small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="form-group mb-3">
            <label for="roles">Assign Roles</label>
            <select name="roles[]" id="roles" class="form-control" multiple required>
                @foreach($roles as $role)
                    <option value="{{ $role->name }}"
                        {{ in_array($role->id, $user->roles->pluck('id')->toArray()) ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
            @error('roles') <small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
