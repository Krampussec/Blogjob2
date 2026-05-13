@extends('admin.layouts.layout')

@section('title', 'Добавить пост')

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Новый пост</h3>
    </div>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <!-- Заголовок -->
            <div class="form-group">
                <label>Заголовок</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <!-- Категория -->
            <div class="form-group">
                <label>Категория</label>
                <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                    <option value="">-- Выберите категорию --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <!-- Теги (Select2) -->
            <div class="form-group">
                <label>Теги</label>
                <select name="tags[]" class="form-control select2" multiple="multiple" data-placeholder="Выберите теги">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'selected' : '' }}>
                            {{ $tag->title }}
                        </option>
                    @endforeach
                </select>
                @error('tags')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            <!-- Краткое описание -->
            <div class="form-group">
                <label>Краткое описание</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description') }}</textarea>
                @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <!-- Полный текст (content) – обязательно -->
            <div class="form-group">
                <label>Содержание поста</label>
                <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="10" required>{{ old('content') }}</textarea>
                @error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <!-- Миниатюра -->
            <div class="form-group">
                <label>Миниатюра</label>
                <input type="file" name="thumbnail" class="form-control-file @error('thumbnail') is-invalid @enderror">
                @error('thumbnail')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Сохранить</button>
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
