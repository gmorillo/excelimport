<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Imports\TrackinglegalizationImport;
use App\Exports\TrackinglegalizationsExport;


use Session;
use Excel;
use File;
use Redirect;
use App\Trackinglegalization;

class TrackinglegalizationController extends Controller
{
    public function index()
    {   
        $getLegalizations = Trackinglegalization::get();
        //$getLegalizations = Trackinglegalization::paginate(500);
        //$getLegalizations->setPath('https://nipsat.nipsa.es/seguimiento-de-legalizaciones');
        return view('sections.legalizaciones.main', compact('getLegalizations'));
    }

    public function import(Request $request){
        //validate the xls file
        $this->validate($request, array(
            'file'      => 'required'
        ));
 
        if($request->hasFile('file')){
            $truncate = Trackinglegalization::truncate();
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {

                $data = Excel::import(new TrackinglegalizationImport,request()->file('file'));
                
                if(!empty($data)){
 
                    foreach ($data as $key => $value) {
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
 
                        $insertData = DB::table('trackinglegalizations')->insert($insert);
                        if ($insertData) {
                            return redirect('/seguimiento-de-legalizaciones/')->with('success', 'Your Data has successfully imported');
                        }else {                        
                            Session::flash('error', 'Error inserting the data..');
                            return back();
                        }
                    }
                }
 
                return redirect('/seguimiento-de-legalizaciones/')->with('success', 'Your Data has successfully imported');
                
 
            }else {
                return redirect('/seguimiento-de-legalizaciones/')->with('error', 'File is a '.$extension.' file.!! Please upload a valid xls/csv file..!!');;
            }
        }
    }

    public function export() 
    {
        return Excel::download(new TrackinglegalizationsExport, 'Legalizaciones'.now().'.xlsx');
    }
}











