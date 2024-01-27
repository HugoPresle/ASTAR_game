{{-- Monster Info --}}
            <div id="divMonstreInfo" style="display: none" class="flex rounded-lg min-h-screen">
                <!-- Monster information goes here -->
                <!-- component -->
                <div class=" flex flex-wrap">
                    <div class="rounded-md border border-gray-200" style="width: fit-content; height: fit-content;">
                        <img src="{{ asset('/img/Bestiaire/002-Lézardiscus-removebg-preview.png') }}" />
                    </div>
                    <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                        <h2 class="text-sm title-font text-gray-500 tracking-widest">Astar #001</h2>
                        <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">Name <button
                                class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4">
                                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    class="w-5 h-5" viewBox="0 0 24 24">
                                    <path
                                        d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z">
                                    </path>
                                </svg>
                            </button></h1>
                        <div class="flex mb-4">
                            <a class="flex items-center mt-2 text-blue-600">
                                <i class="fa-solid fa-star fa-sm"></i>
                                <i class="fa-solid fa-star fa-sm"></i>
                                <i class="fa-solid fa-star fa-sm"></i>
                                <i class="fa-regular fa-star fa-sm"></i>
                                <i class="fa-regular fa-star fa-sm"></i>
                            </a>
                        </div>
                        <p class="leading-relaxed">Fam locavore kickstarter distillery. Mixtape chillwave tumeric
                            sriracha taximy chia microdosing tilde DIY. XOXO fam indxgo juiceramps cornhole raw
                            denim forage brooklyn. Everyday carry +1 seitan poutine tumeric. Gastropub blue bottle
                            austin listicle pour-over, neutra jean shorts keytar banjo tattooed umami cardigan.</p>
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
                                            Actuelle
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            lvl-100
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            Attaque
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            10
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            15
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            20
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            Defense
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            8
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            12
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            15
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            Vie
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            100
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            150
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            200
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            Vitesse
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            100
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            150
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            200
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="flex">
                    <button onclick="hideMonsterInfo()"
                        class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">Fermer</button>

                </div>
            </div>