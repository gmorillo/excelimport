<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Graphicproject;
use App\Imports\GraphicprojectImport;

use Illuminate\Support\Facades\DB;

use Session;
use Excel;
use File;
use Redirect;
class GraphicProjectController extends Controller
{
    public function indexProject()
    {   
        $getProjectsGraphicData = GraphicProject::orderBy('mes', 'asc')->get();
        return view('sections.proyectos.graficos.main', compact('getProjectsGraphicData'));
    }

    public function importProject(Request $request){
        //validate the xls file
        $this->validate($request, array(
            'file'      => 'required'
        ));
 
        if($request->hasFile('file')){
            $truncate = GraphicProject::truncate();
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {

                $data = Excel::import(new GraphicprojectImport,request()->file('file'));
                
                if(!empty($data)){
 
                    foreach ($data as $key => $value) {
                        $insert[] = [
                        'mes'            => $value->mes,
                        'encargados_mes' => $value->encargados_mes,
                        'terminados_mes' => $value->terminados_mes,
                        'fuera_plazo'    => $value->fuera_plazo,
                    ];
                    }
 
                    if(!empty($insert)){
 
                        $insertData = DB::table('graphicprojects')->insert($insert);
                        if ($insertData) {
                            return redirect('/seguimiento-de-proyectos/graficos/')->with('success', 'Your Data has successfully imported');
                        }else {                        
                            Session::flash('error', 'Error inserting the data..');
                            return back();
                        }
                    }
                }
 
                return redirect('/seguimiento-de-proyectos/graficos/')->with('success', 'Your Data has successfully imported');
                
 
            }else {
                return redirect('/seguimiento-de-proyectos/graficos/')->with('error', 'File is a '.$extension.' file.!! Please upload a valid xls/csv file..!!');;
            }
        }
    }
}
