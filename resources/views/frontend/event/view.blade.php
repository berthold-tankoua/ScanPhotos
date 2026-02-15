@extends('main_master')

@section('title')
    ScanPhoto | {{ $event->title }}
@endsection

@section('content')
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1e40af;
            --success: #16a34a;
            --danger: #dc2626;
        }

        body {
            background: linear-gradient(135deg, #eef2ff, #f8fafc);
        }

        /* Card */
        .card-custom {
            border-radius: 16px;
            border: none;
            box-shadow: 0 10px 30px rgba(15, 23, 42, .08);
        }

        /* Buttons */
        .btn-primary-custom {
            background: var(--primary);
            border: none;
            font-weight: 600;
        }

        .btn-primary-custom:hover {
            background: var(--primary-dark);
        }

        /* Camera frame */
        .camera-frame {
            max-width: 200px;
            background: #000;
            border-radius: 16px;
            overflow: hidden;
            border: 2px dashed #e5e7eb;
            margin: auto;
        }

        video,
        img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: none;
        }

        video {
            transform: scaleX(-1);
        }

        /* Status */
        .status-success {
            color: var(--success);
        }

        .status-error {
            color: var(--danger);
        }
    </style>

    <div class="container py-5">

        <div class="row g-4 justify-content-center">
            <!-- QR 1 -->
            <div class="col-12 col-lg-6">
                <div class="card card-custom p-4 h-100 text-center">

                    <h6 class="fw-semibold mb-2">Accès mobile</h6>
                    <p class="text-muted small mb-3">
                        Scannez pour accéder aux photos ou votre visage est détecté
                    </p>

                    <div class="d-flex justify-content-center mb-3">
                        {!! QrCode::size(180)->generate($url) !!}
                    </div>
                    <p><i class="bi bi-link-45deg"></i> Ou accedez a la page <a target="_blank" href="{{ $url }}"
                            class="text-muted">
                            cliquez ici</a></p>
                </div>
            </div>

            <!-- QR 2 -->
            <div class="col-12 col-lg-6">
                <div class="card card-custom p-4 h-100 text-center">

                    <h6 class="fw-semibold mb-2">Accès mobile</h6>
                    <p class="text-muted small mb-3">
                        Scannez pour accéder à toutes les photos de l’événement
                    </p>

                    <div class="d-flex justify-content-center mb-3">
                        {!! QrCode::size(180)->generate($event->url) !!}
                    </div>

                    <p><i class="bi bi-link-45deg"></i> Ou accedez a la page <a target="_blank" href="{{ $event->url }}"
                            class="text-muted">
                            cliquez ici</a></p>
                </div>
            </div>

        </div>

        <!-- HOW IT WORKS -->
        <div class="row mt-5 justify-content-center">
            <div class="col-12 col-lg-12">
                <div class="card card-custom p-4 p-lg-5">

                    <h5 class="fw-semibold mb-4 text-center">
                        Comment ça fonctionne
                    </h5>

                    <div class="row  text-center g-4">

                        <!-- STEP 1 -->
                        <div class="col-12 col-md-4">
                            <div class="step-box">
                                <div class="step-icon h3">
                                    📷
                                </div>
                                <h6 class="fw-semibold mt-3">Autoriser la caméra</h6>
                                <p class="text-muted small mb-0">
                                    Activez votre caméra pour prendre une photo de votre visage.
                                </p>
                            </div>
                        </div>

                        <!-- STEP 3 -->
                        <div class="col-12 col-md-4">
                            <div class="step-box">
                                <div class="step-icon h3">
                                    ✅
                                </div>
                                <h6 class="fw-semibold mt-3">Valider & accéder</h6>
                                <p class="text-muted small mb-0">
                                    Retrouvez instantanément toutes les photos où votre visage est détecté. .
                                </p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="step-box">
                                <div class="step-icon">
                                    {!! QrCode::size(30)->generate($event->url) !!}
                                </div>
                                <h6 class="fw-semibold mt-3">Télécharger toutes les photos</h6>
                                <p class="text-muted small mb-0">
                                    Téléchargez sur votre mobile toutes les photos de l'événement en scannant le QRCODE .
                                </p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>


    </div>
@endsection
