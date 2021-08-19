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
                    <x-crear>Nuevo Proveedor</x-crear>
                    @if ($isModalOpen)
                        @include('livewire.proveedor.createproveedores')
                    @endif
                    <table class="table-fixed table-striped w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2">Nombre del Proveedor</th>
                                <th class="px-4 py-2">Dirección</th>
                                <th class="px-4 py-2">Cuit</th>
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
                                        <td class="border px-4 py-2 text-left">{{ $proveedor->direccion }}</td>
                                        <td class="border px-4 py-2 text-left">{{ $proveedor->cuit }}</td>
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
                </div>
            </div>
        </div>
    </div>
</div>
