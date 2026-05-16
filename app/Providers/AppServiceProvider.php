<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Post;
use App\Models\Category;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        View::composer('layouts.sidebar', function ($view) {
            $popularPosts = Post::orderBy('views', 'desc')
                                ->take(5)
                                ->get();

            $categoriesWithCount = Category::withCount('posts')
                                        ->orderBy('posts_count', 'desc')
                                        ->get();

            $view->with('popularPosts', $popularPosts)
                ->with('categoriesWithCount', $categoriesWithCount);
        });
    }
}
