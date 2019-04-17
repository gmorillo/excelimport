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
		<div class="p-2">
			<a href="{{route('exportAllData')}}"  class="btn btn-outline-success "><i class="fas fa-file-excel"></i> Exportar</a>
		</div>
	</div>
</div>


{{--TABLA LIKE EXCEL--}}
<div class="table-responsive" style="height: auto;">
	<div class="wrapper1">
	    <div class="div1">
	    </div>
	</div>
	<div class="wrapper2">
	    <div class="div2">
	    	<div id="tablaProyectosLegalizaciones"></div>
	    </div>
	</div>
</div>

<style>
	.wrapper1, .wrapper2{width: 100%; border: none 0px RED;
overflow-x: scroll; overflow-y:hidden;}
.wrapper1{height: 20px; }
.wrapper2{height: 10800px; }
.div1 {width:7300px; height: 20px; }
.div2 {width:7300px; height: 10800px;
overflow: auto;}
</style>



<script>


		var data = [
		  
		  @foreach($getAlldata as $legalization)
		  [
			  '{{$legalization->provincia}}', //PROVINCIA' 
			  '{{$legalization->codigo_nipsa}}', //CODIGO NIPSA' 
			  '{{$legalization->tarea_proyecto}}', //TAREA PROYECTO' 
			  '{{$legalization->fecha_encargo}}', //FECHA ENCARGO' 
			  '{{$legalization->fecha_entrega}}', //FECHA ENTREGA' 
			  '{{$legalization->titulo_encargo}}', //TITULO ENCARGO' 
			  '{{$legalization->tecnico_endesa}}', //TECNICO ENDESA'
			  '{{$legalization->tipo_trabajo}}', //TIPO TRABAJO' 
			  '{{$legalization->poblacion}}', //POBLACION' 
			  '{{$legalization->codigo_centro}}', //CODIGO CENTRO' 
			  '{{$legalization->propiedad}}', //PROPIEDAD' 
			  '{{$legalization->tipo}}', //TIPO'
			  '{{$legalization->legal}}', //LEGAL' 
			  '{{$legalization->departamento}}', //DEPARTAMENTO' 
			  '{{$legalization->solicitud_nnss}}', //SOLICITUD NNSS' 
			  '{{$legalization->trabajo_gom}}', // TRABAJO GOM
			  '{{$legalization->organismos_implicados}}', //ORGANISMOS IMPLICADOS' 
			  '{{$legalization->tarea_lca}}', //TAREA LCA'
			  '{{$legalization->fecha_generacion}}', //FECHA GENERACION' 
			  '{{$legalization->tramite_gom}}', //TRAMITE GOM' 
			  '{{$legalization->expte_industria}}', //EXPTE INDUSTRIA' 
			  '{{$legalization->pasado_ejecucion}}', //PASADO EJECUCION' 
			  '{{$legalization->estado_tarea}}', //ESTADO TAREA'
			  '{{$legalization->cfo}}', //CFO' 
			  '{{$legalization->apm}}', //APM' 
			  '{{$legalization->motivo_paralizacion}}', //MOTIVO PARALIZACION' 
			  '{{$legalization->observaciones}}', //OBSERVACIONES' 
			  '{{$legalization->desistimiento}}', //DESISTIMIENTO'
			  '{{$legalization->expediente_finalizado}}', //EXPEDIENTE FINALIZADO' 
			  '{{$legalization->fecha_favorable}}', //FECHA FAVORABLE INICIO EJECUCION' 
			  '{{$legalization->estado_tramitacion}}'], //ESTADO TRAMITACION 
		  @endforeach
		  
		];

		var container = document.getElementById('tablaProyectosLegalizaciones');

		var hot = new Handsontable(container, {
		  	data: data,
		  	allowHtml: true,
		  	rowHeaders: true,
		  	colHeaders: [
			  	'PROVINCIA',
			  	'CODIGO NIPSA',
			  	'TAREA PROYECTO',
			  	'FECHA ENCARGO',
			  	'FECHA ENTREGA',
			  	'TITULO ENCARGO',
			  	'TECNICO ENDESA',
			  	'TIPO TRABAJO',
			  	'POBLACION',
			  	'CODIGO CENTRO',
			  	'PROPIEDAD',
			  	'TIPO',
			  	'LEGAL',
			  	'DEPARTAMENTO',
			  	'SOLICITUD NNSS',
			  	'Nº TRABAJO',
			  	'ORGANISMOS IMPLICADOS',
			  	'TAREA LCA',
			  	'FECHA GENERACION',
			  	'TRAMITE GOM',
			  	'EXPTE INDUSTRIA',
			  	'PASADO EJECUCION',
			  	'ESTADO TAREA',
			  	'CFO',
			  	'APM',
			  	'MOTIVO PARALIZACION',
			  	'OBSERVACIONES',
			  	'DESISTIMIENTO',
			  	'EXPEDIENTE FINALIZADO',
			  	'FECHA FAVORABLE INICIO EJECUCION',
			  	'ESTADO TRAMITACION'
		  	],
		  	
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
		   		200, //WIDTH HEADER TABLE  --> PROVINCIA' 
		   		200, //WIDTH HEADER TABLE  --> CODIGO NIPSA' 
		   		200, //WIDTH HEADER TABLE  --> TAREA PROYECTO' 
		   		200, //WIDTH HEADER TABLE  --> FECHA ENCARGO' 
		   		200, //WIDTH HEADER TABLE  --> FECHA ENTREGA' 
		   		480, //WIDTH HEADER TABLE  --> TITULO ENCARGO' 
		   		200, //WIDTH HEADER TABLE  --> TECNICO ENDESA'
		   		200, //WIDTH HEADER TABLE  --> TIPO TRABAJO' 
		   		200, //WIDTH HEADER TABLE  --> POBLACION' 
		   		200, //WIDTH HEADER TABLE  --> CODIGO CENTRO' 
		   		200, //WIDTH HEADER TABLE  --> PROPIEDAD' 
		   		200, //WIDTH HEADER TABLE  --> TIPO'
		   		200, //WIDTH HEADER TABLE  --> LEGAL' 
		   		200, //WIDTH HEADER TABLE  --> DEPARTAMENTO' 
		   		200, //WIDTH HEADER TABLE  --> SOLICITUD NNSS' 
		   		200, //WIDTH HEADER TABLE  --> Nº TRABAJO' 
		   		300, //WIDTH HEADER TABLE  --> ORGANISMOS IMPLICADOS' 
		   		200, //WIDTH HEADER TABLE  --> TAREA LCA'
		   		200, //WIDTH HEADER TABLE  --> FECHA GENERACION' 
		   		200, //WIDTH HEADER TABLE  --> TRAMITE GOM' 
		   		200, //WIDTH HEADER TABLE  --> EXPTE INDUSTRIA' 
		   		200, //WIDTH HEADER TABLE  --> PASADO EJECUCION' 
		   		200, //WIDTH HEADER TABLE  --> ESTADO TAREA'
		   		200, //WIDTH HEADER TABLE  --> CFO' 
		   		200, //WIDTH HEADER TABLE  --> APM' 
		   		200, //WIDTH HEADER TABLE  --> MOTIVO PARALIZACION' 
		   		900, //WIDTH HEADER TABLE  --> OBSERVACIONES' 
		   		200, //WIDTH HEADER TABLE  --> DESISTIMIENTO'
		   		250, //WIDTH HEADER TABLE  --> EXPEDIENTE FINALIZADO' 
		   		300, //WIDTH HEADER TABLE  --> FECHA FAVORABLE INICIO EJECUCION' 
		   		200, //WIDTH HEADER TABLE  --> ESTADO TRAMITACION 
		   	],
		});
</script>
































