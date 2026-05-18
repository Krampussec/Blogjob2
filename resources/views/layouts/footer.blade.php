<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <h2 class="widget-title">Recent Posts</h2>
                    <div class="blog-list-widget">
                        <div class="list-group">
                            @foreach($recentPostsFooter ?? [] as $post)
                                <a href="{{ route('posts.show', $post->slug) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="{{ $post->thumbnail ? asset('uploads/thumbnails/' . $post->thumbnail) : asset('assets/marketing/upload/small_04.jpg') }}" alt="" class="img-fluid float-left">
                                        <h5 class="mb-1">{{ $post->title }}</h5>
                                        <small>{{ $post->created_at->format('d M, Y') }}</small>
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
                            @foreach($popularPostsFooter ?? [] as $post)
                                <a href="{{ route('posts.show', $post->slug) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="{{ $post->thumbnail ? asset('uploads/thumbnails/' . $post->thumbnail) : asset('assets/marketing/upload/small_01.jpg') }}" alt="" class="img-fluid float-left">
                                        <h5 class="mb-1">{{ $post->title }}</h5>
                                        <span class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span>
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
