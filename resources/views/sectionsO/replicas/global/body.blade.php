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
			<a href="{{route('viewGraphicLegalizations')}}" class="btn btn-outline-primary"><i class="fas fa-chart-bar"></i> Ver Gráfico</a>
		</div>
		<div class="p-2">
			<a href="{{route('exportReplicasGlobal')}}"  class="btn btn-outline-success "><i class="fas fa-file-excel"></i> Exportar</a>
		</div>
	</div>
</div>
{{--
<div class="container-fluid mt-2">
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-hover" id="table">
					<thead>
						<tr>
							<th scope="col" class=" filter text-uppercase small"><strong>Tecnico EDE</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>PROVINCIA</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>DEPARTAMENTO</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>TIPO</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>GOM</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>SOLICITUD</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>DESCRIPCION</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>FECHA ENCARGO</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>AdS/odm</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>Protocolo ATLANTE</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>Fecha diseñado ATLANTE</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>Estado ATLANTE</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>Fin Atlante</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>Proyecto AGP</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>Estado AGP</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>Fin AGP</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>Finca</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>TIEMPO DE REPLICA</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>LCA</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>FECHA CONCLUSO</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>ING ESTUDIO</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>OBSERVACIONES</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>PLAZOS ATLANTE</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>PLAZOS REPLICA</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>TECNICO NIPSA</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>PROYECTO NIPSA</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>PENDIENTE ENDESA</strong></th>
							<th scope="col" class=" filter text-uppercase small"><strong>PLAZO</strong></th>
						</tr>
					</thead>
					<tbody>
						@foreach($getReplicas as $replica)
							<tr>
								<td class="small" style="padding-right: 50px;">{{$replica->tecnico_ede}}</td>
								<td class="small" style="padding-right: 50px">{{$replica->provincia}}</td>
								<td class="small" style="padding-right: 70px">{{$replica->departamento}}</td>
								<td class="small" style="padding-right: 50px">{{$replica->tipo}}</td>
								<td class="small" style="padding-right: 50px">{{$replica->gom}}</td>
								<td class=" small" style="padding-right: 50px">{{$replica->solicitud}}</td>
								<td class="small text-truncate" style="max-width: 350px;cursor: context-menu;" title="{{$replica->descripcion}}">
									{{$replica->descripcion}}
								</td>
								<td class="small " style="padding-right: 130px">{{$replica->fecha_encargo}}</td>
								<td class="small" style="padding-right: 30px">{{$replica->ads_odm}}</td>
								<td class="small" style="padding-right: 20px">{{$replica->protocolo_atlante}}</td>
								<td class="small " style="padding-right: 150px">{{$replica->fecha_diseno_atlante}}</td>
								<td class="small  " style="padding-right: 80px" > {{$replica->estado_atlante}}</td>
								<td class="small " style="padding-right: 80px;"> {{$replica->fin_atlante}}</td>
								<td class="small text-truncate" style="max-width: 150px;" title="{{$replica->proyecto_agp}}">{{$replica->proyecto_agp}}</td>
								<td class=" small" style="padding-right: 30px">{{$replica->estado_agp}}</td>
								<td class="small" style="padding-right: 50px">{{$replica->fin_agp}}</td>
								<td class=" small" style="padding-right: 60px">{{$replica->finca}}</td>
								<td class="small" style="padding-right: 90px;">{{$replica->tiempo_replica}}</td>
								<td class="small" style="padding-right: 50px">{{$replica->lca}}</td>
								<td class="small" style="padding-right: 80px">{{$replica->fecha_concluso}}</td>
								<td class="small" style="padding-right: 50px">{{$replica->ing_estudio}}</td>
								<td class="small text-truncate" style="max-width: 350px; cursor: context-menu;" title="{{$replica->observaciones}}">
									{{$replica->observaciones}}
								</td>
								<td class=" small text-center" style="padding-right: 80px">{{$replica->plazos_atlante}}</td>
								<td class="small text-truncate" style="padding-right: 50px;">{{$replica->plazos_replica}}</td>
								<td class="small " style="padding-right: 80px">{{$replica->tecnico_nipsa}}</td>
								<td class="small  text-truncate" style="padding-right: 100px">{{$replica->proyecto_nipsa}}</td>
								<td class="small  text-center" style="padding-right: 100px">{{$replica->pendiente_endesa}}</td>
								<td class="small " style="padding-right: 50px">{{$replica->plazo}}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
--}}
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
.div1 {width:7850px; height: 20px; }
.div2 {width:7850px; height: 10800px;
overflow: auto;}
</style>



<script>

		var data = [
		  
		  @foreach($getReplicas as $legalization)
		  ['{{$legalization->tecnico_ede}}', 	'{{$legalization->provincia}}','{{$legalization->departamento}}','{{$legalization->tipo}}','{{$legalization->gom}}','{{$legalization->solicitud}}','{{$legalization->descripcion}}','{{$legalization->fecha_encargo}}','{{$legalization->ads_odm}}','{{$legalization->protocolo_atlante}}','{{$legalization->fecha_diseno_atlante}}','{{$legalization->estado_atlante}}','{{$legalization->fin_atlante}}','{{$legalization->proyecto_agp}}','{{$legalization->estado_agp}}','{{$legalization->fin_agp}}','{{$legalization->finca}}','{{$legalization->tiempo_replica}}','{{$legalization->lca}}','{{$legalization->fecha_concluso}}','{{$legalization->ing_estudio}}','{{$legalization->observaciones}}','{{$legalization->plazos_atlante}}','{{$legalization->plazos_replica}}','{{$legalization->tecnico_nipsa}}','{{$legalization->proyecto_nipsa}}','{{$legalization->pendiente_endesa}}','{{$legalization->plazo}}'],
		  @endforeach
		  
		];

		var container = document.getElementById('example');

		var hot = new Handsontable(container, {
			licenseKey: 'non-commercial-and-evaluation',
		  	data: data,
		  	allowHtml: true,
		  	rowHeaders: true,
		  	colHeaders: ['PROVINCIA','CODIGO NIPSA','TAREA PROYECTO','FECHA ENCARGO','FECHA ENTREGA','TITULO ENCARGO','TECNICO ENDESA','TIPO TRABAJO','POBLACION','CODIGO CENTRO','PROPIEDAD','TIPO','LEGAL','DEPARTAMENTO','SOLICITUD NNSS','TRABAJO GOM','ORGANISMOS IMPLICADOS','TAREA LCA','FECHA GENERACION', 'TAREAS','TRAMITE GOM','EXPTE INDUSTRIA','PASADO EJECUCION','ESTADO TAREA','CFO','APM','MOTIVO PARALIZACION','OBSERVACIONES'],
		  	
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
		   		600, 
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
