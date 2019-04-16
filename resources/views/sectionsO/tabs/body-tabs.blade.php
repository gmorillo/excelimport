<nav>
	<div class="nav nav-tabs" id="nav-tab" role="tablist">
		{{--<a class="nav-item nav-link active" id="menu-principal-tab" data-toggle="tab" href="#menu-principal" role="tab" aria-controls="menu-principal" aria-selected="true">
			<i class="fas fa-home"></i>&nbsp;&nbsp;Principal
		</a>--}}
		<a class="nav-item nav-link active" id="estudios-tecnicos-tab" data-toggle="tab" href="#tab-estudios-tecnicos" role="tab" aria-controls="tab-estudios-tecnicos" aria-selected="true">
			<i class="fas fa-table"></i>&nbsp;&nbsp;Estudios Técnicos
		</a>
		<a class="nav-item nav-link" id="proyecto-tab" data-toggle="tab" href="#proyecto" role="tab" aria-controls="proyecto" aria-selected="true">
			<i class="far fa-chart-bar"></i>&nbsp;&nbsp;Proyectos
		</a>
		{{--
		<a class="nav-item nav-link" id="datos-encargo-tab" data-toggle="tab" href="#datos-encargo" role="tab" aria-controls="datos-encargo" aria-selected="false">
			<i class="fas fa-table"></i>&nbsp;&nbsp;DATOS ENCARGO
		</a>
		<a class="nav-item nav-link" id="tramites-tab" data-toggle="tab" href="#tab-tramites" role="tab" aria-controls="tab-tramites" aria-selected="false">
			Trámites
		</a>
		<a class="nav-item nav-link" id="industria-tab" data-toggle="tab" href="#tab-industria" role="tab" aria-controls="tab-industria" aria-selected="false">
			Industria
		</a>
		<a class="nav-item nav-link" id="permisos-particulares-tab" data-toggle="tab" href="#tab-permisos-particulares" role="tab" aria-controls="permisos-particulares" aria-selected="false">
			Permisos Particulares
		</a>
		<a class="nav-item nav-link" id="topografia-tab" data-toggle="tab" href="#tab-topografia" role="tab" aria-controls="topografia" aria-selected="false">
			Topografía
		</a>
		<a class="nav-item nav-link" id="do_css-tab" data-toggle="tab" href="#tab-do_css" role="tab" aria-controls="do_css" aria-selected="false">
			DO y CSS
		</a>
		<a class="nav-item nav-link" id="cesiones-tab" data-toggle="tab" href="#tab-cesiones" role="tab" aria-controls="cesiones" aria-selected="false">
			Cesiones
		</a>
		<a class="nav-item nav-link" id="gestion-avales-tab" data-toggle="tab" href="#tab-gestion-avales" role="tab" aria-controls="gestion-avales" aria-selected="false">
			Gestión Avales
		</a>
		<a class="nav-item nav-link" id="rev-proyectos-tab" data-toggle="tab" href="#tab-rev-proyectos" role="tab" aria-controls="rev-proyectos" aria-selected="false">
			Rev. Proyectos
		</a>
		<a class="nav-item nav-link" id="expedientes-btmt-tab" data-toggle="tab" href="#tab-expedientes-btmt" role="tab" aria-controls="expedientes-btmt" aria-selected="false">
			Expedientes BT/MT
		</a>
		<a class="nav-item nav-link" id="ensayos-tab" data-toggle="tab" href="#tab-ensayos" role="tab" aria-controls="ensayos" aria-selected="false">
			Ensayos
		</a>
		<a class="nav-item nav-link" id="carga-sigor-tab" data-toggle="tab" href="#tab-carga-sigor" role="tab" aria-controls="carga-sigor" aria-selected="false">
			Carga Sigor
		</a>
		<a class="nav-item nav-link" id="cartografia-tab" data-toggle="tab" href="#tab-cartografia" role="tab" aria-controls="cartografia" aria-selected="false">
			Cartografía
		</a>
		<a class="nav-item nav-link" id="mtd-tab" data-toggle="tab" href="#tab-mtd" role="tab" aria-controls="mtd" aria-selected="false">
			MTD
		</a>
		<a class="nav-item nav-link" id="sectorizaciones-tab" data-toggle="tab" href="#tab-sectorizaciones" role="tab" aria-controls="sectorizaciones" aria-selected="false">
			Sectorizaciones
		</a>--}}
	</div>
