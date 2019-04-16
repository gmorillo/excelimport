<div class="container">
	<div class="row dashborad-box py-3">
		<div class="my-2 col-xl-9 col-lg-9 col-md-12 col-sm-12 col-xs-12">
			<h3>Seguimiento de Proyectos</h3>
			<div class="bg-danger text-white badge-pill p-2 px-4  w-50">Indentificador: <strong>0000000000</strong></div>
			<div class="bg-warning text-dark badge-pill p-2 px-4 mt-2 w-50">Descripción</div>
		</div>
		<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12">
			<div class="text-center bg-primary text-white badge-pill p-2 px-4">Proyecto general</div>
			<div class="text-center bg-primary text-white badge-pill p-2 px-4 mt-2">Aplica legal</div>
			<div class="text-center bg-primary text-white badge-pill p-2 px-4 mt-2">Fecha legal: 18/03/2019</div>
		</div>
	</div>
	<div class="row dashborad-box py-3">
		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<div class="form-group ">
				<label class=" col-form-label" for="fecha_encargo_proyecto">Fecha de encargo</label>
		      	<div class="input-group mb-2">
			        <div class="input-group-prepend">
			          	<div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
			        </div>
			        <input type="text" class="form-control datepicker-here" data-language='es' id="fecha_encargo_proyecto" >
		      	</div>
			</div>
		</div>
		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<div class="form-group ">
				<label class=" col-form-label" for="fecha_entrega_proyecto">Fecha de entrega</label>
		      	<div class="input-group mb-2">
			        <div class="input-group-prepend">
			          	<div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
			        </div>
			        <input type="text" class="form-control datepicker-here" data-language='es' id="fecha_entrega_proyecto" >
		      	</div>
			</div>
		</div>
	</div>
	<form autocomplete="off">
		<div class="row dashborad-box">
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="form-group ">
					<label for="tecnico_nipsa_proyecto" class=" col-form-label">Técnico Nipsa</label>
					<select class="custom-select mr-sm-2" id="tecnico_nipsa_proyecto" name="tecnico_nipsa_proyecto">
			        	<option selected>Choose...</option>
			        	<option value="1">One</option>
			        	<option value="2">Two</option>
			        	<option value="3">Three</option>
			      	</select>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="form-group ">
					<div class="form-group">
				    	<label class=" col-form-label" for="nro_expediente_proyecto">Nº de expediente</label>
					    <input type="text" class="form-control" id="nro_expediente_proyecto">
				  	</div>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="form-group ">
					<label class=" col-form-label" for="fecha_entrega_visado_proyecto">Entrega para visado</label>
			      	<div class="input-group mb-2">
				        <div class="input-group-prepend">
				          	<div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
				        </div>
				        <input type="text" class="form-control datepicker-here" data-language='es' id="fecha_entrega_visado_proyecto" >
			      	</div>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="form-group ">
				  	<label class=" col-form-label" for="nro_visado_proyecto">Nº de visado</label>
			      	<input type="text" class="form-control " data-language='es' id="nro_visado_proyecto">
				</div>
			</div>
		</div>
		<div class="row dashborad-box">
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="form-group ">
					<label class=" col-form-label" for="fecha_encargo_delineacion_proyecto">Fecha de encargo delineación</label>
			      	<div class="input-group mb-2">
				        <div class="input-group-prepend">
				          	<div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
				        </div>
				        <input type="text" class="form-control datepicker-here" data-language='es' id="fecha_encargo_delineacion_proyecto" >
			      	</div>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="form-group ">
					<label class=" col-form-label" for="fecha_entrega_delineacion_proyecto">Entrega de entrega delineación</label>
			      	<div class="input-group mb-2">
				        <div class="input-group-prepend">
				          	<div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
				        </div>
				        <input type="text" class="form-control datepicker-here" data-language='es' id="fecha_entrega_delineacion_proyecto" >
			      	</div>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="form-group ">
					<label class=" col-form-label" for="fecha_entrega_revision_proyecto">Fecha de entrega revisión</label>
			      	<div class="input-group mb-2">
				        <div class="input-group-prepend">
				          	<div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
				        </div>
				        <input type="text" class="form-control datepicker-here" data-language='es' id="fecha_entrega_revision_proyecto" >
			      	</div>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="form-group ">
					<label class=" col-form-label" for="fecha_ok_proyecto">Fecha OK</label>
			      	<div class="input-group mb-2">
				        <div class="input-group-prepend">
				          	<div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
				        </div>
				        <input type="text" class="form-control datepicker-here" data-language='es' id="fecha_ok_proyecto" >
			      	</div>
				</div>
			</div>
		</div>
		<div class="row dashborad-box">
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<h4 class="pt-2 text-info">Último estado registrado</h4>
				<hr>
				<div class="form-group ">
					<label for="estado_actual_informe" class=" col-form-label">Estado Actual</label>
					<select class="custom-select mr-sm-2" id="estado_actual_informe" name="estado_actual_informe">
			        	<option selected>Choose...</option>
			        	<option value="1">One</option>
			        	<option value="2">Two</option>
			        	<option value="3">Three</option>
			      	</select>
				</div>
				<div class="form-group">
			    	<label for="fecha_registro_actual_informe">Fecha de registro de estado actual</label>
				    <input type="text" class="form-control datepicker-here" data-language='es' id="fecha_registro_actual_informe">
			  	</div>
			  	<a href="#" data-toggle="modal" data-target=".historial_estados_proyectos" class="btn btn-info w-100 text-white"><i class="fas fa-history"></i> Ver historial de estados</a>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<h4 class="pt-2">&nbsp;</h4>
				<hr>
				<div class="form-group">
				    <label for="comentarios_informe">Comentarios</label>
				    <textarea class="form-control" id="comentarios_informe" name="comentarios_informe" rows="7"></textarea>
			  	</div>
			</div>
		</div>
	</form>
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

<!-- Historial de estados MODAL -->
	<div class="modal fade historial_estados_proyectos" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"> 
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
<!-- FIN -->

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
<!-- FIN -->