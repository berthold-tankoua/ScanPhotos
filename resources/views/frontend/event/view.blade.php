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
            max-width: 320px;
            aspect-ratio: 4/3;
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

            <!-- SCAN -->
            <div class="col-12 col-lg-6">
                <div class="card card-custom p-4 h-100">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0">Scan facial</h5>
                        <span class="badge bg-light text-primary">Sécurisé</span>
                    </div>

                    <p id="info" class="text-muted small mb-3">
                        Autorisez la caméra pour identifier vos photos.
                    </p>

                    <div class="camera-frame mb-3">
                        <video id="video" autoplay playsinline></video>
                        <img id="photo">
                    </div>

                    <div class="d-grid gap-2">
                        <button id="start" class="btn btn-primary-custom py-2">
                            Activer la caméra
                        </button>

                        <button id="capture" class="btn btn-secondary d-none">
                            Prendre la photo
                        </button>

                        <form id="confirm" action="{{ route('scan.image') }}" method="POST" enctype="multipart/form-data"
                            class="d-none">
                            @csrf
                            <input type="hidden" name="event_id" value="{{ $event->id }}">
                            <input type="file" id="imageInput" name="image" class="d-none">
                            <button class="btn btn-success w-100">
                                Valider & envoyer
                            </button>
                        </form>

                        <button id="retake" class="btn btn-outline-secondary d-none">
                            Reprendre
                        </button>
                    </div>

                    <canvas id="canvas" width="320" height="240" class="d-none"></canvas>

                    <p class="text-muted text-center small mt-3 mb-0">
                        Aucune image stockée localement
                    </p>
                </div>
            </div>

            <!-- QR -->
            <div class="col-12 col-lg-6">
                <div class="card card-custom p-4 h-100 text-center">

                    <h6 class="fw-semibold mb-2">Accès mobile</h6>
                    <p class="text-muted small mb-3">
                        Scannez pour accéder à l’événement
                    </p>

                    <div class="d-flex justify-content-center mb-3">
                        {!! QrCode::size(180)->generate($event->url) !!}
                    </div>

                    <small class="text-muted">{{ $event->title }}</small>
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

                    <div class="row text-center g-4">

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

    <script>
        const startBtn = document.getElementById('start');
        const captureBtn = document.getElementById('capture');
        const confirmForm = document.getElementById('confirm');
        const retakeBtn = document.getElementById('retake');

        const video = document.getElementById('video');
        const photo = document.getElementById('photo');
        const canvas = document.getElementById('canvas');
        const info = document.getElementById('info');
        const imageInput = document.getElementById('imageInput');

        let stream;

        /* CAMERA */
        startBtn.onclick = async () => {
            try {
                stream = await navigator.mediaDevices.getUserMedia({
                    video: true
                });
                video.srcObject = stream;
                video.style.display = 'block';
                photo.style.display = 'none';

                startBtn.classList.add('d-none');
                captureBtn.classList.remove('d-none');

                info.textContent = "Cadrez votre visage.";
            } catch {
                info.textContent = "Accès caméra refusé.";
                info.classList.add('status-error');
            }
        };

        /* CAPTURE */
        captureBtn.onclick = async () => {
            canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
            const dataURL = canvas.toDataURL('image/png');
            photo.src = dataURL;

            stream.getTracks().forEach(t => t.stop());

            const blob = await (await fetch(dataURL)).blob();
            const file = new File([blob], 'photo.png', {
                type: 'image/png'
            });
            const dt = new DataTransfer();
            dt.items.add(file);
            imageInput.files = dt.files;

            video.style.display = 'none';
            photo.style.display = 'block';

            captureBtn.classList.add('d-none');
            confirmForm.classList.remove('d-none');
            retakeBtn.classList.remove('d-none');

            info.textContent = "Validez ou reprenez la photo.";
        };

        /* RETAKE */
        retakeBtn.onclick = async () => {
            confirmForm.classList.add('d-none');
            retakeBtn.classList.add('d-none');
            imageInput.value = '';

            stream = await navigator.mediaDevices.getUserMedia({
                video: true
            });
            video.srcObject = stream;

            video.style.display = 'block';
            photo.style.display = 'none';

            captureBtn.classList.remove('d-none');
            info.textContent = "Reprenez la photo.";
        };
    </script>
@endsection
