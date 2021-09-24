<div>
    <div class="content-center flex">
        <div class="bg-white p-2 text-center rounded-lg shadow-lg w-full flex justify-center">
            @if ($empresas)
                @foreach ($empresas as $empresa)
                    <div class="bg-gray-200 p-2 text-center rounded-lg shadow-lg w-auto m-1">
                        <a wire:click="cargamodulos({{ $empresa['id'] }})" >
                            <div class="flex justify-end">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="gray">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                              </svg>
                            </div>
                            <p class="relative -bottom-11 left-0">
                                {{ $empresa['name'] }}
                            </p>
                            <img class="rounded-md" src="https://picsum.photos/seed/picsum/200/300">
                        </a>
                    </div>
                @endforeach
            @else
                <div class="bg-gray-200 p-2 text-center rounded-lg shadow-lg w-auto m-1">
                    <p class="relative -bottom-11 left-0">
                        No hay empresas relacionadas con este usuario.
                    </p>
                </div>
            @endif
        </div>
    </div>
