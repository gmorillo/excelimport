<div class="container-fluid bg-primary p-0">
	<h2 class="text-center p-5 text-white">
        Datos Expedientes Legalización Proyectos
    </h2>
</div>
<div class="container py-4">
    @if (session('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
          	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	            <span aria-hidden="true">×</span>
	            <span class="sr-only">Close</span>
	        </button>
	        <strong>{{ session('message') }}</strong>
	    </div>
    @endif
 
    @if ( session('error') )
	    <div class="alert alert-danger alert-dismissible" role="alert">
	        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	            <span aria-hidden="true">×</span>
	            <span class="sr-only">Close</span>
	        </button>
	        <strong>{{ session('error') }}</strong>
	    </div>
    @endif
 
    @if (count($errors) > 0)
	    <div class="alert alert-danger">
	      	<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	      	<div>
	       	 	@foreach ($errors->all() as $error)
	        		<p>{{ $error }}</p>
        		@endforeach
	    	</div>
		</div>
	@endif
</div>
 
 <div class="container-fluid">
	<div class="d-flex flex-row-reverse">
		<div class="p-2">
			<a href="{{route('viewGraphicLegalizations')}}" class="btn btn-outline-primary"><i class="fas fa-chart-bar"></i> Ver Gráfico</a>
		</div>
		{{--<div class="p-2 @if(Auth::user()->id == 1) d-block @else d-none @endif">
			<a href="#" data-toggle="modal" data-target="#importCSV" class="btn btn-outline-primary"><i class="fas fa-file-csv"></i> Importar CSV</a>
		</div>--}}
		<div class="p-2">
			<a href="{{route('exportLegalization')}}"  class="btn btn-outline-success "><i class="fas fa-file-excel"></i> Exportar</a>
		</div>
		{{--<div class="p-2">
			<nav aria-label="Page navigation example">
				<ul class="pagination">
					{{ $getLegalizations->links() }}
				</ul>
			</nav>
		</div>--}}
	</div>
</div>

<div class="container-fluid mt-2">
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-hover" id="table">
					<thead>
						<tr>
							<th scope="col" class=" filter text-uppercase small"><strong>SOLICITUD NNSS</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>CODIGO NIPSA</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>ORGANISMOS IMPLICADOS</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>TAREA/LCA</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>FECHA GENERACIÓN TAREAS</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>Trámite GOM</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>Expte. Industria</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>Pasado a ejecución</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>Estado Tarea</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>CFO</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>APM Resolución Transmisión</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>Motivo paralización tramitación <br>y/o No finalización Expte.</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>Comentarios</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>Desistimiento</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>Expte. Finalizado</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>Fecha Favorable inicio ejecución</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>Estado Tramitación</strong></th>
						</tr>
					</thead>
					<tbody>
						@foreach($getLegalizations as $legalization)
							<tr>
								<td class="small" style="padding-right: 90px;">
									@if($legalization->identificador_ede != null && $legalization->trabajo_gom != null)
									{{$legalization->identificador_ede}}-{{$legalization->trabajo_gom}}
									@elseif($legalization->trabajo_gom == null)
									{{$legalization->identificador_ede}}
									@elseif($legalization->identificador_ede == null)
									{{$legalization->trabajo_gom}}
									@endif
								</td>
								<td class="small" style="padding-right: 100px">{{$legalization->identificador_ingenieria}}</td>
								<td class="small" style="padding-right: 130px">{{$legalization->organismos_implicados}}</td>
								<td class="small" style="padding-right: 50px">{{$legalization->tarea_tramitacion}}</td>
								<td class="small" style="padding-right: 200px">{{$legalization->fecha_generacion_tareas}}</td>
								<td class=" small text-center" style="padding-right: 100px">{{$legalization->tramite_gom}}</td>
								<td class="small text-truncate" style="max-width: 100px; cursor: context-menu; padding-right: 200px" title="{{$legalization->expediente_industria}}">{{$legalization->expediente_industria}}</td>
								<td class="small " style="padding-right: 130px">{{$legalization->pasado_ejecucion}}</td>
								<td class="small  text-truncate" style="padding-right: 100px">{{$legalization->estado_tarea}}</td>
								<td class="small  text-center" style="padding-right: 20px">{{$legalization->cfo}}</td>
								<td class="small " style="padding-right: 250px">{{$legalization->apm_resolucion_transmision}}</td>
								<td class="small  text-truncate" style="padding-right: 250px" title="{{$legalization->motivo_paralizacion}}"> {{$legalization->motivo_paralizacion}}</td>
								<td class="small  text-truncate" style="max-width: 350px; cursor: context-menu;" title="{{$legalization->comentarios}}""> {{$legalization->comentarios}}
								</td>
								<td class="small text-truncate  " style="max-width: 250px; cursor: context-menu;" title="{{$legalization->desistimiento}}">{{$legalization->desistimiento}}</td>
								<td class=" small" style="padding-right: 250px">{{$legalization->expediente_finalizado}}</td>
								<td class="small" style="padding-right: 250px">{{$legalization->fecha_favorable_inicio_ejecucion}}</td>
								<td class=" small" style="padding-right: 100px">{{$legalization->estado_tramitacion}}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			{{--<nav aria-label="Page navigation example">
  				<ul class="pagination justify-content-center">
  					{{ $getLegalizations->links() }}
  				</ul>
  			</nav>--}}
		</div>
	</div>
</div>

{{-- Modal 
<div class="modal fade" id="importCSV" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Importar Archivo CSV</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('importLegalizations') }}" method="POST" enctype="multipart/form-data">
	    {{ csrf_field() }}
		<div class="input-group mb-3">
			<div class="custom-file">
				<input type="file" class="custom-file-input" id="file" name="file">
				<label class="custom-file-label" for="inputGroupFile02">Agregar archivo CSV</label>
			</div>
		</div>
	    <input type="submit" class="btn btn-primary btn-lg" style="margin-top: 3%">
	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>--}}



