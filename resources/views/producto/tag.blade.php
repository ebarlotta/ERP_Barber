@extends('layouts.adminlte')

@section('content')

	<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
		
		<x-producto2>
			{{-- <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4"> --}}
				@if (session()->has('message'))
					<div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
						<div class="flex">
							<div>
								<p class="text-xm bg-lightgreen">{{ session('message') }}</p>
							</div>
						</div>
					</div>
				@endif
			{{-- </div> --}}
			@if ($productos ?? '')
				<div class="flex">
					<div class="h-full w-full">
						<div class="bg-white rounded-b pt-4 pl-4 flex justify-between leading-normal" style="width: 96%;">
							<div class="text-black font-bold text-lg mb-2 leading-tight w-36" style="width:35%;">Productos</div>
							<div class="text-black font-bold text-lg mb-2 leading-tight w-36 text-right">Existencia</div>
							<div class="text-black font-bold text-lg mb-2 leading-tight w-36 text-right">Stock Mínimo</div>
							<div class="text-black font-bold text-lg mb-2 leading-tight w-36 text-right">Estado</div>
							<div class="text-black font-bold text-lg mb-2 leading-tight w-36 text-right">Opciones</div>
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
											<p class="shadow-md m-1" style="width:20%; font-size: 18px; background-color: rgb(226, 230, 230); border-radius: 10px; padding: 3px;">Estado<br>{{ $producto->unidad[0]['name'] }}</p>
										</div>
									</div>
									
									<div style="width:10%;padding: 10px;">
										<a href="{{ route('producto.tagedit', $producto)}}">
											<input class="btn btn-warning mr-4" type="submit" value="Editar">
										</a>
									</div>
								</div>
							@endforeach
						</div>
						<div class="w-full">{{ $productos->links() }}</div>
					</div>
				</div>
			@else
				<h1>No hay datos</h1>
			@endif
		</x-producto2>
	@endsection
</div>



