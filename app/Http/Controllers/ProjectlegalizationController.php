<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Imports\ProjectlegalizationImport;
use App\Imports\TrackinglegalizationImport;
use App\Imports\TrackingprojectsImport;
use App\Exports\ProjectlegalizationExport;


use Session;
use Excel;
use File;
use Redirect;
use App\Projectlegalization;
use App\Trackinglegalization;
use App\Trackingproject;

class ProjectlegalizationController extends Controller
{
    public function index()
    {   
        //$getAlldata = Projectlegalization::get();
        //$titulo_encargo = preg_replace("/[\r\n|\n|\r]+/", PHP_EOL, Projectlegalization::get('titulo_encargo'));
        //return $string;
        $getAlldata = Projectlegalization::get();
        //$getAlldata = preg_replace("[\n|\r|\n\r]", "", $datosTabla);
        //$getAlldata->setPath('https://nipsat.nipsa.es/seguimiento-proyecto-legalizaciones');
        return view('sections.seguimiento_proyectos_legalizaciones.main', compact('getAlldata'));
    }

    public function import(Request $request){
        //validate the xls file
        $this->validate($request, array(
            'file'      => 'required'
        ));
 
        if($request->hasFile('file')){
            $truncate = Projectlegalization::truncate();
            $truncate = Trackinglegalization::truncate();
            $truncate = Trackingproject::truncate();
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {

                $data = Excel::import(new ProjectlegalizationImport,request()->file('file'));
                $dataTrackingLegalization = Excel::import(new TrackinglegalizationImport,request()->file('file'));
                $dataTrackingProject = Excel::import(new TrackingprojectsImport,request()->file('file'));
                

                // IMPORTACIÓN DE SEGUIMIENTOS UNIFICADOS
                if(!empty($data)){
 
                    foreach ($data as $key => $value){
                        $insert[] = [
                        
                        preg_replace("[\n|\r|\n\r]", "",'provincia')                 => preg_replace("[\n|\r|\n\r]", "",$value->provincia),
                        preg_replace("[\n|\r|\n\r]", "",'codigo_nipsa')              => preg_replace("[\n|\r|\n\r]", "",$value->codigo_nipsa),
                        preg_replace("[\n|\r|\n\r]", "",'tarea_proyecto')            => preg_replace("[\n|\r|\n\r]", "",$value->tarea_proyecto),
                        preg_replace("[\n|\r|\n\r]", "",'fecha_encargo')             => preg_replace("[\n|\r|\n\r]", "",$value->fecha_encargo),
                        preg_replace("[\n|\r|\n\r]", "",'fecha_entrega')             => preg_replace("[\n|\r|\n\r]", "",$value->fecha_entrega),
                        preg_replace("[\n|\r|\n\r]", "",'titulo_encargo')            => preg_replace("[\n|\r|\n\r]", "",$value->titulo_encargo),
                        preg_replace("[\n|\r|\n\r]", "",'tecnico_endesa')            => preg_replace("[\n|\r|\n\r]", "",$value->tecnico_endesa),
                        preg_replace("[\n|\r|\n\r]", "",'tipo_trabajo')              => preg_replace("[\n|\r|\n\r]", "",$value->tipo_trabajo),
                        preg_replace("[\n|\r|\n\r]", "",'poblacion')                 => preg_replace("[\n|\r|\n\r]", "",$value->poblacion),
                        preg_replace("[\n|\r|\n\r]", "",'codigo_centro')             => preg_replace("[\n|\r|\n\r]", "",$value->codigo_centro),
                        preg_replace("[\n|\r|\n\r]", "",'propiedad')                 => preg_replace("[\n|\r|\n\r]", "",$value->propiedad),
                        preg_replace("[\n|\r|\n\r]", "",'tipo')                      => preg_replace("[\n|\r|\n\r]", "",$value->tipo),
                        preg_replace("[\n|\r|\n\r]", "",'legal')                     => preg_replace("[\n|\r|\n\r]", "",$value->legal),
                        preg_replace("[\n|\r|\n\r]", "",'departamento')              => preg_replace("[\n|\r|\n\r]", "",$value->departamento),
                        preg_replace("[\n|\r|\n\r]", "",'solicitud_nnss')            => preg_replace("[\n|\r|\n\r]", "",$value->solicitud_nnss),
                        preg_replace("[\n|\r|\n\r]", "",'trabajo_gom')               => preg_replace("[\n|\r|\n\r]", "",$value->trabajo_gom),
                        preg_replace("[\n|\r|\n\r|+]", "",'organismos_implicados')     => preg_replace("[\n|\r|\n\r|+]", "",$value->organismos_implicados),
                        preg_replace("[\n|\r|\n\r]", "",'tarea_lca')                 => preg_replace("[\n|\r|\n\r]", "",$value->tarea_lca),
                        preg_replace("[\n|\r|\n\r]", "",'fecha_generacion')          => preg_replace("[\n|\r|\n\r]", "",$value->fecha_generacion),
                        preg_replace("[\n|\r|\n\r]", "",'tramite_gom')               => preg_replace("[\n|\r|\n\r]", "",$value->tramite_gom),
                        preg_replace("[\n|\r|\n\r]", "",'expte_industria')           => preg_replace("[\n|\r|\n\r]", "",$value->expte_industria),
                        preg_replace("[\n|\r|\n\r]", "",'pasado_ejecucion')          => preg_replace("[\n|\r|\n\r]", "",$value->pasado_ejecucion),
                        preg_replace("[\n|\r|\n\r]", "",'estado_tarea')              => preg_replace("[\n|\r|\n\r]", "",$value->estado_tarea),
                        preg_replace("[\n|\r|\n\r]", "",'cfo')                       => preg_replace("[\n|\r|\n\r]", "",$value->cfo),
                        preg_replace("[\n|\r|\n\r]", "",'apm')                       => preg_replace("[\n|\r|\n\r]", "",$value->apm),
                        preg_replace("[\n|\r|\n\r]", "",'motivo_paralizacion')       => preg_replace("[\n|\r|\n\r]", "",$value->motivo_paralizacion),
                        preg_replace("[\n|\r|\n\r]", "",'observaciones')             => preg_replace("[\n|\r|\n\r]", "",$value->observaciones),
                        preg_replace("[\n|\r|\n\r]", "",'desistimiento')             => preg_replace("[\n|\r|\n\r]", "",$value->desistimiento),
                        preg_replace("[\n|\r|\n\r]", "",'expediente_finalizado')     => preg_replace("[\n|\r|\n\r]", "",$value->expediente_finalizado),
                        preg_replace("[\n|\r|\n\r]", "",'fecha_favorable')           => preg_replace("[\n|\r|\n\r]", "",$value->fecha_favorable),
                        preg_replace("[\n|\r|\n\r]", "",'estado_tramitacion')        => preg_replace("[\n|\r|\n\r]", "",$value->estado_tramitacion),
                        preg_replace("[\n|\r|\n\r]", "",'dias_plazo')                => preg_replace("[\n|\r|\n\r]", "",$value->dias_plazo),
                        ];
                    }
 
                    if(!empty($insert)){
 
                        $insertData = DB::table('trackinglegalizations')->insert($insert);
                        if ($insertData) {
                            return redirect('/seguimiento-proyecto-legalizaciones/')->with('success', 'Your Data has successfully imported');
                        }else {                        
                            Session::flash('error', 'Error inserting the data..');
                            return back();
                        }
                    }
                }

                //IMPORTACIÓN DE SEGUIMIENTOS LEGALIZACIONES
                if(!empty($dataTrackingLegalization)){
 
                    foreach ($dataTrackingLegalization as $key =>$value ){
                        $insert[] = [
                        preg_replace("[\n|\r|\n\r]", "",'identificador_ede')         => preg_replace("[\n|\r|\n\r]", "",$value->identificador_ede),
                        preg_replace("[\n|\r|\n\r]", "",'trabajo_gom')         => preg_replace("[\n|\r|\n\r]", "",$value->trabajo_gom),
                        preg_replace("[\n|\r|\n\r]", "",'identificador_ingenieria')  => preg_replace("[\n|\r|\n\r]", "",$value->identificador_ingenieria),
                        preg_replace("[\n|\r|\n\r|+]", "",'organismos_implicados')     => preg_replace("[\n|\r|\n\r]", "",$value->organismos_implicados),
                        preg_replace("[\n|\r|\n\r]", "",'tarea_tramitacion')         => preg_replace("[\n|\r|\n\r]", "",$value->tarea_tramitacion),
                        preg_replace("[\n|\r|\n\r]", "",'fecha_generacion_tareas')   => preg_replace("[\n|\r|\n\r]", "",$value->fecha_generacion_tareas),
                        preg_replace("[\n|\r|\n\r]", "",'tramite_gom')               => preg_replace("[\n|\r|\n\r]", "",$value->tramite_gom),
                        preg_replace("[\n|\r|\n\r]", "",'expediente_industria')      => preg_replace("[\n|\r|\n\r]", "",$value->expediente_industria),
                        preg_replace("[\n|\r|\n\r]", "",'pasado_ejecucion')          => preg_replace("[\n|\r|\n\r]", "",$value->pasado_ejecucion),
                        preg_replace("[\n|\r|\n\r]", "",'estado_tarea')              => preg_replace("[\n|\r|\n\r]", "",$value->estado_tarea),
                        preg_replace("[\n|\r|\n\r]", "",'cfo')                        => preg_replace("[\n|\r|\n\r]", "",$value->cfo),
                        preg_replace("[\n|\r|\n\r]", "",'apm_resolucion_transmision') => preg_replace("[\n|\r|\n\r]", "",$value->apm_resolucion_transmision),
                        preg_replace("[\n|\r|\n\r]", "",'motivo_paralizacion')        => preg_replace("[\n|\r|\n\r]", "",$value->motivo_paralizacion),
                        preg_replace("[\n|\r|\n\r]", "",'comentarios')                => preg_replace("[\n|\r|\n\r]", "",$value->comentarios),
                        preg_replace("[\n|\r|\n\r]", "",'desistimiento')              => preg_replace("[\n|\r|\n\r]", "",$value->desistimiento),
                        preg_replace("[\n|\r|\n\r]", "",'expediente_finalizado')      => preg_replace("[\n|\r|\n\r]", "",$value->expediente_finalizado),
                        preg_replace("[\n|\r|\n\r]", "",'fecha_favorable_inicio_ejecucion') => preg_replace("[\n|\r|\n\r]", "",$value->fecha_favorable_inicio_ejecucion),
                        preg_replace("[\n|\r|\n\r]", "",'estado_tramitacion')                => preg_replace("[\n|\r|\n\r]", "",$value->estado_tramitacion),
                        ];
                    }
 
                    if(!empty($insert)){
 
                        $insertdataTrackingLegalization = DB::table('trackinglegalizations')->insert($insert);
                        if ($insertataTrackingLegalization) {
                            return redirect('/seguimiento-de-legalizaciones/')->with('success', 'Your Data has successfully imported');
                        }else {                        
                            Session::flash('error', 'Error inserting the data..');
                            return back();
                        }
                    }
                }

                //IMPORTACIÓN DE SEGUIMIENTOS PROYECTOS               
                if(!empty($dataTrackingProject)){
 
                    foreach ($dataTrackingProject as $key => $value){
                        $insert[] = [
                        preg_replace("[\n|\r|\n\r]", "",'identificador_ede')         => preg_replace("[\n|\r|\n\r]", "",$value->identificador_ede),
                        preg_replace("[\n|\r|\n\r]", "",'trabajo_gom')               => preg_replace("[\n|\r|\n\r]", "",$value->trabajo_gom),
                        preg_replace("[\n|\r|\n\r]", "",'tipo')                      => preg_replace("[\n|\r|\n\r]", "",$value->tipo),
                        preg_replace("[\n|\r|\n\r]", "",'identificador_ingenieria')  => preg_replace("[\n|\r|\n\r]", "",$value->identificador_ingenieria),
                        preg_replace("[\n|\r|\n\r]", "",'lca')                       => preg_replace("[\n|\r|\n\r]", "",$value->lca),
                        preg_replace("[\n|\r|\n\r]", "",'descripcion')               => preg_replace("[\n|\r|\n\r]", "",$value->descripción),
                        preg_replace("[\n|\r|\n\r]", "",'municipio')                 => preg_replace("[\n|\r|\n\r]", "",$value->topología),
                        preg_replace("[\n|\r|\n\r]", "",'topologia')                 => preg_replace("[\n|\r|\n\r]", "",$value->municipio),
                        preg_replace("[\n|\r|\n\r]", "",'fecha_pedido')              => preg_replace("[\n|\r|\n\r]", "",$value->fecha_pedido),
                        preg_replace("[\n|\r|\n\r]", "",'fecha_entrega')             => preg_replace("[\n|\r|\n\r]", "",$value->fecha_entrega),
                        preg_replace("[\n|\r|\n\r]", "",'plazo')                     => preg_replace("[\n|\r|\n\r]", "",$value->plazo),
                        preg_replace("[\n|\r|\n\r]", "",'provincia')                 => preg_replace("[\n|\r|\n\r]", "",$value->provincia),
                        ];
                    }
 
                    if(!empty($insert)){
 
                        $insertdataTrackingProject = DB::table('trackingprojects')->insert($insert);
                        if ($insertdataTrackingProject) {
                            return redirect('/seguimiento-de-proyectos/')->with('success', 'Your Data has successfully imported');
                        }else {                        
                            Session::flash('error', 'Error inserting the data..');
                            return back();
                        }
                    }
                }
 
                return redirect('/seguimiento-proyecto-legalizaciones/')->with('success', 'Your Data has successfully imported');
                
 
            }else {
                return redirect('/seguimiento-proyecto-legalizaciones/')->with('error', 'File is a '.$extension.') file.!! Please upload a valid xls/csv file..!!');;
            }
        }
    }

    public function export() 
    {
        return Excel::download(new ProjectlegalizationExport, 'Seguimiento_Proyecto_Legalizaciones'.now().'.xlsx');
    }
}
