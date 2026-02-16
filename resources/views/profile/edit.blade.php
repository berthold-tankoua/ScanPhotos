@extends('main_master')

@section('title')
    Upload Photos – EventFace
@endsection

@section('content')
    <div class="container-fluid px-4 py-4 bg-light">
        @include('components.alert')
        <div class="row justify-content-center ">
            <div class="col-12 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="h5">Profile Information</h2>
                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $user->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $user->email }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Nouveau mot de passe</label>
                                <input type="password" class="form-control" id="password"
                                    placeholder="saisir le nouveau mot de passe" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary">Mettre à jour le profil</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    @endsection
