{{-- Monstre --}}
<div id="divMonstre" style="display: block" class="flex rounded-lg min-h-screen">
    {{-- Team --}}
    <div class="card m-1">
        <h3 class="text-2xl">Mon équipe</h3>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
        @for ($i = 1; $i <= 3; $i++)
            {{-- Monster --}}
            <div id="cardMonsterEquip{{ $i }}"
                class="flex flex-col items-center justify-center w-full max-w-sm mx-auto">
                <div class="w-full h-64 bg-center bg-cover rounded-lg shadow-md"
                    style="background-image: url({{ asset('img/Bestiaire/003-Velociflora-removebg-preview.png') }}) ">
                </div>

                <div class="w-56 -mt-10 overflow-hidden  rounded-lg shadow-lg md:w-64 dark:bg-gray-800">
                    <h3 class="py-2 font-bold tracking-wide text-center uppercase text-white">
                        Monster{{ $i }}
                    </h3>

                    <div class="flex items-center justify-between px-3 py-2 bg-gray-200 dark:bg-gray-700">
                        <span class="font-bold text-white">#{{ $i }}</span>
                        <button onclick="showCard({{ $i }},true)"
                            class="px-2 py-1 text-xs font-semibold text-white uppercase transition-colors duration-300 transform bg-gray-800 rounded hover:bg-gray-700 dark:hover:bg-gray-600 focus:bg-gray-700 dark:focus:bg-gray-600 focus:outline-none">
                            Informations
                        </button>
                    </div>
                </div>
            </div>
            {{-- Monster Info --}}
            <div id="cardMonsterEquip{{ $i }}Details"
                class="flex flex-col items-center justify-center w-full max-w-sm mx-auto hidden">
                <div class="w-full h-64 bg-center bg-cover rounded-lg shadow-md "
                    style="background-image: url({{ asset('img/Bestiaire/003-Velociflora-removebg-preview.png') }}) ">

                    <div
                        class="px-6 py-4 flex flex-col items-center justify-center bg-white bg-opacity-85 rounded mx-auto my-2">
                        <h1 class="text-xl font-semibold text-gray-800 ">Nom{{ $i }} - Lvl :
                            {{ $i }}
                        </h1>
                        <div class="flex items-center mt-4 text-gray-800">
                            <i class="fa-solid fa-crosshairs fa-lg pr-2"></i>
                            <h1 class="px-2 text-sm">-> 100</h1>
                        </div>

                        <div class="flex items-center mt-4 text-gray-800">
                            <i class="fa-solid fa-shield-halved fa-lg pr-2"></i>
                            <h1 class="px-2 text-sm">-> 300</h1>
                        </div>

                        <div class="flex items-center mt-4 text-gray-800">
                            <i class="fa-solid fa-heart fa-lg pr-2"></i>
                            <h1 class="px-2 text-sm">-> 018</h1>
                        </div>
                        <div class="flex items-center mt-4 text-gray-800">
                            <i class="fa-solid fa-wind fa-lg pr-2"></i>
                            <h1 class="px-2 text-sm">-> 198</h1>
                        </div>
                    </div>
                </div>

                <div class="w-56 -mt-10 overflow-hidden  rounded-lg shadow-lg md:w-64 dark:bg-gray-800">
                    <h3 class="py-2 font-bold tracking-wide text-center uppercase text-white">
                        Monster{{ $i }} Info
                        <a href="#" onclick="showMonsterInfo({{ $i }})"
                            title="Plus d'information">
                            <i class="fa-solid fa-circle-plus fa-xs"></i>
                        </a>
                    </h3>
                    </h3>

                    <div class="flex items-center justify-between px-3 py-2 bg-gray-200 dark:bg-gray-700">
                        <span class="font-bold text-white">#{{ $i }}</span>
                        <button onclick="hideCard({{ $i }},true)"
                            class="px-2 py-1 text-xs font-semibold text-white uppercase transition-colors duration-300 transform bg-gray-800 rounded hover:bg-gray-700 dark:hover:bg-gray-600 focus:bg-gray-700 dark:focus:bg-gray-600 focus:outline-none">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        @endfor

    </div>
    <hr class="border-gray-200 m-2" />

    {{-- Mes Monster --}}
    <div class="card m-1">
        <h3 class="text-2xl">Mes Monstres</h3>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        @for ($i = 1; $i <= 12; $i++)
            {{-- Monster --}}
            <div id="cardMonster{{ $i }}"
                class="flex flex-col items-center justify-center w-full max-w-sm mx-auto">
                <div class="w-full h-64 bg-center bg-cover rounded-lg shadow-md"
                    style="background-image: url({{ asset('/img/Bestiaire/013-Owltale-removebg-preview.png') }}) ">
                </div>

                <div class="w-56 -mt-10 overflow-hidden  rounded-lg shadow-lg md:w-64 dark:bg-gray-800">
                    <h3 class="py-2 font-bold tracking-wide text-center uppercase text-white">
                        Monster{{ $i }}
                    </h3>

                    <div class="flex items-center justify-between px-3 py-2 bg-gray-200 dark:bg-gray-700">
                        <span class="font-bold text-white">#{{ $i }}</span>
                        <button onclick="showCard({{ $i }},false)"
                            class="px-2 py-1 text-xs font-semibold text-white uppercase transition-colors duration-300 transform bg-gray-800 rounded hover:bg-gray-700 dark:hover:bg-gray-600 focus:bg-gray-700 dark:focus:bg-gray-600 focus:outline-none">
                            Informations
                        </button>
                    </div>
                </div>
            </div>
            {{-- Monster Info --}}
            <div id="cardMonster{{ $i }}Details"
                class="flex flex-col items-center justify-center w-full max-w-sm mx-auto hidden">
                <div class="w-full h-64 bg-center bg-cover rounded-lg shadow-md "
                    style="background-image: url({{ asset('/img/Bestiaire/013-Owltale-removebg-preview.png') }}) ">

                    <div
                        class="px-6 py-4 flex flex-col items-center justify-center bg-white bg-opacity-85 rounded mx-auto my-2">
                        <h1 class="text-xl font-semibold text-gray-800 ">Nom{{ $i }} - Lvl :
                            {{ $i }}</h1>

                        <div class="flex items-center mt-4 text-gray-800">
                            <i class="fa-solid fa-crosshairs fa-lg pr-2"></i>
                            <h1 class="px-2 text-sm">-> 100</h1>
                        </div>

                        <div class="flex items-center mt-4 text-gray-800">
                            <i class="fa-solid fa-shield-halved fa-lg pr-2"></i>
                            <h1 class="px-2 text-sm">-> 300</h1>
                        </div>

                        <div class="flex items-center mt-4 text-gray-800">
                            <i class="fa-solid fa-heart fa-lg pr-2"></i>
                            <h1 class="px-2 text-sm">-> 018</h1>
                        </div>
                        <div class="flex items-center mt-4 text-gray-800">
                            <i class="fa-solid fa-wind fa-lg pr-2"></i>
                            <h1 class="px-2 text-sm">-> 198</h1>
                        </div>
                    </div>
                </div>

                <div class="w-56 -mt-10 overflow-hidden  rounded-lg shadow-lg md:w-64 dark:bg-gray-800">
                    <h3 class="py-2 font-bold tracking-wide text-center uppercase text-white">
                        Monster{{ $i }} Info
                        <a href="#" title="Plus d'information"><i
                                class="fa-solid fa-circle-plus fa-xs"></i></a>
                    </h3>

                    <div class="flex items-center justify-between px-3 py-2 bg-gray-200 dark:bg-gray-700">
                        <span class="font-bold text-white">#{{ $i }}</span>
                        <button onclick="hideCard({{ $i }},false)"
                            class="px-2 py-1 text-xs font-semibold text-white uppercase transition-colors duration-300 transform bg-gray-800 rounded hover:bg-gray-700 dark:hover:bg-gray-600 focus:bg-gray-700 dark:focus:bg-gray-600 focus:outline-none">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        @endfor
        <div class="flex">
            <a href="#"
                class="flex items-center px-4 py-2 mx-1 text-gray-500 bg-white rounded-md cursor-not-allowed dark:bg-gray-800 dark:text-gray-600">
                previous
            </a>

            <a href="#"
                class="items-center hidden px-4 py-2 mx-1 text-gray-700 transition-colors duration-300 transform bg-white rounded-md sm:flex dark:bg-gray-800 dark:text-gray-200 hover:bg-blue-600 dark:hover:bg-blue-500 hover:text-white dark:hover:text-gray-200">
                1
            </a>

            <a href="#"
                class="items-center hidden px-4 py-2 mx-1 text-gray-700 transition-colors duration-300 transform bg-white rounded-md sm:flex dark:bg-gray-800 dark:text-gray-200 hover:bg-blue-600 dark:hover:bg-blue-500 hover:text-white dark:hover:text-gray-200">
                2
            </a>

            <a href="#"
                class="items-center hidden px-4 py-2 mx-1 text-gray-700 transition-colors duration-300 transform bg-white rounded-md sm:flex dark:bg-gray-800 dark:text-gray-200 hover:bg-blue-600 dark:hover:bg-blue-500 hover:text-white dark:hover:text-gray-200">
                3
            </a>

            <a href="#"
                class="flex items-center px-4 py-2 mx-1 text-gray-700 transition-colors duration-300 transform bg-white rounded-md dark:bg-gray-800 dark:text-gray-200 hover:bg-blue-600 dark:hover:bg-blue-500 hover:text-white dark:hover:text-gray-200">
                Next
            </a>
        </div>
    </div>
</div>