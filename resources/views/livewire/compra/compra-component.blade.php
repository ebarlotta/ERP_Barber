<div>
    <x-titulo>Comprobantes de Compras</x-titulo>
    <x-slot name="header">
        <div class="flex">
            <!-- //Comienza en submenu de encabezado -->

            <!-- Navigation Links -->
            @livewire('submenu')
        </div>

    </x-slot>

    <div class="content-center flex">
        <div class="bg-white p-2 text-center rounded-lg shadow-lg w-full">
            <div class="mx-auto sm:px-6">
                <div class="bg-white shadow-xl sm:rounded-lg px-4 py-4">
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
                    <!-- Tabs  -->

                    {{-- <ul class="nav nav-tabs flex flex-wrap">
                        <li class="nav-item"><a class="nav-link active" <a="" data-toggle="tab"
                                href="#pillGestionar">Gestionar Comprobantes</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#pills-CtasCtes">Cuentas
                                Corrientes</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#pills-Deuda">Deuda a
                                Proveedores</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#pills-Credito">Crédito de
                                Proveedores</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#pills-DeudaXArea">Deuda
                                por area/sector</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#pills-Libros">Libros de
                                Iva</a></li>
                    </ul> --}}
                    <div class="flex flex-wrap" id="tabs-id">
                        <div class="w-full">
                            <ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row">
                                <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                                    <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-white bg-pink-600" wire:click="CambiarTab(1)">
                                        <i class="fas fa-space-shuttle text-base mr-1"></i> Gestionar Comprobantes
                                    </a>
                                </li>
                                <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                                    <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-pink-600 bg-white" wire:click="CambiarTab(2)">
                                        <i class="fas fa-cog text-base mr-1"></i> Cuentas Corrientes
                                    </a>
                                </li>
                                <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                                    <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-pink-600 bg-white" wire:click="CambiarTab(3)">
                                        <i class="fas fa-cog text-base mr-1"></i> Deuda a Proveedores
                                    </a>
                                </li>
                                <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                                    <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-pink-600 bg-white" wire:click="CambiarTab(4)">
                                        <i class="fas fa-briefcase text-base mr-1"></i> Crédito de Proveedores
                                    </a>
                                </li>
                                <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                                    <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-pink-600 bg-white" wire:click="CambiarTab(5)">
                                        <i class="fas fa-briefcase text-base mr-1"></i> Libros de Iva
                                    </a>
                                </li>
                            </ul>
                            <div
                                class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                                <div class="px-4 py-5 flex-auto">
                                    <div class="tab-content tab-space">
                                        <div class="{{ $tabActivo<>1 ? 'hidden' : '' }}">
                                            <div style="background-color: #E3F6CE" class="block">
                                                <!-- Botones -->
                                                <div class="flex justify-center">
                                                    <button class="rounded-md bg-green-300 px-8 py-1 mx-2 mt-3">Agregar</button>
                                                    <button class="rounded-md bg-yellow-300 px-8 py-1 mx-2 mt-3">Modificar</button>
                                                    <button class="rounded-md bg-red-300 px-8 py-1 mx-2 mt-3">Eliminar</button>
                                                </div>
                                                <!-- Gestionar Comprobantes -->
                                                <div class="flex flex-wrap mt-3">
                                                    <div>
                                                        <label for="">Fecha</label><br>
                                                        <input class="ml-2 w-36" type="date">
                                                    </div>
                                                    <div>
                                                        <label for="">Proveedor</label><br>
                                                        <select class="ml-2 w-44">
                                                            <option value=" "> </option>
                                                            @foreach ($proveedores as $proveedor)
                                                                <option value="{{ $proveedor->id }}">
                                                                    {{ $proveedor->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label for="">Comprobante</label><br>
                                                        <input class="ml-2 w-40" type="text">
                                                    </div>
                                                    <div>
                                                        <label for="">IVA</label><br>
                                                        <select class="ml-2 w-26">
                                                            <option value=" "> </option>
                                                            @foreach ($ivas as $iva)
                                                                <option value="{{ $iva->id }}">
                                                                    {{ $iva->descripcion }}
                                                                </option>
                                                            @endforeach
                                                            <option value=" "> </option>
                                                            <option value="Si">Si</option>
                                                            <option value="No">No</option>
                                                            <option value="Ganancias">
                                                                Ganancias
                                                            </option>
                                                            <option value="IB">IB</option>
                                                            <option value="BsPersonal">
                                                                BsPersonal</option>
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label for="">Detalle</label><br>
                                                        <input type="text" class="ml-2 w-38">
                                                    </div>
                                                    <div>
                                                        <label for="">Año</label><br>
                                                        <select class="ml-2 w-24">
                                                            <option>Todos</option>
                                                            <option>2021</option>
                                                            <option>2020</option>
                                                            <option>2019</option>
                                                            <option>2018</option>
                                                            <option>2017</option>
                                                            <option>2016</option>
                                                            <option>2015</option>
                                                            <option>2014</option>
                                                            <option>2013</option>
                                                            <option>2012</option>
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label for="">Mes</label><br>
                                                        <select class="ml-2 w-30">
                                                            <option value=" "> </option>
                                                            <option value="enero">enero
                                                            </option>
                                                            <option value="febrero">febrero
                                                            </option>
                                                            <option value="marzo">marzo
                                                            </option>
                                                            <option value="abril">abril
                                                            </option>
                                                            <option value="mayo">mayo
                                                            </option>
                                                            <option value="junio">junio
                                                            </option>
                                                            <option value="julio">julio
                                                            </option>
                                                            <option value="agosto">agosto
                                                            </option>
                                                            <option value="setiembre">
                                                                setiembre
                                                            </option>
                                                            <option value="octubre">octubre
                                                            </option>
                                                            <option value="noviembre">
                                                                noviembre
                                                            </option>
                                                            <option value="diciembre">
                                                                diciembre
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label for="">Areas</label><br>
                                                        <select class="ml-2 w-28 ">
                                                            <option value=" "> </option>
                                                            @foreach ($areas as $area)
                                                                <option value="{{ $area->id }}">
                                                                    {{ $area->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label for="">Cuentas</label><br>
                                                        <select class="ml-2 w-28">
                                                            <option value=" "> </option>
                                                            @foreach ($cuentas as $cuenta)
                                                                <option value="{{ $cuenta->id }}">
                                                                    {{ $cuenta->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="flex flex-wrap">
                                                    <div>
                                                        <label for="">Bruto</label><br>
                                                        <input class="ml-2 w-40" type="text">
                                                    </div>
                                                    <div>
                                                        <label for="">Iva</label><br>
                                                        <input class="ml-2 w-40" type="text">
                                                    </div>
                                                    <div>
                                                        <label for="">Exento</label><br>
                                                        <input class="ml-2 w-40" type="text">
                                                    </div>
                                                    <div>
                                                        <label for="">Imp.Interno</label><br>
                                                        <input class="ml-2 w-40" type="text">
                                                    </div>
                                                    <div>
                                                        <label for="">Ret/Perc.Iva|Ret/Perc.IB|RetGan</label><br>
                                                        <input class="ml-2 w-40" type="text">
                                                    </div>
                                                    <div>
                                                        <label for="">Neto</label><br>
                                                        <input class="ml-2 w-40" type="text">
                                                    </div>
                                                    <div>
                                                        <label for="">Monto Pagado</label><br>
                                                        <input class="ml-2 w-40" type="text">
                                                    </div>
                                                    <div>
                                                        <label for="">Cantidad</label><br>
                                                        <input class="ml-2 w-40" type="text">
                                                    </div>
                                                </div>
                                            </div>


                                            
                                        </div>
                                        <div class="{{ $tabActivo<>2 ? 'hidden' : '' }}">
                                            <p>
                                                Completely synergize resource taxing relationships via
                                                premier niche markets. Professionallaaaaaaay cultivate one-to-one
                                                customer service with robust ideas.
                                                <br />
                                                <br />
                                                Dynamically innovate resource-leveling customer service for
                                                state of the art customer service.
                                            </p>
                                        </div>
                                        <div class="{{ $tabActivo<>3 ? 'hidden' : '' }}">
                                            <p>
                                                Completely synergize resource taxing relationships via
                                                premier nichdsadsade markets. Professionally cultivate one-to-one
                                                customer service with robust ideas.
                                                <br />
                                                <br />
                                                Dynamically innovate resource-leveling dsacustomer service for
                                                state of the art customer service.
                                            </p>
                                        </div>
                                        <div class="{{ $tabActivo<>4 ? 'hidden' : '' }}">
                                            <p>
                                                Efficiently unleash cross-media information without
                                                cross-media value. dsadsadsaQuickly maximize timely deliverables for
                                                real-time schemas.
                                                <br />
                                                <br />
                                                Dramatically maintain clicks-and-mortar solutions
                                                without functional solutions.
                                            </p>
                                        </div>
                                        <div class="{{ $tabActivo<>5 ? 'hidden' : '' }}">
                                            <p>
                                                Efficiently unleash cross-media information without
                                                cross-me. dsadsadsaQuickly maximize timely deliverables for
                                                real-time schemas.
                                                <br />
                                                <br />
                                                Dramatically maintain clicks-and-mortar solutions
                                                without functional solutions.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    


                </div>
            </div>
        </div>
    </div>
</div>
</div>





<div class="BotonVolver2 form-group col-md-2">
</div>
<footer
    style="text-align: center; font-size: 10; background-color: #999; margin-top: 0;margin-bottom: 0; padding-top: 0; padding-bottom: 0; margin-top: 3px; padding-bottom: 10px;">
    Desarrollado por: Ing. Enzo Gabriel Barlotta - Información de Contacto<a href="mailto:ebarlotta@yahoo.com.ar">
        ebarlotta@yahoo.com.ar</a>
    &nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-info"
        onclick="javascript: window.location.href='../../sistema/menu.php';">&nbsp;&nbsp;&nbsp;Volver&nbsp;&nbsp;&nbsp;</button>
</footer>
</div>