<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Imports\CmreplicaglobalImport;
use App\Imports\CmreplicaglobaldetalladaImport;
use Session;
use Excel;
use File;
use Redirect;
use App\Cmreplicaglobal;
use App\Cmreplicaglobaldetallada;

class CmreplicasglobalController extends Controller
{
	public function index(){
		$GraficoReplicas = Cmreplicaglobal::orderBy('mes', 'asc')->get();
        return view('sections.replicas.global.cuadro_mando.main', compact('GraficoReplicas'));
	}

    public function graficoDetallado(){
        $GraficoReplicasdetallada = Cmreplicaglobaldetallada::orderBy('mes', 'asc')->get();
        return view('sections.replicas.global.cm_detallado.main', compact('GraficoReplicasdetallada'));
    }

    public function importCmreplicasglobal(Request $request){
        //validate the xls file
        $this->validate($request, array(
            'file'      => 'required'
        ));
 
        if($request->hasFile('file')){
            $truncate = Cmreplicaglobal::truncate();
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {

                $data = Excel::import(new CmreplicaglobalImport,request()->file('file'));                

                // IMPORTACIÓN DATOS PARA GRÁFICO CALIDAD ET
                if(!empty($data)){
 
                    foreach ($data as $key => $value) {
                        $insert[] = [
                            'mes'                => $value->mes,
                            'encargados_mes'     => $value->encargados_mes,
                            'terminados_mes'     => $value->terminados_mes,
                            'pendiente_entrega'  => $value->pendiente_entrega,
                            'fuera_plazo'        => $value->fuera_plazo,
                        ];
                    }
 
                    if(!empty($insert)){$insertData = DB::table('cmreplicaglobals')->insert($insert);}
                }
                return redirect('/replicas/global/graficos/')->with('success', 'Archivo importado correctamente');
            }else{
                return redirect('/replicas/global/graficos/')->with('error', 'No se ha podido importar el documento con extensión '.$extension.' !! Porfavor importe un documento con extensión xls o csv!!');;
            }
        }
    }

    public function importCmgraficoDetallado(Request $request){
        //validate the xls file
        $this->validate($request, array(
            'file'      => 'required'
        ));
 
        if($request->hasFile('file')){
            $truncate = Cmreplicaglobaldetallada::truncate();
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {

                $data = Excel::import(new CmreplicaglobaldetalladaImport,request()->file('file'));                

                // IMPORTACIÓN DATOS PARA GRÁFICO CALIDAD ET
                if(!empty($data)){
 
                    foreach ($data as $key => $value) {
                        $insert[] = [
                            'tipo'               => $value->tipo,
                            'mes'                => $value->mes,
                            'encargados_mes'     => $value->encargados_mes,
                            'terminados_mes'     => $value->terminados_mes,
                            'fuera_plazo'        => $value->fuera_plazo,
                        ];
                    }
 
                    if(!empty($insert)){$insertData = DB::table('cmreplicaglobaldetalladas')->insert($insert);}
                }
                return redirect('/replicas/global/grafico-detallado/')->with('success', 'Archivo importado correctamente');
            }else{
                return redirect('/replicas/global/grafico-detallado/')->with('error', 'No se ha podido importar el documento con extensión '.$extension.' !! Porfavor importe un documento con extensión xls o csv!!');;
            }
        }
    }
}
