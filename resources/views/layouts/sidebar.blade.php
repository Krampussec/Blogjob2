<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
    <div class="sidebar">
        <div class="widget-no-style">
            <div class="newsletter-widget text-center align-self-center">
                <h3>Subscribe Today!</h3>
                    @csrf
                    <input type="text" name="email" placeholder="Add your email here.." required class="form-control" />
                    <input type="submit" value="Subscribe" class="btn btn-default btn-block" />
                </form>
            </div>
        </div>

        <div class="widget">
            <h2 class="widget-title">Recent Posts</h2>
            <div class="blog-list-widget">
                <div class="list-group">
                    @foreach($recentPosts ?? [] as $post)
                        <a href="{{ route('posts.show', $post->slug) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="w-100 justify-content-between">
                                <img src="{{ $post->thumbnail ? asset('uploads/thumbnails/' . $post->thumbnail) : asset('assets/marketing/upload/small_07.jpg') }}" alt="" class="img-fluid float-left">
                                <h5 class="mb-1">{{ $post->title }}</h5>
                                <small>{{ $post->created_at->format('d M, Y') }}</small>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="widget">
            <h2 class="widget-title">Advertising</h2>
            <div class="banner-spot clearfix">
                <div class="banner-img">
                    <img src="{{ asset('assets/marketing/upload/banner_03.jpg') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>

        <div class="widget">
            <h2 class="widget-title">Instagram Feed</h2>
            <div class="instagram-wrapper clearfix">
                @for($i=1; $i<=9; $i++)
                    <a href="#"><img src="{{ asset('assets/marketing/upload/small_0'.$i.'.jpg') }}" alt="" class="img-fluid"></a>
                @endfor
            </div>
        </div>

        <div class="widget">
            <h2 class="widget-title">Popular Categories</h2>
            <div class="link-widget">
                <ul>
                    @foreach($popularCategories ?? [] as $cat)
                        <li><a href="#">{{ $cat->title }} <span>({{ $cat->posts_count }})</span></a></li>
                    @endforeach
                </ul>
            </div>

            <!-- Tags Widget -->
            <div class="widget">
                <h2 class="widget-title">All Tags</h2>
                <div class="tag-cloud">
                    @if(isset($allTags) && $allTags->count())
                        @foreach($allTags as $tag)
                            <a href="#" class="badge badge-light" style="background: #f0f0f0; color: #333; margin: 3px; padding: 5px 10px;">
                                {{ $tag->title }} <span class="small">({{ $tag->posts_count ?? $tag->posts->count() }})</span>
                            </a>
                        @endforeach
                    @else
                        <p>No tags yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
