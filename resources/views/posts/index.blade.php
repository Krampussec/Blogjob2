<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Markedia - Marketing Blog</title>
    <meta name="keywords" content="marketing, blog, earn, digital">
    <meta name="description" content="Блог о маркетинге, заработке и digital-стратегиях">

    <link rel="shortcut icon" href="{{ asset('assets/marketing/images/favicon.ico') }}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{ asset('assets/marketing/images/apple-touch-icon.png') }}">

    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet">

    <link href="{{ asset('assets/marketing/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/marketing/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/marketing/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/marketing/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/marketing/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/marketing/css/colors.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/marketing/css/version/marketing.css') }}" rel="stylesheet">
</head>

<body>
<div id="wrapper">
    <header class="market-header header">
        <div class="container-fluid">
            <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="{{ route('blog') }}">
                    <img src="{{ asset('assets/marketing/images/version/market-logo.png') }}" alt="Markedia">
                </a>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ route('blog') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('blog') }}">Blog</a></li>
                        @auth
                            <li class="nav-item"><a class="nav-link" href="{{ url('/admin') }}">Admin</a></li>
                        @endauth
                    </ul>
                    <form class="form-inline" action="{{ route('search') }}" method="GET">
                        <input class="form-control mr-sm-2" type="text" name="s" placeholder="How may I help?" value="{{ request('s') }}">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>
        </div>
    </header>

    <section id="cta" class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 align-self-center">
                    <h2>A digital marketing blog</h2>
                    <p class="lead"> Aenean ut hendrerit nibh. Duis non nibh id tortor consequat cursus at mattis felis. Praesent sed lectus et neque auctor dapibus in non velit. Donec faucibus odio semper risus rhoncus rutrum. Integer et ornare mauris.</p>
                    <a href="#" class="btn btn-primary">Try for free</a>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="newsletter-widget text-center align-self-center">
                        <h3>Subscribe Today!</h3>
                        <p>Subscribe to our weekly Newsletter and receive updates via email.</p>
                        <form class="form-inline" method="POST" action="#">
                            @csrf
                            <input type="text" name="email" placeholder="Add your email here.." required class="form-control" />
                            <input type="submit" value="Subscribe" class="btn btn-default btn-block" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section lb">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="blog-custom-build">
                            @forelse($posts as $post)
                            <div class="blog-box wow fadeIn">
                                <div class="post-media">
                                    <a href="{{ route('posts.show', $post->slug) }}" title="">
                                        <img src="{{ $post->thumbnail ? asset('uploads/thumbnails/' . $post->thumbnail) : asset('assets/marketing/upload/market_blog_01.jpg') }}" alt="" class="img-fluid">
                                        <div class="hovereffect"><span></span></div>
                                    </a>
                                </div>
                                <div class="blog-meta big-meta text-center">
                                    <div class="post-sharing">
                                        <ul class="list-inline">
                                            <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                            <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                            <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                    <h4><a href="{{ route('posts.show', $post->slug) }}" title="">{{ $post->title }}</a></h4>
                                    <p>{{ Str::limit(strip_tags($post->content), 150) }}</p>
                                    <small><a href="{{ route('posts.show', $post->slug) }}" title="">{{ $post->created_at->format('d M, Y') }}</a></small>
                                    <small><a href="#" title="">by {{ $post->user->name ?? 'Admin' }}</a></small>
                                    <small><a href="#" title=""><i class="fa fa-eye"></i> {{ $post->views }}</a></small>
                                </div>
                            </div>
                            <hr class="invis">
                            @empty
                                <div class="alert alert-warning text-center">No posts found.</div>
                            @endforelse
                        </div>
                    </div>

                    <hr class="invis">
                    <!-- ПАГИНАЦИЯ -->
                    <div class="row">
                        <div class="col-md-12">
                        </div>
                    </div>
                </div><!-- end col-lg-8 -->

                <!-- ПРАВАЯ КОЛОНКА: САЙДБАР -->
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="sidebar">
                        <!-- Recent Posts -->
                        <div class="widget">
                            <h2 class="widget-title">Recent Posts</h2>
                            <div class="blog-list-widget">
                                <div class="list-group">
                                    @foreach($recentPosts ?? [] as $recent)
                                        <a href="{{ route('posts.show', $recent->slug) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <img src="{{ $recent->thumbnail ? asset('uploads/thumbnails/' . $recent->thumbnail) : asset('assets/marketing/upload/small_07.jpg') }}" alt="" class="img-fluid float-left">
                                                <h5 class="mb-1">{{ $recent->title }}</h5>
                                                <small>{{ $recent->created_at->format('d M, Y') }}</small>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Advertising -->
                        <div class="widget">
                            <h2 class="widget-title">Advertising</h2>
                            <div class="banner-spot clearfix">
                                <div class="banner-img">
                                    <img src="{{ asset('assets/marketing/upload/banner_03.jpg') }}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>

                        <!-- Instagram Feed -->
                        <div class="widget">
                            <h2 class="widget-title">Instagram Feed</h2>
                            <div class="instagram-wrapper clearfix">
                                @for($i=1; $i<=9; $i++)
                                    <a href="#"><img src="{{ asset('assets/marketing/upload/small_0'.$i.'.jpg') }}" alt="" class="img-fluid"></a>
                                @endfor
                            </div>
                        </div>

                        <!-- Popular Categories -->
                        <div class="widget">
                            <h2 class="widget-title">Popular Categories</h2>
                            <div class="link-widget">
                                <ul>

                                </ul>
                            </div>
                        </div>
                    </div><!-- end sidebar -->
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="widget">
                        <h2 class="widget-title">Recent Posts</h2>
                        <div class="blog-list-widget">
                            <div class="list-group">
                                @foreach($recentPostsFooter ?? [] as $recent)
                                    <a href="{{ route('posts.show', $recent->slug) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="w-100 justify-content-between">
                                            <img src="{{ $recent->thumbnail ? asset('uploads/thumbnails/' . $recent->thumbnail) : asset('assets/marketing/upload/small_04.jpg') }}" alt="" class="img-fluid float-left">
                                            <h5 class="mb-1">{{ $recent->title }}</h5>
                                            <small>{{ $recent->created_at->format('d M, Y') }}</small>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="widget">
                        <h2 class="widget-title">Popular Posts</h2>
                        <div class="blog-list-widget">
                            <div class="list-group">
                                @foreach($popularPostsFooter ?? [] as $popular)
                                    <a href="{{ route('posts.show', $popular->slug) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="w-100 justify-content-between">
                                            <img src="{{ $popular->thumbnail ? asset('uploads/thumbnails/' . $popular->thumbnail) : asset('assets/marketing/upload/small_01.jpg') }}" alt="" class="img-fluid float-left">
                                            <h5 class="mb-1">{{ $popular->title }}</h5>
                                            <span class="rating">
                                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                            </span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="widget">
                        <h2 class="widget-title">Popular Categories</h2>
                        <div class="link-widget">
                            <ul>
                                @foreach($popularCategoriesFooter ?? [] as $cat)
                                    <li><a href="{{ route('category.show', $cat->slug) }}">{{ $cat->title }} <span>({{ $cat->posts_count }})</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <br><br>
                    <div class="copyright">&copy; {{ date('Y') }} Markedia. Design: <a href="http://html.design">HTML Design</a>.</div>
                </div>
            </div>
        </div>
    </footer>

    <div class="dmtop">Scroll to Top</div>
</div>

<script src="{{ asset('assets/marketing/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/marketing/js/tether.min.js') }}"></script>
<script src="{{ asset('assets/marketing/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/marketing/js/animate.js') }}"></script>
<script src="{{ asset('assets/marketing/js/custom.js') }}"></script>
</body>
</html>
