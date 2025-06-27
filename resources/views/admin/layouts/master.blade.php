<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} Admin</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;700&display=swap">

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}"> {{-- Your custom black and gold theme --}}

    <style>
        body {
            background-color: #1a1a1a; /* Deep charcoal background */
            color: #f8f9fa; /* Off-white text */
            font-family: 'Roboto Mono', monospace;
            font-size: 0.9rem; /* Slightly reduced base font size */
        }
        .wrapper {
            display: flex;
            width: 100%;
            align-items: stretch;
        }
        #sidebar {
            min-width: 250px;
            max-width: 250px;
            background: #212529; /* Darker charcoal */
            color: #f8f9fa;
            transition: all 0.3s;
            padding: 20px;
            box-shadow: 3px 0px 5px rgba(0,0,0,0.2);
        }
        #sidebar.active {
            margin-left: -250px;
        }
        #sidebar .sidebar-header {
            padding-bottom: 20px;
            margin-bottom: 20px;
            border-bottom: 1px solid #495057; /* Lighter border */
            text-align: center;
        }
        #sidebar ul.components {
            padding: 20px 0;
            border-bottom: 1px solid #495057; /* Lighter border */
        }
        #sidebar ul li a {
            padding: 8px 10px;
            font-size: 1em; /* Adjusted relative to new base font size */
            display: block;
            color: #f8f9fa;
            text-decoration: none;
            transition: all 0.3s;
        }
        #sidebar ul li a:hover {
            color: #FFD700; /* Gold on hover */
            background: #343a40;
            border-radius: 5px;
        }
        #content {
            width: 100%;
            padding: 20px;
            min-height: 100vh;
            transition: all 0.3s;
        }
        .navbar-admin {
            background-color: #212529 !important;
            box-shadow: 0 2px 4px rgba(0,0,0,.2);
        }
        .navbar-admin .navbar-brand {
            color: #FFD700 !important;
            font-size: 1.2rem !important;
        }
        .navbar-admin .nav-link {
            color: #f8f9fa !important;
            font-size: 0.95rem !important;
        }
        .navbar-admin .nav-link:hover {
            color: #FFD700 !important;
        }
        .card-admin {
            background-color: #212529; /* Darker charcoal */
            border: 1px solid #495057; /* Lighter border */
            color: #f8f9fa;
        }
        .card-admin .card-header {
            background-color: #343a40;
            color: #FFD700;
            border-bottom: 1px solid #495057; /* Lighter border */
            font-size: 1.1rem;
        }
        .table-admin {
            color: #f8f9fa;
        }
        .table-admin thead th {
            background-color: #343a40;
            color: #FFD700;
            border-bottom: 2px solid #495057; /* Lighter border */
            font-size: 0.95rem;
        }
        .table-admin tbody tr {
            background-color: #212529;
        }
        .table-admin tbody tr:hover {
            background-color: #343a40;
        }
        .form-control-admin {
            background-color: #343a40;
            color: #f8f9fa;
            border: 1px solid #495057;
        }
        .form-control-admin:focus {
            background-color: #343a40;
            color: #f8f9fa;
            border-color: #FFD700;
            box-shadow: 0 0 0 0.25rem rgba(255, 215, 0, 0.25);
        }
        .btn-admin-primary {
            background-color: #FFD700;
            border-color: #FFD700;
            color: #1a1a1a;
        }
        .btn-admin-primary:hover {
            background-color: #e6c200;
            border-color: #e6c200;
            color: #1a1a1a;
        }
        .text-gold {
            color: #FFD700 !important;
        }
        h2 {
            font-size: 1.8rem;
        }
        h3 {
            font-size: 1.4rem;
        }
        h4 {
            font-size: 1.1rem;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Admin Panel</h3>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('admin.projects.index') }}">Projects</a>
                </li>
                <li>
                    <a href="{{ route('admin.skills.index') }}">Skills</a>
                </li>
                <li>
                    <a href="{{ route('admin.messages.index') }}">Messages</a>
                </li>
                <li>
                    <a href="{{ route('admin.settings.edit') }}">Settings</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="btn btn-admin-primary d-block">
                            Log Out
                        </a>
                    </form>
                </li>
            </ul>
        </nav>

        <!-- Page Content -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-admin">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-admin-primary">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAdmin" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownAdmin">
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                                Log Out
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            @yield('admin_content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var sidebarCollapse = document.getElementById('sidebarCollapse');
            if (sidebarCollapse) {
                sidebarCollapse.addEventListener('click', function() {
                    document.getElementById('sidebar').classList.toggle('active');
                });
            }
        });
    </script>
</body>
</html>
