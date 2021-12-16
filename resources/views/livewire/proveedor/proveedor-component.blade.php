<div>
    <x-titulo>Proveedores</x-titulo>
    <x-slot name="header">
        <div class="flex">
            <!-- //Comienza en submenu de encabezado -->

            <!-- Navigation Links -->
            @livewire('submenu')
        </div>

    </x-slot>

    <x-crear>Nuevo Proveedor</x-crear>
    @if ($isModalOpen)
        @include('livewire.proveedor.createproveedores')
    @endif
    
    <div style="display: block">
        @foreach ($datos as $proveedor)
                <div class="p-2 shadow-lg" style="background:linear-gradient(90deg, lightblue 20%, white 50%); width:93%; height:100px; display: flex; margin: 1.25rem; border-radius: 10px; height: 100%;">
                    <div style="width:90%;">
                        <div style="width:100%; display: flex">
                            <p class="shadow-md m-1" style="font-size: 18px; background-color: rgb(226, 230, 230); border-radius: 10px; padding: 3px;">{{ $proveedor->name }}</p>
                            <p class="shadow-md m-1" style="background-color: rgb(226, 230, 230); border-radius: 10px; padding: 3px;">{{ $proveedor->direccion }}</p>
                        </div>
                        <div style="width:100%; display: flex">
                            <p class="shadow-md m-1" style="background-color: rgb(226, 230, 230);border-radius: 10px; padding: 3px;">{{ $proveedor->telefono }}</p>
                            <p class="shadow-md m-1" style="background-color: rgb(226, 230, 230);border-radius: 10px; padding: 3px;">{{ $proveedor->email }}</p>
                        </div>
                    </div>
                    <div style="width:10%;">
                        <div class="block justify-center" style="width: 20%; margin: auto; justify-content: space-around;align-items: center;">
                            <!-- Editar  -->
                            <x-editar id="{{ $proveedor->id }}"></x-editar>
                            <!-- Eliminar -->
                            <x-eliminar id="{{ $proveedor->id }}"></x-eliminar>
                        </div>
                        {{-- </div><br> --}}
                    </div>
                    {{-- </td> --}}
                    {{-- </tr> --}}
                </div>
        @endforeach
        <div class="w-full">{{ $datos->links() }}</div>
    </div>
