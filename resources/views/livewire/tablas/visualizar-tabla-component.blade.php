<div>
    <x-titulo>Informes</x-titulo>
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
    <div class="flex justify-around">
        @if ($isModalOpen)
            @include('livewire.tablas.createtablas')
        @endif
        @if (session('AsignacionOk')) 
            <div class="alert alert-success">{{ session('AsignacionOk') }}
        @endif
    </div>
    <div style="display: block">

        <div class="flex h-full">

            <div class="block w-1/4">
                <h3>Informes Habilitados</h3>
                @if(count($ListadeTablas)>=1)
                    @foreach ($ListadeTablas as $tabla)
                        @if($tabla->relac_id)
                            <div class="p-2 shadow-lg" style="background:linear-gradient(90deg, lightblue 20%, white 50%); width:93%; height:100px; display: flex; margin: 1.25rem; border-radius: 10px;" wire:click="Visualizar('{{ $tabla['name'] }}')">
                                <div >
                                    <div style="width:100%; display: flex">
                                        <p class="shadow-md m-1 w-full" style="font-size: 18px; background-color: rgb(226, 230, 230); border-radius: 10px; padding: 3px;">{{ $tabla['name'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    @if($tablas==[])
                        Seleccione un usuario            
                    @else
                        Ningún informe habilitado
                    @endif
                @endif
            </div>
            <div class="block w-3/4">
                <h3>Vista Previa</h3>
                <div class="p-2 shadow-lg" style="background:linear-gradient(90deg, lightblue 20%, white 50%); width:93%; height:100%; display: flex; margin: 1.25rem; border-radius: 10px;">
                    {!! $visualizar !!} 
                </div>
            </div>
        </div>
    </div>
</div>
