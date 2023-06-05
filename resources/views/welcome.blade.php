@extends('asset.header')

@section('content')
    <div>
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand ms-3" href="">
                <img src="{{ asset('img/téléchargement-removebg-preview.png') }}" width="50" height="50"
                    class="d-inline-block align-top" alt="">
                ASTAR
            </a>
            <div class="">
                <a>
                    {{ session('player')->username }} :</a>
                <a>
                    <i class="fa-solid fa-money-bill-1-wave"
                        style="color: rgb(13, 143, 1);"></i></i>{{ session('player')->money }} </a>
                <a>
                    <i class="fa-solid fa-gem" style="color: rgb(42, 173, 255);"></i>{{ session('player')->gems }} </a>
                <a>
                    <i class="fa-solid fa-bolt-lightning"
                        style="color: rgb(255, 204, 35);"></i>{{ session('player')->stamina }}
                </a>


                <a onclick="openMenuGear()" class="btn btn-light" role="button" aria-pressed="true">
                    <i class="fa-solid fa-gears fa-lg"></i>
                </a>
                <nav class="position-absolute" style="z-index: 10; right: 0;">
                    <div id="menuGear" class="flex-column align-items-end" style="display: none;">
                        <a class="nav-link p-1" href="/"><i class="fa-solid fa-newspaper"></i> News</a>
                        <a class="nav-link p-1" href="/"><i class="fa-solid fa-gift"></i> Cadeaux</a>
                        <a class="nav-link p-1" href="#"><i class="fa-solid fa-gear"></i> Paramettres</a>
                        <a class="nav-link p-1" href="/logout"><i class="fa-solid fa-right-from-bracket"></i> Se
                            deconecter</a>
                    </div>
                </nav>
            </div>
        </nav>
        {{-- div temporaire permettant de clicker pour supprimer le menu option --}}
        <div id="hiddingDiv" class="position-absolute" onclick="hideMenuGear()"
            style="width: 100vw;height: 100vw; z-index: 5;display: none;">
        </div>

        <div class="card " style="background-color: #f8f9fa;border-color: #f8f9fa00 ;">

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
            <div class="card-body pt-0">
                <div class="container-fluid text-center">
                    <div class="row">
                        <div class="col-12 card mb-1">
                            <div class="">
                                <h3>TITRE</h3>
                            </div>
                        </div>
                        <div class="col card p-0" id="leftDiv">
                            <div class="card m-1">
                                <h3>Menu</h3>
                                <nav>
                                    <div class="d-flex flex-column mb-3">
                                        <a id="playerMenu" class="border rounded p-1 m-1" onclick="menuNavigation(1)">
                                            <i class="fa-solid fa-map-location-dot"></i>
                                            Map
                                        </a>
                                        <a id="playerMenu" class="border rounded p-1 m-1" onclick="menuNavigation(2)">
                                            <i class="fa-solid fa-skull"></i>
                                            Mes Monstres
                                        </a>
                                        <a id="playerMenu" class="border rounded p-1 m-1" onclick="menuNavigation(3)">
                                            <i class="fa-solid fa-paw"></i>
                                            Bestiaire
                                        </a>
                                        <a id="playerMenu" class="border rounded p-1 m-1" onclick="menuNavigation(4)">
                                            <i class="fa-solid fa-parachute-box"></i>
                                            Inventaire
                                        </a>
                                        <a id="playerMenu" class="border rounded p-1 m-1" onclick="menuNavigation((5))">
                                            <i class="fa-solid fa-clipboard-question"></i>
                                            Quête
                                        </a>
                                        <a id="playerMenu" class="border rounded p-1 m-1" onclick="menuNavigation(6)">
                                            <i class="fa-solid fa-dungeon"></i>
                                            Donjon
                                        </a>
                                        <a id="playerMenu" class="border rounded p-1 m-1" onclick="menuNavigation(7)">
                                            <i class="fa-solid fa-ticket"></i>
                                            Invocation
                                        </a>
                                    </div>
                                </nav>
                            </div>
                            <div class="card m-1">

                                <a id="playerMenu" class="border rounded p-1 m-1" onclick="menuNavigation(2)">
                                    <i class="fa-solid fa-id-card"></i>
                                    Mon Profil
                                </a>
                            </div>
                        </div>

                        <div class="col-7 card p-0 " id="centerDiv">
                            {{-- Div map --}}
                            <div id="divMap" style="display: none">
                                <div class="card m-1">
                                    <h3>Map</h3>
                                    <div class="col m-1">
                                        <button class="btn btn-light" onclick="btnMap(1)" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Villes Seulement"><i
                                                class="fa-solid fa-hotel"></i></button>
                                        <button class="btn btn-light" onclick="btnMap(2)" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Ports/Lacs/Mers"><i
                                                class="fa-solid fa-water"></i></button>
                                        <button class="btn btn-light" onclick="btnMap(3)" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Îles et Forêt"><i
                                                class="fa-solid fa-volcano"></i></i></button>
                                        <button class="btn btn-light" onclick="btnMap(4)" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Tout"><i
                                                class="fa-solid fa-location-crosshairs"></i></button>
                                    </div>
                                </div>
                                <div class=" card m-1">
                                    <img id="imgMap" src="{{ asset('img/map/Astars_mapComplete.jpg') }}"
                                        class="img-fluid rounded m-1">
                                </div>

                            </div>

                            {{-- Div mes monstres --}}
                            <div id="divMonstre" style="display: none">
                                <div class="card m-1">
                                    <h3>Mes Monstres</h3>
                                </div>

                                <div class="container rounded p-0 ">
                                    <div class="card m-1 p-1">
                                        <div class="row row-cols-1 row-cols-md-6 g-1">
                                            @for ($i = 1; $i <= 3; $i++)
                                                <div class="col">
                                                    <div class="card" style="background-color: #f8f9fa">
                                                        <img src="{{ asset('img/téléchargement-removebg-preview.png') }}"
                                                            class="card-img-top" alt="...">
                                                        <div class="card-body p-0">
                                                            <h5 class="card-title">{{ $i }}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endfor
                                        </div>

                                    </div>
                                </div>

                            </div>

                            {{-- Div Bestiaire --}}
                            <div id="divBestiaire" style="display: none">
                                <div class="card m-1">
                                    <h3>Bestiaire</h3>
                                </div>

                                <div class="container rounded p-0 ">
                                    <div class="card m-1 p-1">
                                        <div class="row row-cols-1 row-cols-md-6 g-1">
                                            @for ($i = 1; $i <= 30; $i++)
                                                <div class="col">
                                                    <div class="card" style="background-color: #f8f9fa">
                                                        <img src="{{ asset('img/téléchargement-removebg-preview.png') }}"
                                                            class="card-img-top" alt="...">
                                                        <div class="card-body p-0">
                                                            <h5 class="card-title">{{ $i }}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endfor
                                        </div>

                                    </div>
                                </div>

                            </div>

                            {{-- Div Inventaire --}}
                            <div id="divInventaire" style="display: block">
                                <div class="card m-1">
                                    <h3>Inventaire</h3>
                                    <div class="col m-1">
                                        <button class="btn btn-light" onclick="btnSac(1)">Equipement</button>
                                        <button class="btn btn-light" onclick="btnSac(2)">Objet</button>
                                        <button class="btn btn-light" onclick="btnSac(3)">Jeton d’évolution</button>
                                        <button class="btn btn-light" onclick="btnSac(4)">Tout</button>
                                    </div>
                                </div>
                                <div class=" card m-1">dfesdfsd
                                </div>

                            </div>


                        </div>
                        <div class="col card p-0" id="rightDiv">
                            <div class="card m-1">
                                <h3>YES</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
