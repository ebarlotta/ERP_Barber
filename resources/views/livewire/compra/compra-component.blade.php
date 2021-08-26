<div>
    <x-titulo>Clientes</x-titulo>
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


                    <div style='border-bottom: 2px solid #eaeaea'>
                        <ul class='flex cursor-pointer'>
                            
                            <li class='py-2 px-6 bg-white rounded-t-lg'>
                                <a id="html-link1" href="#html-box" role="button" aria-pressed="true" class="active">Personal</a>
                            </li>
                            <li class='py-2 px-6 bg-white rounded-t-lg text-gray-500 bg-gray-200'>
                                <a id="html-link2" href="#html-box" role="button" aria-pressed="true" class="active">Personal</a>
                            </li>
                            <li class='py-2 px-6 bg-white rounded-t-lg text-gray-500 bg-gray-200'>
                                <a id="html-link3" href="#html-box" role="button" aria-pressed="true" class="active">Personal</a>
                            </li>
                        </ul>
                    </div>
                                        <ul class="nav nav-tabs flex flex-wrap">
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
                    </ul>
                    <div id="html-link1">esta es la prueba</div>
                    <div id="html-link2">esta es la prueba</div>
                    <div id="html-link3">esta es la prueba</div>

                    <div style="background-color: #E3F6CE" class="block">
                        <div class="flex">
                            <div class="col-xs-3 col-md-3 col-md-offset-1">
                                <input class="ButtonAceptar form-control col-md-3 btn btn-success" data-toggle="modal"
                                    data-target="#myModalAgregar" type="submit" value="Agregar">

                            </div>
                            <div class="col-xs-3 col-md-3">
                                <input class="ButtonModificar form-control col-xs-3 col-md-3 btn btn-warning"
                                    data-toggle="modal" data-target="#myModalModificar" type="submit" value="Modificar">
                            </div>
                            <div class="col-xs-3 col-md-3">
                                <input class="ButtonEliminar form-control col-xs-3 col-md-3 btn btn-danger"
                                    data-toggle="modal" data-target="#myModalEliminar" type="submit" value="Eliminar">
                                <input type="hidden" id="Borrar" name="Borrar" value="0">
                                <input type="hidden" id="Cerrar" name="Cerrar" value="0"
                                    onchange="xajax.call('CargarAreasCuentas1', {method: 'get', parameters:[cmbEmpresas.value]});">
                            </div>
                        </div>
                        <div class="flex flex-wrap">
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
                                <select class="ml-2 w-30">
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
                                <select class="ml-2 w-34">
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
                                <input class="ml-2" type="text">
                            </div>
                            <div>
                                <label for="">Iva</label><br>
                                <input class="ml-2" type="text">
                            </div>
                            <div>
                                <label for="">Exento</label><br>
                                <input class="ml-2" type="text">
                            </div>
                            <div>
                                <label for="">Imp.Interno</label><br>
                                <input class="ml-2" type="text">
                            </div>
                            <div>
                                <label for="">Ret/Perc.Iva|Ret/Perc.IB|RetGan</label><br>
                                <input class="ml-2" type="text">
                            </div>
                            <div>  
                                <label for="">Neto</label><br>
                                <input class="ml-2" type="text">
                            </div>
                            <div>
                                <label for="">Monto Pagado</label><br>
                                <input class="ml-2" type="text">
                            </div>
                            <div>
                                <label for="">Cantidad</label><br>
                                <input class="ml-2 w-24" type="text">
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

<script type="text/javascript">
    function CalcularNeto() {
        var Haber = Number(document.getElementById('Haber').value);
        var Bruto = Number(document.getElementById('Bruto').value);
        var Iva = Number(document.getElementById('Iva').value);
        var Exento = Number(document.getElementById('Exento').value);
        var ImpInterno = Number(document.getElementById('ImpInterno').value);
        var PercIva = Number(document.getElementById('PercIva').value);
        var RetIB = Number(document.getElementById('RetencionIB').value);
        var RetGan = Number(document.getElementById('RetencionGan').value);
        var Neto = Number(Bruto + (Bruto * Iva / 100) + Exento + ImpInterno + PercIva +
            RetIB + RetGan + Haber);

        document.getElementById('Neto').value = Number(Neto.toFixed(2));;
    }
