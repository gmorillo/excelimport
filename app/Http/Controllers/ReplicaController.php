<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Imports\ReplicaImport;
use App\Exports\ReplicaExport;

use Session;
use Excel;
use File;
use Redirect;
use App\Replica;

class ReplicaController extends Controller
{
    public function index()
    {
        $getReplicas = Replica::get();
        return view('sections.replicas.global.main', compact('getReplicas'));
    }

    public function importReplicaGlobal(Request $request){
        //validate the xls file
        $this->validate($request, array(
            'file'      => 'required'
        ));
 
        if($request->hasFile('file')){
            $truncate = Replica::truncate();
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {

                $data = Excel::import(new ReplicaImport,request()->file('file'));                

                // IMPORTACIÓN DATOS GLOBALES REPLICA
                if(!empty($data)){
 
                    foreach ($data as $key => $value) {
                        $insert[] = [
                            'tecnico_ede'           => $value->tecnico_ede,
                            'provincia'             => $value->provincia,
                            'departamento'          => $value->departamento,
                            'tipo'                  => $value->tipo,
                            'gom'                   => $value->gom,
                            'solicitud'             => $value->solicitud,
                            'descripcion'           => $value->descripcion,
                            'fecha_encargo'         => $value->fecha_encargo,
                            'ads_odm'               => $value->ads_odm,
                            'protocolo_atlante'     => $value->protocolo_atlante,
                            'fecha_diseno_atlante'  => $value->fecha_diseno_atlante,
                            'estado_atlante'        => $value->estado_atlante,
                            'fin_atlante'           => $value->fin_atlante,
                            'proyecto_agp'          => $value->proyecto_agp,
                            'estado_agp'            => $value->estado_agp,
                            'fin_agp'               => $value->fin_agp,
                            'finca'                 => $value->finca,
                            'tiempo_replica'        => $value->tiempo_replica,
                            'lca'                   => $value->lca,
                            'fecha_concluso'        => $value->fecha_concluso,
                            'ing_estudio'           => $value->ing_estudio,
                            'observaciones'         => $value->observaciones,
                            'plazos_atlante'        => $value->plazos_atlante,
                            'plazos_replica'        => $value->plazos_replica,
                            'tecnico_nipsa'         => $value->tecnico_nipsa,
                            'proyecto_nipsa'        => $value->proyecto_nipsa,
                            'pendiente_endesa'      => $value->pendiente_endesa,
                            'plazo'                 => $value->plazo,
                        ];
                    }
 
                    if(!empty($insert)){$insertData = DB::table('replicas')->insert($insert);}
                }
                return redirect('/replicas/global/')->with('success', 'Archivo importado correctamente');
            }else{
                return redirect('/replicas/global/')->with('error', 'No se ha podido importar el documento con extensión '.$extension.' !! Porfavor importe un documento con extensión xls o csv!!');;
            }
        }
    }

    public function export() 
    {
        return Excel::download(new ReplicaExport, 'Replica_Global'.now().'.xlsx');
    }

}
