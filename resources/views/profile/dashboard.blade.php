@extends('main_master')

@section('title')
    Upload Photos – ScanPhoto
@endsection

@section('content')
    <div class="container-fluid px-4 py-4 bg-light">

        <!-- BREADCRUMB -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                <li class="breadcrumb-item"><a href="#">Événements</a></li>
                <li class="breadcrumb-item active" aria-current="page">Upload Photos</li>
            </ol>
        </nav>

        <div class="row g-4">

            <!-- SIDEBAR -->
            <div class="col-12 col-md-4 col-lg-3">
                @include('components.sidebar')
            </div>

            <!-- MAIN CONTENT -->
            <div class="col-12 col-md-8 col-lg-9">
                <h2 class="fw-bold mb-4">📊 Dashboard Admin</h2>

                <!-- STATS CARDS -->
                <div class="row g-4 mb-5">

                    <div class="col-12 col-md-4">
                        <div class="card shadow-sm border-0 rounded-4">
                            <div class="card-body d-flex align-items-center">
                                <div class="bg-primary text-white rounded-circle p-3 me-3">
                                    <i class="bi bi-calendar-event fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="text-muted mb-1">Total événements</h6>
                                    <h3 class="fw-bold mb-0">24</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="card shadow-sm border-0 rounded-4">
                            <div class="card-body d-flex align-items-center">
                                <div class="bg-success text-white rounded-circle p-3 me-3">
                                    <i class="bi bi-images fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="text-muted mb-1">Total photos</h6>
                                    <h3 class="fw-bold mb-0">12 480</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="card shadow-sm border-0 rounded-4">
                            <div class="card-body d-flex align-items-center">
                                <div class="bg-warning text-white rounded-circle p-3 me-3">
                                    <i class="bi bi-credit-card fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="text-muted mb-1">Abonnement</h6>
                                    <h5 class="fw-bold mb-0 text-warning">Premium</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- EVENTS TABLE -->
                <div class="card shadow-sm rounded-4 border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="fw-bold mb-0">📅 Liste des événements</h5>
                            <a href="#" class="btn btn-primary btn-sm">
                                <i class="bi bi-plus-circle"></i> Ajouter
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th>Date</th>
                                        <th>Photos</th>
                                        <th>Statut</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Mariage Paul & Sarah</td>
                                        <td>12/01/2026</td>
                                        <td>850</td>
                                        <td>
                                            <span class="badge bg-success">Actif</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>Anniversaire Emma</td>
                                        <td>03/02/2026</td>
                                        <td>320</td>
                                        <td>
                                            <span class="badge bg-secondary">Archivé</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