</nav>
<div class="tab-content py-4 " id="nav-tabContent">
	{{--<div class="tab-pane fade show active " id="menu-principal" role="tabpanel" aria-labelledby="menu-principal-tab">
		@include('sections.tabs.menu_principal')
	</div>--}}
	<div class="tab-pane fade show active" id="tab-estudios-tecnicos" role="tabpanel" aria-labelledby="estudios-tecnicos-tab">
		@include('sections.tabs.estudios-tecnicos.estudios_tecnicos')
	</div>
	<div class="tab-pane fade " id="proyecto" role="tabpanel" aria-labelledby="proyecto-tab">
		@include('sections.tabs.proyectos.proyectos')
	</div>
	{{--<div class="tab-pane fade " id="datos-encargo" role="tabpanel" aria-labelledby="datos-encargo-tab">
		@include('sections.tabs.datos_encargo.datos_encargo')
	</div>
	<div class="tab-pane fade" id="tab-tramites" role="tabpanel" aria-labelledby="tramites-tab">
		@include('sections.tabs.tramites.tramites')
	</div>
	<div class="tab-pane fade" id="tab-industria" role="tabpanel" aria-labelledby="industria-tab">
		@include('sections.tabs.industria.industria')
	</div>
	<div class="tab-pane fade" id="tab-permisos-particulares" role="tabpanel" aria-labelledby="permisos-particulares-tab">
		@include('sections.tabs.permisos_particulares.permisos_particulares')
	</div>
	<div class="tab-pane fade" id="tab-topografia" role="tabpanel" aria-labelledby="topografia-tab">
		@include('sections.tabs.topografia.topografia')
	</div>
	<div class="tab-pane fade" id="tab-do_css" role="tabpanel" aria-labelledby="do_css-tab">
		@include('sections.tabs.do_css.do_css')
	</div>
	<div class="tab-pane fade" id="tab-cesiones" role="tabpanel" aria-labelledby="cesiones-tab">
		@include('sections.tabs.cesiones.cesiones')
	</div>
	<div class="tab-pane fade" id="tab-gestion-avales" role="tabpanel" aria-labelledby="gestion-avales-tab">
		@include('sections.tabs.gestion_avales.gestion_avales')
	</div>
	<div class="tab-pane fade" id="tab-rev-proyectos" role="tabpanel" aria-labelledby="rev-proyectos-tab">
		@include('sections.tabs.rev_proyectos.rev_proyectos')
	</div>
	<div class="tab-pane fade" id="tab-expedientes-btmt" role="tabpanel" aria-labelledby="expedientes-btmt-tab">
		@include('sections.tabs.expediente_bt_mt.expediente_bt_mt')
	</div>
	<div class="tab-pane fade" id="tab-ensayos" role="tabpanel" aria-labelledby="ensayos-tab">
		@include('sections.tabs.ensayos.ensayos')
	</div>
	<div class="tab-pane fade" id="tab-carga-sigor" role="tabpanel" aria-labelledby="carga-sigor-tab">
		@include('sections.tabs.carga_sigor.carga_sigor')
	</div>
	<div class="tab-pane fade" id="tab-cartografia" role="tabpanel" aria-labelledby="cartografia-tab">
		@include('sections.tabs.cartografia.cartografia')
	</div>
	<div class="tab-pane fade" id="tab-mtd" role="tabpanel" aria-labelledby="mtd-tab">
		@include('sections.tabs.mtd.mtd')
	</div>
	<div class="tab-pane fade" id="tab-sectorizaciones" role="tabpanel" aria-labelledby="sectorizaciones-tab">
		@include('sections.tabs.sectorizaciones')
	</div>--}}
</div>