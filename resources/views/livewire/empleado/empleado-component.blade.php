<div>
    <x-titulo>Empleados</x-titulo>
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
                    <x-crear>Nuevo Empleado</x-crear>
                    @if ($isModalOpen)
                        @include('livewire.empleado.createempleados')
                    @endif
                    <table class="table-fixed table-striped w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 ">Legajo</th>
                                <th class="px-4 py-2 ">Nombre</th>
                                <th class="px-4 py-2 ">DNI</th>
                                {{-- <th class="px-4 py-2  sm:hidden">Dirección</th>
                                <th class="px-4 py-2  sm:hidden">Cuil</th>
                                <th class="px-4 py-2  sm:hidden">Teléfono</th>
                                <th class="px-4 py-2  sm:hidden">Nacimiento</th>
                                <th class="px-4 py-2  sm:hidden">Ingreso</th>
                                <th class="px-4 py-2  sm:hidden">Estado Civil</th>
                                <th class="px-4 py-2  sm:hidden">Tipo de Contratación</th>
                                <th class="px-4 py-2  sm:hidden">Régimen</th>
                                <th class="px-4 py-2  sm:hidden">Banco</th>
                                <th class="px-4 py-2  sm:hidden">NroCuentaBancaria</th>
                                <th class="px-4 py-2  sm:hidden">Mensualizado</th>
                                <th class="px-4 py-2  sm:hidden">Jornalizado</th>
                                <th class="px-4 py-2  sm:hidden">Por Hora</th>
                                <th class="px-4 py-2  sm:hidden">Por Unidad</th>
                                <th class="px-4 py-2  sm:hidden">Activo</th>
                                <th class="px-4 py-2  sm:hidden">Fecha de Baja</th>
                                <th class="px-4 py-2  sm:hidden">Categoría Profesional</th> --}}

                                <th class="px-4 py-2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($empleados)
                                @foreach ($empleados as $empleado)
                                    <tr>
                                        <td class="border px-4 py-2 text-left">{{ $empleado->legajo }}</td>
                                        <td class="border px-4 py-2 text-left">{{ $empleado->name }}</td>
                                        <td class="border px-4 py-2 text-left">{{ $empleado->dni }}</td>
                                        {{-- <td class="border px-4 py-2 sm:hidden text-left">{{ $empleado->domicilio }}</td>
                                        <td class="border px-4 py-2 sm:hidden text-left">{{ $empleado->cuil }}</td>
                                        <td class="border px-4 py-2 sm:hidden text-left">{{ $empleado->telefono }}</td> --}}
                                        <td class="border px-4 py-2 ">
                                            <div class="sm:flex justify-center">
                                                <div class="sm: flex justify-center">
                                                    <!-- Editar  -->
                                                    <x-editar id="{{ $empleado->id }}"></x-editar>
                                                </div>
                                                <div class="sm:flex justify-center">
                                                    <!-- Eliminar -->
                                                    <x-eliminar id="{{ $empleado->id }}"></x-eliminar>
                                                </div>
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
