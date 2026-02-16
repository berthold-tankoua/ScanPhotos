@extends('main_master')

@section('title')
    EventFace | Paiement échoué
@endsection

@section('content')
    <div class="container py-5">

        <!-- Failed Card -->
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-8">

                <div class="card border-0 shadow-lg rounded-4 text-center p-4">
                    <div class="card-body">

                        <!-- Icon -->
                        <div class="mb-4">
                            <div class="bg-danger bg-opacity-10 text-danger rounded-circle d-inline-flex align-items-center justify-content-center"
                                style="width: 80px; height: 80px;">
                                <i class="bi bi-x-circle-fill fs-1"></i>
                            </div>
                        </div>

                        <h3 class="fw-bold mb-3">
                            Paiement échoué 😕
                        </h3>

                        <p class="text-muted mb-4">
                            Nous n’avons pas pu finaliser votre paiement.
                            Aucun montant n’a été débité.
                            Vous pouvez réessayer ou choisir un autre moyen de paiement.
                        </p>

                        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                            <a href="{{ route('normal.checkout') }}" class="btn btn-danger btn-lg rounded-pill px-4">
                                Réessayer le paiement
                            </a>

                            <a href="{{ url('/') }}" class="btn btn-outline-secondary btn-lg rounded-pill px-4">
                                Retour à l’accueil
                            </a>
                        </div>

                        <p class="small text-muted mt-4 mb-0">
                            Besoin d’aide ? <a href="/contact" class="text-decoration-none">Contactez le support</a>
                        </p>

                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
