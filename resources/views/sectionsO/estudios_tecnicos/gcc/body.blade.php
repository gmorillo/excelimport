<div class="container-fluid bg-primary p-0">
	<h2 class="text-center p-5 text-white">
        Datos E.T. GCC
    </h2>
</div>
<div class="container">
    @if(session('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
          	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	            <span aria-hidden="true">×</span>
	            <span class="sr-only">Close</span>
	        </button>
	        <strong>{{ session('message') }}</strong>
	    </div>
    @endif
 
    @if( session('error') )
	    <div class="alert alert-danger alert-dismissible" role="alert">
	        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	            <span aria-hidden="true">×</span>
	            <span class="sr-only">Close</span>
	        </button>
	        <strong>{{ session('error') }}</strong>
	    </div>
    @endif
 
    @if(count($errors) > 0)
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
			<a href="{{route('CMGCC')}}" class="btn btn-outline-primary"><i class="fas fa-chart-bar"></i> Ver Ǵráfico</a>
		</div>
		{{--<div class="p-2">
			<a href="{{route('exportAllGlobalData')}}"  class="btn btn-outline-success "><i class="fas fa-file-excel"></i> Exportar</a>
		</div>
		<div class="p-2">
			<nav aria-label="Page navigation example">
				<ul class="pagination">
					{{ $getAlldata->links() }}
				</ul>
			</nav>
		</div>--}}
	</div>
</div>
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
						</tr>
					</thead>
					<tbody>
						@foreach($getGccdata as $gcc)
							<tr class="text-uppercase">
								<td class="small text-capitalize text-center " style="padding-right: 50px">{{$gcc->ingenieria}}</td>
								<td class="small" style="padding-right: 30px;" >{{$gcc->zona}}</td>
								<td class="small  " style="padding-right: 80px">{{$gcc->codigo_expediente}}</td>
								<td class="small  " style="padding-right: 100px">{{$gcc->solicitud_principal}}</td>
								<td class="small  text-center " style="padding-right: 100px">{{$gcc->tipo}}</td>
								<td class="small  text-truncate " style="max-width: 450px; cursor: context-menu;" >{{$gcc->subtipo}}</td>
								<td class="small  text-truncate " style="max-width: 450px; cursor: context-menu;" title="{{$gcc->descripcion_expediente}}">{{$gcc->descripcion_expediente}}</td>
								<td class="small  text-truncate " style="padding-right: 40px" > {{$gcc->potencia_solicitada}}</td>
								<td class="small "  > {{$gcc->tecnico_gestion_comercial}}</td>
								<td class="small  " style="padding-right: 70px">{{$gcc->tecnico_gestion_tecnica}}</td>
								<td class="small  " style="padding-right: 30px">{{$gcc->estado}}</td>
								<td class="small " style="padding-right: 70px">{{$gcc->estado_solicitud}}</td>
								<td class="small  " style="padding-right: 120px">{{$gcc->fecha_asignacion}}</td>
								<td class="small " style="padding-right: 100px">{{$gcc->plazo_legal_contestacion}}</td>
								<td class="small" style="padding-right: 70px" >{{$gcc->fecha_hora_apertura}}</td>
								<td class="small  " style="padding-right: 100px">{{$gcc->fecha_contestacion}}</td>
								<td class="small  text-truncate " style="max-width: 250px">{{$gcc->fecha_limite}}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			{{--<nav aria-label="Page navigation example">
  				<ul class="pagination justify-content-center">
  					{{ $getAlldata->links() }}
  				</ul>
  			</nav>--}}
		</div>
	</div>
</div>




















