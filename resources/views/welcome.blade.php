@extends('asset.header')

@section('content')
    <div id="bgimgr">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="">
                <img src="{{ asset('img/téléchargement-removebg-preview.png') }}" width="30" height="30"
                    class="d-inline-block align-top" alt="">
                Astar
            </a>
            <div>
                <a onclick="openMenuGear()" class="btn btn-light" role="button" aria-pressed="true">
                    <i class="fa-solid fa-gears"></i>
                </a>
                <nav class="position-absolute" style="z-index: 10; right: 0;">
                    <div id="menuGear" class="flex-column align-items-end" style="display: none;">
                        <a class="nav-link active" aria-current="page" href="#">Active</a>
                        <a class="nav-link" href="#">Link</a>
                        <a class="nav-link" href="#">Paramettres</a>
                        <a class="nav-link disabled">Se déconecter</a>
                    </div>
                </nav>
            </div>
        </nav>

        {{-- div temporaire permettant de clicker pour supprimer le menu option --}}
        <div id="hiddingDiv" class="position-absolute" onclick="hideMenuGear()"
            style="width: 100vw;height: 100vw; z-index: 5;display: none;">
        </div>

        <div>

        </div>
    </div>
@endsection
