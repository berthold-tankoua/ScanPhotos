@extends('main_master')

@section('title')
    ScanPhoto | Contactez-nous
@endsection

@section('content')
    <style>
        .contact-container {
            padding: 40px 0;
            background-color: #f8fafc;
            min-height: 90vh;
        }

        .contact-card {
            border: none;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
        }

        .info-side {
            background: linear-gradient(135deg, #1e293b 0%, #0d6efd 100%);
            color: white;
            padding: 50px;
        }

        .form-side {
            background: white;
            padding: 50px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            transition: transform 0.3s ease;
        }

        .contact-item:hover {
            transform: translateX(10px);
        }

        .icon-box {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-right: 20px;
            backdrop-filter: blur(5px);
        }

        .form-control {
            padding: 12px 18px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            background-color: #f8fafc;
        }

        .form-control:focus {
            background-color: white;
            box-shadow: 0 0 0 4px rgba(13, 110, 253, 0.1);
        }

        .social-link {
            color: white;
            text-decoration: none;
            font-weight: 500;
        }

        .social-link:hover {
            color: #e2e8f0;
        }
    </style>

    <div class="contact-container">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold display-5">Parlons de votre projet</h2>
                <p class="text-muted">Une question technique ou un besoin spécifique pour un événement ?</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card contact-card">
                        <div class="row g-0">

                            <div class="col-md-7 form-side">
                                <h4 class="fw-bold mb-4">Envoyez-nous un message</h4>
                                <form action="{{ route('send.msg') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label small fw-bold">Nom complet</label>
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Ex: Jean Dupont" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label small fw-bold">Adresse Email</label>
                                            <input type="email" class="form-control" name="email"
                                                placeholder="nom@exemple.com" required>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label small fw-bold">Votre message</label>
                                        <textarea class="form-control" name="msg" rows="5" placeholder="Comment pouvons-nous vous aider ?" required></textarea>
                                    </div>

                                    <button type="submit"
                                        class="btn btn-primary btn-lg rounded-pill px-5 fw-bold w-100 w-md-auto">
                                        Envoyer le message <i class="bi bi-send ms-2"></i>
                                    </button>
                                </form>
                            </div>

                            <div class="col-md-5 info-side d-flex flex-column justify-content-between">
                                <div>
                                    <h4 class="fw-bold mb-5">Coordonnées</h4>

                                    <div class="contact-item">
                                        <div class="icon-box">
                                            <i class="bi bi-envelope-at"></i>
                                        </div>
                                        <div>
                                            <div class="small opacity-75">Email</div>
                                            <a href="mailto:contact@agencedigitals"
                                                class="social-link">contact@agencedigitals</a>
                                        </div>
                                    </div>

                                    <div class="contact-item">
                                        <div class="icon-box">
                                            <i class="bi bi-whatsapp"></i>
                                        </div>
                                        <div>
                                            <div class="small opacity-75">Téléphone / WhatsApp</div>
                                            <a href="tel:+1 (942) 388-8634" class="social-link">+1 (942) 388-8634</a>
                                        </div>
                                    </div>

                                    <div class="contact-item">
                                        <div class="icon-box">
                                            <i class="bi bi-linkedin"></i>
                                        </div>
                                        <div>
                                            <div class="small opacity-75">LinkedIn</div>
                                            <a href="www.linkedin.com/in/brecht-tankoua" target="_blank"
                                                class="social-link">Suivez notre aventure</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <p class="small opacity-75">
                                        Nous répondons généralement en moins de 24 heures.
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
