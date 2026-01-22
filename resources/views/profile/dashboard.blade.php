<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Photos – ScanPhoto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <!-- NAVBAR -->
    <header class="navbar navbar-expand-lg bg-white sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="#">📸 ScanPhoto</a>
            <a href="{{ route('logout') }}" class="btn btn-danger btn-sm">Déconnexion</a>
        </div>
    </header>
    <br>
    <div class="container">

        <!-- BREADCRUMB -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                <li class="breadcrumb-item"><a href="#">Événements</a></li>
                <li class="breadcrumb-item active" aria-current="page">Upload Photos</li>
            </ol>
        </nav>
        <form id="uploadForm" action="{{ route('admin.event.images') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container my-5">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8">
                        <div class="card shadow-sm rounded-4 p-4 mb-4">
                            <h3 class="fw-bold mb-4 text-left">Choisir un événement</h3>
                            <select name="event" id="event" class="form-select mb-4">
                                <option value="">Sélectionnez un événement</option>
                                <option value="1">Événement 1</option>
                                <option value="2">Événement 2</option>
                                <option value="3">Événement 3</option>
                            </select>
                        </div>
                        <div class="card shadow-sm rounded-4 p-4">
                            <h3 class="fw-bold mb-4 text-left">Uploader vos photos</h3>
                            <p class="text-muted text-center mb-4">
                                Sélectionnez toutes les photos de votre événement pour les envoyer sur le cloud
                                ScanPhoto.
                            </p>

                            <!-- Input multiple files -->
                            <div class="mb-3">
                                <label for="photos" class="form-label">Choisir les photos</label>
                                <input class="form-control" type="file" id="photos" name="photos[]"
                                    accept="image/*" multiple required>
                                <div class="form-text">Vous pouvez sélectionner plusieurs fichiers à la fois.</div>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">Envoyer les photos</button>
                            </div>
        </form>

        <div id="uploadStatus" class="mt-3 text-center text-success" style="display:none;">
            Photos envoyées avec succès !
        </div>
    </div>

    </div>
    </div>
    </div>
    </form>
    <footer class="text-center mt-5 mb-3 text-muted">
        &copy; 2026 ScanPhoto Tech
    </footer>

    </div>
    <script></script>

</body>

</html>
