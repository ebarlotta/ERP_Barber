@extends('layouts.app2')
<div>
	<x-tituloslim>Comprobantes de Compras</x-tituloslim>
	<div class="content-center flex">
		<div class="bg-white p-2 text-center rounded-lg shadow-lg w-full">
			@if (session()->has('message'))
				<div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
					role="alert">
					<div class="flex">
						<div>
							<p class="text-xm bg-lightgreen">{{ session('message') }}</p>
						</div>
					</div>
				</div>
			@endif
			<!-- Tabs  -->
			<div class="flex flex-wrap" id="tabs-id">
				<div class="w-full">
					<ul class="flex mb-0 list-none flex-wrap pb-4 flex-row">
						<li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
							<a class="text-xs font-bold uppercase px-5 py-1 shadow-lg rounded block leading-normal text-white bg-pink-600"
								wire:click="CambiarTab(1)">
								<i class="fas fa-space-shuttle text-base mr-1"></i> Gestionar Comprobantes
							</a>
						</li>
						<li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
							<a class="text-xs font-bold uppercase px-5 py-1 shadow-lg rounded block leading-normal text-pink-600 bg-white"
								wire:click="CambiarTab(2)">
								<i class="fas fa-cog text-base mr-1"></i> Cuentas Corrientes
							</a>
						</li>
						<li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
							<a class="text-xs font-bold uppercase px-5 py-1 shadow-lg rounded block leading-normal text-pink-600 bg-white"
								wire:click="CambiarTab(3)">
								<i class="fas fa-cog text-base mr-1"></i> Deuda a Proveedores
							</a>
						</li>
						<li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
							<a class="text-xs font-bold uppercase px-5 py-1 shadow-lg rounded block leading-normal text-pink-600 bg-white"
								wire:click="CambiarTab(4)">
								<i class="fas fa-briefcase text-base mr-1"></i> Crédito de Proveedores
							</a>
						</li>
						<li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
							<a class="text-xs font-bold uppercase px-5 py-1 shadow-lg rounded block leading-normal text-pink-600 bg-white"
								wire:click="CambiarTab(5)">
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
										<button class="rounded-md bg-green-300 px-8 py-1 mx-2 mt-3">Agregar</button>
										<button class="rounded-md bg-yellow-300 px-8 py-1 mx-2 mt-3">Modificar</button>
										<button class="rounded-md bg-red-300 px-8 py-1 mx-2 mt-3">Eliminar</button>
									</div>
									<!-- Gestionar Comprobantes -->
									<div class="flex flex-wrap mt-3 text-xs justify-around">
										<div class="w-32 mr-1">
											<label for="">Fecha</label><br>
											<input class="ml-2 w-full text-xs rounded-md h-7" type="date" wire:model="gfecha">
										</div>
										<div class="w-44 mr-1">
											<label for="">Proveedor</label><br>
											<select class="ml-2 w-full text-xs rounded-md h-7" wire:model="gproveedor">
												<option value=" "> </option>
												@foreach ($proveedores as $proveedor)
													<option value="{{ $proveedor->id }}">
														{{ $proveedor->name }}
													</option>
												@endforeach
											</select>
										</div>
										<div class="w-36 mr-1">
											<label for="">Comprobante</label><br>
											<input class="ml-2 w-full text-xs rounded-md h-7" type="text" wire:model="gcomprobante">
										</div>
										<div class="w-32 mr-1">
											<label for="">Participa Iva</label><br>
											<select class="ml-2 w-full text-xs px-1 rounded-md h-7" wire:model="gpartiva">
												<option value=" "> </option>
												<option value=" "> </option>
												<option value="Si">Si</option>
												<option value="No">No</option>
												<option value="Ganancias">Ganancias</option>
												<option value="IB">IB</option>
												<option value="BsPersonal">BsPersonal</option>
											</select>
										</div>
										<div class="w-40 mr-1">
											<label for="">Detalle</label><br>
											<input type="text" class="ml-2 w-full text-xs rounded-md h-7" wire:model="gdetalle">
										</div>
										<div class="w-24 mr-1">
											<label for="">Año</label><br>
											<select class="ml-2 w-full text-xs rounded-md h-7" wire:model="ganio">
												<option>2021</option>
												<option>2020</option>
												<option>2019</option>
												<option>2018</option>
												<option>2017</option>
												<option>2016</option>
												<option>2015</option>
												<option>2014</option>
												<option>2013</option>
												<option>2012</option>
											</select>
										</div>
										<div class="w-24 mr-1">
											<label for="">Mes</label><br>
											<select class="ml-2 w-full text-xs px-1 rounded-md h-7" wire:model="gmes">
												<option value=" "> </option>
												<option value="enero">enero
												</option>
												<option value="febrero">febrero
												</option>
												<option value="marzo">marzo
												</option>
												<option value="abril">abril
												</option>
												<option value="mayo">mayo
												</option>
												<option value="junio">junio
												</option>
												<option value="julio">julio
												</option>
												<option value="agosto">agosto
												</option>
												<option value="setiembre">
													setiembre
												</option>
												<option value="octubre">octubre
												</option>
												<option value="noviembre">
													noviembre
												</option>
												<option value="diciembre">
													diciembre
												</option>
											</select>
										</div>
										<div class="w-32 mr-1">
											<label for="">Areas</label><br>
											<select class="ml-2 w-full text-xs px-1 rounded-md h-7" wire:model="garea">
												<option value=" "> </option>
												@foreach ($areas as $area)
													<option value="{{ $area->id }}">
														{{ $area->name }}
													</option>
												@endforeach
											</select>
										</div>
										<div class="w-32 mr-1">
											<label for="">Cuentas</label><br>
											<select class="ml-2 w-full text-xs px-1 rounded-md h-7" wire:model="gcuenta" >
												<option value=" "> </option>
												@foreach ($cuentas as $cuenta)
													<option value="{{ $cuenta->id }}">
														{{ $cuenta->name }}
													</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="flex flex-wrap text-xs justify-around">
										<div class="mr-1 w-28">
											<label for="">Bruto</label><br>
											<input class="ml-2 w-full text-xs text-right rounded-md h-7" type="text" wire:model="gbruto">
										</div>
										<div class="w-20 mr-1">
											<label for="">IVA</label><br>
											<select class="ml-2 w-full text-xs rounded-md h-7" wire:model="giva">
												<option value=" "> </option>
												@foreach ($ivas as $iva)
													<option value="{{ $iva->id }}">
														{{ $iva->descripcion }}
													</option>
												@endforeach
											</select>
										</div>
										<div class="mr-1 w-28">
											<label for="">Iva</label><br>
											<input class="ml-2 w-full text-xs text-right rounded-md h-7" type="text" wire:model="giva2">
										</div>
										<div class="mr-1 w-28">
											<label for="">Exento</label><br>
											<input class="ml-2 w-full text-xs text-right rounded-md h-7" type="text" wire:model="gexento">
										</div>
										<div class="mr-1 w-28">
											<label for="">Imp.Interno</label><br>
											<input class="ml-2 w-full text-xs text-right rounded-md h-7" type="text" wire:model="gimpinterno">
										</div>
										<div class="mr-1 w-28">
											<label for="">Ret/Perc.Iva</label><br>
											<input class="ml-2 w-full text-xs text-right rounded-md h-7" type="text" wire:model="gperciva">
										</div>
										<div class="mr-1 w-28">
											<label for="">Ret/Perc.IB</label><br>
											<input class="ml-2 w-full text-xs text-right rounded-md h-7" type="text" wire:model="gpergan">
										</div>
										<div class="mr-1 w-28">
											<label for="">RetGan</label><br>
											<input class="ml-2 w-full text-xs text-right rounded-md h-7" type="text" wire:model="gretgan">
										</div>
										<div class="mr-1 w-28">
											<label for="">Neto</label><br>
											<input class="ml-2 w-full text-xs text-right rounded-md h-7" type="text" wire:model="gneto">
										</div>
										<div class="mr-1 w-28">
											<label for="">Monto Pagado</label><br>
											<input class="ml-2 w-full text-xs text-right rounded-md h-7" type="text" wire:model="gmontopagado">
										</div>
										<div class="mr-1 w-28">
											<label for="">Cantidad</label><br>
											<input class="ml-2 w-full text-xs text-right rounded-md h-7" type="text" wire:model="gcantidad">
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
													<select class=" text-xs rounded-md h-7 py-0" wire:model="gfmes" wire:change="gfiltro()">
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
													<select class=" text-xs rounded-md h-7 py-0" wire:model="gfproveedor" wire:change="gfiltro()">
														<option value=""></option>
														@foreach ($proveedores as $proveedor)
															<option value="{{ $proveedor->id }}">
																{{ $proveedor->name }}</option>
														@endforeach
													</select>

												</td>
												<td class="border border-green-600">
													<select class=" text-xs rounded-md h-7 py-0" wire:model="gfparticipa" wire:change="gfiltro()">
														<option value=""></option>
														<option value="Si">Si</option>
														<option value="No">No</option>
														<option value="Ganancias">Ganancias</option>
														<option value="BsPers">Bs. Pers.</option>
													</select>
												</td>
												<td class="border border-green-600">
													<select class=" text-xs rounded-md h-7 py-0" wire:model="gfiva" wire:change="gfiltro()">
														<option value=""></option>
														@foreach ($ivas as $iva)
															<option value="{{ $iva->id }}">
																{{ $iva->descripcion }}</option>
														@endforeach

													</select>
												</td>
												<td class="border border-green-600">
													<select class=" text-xs rounded-md h-7 py-0" wire:model="gfdetalle" wire:change="gfiltro()">
														<option value=""></option>
													</select>
												</td>
												<td class="border border-green-600">
													<select class=" text-xs rounded-md h-7 py-0" wire:model="gfarea" wire:change="gfiltro()">
														<option value=""></option>
														@foreach ($areas as $area)
															<option value="{{ $area->id }}">{{ $area->name }}
															</option>
														@endforeach
													</select>
												</td>
												<td class="border border-green-600">
													<select class=" text-xs rounded-md h-7 py-0" wire:model="gfcuenta" wire:change="gfiltro()">
														<option value=""></option>
														@foreach ($cuentas as $cuenta)
															<option value="{{ $cuenta->id }}">{{ $cuenta->name }}
															</option>
														@endforeach
													</select>
												</td>
												<td class="border border-green-600">
													<select class=" text-xs rounded-md h-7 py-0" wire:model="gfanio" wire:change="gfiltro()">
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
								<p>
									Completely synergize resource taxing relationships via
									premier niche markets. Professionallaaaaaaay cultivate one-to-one
									customer service with robust ideas.
									<br />
									<br />
									Dynamically innovate resource-leveling customer service for
									state of the art customer service.
								</p>
							</div>
							<div class="{{ $tabActivo != 3 ? 'hidden' : '' }}">
								<p>
									Completely synergize resource taxing relationships via
									premier nichdsadsade markets. Professionally cultivate one-to-one
									customer service with robust ideas.
									<br />
									<br />
									Dynamically innovate resource-leveling dsacustomer service for
									state of the art customer service.
								</p>
							</div>
							<div class="{{ $tabActivo != 4 ? 'hidden' : '' }}">
								<p>
									Efficiently unleash cross-media information without
									cross-media value. dsadsadsaQuickly maximize timely deliverables for
									real-time schemas.
									<br />
									<br />
									Dramatically maintain clicks-and-mortar solutions
									without functional solutions.
								</p>
							</div>
							<div class="{{ $tabActivo != 5 ? 'hidden' : '' }}">
								<p>
									Efficiently unleash cross-media information without
									cross-me. dsadsadsaQuickly maximize timely deliverables for
									real-time schemas.
									<br />
									<br />
									Dramatically maintain clicks-and-mortar solutions
									without functional solutions.
								</p>
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
