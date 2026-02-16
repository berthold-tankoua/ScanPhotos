@extends('main_master')

@section('title')
    EventFace | Connexion
@endsection

@section('content')
    <style>
        .auth-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background-color: #f8fafc;
            padding: 30px 0;
        }

        .auth-container {
            background: white;
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.08);
        }

        /* Section Guide à droite */
        .guide-side {
            background: linear-gradient(135deg, #1e293b 0%, #0d6efd 100%);
            color: white;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .step-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 30px;
        }

        .step-icon {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-right: 20px;
            flex-shrink: 0;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .form-side {
            padding: 60px;
        }

        .form-control-lg {
            border-radius: 12px;
            font-size: 1rem;
            padding: 12px 20px;
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
        }

        .btn-login {
            padding: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        @media (max-width: 991px) {
            .guide-side {
                display: none;
            }

            /* On cache le guide sur mobile pour focus sur le form */
        }
    </style>

    <div class="auth-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-11 col-xl-10">
                    <div class="auth-container">
                        <div class="row g-0">

                            <div class="col-lg-6 form-side">
                                <div class="mb-1">
                                    <h2 class="fw-bold mb-2">Bon retour 👋</h2>
                                    <p class="text-muted">Connectez-vous pour gérer vos événements.</p>
                                </div>

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label small fw-bold text-uppercase"
                                            style="letter-spacing: 1px;">Email</label>
                                        <input type="email" class="form-control form-control-lg" name="email"
                                            placeholder="email@example.com" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label small fw-bold text-uppercase"
                                            style="letter-spacing: 1px;">Mot de passe</label>
                                        <input type="password" class="form-control form-control-lg" name="password"
                                            placeholder="••••••••" required>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="remember">
                                            <label class="form-check-label small" for="remember">Rester connecté</label>
                                        </div>
                                        <a href="{{ route('password.request') }}"
                                            class="small text-decoration-none fw-semibold">Oublié ?</a>
                                    </div>

                                    <button type="submit"
                                        class="btn btn-primary btn-login btn-lg w-100 rounded-pill shadow-sm mb-4">
                                        Se connecter
                                    </button>

                                    <div class="text-center">
                                        <p class="small text-muted">
                                            Pas encore de compte ?
                                            <a href="{{ route('register') }}"
                                                class="text-primary fw-bold text-decoration-none">S'inscrire
                                                gratuitement</a>
                                        </p>
                                    </div>
                                </form>
                            </div>

                            <div class="col-lg-6 guide-side">
                                <h4 class="fw-bold mb-4">Prêt à lancer votre événement ?</h4>
                                <p class="opacity-75 mb-5">Suivez ces étapes simples pour automatiser le partage de vos
                                    photos :</p>

                                <div class="step-item">
                                    <div class="step-icon">1</div>
                                    <div>
                                        <h6 class="fw-bold mb-1">Authentification</h6>
                                        <p class="small opacity-75 mb-0">Créez votre compte pro et connectez-vous à votre
                                            espace personnel.</p>
                                    </div>
                                </div>

                                <div class="step-item">
                                    <div class="step-icon">2</div>
                                    <div>
                                        <h6 class="fw-bold mb-1">Création d'événement</h6>
                                        <p class="small opacity-75 mb-0">ex: Mariage Sarah & Marc.</p>
                                    </div>
                                </div>

                                <div class="step-item">
                                    <div class="step-icon">3</div>
                                    <div>
                                        <h6 class="fw-bold mb-1">Upload intelligent</h6>
                                        <p class="small opacity-75 mb-0">Chargez vos photos. Notre IA commence l'analyse
                                            immédiatement.</p>
                                    </div>
                                </div>

                                <div class="step-item">
                                    <div class="step-icon">4</div>
                                    <div>
                                        <h6 class="fw-bold mb-1">Diffusion</h6>
                                        <p class="small opacity-75 mb-0">Partagez le lien ou le QR Code généré à vos
                                            invités.</p>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
