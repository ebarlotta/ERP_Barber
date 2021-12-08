@extends('layouts.adminlte')

@section('content')

<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
   <form action="{{route('producto.store')}}" method="post" enctype="multipart/form-data">
      @csrf
      <x-producto2>
      <div class="bg-white px-4 pt-2 pb-2 sm:p-6 sm:pb-4 flex flex-wrap">
         <div class="mb-4 mr-2 text-left">
            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Nombre del Producto</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese Nombre" name="name">
            @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
         </div>
         <div class="mb-4 mr-2 text-left">
            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Descripción</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese Descripción" name="descripcion">
            @error('descripcion') <span class="text-red-500">{{ $message }}</span>@enderror
         </div>
         <div class="mb-4 mr-2 text-left flex">
               <img src="{{ asset('images/sin_imagen.jpg' )}}" width="100px" height="100px">
               <input type="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"	id="ruta" name="ruta" placeholder="Ingrese imágen">										
               @error('ruta') <span class="text-red-500">{{ $message }}</span>@enderror
            {{-- @endif --}}
         </div>

      </div>
      <div class="bg-white px-4 pb-2 sm:p-2 sm:pb-4 flex flex-wrap">
         <div class="mb-4 mr-2 text-left">
            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Precio de compra</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese precio de compra" name="precio_compra">
            @error('precio_compra') <span class="text-red-500">{{ $message }}</span>@enderror
         </div>
         <div class="mb-4 mr-2 text-left">
            <label for="exampleFormControlInput1"
                  class="block text-gray-700 text-sm font-bold mb-2">Existencia</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese existencia" name="existencia">
            @error('existencia') <span class="text-red-500">{{ $message }}</span>@enderror
         </div>
         <div class="mb-4 mr-2 text-left">
            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Stock Mínimo</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese stock_minimo" name="stock_minimo">
            @error('stock_minimo') <span class="text-red-500">{{ $message }}</span>@enderror
         </div>
         <div class="mb-4 mr-2 text-left">
            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Lote</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese lote" name="lote">
            @error('lote') <span class="text-red-500">{{ $message }}</span>@enderror
         </div>
         <div class="mb-4 mr-2 text-left">
            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Unidad</label>
            @if($unidades)
               <select name="unidads_id" class="rounded">
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
               <select name="categoriaproductos_id" class="rounded">
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
               <select name="proveedor_id" class="rounded">
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
               <select name="estados_id" class="rounded">
                  <option></option>
                  @foreach ($estados as $estado)
                     <option value="{{$estado->id}}">{{$estado->name}}</option>
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
      </x-producto2>
   </form>
   
@endsection