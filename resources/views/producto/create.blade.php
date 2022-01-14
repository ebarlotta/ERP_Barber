@extends('layouts.adminlte')

@section('content')

<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
   <form action="{{route('producto.store')}}" method="post" enctype="multipart/form-data" class="p-2 shadow-lg" style="background:linear-gradient(90deg, lightblue 20%, white 50%); width:93%; margin: 1.25rem; border-radius: 10px;">
      @csrf
      <x-producto2>
      <div class="bg-white px-4 pt-2 pb-2 sm:p-6 sm:pb-4 flex flex-wrap">
         <div class="mb-4 mr-2 text-left">
            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Nombre del Producto</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese Nombre" name="name" value="{{ old('name')}}">
            @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
         </div>
         <div class="mb-4 mr-2 text-left">
            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Descripción</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese Descripción" name="descripcion" value="{{ old('descripcion')}}">
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
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese precio de compra" name="precio_compra" value="{{ old('precio_compra')}}">
            @error('precio_compra') <span class="text-red-500">{{ $message }}</span>@enderror
         </div>
         <div class="mb-4 mr-2 text-left">
            <label for="exampleFormControlInput1"
                  class="block text-gray-700 text-sm font-bold mb-2">Existencia</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese existencia" name="existencia" value="{{ old('existencia')}}">
            @error('existencia') <span class="text-red-500">{{ $message }}</span>@enderror
         </div>
         <div class="mb-4 mr-2 text-left">
            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Stock Mínimo</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese stock_minimo" name="stock_minimo" value="{{ old('stock_minimo')}}">
            @error('stock_minimo') <span class="text-red-500">{{ $message }}</span>@enderror
         </div>
         <div class="mb-4 mr-2 text-left">
            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Lote</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese lote" name="lote" value="{{ old('lote')}}">
            @error('lote') <span class="text-red-500">{{ $message }}</span>@enderror
         </div>
         <div class="mb-4 mr-2 text-left">
            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Cod. Barra</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese código de barra" name="barra" value="{{ old('barra')}}">
            @error('barra') <span class="text-red-500">{{ $message }}</span>@enderror
         </div>
         <div class="mb-4 mr-2 text-left">
            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Cód. QR</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese código qr" name="qr" value="{{ old('qr')}}">
            @error('qr') <span class="text-red-500">{{ $message }}</span>@enderror
         </div>
         <div class="mb-4 mr-2 text-left">
            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Cód. barra del Proveedor</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese código de barra del proveedor" name="barra_proveedor" value="{{ old('barra_proveedor')}}">
            @error('barra_proveedor') <span class="text-red-500">{{ $message }}</span>@enderror
         </div>

         <div class="mb-4 mr-2 text-left">
            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Descuento</label>
            {{-- <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese descuento" name="descuento" value="{{ old('descuento')}}"> --}}

            <select name="descuento" class="rounded">
               <option></option>
               <option value="5">5% o más</option>
               <option value="10">10% o más</option>
               <option value="20">20% o más</option>
               <option value="30">30% o más</option>
               <option value="40">40% o más</option>
               <option value="50">50% o más</option>
            </select>

            @error('descuento') <span class="text-red-500">{{ $message }}</span>@enderror
         </div>
         <div class="mb-4 mr-2 text-left">
            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Descuento Especial</label>
            <input type="checkbox" placeholder="Ingrese Descuento especial" name="descuento_especial" value="{{ old('descuento_especial')}}">
            @error('descuento_especial') <span class="text-red-500">{{ $message }}</span>@enderror
         </div>
         <div class="mb-4 mr-2 text-left">
            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Precio de Venta</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese precio de venta" name="precio_venta" value="{{ old('precio_venta')}}">
            @error('precio_venta') <span class="text-red-500">{{ $message }}</span>@enderror
         </div>

         <div class="mb-4 mr-2 text-left">
            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Unidad</label>
            @if($unidades)
               <select name="unidads_id" class="rounded">
                  <option></option>
                  @foreach ($unidades as $unidad)
                     <option @if (old('unidads_id') == $unidad->id) {{ 'selected' }} @endif value="{{$unidad->id}}">{{$unidad->name}}</option>
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
                     <option @if (old('categoriaproductos_id') == $categoria->id) {{ 'selected' }} @endif value="{{$categoria->id}}">{{$categoria->name}}</option>
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
                     <option @if (old('proveedor_id') == $proveedor->id) {{ 'selected' }} @endif value="{{$proveedor->id}}">{{$proveedor->name}}</option>
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
                     <option @if (old('estados_id') == $estado->id) {{ 'selected' }} @endif value="{{$estado->id}}">{{$estado->name}}</option>
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