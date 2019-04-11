@extends('layouts.app')

@section('content')
	<div class="container-fluid p-0">

		@include('sections.legalizaciones.graficos.body')
	</div>
	
<div class="container-fluid" id="container-seg-et">

	<div id="chart_div" class="my-5"></div>
</div>

@endsection

@section('scripts')
	<script type="text/javascript">
	  google.charts.load('current', {packages: ['corechart']});
	  google.charts.setOnLoadCallback(drawChart);     
	  function drawChart() {
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['', 'Encargados/mes', 'Terminados/mes', 'Fuera de plazo (Acumulado)', 'Pasado a ejecución','Administración', 'Contrata', 'Endesa', 'Ingeniería', { role: 'annotation' } ],
		        @foreach($getLegalizationsGraphicData as $data)
		        	['@if($data->mes == '2018-12') Diciembre 2018 @elseif($data->mes == '2019-01')Enero 2019 @elseif($data->mes == '2019-02')Febrero 2019 @elseif($data->mes == '2019-03')Marzo 2019 @elseif($data->mes == '2019-04')Abril 2019 @elseif($data->mes == '2019-05')Mayo 2019 @elseif($data->mes == '2019-06')Junio 2019 @elseif($data->mes == '2019-07')Julio 2019 @elseif($data->mes == '2019-08')Agosto 2019 @elseif($data->mes == '2019-09')Septiembre 2019 @elseif($data->mes == '2019-10')Octubre 2019 @elseif($data->mes == '2019-11')Noviembre 2019 @elseif($data->mes == '2019-12')Diciembre 2019 @endif', {{$data->encargados_mes}}, {{$data->terminados_mes}}, {{$data->fuera_plazo}}, {{$data->pasado_ejecucion}}, {{$data->administracion}}, {{$data->contrata}}, {{$data->endesa}}, {{$data->ingenieria}}, ''],
		        @endforeach
            ]);

            var options = {
            	chart: {
		        	title: 'Seguimiento Legalizaciones',
		        	subtitle: 'Mensual',
		      	},
            	height: 1000,
            	isStacked:true,
            	vAxis: {title:'TRÁMITES', format: 'decimal'},
            	colors: [
            		'#0088CE', //encargados_mes
            		'#FFA500', //terminados_mes
            		'#E8E9EB', //fuera_plazo
            		'#FCCA46', //pasado_ejecucion
            		'#00C7B5', //administracion
            		'#134E13', //contrata
            		'#92AFD7', //endesa
            		'#FE7F2D', //ingenieria
            	],
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
            chart.draw(data, options);


         }
         
	  
	</script>

	{{--<script type="text/javascript">
	  google.charts.load('current', {'packages':['bar']});
	  google.charts.setOnLoadCallback(drawChart);

	  function drawChart() {
	    var data = google.visualization.arrayToDataTable([
        ['', 'Encargados/mes', 'Terminados/mes', 'Fuera de plazo (Acumulado)', 'Pasado a ejecución','Administración', 'Contrata', 'Endesa', 'Ingeniería', { role: 'annotation' } ],
		        @foreach($getLegalizationsGraphicData as $data)
		        	['{{$data->mes}}', {{$data->encargados_mes}}, {{$data->terminados_mes}}, {{$data->fuera_plazo}}, {{$data->pasado_ejecucion}}, {{$data->administracion}}, {{$data->contrata}}, {{$data->endesa}}, {{$data->ingenieria}}, ''],
		        @endforeach
      ]);


	    var options = {

	      	chart: {
	        	title: 'Seguimiento Legalizaciones',
	        	subtitle: 'Mensual',
	      	},
	      	bars: 'vertical',
	      	vAxis: {title:'TRÁMITES', format: 'decimal'},
	      	height: 750,
	      	animation: {
	        	duration: 1000,
	        	easing: 'in'
	      	},
	      	colors: [
            		'#0088CE', //encargados_mes
            		'#FFA500', //terminados_mes
            		'#E8E9EB', //fuera_plazo
            		'#FCCA46', //pasado_ejecucion
            		'#00C7B5', //administracion
            		'#134E13', //contrata
            		'#92AFD7', //endesa
            		'#FE7F2D', //ingenieria
            	],
            	isStacked: true,
	    };

	    var chart = new google.charts.Bar(document.getElementById('chart_div'));

	    chart.draw(data, google.charts.Bar.convertOptions(options));

	  }
	  
	</script>--}}


@endsection

@section('stylesheet')

@endsection



