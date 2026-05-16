<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('s');

        $posts = Post::with('category', 'tags')
                     ->where('title', 'LIKE', "%{$query}%")
                     ->orderBy('created_at', 'desc')
                     ->paginate(6)
                     ->appends(['s' => $query]); 

        return view('posts.search', compact('posts', 'query'));
    }
}
