<div>
    @if (session()->has('message'))
        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
            <div class="flex">
                <div>
                    <p class="text-xm bg-lightgreen">{{ session('message') }}</p>
                </div>
            </div>
        </div>
    @endif
    <section class="d-flex w-full">
        <section class="w-1/5 mt-2" style="background-color: beige;">
            <div>
                Menu de informes
            </div>
            <div class="d-flex mx-1">
                <button class="form-control col-6" data-toggle="modal" data-target="#AgregarInformes">+</button>
                <button class="form-control col-6">PDF</button>
            </div>
            <div>
                <ul>
                    @foreach ($ListadeTablas as $Tabla)
                        <li wire:click="DibujarTabla({{ $Tabla->id }})">{{ $Tabla->name }}</li>
                    @endforeach
                </ul>
            </div>
        </section>
        <section class="w-4/5 mt-2" style="background-color: lightblue;">
            <div>
                <div id="encabezado">
                    <div id="tablas">
                        <div id="DatosTablas" class="d-flex col-12 mt-2">
                            <div class="grid col-5">
                                <label>Titulo</label>
                                <input class="form-control col" type="text" wire:model="txttitulo">
                            </div>
                            <div class="grid col-3">
                                <label>Cantidad de Filas</label>
                                <input class="form-control col-12" type="text" wire:model="txtcantidadfila">
                            </div>
                            <div class="grid col-3">
                                <label>Cantidad Columnas</label>
                                <input class="form-control col-12" type="text" wire:model="txtcantidadcolumna">
                            </div>
                            <div class="grid col-1">
                                <label>Opción</label>
                                <button class="form-control col-12">+</button>
                            </div>
                        </div>
                        <hr/>
                        <div id="BotoneraTablas" class="d-flex col-12 mb-3">
                            <div class="grid col-1">
                                <label>Fila</label>
                                <input wire:model="txtfila" class="form-control col-12" type="text" value="1">
                            </div>
                            <div class="grid col-1">
                                <label>Columna</label>
                                <input wire:model="txtcolumna" class="form-control col-12" type="text" value="1">
                            </div>
                            <div class="grid col-2">
                                <label>Color Fondo</label>
                                <select wire:model="txtcolorfondo" class="form-control col-12">
                                    <option value="lightblue">Celeste</option>
                                    <option value="lightred">Rojo</option>
                                    <option value="lightgreen">Verde</option>
                                    <option value="lightblue">Azul</option>
                                    <option value="lightsalmon">Marrón</option>
                                    <option value="white">Blanco</option>
                                    <option value="black">Negro</option>
                                </select>
                            </div>
                            <div class="grid col-2">
                                <label>Alineación</label>
                                <select wire:model="txtalineacion" class="form-control col-12">
                                    <option value="center">Centro</option>
                                    <option value="left">Izquierda</option>
                                    <option value="right">Derecha</option>
                                </select>
                            </div>
                            <div class="grid col-3">
                                <label>Opción</label>
                                <input wire:click="ActualizarDato()" class="btn btn-info" type="button" value="Actualizar">
                            </div>
                        </div>
                        <div class="grid col-12 mb-3">
                            <label>Fórmula / Expresión</label>
                            <textarea wire:model="txtexpresion" cols="60" rows="3">{{ $txtexpresion }}</textarea>
                        </div>
                    </div>
                    <div id="celdas">
                        <div id="DatosCeldas">

                        </div>
                        <div id="BotoneraCeldas">

                        </div>
                    </div>
                </div>
                <div id="areatrabajo" class="m-2 p-2" style="background-color: lightslategrey; height: 100vh; border-radius: 5px;">
                    <label> Vista Previa</label>
                    <div class="p-2">
                        @if ($mostrartabla)
                            {!! $mostrartabla !!}
                        @else
                            Nada seleccionado
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </section>


    <!-- Modal Alta/Modificación Informes -->
    <!-- ================================== -->
    <div wire:ignore.self class="modal fade" id="AgregarInformes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: inherit">
                <div class="modal-header">
                    <h5 class="modal-title">Alta/Modificación Informes</h5>
                    <button wire:click="Resetear()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="px-3 py-3 d-flex flex">
                    <div class="col-10">
                        <label for="name">Nombre Informe</label>
                        <input wire:model="name" id="name" class="form-control" type="text" value="{{ old('name') }}" autocomplete="off">
                        @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-2">
                        <label for="cantidadfila">Filas</label>
                        <input wire:model="cantidadfila" id="cantidadfila" class="form-control" type="text" value="{{ old('cantidadfila') }}">
                        @error('cantidadfila') <div class="alert alert-danger">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="px-3 py-3 d-flex flex">
                    <div class="col-10">
                        <label>Encabezado</label>
                        <input wire:model="encabezadocolumna" class="form-control" type="text" value="{{ old('encabezadocolumna') }}">
                        @error('encabezadocolumna') <div class="alert alert-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-2">
                        <label>Columnas</label>
                        <input wire:model="cantidadcolumna" class="form-control" type="text" value="{{ old('cantidadcolumna') }}">
                        @error('cantidadcolumna') <div class="alert alert-danger">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="pb-3 ml-3">
                    <button wire:click="CrearEmpresa()" class="bg-green-300 hover:bg-green-400 text-white-900 font-bold py-2 px-4 rounded">
                        Crear empresa
                    </button>
                    <input wire:click="store()" type="button" value="LALALA">
                    <button wire:click="store()" type="button" class="btn btn-success">
                        <i class="fa-solid fa-pen-to-square"></i>Guardar
                    </button>
                    <button wire:click="Resetear()" type="button" class="btn btn-info" data-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-pen-to-square"></i>Cerrar
                    </button>
                </div>
                @if (session('mensaje'))
                    <div class="bg-green round-md alert alert-success">
                        {{ session('mensaje') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
