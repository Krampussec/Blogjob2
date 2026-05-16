@extends('layouts.blog')

@section('title', $post->title . ' | Markedia')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 bg-transparent">
            @if($post->thumbnail)
                <img src="{{ asset('uploads/thumbnails/' . $post->thumbnail) }}" class="card-img-top rounded-4" alt="{{ $post->title }}">
            @endif
            <div class="card-body px-0">
                <div class="mb-3">
                    <a href="#" class="badge-category">{{ $post->category->title ?? 'Без категории' }}</a>
                    <span class="mx-2">•</span>
                    <span class="text-muted"><i class="far fa-calendar-alt"></i> {{ $post->getFormattedDate() }}</span>
                    <span class="mx-2">•</span>
                    <span class="text-muted"><i class="far fa-eye"></i> {{ $post->views }} просмотров</span>
                </div>
                <h1 class="display-5 fw-bold mb-4">{{ $post->title }}</h1>
                <div class="content fs-5 lh-lg">
                    {!! nl2br(e($post->content)) !!}
                </div>
                @if($post->tags->count())
                    <div class="mt-5">
                        <h5><i class="fas fa-tags"></i> Теги:</h5>
                        @foreach($post->tags as $tag)
                            <a href="#" class="badge bg-light text-dark me-1 p-2">{{ $tag->title }}</a>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .badge-category {
        background: #0d6efd;
        color: white;
        padding: 0.3rem 0.9rem;
        border-radius: 40px;
        text-decoration: none;
    }
    .content {
        color: #2c3e50;
    }
</style>
@endpush
