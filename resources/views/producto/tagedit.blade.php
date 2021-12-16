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
		</div>
		
		
			<div class="h-full w-full flex">
				
				<div class="w-1/2">
					<div class="max-w-sm rounded overflow-hidden shadow-lg justify-center">
						@if($producto->ruta != 'sin_imagen.jpg')
						<img class="w-full mt-4 ml-4" src="{{ asset('images2/' . $producto->ruta )}}" alt="Sunset in the mountains" style="width:200px; height:200px;">
						@else
						<img class="w-full mt-4 ml-4" src="{{ asset('images/sin_imagen.jpg' )}}" alt="Sunset in the mountains" style="width:200px; height:200px;">
						@endif
						<div class="px-6 py-4">
							<div class="font-bold text-xl mb-2">{{ $producto->name }}</div>
							<p class="text-gray-700 text-base">
								{{ $producto->descripcion }}
							</p>
						</div>
						<div class="px-6 pt-4 pb-2">
							@if(count($tagsactivos))
								@foreach ($tagsactivos as $tagactivo)
									<span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $tagactivo->name}}
									</span>
								@endforeach
							@endif
						</div>
					</div>
				</div>
				<div class="w-1/2">
					<div class="max-w-sm rounded overflow-hidden shadow-lg justify-around max-w-sm" >
						<div class="px-6 py-4 align-middle">
							<div class="font-bold text-xl mb-2">Agregados</div>
							@if(count($tagsactivos))
								@foreach ($tagsactivos as $tagactivo)
								<a href="{{ route('producto.deltag',['product_id'=>$producto->id,'tag_id'=>$tagactivo->tag_id]) }}">
									<span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
										{{ $tagactivo->name}}
									</span>
								</a>
								@endforeach
							@else
								<p class="text-gray-700 text-base">
									Todavía no hay ninguna etiqueta agregada al producto
								</p>
							@endif
						</div>
						<div class="px-6 pt-4 pb-2 align-middle">
							<div class="font-bold text-xl mb-2">Disponibles</div>
							@foreach ($tags as $tag)
								<a href="{{ route('producto.addtag',['product_id'=>$producto->id,'tag_id'=>$tag->id]) }}">
									<span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
										{{ $tag->name}}
									</span>
								</a>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		
	</x-producto2>
	
	@endsection

</div>


