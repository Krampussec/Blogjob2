<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PublicPostController extends Controller
{
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        $post->incrementViews();

        $post->load('category', 'tags');

        return view('posts.show', compact('post'));
    }
}
