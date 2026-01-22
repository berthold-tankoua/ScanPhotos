<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ScanPhoto | Vos souvenirs en un instant</title>
    <meta name="description"
        content="ScanPhoto utilise l'IA pour retrouver instantanément vos photos d'événements en scannant votre visage. Idéal pour mariages, galas et anniversaires.">
    <meta name="keywords"
        content="ScanPhoto, reconnaissance faciale, IA, photos d'événements, mariage, gala, anniversaire, récupération de photos, technologie photo">
    <meta name="robots" content="index, follow" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicons -->
    <link href="{{ asset('logo.webp') }}" rel="icon">
    <link href="{{ asset('logo.webp') }}" rel="apple-touch-icon">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        :root {
            --primary: #4f46e5;
            --primary-dark: #3730a3;
        }

        /* Brand */
        .text-gradient {
            background: linear-gradient(to right, #1e293b, #4f46e5);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .btn-brand {
            background: var(--primary);
            color: #fff;
            border-radius: 50px;
            padding: 14px 30px;
            font-weight: 700;
        }

        .btn-brand:hover {
            background: var(--primary-dark);
            color: #fff;
        }

        /* Hero */
        .hero {
            padding: 40px 0;
            background: radial-gradient(circle at top right, #eef2ff, #ffffff);
        }

        .badge-soft {
            background: #e0e7ff;
            color: var(--primary);
        }

        /* Cards */
        .card-custom {
            border-radius: 24px;
            transition: transform 0.3s ease;
        }

        .card-custom:hover {
            transform: translateY(-8px);
            border-color: #818cf8;
        }

        /* Steps */
        .step-number {
            font-size: 3.5rem;
            font-weight: 800;
            color: #e5e7eb;
        }

        /* CTA */
        .cta {
            background: #0f172a;
            color: white;
            border-radius: 24px;
            padding: 80px 30px;
        }

        /* Footer */
        footer {
            border-top: 1px solid #e5e7eb;
        }

        .process-card {
            border-radius: 22px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: #ffffff;
        }

        .process-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 35px rgba(0, 0, 0, 0.12);
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-white sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="#">📸 ScanPhoto</a>
            <a href="{{ route('take.picture') }}" class="btn btn-brand btn-sm">Démarrer</a>
        </div>
    </nav>

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

    <!-- FOOTER -->
    <footer class="py-4 text-center text-muted">
        © 2026 ScanPhoto Tech – Créateur de sourires numériques
    </footer>

</body>

</html>
