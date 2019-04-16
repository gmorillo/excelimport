<div class="container-fluid bg-primary p-0">
	<h2 class="text-center p-5 text-white">
        Seguimiento Unificado Proyectos / Legalizaciones
    </h2>
</div>
<div class="container">
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
		{{--<div class="p-2 @if(Auth::user()->id == 1) d-block @else d-none @endif">
			<a href="#" data-toggle="modal" data-target="#importCSV" class="btn btn-outline-primary"><i class="fas fa-file-csv"></i> Importar CSV</a>
		</div>--}}
		<div class="p-2">
			<a href="{{route('exportAllData')}}"  class="btn btn-outline-success "><i class="fas fa-file-excel"></i> Exportar</a>
		</div>
		{{--<div class="p-2">
			<nav aria-label="Page navigation example">
				<ul class="pagination">
					{{ $getAlldata->links() }}
				</ul>
			</nav>
		</div>--}}
	</div>
</div>
{{--
<div class="container-fluid mt-2" >
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive ">
				<table class="table table-hover table-responsive " id="table" >
					<thead>
						<tr class="bg-light">
							<th scope="col" class=" filter text-truncate" >Provincia</th>
							<th scope="col" class=" filter">Codigo Nipsa</th>
							<th scope="col" class=" filter">Tarea Proyecto</th>
							<th scope="col" class=" filter">Fecha Encargo</th>
							<th scope="col" class=" filter">Fecha Entrega</th>
							<th scope="col" class=" filter">Titulo Encargo o Proyecto</th>
							<th scope="col" class=" filter">Tecnico Endesa</th>
							<th scope="col" class=" filter">Tipo Trabajo</th>
							<th scope="col" class=" filter">Población</th>
							<th scope="col" class=" filter">Código De Centro  Y/O Traza Nombre De Línea</th>
							<th scope="col" class=" filter">Propiedad</th>
							<th scope="col" class=" filter">Tipo</th>
							<th scope="col" class=" filter">Legal</th>
							<th scope="col" class=" filter">Departamento</th>
							<th scope="col" class=" filter">Solicitud Nnss</th>
							<th scope="col" class=" filter">Trabajo Gom</th>
							<th scope="col" class=" filter">Organismos Implicados</th>
							<th scope="col" class=" filter">Tarea/Lca</th>
							<th scope="col" class=" filter">Fecha Generación</th>
							<th scope="col" class=" filter">Tareas</th>
							<th scope="col" class=" filter">Tramite Gom</th>
							<th scope="col" class=" filter">Expte Industria</th>
							<th scope="col" class=" filter">Pasado A Ejecución EJECUCIÓN</th>
							<th scope="col" class=" filter">Estado Tarea</th>
							<th scope="col" class=" filter">Cfo</th>
							<th scope="col" class=" filter">Apm</th>
							<th scope="col" class=" filter">Resolucion Transmision</th>
							<th scope="col" class=" filter">Motivo Paralizacion Tramitación Y/O No Finalizacion Expte</th>
							<th scope="col" class=" filter">Observaciones</th>
							<th scope="col" class=" filter">Desistimiento</th>
							<th scope="col" class=" filter">Expte Finalizado</th>
							<th scope="col" class=" filter">Fecha Favorable</th>
							<th scope="col" class=" filter">Inicio Ejecucion</th>
							<th scope="col" class=" filter">Estado Tramitacion</th>
						</tr>
					</thead>
					<tbody>
						@foreach($getAlldata as $legalization)
							<tr class="text-uppercase">
								<td class="small text-capitalize text-center " style="padding-right: 50px">{{$legalization->provincia}}</td>
								<td class="small" style="padding-right: 80px;" >{{$legalization->codigo_nipsa}}</td>
								<td class="small  " style="padding-right: 80px">{{$legalization->tarea_proyecto}}</td>
								<td class="small  " style="padding-right: 100px">{{$legalization->fecha_encargo}}</td>
								<td class="small  text-center " style="padding-right: 100px">{{$legalization->fecha_entrega}}</td>
								<td class="small  text-truncate " style="max-width: 450px; cursor: context-menu;" title="{{$legalization->titulo_encargo}}">{{$legalization->titulo_encargo}}</td>
								<td class="small  text-truncate " style="max-width: 450px" > {{$legalization->tecnico_endesa}}</td>
								<td class="small " style="padding-right: 70px" > {{$legalization->tipo_trabajo}}</td>
								<td class="small  " style="padding-right: 70px">{{$legalization->poblacion}}</td>
								<td class="small  " style="padding-right: 300px">{{$legalization->codigo_centro}}</td>
								<td class="small " style="padding-right: 70px">{{$legalization->propiedad}}</td>
								<td class="small  " style="padding-right: 70px">{{$legalization->tipo}}</td>
								<td class="small " style="padding-right: 100px">{{$legalization->legal}}</td>
								<td class="small" style="padding-right: 70px" >{{$legalization->departamento}}</td>
								<td class="small  " style="padding-right: 100px">{{$legalization->solicitud_nnss}}</td>
								<td class="small  text-truncate " style="max-width: 250px">{{$legalization->trabajo_gom}}</td>
								<td class="small  text-center ">{{$legalization->organismos_implicados}}</td>
								<td class="small ">{{$legalization->tarea_lca}}</td>
								<td class="small " style="padding-right: 100px" > {{$legalization->fecha_generacion}}</td>
								<td class="small " style="padding-right: 100px" > {{$legalization->tareas}}</td>
								<td class="small  " style="padding-right: 100px">{{$legalization->tramite_gom}}</td>
								<td class="small  " style="padding-right: 100px">{{$legalization->expte_industria}}</td>
								<td class="small" style="padding-right: 280px">{{$legalization->pasado_ejecucion}}</td>
								<td class="small  " style="padding-right: 100px">{{$legalization->estado_tarea}}</td>
								<td class="small  text-center" style="padding-right: 100px">{{$legalization->cfo}}</td>
								<td class="small text-truncate " style="max-width: 150px; cursor: context-menu;" >{{$legalization->apm}}</td>
								<td class="small  " style="padding-right: 210px">{{$legalization->resolucion_transmision}}</td>
								<td class="small " style="padding-right: 350px">{{$legalization->motivo_paralizacion}}</td>
								<td class="small  text-center text-truncate " style="max-width: 250px; cursor: context-menu;" title="{{$legalization->observaciones}}">{{$legalization->observaciones}}</td>
								<td class="small text-truncate  " style="max-width: 250px; cursor: context-menu;" title="{{$legalization->desistimiento}}">{{$legalization->desistimiento}}</td>
								<td class="small  " style="padding-right: 150px" > {{$legalization->expediente_finalizado}}</td>
								<td class="small " style="padding-right: 150px" > {{$legalization->fecha_favorable}}</td>
								<td class="small  " style="padding-right: 150px">{{$legalization->inicio_ejecucion}}</td>
								<td class="small  " style="padding-right: 100px">{{$legalization->estado_tramitacion}}</td>
								
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<nav aria-label="Page navigation example">
  				<ul class="pagination justify-content-center">
  					{{ $getAlldata->links() }}
  				</ul>
  			</nav>
		</div>
	</div>
</div>--}}

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
        <form action="{{ route('importAllData') }}" method="POST" enctype="multipart/form-data">
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



