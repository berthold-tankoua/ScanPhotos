@extends('main_master')

@section('title')
    Upload Photos – ScanPhoto
@endsection

@section('content')
    <div class="container-fluid px-4 py-4">

        <!-- BREADCRUMB -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">Événements</a></li>
                <li class="breadcrumb-item active" aria-current="page">Upload Photos</li>
            </ol>
        </nav>

        <div class="row justify-content-center g-4">

            <!-- SIDEBAR -->
            {{-- <div class="col-12 col-md-4 col-lg-4">
               @include('components.sidebar')
            </div> --}}

            <!-- MAIN CONTENT -->
            <div class="col-12 col-md-8 col-lg-8">

                <form id="uploadForm" action="{{ route('upload.event.images') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <!-- EVENT SELECT -->
                    <div class="card shadow-sm rounded-4 p-4 mb-4">
                        <h4 class="fw-bold mb-3">Choisir un événement</h4>

                        <select name="event" id="event" class="form-select" required>
                            <option value="">Sélectionnez un événement</option>
                            @foreach ($events as $event)
                                <option value="{{ $event->id }}">{{ $event->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- UPLOAD -->
                    <div class="card shadow-sm rounded-4 p-4">
                        <h4 class="fw-bold mb-3">Uploader vos photos</h4>

                        <p class="text-muted mb-4">
                            Sélectionnez toutes les photos de votre événement pour les envoyer sur le cloud ScanPhoto.
                        </p>

                        <div class="mb-3">
                            <label for="photos" class="form-label">Choisir les photos</label>
                            <input class="form-control" type="file" id="photos" name="photos[]" accept="image/*"
                                multiple required>
                            <div class="form-text">
                                Vous pouvez sélectionner plusieurs fichiers à la fois.
                            </div>
                        </div>

                        <div class="d-grid d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary btn-lg px-5">
                                Envoyer les photos
                            </button>
                        </div>

                        <div id="uploadStatus" class="mt-3 text-center text-success d-none">
                            Photos envoyées avec succès !
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
