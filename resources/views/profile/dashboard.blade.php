@extends('main_master')

@section('title')
    Upload Photos – ScanPhoto
@endsection

@section('content')
    <div class="container-fluid px-4 py-4 bg-light">

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
                                    <h3 class="fw-bold mb-0">{{ $events->count() }}</h3>
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
                                    @if (Auth::user()->subscription_id)
                                        <h5 class="fw-bold mb-0 text-success">Premium</h5>
                                    @else
                                        <h5 class="fw-bold mb-0 text-danger">Gratuit</h5>
                                    @endif
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
                            <a href="{{ route('create.event') }}" class="btn btn-primary btn-sm">
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
                                    @foreach ($events as $event)
                                        <tr>
                                            <td>{{ $event->id }}</td>
                                            <td>{{ $event->title }}</td>
                                            <td>{{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</td>
                                            <td>{{ $event->photos_count ?? 0 }}</td>
                                            <td>
                                                @if ($event->status == 'active')
                                                    <span class="badge bg-success">ACTIF</span>
                                                @else
                                                    <span class="badge bg-danger">INACTIF </span><i
                                                        class="bi bi-info-circle ms-1 cursor-pointer"
                                                        title="Cet événement est inactif, veuillez effectuer le paiement pour l'activer."></i>
                                                @endif
                                            </td>
                                            <td class="text-end">
                                                <a href="#" title="Partager l'événement"
                                                    class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-share"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-outline-danger"
                                                    title="Effectuer le paiement pour activer l'événement">
                                                    <i class="bi bi-credit-card"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
