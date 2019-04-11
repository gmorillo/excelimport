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

<div class="container-fluid">
	<div class="d-flex flex-row-reverse">
		<div class="p-2">
			<a href="{{route('viewGraphicProjects')}}" class="btn btn-outline-primary"><i class="fas fa-chart-bar"></i> Ver Ǵráfico</a>
		</div>
		{{--<div class="p-2 @if(Auth::user()->id == 1) d-block @else d-none @endif">
			<a href="#" data-toggle="modal" data-target="#importCSVProjects" class="btn btn-outline-primary"><i class="fas fa-file-csv"></i> Importar CSV</a>
		</div>--}}
		<div class="p-2">
			<a href="{{route('exportProjects')}}"  class="btn btn-outline-success "><i class="fas fa-file-excel"></i> Exportar</a>
		</div>
		{{--<div class="p-2">
			<nav aria-label="Page navigation example">
				<ul class="pagination">
					{{ $getTrackingProjects->links() }}
				</ul>
			</nav>
		</div>--}}
	</div>
</div>

<div class="container-fluid mt-2">
	<div class="row">
		<div class="col-md-12">
			<table class="table table-hover" id="table">
				<thead>
					<tr>
						<th scope="col" class="filter small text-uppercase"><strong>Identificador EDE</strong></th>
						<th scope="col" class="filter small text-uppercase"><strong>Código NIPSA</strong></th>
						<th scope="col" class="filter small text-uppercase"><strong>Tarea/LCA</strong></th>
						<th scope="col" class="filter small text-uppercase"><strong>Descripción</strong></th>
						<th scope="col" class="filter small text-uppercase"><strong>Topología</strong></th>
						<th scope="col" class="filter small text-uppercase"><strong>Municipio</strong></th>
						<th scope="col" class="filter small text-uppercase"><strong>Fecha Encargo</strong></th>
						<th scope="col" class="filter small text-uppercase"><strong>Fecha Entrega</strong></th>
						<th scope="col" class="filter small text-uppercase"><strong>Días Plazo</strong></th>
					</tr>
				</thead>
				<tbody>
					@foreach($getTrackingProjects as $project)
						<tr>
							<td class="small">
								@if($project->identificador_ede != null && $project->trabajo_gom != null)
								{{$project->identificador_ede}}-{{$project->trabajo_gom}}
								@elseif($project->trabajo_gom == null)
								{{$project->identificador_ede}}
								@elseif($project->identificador_ede == null)
								{{$project->trabajo_gom}}
								@endif</td>
							<td class="small">{{$project->identificador_ingenieria}}</td>
							<td class="small">{{$project->lca}}</td>
							<td class="small text-truncate" style="max-width: 350px; cursor: context-menu;" title="{{$project->descripcion}}">
								{{$project->descripcion}}
							</td>
							<td class="small">{{$project->topologia}}@if($project->tipo != null)-{{$project->tipo}}@else @endif	</td>
							<td class="small"> {{$project->municipio}}@if($project->provincia != null)-{{$project->provincia}}@else @endif</td>
							<td class="small">{{$project->fecha_pedido}}</td>
							<td class="small">{{$project->fecha_entrega}}</td>
							<td class="small">{{$project->plazo}}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			{{--<nav aria-label="Page navigation example">
  				<ul class="pagination justify-content-center">
  					{{ $getTrackingProjects->links() }}
  				</ul>
  			</nav>--}}
		</div>
	</div>
</div>

{{-- Modal 
<div class="modal fade" id="importCSVProjects" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Importar Archivo CSV</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('importProjects') }}" method="POST" enctype="multipart/form-data">
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