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
        //$getLegalizations->setPath('https://nipsat.nipsa.es/seguimiento-de-legalizaciones');
        //$getLegalizations = Trackinglegalization::get();
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
                        preg_replace("[\n|\r|\n\r]", "",'identificador_ede')         => preg_replace("[\n|\r|\n\r]", "",$value->identificador_ede),
                        preg_replace("[\n|\r|\n\r]", "",'trabajo_gom')         => preg_replace("[\n|\r|\n\r]", "",$value->trabajo_gom),
                        preg_replace("[\n|\r|\n\r]", "",'identificador_ingenieria')  => preg_replace("[\n|\r|\n\r]", "",$value->identificador_ingenieria),
                        preg_replace("[\n|\r|\n\r]", "",'organismos_implicados')     => preg_replace("[\n|\r|\n\r]", "",$value->organismos_implicados),
                        preg_replace("[\n|\r|\n\r]", "",'tarea_tramitacion')         => preg_replace("[\n|\r|\n\r]", "",$value->tarea_tramitacion),
                        preg_replace("[\n|\r|\n\r]", "",'fecha_generacion_tareas')   => preg_replace("[\n|\r|\n\r]", "",$value->fecha_generacion_tareas),
                        preg_replace("[\n|\r|\n\r]", "",'tramite_gom') 		        => preg_replace("[\n|\r|\n\r]", "",$value->tramite_gom),
                        preg_replace("[\n|\r|\n\r]", "",'expediente_industria')      => preg_replace("[\n|\r|\n\r]", "",$value->expediente_industria),
                        preg_replace("[\n|\r|\n\r]", "",'pasado_ejecucion') 			=> preg_replace("[\n|\r|\n\r]", "",$value->pasado_ejecucion),
                        preg_replace("[\n|\r|\n\r]", "",'estado_tarea') 				=> preg_replace("[\n|\r|\n\r]", "",$value->estado_tarea),
                        preg_replace("[\n|\r|\n\r]", "",'cfo') 				         => preg_replace("[\n|\r|\n\r]", "",$value->cfo),
                        preg_replace("[\n|\r|\n\r]", "",'apm_resolucion_transmision') => preg_replace("[\n|\r|\n\r]", "",$value->apm_resolucion_transmision),
                        preg_replace("[\n|\r|\n\r]", "",'motivo_paralizacion') 	     => preg_replace("[\n|\r|\n\r]", "",$value->motivo_paralizacion),
                        preg_replace("[\n|\r|\n\r]", "",'comentarios') 			     => preg_replace("[\n|\r|\n\r]", "",$value->comentarios),
                        preg_replace("[\n|\r|\n\r]", "",'desistimiento')              => preg_replace("[\n|\r|\n\r]", "",$value->desistimiento),
                        preg_replace("[\n|\r|\n\r]", "",'expediente_finalizado')      => preg_replace("[\n|\r|\n\r]", "",$value->expediente_finalizado),
                        preg_replace("[\n|\r|\n\r]", "",'fecha_favorable_inicio_ejecucion') => preg_replace("[\n|\r|\n\r]", "",$value->fecha_favorable_inicio_ejecucion),
                        preg_replace("[\n|\r|\n\r]", "",'estado_tramitacion') 			    => preg_replace("[\n|\r|\n\r]", "",$value->estado_tramitacion),
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











