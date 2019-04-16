<div class="container-fluid bg-primary p-0">
	<h2 class="text-center p-5 text-white">
        Réplicas Global
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
			<a href="{{route('getCMGlobalReplicas')}}" class="btn btn-outline-primary"><i class="fas fa-chart-bar"></i> Ver Gráfico</a>
		</div>
		<div class="p-2">
			<a href="{{route('exportReplicasGlobal')}}"  class="btn btn-outline-success "><i class="fas fa-file-excel"></i> Exportar</a>
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
	    	<div id="tablaReplicasGlobal"></div>
	    </div>
	</div>
</div>

<style>
	.wrapper1, .wrapper2{width: 100%; border: none 0px RED;
overflow-x: scroll; overflow-y:hidden;}
.wrapper1{height: 20px; }
.wrapper2{height: 10800px; }
.div1 {width:6750px; height: 20px; }
.div2 {width:6750px; height: 10800px;
overflow: auto;}
</style>


<script>

		var data = [
		  
		  @foreach($getReplicas as $replica)
		  [
			   '{{$replica->tecnico_ede}}', //TÉCNICO EDE
			   '{{$replica->provincia}}', //PROVINCIA
			   '{{$replica->departamento}}', //DEPARTAMENTO
			   '{{$replica->tipo}}', //TIPO
			   '{{$replica->gom}}', //GOM
			   '{{$replica->solicitud}}', //SOLICITUD
			   '{{$replica->descripcion}}', //DESCRIPCION
			   '{{$replica->fecha_encargo}}', //FECHA ENCARGO
			   '{{$replica->ads_odm}}', //ADS/ODM
			   '{{$replica->protocolo_atlante}}', //PROTOCOLO ATLANTE
			   '{{$replica->fecha_diseno_atlante}}', //FECHA DISEÑADO ATLANTE
			   '{{$replica->estado_atlante}}', //ESTADO ATLANTE
			   '{{$replica->fin_atlante}}', //FIN ATLANTE
			   '{{$replica->proyecto_agp}}', //PROYECTO AGP
			   '{{$replica->estado_agp}}', //ESTADO AGP
			   '{{$replica->fin_agp}}', //FIN AGP
			   '{{$replica->finca}}', //FINCA
			   '{{$replica->tiempo_replica}}', //TIEMPO DE REPLICA
			   '{{$replica->lca}}', //LCA
			   '{{$replica->fecha_concluso}}', //FECHA CONCLUSO
			   '{{$replica->ing_estudio}}', //ING ESTUDIO
			   '{{$replica->observaciones}}', //OBSERVACIONES
			   '{{$replica->plazos_atlante}}', //PLAZOS ATLANTE
			   '{{$replica->plazos_replica}}', //PLAZOS REPLICA
			   '{{$replica->tecnico_nipsa}}', //TECNICO NIPSA
			   '{{$replica->proyecto_nipsa}}', //PROYECTO NIPSA
			   '{{$replica->pendiente_endesa}}', //PENDIENTE ENDESA
			   '{{$replica->plazo}}'   //PLAZO
		   ],
		  @endforeach
		  
		];

		var container = document.getElementById('tablaReplicasGlobal');

		var hot = new Handsontable(container, {
			licenseKey: 'non-commercial-and-evaluation',
		  	data: data,
		  	allowHtml: true,
		  	rowHeaders: true,
		  	colHeaders: [
			  	'TÉCNICO EDE',
			  	'PROVINCIA',
			  	'DEPARTAMENTO',
			  	'TIPO',
			  	'GOM',
			  	'SOLICITUD',
			  	'DESCRIPCION',
			  	'FECHA ENCARGO',
			  	'ADS/ODM',
			  	'PROTOCOLO ATLANTE',
			  	'FECHA DISEÑADO ATLANTE',
			  	'ESTADO ATLANTE',
			  	'FIN ATLANTE',
			  	'PROYECTO AGP',
			  	'ESTADO AGP',
			  	'FIN AGP',
			  	'FINCA',
			  	'TIEMPO DE REPLICA',
			  	'LCA',
			  	'FECHA CONCLUSO',
			  	'ING ESTUDIO',
			  	'OBSERVACIONES',
			  	'PLAZOS ATLANTE',
			  	'PLAZOS REPLICA',
			  	'TECNICO NIPSA',
			  	'PROYECTO NIPSA',
			  	'PENDIENTE ENDESA',
			  	'PLAZO'
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
		   		200, //WIDTH TABLE HEADER --> TÉCNICO EDE 
		   		200, //WIDTH TABLE HEADER --> PROVINCIA 
		   		200, //WIDTH TABLE HEADER --> DEPARTAMENTO 
		   		200, //WIDTH TABLE HEADER --> TIPO 
		   		200, //WIDTH TABLE HEADER --> GOM 
		   		280, //WIDTH TABLE HEADER --> SOLICITUD 
		   		400, //WIDTH TABLE HEADER --> DESCRIPCION
		   		200, //WIDTH TABLE HEADER --> FECHA ENCARGO 
		   		200, //WIDTH TABLE HEADER --> ADS/ODM
		   		200, //WIDTH TABLE HEADER --> PROTOCOLO ATLANTE 
		   		200, //WIDTH TABLE HEADER --> FECHA DISEÑADO ATLANTE 
		   		200, //WIDTH TABLE HEADER --> ESTADO ATLANTE 
		   		200, //WIDTH TABLE HEADER --> FIN ATLANTE 
		   		200, //WIDTH TABLE HEADER --> PROYECTO AGP 
		   		280, //WIDTH TABLE HEADER --> ESTADO AGP 
		   		320, //WIDTH TABLE HEADER --> FIN AGP
		   		200, //WIDTH TABLE HEADER --> FINCA
		   		200, //WIDTH TABLE HEADER --> TIEMPO DE REPLICA
		   		200, //WIDTH TABLE HEADER --> LCA
		   		200, //WIDTH TABLE HEADER --> FECHA CONCLUSO 
		   		200, //WIDTH TABLE HEADER --> ING ESTUDIO 
		   		600, //WIDTH TABLE HEADER --> OBSERVACIONES 
		   		200, //WIDTH TABLE HEADER --> PLAZOS ATLANTE 
		   		200, //WIDTH TABLE HEADER --> PLAZOS REPLICA 
		   		280, //WIDTH TABLE HEADER --> TECNICO NIPSA 
		   		320, //WIDTH TABLE HEADER --> PROYECTO NIPSA
		   		200, //WIDTH TABLE HEADER --> PENDIENTE ENDESA
		   		200, //WIDTH TABLE HEADER --> PLAZO
		   	],
		});
</script>






























