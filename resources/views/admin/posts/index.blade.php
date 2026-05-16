@extends('admin.layouts.layout')

@section('title', 'Посты')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Посты</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Главная</a></li>
                    <li class="breadcrumb-item active">Посты</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('posts.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Добавить пост
                </a>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="icon fas fa-check"></i> {{ session('success') }}
                    </div>
                @endif

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 50px">ID</th>
                            <th>Заголовок</th>
                            <th>Теги</th>
                            <th>Статус</th>
                            <th style="width: 150px">Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>
                                    {{ $post->tags->implode('title', ', ') }}
                                </td>
                                <td>
                                    @if($post->is_published)
                                        <span class="badge badge-success">Опубликован</span>
                                    @else
                                        <span class="badge badge-secondary">Черновик</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning btn-sm" title="Редактировать">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Вы уверены, что хотите удалить пост «{{ $post->title }}»?')" title="Удалить">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="text-center">Посты отсутствуют</td></tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-3 d-flex justify-content-end">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

