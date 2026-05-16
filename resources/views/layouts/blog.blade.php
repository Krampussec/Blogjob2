<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Markedia')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body { background: #f8f9fa; font-family: 'Segoe UI', Roboto, sans-serif; }
        .navbar-brand { font-weight: 700; font-size: 1.8rem; }
        .offcanvas-sidebar {
            position: fixed;
            top: 0;
            left: -320px;
            width: 320px;
            height: 100%;
            background: white;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
            transition: left 0.3s ease;
            z-index: 1050;
            overflow-y: auto;
            padding: 1.5rem;
        }
        .offcanvas-sidebar.open {
            left: 0;
        }
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 1040;
            display: none;
        }
        .overlay.show {
            display: block;
        }
        .floating-btn {
            position: fixed;
            bottom: 20px;
            left: 20px;
            background: #0d6efd;
            color: white;
            border: none;
            border-radius: 50%;
            width: 55px;
            height: 55px;
            font-size: 24px;
            cursor: pointer;
            z-index: 1060;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            transition: 0.2s;
        }
        .floating-btn:hover {
            background: #0b5ed7;
            transform: scale(1.05);
        }
        .sidebar-widget {
            background: white;
            border-radius: 20px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.03);
        }
        .tag-cloud .badge {
            background: #e9ecef;
            color: #2c3e50;
            font-weight: 400;
            margin: 0.2rem;
            padding: 0.5rem 1rem;
            border-radius: 30px;
        }
    </style>
    @stack('styles')
</head>
<body>

<nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Markedia</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Главная</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('blog') }}">Блог</a></li>
            </ul>
        </div>
    </div>
</nav>

@yield('hero')

<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            @yield('content')
        </div>
    </div>
</div>

<footer class="footer mt-5">
    <div class="container text-center">
        <p>&copy; {{ date('Y') }} Markedia. Все права защищены.</p>
    </div>
</footer>

<button class="floating-btn" id="sidebarToggle">
    <i class="fas fa-bars"></i>
</button>

<div class="overlay" id="overlay"></div>

<div class="offcanvas-sidebar" id="offcanvasSidebar">
    @include('layouts.sidebar')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const sidebar = document.getElementById('offcanvasSidebar');
    const overlay = document.getElementById('overlay');
    const toggleBtn = document.getElementById('sidebarToggle');

    function openSidebar() {
        sidebar.classList.add('open');
        overlay.classList.add('show');
    }

    function closeSidebar() {
        sidebar.classList.remove('open');
        overlay.classList.remove('show');
    }

    toggleBtn.addEventListener('click', openSidebar);
    overlay.addEventListener('click', closeSidebar);
</script>
@stack('scripts')
</body>
</html>
