@extends('layouts.adminlte')

@section('content')

<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
   
   <x-producto2>
      <form action="{{route('producto.update',$producto)}}" method="POST" enctype="multipart/form-data" class="p-2 shadow-lg" style="background:linear-gradient(90deg, lightblue 20%, white 50%); width:93%; margin: 1.25rem; border-radius: 10px;">
         @csrf
         @method('PUT')
         {{-- <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4"> --}}
            {{-- @if (session()->has('message'))
               <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                  <div class="flex">
                     <div>
                        <p class="text-xm bg-lightgreen">{{ session('message') }}</p>
                     </div>
                  </div>
               </div>
            @endif --}}
         {{-- </div> --}}
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
                  <img src="{{ asset('images2/'.$producto->ruta) }}" style="width: 70px; height:70px; border-radius: 7px;">
                  <input type="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"	id="ruta" name="ruta" placeholder="Ingrese imágen" src="{{ asset('images2/'.$producto->ruta) }}">
                  @error('ruta') <span class="text-red-500">{{ $message }}</span>@enderror
               @else
                  <img src="{{ asset('images/sin_imagen.jpg' )}}" style="width:70px; height:70px; border-radius: 7px;">
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
               <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Cod. Barra</label>
               <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese código de barra" name="barra" value="{{ $producto->barra }}">
               @error('barra') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>
            <div class="mb-4 mr-2 text-left">
               <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Cód. QR</label>
               <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese código qr" name="qr" value="{{ $producto->qr }}">
               @error('qr') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>
            <div class="mb-4 mr-2 text-left">
               <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Cód. barra del Proveedor</label>
               <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese código de barra del proveedor" name="barra_proveedor" value="{{ $producto->barra_proveedor }}">
               @error('barra_proveedor') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>

            <div class="mb-4 mr-2 text-left">
               <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Descuento</label>
               <select name="descuento" class="rounded">
                  <option></option>
                  {{-- @foreach ($descuentos as $descuento) --}}
                     @if(0 == $producto->descuento)
                        <option selected="selected" value="0">0% o más</option>
                     @else
                        <option value="0">0% o más</option>
                     @endif
                     @if(5 == $producto->descuento)
                        <option selected="selected" value="5">5% o más</option>
                     @else
                        <option value="5">5% o más</option>
                     @endif
                     @if(10 == $producto->descuento)
                        <option selected="selected" value="10">10% o más</option>
                     @else
                        <option value="10">10% o más</option>
                     @endif
                     @if(20 == $producto->descuento)
                        <option selected="selected" value="20">20% o más</option>
                     @else
                        <option value="20">20% o más</option>
                     @endif
                     @if(30 == $producto->descuento)
                        <option selected="selected" value="30">30% o más</option>
                     @else
                        <option value="30">30% o más</option>
                     @endif
                     @if(40 == $producto->descuento)
                        <option selected="selected" value="40">40% o más</option>
                     @else
                        <option value="40">40% o más</option>
                     @endif
                     @if(50 == $producto->descuento)
                        <option selected="selected" value="50">50% o más</option>
                     @else
                        <option value="50">50% o más</option>
                     @endif
                  {{-- @endforeach --}}
               </select>
               @error('descuento') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>
            <div class="mb-4 mr-2 text-left">
               <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Descuento Especial</label>
               <select name="descuento_especial" class="rounded">
                     @if($producto->descuento_especial)
                        <option selected="selected" value="1">Si</option>
                        <option value="0">No</option>
                     @else
                        <option value="1">Si</option>
                        <option selected="selected" value="0">No</option>
                     @endif
               </select>
               {{-- <input type="checkbox" placeholder="Ingrese Descuento especial" name="descuento_especial" value="{{ $producto->descuento_especial }}" @if($producto->descuento_especial) checked @endif> --}}
               @error('descuento_especial') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>
            <div class="mb-4 mr-2 text-left">
               <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Precio de Venta</label>
               <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese precio de venta" name="precio_venta" value="{{ $producto->precio_venta }}">
               @error('precio_venta') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>

            <div class="mb-4 mr-2 text-left">
               <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Unidad</label>
               @if($unidades)
                  <select name="unidads_id" class="rounded" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
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
                  <select name="estados_id" class="rounded">
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
      </form>
   </x-producto2>
   @endsection
</div>
