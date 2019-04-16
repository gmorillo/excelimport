@extends('layouts.app')

@section('content')
	<div class="container-fluid p-0">
		@include('sections.estudios_tecnicos.global.datos.datos')
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