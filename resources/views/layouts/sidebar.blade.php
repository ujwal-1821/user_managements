<div class="sidebar d-flex flex-column p-3">
    <h5 class="text-white mb-4">Admin </h5>
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a href="{{ url('/dashboard') }}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                User Managements
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link {{ request()->is('users*') ? 'active' : '' }}">
                Users
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('roles.index') }}" class="nav-link {{ request()->is('roles*') ? 'active' : '' }}">
                Roles
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('permissions.index') }}" class="nav-link {{ request()->is('permissions*') ? 'active' : '' }}">
                Permissions
            </a>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link">
                User Role Assignment
            </a>
        </li>
    </ul>
</div>
