<div>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Ventas</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fa fa-shopping-bag"></i> Venta Nro <input type="text" style="text-align: center" value="{{ $idVenta ? $idVenta->id : 'Ninguna' }}" disabled=""> </h3>
                        <div class="card-tools"> <button type="button" class="btn btn-tool" data-card-widget="collapse"> <i class="fas fa-minus"></i> </button> </div>
                    </div>
                    
                    <div class="card-body"> <b>Carrito </b> 
                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-buscar_producto"> <i class="fa fa-search"></i> Buscar producto </button> -->
                        <button type="button" class="btn btn-primary" wire:click="openModalProducto()"> <i class="fa fa-search"></i> Buscar producto </button> <!-- modal para visualizar datos de los proveedor -->
                        @if($ModalProducto)


                        <!-- <div class="flex items-end justify-center mt-24 pt-4 px-4 pb-20 text-center sm:block sm:p-0" style="background-color: beige; ">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle "></span>
        <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-1 sm:align-top sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline"> -->



                        <!-- <div class="modal fade" id="modal-buscar_producto" style="display: none;" aria-hidden="true"> -->
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #1d36b6;color: white">
                                        <h4 class="modal-title">Busqueda del producto</h4> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="table table-responsive">
                                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6">
                                                        <div class="dataTables_length" id="example1_length"><label>Mostrar <select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm">
                                                                    <option value="10">10</option>
                                                                    <option value="25">25</option>
                                                                    <option value="50">50</option>
                                                                    <option value="100">100</option>
                                                                </select> Productos</label></div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6">
                                                        <div id="example1_filter" class="dataTables_filter"><label>Buscador:<input type="search" wire:model="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <table id="example1" class="table table-bordered table-striped table-sm dataTable no-footer dtr-inline" aria-describedby="example1_info">
                                                            <thead>
                                                                <tr>
                                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Selecionar: activate to sort column ascending">
                                                                        <center>Selecionar</center>
                                                                    </th>
                                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Imagen: activate to sort column ascending">
                                                                        <center>Imagen</center>
                                                                    </th>
                                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending">
                                                                        <center>Nombre</center>
                                                                    </th>
                                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Descripción: activate to sort column ascending">
                                                                        <center>Descripción</center>
                                                                    </th>
                                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Stock: activate to sort column ascending">
                                                                        <center>Stock</center>
                                                                    </th>
                                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Precio venta: activate to sort column ascending">
                                                                        <center>Precio venta</center>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            

                                                                @foreach($productos as $prod)
                                                                <tr class="odd">
                                                                    <td> <button class="btn btn-info" id="btn_selecionar{{ $prod->id}}" wire:click="seleccionarproducto({{ $prod->id}})"> Selecionar </button></td>
                                                                    <td> <img src="{{ asset('images/'. $prod->ruta) }}" alt="Sin imagen" style="height: 50px;width: 50px;"> </td>
                                                                    <td>{{ $prod->name }}</td>
                                                                    <td>{{ $prod->descripcion }}</td>
                                                                    <td class="text-right">{{ number_format($prod->existencia, 2, ',', '.') }}</td>
                                                                    <td class="text-right">{{ number_format($prod->precio_venta, 2, ',', '.') }}</td>
                                                                </tr>
                                                                @endforeach
                                                                



                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-5">
                                                        <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Mostrando 1 a 5 de 7 Productos</div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-7">
                                                        <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                                            <ul class="pagination">
                                                                <li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Anterior</a></li>
                                                                <li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                                                <li class="paginate_button page-item next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0" class="page-link">Siguiente</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group"> <input type="text" id="id_producto" hidden=""> <label for="">Producto</label> <input type="text" wire:model="nombreproducto" class="form-control" disabled=""> </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group"> <label for="">Descripcion</label> <input type="text" wire:model="descripcion" class="form-control" disabled=""> </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group"> <label for="">Cantidad</label> <input type="number" wire:model="cantidad" class="form-control" min="0" value="1"> </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group"> <label for="">Precio Unitario</label> <input type="text" wire:model="precioventa" class="form-control" disabled=""> </div>
                                                </div>
                                            </div> <button style="float: right" id="btn_registrar_carrito" class="btn btn-primary" wire:click="registrar()">Registrar</button>
                                            <div id="respuesta_carrito"></div>
                                        </div>
                                    </div>
                                </div> <!-- /.modal-content -->
                            </div> <!-- /.modal-dialog -->
                        <!-- </div> <br><br> -->

                        <!-- </div>
    </div>
