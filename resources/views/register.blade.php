@extends('asset.header')

<link rel="stylesheet" href="{{ asset('css/login.css') }}">

@section('content')
    <div class="container ">
        <h1 class="m-3">
            <img src="{{ asset('img/téléchargement-removebg-preview.png') }}" width="50"
                height="50"class="d-inline-block align-top" alt="">
            <a>Astar</a>
        </h1>
        <hr />
        {{-- ALERT --}}
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa-solid fa-right-from-bracket"></i> {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('fail'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <i class="fa-solid fa-triangle-exclamation"></i> {{ session()->get('fail') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-9 mx-auto">
                    <div class="card flex-row border-0 shadow rounded-3 overflow-hidden">
                        <div class="card-img-left d-none d-md-flex m-3">
                            <img src="{{ asset('img/te.png') }}" alt="Login image" style="transform:scaleX(-1);">
                        </div>
                        <div class="card-body p-4 p-sm-5">
                            <h3 class="card-title text-center mb-5">Créer un compte</h3>
                            <form method="POST" action="/players">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="username" name="username" required
                                        autofocus>
                                    <label for="username">Pseudo</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" name="email">
                                    <label for="email">Adresse mail</label>
                                </div>

                                <hr>

                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="password" name="password">
                                    <label for="password">Mot de passe</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="passwordConfirm" name="passwordConfirm ">
                                    <label for="passwordConfirm">Confirmer votre mot de passe</label>
                                </div>

                                <div class="d-grid mb-2">
                                    <button class="btn btn-lg btn-secondary btn-login fw-bold text-uppercase"
                                        type="submit">Créer</button>
                                </div>

                                <p class="d-block text-center mt-2 small">Vous avez déjà un compte ? <a href="/">Se
                                        connecter</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
