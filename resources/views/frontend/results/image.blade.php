@extends('main_master')

@section('title')
    ScanPhoto | Vos photos
@endsection

@section('content')
    <style>
        :root {
            --primary-color: #0d6efd;
            --card-radius: 20px;
        }

        .gallery-container {
            background-color: #f8fafc;
            min-height: 100vh;
        }

        .gallery-title {
            font-weight: 800;
            color: #1e293b;
            letter-spacing: -0.02em;
        }

        /* Grille de photos améliorée */
        .photo-card {
            position: relative;
            border-radius: var(--card-radius);
            overflow: hidden;
            background: #fff;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: none;
        }

        .photo-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .photo-card img {
            width: 100%;
            aspect-ratio: 1/1;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .photo-card:hover img {
            transform: scale(1.1);
        }

        /* Overlay Moderne (Glassmorphism) */
        .photo-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7) 0%, transparent 60%);
            display: flex;
            align-items: flex-end;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            padding: 20px;
        }

        .photo-card:hover .photo-overlay {
            opacity: 1;
        }

        .download-btn {
            backdrop-filter: blur(8px);
            background: rgba(255, 255, 255, 0.9);
            color: #000;
            border: none;
            font-weight: 600;
            border-radius: 12px;
            padding: 10px 20px;
            font-size: 0.9rem;
            text-decoration: none;
            transition: all 0.2s;
            width: 100%;
            text-align: center;
        }

        .download-btn:hover {
            background: #fff;
            transform: scale(1.02);
            color: var(--primary-color);
        }

        /* État Vide */
        .empty-state {
            max-width: 400px;
            margin: 100px auto;
            padding: 40px;
            text-align: center;
        }

        .empty-icon {
            font-size: 4rem;
            color: #dee2e6;
            margin-bottom: 20px;
        }
    </style>

    <div class="gallery-container py-5">
        <div class="container">

            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-5 gap-3">
                <div>
                    <h2 class="gallery-title mb-1">Vos photos détectées</h2>
                    <p class="text-muted mb-0">Nous avons trouvé {{ $photos->count() }} moments magiques pour vous.</p>
                </div>

                @if ($photos && $photos->count() > 0)
                    <a href="{{ route('photos.downloadAll') }}"
                        class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm">
                        <i class="bi bi-cloud-arrow-down-fill me-2"></i>Tout télécharger
                    </a>
                @endif
            </div>

            @if ($photos && $photos->count() > 0)
                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
                    @foreach ($photos as $photo)
                        <div class="col">
                            <div class="photo-card">
                                <img src="{{ Storage::disk('s3')->temporaryUrl($photo->path, now()->addMinutes(30)) }}"
                                    loading="lazy" alt="Photo détectée">

                                <div class="photo-overlay">
                                    <a href="{{ Storage::disk('s3')->temporaryUrl($photo->path, now()->addMinutes(30)) }}"
                                        class="download-btn shadow-sm" download>
                                        <i class="bi bi-download me-2"></i>Enregistrer
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state bg-white shadow-sm rounded-4">
                    <div class="empty-icon">
                        <i class="bi bi-camera-fill"></i>
                    </div>
                    <h4 class="fw-bold">Pas encore de photos</h4>
                    <p class="text-muted">Dès qu'une photo de vous est détectée, elle apparaîtra instantanément ici.</p>
                    <a href="/" class="btn btn-outline-primary btn-sm rounded-pill px-4 mt-3">Retour à l'accueil</a>
                </div>
            @endif

        </div>
    </div>
@endsection
