<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Imports\TrackingprojectsImport;
use App\Exports\TrackingprojectsExport;

use Session;
use Excel;
use File;
use Redirect;
use App\Trackingproject;
use App\Http\Controllers\Controller;

class TrackingprojectController extends Controller
{
    public function index()
    {   
        $getTrackingProjects = Trackingproject::get();
        //$getTrackingProjects = Trackingproject::paginate(500);
        //$getTrackingProjects->setPath('https://nipsat.nipsa.es/seguimiento-de-proyectos');
        
        return view('sections.proyectos.main', compact('getTrackingProjects'));
    }

    public function import(Request $request){
        //validate the xls file
        $this->validate($request, array(
            'file'      => 'required'
        ));
 
        if($request->hasFile('file')){
            $truncate = Trackingproject::truncate();
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {

                $data = Excel::import(new TrackingprojectsImport,request()->file('file'));
                
                if(!empty($data)){
 
                    foreach ($data as $key => $value) {
                        $insert[] = [
                        'identificador_ede'         => $value->identificador_ede,
                        'tramite_gom'               => $value->tramite_gom,
                        'identificador_ingenieria'  => $value->identificador_ingenieria,
                        'lca'                       => $value->lca,
                        'descripcion'               => $value->descripción,
                        'municipio'                 => $value->municipio,
                        'topologia'                 => $value->topología,
                        'tipo'                      => $value->tipo,
                        'fecha_pedido'              => $value->fecha_pedido,
                        'fecha_entrega'             => $value->fecha_entrega,
                        'plazo'                     => $value->plazo,
                        ];
                    }
 
                    if(!empty($insert)){
 
                        $insertData = DB::table('trackingprojects')->insert($insert);
                        if ($insertData) {
                            return redirect('/seguimiento-de-proyectos/')->with('success', 'Your Data has successfully imported');
                        }else {                        
                            Session::flash('error', 'Error inserting the data..');
                            return back();
                        }
                    }
                }
 
                return redirect('/seguimiento-de-proyectos/')->with('success', 'Your Data has successfully imported');
                
 
            }else {
                return redirect('/seguimiento-de-proyectos/')->with('error', 'File is a '.$extension.' file.!! Please upload a valid xls/csv file..!!');;
            }
        }
    }

    public function export() 
    {
        return Excel::download(new TrackingprojectsExport, 'Proyectos.xlsx'.now().'.xlsx');
    }

}