</div> -->

                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th style="background-color: #e7e7e7;text-align: center">Nro</th>
                                        <th style="background-color: #e7e7e7;text-align: center">Producto</th>
                                        <th style="background-color: #e7e7e7;text-align: center">Descripcion</th>
                                        <th style="background-color: #e7e7e7;text-align: center">Cantidad</th>
                                        <th style="background-color: #e7e7e7;text-align: center">Precio Unitario</th>
                                        <th style="background-color: #e7e7e7;text-align: center">Precio SubTotal</th>
                                        <th style="background-color: #e7e7e7;text-align: center">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>

                                   
                                    @if($idVenta)


                                        @foreach($productosseleccionados as $prod)
                                        <tr>
                                            <td><center>111</center></td>
                                            <td>{{ $prod->name }}</td>
                                            <td>{{ $prod->descripcion }}</td>
                                            <td><center><span>{{ $prod->cantidad }} </span></center></td>
                                            <td><center>{{ $prod->precio }}</center></td>
                                            <td><center>{{ $prod->precio*$prod->cantidad }}</center></td>
                                            <td><center>
                                                <button type="submit" class="btn btn-danger btn-sm" wire:click="eliminarItem({{ $prod->id}},{{ $prod->ventas_id}})">
                                                    <i class="fa fa-trash"></i> 
                                                    Borrar
                                                </button> 
                                                </form></center>
                                            </td>
                                        </tr>
                                        @endforeach -->
                                        <!-- @if($productosseleccionados)
                                            {!! $html !!}
                                        @endif -->
                                    @else
                                        <tr>
                                            <td colspan="6">
                                                Sin productos
                                            </td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <th colspan="3" style="background-color: #e7e7e7;text-align: right">Total</th>
                                        <th>
                                            <center>2</center>
                                        </th>
                                        <th>
                                            <center>25</center>
                                        </th>
                                        <th style="background-color: #fff819">
                                            <center>25</center>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="row">
            <!--<div class="col-md-9">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fa fa-user-check"></i> Datos del cliente</h3>
                        <div class="card-tools"> <button type="button" class="btn btn-tool" data-card-widget="collapse"> <i class="fas fa-minus"></i> </button> </div>
                    </div>
                    
                    <div class="card-body"> <b>Cliente </b> <button type="button" class="btn btn-primary" > <i class="fa fa-search"></i> Buscar cliente </button>
                        <div class="modal fade" id="modal-buscar_cliente">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #1d36b6;color: white">
                                        <h4 class="modal-title">Busqueda del cliente </h4>

                                        <div style="width: 10px"></div> <button type="button" class="btn btn-warning"> <i class="fa fa-users"></i> agregar nuevo cliente </button> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="table table-responsive">
                                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6">
                                                        <div class="dataTables_length" id="example2_length"><label>Mostrar <select name="example2_length" aria-controls="example2" class="custom-select custom-select-sm form-control form-control-sm">
                                                                    <option value="10">10</option>
                                                                    <option value="25">25</option>
                                                                    <option value="50">50</option>
                                                                    <option value="100">100</option>
                                                                </select> Clientes</label></div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6">
                                                        <div id="example2_filter" class="dataTables_filter"><label>Buscador:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example2"></label></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <table id="example2" class="table table-bordered table-striped table-sm dataTable no-footer dtr-inline" aria-describedby="example2_info">
                                                            <thead>
                                                                <tr>
                                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Nro: activate to sort column descending">
                                                                        <center>Nro</center>
                                                                    </th>
                                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Selecionar: activate to sort column ascending">
                                                                        <center>Selecionar</center>
                                                                    </th>
                                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nombre del cliente: activate to sort column ascending">
                                                                        <center>Nombre del cliente</center>
                                                                    </th>
                                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nit/CI: activate to sort column ascending">
                                                                        <center>Nit/CI</center>
                                                                    </th>
                                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Celular: activate to sort column ascending">
                                                                        <center>Celular</center>
                                                                    </th>
                                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Correo: activate to sort column ascending">
                                                                        <center>Correo</center>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="odd">
                                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                                        <center>1</center>
                                                                    </td>
                                                                    <td>
                                                                        <center> <button id="btn_pasar_cliente1" class="btn btn-info">Seleccionar</button>
                                                                        </center>
                                                                    </td>
                                                                    <td>Danie Bermejo</td>
                                                                    <td>
                                                                        <center>88377498</center>
                                                                    </td>
                                                                    <td>
                                                                        <center>774665775</center>
                                                                    </td>
                                                                    <td>
                                                                        <center>julian@gmail.com</center>
                                                                    </td>
                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                                        <center>2</center>
                                                                    </td>
                                                                    <td>
                                                                        <center> <button id="btn_pasar_cliente2" class="btn btn-info">Seleccionar</button>
                                                                        </center>
                                                                    </td>
                                                                    <td>Raul Sufan</td>
                                                                    <td>
                                                                        <center>76466434</center>
                                                                    </td>
                                                                    <td>
                                                                        <center>3232323</center>
                                                                    </td>
                                                                    <td>
                                                                        <center>julia@gmail.com</center>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-5">
                                                        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Mostrando 1 a 5 de 17 Clientes</div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-7">
                                                        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                                            <ul class="pagination">
                                                                <li class="paginate_button page-item previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Anterior</a></li>
                                                                <li class="paginate_button page-item active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                                                <li class="paginate_button page-item next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0" class="page-link">Siguiente</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div> 
                        </div> <br> <br>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group"> <input type="text" id="id_cliente" hidden=""> <label for="">Nombre del cliente</label> <input type="text" class="form-control" id="nombre_cliente"> </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group"> <label for="">Nit/Ci del cliente</label> <input type="text" class="form-control" id="nit_ci_cliente"> </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group"> <label for="">Celular del cliente</label> <input type="text" class="form-control" id="celular_cliente"> </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group"> <label for="">Correo del cliente</label> <input type="text" class="form-control" id="email_cliente"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
            <div class="col-md-3">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fa fa-shopping-basket"></i> Registrar venta</h3>
                        <div class="card-tools"> <button type="button" class="btn btn-tool" data-card-widget="collapse"> <i class="fas fa-minus"></i> </button> </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group"> <label for="">Monto a cancelar</label> <input type="text" class="form-control" id="total_a_cancelar" style="text-align: center;background-color: #fff819" value="25" disabled=""> </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group"> <label for="">Total pagado</label> <input type="text" class="form-control" id="total_pagado">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"> <label for="">Cambio</label> <input type="text" class="form-control" id="cambio" disabled=""> </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group"> <button id="btn_guardar_venta" class="btn btn-primary btn-block">Guardar venta</button>
                            <div id="respuesta_registro_venta"></div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>