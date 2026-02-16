    <nav class="navbar navbar-expand-lg bg-white sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="{{ url('/') }}">📸 EventFace</a>
            @auth
                <a href="{{ route('dashboard') }}" class="btn btn-danger btn-sm ">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="btn btn-brand btn-sm">Connexion</a>
            @endauth

        </div>
    </nav>
