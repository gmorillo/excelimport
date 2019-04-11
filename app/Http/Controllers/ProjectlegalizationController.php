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
        $getAlldata = Projectlegalization::get();
        //$titulo_encargo = preg_replace("/[\r\n|\n|\r]+/", PHP_EOL, Projectlegalization::get('titulo_encargo'));
        //return $string;
        //$getAlldata = Projectlegalization::paginate(500);
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
 
                    foreach ($data as $key => $value) {
                        $insert[] = [
                        
                        'provincia'                 => $value->provincia,
                        'codigo_nipsa'              => $value->codigo_nipsa,
                        'tarea_proyecto'            => $value->tarea_proyecto,
                        'fecha_encargo'             => $value->fecha_encargo,
                        'fecha_entrega'             => $value->fecha_entrega,
                        'titulo_encargo'            => $value->titulo_encargo,
                        'tecnico_endesa'            => $value->tecnico_endesa,
                        'tipo_trabajo'              => $value->tipo_trabajo,
                        'poblacion'                 => $value->poblacion,
                        'codigo_centro'             => $value->codigo_centro,
                        'propiedad'                 => $value->propiedad,
                        'tipo'                      => $value->tipo,
                        'legal'                     => $value->legal,
                        'departamento'              => $value->departamento,
                        'solicitud_nnss'            => $value->solicitud_nnss,
                        'trabajo_gom'               => $value->trabajo_gom,
                        'organismos_implicados'     => $value->organismos_implicados,
                        'tarea_lca'                 => $value->tarea_lca,
                        'fecha_generacion'          => $value->fecha_generacion,
                        'tramite_gom'               => $value->tramite_gom,
                        'expte_industria'           => $value->expte_industria,
                        'pasado_ejecucion'          => $value->pasado_ejecucion,
                        'estado_tarea'              => $value->estado_tarea,
                        'cfo'                       => $value->cfo,
                        'apm'                       => $value->apm,
                        'motivo_paralizacion'       => $value->motivo_paralizacion,
                        'observaciones'             => $value->observaciones,
                        'desistimiento'             => $value->desistimiento,
                        'expediente_finalizado'     => $value->expediente_finalizado,
                        'fecha_favorable'           => $value->fecha_favorable,
                        'estado_tramitacion'        => $value->estado_tramitacion,
                        'dias_plazo'                => $value->dias_plazo,
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
 
                    foreach ($dataTrackingLegalization as $key => $value) {
                        $insert[] = [
                        'identificador_ede'         => $value->identificador_ede,
                        'trabajo_gom'         => $value->trabajo_gom,
                        'identificador_ingenieria'  => $value->identificador_ingenieria,
                        'organismos_implicados'     => $value->organismos_implicados,
                        'tarea_tramitacion'         => $value->tarea_tramitacion,
                        'fecha_generacion_tareas'   => $value->fecha_generacion_tareas,
                        'tramite_gom'               => $value->tramite_gom,
                        'expediente_industria'      => $value->expediente_industria,
                        'pasado_ejecucion'          => $value->pasado_ejecucion,
                        'estado_tarea'              => $value->estado_tarea,
                        'cfo'                        => $value->cfo,
                        'apm_resolucion_transmision' => $value->apm_resolucion_transmision,
                        'motivo_paralizacion'        => $value->motivo_paralizacion,
                        'comentarios'                => $value->comentarios,
                        'desistimiento'              => $value->desistimiento,
                        'expediente_finalizado'      => $value->expediente_finalizado,
                        'fecha_favorable_inicio_ejecucion' => $value->fecha_favorable_inicio_ejecucion,
                        'estado_tramitacion'                => $value->estado_tramitacion,
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
 
                    foreach ($dataTrackingProject as $key => $value) {
                        $insert[] = [
                        'identificador_ede'         => $value->identificador_ede,
                        'trabajo_gom'               => $value->trabajo_gom,
                        'tipo'                      => $value->tipo,
                        'identificador_ingenieria'  => $value->identificador_ingenieria,
                        'lca'                       => $value->lca,
                        'descripcion'               => $value->descripción,
                        'municipio'                 => $value->topología,
                        'topologia'                 => $value->municipio,
                        'fecha_pedido'              => $value->fecha_pedido,
                        'fecha_entrega'             => $value->fecha_entrega,
                        'plazo'                     => $value->plazo,
                        'provincia'                     => $value->provincia,
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
                return redirect('/seguimiento-proyecto-legalizaciones/')->with('error', 'File is a '.$extension.' file.!! Please upload a valid xls/csv file..!!');;
            }
        }
    }

    public function export() 
    {
        return Excel::download(new ProjectlegalizationExport, 'Seguimiento_Proyecto_Legalizaciones'.now().'.xlsx');
    }
}
