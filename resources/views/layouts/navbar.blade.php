<header class="market-header header">
    <div class="container-fluid">
        <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="{{ route('blog') }}">
                <img src="{{ asset('assets/marketing/images/version/market-logo.png') }}" alt="Markedia">
            </a>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('blog') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('blog') }}">Blog</a></li>
                    @auth
                        <li class="nav-item"><a class="nav-link" href="{{ url('/admin') }}">Admin</a></li>
                    @endauth
                </ul>
                <form class="form-inline" action="{{ route('search') }}" method="GET">
                    <input class="form-control mr-sm-2" type="text" name="s" placeholder="How may I help?" value="{{ request('s') }}">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </div>
</header>
