
<div class="container my-3">
	<div class="d-flex justify-content-end"">
	  <div>{{$getEstudiosTecnicos->links() }}</div>
	</div>
</div>
@foreach($getEstudiosTecnicos as  $estudiosTecnicos)
	<div class="container">
		<div class="row dashborad-box py-3">
			<div class="my-2">
				<h3>Seguimiento de Estudios Técnicos {{$loop->iteration}}/{{$estudiosTecnicos->id}}/{{$countMw}}</h3>
				<div class="bg-danger text-white badge-pill p-2 px-2">Indentificador: 
					<strong>
						@foreach($getIdentifiers as $identifier)
                			@if($identifier->id == $estudiosTecnicos->identifier_id)
                				<td class="text-capitalize">{{$identifier->number}}</td>
                			@else
                			@endif
                		@endforeach
					</strong>
				</div>
				<div class="bg-warning text-dark p-2 px-4 small mt-3">{{$estudiosTecnicos->description}}</div>
			</div>
		</div>
		
		@if($estudiosTecnicos->work_id != NULL)
			@foreach($getMegawork as $key => $gmw)
				@if($estudiosTecnicos->id == $gmw->tracking_id)
					<form action="{{route('createSeguimientoEstudio')}}" method="POST" autocomplete="off">
						@csrf
						<input type="hidden" class="form-control" id="work_id_estudio_tecnico" name="work_id_estudio_tecnico" value="{{$estudiosTecnicos->work_id}}">
						<input type="hidden" class="form-control" id="tracking_id_estudio_tecnico" name="tracking_id_estudio_tecnico" value="{{$estudiosTecnicos->id}}">
						<div class="row dashborad-box">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="row">
									<label for="nipsa_technician_id_estudio_tecnico" class="col-sm-3 col-form-label">Técnico Nipsa</label>
									<div class="col-sm-8">
										<select id="nipsa_technician_id_estudio_tecnico" name="nipsa_technician_id_estudio_tecnico" class="form-control  selectpicker" data-live-search="true" >
								        	<option value="">Seleccionar</option>
									        @foreach($getTechniciansNip as $gt)
												<optgroup class="py-0 text-capitalize" label="
													@foreach($getCompanies as $gc)
														@if($gt->company_id == $gc->id)
															{{$gc->name}}
														@endif
													@endforeach
												">
													<option value="{{$gt->id}}" selected="selected">{{$gt->name}}</option>f
					                            </optgroup>
					                        @endforeach
								     	 </select>
									</div>
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="row">
									<label for="other_technician_id_estudio_tecnico" class="col-sm-4 col-form-label">Técnico EDE/IBDE</label>
									<div class="col-sm-8">
										<select id="other_technician_id_estudio_tecnico" name="other_technician_id_estudio_tecnico" class="form-control  selectpicker" data-live-search="true" >
								        	<option value="">Seleccionar</option>
									        @foreach($getTechniciansNoNip as $gtnn)
												<optgroup class="py-0 text-capitalize" label="
													@foreach($getCompanies as $gc)
														@if($gtnn->company_id == $gc->id)
															{{$gc->name}}
														@endif
													@endforeach
												">
													<option value="{{$gtnn->id}}" selected="selected">{{$gtnn->name}}</option>
					                            </optgroup>
					                        @endforeach
								     	 </select>
									</div>
								</div>
							</div>
						</div>
						<div class="row dashborad-box">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<h4 class="pt-2 text-info">Último estado registrado</h4>
								<hr>
								<div class="form-group row">
									<label for="estado_actual_id_estudio_tecnico" class="col-sm-3 col-form-label">Estado actual</label>
									<div class="col-sm-8">
										<select required id="estado_actual_id_estudio_tecnico" name="estado_actual_id_estudio_tecnico" class="form-control " data-live-search="true" >
								        	<option value="">Seleccionar</option>
										        @foreach($getMegaworkStatus as $gms)
						                            <option value="{{$gms->id}}" >{{$gms->name}}</option>
						                        @endforeach
								     	 </select>
									</div>
								</div>
								<div class="form-group">
							    	<label for="fecha_registro_actual_informe_estudio_tecnico">Fecha de registro o actual</label>
								    <input type="text" class="form-control datepicker-here" data-language='es' id="fecha_registro_actual_estudio_tecnico" name="fecha_registro_actual_estudio_tecnico" value="{{$gmw->status_date}}">
							  	</div>
							  	<a href="#" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-info w-100 text-white"><i class="fas fa-history"></i> Ver historial de estados</a>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<h4 class="pt-2">&nbsp;</h4>
								<hr>
								<div class="form-group">
								    <label for="comentarios_estudio_tecnico">Comentarios</label>
								    <textarea class="form-control" id="comentarios_estudio_tecnico" name="comentarios_estudio_tecnico" rows="7" >{{$gmw->description}}</textarea>
							  	</div>
							</div>
						</div>
						<div class="row dashborad-box">
							<div class="p-2 col-12">
								<div class="row">
									<div class="col-6">
										<div class="form-group">
										    <label for="dias_parada_estudio_tecnico">Días parada</label>
										    <input type="number" class="form-control" id="dias_parada_estudio_tecnico" name="dias_parada_estudio_tecnico"  value="{{$gmw->stop_days}}">
									  	</div>
									</div>
									<div class="col-6">
										<div class="form-group">
										    <label for="plazo_estudio_tecnico">Plazo</label>
										    <input type="number" class="form-control" id="plazo_estudio_tecnico" name="plazo_estudio_tecnico" value="{{$gmw->limit_days}}">
									  	</div>
									</div>
								</div>
								<div class="col-12 p-0">
									<div class="form-row mt-2">
									    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
									      	<label for="fecha_encargo_estudio_tecnico">Fecha de encargo</label>
									      	<div class="input-group mb-2">
										        <div class="input-group-prepend">
										          	<div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
										        </div>
										        <input type="text" class="form-control datepicker-here" data-language='es' id="fecha_encargo_estudio_tecnico" name="fecha_encargo_estudio_tecnico"  value="{{$gmw->custom_date}}">
									      	</div>
									    </div>
									    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
									      	<label for="fecha_tope_estudio_tecnico">Fecha tope</label>
									      	<div class="input-group mb-2">
										        <div class="input-group-prepend">
										          	<div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
										        </div>
										        <input type="text" class="form-control datepicker-here" data-language='es' id="fecha_tope_estudio_tecnico" name="fecha_tope_estudio_tecnico" value="{{$gmw->limit_date}}">
									      	</div>
									    </div>
									    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
									      	<label for="fecha_entrega_estudio_tecnico">Fecha de entrega</label>
									      	<div class="input-group mb-2">
										        <div class="input-group-prepend">
										          	<div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
										        </div>
										        <input type="text" class="form-control datepicker-here" data-language='es' id="fecha_entrega_estudio_tecnico" name="fecha_entrega_estudio_tecnico"  value="{{$gmw->delivery_date}}">
									      	</div>
									    </div>
									    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
									      	<label for="fecha_dxf_estudio_tecnico">Fecha DXF</label>
									      	<div class="input-group mb-2">
										        <div class="input-group-prepend">
										          	<div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
										        </div>
										        <input type="text" class="form-control datepicker-here" data-language='es' id="fecha_dxf_estudio_tecnico" name="fecha_dxf_estudio_tecnico" value="{{$gmw->dxf_date}}">
									      	</div>
									    </div>
									    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
									      	<label for="fecha_planos_estudio_tecnico">Fecha planos</label>
									      	<div class="input-group mb-2">
										        <div class="input-group-prepend">
										          	<div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
										        </div>
										        <input type="text" class="form-control datepicker-here" data-language='es' id="fecha_planos_estudio_tecnico" name="fecha_planos_estudio_tecnico" value="{{$gmw->blueprints_date}}">
									      	</div>
									    </div>
									    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
									      	<label>&nbsp;</label>
									      	<a href="#" data-toggle="modal" data-target=".estado-economico" class="btn btn-info w-100 text-white"><i class="fas fa-chart-line"></i> Ver estado económico</a>
									    </div>
								  </div>
								</div>
							</div>
						</div>
						<div class="row justify-content-center my-3">
					  		<button class="btn btn-success btn-lg" type="submit">Guardar informe técnico</button>
					  	</div>
					</form>
				@endif
			@endforeach
		@else
		@endif
		<div class=" row dashborad-box mt-5">
			<div class="my-1 col-12">
				<h4 class="float-left my-2 text-info">Trabajos asociados</h4>
				<a href="#" data-toggle="modal" data-target=".nueva-posicion" class="btn btn-success float-right my-2 text-white"> <i class="fas fa-plus"></i> Crear nueva posición</a>
			</div>
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th scope="col">Recursos</th>
							<th scope="col">Descripción</th>
							<th scope="col">Estado Nipsa</th>
							<th scope="col">Pedido</th>
							<th scope="col">Estado pedido</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">Lorem ipsum dolor.</th>
							<td>21/02/2019</td>
							<td>Lorem ipsum dolor sit amet</td>
							<td>Lorem ipsum dolor.</td>
							<td>Lorem ipsum dolor.</td>
							<td>
								<a href="#" class="text-danger" style="text-decoration: none;" title="Eliminar trabajo asociado" data-toggle="modal" data-target="#exampleModal">
									<i class="far fa-trash-alt"></i>
								</a>&nbsp;&nbsp;
								<a href="#" class="text-info" style="text-decoration: none;" data-toggle="modal" data-target=".ver_info_informe" title="Ver detalle económico de trabajo asociado">
									<i class="fas fa-eye "></i>
								</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endforeach



