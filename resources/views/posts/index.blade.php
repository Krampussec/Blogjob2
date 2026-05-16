<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Блог | Digital Marketing</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6 (free) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Кастомные стили -->
    <style>
        body {
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
            background: #f8f9fa;
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
            letter-spacing: -0.5px;
        }
        .hero {
            background: linear-gradient(135deg, #1e2a3a 0%, #0f1724 100%);
            color: white;
            padding: 4rem 0;
            text-align: center;
            margin-bottom: 2rem;
        }
        .hero h1 {
            font-size: 3rem;
            font-weight: 800;
        }
        .hero p {
            font-size: 1.2rem;
            opacity: 0.9;
        }
        .card {
            border: none;
            border-radius: 20px;
            transition: transform 0.2s, box-shadow 0.2s;
            overflow: hidden;
            margin-bottom: 2rem;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 30px -12px rgba(0,0,0,0.1);
        }
        .card-img-top {
            object-fit: cover;
            height: 220px;
        }
        .badge-category {
            background: #0d6efd;
            color: white;
            border-radius: 40px;
            padding: 0.3rem 0.9rem;
            font-size: 0.75rem;
            font-weight: 500;
            text-decoration: none;
        }
        .tag-cloud .badge {
            background: #e9ecef;
            color: #2c3e50;
            font-weight: 400;
            margin: 0.2rem;
            padding: 0.5rem 1rem;
            border-radius: 30px;
            transition: 0.2s;
        }
        .tag-cloud .badge:hover {
            background: #0d6efd;
            color: white;
        }
        .sidebar-widget {
            background: white;
            border-radius: 20px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.03);
        }
        .newsletter-form .input-group {
            border-radius: 50px;
            overflow: hidden;
        }
        .footer {
            background: #1e2a3a;
            color: #cdd9ed;
            padding: 2rem 0;
            margin-top: 3rem;
        }
        .pagination .page-link {
            border-radius: 40px;
            margin: 0 5px;
            color: #1e2a3a;
        }
        .pagination .active .page-link {
            background: #0d6efd;
            border-color: #0d6efd;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Markedia</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" href="{{ route('blog') }}">HOME</a></li>
                <li class="nav-item"><a class="nav-link" href="#">MARKETING</a></li>
                <li class="nav-item"><a class="nav-link" href="#">MAKE MONEY</a></li>
                <li class="nav-item"><a class="nav-link" href="#">BLOG</a></li>
                <li class="nav-item"><a class="nav-link" href="#">CONTACT US</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero -->
<div class="hero">
    <div class="container">
        <h1>A digital marketing blog</h1>
        <p>Aenean ut hendrerit nibh. Duis porta libero, egestas at velit sed. Praesent sed lectus et neque auctor aliquet. Nam vestibulum risus rhoncus rutrum.</p>
        <a href="#" class="btn btn-light btn-lg rounded-pill px-4 mt-3">Try for free →</a>
    </div>
</div>

<!-- Главный контент -->
<div class="container">
    <div class="row g-5">
        <!-- Левая колонка: посты -->
        <div class="col-lg-8">
            @if($posts->count())
                @foreach($posts as $post)
                <div class="card">
                    @if($post->thumbnail)
                        <img src="{{ asset('uploads/thumbnails/' . $post->thumbnail) }}" class="card-img-top" alt="{{ $post->title }}">
                    @else
                        <img src="https://placehold.co/800x400?text=No+Image" class="card-img-top" alt="placeholder">
                    @endif
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <a href="#" class="badge-category">{{ $post->category->title }}</a>
                            <span class="text-muted small"><i class="far fa-calendar-alt"></i> {{ $post->created_at->format('d M Y') }}</span>
                        </div>
                        <h3 class="card-title h4">
                            <a href="{{ route('posts.show', $post->slug) }}" class="text-dark text-decoration-none">{{ $post->title }}</a>
                        </h3>
                        <p class="card-text text-muted">{{ Str::limit(strip_tags($post->content), 150) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="tags">
                                @foreach($post->tags->take(3) as $tag)
                                    <a href="#" class="badge bg-light text-dark me-1">#{{ $tag->title }}</a>
                                @endforeach
                            </div>
                            <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-outline-primary btn-sm rounded-pill">Read more →</a>
                        </div>
                    </div>
                </div>
                @endforeach

                <!-- Пагинация -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $posts->links() }}
                </div>
            @else
                <div class="alert alert-info">Пока нет постов. Загляните позже!</div>
            @endif
        </div>

        <!-- Правая колонка: сайдбар -->
        <div class="col-lg-4">
            <!-- Форма подписки -->
            <div class="sidebar-widget newsletter-form">
                <h5 class="mb-3"><i class="far fa-envelope me-2"></i> Subscribe Today!</h5>
                <p class="small">Subscribe to our weekly Newsletter and receive updates via email.</p>
                <form action="#" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="email" name="email" class="form-control" placeholder="Add your email here..." required>
                        <button class="btn btn-primary" type="submit">Subscribe</button>
                    </div>
                </form>
            </div>

            <!-- Поиск -->
            <div class="sidebar-widget">
                <h5><i class="fas fa-search me-2"></i> Search</h5>
                <form action="#" method="GET">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search articles...">
                        <button class="btn btn-outline-secondary" type="submit">Go</button>
                    </div>
                </form>
            </div>

            <!-- Свежие посты -->
            @isset($recentPosts)
            <div class="sidebar-widget">
                <h5><i class="far fa-clock me-2"></i> Recent Posts</h5>
                <ul class="list-unstyled">
                    @foreach($recentPosts as $recent)
                        <li class="mb-2">
                            <a href="{{ route('posts.show', $recent->slug) }}" class="text-decoration-none">{{ $recent->title }}</a>
                            <div class="small text-muted">{{ $recent->created_at->diffForHumans() }}</div>
                        </li>
                    @endforeach
                </ul>
            </div>
            @endisset

            <!-- Категории -->
            @isset($categories)
            <div class="sidebar-widget">
                <h5><i class="fas fa-folder me-2"></i> Categories</h5>
                <div class="d-flex flex-wrap gap-2">
                    @foreach($categories as $cat)
                        <a href="#" class="badge bg-secondary text-decoration-none">{{ $cat->title }}</a>
                    @endforeach
                </div>
            </div>
            @endisset

            <!-- Облако тегов -->
            @isset($tags)
            <div class="sidebar-widget tag-cloud">
                <h5><i class="fas fa-tags me-2"></i> Popular Tags</h5>
                <div>
                    @foreach($tags as $tag)
                        <a href="#" class="badge">{{ $tag->title }}</a>
                    @endforeach
                </div>
            </div>
            @endisset
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="footer">
    <div class="container text-center">
        <p class="mb-0">&copy; {{ date('Y') }} Markedia. All rights reserved.</p>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
