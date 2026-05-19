<?php

namespace App\Providers;

use App\Models\Tag;
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
        $popularCategories = Category::withCount('posts')
                                     ->orderBy('posts_count', 'desc')
                                     ->take(7)
                                     ->get();

        $recentPosts = Post::latest()->take(5)->get();

        $view->with([
            'popularCategories' => $popularCategories,
            'recentPosts'       => $recentPosts,
        ]);
    });

        View::composer('layouts.sidebar', function ($view) {
            $allTags = Tag::withCount('posts')->orderBy('title')->get();
            $view->with('allTags', $allTags);
        });

        View::composer('posts.index', function ($view) {
            $allTags = Tag::withCount('posts')->orderBy('title')->get();
            $view->with('allTags', $allTags);

             $popularCategories = Category::withCount('posts')
                                     ->orderBy('posts_count', 'desc')
                                     ->take(7)
                                     ->get();

            $recentPosts = Post::latest()->take(5)->get();

            $view->with([
                'popularCategories' => $popularCategories,
                'recentPosts'       => $recentPosts,
            ]);
        });
    }
}
