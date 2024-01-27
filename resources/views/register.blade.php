@extends('asset.header')

<link rel="stylesheet" href="{{ asset('css/login.css') }}">

@section('content')
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto w-50" src="{{ asset('img/téléchargement-removebg-preview.png') }}" width="50"
                height="50"class="d-inline-block align-top" alt="">
            <h1 class=" text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Astar</h1>
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Inscription </h2>
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
            <form class="space-y-6" method="POST" action="/register">
                @csrf
                <div>
                    <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Pseudo</label>
                    <div class="mt-2">
                        <input id="username" name="username" type="text" autocomplete="username" required autofocus
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">E-mail</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email" required autofocus
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>


                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                    <div>
                        <label class="block text-sm font-medium leading-6 text-gray-900" for="password">Password</label>
                        <input id="password" name="password" type="password"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>

                    <div>
                        <label class="block text-sm font-medium leading-6 text-gray-900" for="passwordConfirm">
                            Confirmation
                            <input id="passwordConfirm" name="passwordConfirm" type="password"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Commencer l'aventure !
                    </button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                Vous avez déjà un compte ?
                <a href="/login" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Se connecter</a>
            </p>
        </div>
    </div>
@endsection
