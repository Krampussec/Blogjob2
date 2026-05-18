@extends('layouts.blog')

@section('title', $post->title)
@section('description', Str::limit(strip_tags($post->content), 160))

@section('page-title')
<div class="page-title db">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2>{{ $post->title }}</h2>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('blog') }}">Home</a></li>

                    <li class="breadcrumb-item active">{{ $post->title }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
    <div class="page-wrapper">
        <div class="blog-custom-build">
            <div class="blog-box wow fadeIn">
                @if($post->thumbnail)
                <div class="post-media">
                    <img src="{{ asset('uploads/thumbnails/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="img-fluid">
                </div>
                @endif

                <div class="blog-meta big-meta text-center">
                    <h4>{{ $post->title }}</h4>
                    <p>{!! nl2br(e($post->content)) !!}</p>

                    <div class="post-sharing">
                        <ul class="list-inline">
                            <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                            <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                            <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>

                    <div class="post-meta-info">

                        <small>{{ $post->created_at->format('d M, Y') }}</small>
                        <small><i class="fa fa-eye"></i> {{ $post->views }}</small>
                    </div>

                    @if($post->tags->count())
                        <div class="tag-cloud">
                        </div>
                    @endif
                </div><!-- end meta -->
            </div><!-- end blog-box -->
        </div>
    </div>
</div>

@include('layouts.sidebar')
@endsection
