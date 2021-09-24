@extends('layouts.app2')
<div>
	<x-tituloslim>Comprobantes de Compras</x-tituloslim>
	<div class="content-center flex">
		<div class="bg-white p-2 text-center rounded-lg shadow-lg w-full">
			
			<!-- Tabs  -->
			<div class="flex flex-wrap" id="tabs-id">
				<div class="w-full">
					<ul class="flex mb-0 list-none flex-wrap pb-4 flex-row">
						<li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
							@if($tabActivo==1)
								<a class="text-xs font-bold uppercase px-5 py-1 shadow-lg rounded block leading-normal text-white bg-pink-600" wire:click="CambiarTab(1)">
							@else 
								<a class="text-xs font-bold uppercase px-5 py-1 shadow-lg rounded block leading-normal text-pink-600 bg-white" wire:click="CambiarTab(1)">
							@endif
								<i class="fas fa-space-shuttle text-base mr-1"></i> Gestionar Comprobantes
							</a>
						</li>
						<li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
							@if($tabActivo==2)
								<a class="text-xs font-bold uppercase px-5 py-1 shadow-lg rounded block leading-normal text-white bg-pink-600" wire:click="CambiarTab(2)">
							@else 
								<a class="text-xs font-bold uppercase px-5 py-1 shadow-lg rounded block leading-normal text-pink-600 bg-white" wire:click="CambiarTab(2)">
							@endif
								<i class="fas fa-cog text-base mr-1"></i> Deuda a Proveedores
							</a>
						</li>
						<li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
							@if($tabActivo==3)
								<a class="text-xs font-bold uppercase px-5 py-1 shadow-lg rounded block leading-normal text-white bg-pink-600" wire:click="CambiarTab(3)">
							@else 
								<a class="text-xs font-bold uppercase px-5 py-1 shadow-lg rounded block leading-normal text-pink-600 bg-white" wire:click="CambiarTab(3)">
							@endif
								<i class="fas fa-briefcase text-base mr-1"></i> Crédito de Proveedores
							</a>
						</li>
						<li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
							@if($tabActivo==4)
								<a class="text-xs font-bold uppercase px-5 py-1 shadow-lg rounded block leading-normal text-white bg-pink-600" wire:click="CambiarTab(4)">
							@else 
								<a class="text-xs font-bold uppercase px-5 py-1 shadow-lg rounded block leading-normal text-pink-600 bg-white" wire:click="CambiarTab(4)">
							@endif
								<i class="fas fa-cog text-base mr-1"></i> Cuentas Corrientes
							</a>
						</li>
						<li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
							@if($tabActivo==5)
								<a class="text-xs font-bold uppercase px-5 py-1 shadow-lg rounded block leading-normal text-white bg-pink-600" wire:click="CambiarTab(5)">
							@else 
								<a class="text-xs font-bold uppercase px-5 py-1 shadow-lg rounded block leading-normal text-pink-600 bg-white" wire:click="CambiarTab(5)">
							@endif
								<i class="fas fa-briefcase text-base mr-1"></i> Libros de Iva
							</a>
						</li>
					</ul>
					<div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
						<div class="tab-content tab-space">
							<div class="{{ $tabActivo != 1 ? 'hidden' : '' }}">
								<div style="background-color: #E3F6CE" class="block">
									<!-- Botones -->
									<div class="flex justify-center">
										<button class="rounded-md bg-green-300 px-6 mx-2 py-1 mt-3" wire:click="store">Agregar</button>
										<button class="rounded-md bg-yellow-300 px-6 py-1 mx-2 mt-3" wire:click="openModalModify">Modificar</button>
										<button class="rounded-md bg-red-300 px-6 py-1 mx-2 mt-3" wire:click="openModalDelete">Eliminar</button>
										<div class="absolute right-0">
											@if (session()->has('message'))
												<div class="bg-green-300 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-2 shadow-lg my-2"
													role="alert">
													<div class="flex">
														<div>
															<p class="text-xm bg-lightgreen">{{ session('message') }}</p>
														</div>
													</div>
												</div>
											@endif
											@if (session()->has('message2'))
												<div class="bg-yellow-300 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-2 shadow-lg my-2"
													role="alert">
													<div class="flex">
														<div>
															<p class="text-xm bg-lightgreen">{{ session('message2') }}</p>
														</div>
													</div>
												</div>
											@endif
											@if (session()->has('message3'))
												<div class="bg-red-300 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-2 shadow-lg my-2"
													role="alert">
													<div class="flex">
														<div>
															<p class="text-xm bg-lightgreen">{{ session('message3') }}</p>
														</div>
													</div>
												</div>
											@endif
										</div>
									</div>
									<!-- Modals -->
									@if ($this->ModalDelete)
										<div class="inset-0 fixed">
											<div class="absolute flex justify-center w-full mt-10 p-18">
												<div class=" bg-gray-400 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-2 shadow-lg my-2" role="dialog">
													<div class=" bg-gray-400 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
														Los datos van a ser eliminados, seguro que quiere continuar con la operación?
												</div>
													<div class="flex justify-end">
														<!-- Botón de Eliminar-->
														<button class="rounded-md border m-6 px-4 py-2 bg-red-300 text-base leading-6 font-bold text-gray-900 shadow-sm hover:bg-red-400 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5" wire:click="delete()">Eliminar</button>
														<!-- Botón de Cerrar -->
														<button class="rounded-md border m-6 px-4 py-2 bg-yellow-300 text-base leading-6 font-bold text-gray-900 shadow-sm hover:bg-yellow-400 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5" wire:click="closeModalDelete()">Cerrar</button>
													</div>
												</div>
											</div>
										</div>
									@endif

									@if ($this->ModalModify)
										<div class="inset-0 fixed">
											<div class="absolute flex justify-center w-full mt-10 p-18">
												<div class=" bg-gray-400 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-2 shadow-lg my-2" role="dialog">
													<div class=" bg-gray-400 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
														Los datos van a ser modificados, seguro que quiere continuar con la operación?
												</div>
													<div class="flex justify-end">
														<!-- Botón de Eliminar-->
														<button class="rounded-md border m-6 px-4 py-2 bg-red-300 text-base leading-6 font-bold text-gray-900 shadow-sm hover:bg-red-400 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5" wire:click="edit()">Modificar</button>
														<!-- Botón de Cerrar -->
														<button class="rounded-md border m-6 px-4 py-2 bg-yellow-300 text-base leading-6 font-bold text-gray-900 shadow-sm hover:bg-yellow-400 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5" wire:click="closeModalModify()">Cerrar</button>
													</div>
												</div>
											</div>
										</div>
									@endif
									<!-- Gestionar Comprobantes -->
									<div class="flex flex-wrap mt-3 text-xs justify-around">
										<div class="w-32 mr-1">
											<label for="">Fecha</label><br>
											<input class="ml-2 w-full text-xs rounded-md h-7" type="date" wire:model="gfecha">
											@error('gfecha') <span class="text-red-500">{{ $message }}</span>@enderror
										</div>
										<div class="w-44 mr-1">
											<label for="">Proveedor</label><br>
											<select class="ml-2 w-full text-xs rounded-md h-7 leading-none" wire:model="gproveedor">
												<option value=" "> </option>
												@foreach ($proveedores as $proveedor)
													<option value="{{ $proveedor->id }}">
														{{ $proveedor->name }}
													</option>
												@endforeach
											</select>
											@error('gproveedor') <span class="text-red-500">{{ $message }}</span>@enderror
										</div>
										<div class="w-36 mr-1">
											<label for="">Comprobante</label><br>
											<input class="ml-2 w-full text-xs rounded-md h-7" type="text" wire:model="gcomprobante">
										</div>
										<div class="w-32 mr-1">
											<label for="">Participa Iva</label><br>
											<select class="ml-2 w-full text-xs px-1 rounded-md h-7 leading-none" wire:model="gpartiva">
												<option value=""></option>
												<option value="Si">Si</option>
												<option value="No">No</option>
												<option value="Ganancias">Ganancias</option>
												<option value="IB">IB</option>
												<option value="BsPersonal">BsPersonal</option>
											</select>
											@error('gpartiva') <span class="text-red-500">{{ $message }}</span>@enderror
										</div>
										<div class="w-40 mr-1">
											<label for="">Detalle</label><br>
											<input type="text" class="ml-2 w-full text-xs rounded-md h-7" wire:model="gdetalle">
										</div>
										<div class="w-24 mr-1">
											<label for="">Año</label><br>
											<select class="ml-2 w-full text-xs rounded-md h-7 leading-none" wire:model="ganio">
												<option value=""></option>
												<option value="2021">2021</option>
												<option value="2020">2020</option>
												<option value="2019">2019</option>
												<option value="2018">2018</option>
												<option value="2017">2017</option>
												<option value="2016">2016</option>
												<option value="2015">2015</option>
												<option value="2014">2014</option>
												<option value="2013">2013</option>
												<option value="2012">2012</option>
											</select>
											@error('ganio') <span class="text-red-500">{{ $message }}</span>@enderror
										</div>
										<div class="w-24 mr-1">
											<label for="">Mes</label><br>
											<select class="ml-2 w-full text-xs px-1 rounded-md h-7 leading-none" wire:model="gmes">
												<option value=""></option>
												<option value="1">enero
												</option>
												<option value="2">febrero
												</option>
												<option value="3">marzo
												</option>
												<option value="4">abril
												</option>
												<option value="5">mayo
												</option>
												<option value="6">junio
												</option>
												<option value="7">julio
												</option>
												<option value="8">agosto
												</option>
												<option value="9">
													setiembre
												</option>
												<option value="10">octubre
												</option>
												<option value="11">
													noviembre
												</option>
												<option value="12">
													diciembre
												</option>
											</select>
											@error('gmes') <span class="text-red-500">{{ $message }}</span>@enderror
										</div>
										<div class="w-32 mr-1">
											<label for="">Areas</label><br>
											<select class="ml-2 w-full text-xs px-1 rounded-md h-7 leading-none" wire:model="garea">
												<option value=" "> </option>
												@foreach ($areas as $area)
													<option value="{{ $area->id }}">
														{{ $area->name }}
													</option>
												@endforeach
											</select>
											@error('garea') <span class="text-red-500">{{ $message }}</span>@enderror
										</div>
										<div class="w-32 mr-1">
											<label for="">Cuentas</label><br>
											<select class="ml-2 w-full text-xs px-1 rounded-md h-7 leading-none" wire:model="gcuenta" >
												<option value=" "> </option>
												@foreach ($cuentas as $cuenta)
													<option value="{{ $cuenta->id }}">
														{{ $cuenta->name }}
													</option>
												@endforeach
											</select>
											@error('gcuenta') <span class="text-red-500">{{ $message }}</span>@enderror
										</div>
									{{-- </div>
									<div class="flex flex-wrap text-xs justify-around"> --}}
										<div class="mr-1 w-28">
											<label for="">Bruto</label><br>
											<input class="num ml-2 w-full text-xs text-right rounded-md h-7" type="text" id="Bruto" name="Bruto" wire:model="gbruto" wire:keyup="CalcularIva()">
											@error('gbruto') <span class="text-red-500">{{ $message }}</span>@enderror
										</div>
										<div class="w-28 mr-1">
											<label for="">IVA</label><br>
											<select class="ml-2 w-full text-xs rounded-md h-7 leading-none" wire:model="giva" wire:change="CalcularIva()">
												<option value="1" selected>Iva 0%</option>
												@foreach ($ivas as $iva)
													<option value="{{ $iva->id }}">
														{{ $iva->descripcion }}
													</option>
												@endforeach
											</select>
											@error('giva') <span class="text-red-500">{{ $message }}</span>@enderror
										</div>
										<div class="mr-1 w-24">
											<label for="">Iva</label><br>
											<input class="ml-2 w-full text-xs text-right rounded-md h-7 leading-none" disabled type="text" wire:model="giva2">
											@error('giva2') <span class="text-red-500">{{ $message }}</span>@enderror
										</div>
										<div class="mr-1 w-28">
											<label for="">Exento</label><br>
											<input class="num ml-2 w-full text-xs text-right rounded-md h-7 leading-none" type="text" wire:model="gexento" wire:keyup="CalcularNeto()">
											@error('gexento') <span class="text-red-500">{{ $message }}</span>@enderror
										</div>
										<div class="mr-1 w-24">
											<label for="">Imp.Interno</label><br>
											<input class="num ml-2 w-full text-xs text-right rounded-md h-7" type="text" wire:model="gimpinterno" wire:keyup="CalcularNeto()">
											@error('gimpinterno') <span class="text-red-500">{{ $message }}</span>@enderror
										</div>
										<div class="mr-1 w-28">
											<label for="">Ret/Perc.Iva</label><br>
											<input class="num ml-2 w-full text-xs text-right rounded-md h-7" type="text" wire:model="gperciva" wire:keyup="CalcularNeto()">
											@error('gperciva') <span class="text-red-500">{{ $message }}</span>@enderror
										</div>
										<div class="mr-1 w-28">
											<label for="">Ret/Perc.IB</label><br>
											<input class="num ml-2 w-full text-xs text-right rounded-md h-7" type="text" wire:model="gperib" wire:keyup="CalcularNeto()">
											@error('gperib') <span class="text-red-500">{{ $message }}</span>@enderror
										</div>
										<div class="mr-1 w-28">
											<label for="">RetGan</label><br>
											<input class="num ml-2 w-full text-xs text-right rounded-md h-7" type="text" wire:model="gretgan" wire:keyup="CalcularNeto()">
											@error('gretgan') <span class="text-red-500">{{ $message }}</span>@enderror
										</div>
										<div class="mr-1 w-28">
											<label for="">Neto</label><br>
											<input class="ml-2 w-full text-xs text-right rounded-md h-7" type="text" wire:model="gneto">
											@error('gneto') <span class="text-red-500">{{ $message }}</span>@enderror
										</div>
										<div class="mr-1 w-28">
											<label for="">Monto Pagado</label><br>
											<input class="num ml-2 w-full text-xs text-right rounded-md h-7" type="text" wire:model="gmontopagado">
										</div>
										<div class="mr-1 w-20">
											<label for="">Cantidad</label><br>
											<input class="num ml-2 w-full text-xs text-right rounded-md h-7" type="text" wire:model="gcantidad">
										</div>
									</div>
									<div>
										<table
											class="table-auto w-full border border-green-800 border-collapse mt-3 bg-gray-300 rounded-md text-xs">
											<tr>
												<td colspan="9"><strong>Filtro</strong></td>
											</tr>
											<tr>
												<td class="border border-green-600">Mes</td>
												<td class="border border-green-600">Proveedor</td>
												<td class="border border-green-600">ParticipaIva</td>
												<td class="border border-green-600">Iva</td>
												<td class="border border-green-600">Detalle</td>
												<td class="border border-green-600">Area</td>
												<td class="border border-green-600">Cuenta</td>
												<td class="border border-green-600">Año</td>
												<td class="border border-green-600">Asc. C/Saldo</td>
											</tr>
											<tr>
												<td class="border border-green-600">
													<select class=" text-xs rounded-md h-7 py-0 leading-none" wire:model="gfmes" wire:change="gfiltro()">
														<option value=""></option>
														<option value="1">Enero</option>
														<option value="2">Febrero</option>
														<option value="3">Marzo</option>
														<option value="4">Abril</option>
														<option value="5">Mayo</option>
														<option value="6">Junio</option>
														<option value="7">Julio</option>
														<option value="8">Agosto</option>
														<option value="9">Setiembre</option>
														<option value="10">Octubre</option>
														<option value="11">Noviembre</option>
														<option value="12">Diciembre</option>
													</select>
												</td>
												<td class="border border-green-600">
													<select class=" text-xs rounded-md h-7 py-0 leading-none" wire:model="gfproveedor" wire:change="gfiltro()">
														<option value=""></option>
														@foreach ($proveedores as $proveedor)
															<option value="{{ $proveedor->id }}">
																{{ $proveedor->name }}</option>
														@endforeach
													</select>

												</td>
												<td class="border border-green-600">
													<select class=" text-xs rounded-md h-7 py-0 leading-none" wire:model="gfparticipa" wire:change="gfiltro()">
														<option value=""></option>
														<option value="Si">Si</option>
														<option value="No">No</option>
														<option value="Ganancias">Ganancias</option>
														<option value="BsPers">Bs. Pers.</option>
													</select>
												</td>
												<td class="border border-green-600">
													<select class=" text-xs rounded-md h-7 py-0 leading-none" wire:model="gfiva" wire:change="gfiltro()">
														<option value=""></option>
														@foreach ($ivas as $iva)
															<option value="{{ $iva->id }}">
																{{ $iva->descripcion }}</option>
														@endforeach

													</select>
												</td>
												<td class="border border-green-600">
													<select class=" text-xs rounded-md h-7 py-0 leading-none" wire:model="gfdetalle" wire:change="gfiltro()">
														<option value=""></option>
													</select>
												</td>
												<td class="border border-green-600">
													<select class=" text-xs rounded-md h-7 py-0 leading-none" wire:model="gfarea" wire:change="gfiltro()">
														<option value=""></option>
														@foreach ($areas as $area)
															<option value="{{ $area->id }}">{{ $area->name }}
															</option>
														@endforeach
													</select>
												</td>
												<td class="border border-green-600">
													<select class=" text-xs rounded-md h-7 py-0 leading-none" wire:model="gfcuenta" wire:change="gfiltro()">
														<option value=""></option>
														@foreach ($cuentas as $cuenta)
															<option value="{{ $cuenta->id }}">{{ $cuenta->name }}
															</option>
														@endforeach
													</select>
												</td>
												<td class="border border-green-600">
													<select class=" text-xs rounded-md h-7 py-0 leading-none" wire:model="gfanio" wire:change="gfiltro()">
														<option value="2021">2021</option>
														<option value="2020">2020</option>
														<option value="2019">2019</option>
														<option value="2018">2018</option>
														<option value="2017">2017</option>
														<option value="2016">2016</option>
														<option value="2015">2015</option>
														<option value="2014">2014</option>
														<option value="2013">2013</option>
													</select>
												</td>
												<td class="border border-green-600">
													<input class=" mr-2 rounded-sm py-0" type="checkbox" checked wire:model="fgascendente" wire:change="gfiltro()">
													<input class=" mr-2 rounded-sm py-0" type="checkbox" wire:model="gfsaldo" wire:change="gfiltro()">
												</td>
											</tr>
											<tr>
												{!! $filtro !!}
											</tr>
										</table>
									</div>
								</div>
							</div>
							<div class="{{ $tabActivo != 2 ? 'hidden' : '' }}">
								<div class="block justify-center">
									<div class="mb-4">
									Áreas a incluir 
									<select class="ml-2 text-xs rounded-md h-7 leading-none mr-5" wire:model="darea">
										<option value="0">Todas</option>
										@foreach ($areas as $area)
											<option value="{{ $area->id }}">{{ $area->name }}</option>
										@endforeach
									</select>
									Años a incluir 
									<select class=" text-xs rounded-md h-7 py-0 leading-none" wire:model="danio">
										<option value="0">Todos</option>
										<option value="2021">2021</option>
										<option value="2020">2020</option>
										<option value="2019">2019</option>
										<option value="2018">2018</option>
										<option value="2017">2017</option>
										<option value="2016">2016</option>
										<option value="2015">2015</option>
										<option value="2014">2014</option>
										<option value="2013">2013</option>
									</select>
									</div>
									<div>
										Desde <input class="ml-2 text-xs rounded-md h-7 ml-5" type="date" wire:model="ddesde"> Hasta <input class="ml-2 text-xs rounded-md h-7" type="date" wire:model="dhasta">
									</div>
									<div class="mt-4">
										<button class="rounded-md bg-green-300 px-8 py-1 mx-2 mt-3" wire:click="CalcularDeudaProveedores(0)">Solicitar Listado</button>
										<a class="btn btn-primary" href="{{ URL::to('/pdf/deuda'.'/'.$ddesde.'/'.$dhasta) }}" target="_blank">
											<button class="rounded-md bg-yellow-500 px-8 	py-1 mx-2 mt-3">Generar PDF</button>
										</a>
									</div>
									<div class="flex justify-center w-full">
										@if ($MostrarDeudaProveedores)
											{!! $DeudaProveedoresFiltro !!}
										@endif
									</div>
								</div>
							</div>
							<div class="{{ $tabActivo != 3 ? 'hidden' : '' }}">
								<div class="block justify-center">
									<div class="mb-4">
										Àreas a incluir 
										<select class="ml-2 text-xs rounded-md h-7 leading-none mr-5" wire:model="carea">
											<option value="0">Todas</option>
											@foreach ($areas as $area)
												<option value="{{ $area->id }}">{{ $area->name }}</option>
											@endforeach
										</select>
										Años a incluir 
										<select class=" text-xs rounded-md h-7 py-0 leading-none" wire:model="canio">
											<option value="0">Todos</option>
											<option value="2021">2021</option>
											<option value="2020">2020</option>
											<option value="2019">2019</option>
											<option value="2018">2018</option>
											<option value="2017">2017</option>
											<option value="2016">2016</option>
											<option value="2015">2015</option>
											<option value="2014">2014</option>
											<option value="2013">2013</option>
										</select>
									</div>
									<div>
										Desde <input class="ml-2 text-xs rounded-md h-7 ml-5" type="date" wire:model="cdesde"> Hasta <input class="ml-2 text-xs rounded-md h-7" type="date" wire:model="chasta">
									</div>
									<div>
										<button class="rounded-md bg-green-300 px-8 py-1 mx-2 mt-3" wire:click="CalcularCreditoProveedores()">Solicitar Listado</button>
										<a class="btn btn-primary" href="{{ URL::to('/pdf/credito'.'/'.$cdesde.'/'.$chasta) }}" target="_blank">
											<button class="rounded-md bg-yellow-500 px-8 	py-1 mx-2 mt-3">Generar PDF</button>
										</a>
									</div>
									<div class="flex justify-center w-full">
										@if ($MostrarCreditoProveedores)
											{!! $CreditoProveedoresFiltro !!}
										@endif
									</div>
								</div>
							</div>
							<div class="{{ $tabActivo != 4 ? 'hidden' : '' }}">
								<div class="flex flex-auto justify-center">
									<img src="{{ asset('images/under-construction.jpg') }}" alt="" class="w-36">
								</div>
							</div>
							<div class="{{ $tabActivo != 5 ? 'hidden' : '' }}">
								<div class="flex flex-auto justify-center">
									<div>
										<table>
											<tr>
												<td>
													<label for="">Mes</label><br>
													<select class="mr-4 w-full text-xs px-1 rounded-md h-7 leading-none" wire:model="lmes" wire:change="MostrarLibros()">
														<option value=""></option>
														<option value="1">enero
														</option>
														<option value="2">febrero
														</option>
														<option value="3">marzo
														</option>
														<option value="4">abril
														</option>
														<option value="5">mayo
														</option>
														<option value="6">junio
														</option>
														<option value="7">julio
														</option>
														<option value="8">agosto
														</option>
														<option value="9">
															setiembre
														</option>
														<option value="10">octubre
														</option>
														<option value="11">
															noviembre
														</option>
														<option value="12">
															diciembre
														</option>
													</select>
													<label for="">Año</label><br>
													<select class="mr-4 w-full text-xs rounded-md h-7 leading-none" wire:model="lanio" wire:change="MostrarLibros()">
														<option value=""></option>
														<option value="2021">2021</option>
														<option value="2020">2020</option>
														<option value="2019">2019</option>
														<option value="2018">2018</option>
														<option value="2017">2017</option>
														<option value="2016">2016</option>
														<option value="2015">2015</option>
														<option value="2014">2014</option>
														<option value="2013">2013</option>
														<option value="2012">2012</option>
													</select>
												</td>
												<td>
													<a class="btn btn-primary" href="{{ URL::to('/pdf/ivacompras'.'/'.$lanio.'/'.$lmes) }}" target="_blank">
														<button class="rounded-md bg-green-300 px-8 py-1 ml-4 mt-6">Imprimir Libro</button>
													</a><br>
													<button class="rounded-md bg-yellow-300 px-8 py-1 ml-4 mt-6" wire:click="CerrarLibro">Cerrar Libro</button>
												</td>
											</tr>
										</table>
										<div class="w-full">
											@if ($MostrarLibros)
												{!! $LibroFiltro !!}
											@endif
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<div class="BotonVolver2 form-group col-md-2">
</div>
<footer class="text-center text-xs bg-gray-400 mt-px3 pb-2">
	Desarrollado por: Ing. Enzo Gabriel Barlotta - Información de Contacto<a href="mailto:ebarlotta@yahoo.com.ar">
		ebarlotta@yahoo.com.ar</a>
	&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-info"
		onclick="javascript: window.location.href='../../sistema/menu.php';">&nbsp;&nbsp;&nbsp;Volver&nbsp;&nbsp;&nbsp;</button>
</footer>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="js/jquery.mask.js"></script>
<script src="js/examples.js"></script>