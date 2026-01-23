@extends('main_master')

@section('title')
    ScanPhoto | Choisir un plan
@endsection

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-8">
                <div class="card border-0 shadow-sm mb-4"
                    style="border-left: 5px solid #0d6efd !important; background: #f8fbff;">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start">
                            <div class="flex-shrink-0">
                                <div class="bg-primary bg-opacity-10 p-3 rounded-circle">
                                    <i class="bi bi-info-circle-fill text-primary fs-4"></i>
                                </div>
                            </div>
                            <div class="ms-4">
                                <h5 class="fw-bold text-dark">Informations sur la création d'événement</h5>
                                <p class="text-muted mb-3">
                                    Pour garantir un stockage sécurisé de vos photos haute résolution et une analyse par
                                    IA
                                    ultra-rapide, la création d'un événement est soumise à tarification.
                                </p>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="p-3 border rounded-3 bg-white h-100 shadow-sm">
                                            <span class="badge bg-secondary mb-2">Paiement unique</span>
                                            <h6 class="fw-bold mb-1">Par événement</h6>
                                            <div class="d-flex align-items-baseline">
                                                <span class="display-6 fw-bold">20$</span>
                                                <span class="text-muted ms-1">/événement</span>
                                            </div>
                                            <p class="small text-muted mt-2 mb-0">Idéal pour un usage occasionnel
                                                (mariage, fête).</p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div
                                            class="p-3 border border-primary rounded-3 bg-white h-100 shadow-sm position-relative">
                                            <span class="badge bg-primary mb-2 text-white">Recommandé</span>
                                            <h6 class="fw-bold mb-1 text-primary">Abonnement Mensuel</h6>
                                            <div class="d-flex align-items-baseline">
                                                <span class="display-6 fw-bold text-primary">5$</span>
                                                <span class="text-primary ms-1 fw-semibold">/mois</span>
                                            </div>
                                            <p class="small text-muted mt-2 mb-0"><strong>Création d'événements
                                                    illimités</strong>.
                                                .</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 pt-3 border-top">
                                    <a href="{{ route('subscription.checkout') }}"
                                        class="btn btn-primary rounded-pill px-4 fw-bold">
                                        Passer à l'abonnement
                                    </a>
                                    <a href="{{ route('normal.checkout') }}"
                                        class="btn btn-link text-muted text-decoration-none small ms-3">
                                        Payer et activer l'événement
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
