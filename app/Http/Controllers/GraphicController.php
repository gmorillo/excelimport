<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Graphiclegalization;
use App\Imports\GraphiclegalizationImport;
use Illuminate\Support\Facades\DB;

use Session;
use Excel;
use File;
use Redirect;

class GraphicController extends Controller
{
    public function indexLegalization()
    {   
        $getLegalizationsGraphicData = Graphiclegalization::orderBy('mes', 'asc')->get();
        return view('sections.legalizaciones.graficos.main', compact('getLegalizationsGraphicData'));
    }

    public function importLegalization(Request $request){
        //validate the xls file
        $this->validate($request, array(
            'file'      => 'required'
        ));
 
        if($request->hasFile('file')){
            $truncate = Graphiclegalization::truncate();
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {

                $data = Excel::import(new GraphiclegalizationImport,request()->file('file'));
 				
                if(!empty($data)){
 
                    foreach ($data as $key => $value) {
                        $insert[] = [
                        'mes' 		        => $value->mes,
                        'encargados_mes'      => $value->encargados_mes,
                        'terminados_mes' 			=> $value->terminados_mes,
                        'fuera_plazo' 				=> $value->fuera_plazo,
                        'pasado_ejecucion' 				         => $value->pasado_ejecucion,
                        'administracion' => $value->administracion,
                        'contrata' 	     => $value->contrata,
                        'endesa' 			     => $value->endesa,
                        'ingenieria'              => $value->ingenieria,
                        ];
                    }
 
                    if(!empty($insert)){
 
                        $insertData = DB::table('graphiclegalizations')->insert($insert);
                        if ($insertData) {
                            return redirect('/seguimiento-de-legalizaciones/graficos/')->with('success', 'Your Data has successfully imported');
                        }else {                        
                            Session::flash('error', 'Error inserting the data..');
                            return back();
                        }
                    }
                }
 
                return redirect('/seguimiento-de-legalizaciones/graficos/')->with('success', 'Your Data has successfully imported');
                
 
            }else {
                return redirect('/seguimiento-de-legalizaciones/graficos/')->with('error', 'File is a '.$extension.' file.!! Please upload a valid xls/csv file..!!');;
            }
        }
    }

}
