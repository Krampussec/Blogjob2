@extends('admin.layouts.layout')

@section('title', 'Редактирование категории')

@section('content_header')
    <h1>Редактировать категорию: {{ $category->name }}</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('categories.update', $category) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Название</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $category->name) }}" required>
                    @error('name')<span class="invalid-feedback">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label>Slug</label>
                    <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $category->slug) }}" required>
                    @error('slug')<span class="invalid-feedback">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label>Описание</label>
                    <textarea name="description" class="form-control">{{ old('description', $category->description) }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Обновить</button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Назад</a>
            </form>
        </div>
    </div>
@endsection
