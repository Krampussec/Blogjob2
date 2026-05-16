@extends('layouts.blog')

@section('title', 'Поиск: ' . e($query))

@section('hero')
<div class="hero bg-primary text-white py-5 mb-4">
    <div class="container">
        <h1 class="display-5">Результаты поиска по запросу: «{{ $query }}»</h1>
        <p>Найдено {{ $posts->total() }} статей</p>
    </div>
</div>
@endsection

@section('content')
<div class="col-lg-8">
    @if($posts->count())
        @foreach($posts as $post)
        <div class="card mb-4 shadow-sm">
            @if($post->thumbnail)
                <img src="{{ asset('uploads/thumbnails/' . $post->thumbnail) }}" class="card-img-top" alt="{{ $post->title }}">
            @endif
            <div class="card-body">
                <h3 class="card-title h4">
                    <a href="{{ route('posts.show', $post->slug) }}" class="text-dark text-decoration-none">{{ $post->title }}</a>
                </h3>
                <div class="text-muted small mb-2">
                    {{ $post->created_at->format('d M Y') }} • {{ $post->views }} просмотров
                </div>
                <p class="card-text">{{ Str::limit(strip_tags($post->content), 150) }}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="badge bg-secondary">{{ $post->category->title ?? 'Без категории' }}</span>
                    <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-outline-primary btn-sm">Читать →</a>
                </div>
            </div>
        </div>
        @endforeach

        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    @else
        <div class="alert alert-warning">
            <i class="fas fa-exclamation-triangle me-2"></i> По вашему запросу «{{ $query }}» ничего не найдено. Попробуйте другие ключевые слова.
        </div>
        <a href="{{ route('blog') }}" class="btn btn-primary">← Вернуться на главную</a>
    @endif
</div>
@endsection

@push('styles')
<style>
    .hero { background: linear-gradient(135deg, #1e2a3a 0%, #0f1724 100%); }
    .card { transition: transform 0.2s; }
    .card:hover { transform: translateY(-5px); box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.1); }
</style>
@endpush
