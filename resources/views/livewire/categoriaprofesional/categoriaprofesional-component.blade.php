<div>
    <x-titulo>Categorías Profesionales</x-titulo>
    <x-slot name="header">
        <div class="flex">
            <!-- //Comienza en submenu de encabezado -->

            <!-- Navigation Links -->
            @livewire('submenu')
        </div>

    </x-slot>

    <table border="1">
        <tbody bordercolor="#FFFFFF" style="font-family : Verdana; font-size : 18px; font-weight : 300;" bgcolor="#EFF3F7">
            <tr>
                <td>
                    <table class="table table-responsive table-hover" border="1">
                        <tbody bordercolor="#FFFFFF" style="font-family : Verdana; font-size : 16px; font-weight : 300;" bgcolor="#EFF3F7">
                            <tr>
                            </tr>
                            <tr>
                            </tr>
                            <tr>
                              <td>Precio del mes</td>
                              <td><input type="text" name="preciomes" style="text-align:right;" id="preciomes" wire:model="preciomes" size="10" onkeyup="CalcularNeto();"></td>
                              <td>Categoría</td>
                              <td><input type="text" name="name" id="name" wire:model="name" size="40" align="right"></td>
                            </tr>
                            <tr>
                              <td>Precio del día</td>
                              <td><input type="text" name="preciodia" style="text-align:right;" id="preciodia" wire:model="preciodia" size="10"> (25 días al mes)</td>
                              <td>Sub Categoría</td>
                              <td><input type="text" name="subcategoria" id="subcategoria" wire:model="subcategoria" size="40" align="right"></td>
                            </tr>
                            <tr>
                              <td>Precio de la hora</td>
                              <td><input type="text" name="preciohora" style="text-align:right;" id="preciohora"wire:model="preciohora" size="10"></td>
                              <td>Cod. Convenio</td>
                              <td><input type="text" name="cct" id="cct" wire:model="cct" size="10" align="right"></td>
                            </tr>
                            <tr>
                              <td>Precio Unidad</td>
                              <td><input type="text" name="preciounidad" style="text-align:right;" id="preciounidad" wire:model="preciounidad" size="10">
                              <td>Categoría Activa</td>
                              <td><input type="checkbox" name="activo" id="activo" wire:model="activo" size="10" align="right"></td>
                            </tr>
                            <tr>
                              <td>Inc. Porcentaje</td>
                              <td><input type="text" name="porcentaje" id="porcentaje" style="text-align:right;" wire:model="porcentaje" size="10">(0.00 - 1.00)</td>
                              <td>Observaciones</td>
                              <td><input type="text" name="observacion" id="observacion" wire:model="observacion" size="40" align="right"></td>
                            </tr>
                            <tr>
                              <td>Precio del Básico</td>
                              <td><input type="text" name="basico" style="text-align:right;" id="basico" wire:model="basico" size="10"></td>
                              <td><input type="submit" class="btn btn-success" value="Alta Categoría" wire:click="AgregarNuevaCategoria" align="right"></td>
                            </tr>
                            <tr>
                              <td>Precio Básico 1 Categ. Actual</td>
                              <td><input type="text" name="basico1" style="text-align:right;" id="basico1" wire:model="basico1" size="10"></td>
                              <td><input type="submit" class="btn btn-primary" value="Actualizar Categoría" wire:click="ActualizarCategoria" align="right"></td>
                            </tr>
                            <tr>
                              <td>Precio Básico 2 Categ. Actual</td>
                              <td><input type="text" name="basico2" style="text-align:right;" id="basico2" wire:model="basico2" size="10"></td>
                              <td><input type="submit" class="btn btn-warning" value="Modificar Categoría" wire:click="ModificarCategoria" align="right"></td>
                            </tr>
                        </tbody>
                    </table>

                </td>
                <td align="center">
                    
                    <p></p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div id="DivCategorias">
                        <table style="font-size : 14px;" class="table table-responsive table-hover" font-size="8"
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
                                    <td align="center">Básico 1 Cat.</td>
                                    <td align="center">Básico 2 Cat.</td>
                                    <td align="center">Porc</td>
                                    <td>Activo</td>
                                    <td>Observaciones</td>
                                </tr>
                                @foreach ($categorias as $categoria)
                                    <tr wire:click="CargarDatosCategoria({{ $categoria->id }})"
                                        @if ($categoria->activo) bgcolor="#A7FFAD" @else bgcolor="pink" @endif>
                                        <td>{{ $categoria->id }}</td>
                                        <td>{{ $categoria->name }}</td>
                                        <td>{{ $categoria->subcategoria }}</td>
                                        <td>{{ $categoria->cct }}</td>
                                        <td align="right"> {{ number_format($categoria->preciodia, 2, ',', '.') }}
                                        </td>
                                        <td align="right"> {{ number_format($categoria->preciomes, 2, ',', '.') }}
                                        </td>
                                        <td align="right"> {{ number_format($categoria->preciohora, 2, ',', '.') }}
                                        </td>
                                        <td align="right"> {{ number_format($categoria->preciounidad, 2, ',', '.') }}
                                        </td>
                                        <td align="right"> {{ number_format($categoria->basico, 2, ',', '.') }}
                                        </td>
                                        <td align="right"> {{ number_format($categoria->basico1, 2, ',', '.') }}
                                        </td>
                                        <td align="center">{{ number_format($categoria->basico2, 2, ',', '.') }}
                                        </td>
                                        <td align="center">{{ number_format($categoria->porcentaje, 2, ',', '.') }}
                                        </td>
                                        <td align="left"> {{ $categoria->activo }}</td>
                                        <td align="left"> {{ $categoria->observacion }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>

