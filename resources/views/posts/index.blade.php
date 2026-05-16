@extends('layouts.blog')

@section('title', 'Блог | Markedia')

@section('hero')
<div class="hero">
    <div class="container">
        <h1>A digital marketing blog</h1>
        <p>Aenean ut hendrerit nibh. Duis porta libero, egestas at velit sed. Praesent sed lectus et neque auctor aliquet. Nam vestibulum risus rhoncus rutrum.</p>
        <a href="#" class="btn btn-light btn-lg rounded-pill px-4 mt-3">Try for free →</a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    @if($posts->count())
        @foreach($posts as $post)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100">
                @if($post->thumbnail)
                    <img src="{{ asset('uploads/thumbnails/' . $post->thumbnail) }}" class="card-img-top" alt="{{ $post->title }}">
                @endif
                <div class="card-body">
                    <div class="mb-2">
                        <a href="#" class="badge-category">{{ $post->category->title ?? 'Без категории' }}</a>
                    </div>
                    <h5 class="card-title">
                        <a href="{{ route('posts.show', $post->slug) }}" class="text-dark text-decoration-none">{{ $post->title }}</a>
                    </h5>
                    <p class="card-text text-muted">{{ Str::limit(strip_tags($post->content), 100) }}</p>
                    <div class="d-flex justify-content-between">
                        <small class="text-muted"><i class="far fa-calendar-alt"></i> {{ $post->getFormattedDate() }}</small>
                        <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-sm btn-outline-primary rounded-pill">Читать →</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="d-flex justify-content-center mt-4">
            {{ $posts->links() }}
        </div>
    @else
        <div class="alert alert-info">Пока нет постов.</div>
    @endif
</div>
@endsection

@push('styles')
<style>
    .hero {
        background: linear-gradient(135deg, #1e2a3a 0%, #0f1724 100%);
        color: white;
        padding: 4rem 0;
        text-align: center;
        margin-bottom: 2rem;
    }
    .hero h1 { font-size: 3rem; font-weight: 800; }
    .badge-category {
        background: #0d6efd;
        color: white;
        padding: 0.3rem 0.9rem;
        border-radius: 40px;
        font-size: 0.75rem;
        text-decoration: none;
    }
    .card {
        border: none;
        border-radius: 20px;
        transition: 0.2s;
    }
    .card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.05); }
</style>
@endpush