<div class="container my-3">
	<div class="d-flex justify-content-end"">
	  <div>{{$getEstudiosTecnicos->links() }}</div>
	</div>
</div>

	<!-- Historial de estados MODAL -->
	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"> 
		<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Histórico de estados según actividad</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th scope="col">Estado</th>
									<th scope="col">Fecha</th>
									<th scope="col">Comentario</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th scope="row">Lorem ipsum dolor.</th>
									<td>21/02/2019</td>
									<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste, corporis.</td>
								</tr>
								<tr>
									<th scope="row">Lorem ipsum dolor.</th>
									<td>21/02/2019</td>
									<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste, corporis.</td>
								</tr>
								<tr>
									<th scope="row">Lorem ipsum dolor.</th>
									<td>21/02/2019</td>
									<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste, corporis.</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
				</div>
			</div>
		</div>
	</div>

	<!-- ESTADO ECONÓMICO  MODAL-->
	<div class="modal fade estado-economico" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"> 
		<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Estado económico</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th scope="col">Estados</th>
									<th scope="col">Fecha</th>
									<th scope="col">Comentario</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th scope="row">Lorem ipsum dolor.</th>
									<td>21/02/2019</td>
									<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste, corporis.</td>
								</tr>
								<tr>
									<th scope="row">Lorem ipsum dolor.</th>
									<td>21/02/2019</td>
									<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste, corporis.</td>
								</tr>
								<tr>
									<th scope="row">Lorem ipsum dolor.</th>
									<td>21/02/2019</td>
									<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste, corporis.</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Nueva posición de facturación MODAL -->
	<div class="modal fade nueva-posicion" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"> 
		<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">
						Nueva posición de facturación <br><br>
						<span class="bg-danger text-white badge-pill p-2 px-4">Indentificador: <strong>0000000000</strong></span>
						<span class="bg-warning text-dark badge-pill p-2 px-4">Tipo de trabajo: Estudio Técnico</span>
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="route" method="POST">
						<div class="form-group row">
							<label for="status_orders_id" class="col-sm-2 col-form-label">Pedido</label>
							<div class="col-sm-8">
								<select required id="status_orders_id" name="status_orders_id" class="form-control selectpicker" data-live-search="true">
						        	<option value="">Seleccionar Pedido</option>
							        @foreach($getOrders as $gOder)
			                            <option value="{{$gOder->id}}" >
			                            	{{$gOder->number}} &nbsp;&nbsp;&bull;&nbsp;&nbsp;
			                            	@foreach($getTechnicians as $technician)
				                            	@if( $gOder->technician_id == $technician->id)
				                            		{{$technician->name}} &nbsp;&nbsp;&bull;&nbsp;&nbsp;
				                            	@endif
				                             @endforeach
				                             @foreach($getOrderstatus as $ostatus)
				                             	@if( $gOder->orderstatus_id == $ostatus->id)
				                            		{{$ostatus->status}}
				                            	@endif
				                            
				                             @endforeach
			                            </option>
			                        @endforeach
						     	 </select>
							</div>
						</div>
						<div class="form-group row">
							<label for="item_pedido_informe" class="col-sm-2 col-form-label">Item pedido</label>
							<div class="col-sm-10">
								<select class="custom-select mr-sm-2" id="item_pedido_informe" name="item_pedido_informe">
						        	<option selected>Choose...</option>
						        	<option value="1">One</option>
						        	<option value="2">Two</option>
						        	<option value="3">Three</option>
						      	</select>
						    </div>
						</div>
						<div class="form-group row">
							<label for="item_pedido_informe_desc" class="col-sm-2 col-form-label">&nbsp;</label>
							<div class="col-sm-10">
								<select class="custom-select mr-sm-2" id="item_pedido_informe_desc" name="item_pedido_informe_desc">
						        	<option selected>Choose...</option>
						        	<option value="1">One</option>
						        	<option value="2">Two</option>
						        	<option value="3">Three</option>
						      	</select>
						    </div>
						</div>
						<div class="form-group row">
							<label for="other_data_zone_id" class="col-sm-2 col-form-label">Zona</label>
							<div class="col-sm-8">
								<select id="other_data_zone_id" name="other_data_zone_id" class="form-control selectpicker" data-live-search="true">
						        	<option value="">Seleccionar</option>
							        @foreach($getZones as $gZones)
			                            <option value="{{$gZones->id}}" >{{$gZones->name}} - {{$gZones->k}}</option>
			                        @endforeach
						     	 </select>
							</div>
						</div>
						<div class="form-group row">
							<label for="other_data_zone_id" class="col-sm-2 col-form-label">Contrato</label>
							<div class="col-sm-8">
								<select id="other_data_zone_id" name="other_data_zone_id" class="form-control selectpicker" data-live-search="true">
						        	<option value="">Seleccionar</option>
							        @foreach($getYears as $year)
							        	@if($year->year != null)
			                            	<option value="{{$year->k}}" >{{$year->year}}</option>
			                            @endif
			                        @endforeach
						     	 </select>
							</div>
						</div>
						<div class="form-group row">
							<label for="other_data_zone_id" class="col-sm-2 col-form-label">K</label>
							<div class="col-sm-8">
								<select id="other_data_zone_id" name="other_data_zone_id" class="form-control selectpicker" data-live-search="true">
						        	<option value="">Seleccionar</option>
							        @foreach($getYears as $year)
							        	@if($year->year != null)
			                            	<option value="{{$year->k}}" >{{$year->k}}</option>
			                            @endif
			                        @endforeach
						     	 </select>
							</div>
						</div>
						<div class="form-group row">
							<label for="estado_actividad_informe" class="col-sm-2 col-form-label">Estado actividad</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="estado_actividad_informe" name="estado_actividad_informe" disabled="disabled">
							</div>
						</div>
						<div class="table-responsive dashborad-box mt-5">
							<table class="table ">
								<thead>
									<tr>
										<th scope="col">Cantidad</th>
										<th scope="col">Tipo UD</th>
										<th scope="col">Base</th>
										<th scope="col">K</th>
										<th scope="col">Precio</th>
										<th scope="col">Total</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th scope="row"><input type="number" class="form-control" id="unidades_informe" name="unidades_informe"></th>
										<td>21/02/2019</td>
										<td>Lorem ipsum dolor</td>
										<td>Lorem ipsum dolor.</td>
										<td>Lorem ipsum dolor.</td>
										<td>Lorem ipsum dolor.</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="row justify-content-center my-3">
					  		<button class="btn btn-success btn-lg" type="submit">Agregar posición de facturación</button>
					  	</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Detalle económico de trabajos MODAL -->
	<div class="modal fade ver_info_informe" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"> 
		<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">
						<div class="mb-2">Detalle económico de trabajos <span class="bg-danger text-white badge-pill p-2 px-4">Indentificador: <strong>0000000000</strong></span></div>
						
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="">
						<div class="form-group row">
							<label for="nro_pedido_informe" class="col-sm-2 col-form-label">Pedido</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="nro_pedido_informe" name="nro_pedido_informe" disabled="disabled">
							</div>
						</div>
						<div class="form-group row">
							<label for="estado_pedido_informe" class="col-sm-2 col-form-label">Estado de pedido</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="estado_pedido_informe" name="estado_pedido_informe" disabled="disabled">
							</div>
						</div>
						<div class="form-group row">
							<label for="item_pedido_informe" class="col-sm-2 col-form-label">Item pedido</label>
							<div class="col-sm-10">
								<select class="custom-select mr-sm-2" id="item_pedido_informe" name="item_pedido_informe" disabled="disabled">
						        	<option selected>Choose...</option>
						        	<option value="1">One</option>
						        	<option value="2">Two</option>
						        	<option value="3">Three</option>
						      	</select>
						    </div>
						</div>
						<div class="form-group row">
							<label for="item_pedido_informe_desc" class="col-sm-2 col-form-label">&nbsp;</label>
							<div class="col-sm-10">
								<select class="custom-select mr-sm-2" id="item_pedido_informe_desc" name="item_pedido_informe_desc" disabled="disabled">
						        	<option selected>Choose...</option>
						        	<option value="1">One</option>
						        	<option value="2">Two</option>
						        	<option value="3">Three</option>
						      	</select>
						    </div>
						</div>
						<div class="form-group row">
							<label for="zona_informe" class="col-sm-2 col-form-label">Zona</label>
							<div class="col-sm-10">
								<select class="custom-select mr-sm-2" id="zona_informe" name="zona_informe" disabled="disabled">
						        	<option selected>Choose...</option>
						        	<option value="1">One</option>
						        	<option value="2">Two</option>
						        	<option value="3">Three</option>
						      	</select>
						    </div>
						</div>
						<div class="form-group row">
							<label for="anio_contrato_informe" class="col-sm-2 col-form-label">Contrato</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="anio_contrato_informe" name="anio_contrato_informe" disabled="disabled">
							</div>
						</div>
						<div class="form-group row">
							<label for="estado_actividad_informe" class="col-sm-2 col-form-label">Estado actividad</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="estado_actividad_informe" name="estado_actividad_informe" disabled="disabled">
							</div>
						</div>
						<div class="table-responsive dashborad-box mt-5">
							<table class="table ">
								<thead>
									<tr>
										<th scope="col">Cantidad</th>
										<th scope="col">Tipo UD</th>
										<th scope="col">Base</th>
										<th scope="col">K</th>
										<th scope="col">Precio</th>
										<th scope="col">Total</th>
										<th scope="col" title="Fecha certificación gestor">F. Cert. Gestor</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th scope="row">60</th>
										<td>UD/KM</td>
										<td>100 &euro;</td>
										<td>0,71</td>
										<td>235 &euro;</td>
										<td>5000 &euro;</td>
										<td>21/02/2019</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="table-responsive dashborad-box mt-5">
							<table class="table ">
								<thead>
									<tr>
										<th scope="col">Avance</th>
										<th scope="col">Cartera</th>
										<th scope="col">Prod. en curso</th>
										<th scope="col">Facturación</th>
										<th scope="col">Fecha de factura</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th scope="row">20%</th>
										<td>5000 &euro;</td>
										<td>20 &euro;</td>
										<td>20 &euro;</td>
										<td>21/02/2019</td>
									</tr>
								</tbody>
							</table>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Borrar Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">¿Desea eliminar el registro seleccionado?</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
	        <a href="#" type="button" class="btn btn-primary">Eliminar</a>
	      </div>
	    </div>
	  </div>
	</div>


