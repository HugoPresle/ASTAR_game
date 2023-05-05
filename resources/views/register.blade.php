@extends('asset.header')

<link rel="stylesheet" href="{{ asset('css/login.css') }}">

@section('content')
    <div class="container-fluid rounded border border-success" style="background-color: rgba(255, 255, 255, 0.904);">
        <div class="row">
            <div class="col-sm-6 text-black">
                <div class="px-5 ms-xl-4">
                    <br>
                    <img src="{{ asset('img/téléchargement-removebg-preview.png') }}" width="50" height="50"
                        class="d-inline-block align-top" alt="">
                    <span class="h1 fw-bold mb-0"><a href="/game">Astar</a></span>
                </div>
                <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
                    <form style="width: 23rem;">
                        <br>
                        <h3 class="mt-3">Register</h3>
                        <div class="form-outline">
                            <label class="form-label" for="form2Example18">Pseudo</label>
                            <input type="text" id="form2Example18" class="form-control form-control-lg" />
                        </div>
                        <div class="form-outline">
                            <label class="form-label" for="form2Example18">Email address</label>
                            <input type="email" id="form2Example18" class="form-control form-control-lg" />
                        </div>
                        <div class="form-outline ">
                            <label class="form-label" for="form2Example28">Password</label>
                            <input type="password" id="form2Example28" class="form-control form-control-lg" />
                        </div>
                        <div class="pt-1 mt-3">
                            <button class="btn btn-info btn-lg btn-block" type="button">Créer</button>
                        </div>
                        <p>Deja un compte ? <a href="/" class="link-info">Se connecter</a></p>

                    </form>

                </div>

            </div>
            <div class="col-sm-6 px-0 d-none d-sm-block">
                <img src="{{ asset('img/te.png') }}" alt="Login image" class="w-75 vh-75"
                    style="object-fit: cover; object-position: left;transform:scaleX(-1);">
            </div>
        </div>
    </div>
@endsection
