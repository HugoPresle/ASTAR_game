{{-- Map --}}
        <div id="divMap" style="display: none" class="flex rounded-lg h-screen">
            <h3 class="text-2xl">Map</h3>
            <div class="">
                <button onclick="btnMap(1)" data-bs-toggle="tooltip" data-bs-placement="top" title="Villes Seulement"><i
                        class="fas fa-hotel"></i></button>
                <button onclick="btnMap(2)" data-bs-toggle="tooltip" data-bs-placement="top" title="Ports/Lacs/Mers"><i
                        class="fas fa-water"></i></button>
                <button onclick="btnMap(3)" data-bs-toggle="tooltip" data-bs-placement="top" title="Îles et Forêt"><i
                        class="fas fa-volcano"></i></button>
                <button onclick="btnMap(4)" data-bs-toggle="tooltip" data-bs-placement="top" title="Tout"><i
                        class="fas fa-location-crosshairs"></i></button>
            </div>
            <img id="imgMap" src="{{ asset('img/map/Astars_mapComplete.jpg') }}" class=" mx-auto rounded-xl">
        </div>