@extends('asset.header')

@section('content')
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto w-50" src="{{ asset('img/téléchargement-removebg-preview.png') }}" width="50"
                height="50"class="d-inline-block align-top" alt="">
            <h1 class=" text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Astar</h1>
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Connexion </h2>
        </div>
        {{-- ALERT --}}
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            @if (session()->has('success'))
                <div class="flex w-full max-w-sm overflow-hidden bg-white rounded-lg shadow-md">
                    <div class="flex items-center justify-center w-12 bg-emerald-500">
                        <i class="fa-solid fa-check fa-xl text-white"></i>
                    </div>

                    <div class="px-4 py-2 -mx-3">
                        <div class="mx-3">
                            <span class="font-semibold text-emerald-500 dark:text-emerald-400">Success</span>
                            <p class="text-sm text-gray-800"> {{ session()->get('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            @if (session()->has('fail'))
                <div class="flex w-full max-w-sm overflow-hidden bg-white rounded-lg shadow-md">
                    <div class="flex items-center justify-center w-12 bg-red-500">
                        <i class="fa-solid fa-triangle-exclamation fa-xl text-white"></i>
                    </div>

                    <div class="px-4 py-2 -mx-3">
                        <div class="mx-3">
                            <span class="font-semibold text-red-500 dark:text-red-400">Error</span>
                            <p class="text-sm text-gray-800"> {{ session()->get('fail') }}</p>
                        </div>
                    </div>
            @endif

        </div>
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">Player Card</div>
                    <p class="text-gray-700 text-base">
                        Name: <span id="playerName"></span><br>
                        ID: <span id="playerID"></span><br>
                        Time Played: <span id="playerTimePlayed"></span><br>
                        Number of Monsters Caught: <span id="playerMonstersCaught"></span>
                    </p><br>
                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                        onclick="loadLastSave()">USE</a>
                </div>
            </div>
            <br>
            <div>
                <input type="file" id="fileInput" style="display: none;" onchange="loadSave()" />
                <button type="submit" id="importSave" onclick="openFilePicker()"
                    class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    IMPORT SAVE
                </button>
            </div>
            <div>
                <button type="submit" onclick="newSave()"
                    class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    New SAVE
                </button>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>

    window.addEventListener("load", onLoad);
</script>
@endsection
