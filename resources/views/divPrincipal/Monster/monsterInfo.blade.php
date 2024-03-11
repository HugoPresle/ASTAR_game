{{-- Monster Info --}}

<div class="flex flex-wrap p-3">
    <div class="md:w-1/2 w-full p-3">
        <img id="image" />
    </div>
    <div class="md:w-1/2 w-full p-3 pb-0 rounded-md border border-gray-200 bg-stone-100">
        <h2 id="numero" class="text-sm title-font text-gray-500 tracking-widest"> {{-- Id --}} </h2>
        <div class="flex items-center">
            <h1 id="name" class="text-gray-900 text-3xl title-font font-medium mb-1"> {{-- Name --}} </h1>
            <button class="px-2" onclick="addToFavorites()">
                <i id="favHearth" class="fa-regular fa-heart fa-2xl"></i>
            </button>
        </div>
        <h2 id="level" class="text-sm title-font text-gray-500 tracking-widest"> {{-- Level --}} </h2>
        <div id="rarity" class="flex mb-4 py-2"> {{-- Rarity --}} </div>
        <p id="type" class="leading-relaxed"> {{-- Type --}} </p>
        <p id="description" class="leading-relaxed"> {{-- Description --}} </p>
        <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5">
            <div class="flex">
                <span class="mr-3">Brillant :</span>
                <button class="border-2 border-gray-300 rounded-full w-6 h-6 focus:outline-none"></button>
                <button
                    class="border-2 border-gray-300 ml-1 bg-amber-300 rounded-full w-6 h-6 focus:outline-none"></button>
            </div>
        </div>
        <h3 class="text-2xl mb-4">Statistiques</h3>
        <div class="overflow-x-auto">

            <table class="min-w-full  divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Statistique
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Base
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            lvl-<span id="lvl"></span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap"> Attaque </td>
                        <td id="statAtkBase" class="px-6 py-4 whitespace-nowrap"> {{-- Atk --}} </td>
                        <td id="statAtkActual" class="px-6 py-4 whitespace-nowrap"> {{-- Atk --}} </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap"> Défense </td>
                        <td id="statDefBase" class="px-6 py-4 whitespace-nowrap"> {{-- Def --}} </td>
                        <td id="statDefActual" class="px-6 py-4 whitespace-nowrap"> {{-- Def --}} </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap"> PV </td>
                        <td id="statHpBase" class="px-6 py-4 whitespace-nowrap"> {{-- Hp --}} </td>
                        <td id="statHpActual" class="px-6 py-4 whitespace-nowrap"> {{-- Hp --}} </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap"> Vitesse </td>
                        <td id="statSpeedBase" class="px-6 py-4 whitespace-nowrap"> {{-- Speed --}} </td>
                        <td id="statSpeedActual" class="px-6 py-4 whitespace-nowrap"> {{-- Speed --}} </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div
            class="flex flex-col items-center justify-center w-full max-w-sm mx-auto m-3 ">
            <button onclick="hideMonsterInfo()"
                class="text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">
                Fermer
            </button>
        </div>
    </div>
</div>
