@extends('admin.layouts.layout')

@section('content')
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Редактирование категории: {{ $category->title }}</h3>
    </div>
    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror"
                       id="title" name="title" value="{{ old('title', $category->title) }}" required>
                @error('title')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="slug">слуг</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                       id="slug" name="slug" value="{{ old('slug', $category->slug) }}" required>
                <small class="form-text text-muted">Только латиница, цифры, дефисы. Например: <strong>novaya-kategoriya</strong></small>
                @error('slug')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Обновить</button>
            <a href="{{ route('categories.index') }}" class="btn btn-default">Отмена</a>
        </div>
    </form>
</div>
@endsection
