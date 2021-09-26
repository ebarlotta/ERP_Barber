<div>
    <x-titulo>Relacionar Usuarios a Empresas</x-titulo>
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
                    @if ($seleccionado)
                    <div class="text-left">
                        <button wire:click="mostrarmodal()"
                            class="bg-green-300 hover:bg-green-400 text-white-900 font-bold py-2 px-4 rounded">
                            Relacionar nuevo Usuario
                        </button>
                    </div>
                    @endif
                </div>

                @if ($isModalOpen)
                    @include('livewire.empresa-usuarios.createempresausuarios')
                @endif
                @if ($empresas)
                    <table>
                        <tr>
                            <td class="align-baseline">
                                <table>
                                    <tr>
                                        <td class="table-cell">Empresas</td>
                                        <td class="table-cell">Usuarios</td>
                                    </tr>
                                    @foreach ($empresas as $empresa)
                                        <tr>
                                            <td class="align-bottom border px-4 py-2 text-left @if ($seleccionado==$empresa->id) bg-red-300 @endif" wire:click="CargarUsuarios({{ $empresa->id }})">
                                                <div class="w-full p-3">
                                                    <div class="flex rounded overflow-hidden border">
                                                        <img class="block  flex-none bg-cover"
                                                            src="https://picsum.photos/seed/picsum/100/100" style="width: 100px; height: 100px;">
                                                        <div
                                                            class="bg-white rounded-b pl-4 flex flex-col justify-between leading-normal">
                                                            <div
                                                                class="text-black  pt-4 font-bold text-lg mb-2 leading-tight">
                                                                {{ $empresa->name }}</div>
                                                            <p class="text-grey-darker text-base">Read more
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </td>
                            <td class="align-baseline">
                                <div class="overflow-y-auto h-1/2">
                                    <table>
                                        @if ($usuariosdelaempresa)
                                            @foreach ($usuariosdelaempresa as $usuario)
                                                <tr>
                                                    <td class="border px-4 py-2 text-left bg-red-300">
                                                        <div class="w-full p-3">
                                                            <div class="flex rounded overflow-hidden border">
                                                                <img class="block flex-none bg-cover"
                                                                    src="https://picsum.photos/seed/picsum/80/80" style="width: 100px; height: 100px;">
                                                                <div
                                                                    class="bg-white rounded-b pl-4 pt-4 flex flex-col justify-between leading-normal">
                                                                    <div
                                                                        class="text-black font-bold text-lg mb-2 leading-tight">
                                                                        {{ $usuario['name'] }}</div>
                                                                    <p class="text-grey-darker text-base">Read more and
                                                                        more</p>
                                                                </div>
                                                                {{-- @if ($usuario->activo) --}}
                                                                <div
                                                                    class="bg-white rounded-b p-4 flex flex-col justify-between leading-normal">
                                                                    <div
                                                                        class="text-black font-bold text-xl mb-2 leading-tight">
                                                                        <img class="block w-15 h-15 flex-none bg-cover"
                                                                            src="{{  asset('images/activo.jpg') }}" width="40" height="40">
                                                                    </div>
                                                                </div>
                                                                {{-- @endif --}}
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </table>
                                </div>
                            </td>
                        </tr>
                    </table>
                @else
                    <h1>No hay datos</h1>
                @endif
            </div>
        </div>
    </div>
</div>
</div>
