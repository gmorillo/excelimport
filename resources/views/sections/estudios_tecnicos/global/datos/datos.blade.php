<div class="container-fluid bg-primary p-0">
	<h2 class="text-center p-5 text-white">
        Datos Estudios Técnicos Global
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
			<a href="{{route('CMGlobalET')}}" class="btn btn-outline-primary"><i class="fas fa-chart-bar"></i> Ver Ǵráfico</a>
		</div>
		<div class="p-2">
			<a href="{{route('exportAllGlobalData')}}"  class="btn btn-outline-success "><i class="fas fa-file-excel"></i> Exportar</a>
		</div>
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
							<th scope="col" class=" filter text-truncate">Ingeniería</th>
							<th scope="col" class=" filter">Zona</th>
							<th scope="col" class=" filter">Código de expediente</th>
							<th scope="col" class=" filter">Solicitud principal</th>
							<th scope="col" class=" filter">Tipo</th>
							<th scope="col" class=" filter">Subtipo</th>
							<th scope="col" class=" filter">Descripción del expediente</th>
							<th scope="col" class=" filter">Potencia solicitada</th>
							<th scope="col" class=" filter">Técnico Gestión Comercial</th>
							<th scope="col" class=" filter">Técnico Gestión Técnica</th>
							<th scope="col" class=" filter">Estado</th>
							<th scope="col" class=" filter">Estado solicitud</th>
							<th scope="col" class=" filter">Fecha de asignación a ingeniería</th>
							<th scope="col" class=" filter">Plazo legal contestación</th>
							<th scope="col" class=" filter">Fecha y hora de apertura</th>
							<th scope="col" class=" filter">Fecha de contestación</th>
							<th scope="col" class=" filter">Fecha Límite</th>
							<th scope="col" class=" filter">Departamento</th>
						</tr>
					</thead>
					<tbody>
						@foreach($getGlobaldata as $globalET)
							<tr class="text-uppercase">
								<td class="small text-capitalize text-center " style="padding-right: 50px">{{$globalET->ingenieria}}</td>
								<td class="small" style="padding-right: 30px;" >{{$globalET->zona}}</td>
								<td class="small  " style="padding-right: 120px">{{$globalET->codigo_expediente}}</td>
								<td class="small  " style="padding-right: 100px">{{$globalET->solicitud_principal}}</td>
								<td class="small  text-center " style="padding-right: 40px">{{$globalET->tipo}}</td>
								<td class="small  text-truncate " style="max-width: 450px; cursor: context-menu;" >{{$globalET->subtipo}}</td>
								<td class="small  text-truncate " style="max-width: 450px; cursor: context-menu;" title="{{$globalET->descripcion_expediente}}">{{$globalET->descripcion_expediente}}</td>
								<td class="small  text-truncate " style="padding-right: 40px" > {{$globalET->potencia_solicitada}}</td>
								<td class="small "  style="padding-right: 80px"> {{$globalET->tecnico_gestion_comercial}}</td>
								<td class="small  " style="padding-right: 70px">{{$globalET->tecnico_gestion_tecnica}}</td>
								<td class="small  " style="padding-right: 30px">{{$globalET->estado}}</td>
								<td class="small " style="padding-right: 70px">{{$globalET->estado_solicitud}}</td>
								<td class="small  " style="padding-right: 120px">{{$globalET->fecha_asignacion}}</td>
								<td class="small " style="padding-right: 100px">{{$globalET->plazo_legal_contestacion}}</td>
								<td class="small" style="padding-right: 70px" >{{$globalET->fecha_hora_apertura}}</td>
								<td class="small  " style="padding-right: 100px">{{$globalET->fecha_contestacion}}</td>
								<td class="small  text-truncate " style="max-width: 250px">{{$globalET->fecha_limite}}</td>
								<td class="small  text-center ">{{$globalET->departamento}}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
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
    	<div id="tablaEstudiosTecnicosGlobal"></div>
    </div>
</div>
	
</div>

<style>
	.wrapper1, .wrapper2{width: 100%; border: none 0px RED;overflow-x: scroll; overflow-y:hidden;}
	.wrapper1{height: 20px; }
	.wrapper2{height: 10800px; }
	.div1 {width:4830px; height: 20px; }
	.div2 {width:4830px; height: 10800px;
	overflow: auto;}
</style>


