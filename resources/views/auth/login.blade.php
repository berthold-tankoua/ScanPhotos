@extends('main_master')

@section('title')
    ScanPhoto | Vos souvenirs en un instant
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body p-4">

                        <h4 class="text-center mb-4">Connexion</h4>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="email@example.com"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" name="password" placeholder="••••••••" required>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember">
                                    <label class="form-check-label" for="remember">
                                        Se souvenir de moi
                                    </label>
                                </div>
                                <a href="#" class="small">Mot de passe oublié ?</a>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                Se connecter
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
