<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #ecf0f1;
        }

        .wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: white;
            padding: 20px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin-bottom: 10px;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            padding: 10px;
            display: block;
        }

        .sidebar ul li a:hover {
            background-color: #34495e;
        }

        .profile {
            text-align: center;
        }

        .profile img {
            width: 50px;
            height: 50px;
        }

        /* Main Content Styling */
        .content {
            flex: 1;
            padding: 20px;
            background-color: #ecf0f1;
        }

        .dashboard-cards {
            display: flex;
            gap: 20px;
        }

        .card-box {
            padding: 20px;
            border-radius: 5px;
            color: white;
            text-align: center;
            width: 150px;
        }

        .card-box h2 {
            margin: 0;
            font-size: 2rem;
        }

        .card-blue {
            background-color: #3498db;
        }

        .card-red {
            background-color: #e74c3c;
        }

        .card-green {
            background-color: #2ecc71;
        }

        .card-yellow {
            background-color: #f39c12;
        }

        /* Navbar Styling */
        .navbar {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="wrapper">
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="profile mb-3">
            <img src="https://via.placeholder.com/50" alt="Profile" class="img-fluid rounded-circle">
            <p>Admin</p>
            <p class="text-success">Online</p>
        </div>
        <hr>
        <ul>
            <li><a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="{{ route('informasi.index') }}"><i class="bi bi-info-circle-fill"></i> Informasi</a></li>
            <li><a href="{{ route('agenda.index') }}"><i class="bi bi-calendar"></i> Agenda</a></li>
            <li><a href="{{ route('photo.index') }}"><i class="bi bi-journal-album"></i> Photo</a></li>
            <li><a href="{{ route('kategori.index') }}"><i class="bi bi-card-checklist"></i> Kategori</a></li>
            <li><a href="#"><i class="bi bi-journal-album"></i> Galery</a></li>
            <li><a href="{{ route('profile.edit') }}"><i class="fas fa-user"></i> Users</a></li>
        </ul>
        <hr>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger w-100"><i class="fas fa-sign-out-alt"></i> Logout</button>
        </form>
    </div>

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav class="navbar navbar-light bg-light">
            <span class="navbar-brand mb-2 h1 mx-3">Dashboard</span>
            <div class="d-flex align-items-center">
                <span class="mx-5">Admin</span>
            </div>
        </nav>

       <!-- Dashboard Cards -->
<div class="dashboard-cards row row-cols-1 row-cols-md-5 g-5 mt-4">
    <div class="col">
        <div class="card h-100 text-white bg-primary text-center">
            <div class="card-body">
                <i class="bi bi-info-circle-fill fa-2x mb-3"></i>
                <h2>11</h2>
                <p>Informasi</p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100 text-white bg-danger text-center">
            <div class="card-body">
                <i class="bi bi-calendar fa-2x mb-3"></i>
                <h2>3</h2>
                <p>Agenda</p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100 text-white bg-success text-center">
            <div class="card-body">
                <i class="bi bi-journal-album fa-2x mb-3"></i>
                <h2>11</h2>
                <p>Photo</p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100 text-white bg-success text-center">
            <div class="card-body">
                <i class="bi bi-journal-album fa-2x mb-3"></i>
                <h2>11</h2>
                <p>Galery</p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100 text-white bg-warning text-center">
            <div class="card-body">
                <i class="bi bi-card-checklist fa-2x mb-3"></i>
                <h2>4</h2>
                <p>Kategori</p>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
