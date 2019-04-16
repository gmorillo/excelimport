@extends('layouts.app')

@section('content')
	<div class="container-fluid p-0">
		@include('sections.seguimiento_proyectos_legalizaciones.body')
	</div>

@endsection

@section('scripts')

@endsection

@section('stylesheet')
	<style>
		#hot-display-license-info {
			display: none;
		}
	</style>
@endsection