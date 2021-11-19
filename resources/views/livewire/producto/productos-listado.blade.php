@extends('layouts.adminlte')

	

	<div class="content-center flex">
		<div class="bg-white p-2 text-center rounded-lg shadow-lg w-full">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-producto>
               <form method="POST" enctype="multipart/form-data" action="store()">
                  <div class="bg-white px-4 pt-2 pb-2 sm:p-6 sm:pb-4 flex flex-wrap">
                     <div class="mb-4 mr-2 text-left">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Nombre del Producto</label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                              id="exampleFormControlInput1" placeholder="Ingrese Nombre" wire:model="name">
                        @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                     </div>
                     <div class="mb-4 mr-2 text-left">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Descripción</label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                              id="exampleFormControlInput1" placeholder="Ingrese Descripción" wire:model="descripcion">
                        @error('descripcion') <span class="text-red-500">{{ $message }}</span>@enderror
                     </div>
                     <div class="mb-4 mr-2 text-left flex">
                        {{-- @if(! 'sin_imagen.jpg') --}}
                           <img src="{{ asset('images2/' )}}" width="100px" height="100px">
                           {{-- <input type="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"	id="exampleFormControlInput1" placeholder="Ingrese imágenoooo" wire:model="ruta" value="{{ $ruta ?? '' }}">										 --}}
                           @error('ruta') <span class="text-red-500">{{ $message }}</span>@enderror
                        {{-- @else --}}
                           <img src="{{ asset('images/sin_imagen.jpg' )}}" width="100px" height="100px">
                           <input type="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"	id="exampleFormControlInput1" placeholder="Ingrese imágendd" wire:model="ruta">										
                           @error('ruta') <span class="text-red-500">{{ $message }}</span>@enderror
                        {{-- @endif --}}
                     </div>

                  </div>
                  <div class="bg-white px-4 pb-2 sm:p-2 sm:pb-4 flex flex-wrap">
                     <div class="mb-4 mr-2 text-left">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Precio de compra</label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                              id="exampleFormControlInput1" placeholder="Ingrese precio de compra" wire:model="precio_compra">
                        @error('precio_compra') <span class="text-red-500">{{ $message }}</span>@enderror
                     </div>
                     <div class="mb-4 mr-2 text-left">
                        <label for="exampleFormControlInput1"
                              class="block text-gray-700 text-sm font-bold mb-2">Existencia</label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                              id="exampleFormControlInput1" placeholder="Ingrese existencia" wire:model="existencia">
                        @error('existencia') <span class="text-red-500">{{ $message }}</span>@enderror
                     </div>
                     <div class="mb-4 mr-2 text-left">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Stock Mínimo</label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                              id="exampleFormControlInput1" placeholder="Ingrese stock_minimo" wire:model="stock_minimo">
                        @error('stock_minimo') <span class="text-red-500">{{ $message }}</span>@enderror
                     </div>
                     <div class="mb-4 mr-2 text-left">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Lote</label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                              id="exampleFormControlInput1" placeholder="Ingrese lote" wire:model="lote">
                        @error('lote') <span class="text-red-500">{{ $message }}</span>@enderror
                     </div>
                     <div class="mb-4 mr-2 text-left">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Unidad</label>
                        @if($unidades)
                           <select wire:model="unidads_id" class="rounded">
                              <option></option>
                              @foreach ($unidades as $unidad)
                                 <option value="{{$unidad->id}}">{{$unidad->name}}</option>
                              @endforeach
                           </select>
                           @error('unidads_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        @endif
                     </div>
                     <div class="mb-4 mr-2 text-left">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Categoría</label>
                        @if($categoria_productos)
                           <select wire:model="categoriaproductos_id" class="rounded">
                              <option></option>
                              @foreach ($categoria_productos as $categoria)
                                 <option value="{{$categoria->id}}">{{$categoria->name}}</option>
                              @endforeach
                           </select>
                           @error('categoriaproductos_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        @endif
                     </div>
                     <div class="mb-4 mr-2 text-left">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Proveedor</label>
                        @if($proveedores)
                           <select wire:model="proveedor_id" class="rounded">
                              <option></option>
                              @foreach ($proveedores as $proveedor)
                                 <option value="{{$proveedor->id}}">{{$proveedor->name}}</option>
                              @endforeach
                           </select>
                           @error('proveedor_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        @endif
                     </div>
                     <div class="mb-4 mr-2 text-left">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Estado</label>
                        @if($estados)
                           <select wire:model="estados_id" class="rounded">
                              <option></option>
                              @foreach ($estados as $estado)
                                 <option value="{{$estado->id}}">{{$estado->name}}</option>
                              @endforeach
                           </select>
                           @error('estados_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        @endif
                     </div>
                  </div>
                  <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse mr-5">
                     <x-guardar></x-guardar>
                     <x-cerrar></x-cerrar>
                  </div>
            </form>
            </x-producto>
         </div>
      </div>
   </div>
</>