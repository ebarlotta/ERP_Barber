<div>
    <x-titulo>Proveedores</x-titulo>
    <x-slot name="header">
        <div class="flex">
            <!-- //Comienza en submenu de encabezado -->

            <!-- Navigation Links -->
            @livewire('submenu')
        </div>

    </x-slot>
    <div class="content-center flex">
        <div class="bg-white p-2 text-center rounded-lg shadow-lg w-full">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    @if (session()->has('message'))
                        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                            role="alert">
                            <div class="flex">
                                <div>
                                    <p class="text-xm bg-lightgreen">{{ session('message') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
<<<<<<< HEAD
                    <x-crear>Nuevo Proveedor</x-crear>
                    @if ($isModalOpen)
                        @include('livewire.proveedor.createproveedores')
                    @endif
                    <table class="table-fixed table-striped w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2">Nombre del Proveedor</th>
                                {{-- <th class="px-4 py-2">Dirección</th>
                                <th class="px-4 py-2">Cuit</th> --}}
                                <th class="px-4 py-2">Teléfono</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($proveedores)
                                @foreach ($proveedores as $proveedor)
                                    <tr>
                                        <td class="border px-4 py-2 text-left">{{ $proveedor->name }}</td>
                                        {{-- <td class="border px-4 py-2 text-left">{{ $proveedor->direccion }}</td>
                                        <td class="border px-4 py-2 text-left">{{ $proveedor->cuit }}</td> --}}
                                        <td class="border px-4 py-2 text-left">{{ $proveedor->telefono }}</td>
                                        <td class="border px-4 py-2 text-left">{{ $proveedor->email }}</td>
                                        <td class="border px-4 py-2">
                                            <div class="flex justify-center">
                                                <!-- Editar  -->
                                                <x-editar id="{{ $proveedor->id }}"></x-editar>
                                                <!-- Eliminar -->
                                                <x-eliminar id="{{ $proveedor->id }}"></x-eliminar>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
=======
    <div class="flex justify-around">
        <x-crear>Nuevo Proveedor</x-crear>
        @if ($isModalOpen)
            @include('livewire.proveedor.createproveedores')
        @endif
        <div class="w-full">{{ $datos->links() }}</div>
    </div>
    <div style="display: block">
    <label for="">Buscar por nombre</label><input class="shadow-md m-1" style="font-size: 18px; background-color: rgb(226, 230, 230); border-radius: 10px; padding: 3px;" wire:model="search" type="search" placeholder="Ingresa nombre">



    <table class="table-fixed table-striped w-full">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2">Nombre</th>
                <th class="px-4 py-2">Dirección</th>
                <th class="px-4 py-2">Teléfono</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @if ($datos)
                @foreach ($datos as $proveedor)
                    <tr>
                        <td class="border px-4 py-2 text-left">{{ $proveedor->name }}</td>
                        <td class="border px-4 py-2 text-left">{{ $proveedor->direccion }}</td>
                        <td class="border px-4 py-2 text-left">{{ $proveedor->telefono }}</td>
                        <td class="border px-4 py-2 text-left">{{ $proveedor->email }}</td>
                        <td class="border px-4 py-2">
                            <div class="flex justify-center">
                                <div class="sm:flex justify-center">
                                    <!-- Editar  -->
                                    <x-editar id="{{ $proveedor->id }}"></x-editar>
                                </div>
                                <div class="sm:flex justify-center">
                                    <!-- Eliminar -->
                                    <x-eliminar id="{{ $proveedor->id }}"></x-eliminar>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table> 




        {{-- @foreach ($datos as $proveedor)
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
<<<<<<< HEAD
>>>>>>> 8a1afa81658c927b270153e13b6d49f04e24d163
=======
>>>>>>> f7b4677012a3b7fdee8c490bea21faab66a3ad1a
>>>>>>> 3284121bdc4b0dd60eb6a642758556cf07da7e52
                </div>
            </div>
        @endforeach --}}
    </div>
</div>
