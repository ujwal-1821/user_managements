<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel User Management') }}
        </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Roles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Permissions</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