<script>

		var data = [
		  
	  	@foreach($getGlobaldata as $globalET)
		  	[
			  	'{{$globalET->ingenieria}}', //INGENIERÍA
				'{{$globalET->zona}}', //ZONA
				'{{$globalET->codigo_expediente}}', //CÓDIGO EXPEDIENTE
				'{{$globalET->solicitud_principal}}', //SOLICITUD PRINCIPAL
				'{{$globalET->tipo}}', //TIPO
				'{{$globalET->subtipo}}', //SUBTIPO
				'{{$globalET->descripcion_expediente}}', //DESCRIPCIÓN DEL EXPEDIENTE
				'{{$globalET->potencia_solicitada}}', //POTENCIA SOLICITADA
				'{{$globalET->tecnico_gestion_comercial}}', //TÉCNICO GESTION COMERCIAL
				'{{$globalET->tecnico_gestion_tecnica}}', //TÉCNICO GESTIÓN TÉCNICA
				'{{$globalET->estado}}', //ESTADO
				'{{$globalET->estado_solicitud}}', //ESTADO SOLICITUD
				'{{$globalET->fecha_asignacion}}', //FECHA DE ASIGNACIÓN A INGENIERÍA
				'{{$globalET->plazo_legal_contestacion}}', //PLAZO LEGAL CONTESTACIÓN
				'{{$globalET->fecha_hora_apertura}}', //FECHA Y HORA DE APERTURA
				'{{$globalET->fecha_contestacion}}', //FECHA DE CONTESTACIÓN
				'{{$globalET->fecha_limite}}', //FECHA LIMITE
				'{{$globalET->departamento}}' //DEPARTAMENTO
			],
	  	@endforeach
		  
		];

		var container = document.getElementById('tablaEstudiosTecnicosGlobal');

		var hot = new Handsontable(container, {
			licenseKey: 'non-commercial-and-evaluation',

		  	data: data,
		  	allowHtml: true,
		  	rowHeaders: true,
		  	colHeaders: [
			  	'INGENIERÍA',
			  	'ZONA',
			  	'CÓDIGO EXPEDIENTE',
			  	'SOLICITUD PRINCIPAL',
			  	'TIPO',
			  	'SUBTIPO',
			  	'DESCRIPCIÓN DEL EXPEDIENTE',
			  	'POTENCIA SOLICITADA',
			  	'TÉCNICO GESTION COMERCIAL',
			  	'TÉCNICO GESTIÓN TÉCNICA',
			  	'ESTADO',
			  	'ESTADO SOLICITUD',
			  	'FECHA DE ASIGNACIÓN A INGENIERÍA',
			  	'PLAZO LEGAL CONTESTACIÓN',
			  	'FECHA Y HORA DE APERTURA',
			  	'FECHA DE CONTESTACIÓN',
			  	'FECHA LIMITE',
			  	'DEPARTAMENTO'
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
		   		200, // WIDTH HEADER TABLE --> INGENIERÍA 
		   		200, // WIDTH HEADER TABLE --> ZONA 
		   		200, // WIDTH HEADER TABLE --> CÓDIGO EXPEDIENTE 
		   		200, // WIDTH HEADER TABLE --> SOLICITUD PRINCIPAL 
		   		200, // WIDTH HEADER TABLE --> TIPO 
		   		280, // WIDTH HEADER TABLE --> SUBTIPO 
		   		500, // WIDTH HEADER TABLE --> DESCRIPCIÓN DEL EXPEDIENTE
		   		200, // WIDTH HEADER TABLE --> POTENCIA SOLICITADA 
		   		300, // WIDTH HEADER TABLE --> TÉCNICO GESTION COMERCIAL
		   		300, // WIDTH HEADER TABLE --> TÉCNICO GESTIÓN TÉCNICA 
		   		280, // WIDTH HEADER TABLE --> ESTADO 
		   		280, // WIDTH HEADER TABLE --> ESTADO SOLICITUD 
		   		300, // WIDTH HEADER TABLE --> FECHA DE ASIGNACIÓN A INGENIERÍA 
		   		300, // WIDTH HEADER TABLE --> PLAZO LEGAL CONTESTACIÓN 
		   		280, // WIDTH HEADER TABLE --> FECHA Y HORA DE APERTURA 
		   		320, // WIDTH HEADER TABLE --> FECHA DE CONTESTACIÓN
		   		200, // WIDTH HEADER TABLE --> FECHA LIMITE
		   		200, // WIDTH HEADER TABLE --> DEPARTAMENTO
		   	],
		});
</script>





















