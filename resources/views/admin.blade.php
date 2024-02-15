{{-- Bestiaire --}}

<div class="container rounded p-0">
    <div class="card m-1 p-1">
        <select id="selectMonster" class="w-full max-w-sm mx-auto form-select">
            @foreach ($monsters as $monster)
                <option value="{{ $monster->idMonster }}">
                    <div class="card bg-center bg-cover rounded-lg shadow-md"
                        style="background-image: url({{ $monster->image }}); height: 300px;">
                        <div class="card-body">
                            <h3 id="monsterName" class="card-title text-center text-uppercase text-gray-800">
                                {{ $monster->name }}
                            </h3>
                        </div>
                    </div>
                </option>
            @endforeach
        </select>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="giveMonsterToPlayer()">ADD</button>
        </div>
</div>