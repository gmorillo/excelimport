<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', 'HomeController@index')->name('home');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/datos-inicio', 'HomeController@import')->name('datos-inicio');

Route::get('/administration', 'HomeController@admin')->name('administration');



Route::get('/', 'StudentController@index')->name('index');
Route::post('import', 'StudentController@import')->name('import');

//SEGUIMIENTO PROYECTO LEGALIZACIONES
	Route::get('/seguimiento-proyecto-legalizaciones', 'ProjectlegalizationController@index')->name('viewAllData');
	Route::get('/seguimiento-proyecto-legalizaciones/exportar/', 'ProjectlegalizationController@export')->name('exportAllData');
	Route::post('/seguimiento-proyecto-legalizaciones/importar/', 'ProjectlegalizationController@import')->name('importAllData');



//PROYECTOS
	Route::get('/seguimiento-de-proyectos', 'TrackingprojectController@index')->name('viewDataProjects');
	Route::get('/seguimiento-de-proyectos/exportar/', 'TrackingprojectController@export')->name('exportProjects');
	Route::post('/seguimiento-de-proyectos/importar/', 'TrackingprojectController@import')->name('importProjects');

// GRÁFICOS PROYECTOS
	Route::get('/seguimiento-de-proyectos/graficos/', 'GraphicProjectController@indexProject')->name('viewGraphicProjects');
	Route::post('/seguimiento-de-proyectos/graficos/importar/', 'GraphicProjectController@importProject')->name('importGraphicProjectData');




//LEGALIZACIONES
	Route::get('/seguimiento-de-legalizaciones', 'TrackinglegalizationController@index')->name('viewDataLegalization');
	Route::post('/seguimiento-de-legalizaciones/importar', 'TrackinglegalizationController@import')->name('importLegalizations');
	Route::get('/seguimiento-de-legalizaciones/exportar/', 'TrackinglegalizationController@export')->name('exportLegalization');

	//GRÁFICO LEGALIZACIONES
		Route::get('/seguimiento-de-legalizaciones/graficos/', 'GraphicController@indexLegalization')->name('viewGraphicLegalizations');
		Route::post('/seguimiento-de-legalizaciones/graficos/importar/', 'GraphicController@importLegalization')->name('importGraphicLegalizationData');



//ESTUDIOS TÉCNICOS -> GLOBAL
	Route::get('/estudios-tecnicos/datos-et-global/', 'GlobaletController@index')->name('getallGlobalData');
	Route::post('/estudios-tecnicos/importar/', 'GlobaletController@importGlobalet')->name('importAllDataET');
	Route::post('/estudios-tecnicos/importar-calidad-et/', 'GlobalcalidadetController@importGlobalcalidadet')->name('importGlobalCalidadETData');
	Route::post('/estudios-tecnicos/importar-cm-et-global/', 'CmetglobalController@importCmetglobal')->name('importCmetglobal');

	//GRÁFICOS
	Route::get('/estudios-tecnicos/datos-et-global/exportar/', 'GlobaletController@export')->name('exportAllGlobalData');
	Route::get('/estudios-tecnicos/datos-et-global/graficos/', 'GlobaletController@CMGlobalET')->name('CMGlobalET');
	Route::get('/estudios-tecnicos/calidad-et/graficos/', 'GlobaletController@CMCalidadET')->name('CMCalidadET');


//ESTUDIOS TÉCNICOS -> GCC
	Route::get('/estudios-tecnicos/gcc/', 'GccController@index')->name('getDataGCC');
	Route::post('/estudios-tecnicos/importar-cm-et-gcc/', 'GccController@importCmetGcc')->name('importCmetGccData');
	//GRÁFICO
	Route::get('/estudios-tecnicos/gcc/graficos/', 'GccController@CMGCC')->name('CMGCC');


//ESTUDIOS TÉCNICOS -> GTC
	Route::get('/estudios-tecnicos/gtc/', 'GtcController@index')->name('getDataGTC');
	Route::post('/estudios-tecnicos/importar-cm-et-gtc/', 'GtcController@importCmetGtc')->name('importCmetGtcData');
	//GRÁFICO
	Route::get('/estudios-tecnicos/gtc/graficos/', 'GtcController@CMGTC')->name('CMGTC');


// Replicas ->Global
	Route::get('/replicas/global/', 'ReplicaController@index')->name('getReplicasGlobal');
	Route::post('/replicas/global/importar/', 'ReplicaController@importReplicaGlobal')->name('importReplicasGlobal');
	Route::get('/replicas/global/exportar/', 'ReplicaController@export')->name('exportReplicasGlobal');
	Route::get('/replicas/global/graficos/', 'CmreplicasglobalController@index')->name('getGlobalReplicas');
	Route::post('/replicas/global/importar/graficos/', 'CmreplicasglobalController@importCmreplicasglobal')->name('CMGlobalReplicas');
	Route::get('/replicas/global/grafico-detallado/', 'CmreplicasglobalController@graficoDetallado')->name('CMGlobalReplicasDetallado');
	Route::post('/replicas/global/importar/graficos-detallado/', 'CmreplicasglobalController@importCmgraficoDetallado')->name('importgraficoDetallado');


	










