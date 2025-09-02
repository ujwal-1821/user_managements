@extends('layouts.master')

@section('content')
<div class="container">
    <h2>Add User</h2>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
            @error('name') <small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
            @error('email') <small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
            @error('password') <small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="mb-3">
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
            @error('password_confirmation') <small class="text-danger">{{ $message }}</small>@enderror
        </div>
       <div class="form-group">
    <label for="roles">Assign Roles</label>
    <select name="roles[]" id="roles" class="form-control" multiple >
        @foreach($roles as $role)
            <option value="{{ $role->name }}">{{ $role->name }}</option>

        @endforeach
    </select>
</div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
