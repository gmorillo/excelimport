<div class="container-fluid bg-primary p-0">
	<h2 class="text-center p-5 text-white">
        CM Proyectos
    </h2>
</div>
{{--<div class="container @if(Auth::user()->id == 1) d-block @else d-none @endif">
	<div class="d-flex flex-row-reverse">
		<div class="p-2">
			<a href="" data-toggle="modal" data-target="#importCSV" class="btn btn-outline-primary btn-lg"><i class="fas fa-file-csv"></i> Importar nuevos datos al gráfico</a>
		</div>
	</div>
</div>--}}
<div class="container-fluid">
  <div class="pt-4 d-flex flex-row-reverse">
      <button class="btn btn-outline-primary hidden-print btn-lg" onclick="myFunction()"><i class="fas fa-print"></i> Imprimir Gráfico</button>
      <a href="" data-toggle="modal" data-target="#ImportGraphicData" class="btn btn-outline-primary btn-lg mr-2 @if(Auth::user()->id == 1) d-block @else d-none @endif"><i class="fas fa-file-csv"></i> Importar nuevos datos al gráfico</a>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="ImportGraphicData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Importar datos al gŕafico</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('importGraphicProjectData')}}" method="POST" enctype="multipart/form-data">
	    {{ csrf_field() }}
		<div class="input-group mb-3">
			<div class="custom-file">
				<input type="file" class="custom-file-input" id="file" name="file">
				<label class="custom-file-label" for="inputGroupFile02">Agregar archivo</label>
			</div>
		</div>
	    <input type="submit" class="btn btn-primary btn-lg" style="margin-top: 3%">
	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<script>
  function myFunction() {
    window.print();
}
</script>