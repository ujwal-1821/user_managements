@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Modules & Permissions</h2>
            <a href="{{ route('permissions.create') }}" class="btn btn-primary">Add Module / Permission</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Module Name</th>
                    <th>Permissions</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($modules as $module)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $module->name }}</td>
                        <td>
                            @foreach ($permissions as $permission)
                                <span class="badge bg-primary">{{ $permission->name }}</span>
                            @endforeach
                        </td>
                        <td>{{ $module->created_at->format('d-m-Y H:i') }}</td>
                        <td>
                            <a href="{{ route('permissions.edit', $module->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('permissions.destroy', $module->id) }}" method="POST"
                                style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this module?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No modules found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
