<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Laravel User Management') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .main-wrapper {
            flex-grow: 1;
            display: flex;
        }
        .sidebar {
            width: 240px;
            background: #343a40;
            color: #fff;
            flex-shrink: 0;
        }
        .sidebar .nav-link {
            color: #adb5bd;
            transition: background 0.2s, color 0.2s;
        }
        .sidebar .nav-link:hover {
            background: #495057;
            color: #fff;
        }
        .sidebar .nav-link.active {
            background: #0d6efd; /* Bootstrap primary */
            color: #fff;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
            background: #f8f9fa;
        }
        .sidebar .nav-link {
    color: #adb5bd;
    transition: background 0.2s, color 0.2s;
}
.sidebar .nav-link:hover {
    background: #495057;
    color: #fff;
}

/* Special case: Dashboard should always stay blue when active */
.sidebar .dashboard-link.active {
    background: #0d6efd;
    color: #fff;
}

/* Other links: active should look like hover (NOT blue) */
.sidebar .nav-link.active:not(.dashboard-link) {
    background: #495057;
    color: #fff;
}

    </style>
</head>
<body>
    <!-- Navbar -->
    @include('layouts.navbar')

    <!-- Wrapper with Sidebar + Content -->
    <div class="main-wrapper">
        @include('layouts.sidebar')

        <div class="content">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
