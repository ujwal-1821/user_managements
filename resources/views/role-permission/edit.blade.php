@extends('layouts.master')

@section('content')
<h4>Assign Permissions to Role: {{ $role->name }}</h4>

<form action="{{ route('role-permissions.update', $role->id) }}" method="POST">
    @csrf
    @method('PUT')

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Permission</th>
                <th>Module</th>
            </tr>
        </thead>

        <tbody>
            @foreach($permissions as $permission)
            @php
                $selectedModule = optional(
                    $assigned->where('permission_id', $permission->id)->first()
                )->module_id;
            @endphp

            <tr>
                <td>{{ $permission->name }}</td>

                <td>
                    <select name="permissions[{{ $permission->id }}]" class="form-control">
                        <option value="">None</option>

                        @foreach($modules as $module)
                            <option value="{{ $module->id }}"
                                @if($selectedModule == $module->id) selected @endif>
                                {{ $module->name }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <button class="btn btn-primary">Save</button>
</form>
@endsection
