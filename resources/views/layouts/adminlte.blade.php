

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Tailwind -->
<<<<<<< HEAD
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
=======
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
<<<<<<< HEAD
>>>>>>> 8a1afa81658c927b270153e13b6d49f04e24d163
=======
>>>>>>> f7b4677012a3b7fdee8c490bea21faab66a3ad1a
>>>>>>> 3284121bdc4b0dd60eb6a642758556cf07da7e52


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="js/jquery.mask.js"></script>

</head>
@extends('adminlte::page')
@section('content')
    
    
        <div class="bg-gray-100 h-full">

            <!-- Page Content -->
            <main>
<<<<<<< HEAD
                @yield('content')
                prueba
=======
                {{-- @yield('content')  Desactivado --}}
<<<<<<< HEAD
>>>>>>> 8a1afa81658c927b270153e13b6d49f04e24d163
=======
>>>>>>> f7b4677012a3b7fdee8c490bea21faab66a3ad1a
>>>>>>> 3284121bdc4b0dd60eb6a642758556cf07da7e52
            </main>
        </div>
        @stop
        @stack('modals')

        @livewireScripts
    </body>
    </html>