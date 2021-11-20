@extends('layouts.adminlte')

<div>
<form action="{{route('producto.update',$producto->id)}}" method="put" enctype="multipart/form-data">
   {{-- enctype="multipart/form-data" --}}
   @csrf
	<div class="content-center flex">
		<div class="bg-white p-2 text-center rounded-lg shadow-lg w-full">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            {{-- @if ($productos) --}}
				<div class="flex">
					<div class="h-full w-full">
						<div class="bg-white rounded-b pt-4 pl-4 flex justify-between leading-normal w-full">
							<div class="text-black font-bold text-lg mb-2 leading-tight w-36" style="width:35%;">Productos</div>
							<div class="text-black font-bold text-lg mb-2 leading-tight w-36 text-right">Existencia</div>
							<div class="text-black font-bold text-lg mb-2 leading-tight w-36 text-right">Stock Mínimo</div>
							<div class="text-black font-bold text-lg mb-2 leading-tight w-36 text-right">Estado</div>
						</div>
						{{-- @foreach ($productos as $producto) --}}
							<ul>
								<li class="border text-left" wire:click="edit({{ $producto->id }})">
									<div class="w-full">
										<div class="flex rounded overflow-hidden border">
											@if($producto->ruta != 'sin_imagen.jpg') 
												<img class="block rounded-md flex-none bg-cover" src="{{ asset($producto->ruta) }}" style="width:80px; height: 80px;">	
											@else
												<img class="block rounded-md flex-none bg-cover" src="{{ asset('images/sin_imagen.jpg') }}" style="width:80px; height: 80px;">
											@endif
											<div class="bg-white rounded-b pt-4 pl-4 flex justify-between leading-normal w-full">
												<div class="text-black font-bold text-lg mb-2 leading-tight" style="width:25%;">{{ $producto->name }}</div>
												<div class="text-black text-lg mb-2 leading-tight w-1/6 w-auto">{{ $producto->existencia }}</div>
												<div class="text-black text-lg mb-2 leading-tight w-1/6">{{ $producto->stock_minimo }}</div>
												<div class="text-black text-lg mb-2 leading-tight w-1/6">{{ $producto->estados_id}}</div>
											</div>
										</div>
									</div>
								</li>
							</ul>
						{{-- @endforeach --}}
						{{-- <div class="w-full">{{ $productos->links() }}</div> --}}
					</div>
				</div>
				{{-- @else
					<h1>No hay datos</h1>
				@endif --}}


         </div>
      </div>
   </div>
</form>
</div>
