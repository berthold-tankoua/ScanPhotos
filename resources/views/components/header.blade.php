    <nav class="navbar navbar-expand-lg bg-white sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="#">📸 ScanPhoto</a>
            @auth
                <a href="{{ route('logout') }}" class="btn btn-danger btn-sm ">
                    Déconnexion
                </a>
            @else
                <a href="{{ route('take.picture') }}" class="btn btn-brand btn-sm">Démarrer</a>
            @endauth

        </div>
    </nav>
