@extends('main_master')

@section('title')
    EventFace | Créer un compte
@endsection

@section('content')
    <style>
        .auth-bg {
            background: radial-gradient(circle at top right, rgba(13, 110, 253, 0.05), transparent),
                linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .auth-card {
            border: none;
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .auth-header {
            background: white;
            padding: 30px 4px 2px;
            text-align: center;
        }

        .form-control,
        .form-select {
            padding: 12px 16px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            background-color: #f8fafc;
            transition: all 0.2s;
        }

        .form-control:focus,
        .form-select:focus {
            background-color: #fff;
            border-color: #0d6efd;
            box-shadow: 0 0 0 4px rgba(13, 110, 253, 0.1);
        }

        .btn-register {
            padding: 12px;
            border-radius: 12px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s;
        }

        .role-icon {
            font-size: 1.2rem;
            margin-right: 8px;
        }
    </style>

    <div class="auth-bg">
        <div class="container my-3">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-md-8 col-lg-5">

                    <div class="card auth-card">
                        <div class="auth-header">
                            <h4 class="fw-bold mb-1">Rejoignez l'aventure</h4>
                            <p class="text-muted small">Créez votre compte en quelques secondes</p>
                        </div>

                        <div class="card-body p-4 p-md-4 ">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label small fw-bold">Nom complet</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="name"
                                            placeholder="Ex: Jean Dupont" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label small fw-bold">Adresse Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="nom@exemple.com"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label small fw-bold">Vous êtes ?</label>
                                    <select class="form-select" name="role" required>
                                        <option value="" disabled selected>Choisissez votre profil</option>
                                        <option value="user">🎉 Organisateur / Client</option>
                                        <option value="photographer">📸 Photographe Professionnel</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label small fw-bold">Mot de passe</label>
                                    <input type="password" class="form-control" name="password" placeholder="••••••••"
                                        required>
                                </div>

                                <button type="submit" class="btn btn-primary btn-register w-100 shadow-sm mb-3">
                                    Créer mon compte
                                </button>

                                <div class="text-center">
                                    <p class="small text-muted mb-0">Déjà membre ?
                                        <a href="{{ route('login') }}" class="text-primary fw-bold text-decoration-none">Se
                                            connecter</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
