<div class="container-fluid bg-primary p-0">
	<h2 class="text-center p-5 text-white">
        Datos Proyectos	
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

{{--TABLA LIKE EXCEL--}}


<div class="table-responsive" style="height: auto;">
	<div class="wrapper1">
	    <div class="div1">
	    </div>
	</div>
	<div class="wrapper2">
	    <div class="div2">
	    	<div id="Tablaproyectos"></div>
	    </div>
	</div>
</div>

<style>
	.wrapper1, .wrapper2{width: 100%; border: none 0px RED;
overflow-x: scroll; overflow-y:hidden;}
.wrapper1{height: 20px; }
.wrapper2{height: 10800px; }
.div1 {width:2250px; height: 20px; }
.div2 {width:2250px; height: 10800px;
overflow: auto;}
</style>


<script>

		var data = [
		  
		  @foreach($getTrackingProjects as $project)
		  ['@if($project->identificador_ede != null && $project->trabajo_gom != null){{$project->identificador_ede}} {{$project->trabajo_gom}}@elseif($project->trabajo_gom == null){{$project->identificador_ede}}@elseif($project->identificador_ede == null){{$project->trabajo_gom}}@endif', '{{$project->identificador_ingenieria}}', '{{$project->lca}}', '{{$project->descripcion}}', '{{$project->topologia}}@if($project->tipo != null)-{{$project->tipo}}@else @endif', '{{$project->municipio}}@if($project->provincia != null)-{{$project->provincia}}@else @endif', '{{$project->fecha_pedido}}', '{{$project->fecha_entrega}}', '{{$project->plazo}}'],
		  @endforeach
		  
		];

		var container = document.getElementById('Tablaproyectos');

		var hot = new Handsontable(container, {
			licenseKey: 'non-commercial-and-evaluation',
		  	data: data,
		  	allowHtml: true,
		  	rowHeaders: true,
		  	colHeaders: ['IDENTIFICADOR EDE','CÓDIGO NIPSA','TAREA/LCA','DESCRIPCIÓN','TOPOLOGÍA','MUNICIPIO','FECHA ENCARGO','FECHA ENTREGA','DÍAS PLAZO'],
		  	
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
		   		500, 
		   		200, 
		   		280, 
		   		200,
		   		200, 
		   		200,
		   	],
		});
</script>


