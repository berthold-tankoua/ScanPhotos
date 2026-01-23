@extends('main_master')

@section('title')
    ScanPhoto | Vos souvenirs en un instant
@endsection

@section('content')
    <!-- HERO -->
    <section class="hero py-5 text-center position-relative overflow-hidden">
        <div class="container position-relative z-1">

            <span class="badge bg-primary bg-opacity-10 text-primary mb-3 px-3 py-2 rounded-pill">
                Reconnaissance faciale intelligente
            </span>

            <h1 class="display-6 fw-bold mb-4 h3">
                Partagez les photos de vos événements<br>
                <span class="text-primary">avec vos proches</span>
            </h1>

            <p class="lead text-muted mx-auto mb-5" style="max-width:920px;">
                Vous organisez un événement (mariage, anniversaire, gala) ou êtes photographe ?
                ScanPhoto permet à vos invités et clients d’accéder
                automatiquement à leurs photos grâce à un simple selfie.
            </p>

            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="{{ route('register') }}" class="btn btn-brand btn-lg px-5">
                    Tester l’expérience
                </a>
                <a href="{{ route('about') }}" class="btn btn-outline-secondary btn-lg px-4">
                    Comment ça marche
                </a>
            </div>

        </div>
    </section>

    <!-- POUR QUI -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Pensé pour vos événements</h2>
                <p class="text-muted">
                    Une solution simple, rapide et moderne pour partager les souvenirs.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card card-custom h-100 p-4 text-center">
                        <div class="fs-1 mb-3">💍</div>
                        <h4>Organisateurs</h4>
                        <p class="text-muted">
                            Offrez à vos invités un accès immédiat à leurs photos
                            sans échanges interminables ni groupes WhatsApp.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-custom h-100 p-4 text-center">
                        <div class="fs-1 mb-3">📸</div>
                        <h4>Photographes</h4>
                        <p class="text-muted">
                            Automatisez la distribution des photos et valorisez
                            votre travail avec une expérience haut de gamme.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-custom h-100 p-4 text-center">
                        <div class="fs-1 mb-3">🎉</div>
                        <h4>Invités</h4>
                        <p class="text-muted">
                            Un simple selfie suffit pour retrouver toutes
                            les photos où vous apparaissez.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- PROCESS -->
    <section id="how" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Comment fonctionne ScanPhoto</h2>
                <p class="text-muted">Une technologie simple, pensée pour l’humain.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-3">
                    <div class="card process-card h-100 p-4 text-center border-0 shadow-sm">
                        <div class="step-number">01</div>
                        <h5>Import des photos</h5>
                        <p class="text-muted">
                            Le photographe importe les photos de l’événement.
                        </p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card process-card h-100 p-4 text-center border-0 shadow-sm">
                        <div class="step-number">02</div>
                        <h5>Analyse intelligente</h5>
                        <p class="text-muted">
                            L’IA analyse et indexe les visages en toute sécurité.
                        </p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card process-card h-100 p-4 text-center border-0 shadow-sm">
                        <div class="step-number">03</div>
                        <h5>Scan selfie</h5>
                        <p class="text-muted">
                            L’invité effectue un selfie depuis son téléphone.
                        </p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card process-card h-100 p-4 text-center border-0 shadow-sm">
                        <div class="step-number">04</div>
                        <h5>Accès instantané</h5>
                        <p class="text-muted">
                            Toutes les photos correspondantes s’affichent immédiatement.
                        </p>
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
