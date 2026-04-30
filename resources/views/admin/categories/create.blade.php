@extends('admin.layouts.layout')

@section('title', 'Добавить категорию')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Добавить категорию</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Главная</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Категории</a></li>
                    <li class="breadcrumb-item active">Добавить</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Новая категория</h3>
            </div>
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Название <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Введите название" value="{{ old('name') }}" required>
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="slug">Slug <span class="text-danger">*</span></label>
                        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" placeholder="url-адрес" value="{{ old('slug') }}" required>
                        <small class="form-text text-muted">Только латиница, цифры и дефис. Например: electronics</small>
                        @error('slug')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Описание</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="4" placeholder="Описание категории">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                    <a href="{{ route('categories.index') }}" class="btn btn-default">Отмена</a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
