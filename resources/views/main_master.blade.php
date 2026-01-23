<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <meta name="description"
        content="ScanPhoto utilise l'IA pour retrouver instantanément vos photos d'événements en scannant votre visage. Idéal pour mariages, galas et anniversaires.">
    <meta name="keywords"
        content="ScanPhoto, reconnaissance faciale, IA, photos d'événements, mariage, gala, anniversaire, récupération de photos, technologie photo">
    <meta name="robots" content="index, follow" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicons -->
    <link href="{{ asset('logo.webp') }}" rel="icon">
    <link href="{{ asset('logo.webp') }}" rel="apple-touch-icon">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        :root {
            --primary: #4f46e5;
            --primary-dark: #3730a3;
        }

        /* Brand */
        .text-gradient {
            background: linear-gradient(to right, #1e293b, #4f46e5);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .btn-brand {
            background: var(--primary);
            color: #fff;
            border-radius: 50px;
            padding: 14px 30px;
            font-weight: 700;
        }

        .btn-brand:hover {
            background: var(--primary-dark);
            color: #fff;
        }

        /* Hero */
        .hero {
            padding: 40px 0;
            background: radial-gradient(circle at top right, #eef2ff, #ffffff);
        }

        .badge-soft {
            background: #e0e7ff;
            color: var(--primary);
        }

        /* Cards */
        .card-custom {
            border-radius: 24px;
            transition: transform 0.3s ease;
        }

        .card-custom:hover {
            transform: translateY(-8px);
            border-color: #818cf8;
        }

        /* Steps */
        .step-number {
            font-size: 3.5rem;
            font-weight: 800;
            color: #e5e7eb;
        }

        /* CTA */
        .cta {
            background: #0f172a;
            color: white;
            border-radius: 24px;
            padding: 80px 30px;
        }

        /* Footer */
        footer {
            border-top: 1px solid #e5e7eb;
        }

        .process-card {
            border-radius: 22px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: #ffffff;
        }

        .process-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 35px rgba(0, 0, 0, 0.12);
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->

    @include('components.header')

    <!-- Master Main -->
    @yield('content')
    <!-- End Master Main -->

    <!-- FOOTER -->

    @include('components.footer')

</body>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- Tosat Alert -->
<script>
    @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch (type) {
            case 'info':
                toastr.info(" {{ Session::get('message') }} ")
                break;

            case 'success':
                toastr.success(" {{ Session::get('message') }} ")
                break;

            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ")
                break;

            case 'error':
                toastr.error(" {{ Session::get('message') }} ")
                break;
        }
    @endif
</script>

</html>
