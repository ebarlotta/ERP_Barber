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
                    <form id="testForm3" onsubmit="return false">

                        <ul class="nav nav-tabs style=" padding-top:5px;""="">
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
                        <div class="tab-content">
                            <div id="pillGestionar" style="background-color: #E3F6CE" class="tab-pane fade in active">
                                <font style="margin:0; padding:0;" size="1" face="Verdana">
                                    <!-- <p style="background: #e14642;"> -->
                                    <table style="font-size : 1px; margin-bottom: 0px;"
                                        class="table table-responsive table-hover" border="1">
                                        <tbody bordercolor="#FFFFFF"
                                            style="font-family : Verdana; font-size : 12px; font-weight : 300;"
                                            bgcolor="#EFF3F7">
                                            <tr>
                                                <td>
                                                    <div id="Empresas">
                                                        <div class="col-md-12 col-xs-12" style="align-content: center;">
                                                            <div class="col-xs-3 col-md-3 col-md-offset-1">
                                                                <!--  <input class="ButtonAceptar form-control col-md-3 btn btn-success" type="submit" value="Agregar" onClick="xajax.call('AgregarComprobante', {method: 'get', parameters:[Anio.value,PasadoEnMes.value,ParticIva.value,Areas.value,Cuentas.value,Iva.value,cmbProveedores.value,Comprobante.value,Fecha.value,Detalle.value,Bruto.value,Exento.value,ImpInterno.value,PercIva.value,RetencionIB.value,RetencionGan.value,Neto.value,MontoPagado.value,CantLitros.value]});  xajax.call('LlamarFiltro', {method: 'get', parameters:[FProveedores.value,FMes.value,FParticipaIva.value,FAreas.value,FCuentas.value,FAnio.value,FDetalle2.value,FOrden.checked,FConSaldo.checked,Pagina.value,FIva.value]}); "> -->
                                                                <input
                                                                    class="ButtonAceptar form-control col-md-3 btn btn-success"
                                                                    data-toggle="modal" data-target="#myModalAgregar"
                                                                    type="submit" value="Agregar">

                                                            </div>
                                                            <div class="col-xs-3 col-md-3">
                                                                <!-- <input class="ButtonModificar form-control col-xs-3 col-md-3 btn btn-warning" type="submit" value="Modificar" onClick="xajax.call('ModificarComprobante', {method: 'get', parameters:[Anio.value,PasadoEnMes.value,ParticIva.value,Areas.value,Cuentas.value,Iva.value,cmbProveedores.value,Comprobante.value,Fecha.value,Detalle.value,Bruto.value,Exento.value,ImpInterno.value,PercIva.value,RetencionIB.value,RetencionGan.value,Neto.value,MontoPagado.value,CantLitros.value,IdComp.value]});  xajax.call('LlamarFiltro', {method: 'get', parameters:[FProveedores.value,FMes.value,FParticipaIva.value,FAreas.value,FCuentas.value,FAnio.value,FDetalle2.value,FOrden.checked,FConSaldo.checked,Pagina.value,FIva.value]}); "> -->
                                                                <input
                                                                    class="ButtonModificar form-control col-xs-3 col-md-3 btn btn-warning"
                                                                    data-toggle="modal" data-target="#myModalModificar"
                                                                    type="submit" value="Modificar">
                                                            </div>
                                                            <div class="col-xs-3 col-md-3">
                                                                <input type="hidden" id="VartxtFecha"
                                                                    name="VartxtFecha">
                                                                <input type="hidden" id="VarComprobante"
                                                                    name="VarComprobante">
                                                                <input type="hidden" id="VartxtCuitProveedores"
                                                                    name="VartxtCuitProveedores">

                                                                <!-- <input class="ButtonEliminar form-control col-xs-3 col-md-3 btn btn-danger" type="submit" value="Eliminar" onClick="Preguntar(); ElimBorrar=document.getElementById('Borrar').value; ElimIdComp=document.getElementById('IdComp').value; xajax.call('EliminarComprobante', {method: 'get', parameters:[ElimIdComp,ElimBorrar]});  xajax.call('LlamarFiltro', {method: 'get', parameters:[FProveedores.value,FMes.value,FParticipaIva.value,FAreas.value,FCuentas.value,FAnio.value,FDetalle2.value,FOrden.checked,FConSaldo.checked,Pagina.value,FIva.value]}); "> -->
                                                                <input
                                                                    class="ButtonEliminar form-control col-xs-3 col-md-3 btn btn-danger"
                                                                    data-toggle="modal" data-target="#myModalEliminar"
                                                                    type="submit" value="Eliminar">
                                                                <input type="hidden" id="Borrar" name="Borrar"
                                                                    value="0">
                                                                <input type="hidden" id="Cerrar" name="Cerrar" value="0"
                                                                    onchange="xajax.call('CargarAreasCuentas1', {method: 'get', parameters:[cmbEmpresas.value]});">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- <div class="content-responsive" style="none repeat scroll 0 0; overflow:auto;color:#ffffff;height:70%;padding:4px;"> -->
                                                    <!--  <table border="1" class="table table-responsive table-hover"> -->
                                                    <table class="table table-responsive table-hover" border="1">
                                                        <tbody bordercolor="#FFFFFF"
                                                            style="font-family : Verdana; font-size : 12px; font-weight : 300;"
                                                            bgcolor="#EFF3F7">
                                                            <tr align="center">
                                                                <td align="center"><b>Fecha</b></td>
                                                                <td align="center"><b>Proveedor</b></td>
                                                                <td align="center"><b>Cuit</b></td>
                                                                <td align="center"><b>Comprobante</b></td>
                                                                <td align="center"><b>Detalle</b></td>
                                                                <td align="center"><b>Año</b></td>
                                                                <!-- <td align="center"><b>Haber</b></td> -->
                                                                <td align="center"><b>PasadoEnMes</b></td>
                                                                <td align="center"><b>Area</b></td>
                                                                <td align="center"><b>Cuenta</b></td>
                                                            </tr>
                                                            <tr>

                                                                <input id="IdComp" name="IdComp" type="hidden"
                                                                    size="10">
                                                                <td>
                                                                    <input id="Fecha" name="Fecha" type="date">
                                                                    <!-- <input id="Fecha" name="txtFecha" type="text" size="8" >
           <a href="javascript:NewCal('Fecha','YYYYMMDD')">
            <img src="calendario/cal.gif" width="16" height="16" border="0" alt="Ingrese fecha">
           </a> -->
                                                                </td>
                                                                <td>
                                                                    <div id="Proveedores"><select id="cmbProveedores"
                                                                            name="cmbProveedores"
                                                                            onchange="xajax.call('CargarCuitProveerdor', {method: 'get', parameters:[cmbProveedores.value]});"
                                                                            style="max-width : 150px;">
                                                                            <option value=" "> </option>
                                                                            <option value="ABERTURAS ACONCAGUA">
                                                                                ABERTURAS ACONCAGUA</option>
                                                                            
                                                    </select></div>
                                            </td>
                                            <td>
                                                <select id="FParticipaIva2" 0="" name="FParticipaIva2"
                                                    onclick="
      xajax.call('LlamarFiltro2', {method: 'get', parameters:[FProveedores2.value,FMes2.value,FParticipaIva2.value,FAreas2.value,FCuentas2.value,F2Anio.value,FFDesde.value,FFHasta.value,F2Orden.checked,FDetalleSCBancarias.value]});"
                                                    onchange="
      xajax.call('LlamarFiltro2', {method: 'get', parameters:[FProveedores.value,FMes.value,FParticipaIva.value,FAreas.value,FCuentas.value,FAnio.value,FDetalle2.value,F2Orden.checked,FDetalleSCBancarias.value]});"
                                                    style="max-width : 30px;">
                                                    <option value=" "> </option>
                                                    <option value="Si">Si</option>
                                                    <option value="No">No</option>
                                                    <option value="Ganancias">Ganancias</option>
                                                    <option value="IB">IB</option>
                                                    <option value="BsPersonal">BsPersonal</option>
                                                </select>
                                            </td>
                                            <td>
                                                <div id="DetalleCB"><select id="FDetalleSCBancarias" 0=""
                                                        name="FDetalleSCBancarias"
                                                        onclick="
      xajax.call('LlamarFiltro2', {method: 'get', parameters:[FProveedores2.value,FMes2.value,FParticipaIva2.value,FAreas2.value,FCuentas2.value,F2Anio.value,FFDesde.value,FFHasta.value,F2Orden.checked,FDetalleSCBancarias.value]});"
                                                        onchange="
      xajax.call('LlamarFiltro2', {method: 'get', parameters:[FProveedores.value,FMes.value,FParticipaIva.value,FAreas.value,FCuentas.value,FAnio.value,FDetalle2.value,F2Orden.checked,FDetalleSCBancarias.value]});"
                                                        style="max-width : 100px;">
                                                        <option value=" "> </option>
                                                        
                                                    </select></div>
                                            </td>
                                            <td>
                                                <div id="DivFAreas2"><select id="FAreas2" name="FAreas2"
                                                        style="max-width:100px;"
                                                        onchange="xajax.call('MostrarEspera', {method: 'get',parameters:[]}); onChange="
                                                        xajax.call('llamarfiltro2',="" {method:="" 'get'
                                                        ,parameters:[fproveedores2.value,fmes2.value,fparticipaiva2.value,fareas2.value,fcuentas2.value,f2anio.value,ffdesde.value,ffhasta.value]});";="" "=""><option value=" "> </option><option value="
                                                        --- No Asignado ---">--- No Asignado ---</option>
                                                        <option value="Bodega">Bodega</option>
                                                        <option value="Chapanay">Chapanay</option>
                                                        <option value="Ducatto">Ducatto</option>
                                                        <option value="Elida">Elida</option>
                                                        <option value="Empaque">Empaque</option>
                                                        <option value="Enzo">Enzo</option>
                                                        <option value="Escritorio">Escritorio</option>
                                                        <option value="Fincas">Fincas</option>
                                                        <option value="Hostal">Hostal</option>
                                                        <option value="Lili">Lili</option>
                                                        <option value="Mantenimientos">Mantenimientos</option>
                                                        <option value="Miguez">Miguez</option>
                                                        <option value="Montecaseros">Montecaseros</option>
                                                        <option value="Otra">Otra</option>
                                                        <option value="Ruta50">Ruta50</option>
                                                        <option value="Sergio">Sergio</option>
                                                        <option value="Sociedad">Sociedad</option>
                                                        <option value="Vicente">Vicente</option>
                                                    </select></div>
                                            </td>
                                            <td>
                                                <div id="DivFCuentas2"><select id="FCuentas2" name="FCuentas2"
                                                        style="max-width:100px;"
                                                        onchange="xajax.call('MostrarEspera', {method: 'get',parameters:[]}); onChange="
                                                        xajax.call('llamarfiltro2',="" {method:="" 'get'
                                                        ,parameters:[fproveedores2.value,fmes2.value,fparticipaiva2.value,fareas2.value,fcuentas2.value,f2anio.value,ffdesde.value,ffhasta.value]});";="" "=""><option value=" "> </option><option value="
                                                        --- No Asignado ---">--- No Asignado ---</option>
                                                        <option value="Agroquimicos">Agroquimicos</option>
                                                        <option value="Alquiler">Alquiler</option>
                                                        <option value="Ap_y_Cont">Ap_y_Cont</option>
                                                        <option value="Cheques">Cheques</option>
                                                        <option value="Combustibles">Combustibles</option>
                                                        <option value="Comisiones">Comisiones</option>
                                                        <option value="ComisionesCred">ComisionesCred</option>
                                                        <option value="ComisionesDeb">ComisionesDeb</option>
                                                        <option value="Compra de uvas">Compra de uvas</option>
                                                        <option value="Compra de vinos">Compra de vinos</option>
                                                        <option value="Comunicaciones">Comunicaciones</option>
                                                        <option value="Cosecha">Cosecha</option>
                                                        <option value="CtaCte">CtaCte</option>
                                                        <option value="Ecogas">Ecogas</option>
                                                        <option value="Efectivo">Efectivo</option>
                                                        <option value="Electricidad">Electricidad</option>
                                                        <option value="Empaque">Empaque</option>
                                                        <option value="Fertilizantes">Fertilizantes</option>
                                                        <option value="Financieros">Financieros</option>
                                                        <option value="Ganancias">Ganancias</option>
                                                        <option value="Haberes">Haberes</option>
                                                        <option value="Honorarios">Honorarios</option>
                                                        <option value="ImpSellos">ImpSellos</option>
                                                        <option value="Inmoviliario">Inmoviliario</option>
                                                        <option value="Insumos">Insumos</option>
                                                        <option value="Inversiones">Inversiones</option>
                                                        <option value="Irrigacion">Irrigacion</option>
                                                        <option value="IVA">IVA</option>
                                                        <option value="Mantenimientos">Mantenimientos</option>
                                                        <option value="Municipalidad">Municipalidad</option>
                                                        <option value="OSM">OSM</option>
                                                        <option value="Otras">Otras</option>
                                                        <option value="Pozo">Pozo</option>
                                                        <option value="Prestamos">Prestamos</option>
                                                        <option value="Productos Enologicos">Productos Enologicos
                                                        </option>
                                                        <option value="Seguros">Seguros</option>
                                                        <option value="Servicios">Servicios</option>
                                                        <option value="Sueldos">Sueldos</option>
                                                        <option value="Tarjetas">Tarjetas</option>
                                                        <option value="Vino">Vino</option>
                                                    </select></div>
                                            </td>
                                            <td><select name="FFiltrar">
                                                    <option>Si</option>
                                                    <option>No</option>
                                                </select></td>
                                            <td><input type="date" id="FFDesde" name="FFDesde" value="2019-01-01"
                                                    size="10"
                                                    onclick="
      xajax.call('LlamarFiltro2', {method: 'get', parameters:[FProveedores2.value,FMes2.value,FParticipaIva2.value,FAreas2.value,FCuentas2.value,F2Anio.value,FFDesde.value,FFHasta.value,F2Orden.checked,FDetalleSCBancarias.value]});"
                                                    onchange="
      xajax.call('LlamarFiltro2', {method: 'get', parameters:[FProveedores.value,FMes.value,FParticipaIva.value,FAreas.value,FCuentas.value,FAnio.value,FDetalle2.value,F2Orden.checked,FDetalleSCBancarias.value]});">
                                            </td>
                                            <td><input type="date" id="FFHasta" name="FFHasta" size="10"
                                                    onclick="
      xajax.call('LlamarFiltro2', {method: 'get', parameters:[FProveedores2.value,FMes2.value,FParticipaIva2.value,FAreas2.value,FCuentas2.value,F2Anio.value,FFDesde.value,FFHasta.value,F2Orden.checked,FDetalleSCBancarias.value]});"
                                                    onchange="
      xajax.call('LlamarFiltro2', {method: 'get', parameters:[FProveedores.value,FMes.value,FParticipaIva.value,FAreas.value,FCuentas.value,FAnio.value,FDetalle2.value,F2Orden.checked,FDetalleSCBancarias.value]});"
                                                    value="2021-08-25"> </td>
                                            <td>
                                                VICENTE BARLOTTA </td>
                                            <td><select id="FFiltrar" name="FFiltrar">
                                                    <option>Si</option>
                                                    <option>No</option>
                                                </select></td>
                                            <td><select id="F2Anio" name="F2Anio">
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
                                                </select></td>
                                            <td><input type="checkbox" name="F2Orden" checked="true" id="F2Orden"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="content"
                                    style="none repeat scroll 0 0;overflow:auto;color:#ffffff;width:100%;height:60%;	:4px;">
                                    <div id="Filtro2"></div>
                                </div>
                            </div>
                            <!--  DEUDA PROVEEDORES
       ==================  -->





                            <div class="tab-pane fade" id="pills-Deuda" role="tabpanel"
                                aria-labelledby="pills-Deuda-tab">
                                <div id="DivCmbDeuda"><select id="CmbDeuda" name="CmbDeuda" style="max-width:100px;">
                                        <option value="Todos">Todos</option>
                                        <option value="--- No Asignado ---">--- No Asignado ---</option>
                                        <option value="Bodega">Bodega</option>
                                        <option value="Chapanay">Chapanay</option>
                                        <option value="Ducatto">Ducatto</option>
                                        <option value="Elida">Elida</option>
                                        <option value="Empaque">Empaque</option>
                                        <option value="Enzo">Enzo</option>
                                        <option value="Escritorio">Escritorio</option>
                                        <option value="Fincas">Fincas</option>
                                        <option value="Hostal">Hostal</option>
                                        <option value="Lili">Lili</option>
                                        <option value="Mantenimientos">Mantenimientos</option>
                                        <option value="Miguez">Miguez</option>
                                        <option value="Montecaseros">Montecaseros</option>
                                        <option value="Otra">Otra</option>
                                        <option value="Ruta50">Ruta50</option>
                                        <option value="Sergio">Sergio</option>
                                        <option value="Sociedad">Sociedad</option>
                                        <option value="Vicente">Vicente</option>
                                    </select></div>

                                <input class="ButtonAceptar" type="button"
                                    onclick="xajax.call('SolicitarDeudaProveedores', {method: 'get', parameters:[CmbDeuda.value,DeudaAnio.value,DeudaDesde.value,DeudaHasta.value]}); "
                                    value="Solicitar Deuda">
                                <input class="ButtonAceptar" type="button"
                                    onclick="var xxx='../sistema/DeudaProveedoresPDF.php?mas='+getElementById('cmbAreasDeudasProov').value; window.open(xxx,'nuevaVentana','width=300, height=400');"
                                    value="Generar PDF">
                                <input class="ButtonAceptar" type="button"
                                    onclick="	var CmbDeuda=getElementById('CmbDeuda') ;	var DeudaAnio=getElementById('DeudaAnio');	var DeudaDesde=getElementById('DeudaDesde');	var DeudaHasta=getElementById('DeudaHasta'); var xxx='../sistema/DeudaProveedoresPDF.php?CmbDeuda=' + CmbDeuda.value + '&amp;DeudaAnio=' + DeudaAnio.value + '&amp;DeudaDesde=' + DeudaDesde.value + '&amp;DeudaHasta=' + DeudaHasta.value; window.open(xxx,'nuevaVentana','width=300, height=400');"
                                    value="Generar PDF">
                                <!-- 	   <input class="ButtonAceptar" type="button" onclick=" 
       
      // 	   var CmbDeuda=getElementById('CmbDeuda') ;
      //     	var DeudaAnio=getElementById('DeudaAnio');
      //     	var DeudaDesde=getElementById('DeudaDesde');
      //     	var DeudaHasta=getElementById('DeudaHasta');
      //     	var xxx='../sistema/DeudaProveedoresPDF.php?CmbDeuda=' + CmbDeuda.value + '&DeudaAnio=' + DeudaAnio.value + '&DeudaDesde=' + DeudaDesde.value + '&DeudaHasta=' + DeudaHasta.value + ';
      //         window.open(xxx,'nuevaVentana','width=300, height=400');\" value=\"Generar PDF\">";
      -->

                                <select name="DeudaAnio" id="DeudaAnio">
                                    <option value="Todos">Todos</option>
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
                                </select><br>
                                Desde<input id="DeudaDesde" name="DeudaDesde" type="date"
                                    onclick="xajax.call('SolicitarDeudaProveedores', {method: 'get', parameters:[CmbDeuda.value,DeudaAnio.value,DeudaDesde.value,DeudaHasta.value]}); ">
                                Hasta<input id="DeudaHasta" name="DeudaHasta" type="date"
                                    onclick="xajax.call('SolicitarDeudaProveedores', {method: 'get', parameters:[CmbDeuda.value,DeudaAnio.value,DeudaDesde.value,DeudaHasta.value]}); "><br>

                                <input class="ButtonAceptar" type="button" onclick="var xxx='../sistema/DeudaProveedoresPDF.php?UD='+getElementById('CmbDeuda').value+'&amp;Anio='+getElementById('DeudaAnio').value+'&amp;
          Anio='+getElementById('DeudaDesde').value+'&amp;
          Anio='+getElementById('DeudaHasta').value';
          window.open(xxx,'nuevaVentana','width=300, height=400');" value="Generar PDF">
                                <div id="DeudaProveedores"></div>
                            </div>

                            <!-- CREDITO A PROVEEDORES
       ======================= -->
                            <div class="tab-pane fade" id="pills-Credito" role="tabpanel"
                                aria-labelledby="pills-Credito-tab">
                                <div id="DivCmbCredito"><select id="CmbCredito" name="CmbCredito"
                                        style="max-width:100px;">
                                        <option value="Todos">Todos</option>
                                        <option value="--- No Asignado ---">--- No Asignado ---</option>
                                        <option value="Bodega">Bodega</option>
                                        <option value="Chapanay">Chapanay</option>
                                        <option value="Ducatto">Ducatto</option>
                                        <option value="Elida">Elida</option>
                                        <option value="Empaque">Empaque</option>
                                        <option value="Enzo">Enzo</option>
                                        <option value="Escritorio">Escritorio</option>
                                        <option value="Fincas">Fincas</option>
                                        <option value="Hostal">Hostal</option>
                                        <option value="Lili">Lili</option>
                                        <option value="Mantenimientos">Mantenimientos</option>
                                        <option value="Miguez">Miguez</option>
                                        <option value="Montecaseros">Montecaseros</option>
                                        <option value="Otra">Otra</option>
                                        <option value="Ruta50">Ruta50</option>
                                        <option value="Sergio">Sergio</option>
                                        <option value="Sociedad">Sociedad</option>
                                        <option value="Vicente">Vicente</option>
                                    </select></div>

                                <input class="ButtonAceptar" type="button"
                                    onclick="xajax.call('SolicitarCreditoProveedores', {method: 'get', parameters:[CmbCredito.value,CreditoAnio.value,CreditoDesde.value,CreditoHasta.value]}); "
                                    value="Solicitar Credito"><input class="ButtonAceptar" type="button"
                                    onclick="var xxx='../sistema/DeudaProveedoresPDF.php?mas='+getElementById('cmbAreasDeudasProov').value; window.open(xxx,'nuevaVentana','width=300, height=400');"
                                    value="Generar PDF"><select name="CreditoAnio" id="CreditoAnio">
                                    <option value="Todos">Todos</option>
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
                                </select><br>Desde<input type="date"
                                    onclick="xajax.call('SolicitarCreditoProveedores', {method: 'get', parameters:[CmbCredito.value,CreditoAnio.value,CreditoDesde.value,CreditoHasta.value]}); "
                                    id="CreditoDesde" name="CreditoDesde">Hasta<input type="date"
                                    onclick="xajax.call('SolicitarCreditoProveedores', {method: 'get', parameters:[CmbCredito.value,CreditoAnio.value,CreditoDesde.value,CreditoHasta.value]}); "
                                    id="CreditoHasta" name="CreditoHasta">
                                <div id="CreditoProveedores"></div>
                            </div>


                            <!-- DEUDA POR AREA
       ======================= -->
                            <div class="tab-pane fade" id="pills-DeudaXArea" role="tabpanel"
                                aria-labelledby="pills-DeudaXArea-tab">
                                <input class="ButtonAceptar" type="button"
                                    onclick="xajax.call('SolicitarDeudaPorAreas', {method: 'get', parameters:[AreasAnio.value,chkIncluirAreas.checked,DeudaQuienes.value]}); return false;"
                                    value="Solicitar Deuda por Area"><br>
                                <!-- 	<input class="ButtonAceptar" type="button" onclick="var xxx='../sistema/DeudaPorAreasPDF.php'; window.open(xxx,'nuevaVentana','width=300, height=400');" value="Generar PDF"><br> -->
                                Incluir Areas <input type="checkbox" id="chkIncluirAreas" name="chkIncluirAreas"
                                    checked="true">
                                <select id="DeudaQuienes" name="DeudaQuienes">
                                    <option value="Todos">Todos</option>
                                    <option value="Si">SI</option>
                                    <option value="No">NO</option>
                                </select>
                                Año <select id="AreasAnio" name="AreasAnio">
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
                                </select><br>
                                <div id="DeudaPorAreas"></div>

                            </div>

                            <!-- LIBROS DE IVA
       ======================= -->
                            <div class="tab-pane fade" id="pills-Libros" role="tabpanel"
                                aria-labelledby="pills-Libros-tab">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td><label style="font-size: 10px;">Mes</label><br><select id="LibroMes"
                                                    0="" name="LibroMes"
                                                    onchange="xajax.call('LlamarFiltro', {method: 'get', parameters:[FProveedores.value,FMes.value,FParticipaIva.value,FAreas.value,FCuentas.value,FAnio.value,FDetalle2.value,FOrden.checked,FConSaldo.checked,Pagina.value,FIva.value]});"
                                                    style="max-width : 100px;">
                                                    <option value=" "> </option>
                                                    <option> </option>
                                                    <option value="enero">enero</option>
                                                    <option value="febrero">febrero</option>
                                                    <option value="marzo">marzo</option>
                                                    <option value="abril">abril</option>
                                                    <option value="mayo">mayo</option>
                                                    <option value="junio">junio</option>
                                                    <option value="julio">julio</option>
                                                    <option value="agosto">agosto</option>
                                                    <option value="setiembre">setiembre</option>
                                                    <option value="octubre">octubre</option>
                                                    <option value="noviembre">noviembre</option>
                                                    <option value="diciembre">diciembre</option>
                                                </select><br><label style="font-size: 10px;">Ańo</label><br><select
                                                    name="LibroAnio" id="LibroAnio"
                                                    onclick=" xajax.call('DibujarLibrosCerrados', {method: 'get', parameters:[LibroAnio.value]});">
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
                                                    <option>2011</option>
                                                    <option>2010</option>
                                                </select></td>
                                            <td>
                                                <input class="ButtonAceptar" type="button"
                                                    onclick="var PasadoEnMes=getElementById('LibroMes') ; var Anio=getElementById('LibroAnio'); var xxx='../sistema/LibroIvaPDF.php?PasadoEnMes=' + PasadoEnMes.value + '&amp;Anio=' + Anio.value + '&amp;Compra=1'; window.open(xxx,'nuevaVentana','width=300, height=400')"
                                                    value="Imprimir Libro"><br>
                                                <input class="ButtonAceptar" type="button"
                                                    onclick="var PasadoEnMes=getElementById('LibroMes') ; var Anio=getElementById('LibroAnio'); var xxx='../sistema/CITI/ComprasCBTE.php?PasadoEnMes=' + PasadoEnMes.value + '&amp;Anio=' + Anio.value; window.open(xxx,'nuevaVentana','width=300, height=400')"
                                                    value="Crear Archivos CITI"><br>
                                                <input class="ButtonEliminar" type="button" value="Cerrar Libro"
                                                    onclick="PreguntarCerrar(); 
      xajax.call('CerrarLibro', {method: 'get', parameters:[Cerrar.value,LibroAnio.value,LibroMes.value]});
      xajax.call('DibujarLibrosCerrados', {method: 'get', parameters:[LibroAnio.value]}); return false;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <div id="DivLibrosC"></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>



                            <div id="cargando" style="position: absolute; left: 40%; top: 200px;"></div>
                            <div class="yui-content">


                                <div class="BotonVolver2 form-group col-md-2">
                                </div>
                                <footer
                                    style="text-align: center; font-size: 10; background-color: #999; margin-top: 0;margin-bottom: 0; padding-top: 0; padding-bottom: 0; margin-top: 3px; padding-bottom: 10px;">
                                    Desarrollado por: Ing. Enzo Gabriel Barlotta - Información de Contacto<a
                                        href="mailto:ebarlotta@yahoo.com.ar"> ebarlotta@yahoo.com.ar</a>
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




                                <
                                /div> <
                                /div> <
                                /div> <
                                /div> <
                                /div>
