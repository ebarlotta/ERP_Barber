<div>
  <x-titulo>Categorías Profesionales</x-titulo>
  <x-slot name="header">
    <div class="flex">
      <!-- //Comienza en submenu de encabezado -->

      <!-- Navigation Links -->
      @livewire('submenu')
    </div>

  </x-slot>

  <form id="testForm3" onsubmit="return false">
    <div id="demo" class="yui-navset"> <br>
      <ul class="yui-nav">
        <li class="selected"><a href="#tab1"><em>ABM Categoría Profesionales</em></a></li>
      </ul>
      <div class="yui-content">
        <div id="tab1">
          <font size="1" face="Verdana">
            <input id="IdCatProfe" name="IdCatProfe" type="hidden" size="10" value="633">
            <input id="IdEmpresa" name="IdEmpresa" type="hidden" size="10" value="2">

            <r align="center">
            </r>
            <table border="1">
              <tbody bordercolor="#FFFFFF" style="font-family : Verdana; font-size : 12px; font-weight : 300;"
                bgcolor="#EFF3F7">
                <tr>
                  <td>
                    <input type="hidden" name="PreguntaActualizar" id="PreguntaActualizar" value="0"
                      onchange="PreguntarActualizar();">
                    <table class="table table-responsive table-hover" border="1">
                      <tbody bordercolor="#FFFFFF" style="font-family : Verdana; font-size : 12px; font-weight : 300;"
                        bgcolor="#EFF3F7">
                        <tr>
                          <td>Empresa</td>
                          <td><select id="cmbEmpresa" name="cmbEmpresa"
                              onchange="xajax.call('LlamarFiltro', {method: 'get', parameters:[xajax.getFormValues('testForm3')]}); return false;"
                              style="max-width : 250px;">
                              <option value=" "> </option>
                              <option value="VICENTE BARLOTTA">VICENTE BARLOTTA</option>
                              <option value="VICENTE BARLOTTA S.A.">VICENTE BARLOTTA S.A.</option>
                              <option value="ELIDA ROSA CARDENAS">ELIDA ROSA CARDENAS</option>
                              <option value="ENZO GABRIEL BARLOTTA">ENZO GABRIEL BARLOTTA</option>
                              <option value="SERGIO JOSE BARLOTTA">SERGIO JOSE BARLOTTA</option>
                              <option value="HEP publicidad">HEP publicidad</option>
                              <option value="Andrea Jofre">Andrea Jofre</option>
                              <option value="Cooperativa">Cooperativa</option>
                              <option value="EleCad">EleCad</option>
                            </select><input type="checkbox" name="Activos" id="Activos" value="1" checked="true"
                              onchange="xajax.call('LlamarFiltro', {method: 'get', parameters:[xajax.getFormValues('testForm3')]}); return false;">Sólo
                            Activos / Todos </td>
                        </tr>
                        <tr>
                          <td>Categoría</td>
                          <td><input type="text" name="Categoria" id="Categoria" size="40"
                              onkeypress="javascript:if(getKeyCode(event)==13) document.forms[0].Nombre.focus();"
                              align="right"></td>
                        </tr>
                        <tr>
                          <td>Sub Categoría</td>
                          <td><input type="text" name="Subcategoria" id="Subcategoria" size="40"
                              onkeypress="javascript:if(getKeyCode(event)==13) document.forms[0].Nombre.focus();"
                              align="right"></td>
                        </tr>
                        <tr>
                          <td>Precio del mes</td>
                          <td>
                            <input type="text" name="Pmes" style="text-align:right;" id="Pmes" size="10"
                              onkeyup="CalcularNeto();">
                          </td>
                        </tr>
                        <tr>
                          <td>Precio del día</td>
                          <td>
                            <input type="text" name="Pdia" style="text-align:right;" id="Pdia" size="10"
                              onkeypress="javascript:if(getKeyCode(event)==13) document.forms[0].Nombre.focus();"> (25
                            días al mes)
                          </td>
                        </tr>
                        <tr>
                          <td>Precio de la hora</td>
                          <td>
                            <input type="text" name="Phora" style="text-align:right;" id="Phora" size="10"
                              onkeypress="javascript:if(getKeyCode(event)==13) document.forms[0].Nombre.focus();">
                          </td>
                        </tr>
                        <tr>
                          <td>Precio Unidad</td>
                          <td>
                            <input type="text" name="Punidad" style="text-align:right;" id="Punidad" size="10"
                              onkeypress="javascript:if(getKeyCode(event)==13) document.forms[0].Nombre.focus();">
                          </td>
                        </tr>
                        <tr>
                          <td>Precio del Básico</td>
                          <td>
                            <input type="text" name="Basico" style="text-align:right;" id="Basico" size="10"
                              onkeypress="javascript:if(getKeyCode(event)==13) document.forms[0].Nombre.focus();">
                          </td>
                        </tr>
                        <tr>
                          <td>Precio Básico Categ. Actual</td>
                          <td>
                            <input type="text" name="Basico1" style="text-align:right;" id="Basico1"
                              size="10"
                              onkeypress="javascript:if(getKeyCode(event)==13) document.forms[0].Nombre.focus();">
                          </td>
                        </tr>
                        <tr>
                          <td>Inc. Porcentaje</td>
                          <td>
                            <input type="text" name="Porcentaje" style="text-align:right;" id="Porcentaje"
                              size="10"
                              onkeypress="javascript:if(getKeyCode(event)==13) document.forms[0].Nombre.focus();">
                            (0.00 - 1.00)
                          </td>
                        </tr>
                        <tr>
                          <td>Cod. Convenio</td>
                          <td><input type="text" name="Convenio" id="Convenio" size="10" align="right">
                          </td>
                        </tr>
                        <tr>
                          <td>Categoría Activa</td>
                          <td><input type="checkbox" name="Activa" id="Activa" size="10" align="right">
                          </td>
                        </tr>
                        <tr>
                          <td>Observaciones</td>
                          <td><input type="text" name="Observaciones" id="Observaciones" size="40"
                              align="right"></td>
                        </tr>
                      </tbody>
                    </table>

                  </td>
                  <td align="center">
                    <input type="submit" class="btn btn-success" value="Alta Categoría"
                      onclick="xajax.call('AltaCategoria', {method: 'get', parameters:[xajax.getFormValues('testForm3')]});; xajax.call('LlamarFiltro', {method: 'get', parameters:[xajax.getFormValues('testForm3')]}); return false;"><br><br><br>
                    <input type="submit" class="btn btn-primary" value="Actualizar Categoría"
                      onclick="PreguntarActualizar(); xajax.call('ActualizarCategoria', {method: 'get', parameters:[xajax.getFormValues('testForm3')]});; xajax.call('LlamarFiltro', {method: 'get', parameters:[xajax.getFormValues('testForm3')]}); return false;"><br><br><br>
                    <input type="submit" class="btn btn-warning" value="Modificar Categoría"
                      onclick="xajax.call('ModificarCategoria', {method: 'get', parameters:[IdCatProfe.value,Activa.checked,Categoria.value,IdEmpresa.value,Convenio.value,Subcategoria.value,Pdia.value,Pmes.value,Phora.value,Punidad.value,Basico.value,Basico1.value,Porcentaje.value,Observaciones.value]}); xajax.call('LlamarFiltro', {method: 'get', parameters:[xajax.getFormValues('testForm3')]}); return false;"><br><br><br>

                    <input type="hidden" id="Borrar" name="Borrar" value="0"><br>
                    <input type="button" class="btn btn-info" value="Volver"
                      onclick="javascript: window.location.href='../Empleados/menu1.php';">
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <div id="DivCategorias">
                      <table style="font-size : 10px;" class="table table-responsive table-hover" font-size="8"
                        border="1">
                        <tbody>
                          <tr>
                            <td align="center">ID</td>
                            <td align="center">Categoría Profesional</td>
                            <td align="center">Sub Categoría</td>
                            <td align="center">CCT</td>
                            <td>Precio Dia</td>
                            <td>Precio Mes</td>
                            <td>Precio Hora</td>
                            <td>Por Unidad</td>
                            <td align="center">Básico Cat.</td>
                            <td align="center">Porc</td>
                            <td>Activo</td>
                            <td>Observaciones</td>
                          </tr>
                          <tr
                            onclick="xajax.call('CargarDatosCategoria', {method: 'get', parameters:[xajax.getFormValues('testForm3'),629]}); return false;"
                            bgcolor="#A7FFAD">
                            <td>629</td>
                            <td>Administracion</td>
                            <td>Encargado sección (Mensualizado</td>
                            <td>CCT 85/99</td>
                            <td align="right">2.471,77</td>
                            <td align="right">61.794,20</td>
                            <td align="right">3.089,71</td>
                            <td align="right">61.794,20</td>
                            <td align="right">1.901,36</td>
                            <td align="right">1,11</td>
                            <td align="center">1</td>
                            <td align="left">Desde 2022-03 - 2022-07</td>
                          </tr>
                          <tr></tr>
                          <tr
                            onclick="xajax.call('CargarDatosCategoria', {method: 'get', parameters:[xajax.getFormValues('testForm3'),651]}); return false;"
                            bgcolor="#A7FFAD">
                            <td>651</td>
                            <td>Contratista de Viña</td>
                            <td>Contratista</td>
                            <td>Ley 23154</td>
                            <td align="right">0,00</td>
                            <td align="right">0,00</td>
                            <td align="right">0,00</td>
                            <td align="right">1.198,54</td>
                            <td align="right">0,00</td>
                            <td align="right">0,00</td>
                            <td align="center">1</td>
                            <td align="left">Desde 01/05/2022 - 31/10/2022</td>
                          </tr>
                          <tr></tr>
                          <tr
                            onclick="xajax.call('CargarDatosCategoria', {method: 'get', parameters:[xajax.getFormValues('testForm3'),653]}); return false;"
                            bgcolor="#A7FFAD">
                            <td>653</td>
                            <td>Contratista de Viña</td>
                            <td>Contratista</td>
                            <td>Ley 23154</td>
                            <td align="right">0,00</td>
                            <td align="right">0,00</td>
                            <td align="right">0,00</td>
                            <td align="right">1.447,47</td>
                            <td align="right">0,00</td>
                            <td align="right">0,00</td>
                            <td align="center">1</td>
                            <td align="left">Desde 01/11/2022 - 30/04/2023</td>
                          </tr>
                          <tr></tr>
                          <tr
                            onclick="xajax.call('CargarDatosCategoria', {method: 'get', parameters:[xajax.getFormValues('testForm3'),631]}); return false;"
                            bgcolor="#A7FFAD">
                            <td>631</td>
                            <td>Geriatría - Cocinera CCT 122/75</td>
                            <td>COCINERA-GERIATRICA 8555</td>
                            <td>CCT 122/75</td>
                            <td align="right">3.517,47</td>
                            <td align="right">87.936,82</td>
                            <td align="right">439,68</td>
                            <td align="right">87.936,82</td>
                            <td align="right">87.936,82</td>
                            <td align="right">0,00</td>
                            <td align="center">1</td>
                            <td align="left">Desde 2022-05 - 2022-05</td>
                          </tr>
                          <tr></tr>
                          <tr
                            onclick="xajax.call('CargarDatosCategoria', {method: 'get', parameters:[xajax.getFormValues('testForm3'),643]}); return false;"
                            bgcolor="#A7FFAD">
                            <td>643</td>
                            <td>Geriatría - Cocinera CCT 122/75</td>
                            <td>COCINERA-GERIATRICA 8555</td>
                            <td>CCT 122/75</td>
                            <td align="right">3.866,05</td>
                            <td align="right">96.651,28</td>
                            <td align="right">483,26</td>
                            <td align="right">96.651,28</td>
                            <td align="right">96.651,28</td>
                            <td align="right">0,00</td>
                            <td align="center">1</td>
                            <td align="left">Desde 2022-06 - 2022-06</td>
                          </tr>
                          <tr></tr>
                          <tr
                            onclick="xajax.call('CargarDatosCategoria', {method: 'get', parameters:[xajax.getFormValues('testForm3'),645]}); return false;"
                            bgcolor="#A7FFAD">
                            <td>645</td>
                            <td>Geriatría - Cocinera CCT 122/75</td>
                            <td>COCINERA-GERIATRICA 8555</td>
                            <td>CCT 122/75</td>
                            <td align="right">4.468,14</td>
                            <td align="right">111.703,53</td>
                            <td align="right">558,52</td>
                            <td align="right">111.703,53</td>
                            <td align="right">111.703,53</td>
                            <td align="right">0,00</td>
                            <td align="center">1</td>
                            <td align="left">Desde 2022-08 - 2022-08</td>
                          </tr>
                          <tr></tr>
                          <tr
                            onclick="xajax.call('CargarDatosCategoria', {method: 'get', parameters:[xajax.getFormValues('testForm3'),647]}); return false;"
                            bgcolor="#A7FFAD">
                            <td>647</td>
                            <td>Geriatría - Cocinera CCT 122/75</td>
                            <td>COCINERA-GERIATRICA 8555</td>
                            <td>CCT 122/75</td>
                            <td align="right">4.753,34</td>
                            <td align="right">118.833,54</td>
                            <td align="right">594,17</td>
                            <td align="right">118.833,54</td>
                            <td align="right">118.833,54</td>
                            <td align="right">0,00</td>
                            <td align="center">1</td>
                            <td align="left">Desde 2022-11 - 2022-11</td>
                          </tr>
                          <tr></tr>
                          <tr
                            onclick="xajax.call('CargarDatosCategoria', {method: 'get', parameters:[xajax.getFormValues('testForm3'),649]}); return false;"
                            bgcolor="#A7FFAD">
                            <td>649</td>
                            <td>Geriatría - Cocinera CCT 122/75</td>
                            <td>COCINERA-GERIATRICA 8555</td>
                            <td>CCT 122/75</td>
                            <td align="right">5.038,54</td>
                            <td align="right">125.963,55</td>
                            <td align="right">629,82</td>
                            <td align="right">125.963,55</td>
                            <td align="right">125.963,55</td>
                            <td align="right">0,00</td>
                            <td align="center">1</td>
                            <td align="left">Desde 2022-12 - 2022-12</td>
                          </tr>
                          <tr></tr>
                          <tr
                            onclick="xajax.call('CargarDatosCategoria', {method: 'get', parameters:[xajax.getFormValues('testForm3'),633]}); return false;"
                            bgcolor="#A7FFAD">
                            <td>633</td>
                            <td>Geriatría - Mucama</td>
                            <td>Mucamas de Piso Consultorios<br>Externos y Geriátricos</td>
                            <td>CCT 122/75</td>
                            <td align="right">3.237,90</td>
                            <td align="right">80.947,40</td>
                            <td align="right">404,74</td>
                            <td align="right">80.947,40</td>
                            <td align="right">80.947,40</td>
                            <td align="right">0,00</td>
                            <td align="center">1</td>
                            <td align="left">Desde 2022-05 - 2022-05</td>
                          </tr>
                          <tr></tr>
                          <tr
                            onclick="xajax.call('CargarDatosCategoria', {method: 'get', parameters:[xajax.getFormValues('testForm3'),635]}); return false;"
                            bgcolor="#A7FFAD">
                            <td>635</td>
                            <td>Geriatría - Mucama</td>
                            <td>Mucamas de Piso Consultorios<br>Externos y Geriátricos</td>
                            <td>CCT 122/75</td>
                            <td align="right">3.558,77</td>
                            <td align="right">88.969,22</td>
                            <td align="right">444,85</td>
                            <td align="right">88.969,22</td>
                            <td align="right">88.969,22</td>
                            <td align="right">0,00</td>
                            <td align="center">1</td>
                            <td align="left">Desde 2022-06 - 2022-06</td>
                          </tr>
                          <tr></tr>
                          <tr
                            onclick="xajax.call('CargarDatosCategoria', {method: 'get', parameters:[xajax.getFormValues('testForm3'),637]}); return false;"
                            bgcolor="#A7FFAD">
                            <td>637</td>
                            <td>Geriatría - Mucama</td>
                            <td>Mucamas de Piso Consultorios<br>Externos y Geriátricos</td>
                            <td>CCT 122/75</td>
                            <td align="right">4.113,00</td>
                            <td align="right">102.825,08</td>
                            <td align="right">514,13</td>
                            <td align="right">102.825,08</td>
                            <td align="right">102.825,08</td>
                            <td align="right">0,00</td>
                            <td align="center">1</td>
                            <td align="left">Desde 2022-08 - 2022-08</td>
                          </tr>
                          <tr></tr>
                          <tr
                            onclick="xajax.call('CargarDatosCategoria', {method: 'get', parameters:[xajax.getFormValues('testForm3'),639]}); return false;"
                            bgcolor="#A7FFAD">
                            <td>639</td>
                            <td>Geriatría - Mucama</td>
                            <td>Mucamas de Piso Consultorios<br>Externos y Geriátricos</td>
                            <td>CCT 122/75</td>
                            <td align="right">4.375,54</td>
                            <td align="right">109.388,39</td>
                            <td align="right">546,94</td>
                            <td align="right">109.388,39</td>
                            <td align="right">109.388,39</td>
                            <td align="right">0,00</td>
                            <td align="center">1</td>
                            <td align="left">Desde 2022-11 - 2022-11</td>
                          </tr>
                          <tr></tr>
                          <tr
                            onclick="xajax.call('CargarDatosCategoria', {method: 'get', parameters:[xajax.getFormValues('testForm3'),641]}); return false;"
                            bgcolor="#A7FFAD">
                            <td>641</td>
                            <td>Geriatría - Mucama</td>
                            <td>Mucamas de Piso Consultorios<br>Externos y Geriátricos</td>
                            <td>CCT 122/75</td>
                            <td align="right">4.638,07</td>
                            <td align="right">115.951,69</td>
                            <td align="right">579,76</td>
                            <td align="right">115.951,69</td>
                            <td align="right">115.951,69</td>
                            <td align="right">0,00</td>
                            <td align="center">1</td>
                            <td align="left">Desde 2022-12 - 2022-12</td>
                          </tr>
                          <tr></tr>
                          <tr
                            onclick="xajax.call('CargarDatosCategoria', {method: 'get', parameters:[xajax.getFormValues('testForm3'),619]}); return false;"
                            bgcolor="#A7FFAD">
                            <td>619</td>
                            <td>Obrero de Viña</td>
                            <td>Obrero Comun 00-03</td>
                            <td>CCT 154/91</td>
                            <td align="right">1.814,80</td>
                            <td align="right">45.370,00</td>
                            <td align="right">226,85</td>
                            <td align="right">45.370,00</td>
                            <td align="right">1.814,80</td>
                            <td align="right">0,00</td>
                            <td align="center">1</td>
                            <td align="left">Desde 2022-03 - 2022-07</td>
                          </tr>
                          <tr></tr>
                          <tr
                            onclick="xajax.call('CargarDatosCategoria', {method: 'get', parameters:[xajax.getFormValues('testForm3'),625]}); return false;"
                            bgcolor="#A7FFAD">
                            <td>625</td>
                            <td>Obrero de Viña</td>
                            <td>Obrero Especializado 15-18</td>
                            <td>CCT 154/91</td>
                            <td align="right">2.143,73</td>
                            <td align="right">53.593,31</td>
                            <td align="right">267,97</td>
                            <td align="right">53.593,31</td>
                            <td align="right">1.814,80</td>
                            <td align="right">0,00</td>
                            <td align="center">1</td>
                            <td align="left">Desde 2022-03 - 2022-07</td>
                          </tr>
                          <tr></tr>
                          <tr
                            onclick="xajax.call('CargarDatosCategoria', {method: 'get', parameters:[xajax.getFormValues('testForm3'),627]}); return false;"
                            bgcolor="#A7FFAD">
                            <td>627</td>
                            <td>Obrero de Viña</td>
                            <td>Tractorista 09-12</td>
                            <td>CCT 154/91</td>
                            <td align="right">2.243,55</td>
                            <td align="right">56.088,66</td>
                            <td align="right">280,44</td>
                            <td align="right">56.088,66</td>
                            <td align="right">1.814,80</td>
                            <td align="right">0,00</td>
                            <td align="center">1</td>
                            <td align="left">Desde 2022-03 - 2022-07</td>
                          </tr>
                          <tr></tr>
                        </tbody>
                      </table>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>

          </font>
        </div>
        <font size="1" face="Verdana">

        </font>
      </div>
      <font size="1" face="Verdana">
      </font>
    </div>
    <font size="1" face="Verdana">

      <script type="text/javascript">
        function CalcularNeto() {


          var MES = Number(document.getElementById('Pmes').value);

          ////var MES=Number(document.getElementById('Pmes').value); 
          ////Pmes=MES.toPrecision(5);
          // var Pdia=Number(document.getElementById('Pdia').value);
          // var PHora=Number(document.getElementById('PHora').value);
          ////var DIA=Number(Pmes/25);
          var DIA = Number(MES / 25);
          ////Pdia=DIA.toPrecision(5);
          ////var HORA=Number(Pmes/25/8);
          var HORA = Number(DIA / 8);
          ////PHora=HORA.toPrecision(5);
          ////document.getElementById('Pdia').value=Number(Pdia.toFixed(5));
          ////document.getElementById('Phora').value=Number(PHora.toFixed(5));
          document.getElementById('Pdia').value = Number(DIA.toFixed(5));
          document.getElementById('Phora').value = Number(HORA.toFixed(5));
          //alert('termino');


          //document.getElementById('Neto').value=Number(Neto.toFixed(2));;

        }

        function isNumberKey(evt) {
          var charCode = (evt.which) ? evt.which : event.keyCode
          if (charCode > 31 && (charCode < 48 || charCode > 57 || charCode != 46))
            return false;
          else
            return true;
        }

        function PreguntarActualizar() {
          Respuesta = confirm("Quiere crear una nueva categor&iacute;a profesional actualizando los datos?");
          if (Respuesta) {
            document.getElementById('PreguntaActualizar').value = 1;
          }
        }
      </script>


</div>
