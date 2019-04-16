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

		<div class="p-2">
			<a href="{{route('exportLegalization')}}"  class="btn btn-outline-success "><i class="fas fa-file-excel"></i> Exportar</a>
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
	    	<div id="TablaLegalizaciones"></div>
	    </div>
	</div>
</div>

<style>
	.wrapper1, .wrapper2{width: 100%; border: none 0px RED;overflow-x: scroll; overflow-y:hidden;}
	.wrapper1{height: 20px; }
	.wrapper2{height: 10800px; }
	.div1 {width:4880px; height: 20px; }
	.div2 {width:4880px; height: 10800px;
	overflow: auto;}
</style>


<script>

		var data = [
		  
		  @foreach($getLegalizations as $legalization)
		  [
		  '@if($legalization->identificador_ede != null && $legalization->trabajo_gom != null){{$legalization->identificador_ede}} {{$legalization->trabajo_gom}}@elseif($legalization->trabajo_gom === null){{$legalization->identificador_ede}}@elseif($legalization->identificador_ede === null){{$legalization->trabajo_gom}}@endif', //SOLICITUD NNSS
		   '{{$legalization->identificador_ingenieria}}', //CODIGO NIPSA
		   '{{$legalization->organismos_implicados}}', //ORGANISMOS IMPLICADOS
		   '{{$legalization->tarea_tramitacion}}', //TAREA/LCA
		   '{{$legalization->fecha_generacion_tareas}}', //FECHA GENERACIÓN TAREAS
		   '{{$legalization->tramite_gom}}', //Trámite GOM
		   '{{$legalization->expediente_industria}}', //EXPTE. INDUSTRIA
		   '{{$legalization->pasado_ejecucion}}', //PASADO A EJECUCIÓN
		   '{{$legalization->estado_tarea}}', //ESTADO TAREA
		   '{{$legalization->cfo}}', //CFO
		   '{{$legalization->apm_resolucion_transmision}}', //APM RESOLUCIÓN TRANSMISIÓN
		   '{{$legalization->motivo_paralizacion}}', //MOTIVO PARALIZACIÓN TRAMITACIÓN Y/O NO FINALIZACIÓN EXPTE
		   '{{$legalization->comentarios}}', //COMENTARIOS
		   '{{$legalization->desistimiento}}', //DESISTIMIENTO
		   '{{$legalization->expediente_finalizado}}', //EXPTE. FINALIZADO
		   '{{$legalization->fecha_favorable_inicio_ejecucion}}', //FECHA FAVORABLE INICIO EJECUCIÓN
		   '{{$legalization->estado_tramitacion}}'], //ESTADO TRAMITACIÓ
		  @endforeach
		  
		];

		var container = document.getElementById('TablaLegalizaciones');

		var hot = new Handsontable(container, {
			licenseKey: 'non-commercial-and-evaluation',
		  	data: data,
		  	allowHtml: true,
		  	rowHeaders: true,
		  	colHeaders: [
		  		'SOLICITUD NNSS',
		  		'CODIGO NIPSA',
		  		'ORGANISMOS IMPLICADOS',
		  		'TAREA/LCA',
		  		'FECHA GENERACIÓN TAREAS',
		  		'Trámite GOM',
		  		'EXPTE. INDUSTRIA',
		  		'PASADO A EJECUCIÓN',
		  		'ESTADO TAREA',
		  		'CFO',
		  		'APM RESOLUCIÓN TRANSMISIÓN',
		  		'MOTIVO PARALIZACIÓN TRAMITACIÓN Y/O NO FINALIZACIÓN EXPTE',
		  		'COMENTARIOS',
		  		'DESISTIMIENTO',
		  		'EXPTE. FINALIZADO',
		  		'FECHA FAVORABLE INICIO EJECUCIÓN',
		  		'ESTADO TRAMITACIÓN'
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
		   		200, // WIDTH HEADER TABLE --> SOLICITUD NNSS 
		   		200, // WIDTH HEADER TABLE --> CODIGO NIPSA 
		   		300, // WIDTH HEADER TABLE --> ORGANISMOS IMPLICADOS 
		   		200, // WIDTH HEADER TABLE --> TAREA/LCA 
		   		300, // WIDTH HEADER TABLE --> FECHA GENERACIÓN TAREAS 
		   		180, // WIDTH HEADER TABLE --> Trámite GOM 
		   		200, // WIDTH HEADER TABLE --> EXPTE. INDUSTRIA
		   		200, // WIDTH HEADER TABLE --> PASADO A EJECUCIÓN 
		   		200, // WIDTH HEADER TABLE --> ESTADO TAREA
		   		150, // WIDTH HEADER TABLE --> CFO 
		   		300, // WIDTH HEADER TABLE --> APM RESOLUCIÓN TRANSMISIÓN 
		   		550, // WIDTH HEADER TABLE --> MOTIVO PARALIZACIÓN TRAMITACIÓN Y/O NO FINALIZACIÓN EXPTE 
		   		700, // WIDTH HEADER TABLE --> COMENTARIOS 
		   		300, // WIDTH HEADER TABLE --> DESISTIMIENTO 
		   		280, // WIDTH HEADER TABLE --> EXPTE. FINALIZADO 
		   		350, // WIDTH HEADER TABLE --> FECHA FAVORABLE INICIO EJECUCIÓN
		   		200, // WIDTH HEADER TABLE --> ESTADO TRAMITACIÓ
		   	],
		});
</script>



















