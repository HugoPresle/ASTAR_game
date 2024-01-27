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
                        <i class="fa-solid fa-triangle-exclamation fa-xl text-white"></i>                    </div>

                    <div class="px-4 py-2 -mx-3">
                        <div class="mx-3">
                            <span class="font-semibold text-red-500 dark:text-red-400">Error</span>
                            <p class="text-sm text-gray-800"> {{ session()->get('fail') }}</p>
                        </div>
                    </div>
            @endif

        </div>
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" method="POST" action="/login">
                @csrf
                <div>
                    <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Pseudo</label>
                    <div class="mt-2">
                        <input id="username" name="username" type="text" autocomplete="username" required autofocus
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Mot de passe</label>

                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Se connecter
                    </button>
                    <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500 text-sm">
                        Mot de passe oublié ?
                    </a>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                Vous n'avez pas de compte ?
                <a href="/register" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">En
                    créer un</a>
            </p>
        </div>
    </div>
@endsection