{{--TABLA LIKE EXCEL--}}


<div class="table-responsive" style="height: auto;">
	<div class="wrapper1">
    <div class="div1">
    </div>
</div>
<div class="wrapper2">
    <div class="div2">
    	<div id="example"></div>
    </div>
</div>
	
</div>

<style>
	.wrapper1, .wrapper2{width: 100%; border: none 0px RED;
overflow-x: scroll; overflow-y:hidden;}
.wrapper1{height: 20px; }
.wrapper2{height: 10800px; }
.div1 {width:7450px; height: 20px; }
.div2 {width:7450px; height: 10800px;
overflow: auto;}
</style>



<script>


		var data = [
		  
		  @foreach($getAlldata as $legalization)
		  ['{{$legalization->provincia}}', 	'{{$legalization->codigo_nipsa}}','{{$legalization->tarea_proyecto}}','{{$legalization->fecha_encargo}}','{{$legalization->fecha_entrega}}','{{$legalization->titulo_encargo}}','{{$legalization->tecnico_endesa}}','{{$legalization->tipo_trabajo}}','{{$legalization->poblacion}}','{{$legalization->codigo_centro}}','{{$legalization->propiedad}}','{{$legalization->tipo}}','{{$legalization->legal}}','{{$legalization->departamento}}','{{$legalization->solicitud_nnss}}','{{$legalization->organismos_implicados}}','{{$legalization->tarea_lca}}','{{$legalization->fecha_generacion}}','{{$legalization->tareas}}','{{$legalization->tramite_gom}}','{{$legalization->expte_industria}}','{{$legalization->pasado_ejecucion}}','{{$legalization->estado_tarea}}','{{$legalization->cfo}}','{{$legalization->apm}}','{{$legalization->motivo_paralizacion}}','{{$legalization->observaciones}}','{{$legalization->desistimiento}}','{{$legalization->expediente_finalizado}}','{{$legalization->fecha_favorable}}','{{$legalization->estado_tramitacion}}'],
		  @endforeach
		  
		];

		var container = document.getElementById('example');

		var hot = new Handsontable(container, {
		  	data: data,
		  	allowHtml: true,
		  	rowHeaders: true,
		  	colHeaders: ['PROVINCIA','CODIGO NIPSA','TAREA PROYECTO','FECHA ENCARGO','FECHA ENTREGA','TITULO ENCARGO','TECNICO ENDESA','TIPO TRABAJO','POBLACION','CODIGO CENTRO','PROPIEDAD','TIPO','LEGAL','DEPARTAMENTO','SOLICITUD NNSS','ORGANISMOS IMPLICADOS','TAREA LCA','FECHA GENERACION', 'TAREAS','TRAMITE GOM','EXPTE INDUSTRIA','PASADO EJECUCION','ESTADO TAREA','CFO','APM','MOTIVO PARALIZACION','OBSERVACIONES','DESISTIMIENTO','EXPEDIENTE FINALIZADO','FECHA FAVORABLE INICIO EJECUCION','ESTADO TRAMITACION'],
		  	
		  	filters: true,
		  	dropdownMenu: [
		  		'filter_by_value',
		  		'filter_action_bar',
		  	],
		   	readOnly: true,
		   	//wordWrap: false,
		   	manualColumnResize: true,
  			manualRowResize: true,
  			contextMenu: true,
		   	colWidths: [
		   		200, 
		   		200, 
		   		200, 
		   		200, 
		   		200, 
		   		280, 
		   		200,
		   		200, 
		   		200, 
		   		200, 
		   		200, 
		   		200,
		   		200, 
		   		200, 
		   		200, 
		   		200, 
		   		200,
		   		200, 
		   		200, 
		   		200, 
		   		200, 
		   		200,
		   		200, 
		   		200, 
		   		200, 
		   		200, 
		   		200,
		   		900, 
		   		200, 
		   		300, 
		   		300, 
		   		200, 
		   	],
		});



		$(function(){
    $(".wrapper1").scroll(function(){
        $(".wrapper2")
            .scrollLeft($(".wrapper1").scrollLeft());
    });
    $(".wrapper2").scroll(function(){
        $(".wrapper1")
            .scrollLeft($(".wrapper2").scrollLeft());
    });
});
</script>