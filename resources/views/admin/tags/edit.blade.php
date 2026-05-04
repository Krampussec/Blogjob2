@extends('admin.layouts.layout')

@section('title', 'Редактировать тег')

@section('content')
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Редактирование тега: {{ $tag->title }}</h3>
    </div>
    <form action="{{ route('tags.update', $tag) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror"
                       id="title" name="title" value="{{ old('title', $tag->title) }}" required>
                @error('title')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="slug">Слуг</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                       id="slug" name="slug" value="{{ old('slug', $tag->slug) }}" required>
                <small class="form-text text-muted">Только латиница, цифры и дефисы. Например: <strong>novyj-teg</strong></small>
                @error('slug')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Обновить</button>
            <a href="{{ route('tags.index') }}" class="btn btn-default">Отмена</a>
        </div>
    </form>
</div>
@endsection
