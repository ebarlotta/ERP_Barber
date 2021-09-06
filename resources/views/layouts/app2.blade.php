<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Tailwind -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script type="text/javascript">
    function soloNumero(vnum,nent,nfra) {
        if (event.keyCode !== 46 && ((event.keyCode < 48) || (event.keyCode > 57))) return false;
        if (event.keyCode == 46 && (vnum.indexOf(".") !== -1)) return false;
        if (event.keyCode !== 46 && vnum.length >= nent && vnum.indexOf(".") == -1) return false;
        var auxn = vnum.split(".");
        if (auxn[1] && auxn[1].length >= nfra) return false;
        return true;
    }
    </script> 
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="bg-gray-100 h-full">
        {{-- @livewire('navigation-menu') --}}

        <!-- Page Heading min-h-screen -->
        {{-- @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif --}}

        <!-- Page Content -->
        <main>
            {{ $slot ?? '' }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>
