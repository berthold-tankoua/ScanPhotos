@extends('main_master')

@section('title')
    EventFace | Paiement confirmé
@endsection

@section('content')
    <div class="container py-5">
        <!-- Success Card -->
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-8">

                <div class="card border-0 shadow-lg rounded-4 text-center p-4">
                    <div class="card-body">

                        <!-- Icon -->
                        <div class="mb-4">
                            <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex align-items-center justify-content-center"
                                style="width: 80px; height: 80px;">
                                <i class="bi bi-check-circle-fill fs-1"></i>
                            </div>
                        </div>

                        <h3 class="fw-bold mb-3">
                            Paiement confirmé 🎉
                        </h3>

                        <p class="text-muted mb-4">
                            Votre paiement a été traité avec succès.
                            Merci pour votre confiance et excellente expérience sur EventFace.
                        </p>

                        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                            <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg rounded-pill px-4">
                                Accéder au dashboard
                            </a>

                            <a href="{{ url('/') }}" class="btn btn-outline-secondary btn-lg rounded-pill px-4">
                                Retour à l’accueil
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
