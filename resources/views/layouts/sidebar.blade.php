
<div class="sidebar-widget">
    <h5><i class="fas fa-fire me-2"></i> Популярные посты</h5>
    <ul class="list-unstyled">
        @forelse($popularPosts as $post)
            <li class="mb-3">
                <a href="{{ route('posts.show', $post->slug) }}" class="text-decoration-none fw-semibold">
                    {{ $post->title }}
                </a>
                <div class="small text-muted">
                    <i class="far fa-eye"></i> {{ $post->views }} просмотров
                </div>
            </li>
        @empty
            <li>Нет популярных постов</li>
        @endforelse
    </ul>
</div>

<div class="sidebar-widget mt-4">
    <h5><i class="fas fa-folder me-2"></i> Категории</h5>
    <ul class="list-unstyled">
        @foreach($categoriesWithCount as $category)
            <li class="mb-2">
                <a href="#" class="text-decoration-none">
                    {{ $category->title }}
                    <span class="badge bg-secondary float-end">{{ $category->posts_count }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</div>
