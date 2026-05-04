<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::paginate(10);
        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:tags',
            'slug'  => 'required|string|max:255|unique:tags|regex:/^[a-z0-9-]+$/',
        ]);

        Tag::create($validated);

        return redirect()->route('tags.index')
            ->with('success', 'Тег успешно создан. Hel yes');
    }

    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:tags,title,' . $tag->id,
            'slug'  => 'required|string|max:255|unique:tags,slug,' . $tag->id . '|regex:/^[a-z0-9-]+$/',
        ]);

        $tag->update($validated);

        return redirect()->route('tags.index')
            ->with('success', 'Тег обновлён. chert vozmi da');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index')
            ->with('success', 'Тег удалён. (((');
    }
}
