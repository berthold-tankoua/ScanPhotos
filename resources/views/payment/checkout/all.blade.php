@extends('main_master')

@section('title')
    ScanPhoto | Checkout
@endsection

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card border-0 shadow-lg rounded-4">
                    <div class="card-body p-4">

                        <h3 class="fw-bold text-center mb-2">
                            Paiement sécurisé
                        </h3>

                        <!-- Récap prix -->
                        <div class="bg-light rounded-3 p-3 mb-2 text-center">
                            <div class="text-muted">Montant à payer</div>
                            <div class="fs-2 fw-bold">$5.00/mois</div>
                            <small class="text-muted">
                                Création événement illimitée + Accès aux fonctionnalités premium
                            </small>
                        </div>

                        <!-- Formulaire -->
                        <form method="POST" action="{{ route('subscription.checkout.confirm') }}">
                            @csrf
                            <input type="hidden" name="price" value="5">
                            <div class="mb-3">
                                <label class="form-label">Nom complet</label>
                                <input type="text" name="name" value="{{ Auth::user()->name }}"
                                    class="form-control form-control-lg" placeholder="Votre nom" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Adresse email</label>
                                <input type="email" name="email" value="{{ Auth::user()->email }}"
                                    class="form-control form-control-lg" placeholder="email@exemple.com" required>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill">
                                Confirmer le paiement
                            </button>
                        </form>

                        <p class="text-center text-muted small mt-4">
                            🔒 Paiement 100% sécurisé
                        </p>

                    </div>
                </div>

            </div>
            <div class="col-md-6">

                <div class="card border-0 shadow-lg rounded-4">
                    <div class="card-body p-4">

                        <h3 class="fw-bold text-center mb-2">
                            Paiement sécurisé
                        </h3>

                        <!-- Récap prix -->
                        <div class="bg-light rounded-3 p-3 mb-2 text-center">
                            <div class="text-muted">Montant à payer</div>
                            <div class="fs-2 fw-bold">$20.00</div>
                            <small class="text-muted">
                                Activation de l’événement
                            </small>
                        </div>

                        <!-- Formulaire -->
                        <form method="POST" action="{{ route('payment.checkout.confirm') }}">
                            @csrf
                            <input type="hidden" name="price" value="20">
                            <div class="mb-3">
                                <label class="form-label">Nom complet</label>
                                <input type="text" name="name" value="{{ Auth::user()->name }}"
                                    class="form-control form-control-lg" placeholder="Votre nom" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Adresse email</label>
                                <input type="email" name="email" value="{{ Auth::user()->email }}"
                                    class="form-control form-control-lg" placeholder="email@exemple.com" required>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill">
                                Confirmer le paiement
                            </button>
                        </form>

                        <p class="text-center text-muted small mt-4">
                            🔒 Paiement 100% sécurisé
                        </p>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
