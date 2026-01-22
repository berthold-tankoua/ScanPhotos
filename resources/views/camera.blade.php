<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capture & Envoi de photo</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1e40af;
            --success: #16a34a;
            --danger: #dc2626;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #eef2ff, #f8fafc);
        }

        .card-custom {
            border-radius: 14px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
        }

        .btn-primary-custom {
            background: var(--primary);
            border: none;
            font-weight: 600;
        }

        .btn-primary-custom:hover {
            background: var(--primary-dark);
        }

        .status-success {
            color: var(--success);
        }

        .status-error {
            color: var(--danger);
        }

        video,
        img {
            max-width: 320px;
            width: 100%;
            border-radius: 12px;
            background: #000;
            display: none;
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center flex-column">

    <div class="container px-3">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-6 col-lg-6">
                <div class="card card-custom p-4">

                    <h2 class="text-center mb-2">📸 Capture & Scan d’image</h2>

                    <p id="info" class="text-center text-muted mb-4">
                        Activez votre caméra puis prenez une photo pour le scan.
                    </p>

                    <div class="d-flex justify-content-center mb-3">
                        <video id="video" autoplay playsinline></video>
                        <img id="photo" alt="Photo capturée">
                    </div>

                    <div class="d-flex flex-column flex-sm-row gap-3 mt-3">
                        <button id="start" class="btn btn-primary-custom w-100 text-white h4"
                            style="font-size: 20px">
                            Activer la caméra
                        </button>

                        <button id="capture" class="btn btn-secondary w-100 d-none">
                            Prendre la photo
                        </button>

                        <form id="confirm" action="{{ route('scan.image') }}" method="post"
                            enctype="multipart/form-data" class="d-none w-100">
                            @csrf
                            <input type="file" id="imageInput" name="image" class="d-none" accept="image/png">
                            <button class="btn btn-success w-100">
                                Valider & envoyer
                            </button>
                        </form>

                        <button id="retake" class="btn btn-outline-secondary w-100 d-none">
                            Reprendre la photo
                        </button>
                    </div>


                    <canvas id="canvas" width="320" height="240" class="d-none"></canvas>

                    <p class="text-center text-muted small mt-3 mb-0">
                        Accès caméra sécurisé – aucune image stockée localement
                    </p>

                </div>
            </div>
        </div>
    </div>
    <div class="container my-2">
        <div class="row justify-content-center">
            <div class="col-12 ">
                <div class="card shadow-sm p-4 rounded-4 text-center">

                    <h3 class="fw-bold mb-4">Comment ça marche ?</h3>

                    <div class="d-flex gap-4">

                        <!-- Étape 1 -->
                        <div class="border rounded-3 p-3">
                            <span class="badge bg-primary rounded-circle mb-2"
                                style="font-size:1.2rem; width:40px; height:40px; display:inline-flex; align-items:center; justify-content:center;">
                                1
                            </span>
                            <h5 class="mb-1">Activer la caméra</h5>
                            <p class="text-muted mb-0">Autorisez l’accès à votre caméra pour commencer.</p>
                        </div>

                        <!-- Étape 2 -->
                        <div class="border rounded-3 p-3">
                            <span class="badge bg-primary rounded-circle mb-2"
                                style="font-size:1.2rem; width:40px; height:40px; display:inline-flex; align-items:center; justify-content:center;">
                                2
                            </span>
                            <h5 class="mb-1">Prendre la photo</h5>
                            <p class="text-muted mb-0">Cadrez votre visage et capturez votre photo.</p>
                        </div>

                        <!-- Étape 3 -->
                        <div class="border rounded-3 p-3">
                            <span class="badge bg-primary rounded-circle mb-2"
                                style="font-size:1.2rem; width:40px; height:40px; display:inline-flex; align-items:center; justify-content:center;">
                                3
                            </span>
                            <h5 class="mb-1">Valider</h5>
                            <p class="text-muted mb-0">Confirmez et envoyez votre photo.</p>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        const startBtn = document.getElementById('start');
        const captureBtn = document.getElementById('capture');
        const confirmBtn = document.getElementById('confirm');
        const retakeBtn = document.getElementById('retake');

        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const photo = document.getElementById('photo');
        const info = document.getElementById('info');
        const imageInput = document.getElementById('imageInput');

        let stream;
        let capturedBlob = null;

        /* ======================
           ACTIVER LA CAMÉRA
        ====================== */
        startBtn.addEventListener('click', async () => {
            try {
                stream = await navigator.mediaDevices.getUserMedia({
                    video: true
                });
                video.srcObject = stream;
                video.style.display = 'block';
                photo.style.display = 'none';

                startBtn.classList.add('d-none');
                captureBtn.classList.remove('d-none');

                info.textContent = "Cadrez votre image puis prenez la photo.";
                info.className = 'text-center text-muted mb-4';
            } catch {
                info.textContent = "Accès à la caméra refusé.";
                info.className = 'text-center status-error mb-4';
            }
        });

        /* ======================
           PRENDRE LA PHOTO
        ====================== */
        captureBtn.addEventListener('click', async () => {
            const context = canvas.getContext('2d');
            context.drawImage(video, 0, 0, canvas.width, canvas.height);

            const dataURL = canvas.toDataURL('image/png');
            photo.src = dataURL;

            // Stop caméra
            stream.getTracks().forEach(track => track.stop());

            // Convertir en Blob
            capturedBlob = await (await fetch(dataURL)).blob();

            // Mettre la photo dans input:file
            const file = new File([capturedBlob], 'photo.png', {
                type: 'image/png'
            });
            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(file);
            imageInput.files = dataTransfer.files;

            // UI
            video.style.display = 'none';
            photo.style.display = 'block';

            captureBtn.classList.add('d-none');
            confirmBtn.classList.remove('d-none');
            retakeBtn.classList.remove('d-none');

            info.textContent = "Photo prise. Validez ou reprenez la photo.";
        });

        /* ======================
           REPRENDRE LA PHOTO
        ====================== */
        retakeBtn.addEventListener('click', async () => {
            confirmBtn.classList.add('d-none');
            retakeBtn.classList.add('d-none');

            imageInput.value = '';
            capturedBlob = null;

            stream = await navigator.mediaDevices.getUserMedia({
                video: true
            });
            video.srcObject = stream;

            video.style.display = 'block';
            photo.style.display = 'none';

            captureBtn.classList.remove('d-none');

            info.textContent = "Reprenez la photo.";
        });

        /* ======================
           VALIDER & ENVOYER
        ====================== */
        confirmBtn.addEventListener('click', async () => {
            if (!imageInput.files.length) return;

            const formData = new FormData();
            formData.append('image', imageInput.files[0]);

            info.textContent = "Envoi de la photo en cours...";
            info.className = 'text-center text-muted mb-4';

            try {
                const response = await fetch('/scan/image', {
                    method: 'POST',
                    body: formData
                });

                await response.json();

                info.textContent = "Photo envoyée avec succès ✔";
                info.className = 'text-center status-success mb-4';

                confirmBtn.classList.add('d-none');
                retakeBtn.classList.add('d-none');
            } catch {
                info.textContent = "Erreur lors de l’envoi.";
                info.className = 'text-center status-error mb-4';
            }
        });
    </script>


</body>

</html>
