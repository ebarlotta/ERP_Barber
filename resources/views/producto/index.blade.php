	@extends('layouts.adminlte')

	@section('content')

	<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

		<x-producto2>
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
		
		@if ($productos ?? '')
			<div class="flex">
				<div class="h-full w-full">
					<div class="bg-white rounded-b pt-4 pl-4 flex justify-between leading-normal" style="width: 96%;">
						<div class="text-black font-bold text-lg mb-2 leading-tight w-36" style="width:30%;">Productos</div>
						<div class="text-black font-bold text-lg mb-2 leading-tight w-36 text-center" style="width:18%;">Existencia</div>
						<div class="text-black font-bold text-lg mb-2 leading-tight w-36 text-center " style="width:18%;">Stock Mínimo</div>
						<div class="text-black font-bold text-lg mb-2 leading-tight w-36 text-center " style="width:18%;">Estado</div>
						<div class="text-black font-bold text-lg mb-2 leading-tight w-36 text-center " style="width:18%;">Opciones</div>
					</div>


					<div style="display: block">
						@foreach ($productos as $producto)

							 <div class="p-2 shadow-lg" style="background:linear-gradient(90deg, lightblue 20%, white 50%); width:93%; height:100px; display: flex; margin: 1.25rem; border-radius: 10px; height: 100%;">
								  <div style="width:90%;">
										<div style="width:100%; display: flex">
											@if($producto->ruta != 'sin_imagen.jpg') 
												<p class="shadow-md m-1" style="font-size: 18px; background-color: rgb(226, 230, 230); border-radius: 10px; padding: 3px;">
													<img class="block rounded-md flex-none bg-cover" src="{{ asset('images2/'.$producto->ruta) }}" style="width:80px; height: 80px; margin: auto;">	
												</p>
											@else
												<p class="shadow-md m-1" style="font-size: 18px; background-color: rgb(226, 230, 230); border-radius: 10px; padding: 3px;">
													<img class="block rounded-md flex-none bg-cover" src="{{ asset('images/sin_imagen.jpg') }}" style="width:80px; height: 80px; margin: auto;">
												</p>
											@endif
											 <p class="shadow-md m-1" style="width:20%; font-size: 18px; background-color: rgb(226, 230, 230); border-radius: 10px; padding: 3px;">{{ $producto->name }}</p>
											 <p class="shadow-md m-1" style="width:20%; font-size: 18px; background-color: rgb(226, 230, 230); border-radius: 10px; padding: 3px;">Esistencia<br>{{ $producto->existencia }}</p>
											 <p class="shadow-md m-1" style="width:20%; font-size: 18px; background-color: rgb(226, 230, 230); border-radius: 10px; padding: 3px;">Stock Mínimo<br>{{ $producto->stock_minimo }}</p>
											<p class="shadow-md m-1" style="width:20%; font-size: 18px; background-color: rgb(226, 230, 230); border-radius: 10px; padding: 3px;">Estado<br>{{ $producto->EstadoProd }}</p>
										</div>
								  </div>
								  <div style="width:10%;padding: 10px;">
										{{-- <div class="block justify-center" style="width: 20%; margin: auto; justify-content: space-around;align-items: center;"> --}}
												<a href="{{ route('producto.edit', $producto->id)}}">
													<input class="btn btn-warning" type="submit" value="Editar">
												</a>
												<form action='{{ route('producto.destroy',$producto->id)}}' method="post">
													<input class="btn btn-danger mt-1" type="submit" value="Eliminar">
														@method('delete')
														@csrf
												</form>
										{{-- </div> --}}
								  </div>
							 </div>
						@endforeach
				  </div>










					{{-- @foreach ($productos as $producto)
						<ul>
							<li class="border text-left w-full flex" style="height: 100px;">
								
										@if($producto->ruta != 'sin_imagen.jpg') 
											<img class="block rounded-md flex-none bg-cover" src="{{ asset('images2/'.$producto->ruta) }}" style="width:80px; height: 80px; margin: auto;">	
										@else
											<img class="block rounded-md flex-none bg-cover" src="{{ asset('images/sin_imagen.jpg') }}" style="width:80px; height: 80px; margin: auto;">
										@endif
										<div class="bg-white rounded-b pt-1 pl-4 flex justify-between leading-normal w-full personal" style="margin: 0px;height: 90px;margin: auto;">
											<div class="text-black font-bold text-lg mb-2 leading-tight" style="width:25%;">{{ $producto->name }}</div>
											<div class="text-black text-lg mb-2 leading-tight w-1/6 w-auto">{{ $producto->existencia }}</div>
											<div class="text-black text-lg mb-2 leading-tight w-1/6">{{ $producto->stock_minimo }}</div>
											<div class="text-black text-lg mb-2 leading-tight w-1/6"></div>
											<div class="text-black text-lg mb-2 leading-tight w-1/6">{{ $producto->estados_id}}</div>
											<div>
												<div>
													<a href="{{ route('producto.edit', $producto->id)}}">
														<input class="btn btn-default" type="submit" value="Editar">
													</a>
												</div>
												<div>
													<form action='{{ route('producto.destroy',$producto->id)}}' method="post">
														<input class="btn btn-default" type="submit" value="Eliminar">
															@method('delete')
															@csrf
													</form>
												</div>
											</div>
										</div>
							</li>
						</ul>
					@endforeach --}}
					<div class="w-full">{{ $productos->links() }}</div>
			</div>
		</div>
		</x-producto2>
		@else
			<h1>No hay datos</h1>
		@endif
	</div>
	@endsection


