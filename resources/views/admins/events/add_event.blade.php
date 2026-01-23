@extends('main_master')

@section('title')
    Upload Photos – ScanPhoto
@endsection

@section('content')
    <div class="container-fluid px-4 py-4">

        <!-- BREADCRUMB -->
        <nav aria-label="breadcrumb" class="mb-5">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Création d'événement</li>
            </ol>
        </nav>

        <div class="row g-4 justify-content-center">

            <!-- SIDEBAR -->


            <!-- MAIN CONTENT -->
            <div class="col-12 col-md-7">

                <form id="uploadForm" action="{{ route('store.event') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="alert alert-warning">
                        Activer un événement coûte <strong>20&nbsp;$</strong> ou abonnez-vous à <strong>5&nbsp;$ /
                            mois</strong> (événements illimités).
                    </div>

                    <!-- EVENT SELECT -->
                    <div class="card shadow-sm rounded-4 p-4 mb-4">
                        <div class="mb-3">
                            <label for="title" class="form-label fw-bold">Nom de l'événement</label>
                            <input type="text" class="form-control mb-1" id="title" name="title"
                                placeholder="Entrez le nom de l'événement" required>
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label fw-bold">Description de l'événement</label>
                            <textarea class="form-control" id="description" name="description"
                                placeholder="Entrez la description de l'événement (Optionnel)" rows="4"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Créer l'événement</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
