@extends('layouts.adminlte')

<div>
<form action="{{route('producto.update',$producto)}}" method="POST">

   @csrf
	@method('PUT')

	<div class="content-center flex">
		<div class="bg-white p-2 text-center rounded-lg shadow-lg w-full">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				
            <x-producto>
					<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
						@if (session()->has('message'))
							<div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
								<div class="flex">
									<div>
										<p class="text-xm bg-lightgreen">{{ session('message') }}</p>
									</div>
								</div>
							</div>
						@endif
					</div>
               {{-- <form method="POST" enctype="multipart/form-data" action="store()"> --}}
                  <div class="bg-white px-4 pt-2 pb-2 sm:p-6 sm:pb-4 flex flex-wrap">
                     <div class="mb-4 mr-2 text-left">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Nombre del Producto</label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese Nombre" name="name" value="{{$producto->name}}">
                        @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                     </div>
                     <div class="mb-4 mr-2 text-left">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Descripción</label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese Descripción" name="descripcion" value="{{$producto->descripcion}}">
                        @error('descripcion') <span class="text-red-500">{{ $message }}</span>@enderror
                     </div>
                     <div class="mb-4 mr-2 text-left flex">
								@if($producto->ruta != 'sin_imagen.jpg')
									<img src="{{ asset('images2/'.$producto->ruta) }}" width="100px" height="100px">
									<input type="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"	name="ruta" placeholder="Ingrese imágen" value="{{ $producto->ruta }}">
									@error('ruta') <span class="text-red-500">{{ $message }}</span>@enderror
								@else
									<img src="{{ asset('images/sin_imagen.jpg' )}}" width="100px" height="100px">
									<input type="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"	id="ruta" name="ruta" placeholder="Ingrese imágen">
									@error('ruta') <span class="text-red-500">{{ $message }}</span>@enderror
                        @endif
                     </div>
                  </div>
                  <div class="bg-white px-4 pb-2 sm:p-2 sm:pb-4 flex flex-wrap">
                     <div class="mb-4 mr-2 text-left">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Precio de compra</label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese precio de compra" name="precio_compra" value="{{$producto->precio_compra}}">
                        @error('precio_compra') <span class="text-red-500">{{ $message }}</span>@enderror
                     </div>
                     <div class="mb-4 mr-2 text-left">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Existencia</label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese existencia" name="existencia" value="{{$producto->existencia}}">
                        @error('existencia') <span class="text-red-500">{{ $message }}</span>@enderror
                     </div>
                     <div class="mb-4 mr-2 text-left">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Stock Mínimo</label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese stock_minimo" name="stock_minimo" value="{{$producto->stock_minimo}}">
                        @error('stock_minimo') <span class="text-red-500">{{ $message }}</span>@enderror
                     </div>
                     <div class="mb-4 mr-2 text-left">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Lote</label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese lote" name="lote" value="{{$producto->lote}}">
                        @error('lote') <span class="text-red-500">{{ $message }}</span>@enderror
                     </div>
                     <div class="mb-4 mr-2 text-left">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Unidad</label>
                        @if($unidades)
                           <select name="unidads_id" class="rounded">
                              <option></option>
                              @foreach ($unidades as $unidad)
											@if($unidad->id == $producto->unidads_id)
												<option selected="selected" value="{{$unidad->id}}">{{$unidad->name}}</option>
											@else
												<option value="{{$unidad->id}}">{{$unidad->name}}</option>
											@endif
                              @endforeach
                           </select>
                           @error('unidads_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        @endif
                     </div>
                     <div class="mb-4 mr-2 text-left">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Categoría</label>
                        @if($categoria_productos)
                           <select name="categoriaproductos_id" class="rounded">
                              <option></option>
                              @foreach ($categoria_productos as $categoria)
											@if($categoria->id == $producto->categoriaproductos_id)
												<option selected="selected" value="{{$categoria->id}}">{{$categoria->name}}</option>
											@else
												<option value="{{$categoria->id}}">{{$categoria->name}}</option>
											@endif
                              @endforeach
                           </select>
                           @error('categoriaproductos_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        @endif
                     </div>
                     <div class="mb-4 mr-2 text-left">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Proveedor</label>
                        @if($proveedores)
                           <select name="proveedor_id" class="rounded">
                              <option></option>
                              @foreach ($proveedores as $proveedor)}
											@if($proveedor->id == $producto->proveedor_id)
												<option selected="selected" value="{{$proveedor->id}}">{{$proveedor->name}}</option>
											@else
												<option value="{{$proveedor->id}}">{{$proveedor->name}}</option>												 
											@endif
                              @endforeach
                           </select>
                           @error('proveedor_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        @endif
                     </div>
                     <div class="mb-4 mr-2 text-left">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Estado</label>
                        @if($estados)
                           <select name="estados_id" class="rounded" value="{{ $producto->id }}">
                              <option></option>
                              @foreach ($estados as $estado)
											@if($estado->id == $producto->estados_id)
												<option selected="selected" value="{{ $estado->id }}">{{$estado->name}}</option>
											@else
												<option value="{{ $estado->id }}">{{$estado->name}}</option>
											@endif
                              @endforeach
                           </select>
                           @error('estados_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        @endif
                     </div>
                  </div>
                  <div class="bg-gray-50 px-4 sm:px-6 sm:flex sm:flex-row-reverse mr-5">
                     <span class="mt-3 flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <input class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-300 text-base leading-6 font-bold text-white-900 shadow-sm hover:bg-red-400 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5" type="submit" value="Guardar">
                     </span>
							<span class="mt-3 flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
								<a href="{{url('producto')}}">
                        <input class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-yellow-300 text-base leading-6 font-bold text-white-900 shadow-sm hover:bg-yellow-400 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5" type="button" value="Cerrar">
							</a>
                     </span>
                  </div>
            {{-- </form> --}}
            </x-producto>
         </div>
      </div>
   </div></form>
</div>
