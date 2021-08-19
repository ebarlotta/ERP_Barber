<div>
    <div class="content-center flex">
        <div class="bg-red-300 p-2 text-center rounded-lg shadow-lg w-full flex justify-center">
            @foreach ($modulos as $modulo)
                <a href="{{ route($modulo->pagina) }}">
                    <div class="bg-gray-200 p-2 text-center rounded-lg shadow-lg w-auto m-1">
                        <h1>{{ $modulo->name }}</h1>
                        <p class="relative -bottom-11 left-0">
                            {{ $modulo->leyenda }}
                        </p>
                        <img class="rounded-md" src="{{ $modulo->imagen }}">
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
