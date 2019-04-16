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
       // $getTrackingProjects->setPath('https://nipsat.nipsa.es/seguimiento-de-proyectos');

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
                        preg_replace("[\n|\r|\n\r]", "",'identificador_ede')         => preg_replace("[\n|\r|\n\r]", "",$value->identificador_ede),
                        preg_replace("[\n|\r|\n\r]", "",'tramite_gom')               => preg_replace("[\n|\r|\n\r]", "",$value->tramite_gom),
                        preg_replace("[\n|\r|\n\r]", "",'identificador_ingenieria')  => preg_replace("[\n|\r|\n\r]", "",$value->identificador_ingenieria),
                        preg_replace("[\n|\r|\n\r]", "",'lca')                       => preg_replace("[\n|\r|\n\r]", "",$value->lca),
                        preg_replace("[\n|\r|\n\r]", "",'descripcion')               => preg_replace("[\n|\r|\n\r]", "",$value->descripción),
                        preg_replace("[\n|\r|\n\r]", "",'municipio')                 => preg_replace("[\n|\r|\n\r]", "",$value->municipio),
                        preg_replace("[\n|\r|\n\r]", "",'topologia')                 => preg_replace("[\n|\r|\n\r]", "",$value->topología),
                        preg_replace("[\n|\r|\n\r]", "",'tipo')                      => preg_replace("[\n|\r|\n\r]", "",$value->tipo),
                        preg_replace("[\n|\r|\n\r]", "",'fecha_pedido')              => preg_replace("[\n|\r|\n\r]", "",$value->fecha_pedido),
                        preg_replace("[\n|\r|\n\r]", "",'fecha_entrega')             => preg_replace("[\n|\r|\n\r]", "",$value->fecha_entrega),
                        preg_replace("[\n|\r|\n\r]", "",'plazo')                     => preg_replace("[\n|\r|\n\r]", "",$value->plazo),
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






