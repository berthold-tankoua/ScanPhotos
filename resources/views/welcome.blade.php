@extends('main_master')

@section('title')
    ScanPhoto | Vos souvenirs en un instant
@endsection

@section('content')
    <!-- HERO -->
    <section class="hero text-center">
        <div class="container">
            <span class="badge badge-soft mb-3">Nouveau : IA de reconnaissance faciale</span>
            <h1 class="display-5 fw-bold text-gradient mb-4">
                Scannez votre visage,<br>
                retrouvez instantanément vos photos.
            </h1>

            <p class="lead text-muted mx-auto mb-5" style="max-width: 650px;">
                La solution intelligente pour récupérer instantanément vos photos de mariage,
                gala ou anniversaire au milieu de milliers d’images.
            </p>
            <a href="{{ route('take.picture') }}" class="btn btn-brand btn-lg">Démarrer l’expérience</a>
        </div>
    </section>

    <!-- POUR QUI -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Pour tous vos moments</h2>
                <p class="text-muted">Une technologie de pointe au service de l’émotion.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card card-custom h-100 p-4">
                        <div class="fs-1 mb-3">💍</div>
                        <h4>Mariages</h4>
                        <p class="text-muted">
                            Offrez à vos invités le plaisir de découvrir leurs clichés sans attendre des semaines.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-custom h-100 p-4">
                        <div class="fs-1 mb-3">🎉</div>
                        <h4>Événements</h4>
                        <p class="text-muted">
                            Soirées d’entreprise ou festivals : chacun repart avec ses souvenirs.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-custom h-100 p-4">
                        <div class="fs-1 mb-3">📸</div>
                        <h4>Photographes</h4>
                        <p class="text-muted">
                            Automatisez la distribution et offrez une expérience client premium.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PROCESS -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Le processus ScanPhoto</h2>
            </div>
            <div class="row cursor-pointer">
                <div class="col-md-3">
                    <div class="card h-100 text-center border-0 shadow-sm process-card p-4">
                        <div class="step-number">01</div>
                        <h5>Upload rapide</h5>
                        <p class="text-muted">Le photographe charge les photos sur Google Drive sécurisé.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card h-100 text-center border-0 shadow-sm process-card p-4">
                        <div class="step-number">02</div>
                        <h5>Analyse IA</h5>
                        <p class="text-muted">L’algorithme identifie les visages automatiquement.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card h-100 text-center border-0 shadow-sm process-card p-4">
                        <div class="step-number">03</div>
                        <h5>Scan selfie</h5>
                        <p class="text-muted">L’invité prend un selfie pour s’identifier.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card h-100 text-center border-0 shadow-sm process-card p-4">
                        <div class="step-number">04</div>
                        <h5>Résultat instantané</h5>
                        <p class="text-muted">Toutes ses photos s’affichent immédiatement.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- CTA -->
    <section class="py-5">
        <div class="container">
            <div class="cta text-center">
                <h2 class="fw-bold mb-3">Besoin de plus d’informations ?</h2>
                <p class="opacity-75 mb-4">
                    Contactez-nous pour découvrir comment ScanPhoto peut s’adapter à votre événement.
                </p>

                <a href="/scan" class="btn btn-light btn-lg fw-bold rounded-pill">
                    En savoir plus
                </a>
            </div>
        </div>
    </section>
@endsection
