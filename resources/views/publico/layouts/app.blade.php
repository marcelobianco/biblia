<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bíblia Online</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-dark {
            background-color: #2c3e50;
        }
        .content-section-home {
            background-color: #34495e;
            color: white;
            padding: 2rem 0;
            min-height: calc(100vh - 56px);
        }
        
        .nav-link {
            color: #ecf0f1 !important;
        }
        .nav-link:hover {
            color: #bdc3c7 !important;
        }
        .menu-header {
            color: white;
            font-size: 1.2rem;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .tema-link {
            color: white;
            text-decoration: none;
            display: block;
            padding: 0.25rem 0;
        }
        .tema-link:hover {
            color: #bdc3c7;
        }
        .navbar {
            background-color: #2b4164 !important;
        }
        .chapter-nav {
            background-color: #f8f9fa;
            padding: 15px 0;
        }
        .chapter-number {
            color: #007bff;
            font-weight: bold;
            margin-right: 5px;
        }
        .verse {
            margin-bottom: 1rem;
        }
        .verse-number {
            font-size: 0.8em;
            color: #666;
            vertical-align: super;
            margin-right: 5px;
        }
        .chapter-links a {
            color: #007bff;
            text-decoration: none;
            margin: 0 5px;
        }
        .sidebar {
            background-color: #f8f9fa;
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Bíblia Online</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <form class="d-flex ms-auto">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Buscar..." aria-label="Search">
                        <span class="input-group-text text-muted">Ctrl + K</span>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-2-circle-fill"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><button class="dropdown-item" type="button">Action</button></li>
                            <li><button class="dropdown-item" type="button">Another action</button></li>
                            <li><button class="dropdown-item" type="button">Something else here</button></li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </nav>

    <!-- Content Section -->

    @yield('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
