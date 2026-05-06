@extends('admin.layouts.layout')

@section('title', 'Редактировать пост')

@section('content')
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Редактирование: {{ $post->title }}</h3>
    </div>
    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label>Заголовок</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $post->title) }}" required>
                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label>Slug</label>
                <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $post->slug) }}" required>
                @error('slug')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label>Категория</label>
                <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                    <option value="">-- Выберите --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ (old('category_id', $post->category_id) == $category->id) ? 'selected' : '' }}>
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label>Теги</label>
                <select name="tags[]" class="form-control select2" multiple="multiple" data-placeholder="Выберите теги">
                    @foreach($tags as $tag)
                        @php
                            // Безопасное получение id и title (работает и с объектом, и со строкой)
                            $tagId = is_object($tag) ? $tag->id : $tag;
                            $tagTitle = is_object($tag) ? ($tag->title ?? $tag) : $tag;

                            // Получаем массив id выбранных тегов (из old или из связанных тегов поста)
                            $selectedIds = old('tags', $post->tags->pluck('id')->toArray());
                            $selected = in_array($tagId, $selectedIds);
                        @endphp
                        <option value="{{ $tagId }}" {{ $selected ? 'selected' : '' }}>
                            {{ $tagTitle }}
                        </option>
                    @endforeach
                </select>
                @error('tags')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label>Содержание</label>
                <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="6">{{ old('content', $post->content) }}</textarea>
                @error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label>Миниатюра</label>
                @if($post->thumbnail)
                    <div class="mb-2">
                        <img src="{{ Storage::url($post->thumbnail) }}" height="80" alt="Thumbnail">
                    </div>
                @endif
                <input type="file" name="thumbnail" class="form-control-file @error('thumbnail') is-invalid @enderror">
                <small class="text-muted">Оставьте пустым, если не хотите менять</small>
                @error('thumbnail')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Обновить</button>
            <a href="{{ route('posts.index') }}" class="btn btn-default">Отмена</a>
        </div>
    </form>
</div>
@endsection

@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2-bootstrap4-theme@1.0.0/dist/select2-bootstrap4.min.css" rel="stylesheet">
@endpush

@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(function () {
        $('.select2').select2({
            theme: 'bootstrap4',
            width: '100%',
            placeholder: 'Выберите теги',
            allowClear: true
        });
    });
</script>
@endpush
