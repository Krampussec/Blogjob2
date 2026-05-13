<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View|ViewFactory
     */
    public function index()
    {
        $posts = Post::with('category', 'tags')->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
        {
            $validated = $request->validate([
                'title'       => 'required|string|max:255',
                'content'     => 'required|string',
                'category_id' => 'required|exists:categories,id',
                'tags'        => 'array|exists:tags,id',
                'thumbnail'   => 'nullable|image|max:2048',
                'description' => 'nullable|string'
            ]);

            $validated['slug'] = Str::slug($request->title);

            $slug = Str::slug($request->title);
            $originalSlug = $slug;
            $count = 1;
            while (Post::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $count++;
            }
            $validated['slug'] = $slug;

            if ($request->hasFile('thumbnail')) {
                $filename = time() . '_' . $request->file('thumbnail')->getClientOriginalName();
                $request->file('thumbnail')->move(public_path('uploads/thumbnails'), $filename);
                $validated['thumbnail'] = $filename;
            }

            $post = Post::create($validated);
            $post->tags()->sync($request->tags ?? []);

            return redirect()->route('posts.index')->with('success', 'Пост создан.');
        }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        $post = Post::with(['category', 'tags'])->findOrFail($id);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function edit(Post $post)
    {
        $post->load('tags');
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'slug'        => 'required|string|max:255|unique:posts,slug,' . $post->id,
            'content'     => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'tags'        => 'array|exists:tags,id',
            'thumbnail'   => 'nullable|image|max:2048',
        ]);


        if ($request->hasFile('thumbnail')) {
                $filename = time() . '_' . $request->file('thumbnail')->getClientOriginalName();
                $request->file('thumbnail')->move(public_path('uploads/thumbnails'), $filename);
                $validated['thumbnail'] = $filename;
        }

        $post->update($validated);
        $post->tags()->sync($request->tags ?? []);

        return redirect()->route('posts.index')->with('success', 'Пост обновлён.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $post = Post::findOrFail($id);
        $post->tags()->detach();
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Статья удалена');
    }
}
