                <div class="list-group shadow-sm">
                    <a href="#" class="list-group-item list-group-item-action active">
                        Tableau de bord
                    </a>
                    <a href="#" class="list-group-item list-group-item-action align-items-center d-flex">
                        <i class="bi bi-credit-card fs-4 me-2"></i> Abonnement
                    </a>
                    <a href="{{ route('create.event') }}"
                        class="list-group-item list-group-item-action align-items-center d-flex">
                        <i class="bi bi-calendar-event fs-4 me-2"></i> Mes événements
                    </a>
                    <a href="{{ route('add.pictures') }}"
                        class="list-group-item list-group-item-action align-items-center d-flex">
                        <i class="bi bi-images fs-4 me-2"></i> Publier des photos
                    </a>
                    <a href="{{ route('profile.edit') }}"
                        class="list-group-item list-group-item-action align-items-center d-flex">
                        <i class="bi bi-person-circle fs-4 me-2"></i> Paramètres du compte
                    </a>
                    <a href="{{ url('/contact') }}"
                        class="list-group-item list-group-item-action align-items-center d-flex">
                        <i class="bi bi-question-circle fs-4 me-2"></i> Support
                    </a>
                    <a href="{{ route('logout') }}"
                        class="list-group-item list-group-item-action align-items-center d-flex">
                        <i class="bi bi-box-arrow-right fs-4 me-2"></i> Déconnexion
                    </a>
                </div>
