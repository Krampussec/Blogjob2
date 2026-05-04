@extends('admin.layouts.layout')
@section('content')
    <!-- Page Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Создание категории</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Создание категории</h3>
                        </div>

                        <form method="POST" action="{{ route('categories.store') }}">
                            @csrf

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input
                                        type="text"
                                        name="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        id="title"
                                        placeholder="Название"
                                        value="{{ old('title') }}"
                                        required
                                    >
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">
                                    Сохранить
                                </button>
                                <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                                    Отмена
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
