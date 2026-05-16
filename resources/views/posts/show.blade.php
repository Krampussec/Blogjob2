<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} | Markedia</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background: #f8f9fa;
            font-family: 'Segoe UI', Roboto, sans-serif;
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
        }
        .post-header {
            background: white;
            padding: 2rem 0;
            border-bottom: 1px solid #e9ecef;
            margin-bottom: 2rem;
        }
        .post-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }
        .post-meta {
            color: #6c757d;
            margin-bottom: 1rem;
        }
        .post-meta i {
            margin-right: 5px;
        }
        .post-thumbnail {
            border-radius: 20px;
            max-height: 400px;
            width: 100%;
            object-fit: cover;
            margin-bottom: 2rem;
        }
        .post-content {
            font-size: 1.1rem;
            line-height: 1.7;
            color: #2c3e50;
        }
        .tag-cloud .badge {
            background: #e9ecef;
            color: #2c3e50;
            font-weight: 400;
            margin: 0.2rem;
            padding: 0.5rem 1rem;
            border-radius: 30px;
            text-decoration: none;
        }
        .tag-cloud .badge:hover {
            background: #0d6efd;
            color: white;
        }
        .related-posts .card {
            border: none;
            border-radius: 15px;
            transition: 0.2s;
        }
        .related-posts .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        }
        .footer {
            background: #1e2a3a;
            color: #cdd9ed;
            padding: 2rem 0;
            margin-top: 3rem;
        }
    </style>
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

<div class="post-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <!-- Ссылка "назад" и категория -->
                <div class="mb-3">
                    <a href="{{ url()->previous() }}" class="text-decoration-none">&larr; Назад</a>
                    <span class="mx-2">|</span>
                    <a href="#" class="badge-category text-decoration-none">
                        {{ $post->category->title ?? 'Без категории' }}
                    </a>
                </div>
                <!-- Заголовок -->
                <h1 class="post-title">{{ $post->title }}</h1>
                <div class="post-meta">
                    <i class="far fa-calendar-alt"></i> {{ $post->getFormattedDate() }}
                    <span class="mx-2">•</span>
                    <i class="far fa-eye"></i> {{ $post->views }} просмотров
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <!-- Миниатюра -->
            @if($post->thumbnail)
                <img src="{{ asset('uploads/thumbnails/' . $post->thumbnail) }}" class="post-thumbnail" alt="{{ $post->title }}">
            @endif

            <!-- Контент -->
            <div class="post-content">
                {!! nl2br(e($post->content)) !!}
            </div>

            <!-- Теги -->
            @if($post->tags->count())
                <div class="tag-cloud mt-5 pt-3">
                    <h5><i class="fas fa-tags me-2"></i> Теги:</h5>
                    @foreach($post->tags as $tag)
                        <a href="#" class="badge">{{ $tag->title }}</a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container text-center">
        <p>&copy; {{ date('Y') }} Markedia. Все права защищены.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
