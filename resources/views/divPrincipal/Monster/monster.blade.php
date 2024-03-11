{{-- Monstre --}}
{{-- Team --}}
<div class="card my-3">
    <div id="mp_monsterTeam" class="grid grid-cols-1 md:grid-cols-3 gap-2"></div>
</div>    
<hr class="border-gray-200 m-2" />

{{-- Mes Monster --}}
<div class="card my-3">
    <nav class="relative bg-white shadow rounded-md my-2">
        <div class="container px-6 py-3 mx-auto md:flex">
            <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
            <div
                class="mx-auto w-full px-6 py-4  bg-white md:mt-0 md:p-0 md:top-0 md:relative md:opacity-100 md:translate-x-0 md:flex md:items-center md:justify-between">
                <div class="flex">
                    <button onclick="showMonsterByTypeBtn(2)"
                        class="px-2.5 py-2 text-gray-700 transition-colors duration-300 transform rounded-lg hover:text-cyan-500 md:mx-2">
                        Type
                    </button>
                    <button onclick="showMonsterByRarityBtn(2)"
                        class="px-2.5 py-2 text-gray-700 transition-colors duration-300 transform rounded-lg hover:text-cyan-500 md:mx-2">
                        Rareté
                    </button>
                    <button onclick="sortByLevel()" id="btnSortByLevel"
                        class="px-2.5 py-2 text-gray-700 transition-colors duration-300 transform rounded-lg hover:text-cyan-500 md:mx-2">
                        Trier par niveau
                    </button>
                </div>

                <div class="flex">
                    <button id="btnResetFilter" onclick="resetFilters('mp_myMonster')"
                        class="hidden px-2.5 py-2 text-gray-700 transition-colors duration-300 transform rounded-lg hover:text-red-500 md:mx-2"><i
                            class="fa-solid fa-trash fa-gl"></i></button>

                    <div class="relative mt-4 md:mt-0">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                </path>
                            </svg>
                        </span>

                        <input type="text" onkeyup="filter('mp_myMonster')" id="surnameInput"
                            class="w-full py-2 pl-10 pr-4 text-gray-700 bg-white border border-gray-400 rounded-lg focus:border-gray-400 focus:outline-none focus:ring focus:ring-opacity-40 focus:ring-gray-400"
                            placeholder="Search">
                    </div>
                </div>
            </div>
        </div>
        <div id="typeMenu2" class="container px-6 py-3 mx-auto md:flex md:flex-wrap flex-wrap justify-center"
            style="display: none">
            @foreach ($types as $type)
                <button name="filterBtn2" id="filterBtn" onclick="filter('mp_myMonster',this,'type')"
                    style="color: {{ $type->color }};" value="{{ $type->idMonster_Type }}"
                    class="font-semibold px-2.5 py-2 transition-colors duration-300 transform rounded-lg hover:bg-gray-100 md:mx-2">
                    {{ $type->nameType }}
                </button>
            @endforeach
        </div>
        <div id="rarityMenu2" class="container px-6 py-3 mx-auto md:flex md:flex-wrap" style="display: none">
            @foreach ($raritys->take(6) as $rarity)
                <button name="filterBtn2" id="rarityBtn" onclick="filter('mp_myMonster',this,'rarity')"
                    value="{{ $rarity->idRarity }}"
                    class="px-2.5 py-2 transition-colors duration-300 transform rounded-lg hover:bg-gray-100 md:mx-2">
                    <div class="flex flex-col">
                        <span class="font-semibold">{{ $rarity->name }}</span>
                        <span class="{{ $rarity->color }}">
                            @php
                                $maxStars = min($rarity->idRarity, 5);
                            @endphp
                            @for ($i = 0; $i < $maxStars; $i++)
                                <i class="fa-solid fa-star fa-sm"></i>
                            @endfor
                            @for ($i = 0; $i < 5 - $maxStars; $i++)
                                <i class="fa-regular fa-star fa-sm"></i>
                            @endfor
                        </span>
                    </div>
                </button>
            @endforeach
        </div>
    </nav>
    <div id="mp_myMonster" class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-2"></div>
</div>
