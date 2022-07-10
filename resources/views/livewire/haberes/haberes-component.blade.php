<div>
    <x-titulo>Liquidaciones de Haberes</x-titulo>
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
                    @if (session()->has('messageOk'))
                        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                            role="alert">
                            <div class="flex">
                                <div>
                                    <p class="text-xm bg-lightgreen">{{ session('messageOk') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (session()->has('messageError'))
                        <div class="bg-warning border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                            role="alert">
                            <div class="flex">
                                <div>
                                    <p class="text-xm bg-lightgreen">{{ session('messageError') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <font size="1" face="Verdana">
                        <table class="table table-responsive table-hover" border="1">
                            <tbody bordercolor="#FFFFFF"
                                style="font-family : Verdana; font-size : 12px; font-weight : 300;" bgcolor="#AFF3F7">
                                <tr align="center">
                                    <td valign="top">
                                        <input id="IdProyecto" name="IdProyecto" type="hidden" size="10">
                                        <table style="font-size:8px;" class="table table-responsive table-hover"
                                            border="1">
                                            <tbody bordercolor="#FFFFFF"
                                                style="font-family : Verdana; font-size : 12px; font-weight : 300;"
                                                bgcolor="#EFF3F7">
                                                <tr style="vertical-align: middle;">
                                                    <td align="center">Año</td>
                                                    <td align="center">Mes de Liquidación</td>
                                                    <td align="center">Empleados</td>
                                                </tr>
                                                <tr style="vertical-align: middle;">
                                                    <td style="vertical-align: top;">
                                                        <select class="form-control" wire:model="anio" >
                                                            {{-- wire:change="CargarEmpleadosActivosEnEsePeriodo();" --}}
                                                            <option value="2022">2022</option>
                                                            <option value="2021">2021</option>
                                                            <option value="2020">2020</option>
                                                            <option value="2019">2019</option>
                                                            <option value="2018">2018</option>
                                                            <option value="2017">2017</option>
                                                            <option value="2016">2016</option>
                                                            <option value="2015">2015</option>
                                                            <option value="2014">2014</option>
                                                            <option value="2013">2013</option>
                                                            <option value="2012">2012</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select class="form-control" wire:model="mes" wire:click="CargarEmpleadosActivosEnEsePeriodo();">
                                                            <option value="00">-</option>
                                                            <option value="01">enero</option>
                                                            <option value="02">febrero</option>
                                                            <option value="03">marzo</option>
                                                            <option value="04">abril</option>
                                                            <option value="05">mayo</option>
                                                            <option value="06">junio</option>
                                                            <option value="07">julio</option>
                                                            <option value="08">agosto</option>
                                                            <option value="09">setiembre</option>
                                                            <option value="10">octubre</option>
                                                            <option value="11">noviembre</option>
                                                            <option value="12">diciembre</option>
                                                            <option value="13">1erSAC</option>
                                                            <option value="14">2doSAC</option>
                                                            <option value="15">Vacaciones</option>
                                                        </select> 
                                                        {{-- <label for="FI">Fecha de Pago</label>
                                                        <input type="date" id="FI" name="FI"><br> --}}
                                                    </td>
                                                    <td style="vertical-align: top;">
                                                        {{-- {{$EmpleadosActivos}} --}}

                                                        @if($EmpleadosActivos)
                                                        <select class="form-control">
                                                            <option value="00" selected>-</option>
                                                            @foreach ($EmpleadosActivos as $empleado)
                                                                    {{-- <option value="{{ !empty($empleado->id) ? $empleado->id:$empleado['id'] }}"> --}}
                                                                        {{-- {{ !empty($empleado->name) ? $empleado->name.'*' : $empleado['name'] }} --}}
                                                                    {{-- </option> --}}
                                                                    <option value="{{ $empleado['id'] }}" wire:click="cargaIdEmpleado({{ $empleado['id']}});">{{ $empleado['name'] }}</option>
                                                                    {{-- <option value="{{ $empleado['id'] }}">
                                                                        {{ $empleado['name'] }}
                                                                    </option> --}}
                                                            @endforeach
                                                        </select>
                                                        @endif

                                                        {{-- <table>
                                                            @if($EmpleadosActivos)
                                                                @foreach ($EmpleadosActivos as $empleado)
                                                                    <tr>
                                                                        <td wire:click="cargaIdEmpleado({{$empleado['id']}});"> {{ $empleado['name']}}</td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </table> --}}
                                                    </td>
                                                    {{-- <td>
                                                        <input type="button" value="Buscar" wire:click="CargarEmpleadosActivosEnEsePeriodo();">
                                                    </td> --}}
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div id="DivRecibo">
                                            <div class="bg-success">
                                                Mes {{$mes}} <br>
                                                Año  {{$anio}}
                                                Empleado seleccionado: {{$empleadoseleccionado}}
                                                {{ session('message') }}
                                                {{-- {{$EmpleadosActivos}}<br>
                                                {{ $empleadoseleccionado}}<br> --}}
                                                @if($IdRecibo)
                                                <table class="table table-responsive table-hover" style="font-size:9px;" border="1">
                                                    <tbody>
                                                      <tr>
                                                        <td colspan="2"><b>{{ $NombreEmpresa}}</b></td>
                                                        <td colspan="4" align="right">Dirección: {{$DireccionEmpresa}}</td>
                                                      </tr>
                                                      <tr>
                                                        <td colspan="2" align="center"><strong>CUIT DE LA EMPRESA</strong></td>
                                                        <td colspan="2" align="center">{{ $Cuit}}</td>
                                                        <td align="center">{{ $CCT }} </td>
                                                        <td align="center"><b>LEGAJO Nº {{ $Legajo }}</b></td>
                                                      </tr>
                                                      <tr bgcolor="lightGray">
                                                        <td colspan="2" align="center"><strong>APELLIDO Y NOMBRES</strong></td>
                                                        <td colspan="2" align="center"><strong>CUIL DEL EMPLEADO</strong></td>
                                                        <td align="center"><strong>SECCION</strong></td>
                                                        <td align="center"><strong>FECHA INGRESO/ANT</strong></td>
                                                      </tr>
                                                      <tr>
                                                        <td colspan="2" align="center">{{ $NombreEmpleado}}</td>
                                                        <td colspan="2" align="center">{{ $Cuil }}</td>
                                                        <td align="center">{{ $Seccion }}</td>
                                                        <td align="center">{{ substr($FechaIngreso,0,10) }} - 7a9m</td>
                                                      </tr>
                                                      <tr bgcolor="lightGray">
                                                        <td colspan="2" align="center"><strong>CATEGORIA</strong></td>
                                                        <td colspan="2" style="font-size : 9px;" align="center"><strong>CALIFICACION<br> PROFESIONAL</strong></td>
                                                        <td align="center"><strong>PERIODO DE<br> PAGO</strong></td>
                                                        <td align="center"><strong>REMUNERACION<br> ASIGNADA</strong></td>
                                                      </tr>
                                                      <tr>
                                                        <td colspan="2" align="center">{{ $NombreCategoria }}</td>
                                                        <td colspan="2" align="center">{{ $NombreSubCategoria }}</td>
                                                        <td align="center"><strong>{{ $PerPago }}</strong></td>
                                                        <td align="center">$ {{ $TotHaberes }}</td>
                                                      </tr>
                                                      <tr bgcolor="lightGray">
                                                        <td style="font-size : 9px;" align="center"><strong>COD.</strong></td>
                                                        <td style="font-size : 9px;" align="center"><strong>DESCRIPCION<br> DE CONCEPTOS</strong></td>
                                                        <td style="font-size : 10px;" align="center"><strong>UNIDADES</strong></td>
                                                        <td style="font-size : 9px;" align="center"><strong>RENUMERACIONES<br> SUJETAS A <br>RETENCIONES</strong></td>
                                                        <td style="font-size : 9px;" align="center"><strong>REMUNERACIONES<br> EXENTAS</strong></td>
                                                        <td style="font-size : 10px;" align="center"><strong>DESCUENTOS</strong></td>
                                                      </tr><tr onclick="var a=233; b=25; var  xxx='../Empleados/ModificarDetalle.php?Detalle=Jornadas Trabajadas Enf&amp;IdConcepto=233&amp;Cantidad=25&amp;Recibo=2531'; window.open(xxx,'nuevaVentana','width=500, height=200'); "><td align="center">004</td><td>Jornadas Trabajadas Enf</td><td align="center">25,00</td><td align="right">66.295,99</td><td align="right">0,00</td><td align="right">0,00</td></tr><tr onclick="var a=34; b=2; var  xxx='../Empleados/ModificarDetalle.php?Detalle=Antiguedad Salud&amp;IdConcepto=34&amp;Cantidad=2&amp;Recibo=2531'; window.open(xxx,'nuevaVentana','width=500, height=200'); "><td align="center">020</td><td>Antiguedad Salud</td><td align="center">2,00</td><td align="right">9.281,44</td><td align="right">0,00</td><td align="right">0,00</td></tr><tr onclick="var a=241; b=1; var  xxx='../Empleados/ModificarDetalle.php?Detalle=JubilaciÃ³n&amp;IdConcepto=241&amp;Cantidad=1&amp;Recibo=2531'; window.open(xxx,'nuevaVentana','width=500, height=200'); "><td align="center">401</td><td>Jubilación</td><td align="center">1,00</td><td align="right">0,00</td><td align="right">0,00</td><td align="right">8.313,52</td></tr><tr onclick="var a=191; b=1; var  xxx='../Empleados/ModificarDetalle.php?Detalle=Ley 19.032&amp;IdConcepto=191&amp;Cantidad=1&amp;Recibo=2531'; window.open(xxx,'nuevaVentana','width=500, height=200'); "><td align="center">401</td><td>Ley 19.032</td><td align="center">1,00</td><td align="right">0,00</td><td align="right">0,00</td><td align="right">2.267,32</td></tr><tr onclick="var a=243; b=1; var  xxx='../Empleados/ModificarDetalle.php?Detalle=Obra Social OSPSA&amp;IdConcepto=243&amp;Cantidad=1&amp;Recibo=2531'; window.open(xxx,'nuevaVentana','width=500, height=200'); "><td align="center">404</td><td>Obra Social OSPSA</td><td align="center">1,00</td><td align="right">0,00</td><td align="right">0,00</td><td align="right">2.267,32</td></tr><tr onclick="var a=400; b=755.77; var  xxx='../Empleados/ModificarDetalle.php?Detalle=ATSA&amp;IdConcepto=400&amp;Cantidad=755.77&amp;Recibo=2531'; window.open(xxx,'nuevaVentana','width=500, height=200'); "><td align="center">437</td><td>ATSA</td><td align="center">755,77</td><td align="right">0,00</td><td align="right">0,00</td><td align="right">755,77</td></tr><tr onclick="var  xxx='../Empleados/ModificarDetalle.php?Detalle=0&amp;IdConcepto=0&amp;Cantidad=0&amp;Recibo=0'; window.open(xxx,'nuevaVentana','width=300, height=400'); "><td>-</td><td>-</td><td align="center">-</td><td align="right">-</td><td align="right">-</td><td align="right">-</td></tr><tr>
                                                        <td align="center"><strong></strong></td>
                                                        <td align="center"><strong></strong></td>
                                                        <td align="center"><strong></strong></td>
                                                        <td align="center"><strong>75.577,43</strong></td>
                                                        <td align="center"><strong>0,00</strong></td>
                                                        <td align="center"><strong>13.603,93</strong></td>
                                                      </tr>
                                                      <tr>
                                                        <td colspan="2" align="center"></td>
                                                        <td align="center"></td>
                                                        <td colspan="2" align="center"><strong>NETO A COBRAR</strong></td>
                                                        <td bgcolor="lightGray" align="right"><strong>61.973,50</strong></td>
                                                      </tr>
                                                       <tr>
                                                        <td colspan="6" style="font-size : 10px;" bgcolor="lightGray"><strong>Son pesos: SESENTA Y UN MIL NOVECIENTOS SETENTA Y TRES PESOS CON 50/100 CENTAVOS</strong></td>
                                                      </tr>
                                                      <tr style="font-size : 9px;">
                                                          <td colspan="2"><strong>LUGAR</strong></td><td colspan="2" align="center">SAN MARTIN</td>
                                                  <td rowspan="6" colspan="2">Recibí el importe de esta liquidación de pago de mi <br>remuneración correspondiente al período indicado y<br> duplicado de la misma conforme a la ley vigente.<br><br><br><br><br><br>
                                                          <center><strong>FIRMA EMPLEADO/R</strong></center>
                                                        </td>
                                                      </tr><tr style="font-size : 9px;">
                                                          <td colspan="2"><strong>FECHA DE LIQUIDACIÓN</strong></td><td colspan="2" align="center">01-02-2022</td>
                                                      </tr>
                                                      <tr style="font-size : 9px;">
                                                        <td colspan="2"><strong>ART 12 LEY 17250</strong></td>
                                                        <td colspan="2"></td>
                                                      </tr>
                                                      <tr style="font-size : 9px;">
                                                        <td colspan="2"><strong>ULTIMA LIQUIDACIÓN</strong></td>
                                                        <td colspan="2" align="center">202112</td>
                                                      </tr>
                                                      <tr style="font-size : 9px;">
                                                        <td colspan="2"><strong>BANCO</strong></td>
                                                        <td colspan="2" align="center">{{ $Banco }} </td>
                                                      </tr>
                                                      <tr>
                                                        <td style="font-size : 9px;" colspan="2"><strong>FECHA DEPOSITO</strong></td>
                                                        <td style="font-size : 9px;" colspan="2" align="center">2022-01-06</td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                @endif
                                                </div>
                                        </div>
                                    </td>
                                    <td>
                                        <table style="font-size:8px;" class="table table-responsive table-hover"
                                            border="0">
                                            <caption>Referencias</caption>
                                            <tbody>
                                                <tr>
                                                    <td style="border-width: 0.5px;border: solid; border-color: #585858;"
                                                        bgcolor="#EFFBEF">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                    <td>Sin Editar</td>
                                                </tr>
                                                <tr>
                                                    <td style="border-width: 0.5px;border: solid; border-color: #585858;"
                                                        bgcolor="#F7F8E0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                    <td>Editado</td>
                                                </tr>
                                                <tr>
                                                    <td style="border-width: 0.5px;border: solid; border-color: #585858;"
                                                        bgcolor="#E0F2F7">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                    <td>Impreso</td>
                                                </tr>
                                                <tr>
                                                    <td style="border-width: 0.5px;border: solid; border-color: #585858;"
                                                        bgcolor="#F8E0E6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                    <td>Cerrado</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- //Boton Alta Recibo  -->
                                        <div class="General">
                                            <div>
                                                <button class="rounded-md bg-green-300 px-6 mx-2 py-1 mt-3"
                                                    style="box-shadow: 2px 2px 5px #999;"
                                                    title="Genera un nuevo recibo de sueldo para el mes seleccionado"
                                                    wire:click="AltaRecibo({{ $anio }},'{{ $mes }}')">Alta
                                                    Recibo</button>
                                            </div>
                                            <div>
                                                <button class="rounded-md bg-green-300 px-6 mx-2 py-1 mt-3"
                                                    style="box-shadow: 2px 2px 5px #999;"
                                                    title="Genera un nuevo recibo del primer Aguinaldo">1erSAC</button>
                                                <button class="rounded-md bg-green-300 px-6 mx-2 py-1 mt-3"
                                                    style="box-shadow: 2px 2px 5px #999;"
                                                    title="Genera un nuevo recibo del segundo Aguinaldo">2doSAC</button>
                                            </div>
                                            <div>
                                                <button class="rounded-md bg-green-300 px-6 mx-2 py-1 mt-3"
                                                    style="box-shadow: 2px 2px 5px #999;"
                                                    title="Genera un nuevo conjunto de recibos de sueldo para el mes seleccionado">Alta
                                                    Grupal</button>
                                            </div>
                                            <div>
                                                <button class="rounded-md bg-green-300 px-6 mx-2 py-1 mt-3"
                                                    style="box-shadow: 2px 2px 5px #999;"
                                                    title="Agrega un nuevo concepto al recibo">Administrar
                                                    Conceptos</button>
                                            </div>
                                            <div>
                                                <button class="rounded-md bg-green-300 px-6 mx-2 py-1 mt-3"
                                                    style="box-shadow: 2px 2px 5px #999;"
                                                    title="Genera una vista previa del recibo">Graficar</button>
                                            </div>
                                            <div>
                                                <button class="rounded-md bg-green-300 px-6 mx-2 py-1 mt-3"
                                                    style="box-shadow: 2px 2px 5px #999;"
                                                    title="Genera un archivo PDF del recibo">Imprimir PDF</button>
                                            </div>
                                            <div>
                                                <button class="rounded-md bg-green-300 px-6 mx-2 py-1 mt-3"
                                                    style="box-shadow: 2px 2px 5px #999;"
                                                    title="Cambia la escala salarial con la que se liquida el recibo">Modificar
                                                    Escala</button>
                                            </div>
                                            <div>
                                                <button class="rounded-md bg-green-300 px-6 mx-2 py-1 mt-3"
                                                    style="box-shadow: 2px 2px 5px #999;"
                                                    title="Elimina el recibo seleccionado">Eliminar Recibo</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </font>
                </div>
            </div>
        </div>
    </div>
</div>
