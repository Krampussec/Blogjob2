<nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('blog') }}">Markedia</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{ route('blog') }}">Главная</a></li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin') }}">
                            <i class="fas fa-cog"></i> Админка
                        </a>
                    </li>
                @endauth

                <li class="nav-item ms-2">
                    <form action="{{ route('search') }}" method="GET" class="d-flex">
                        <input class="form-control form-control-sm me-1" type="search" name="s" placeholder="Поиск..." value="{{ request('s') }}" aria-label="Search">
                        <button class="btn btn-outline-primary btn-sm" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
