<div>
    <div class="content-center flex">
        <div class="bg-white p-2 text-center rounded-lg shadow-lg w-full flex justify-center">
            @foreach ($empresas as $empresa)
                <div class="bg-gray-200 p-2 text-center rounded-lg shadow-lg w-auto m-1">
                    <a wire:click="cargamodulos({{ $empresa->id }})" href="{{ route('modulos') }}" >
                        <p class="relative -bottom-11 left-0">
                            {{ $empresa->name }}
                        </p>
                        <img class="rounded-md" src="https://picsum.photos/seed/picsum/200/300">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
