@extends('asset.header')

@section('content')
    <div id="confirmDialog" class="fixed z-10 inset-0 overflow-y-auto hidden" style="z-index: 999999;">
        @include('asset.alert')
    </div>
    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
        type="button"
        class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 light:focus:ring-gray-600">
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>

    <aside id="default-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 light:bg-gray-800">
            <div class="p-2">
                <img src="{{ asset('img/téléchargement-removebg-preview.png') }}" width="50" height="50"
                    class="inline-block align-top" alt="">
                <span>ASTAR</span>
            </div>
            <hr class="border-gray-200" />
            <ul class="p-2 space-y-2 font-medium" id="playerMenu">
                <li>
                    <a id="menuMonstre" onclick="menuNavigation(this)" name="menuTab"
                        class="selected bg-stone-600 text-white flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200 cursor-pointer rounded-lg group hover:text-white hover:bg-stone-600">
                        <i class="fas fa-dragon fa-beat fa-lg pr-2"></i>
                        <span class="ms-3">Mes Monstres</span>
                    </a>
                </li>
                <li>
                    <a id="menuBestiaire" onclick="menuNavigation(this)" name="menuTab"
                        class="flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200 text-gray-900 hover:text-white rounded-lg hover:bg-stone-600 group ">
                        <i class="fas fa-paw fa-lg pr-2"></i>
                        <span class="ms-3">Bestiaire</span>
                    </a>
                </li>
                <li>
                    <a id="menuMap" onclick="menuNavigation(this)" name="menuTab"
                        class="flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200 cursor-pointer rounded-lg group hover:text-white hover:bg-stone-600">
                        <i class="fas fa-map-location-dot fa-lg pr-2"></i>
                        <span class="ms-3">Map</span>
                    </a>
                </li>
                <li>
                    <a id="menuInventaire" onclick="menuNavigation(this)" name="menuTab"
                        class="flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200 cursor-pointer rounded-lg group hover:text-white hover:bg-stone-600">
                        <i class="fas fa-parachute-box fa-lg pr-2"></i>
                        <span class="ms-3">Inventaire</span>
                    </a>

                </li>
                <li>
                    <a id="menuQuete" onclick="menuNavigation(this)" name="menuTab"
                        class="flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200 cursor-pointer rounded-lg group hover:text-white hover:bg-stone-600">
                        <i class="fas fa-clipboard-question fa-lg pr-2"></i>
                        <span class="ms-3">Quête</span>
                    </a>
                </li>
                <li>
                    <a id="menuDonjon" onclick="menuNavigation(this)" name="menuTab"
                        class="flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200 cursor-pointer rounded-lg group hover:text-white hover:bg-stone-600">
                        <i class="fas fa-dungeon fa-lg pr-2"></i>
                        <span class="ms-3">Donjon</span>
                    </a>
                </li>
                <li>
                    <a id="menuInvocation" onclick="menuNavigation(this)" name="menuTab"
                        class="flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200 cursor-pointer rounded-lg group hover:text-white hover:bg-stone-600">
                        <i class="fas fa-ticket fa-lg pr-2"></i>
                        <span class="ms-3">Invocation</span>
                    </a>
                </li>
                <li>
                    <a id="menuShop" onclick="menuNavigation(this)" name="menuTab"
                        class="flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200 cursor-pointer rounded-lg group hover:text-white hover:bg-stone-600">
                        <i class="fas fa-store fa-lg"></i>
                        <span class="ms-3">Shop</span>
                    </a>
                </li>
                <li class="none">
                    <a href="" id="menuMonstreInfo" class="none"></a>
                </li>

                <hr class="border-gray-200" />
                {{-- Menu --}}
                <a id="" onclick="menuNavigation(this)" name="menuTab"
                    class="flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200 cursor-pointer rounded-lg group hover:text-white hover:bg-stone-600">
                    <i class="fas fa-newspaper fa-lg pr-2"></i>
                    <span>Actualité</span>
                </a>
                <a id="" onclick="menuNavigation(this)" name="menuTab"
                    class="flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200 cursor-pointer rounded-lg group hover:text-white hover:bg-stone-600">
                    <i class="fas fa-gift fa-lg pr-2"></i>
                    <span>Cadeau</span>
                </a>
                <a id="" onclick="menuNavigation(this)" name="menuTab"
                    class="flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200 cursor-pointer rounded-lg group hover:text-white hover:bg-stone-600">
                    <i class="fas fa-cogs fa-lg pr-2"></i>
                    <span>Paramètres</span>
                </a>
                <a id="menuSave" href="/startingAdventure" onclick="menuNavigation(this)" name="menuTab"
                    class="flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200 cursor-pointer rounded-lg group hover:text-white hover:bg-stone-600">
                    <i class="fa-solid fa-floppy-disk fa-lg pr-2"></i>
                    <span>Sauvegarder et Quitter</span>
                </a>

                <a id="menuAdmin" onclick="menuNavigation(this)" name="menuTab"
                    class="flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200 cursor-pointer rounded-lg group hover:text-white hover:bg-stone-600">
                    <i class="fas fa-cogs fa-lg pr-2"></i>
                    <span>Admin</span>
                </a>

                <hr class="border-gray-200" />
                {{-- Avatar --}}
                <div class="flex items-center gap-x-2">
                    <img class="object-cover w-12 h-12 rounded-lg"
                        src="https://www.iconpacks.net/icons/2/free-user-icon-3296-thumb.png" alt="avatar">

                    <div id="infoPlayer">
                        <h1 id="hp_playerName" class="text-xl font-semibold text-gray-700 capitalize">
                        </h1>
                        <h2 class="font-semibold text-gray-700 capitalize">
                            <span>Lvl: </span>
                            <span id="hp_lvl"></span>
                        </h2>
                        <h3 class="font-semibold text-gray-700 capitalize">
                            <i class="fas fa-money-bill-wave text-green-600"></i>
                            <span id="hp_money"></span>
                        </h3>
                        <h3 class="font-semibold text-gray-700 capitalize">
                            <i class="fas fa-gem text-blue-600 "></i>
                            <span id="hp_gem"></span>
                        </h3>
                        <h3 class="font-semibold text-gray-700 capitalize">
                            <i class="fas fa-bolt-lightning text-yellow-400"></i>
                            <span id="hp_nrj"></span>
                        </h3>
                    </div>
                </div>
            </ul>
        </div>
    </aside>

    <div class="p-4 sm:ml-64">
        <div id="divPrincipal" class="p-4 border-2 border-dashed rounded-lg border-gray-200">
            {{-- Import another Blade file --}}

            {{-- Monster Info --}}
            <div name="divPrincipal" id="divMonstreInfo" style="display: none" class="flex rounded-lg min-h-screen">
                @include('divPrincipal.Monster.monsterInfo')
            </div>

            {{-- Monster --}}
            <div name="divPrincipal" id="divMonstre" style="display: none" class="flex rounded-lg min-h-screen">
                @include('divPrincipal.Monster.monster')
            </div>

            {{-- Map --}}
            <div name="divPrincipal" id="divMap" style="display: none" class="flex rounded-lg min-h-screen">
                @include('divPrincipal.map')
            </div>

            {{-- Shop --}}
            <div name="divPrincipal" id="divShop" style="display: block" class="flex rounded-lg min-h-screen">
                @include('divPrincipal.shop')
            </div>

            {{-- Inventaire --}}
            <div name="divPrincipal" id="divInventaire" style="display: none" class="flex rounded-lg min-h-screen">
                @include('divPrincipal.inventaire')
            </div>

            {{-- Bestiaire --}}
            <div name="divPrincipal" id="divBestiaire" style="display: none" class="flex rounded-lg min-h-screen">
                @include('divPrincipal.Monster.bestiaire')
            </div>

            {{-- Admin --}}
            <div name="divPrincipal" id="divAdmin" style="display: none" class="flex rounded-lg min-h-screen">
                @include('admin')
            </div>
        </div>
    @endsection
    @section('scripts')
        <script>
            window.addEventListener("load", loadHomePage);
            window.addEventListener("load", markedDiscovered);
            window.addEventListener("load", loadMyMonstersCard(@json($monsters)));
            window.addEventListener("load", loadMyTeamCard(@json($monsters)));
            window.addEventListener("load", loadInventory(@json($items)));
            window.addEventListener("load", setMonsterList(@json($monsters)));
            window.addEventListener("load", setRarities(@json($raritys)));
            window.addEventListener("load", setItemList(@json($items)));
        </script>
    @endsection
