@extends('layouts.master')

@section('content')
    <div class="container">
        <h2>Roles</h2>
        <a href="{{ route('roles.create') }}" class="btn btn-primary mb-3">Add Roles</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($roles as $role)
                    <tr>

                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->description }}</td>

                        <td>
                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Delete this user?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $roles->links() }}
    </div>
@endsection
