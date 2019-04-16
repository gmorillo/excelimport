@extends('layouts.app')

@section('content')
<div class="container-fluid bg-primary p-0">
	<h2 class="text-center p-5 text-white">
        CM ET Global
    </h2>
</div>
<div class="container-fluid mb-5">
	<div class="float-right ">
		<a class="btn btn-outline-primary w-100 my-2" href="#" data-toggle="modal" data-target="#importCMetGlobal"><i class="fas fa-file-upload"></i> Importar CM ET Global</a>
	</div>
</div><br>
<div class="container-fluid my-5" id="container-seg-et">

	<div id="chart_div"></div>
</div>


<!-- Modal CM ET GLOBAL-->
<div class="modal fade" id="importCMetGlobal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Importar Datos Gráfico ET Global</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('importCmetglobal') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="input-group mb-3">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="file" name="file">
                <label class="custom-file-label" for="inputGroupFile02" required>Agregar archivo Excel/CSV</label>
            </div>
        </div>
        <input type="submit" class="btn btn-primary btn-lg loaddataspin" style="margin-top: 3%">
    </form>
    <div class="text-center">
        <i class="fa fa-spinner d-none text-primary loadingspin"></i>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
	<script type="text/javascript">
	  google.charts.load('current', {'packages':['bar']});
	  google.charts.setOnLoadCallback(drawChart);

	  function drawChart() {
	    var data = google.visualization.arrayToDataTable([
			['', 'Encargados/Mes', 'Terminados/Mes', 'Pte. Datos', 'Pte. Entregar', 'Fuera de plazo (Acumulado)'],
			@foreach($CMGlobalETData as $data)
				['@if($data->mes == '2018-11') Noviembre 2018 @elseif($data->mes == '2018-12') Diciembre 2018 @elseif($data->mes == '2019-01')Enero 2019 @elseif($data->mes == '2019-02')Febrero 2019 @elseif($data->mes == '2019-03')Marzo 2019 @elseif($data->mes == '2019-04')Abril 2019 @elseif($data->mes == '2019-05')Mayo 2019 @elseif($data->mes == '2019-06')Junio 2019 @elseif($data->mes == '2019-07')Julio 2019 @elseif($data->mes == '2019-08')Agosto 2019 @elseif($data->mes == '2019-09')Septiembre 2019 @elseif($data->mes == '2019-10')Octubre 2019 @elseif($data->mes == '2019-11')Noviembre 2019 @elseif($data->mes == '2019-12')Diciembre 2019 @endif',{{$data->encargados_mes}}, {{$data->terminados_mes}}, {{$data->pendiente_datos}}, {{$data->pendiente_entrega}}, {{$data->fuera_plazo}}],
			@endforeach

		]);

	    var options = {
	      	chart: {
	        	title: 'Seguimiento Proyectos',
	        	subtitle: 'Mensual',
	      	},
	      	bars: 'vertical',
	      	vAxis: {title:'PROYECTOS', format: 'decimal'},
	      	height: 400,
	      	animation: {
	        	duration: 1000,
	        	easing: 'in'
	      	},
	      	colors: ['#3490dc', '#d95f02', '#ffdb58', '#FE4545', '#6c757d']
	    };

	    var chart = new google.charts.Bar(document.getElementById('chart_div'));

	    chart.draw(data, google.charts.Bar.convertOptions(options));

	  }
	  
	</script>

@endsection

@section('stylesheet')

@endsection