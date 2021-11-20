
<div>
   @extends('layouts.adminlte')
	<x-titulo>Gestión de Productos</x-titulo>
	<x-slot name="header">
		<div class="flex">
			<!-- //Comienza en submenu de encabezado -->

			<!-- Navigation Links -->
			{{-- @livewire('submenu') --}}
		</div>
   </x-slot>
	

	<!--<div class="content-center flex">
		<div class="bg-white p-2 text-center rounded-lg shadow-lg w-full">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
				</div> -->
				{{-- @if ($productos ?? '') --}}
				<div class="flex">
					<div class="h-full w-full">
						<div class="bg-white rounded-b pt-4 pl-4 flex justify-between leading-normal w-full">
							<div class="text-black font-bold text-lg mb-2 leading-tight w-36" style="width:35%;">Productos</div>
							<div class="text-black font-bold text-lg mb-2 leading-tight w-36 text-right">Existencia</div>
							<div class="text-black font-bold text-lg mb-2 leading-tight w-36 text-right">Stock Mínimo</div>
							<div class="text-black font-bold text-lg mb-2 leading-tight w-36 text-right">Estado</div>
							<div class="text-black font-bold text-lg mb-2 leading-tight w-36 text-right">Opciones</div>
						</div>
                  {{-- {{$productos. "esta"}} --}}
                  {{-- {{$unidades}} --}}
						@foreach ($productos as $producto)
							<ul>
								<li class="border text-left">
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
												<div class="text-black text-lg mb-2 leading-tight w-1/6">
                                          <div>
                                             <a href="{{route('producto.edit', $producto->id)}}">
                                                <input class="btn btn-default" type="submit" value="Editar">
                                             </a>
                                          </div>
                                          <div>
                                          <form action='{{ url('producto/'.$producto->id)}}' method="post">
                                             <input class="btn btn-default" type="submit" value="Eliminar">
                                             @method('delete')
                                             @csrf
                                          </form>
                                       </div>
                                    </div>
											</div>
										</div>
									</div>
								</li>
							</ul>
						@endforeach
					</div>
				</div>
				{{-- @else
					<h1>No hay datos</h1>
				@endif --}}
			</div>
		</div>
	</div>

</div>
