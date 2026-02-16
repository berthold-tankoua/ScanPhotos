@extends('main_master')

@section('title')
    EventFace | À propos de notre technologie
@endsection

@section('content')
    <style>
        .about-header {
            background: linear-gradient(135deg, #1e293b 0%, #0d6efd 100%);
            padding: 50px 0;
            color: white;
            clip-path: ellipse(150% 100% at 50% 0%);
        }

        .feature-icon-small {
            width: 48px;
            height: 48px;
            background: rgba(13, 110, 253, 0.1);
            color: #0d6efd;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        .story-card {
            border: none;
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .tech-stack-badge {
            background: #f1f5f9;
            color: #475569;
            padding: 8px 16px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-block;
            margin: 4px;
        }
    </style>

    <header class="about-header text-center">
        <div class="container">
            <h1 class="display-4 fw-bold mb-3 ">Redéfinir le partage de souvenirs</h1>
            <p class="lead opacity-75 mx-auto" style="max-width: 900px;">
                EventFace est né d'un constat simple : nous vivons des moments extraordinaires, mais nous perdons trop
                souvent les photos qui les immortalisent.
            </p>
        </div>
    </header>

    <section class="py-5">
        <div class="container ">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <h6 class="text-primary fw-bold text-uppercase">Notre Mission</h6>
                    <h2 class="display-7 fw-bold mb-4">L'IA au service de l'humain</h2>
                    <p class="text-muted fs-5">
                        Lors d’un événement(mariage, gala ou soirée privée) des centaines, voire des milliers de photos sont
                        prises.
                    </p>
                    <p class="text-muted fs-5">
                        Pour un invité, retrouver ses photos devient rapidement un véritable parcours du combattant.
                        Pour le photographe ou l’organisateur, la distribution se transforme en un cauchemar logistique.
                    </p>
                    <p class="text-muted fs-5">
                        <strong>EventFace</strong> permet aux invités grâce à un simple selfie, de retrouver instantanément
                        toutes les photos sur lesquelles ils apparaissent ou de télécharger l’intégralité de l’album de
                        l’événement.
                    </p>
                </div>
                <div class="col-lg-6">
                    <div class="card story-card p-2 bg-white">
                        <img src="https://images.unsplash.com/photo-1511795409834-ef04bbd61622?auto=format&fit=crop&w=800"
                            class="img-fluid rounded-4 shadow-sm" alt="Événementiel">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container ">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Une technologie invisible, des résultats concrets</h2>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 p-4 border-0 shadow-sm rounded-4">
                        <div class="feature-icon-small"><i class="bi bi-shield-lock-fill"></i></div>
                        <h5 class="fw-bold">Sécurité & Confidentialité</h5>
                        <p class="text-muted small">
                            Nous ne stockons pas vos données biométriques. Votre selfie est converti en une empreinte
                            mathématique temporaire pour la comparaison, puis immédiatement supprimé.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 p-4 border-0 shadow-sm rounded-4">
                        <div class="feature-icon-small"><i class="bi bi-lightning-charge-fill"></i></div>
                        <h5 class="fw-bold">Vitesse de traitement</h5>
                        <p class="text-muted small">
                            Grâce à nos serveurs GPU haute performance, l'analyse d'un album de 1 000 photos prend moins de
                            60 secondes.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 p-4 border-0 shadow-sm rounded-4">
                        <div class="feature-icon-small"><i class="bi bi-cloud-check-fill"></i></div>
                        <h5 class="fw-bold">Cloud Intelligent</h5>
                        <p class="text-muted small">
                            Vos photos sont hébergées sur des infrastructures S3 redondées, garantissant une disponibilité
                            de 99.9% et un téléchargement ultra-rapide.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6">
                    <h3 class="fw-bold mb-4">Pour les Photographes</h3>
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-success me-3"></i>
                            <span>Zéro temps perdu à envoyer des liens individuels.</span>
                        </li>
                        <li class="mb-3 d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-success me-3"></i>
                            <span>Valorisation de votre prestation avec une interface moderne.</span>
                        </li>
                        <li class="mb-3 d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-success me-3"></i>
                            <span>Possibilité de monétiser l'accès aux photos haute définition.</span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h3 class="fw-bold mb-4">Pour les Organisateurs</h3>
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-primary me-3"></i>
                            <span>Effet "Wow" garanti auprès de vos invités.</span>
                        </li>
                        <li class="mb-3 d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-primary me-3"></i>
                            <span>RGPD Friendly : chacun accède à ses propres photos.</span>
                        </li>
                        <li class="mb-3 d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-primary me-3"></i>
                            <span>Outil clé en main, aucune installation requise.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-dark text-white text-center rounded-top-5">
        <div class="container">
            <h5 class="mb-4 opacity-50">Propulsé par les meilleures technologies</h5>
            <div class="d-flex flex-wrap justify-content-center">
                <span class="tech-stack-badge">Laravel 10</span>
                <span class="tech-stack-badge">Python AI (Dlib)</span>
                <span class="tech-stack-badge">AWS S3</span>
                <span class="tech-stack-badge">MySQL</span>
                <span class="tech-stack-badge">Bootstrap 5</span>
                <span class="tech-stack-badge">Docker</span>
            </div>
        </div>
    </section>

    <section class="py-5 text-center">
        <div class="container">
            <h2 class="fw-bold mb-4">Prêt à changer votre façon de partager ?</h2>
            <div class="d-flex justify-content-center gap-3">
                <a href="{{ route('register') }}" class="btn btn-primary btn-lg rounded-pill px-5">Créer un compte</a>
                <a href="{{ url('/contact') }}" class="btn btn-outline-dark btn-lg rounded-pill px-5">Nous contacter</a>
            </div>
        </div>
    </section>
@endsection
