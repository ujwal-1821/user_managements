@extends('layouts.master')

@section('content')
<div class="container-fluid">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

    <h4 class="mb-3">User Role Permission Assignment</h4>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Roles List</h5>
        </div>

        <div class="card-body p-0">
            <table class="table table-bordered mb-0">
                <thead>
                    <tr>
                        <th width="70%">Role Name</th>
                        <th width="30%">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>
                                <a href="{{ route('role-permissions.edit', $role->id) }}" 
                                   class="btn btn-sm btn-primary">
                                    Assign Permissions
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center text-muted">No roles found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
