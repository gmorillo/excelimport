@extends('layouts.app')

@section('content')
	<div class="container-fluid p-0">

		@include('sections.proyectos.graficos.body')
	</div>
	
<div class="container-fluid my-5" id="container-seg-et">

	<div id="chart_div"></div>
</div>

@endsection

@section('scripts')
	<script type="text/javascript">
	  google.charts.load('current', {'packages':['bar']});
	  google.charts.setOnLoadCallback(drawChart);

	  function drawChart() {
	    var data = google.visualization.arrayToDataTable([
			['', 'Encargados/Mes', 'Terminados/Mes', 'Fuera de plazo (Acumulado)'],
			@foreach($getProjectsGraphicData as $data)
				['@if($data->mes == '2018-12') Diciembre 2018 @elseif($data->mes == '2019-01')Enero 2019 @elseif($data->mes == '2019-02')Febrero 2019 @elseif($data->mes == '2019-03')Marzo 2019 @elseif($data->mes == '2019-04')Abril 2019 @elseif($data->mes == '2019-05')Mayo 2019 @elseif($data->mes == '2019-06')Junio 2019 @elseif($data->mes == '2019-07')Julio 2019 @elseif($data->mes == '2019-08')Agosto 2019 @elseif($data->mes == '2019-09')Septiembre 2019 @elseif($data->mes == '2019-10')Octubre 2019 @elseif($data->mes == '2019-11')Noviembre 2019 @elseif($data->mes == '2019-12')Diciembre 2019 @endif',{{$data->encargados_mes}}, {{$data->terminados_mes}}, {{$data->fuera_plazo}}],
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
	      	colors: ['#3490dc', '#d95f02', '#6c757d']
	    };

	    var chart = new google.charts.Bar(document.getElementById('chart_div'));

	    chart.draw(data, google.charts.Bar.convertOptions(options));

	  }
	  
	</script>

@endsection

@section('stylesheet')

@endsection