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
		{{--<div class="p-2 @if(Auth::user()->id == 1) d-block @else d-none @endif">
			<a href="#" data-toggle="modal" data-target="#importCSV" class="btn btn-outline-primary"><i class="fas fa-file-csv"></i> Importar CSV</a>
		</div>--}}
		<div class="p-2">
			<a href="{{route('CMGTC')}}" class="btn btn-outline-primary"><i class="fas fa-chart-bar"></i> Ver Ǵráfico</a>
		</div>
		{{--<div class="p-2">
			<a href="{{route('exportAllGlobalData')}}"  class="btn btn-outline-success "><i class="fas fa-file-excel"></i> Exportar</a>
		</div>
		<div class="p-2">
			<nav aria-label="Page navigation tablaGtc">
				<ul class="pagination">
					{{ $getAlldata->links() }}
				</ul>
			</nav>
		</div>--}}
	</div>
</div>
{{--<div class="container-fluid mt-2" >
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
						</tr>
					</thead>
					<tbody>
						@foreach($getGtcdata as $gtc)
							<tr class="text-uppercase">
								<td class="small text-capitalize text-center " style="padding-right: 50px">{{$gtc->ingenieria}}</td>
								<td class="small" style="padding-right: 30px;" >{{$gtc->zona}}</td>
								<td class="small  " style="padding-right: 80px">{{$gtc->codigo_expediente}}</td>
								<td class="small  " style="padding-right: 100px">{{$gtc->solicitud_principal}}</td>
								<td class="small  text-center " style="padding-right: 100px">{{$gtc->tipo}}</td>
								<td class="small  text-truncate " style="max-width: 450px; cursor: context-menu;" >{{$gtc->subtipo}}</td>
								<td class="small  text-truncate " style="max-width: 450px; cursor: context-menu;" title="{{$gtc->descripcion_expediente}}">{{$gtc->descripcion_expediente}}</td>
								<td class="small  text-truncate " style="padding-right: 40px" > {{$gtc->potencia_solicitada}}</td>
								<td class="small "  > {{$gtc->tecnico_gestion_comercial}}</td>
								<td class="small  " style="padding-right: 70px">{{$gtc->tecnico_gestion_tecnica}}</td>
								<td class="small  " style="padding-right: 30px">{{$gtc->estado}}</td>
								<td class="small " style="padding-right: 70px">{{$gtc->estado_solicitud}}</td>
								<td class="small  " style="padding-right: 120px">{{$gtc->fecha_asignacion}}</td>
								<td class="small " style="padding-right: 100px">{{$gtc->plazo_legal_contestacion}}</td>
								<td class="small" style="padding-right: 70px" >{{$gtc->fecha_hora_apertura}}</td>
								<td class="small  " style="padding-right: 100px">{{$gtc->fecha_contestacion}}</td>
								<td class="small  text-truncate " style="max-width: 250px">{{$gtc->fecha_limite}}</td>
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
    	<div id="tablaGtc"></div>
    </div>
</div>
	
</div>

<style>
	.wrapper1, .wrapper2{width: 100%; border: none 0px RED;
overflow-x: scroll; overflow-y:hidden;}
.wrapper1{height: 20px; }
.wrapper2{height: 10800px; }
.div1 {width:4600px; height: 20px; }
.div2 {width:4600px; height: 10800px;
overflow: auto;}
</style>


<script>

		var data = [
		  
	  	@foreach($getGtcdata as $gtc)
		  	[
				'{{$gtc->ingenieria}}',
				'{{$gtc->zona}}',
				'{{$gtc->codigo_expediente}}',
				'{{$gtc->solicitud_principal}}',
				'{{$gtc->tipo}}',
				'{{$gtc->subtipo}}',
				'{{$gtc->descripcion_expediente}}',
				'{{$gtc->potencia_solicitada}}',
				'{{$gtc->tecnico_gestion_comercial}}',
				'{{$gtc->tecnico_gestion_tecnica}}',
				'{{$gtc->estado}}',
				'{{$gtc->estado_solicitud}}',
				'{{$gtc->fecha_asignacion}}',
				'{{$gtc->plazo_legal_contestacion}}',
				'{{$gtc->fecha_hora_apertura}}',
				'{{$gtc->fecha_contestacion}}',
				'{{$gtc->fecha_limite}}'
			],
	  	@endforeach
		  
		];

		var container = document.getElementById('tablaGtc');

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
		  		'FECHA LIMITE'
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
		   		200, // WIDTH TABLE HEADER --> INGENIERÍA 
		   		200, // WIDTH TABLE HEADER --> ZONA 
		   		200, // WIDTH TABLE HEADER --> CÓDIGO EXPEDIENTE 
		   		200, // WIDTH TABLE HEADER --> SOLICITUD PRINCIPAL 
		   		200, // WIDTH TABLE HEADER --> TIPO 
		   		280, // WIDTH TABLE HEADER --> SUBTIPO 
		   		500, // WIDTH TABLE HEADER --> DESCRIPCIÓN DEL EXPEDIENTE
		   		200, // WIDTH TABLE HEADER --> POTENCIA SOLICITADA 
		   		300, // WIDTH TABLE HEADER --> TÉCNICO GESTION COMERCIAL
		   		300, // WIDTH TABLE HEADER --> TÉCNICO GESTIÓN TÉCNICA 
		   		280, // WIDTH TABLE HEADER --> ESTADO 
		   		280, // WIDTH TABLE HEADER --> ESTADO SOLICITUD 
		   		300, // WIDTH TABLE HEADER --> FECHA DE ASIGNACIÓN A INGENIERÍA 
		   		300, // WIDTH TABLE HEADER --> PLAZO LEGAL CONTESTACIÓN 
		   		280, // WIDTH TABLE HEADER --> FECHA Y HORA DE APERTURA 
		   		320, // WIDTH TABLE HEADER --> FECHA DE CONTESTACIÓN
		   		200, // WIDTH TABLE HEADER --> FECHA LIMIT
		   	],
		});
</script>




















