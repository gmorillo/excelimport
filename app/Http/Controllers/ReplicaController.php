<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Imports\ReplicaImport;

use Session;
use Excel;
use File;
use Redirect;
use App\Replica;

class ReplicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
                            preg_replace("[\n|\r|\n\r]", "",'tecnico_ede')           => preg_replace("[\n|\r|\n\r]", "",$value->tecnico_ede),
                            preg_replace("[\n|\r|\n\r]", "",'provincia')             => preg_replace("[\n|\r|\n\r]", "",$value->provincia),
                            preg_replace("[\n|\r|\n\r]", "",'departamento')          => preg_replace("[\n|\r|\n\r]", "",$value->departamento),
                            preg_replace("[\n|\r|\n\r]", "",'tipo')                  => preg_replace("[\n|\r|\n\r]", "",$value->tipo),
                            preg_replace("[\n|\r|\n\r]", "",'gom')                   => preg_replace("[\n|\r|\n\r]", "",$value->gom),
                            preg_replace("[\n|\r|\n\r]", "",'solicitud')             => preg_replace("[\n|\r|\n\r]", "",$value->solicitud),
                            preg_replace("[\n|\r|\n\r]", "",'descripcion')           => preg_replace("[\n|\r|\n\r]", "",$value->descripcion),
                            preg_replace("[\n|\r|\n\r]", "",'fecha_encargo')         => preg_replace("[\n|\r|\n\r]", "",$value->fecha_encargo),
                            preg_replace("[\n|\r|\n\r]", "",'ads_odm')               => preg_replace("[\n|\r|\n\r]", "",$value->ads_odm),
                            preg_replace("[\n|\r|\n\r]", "",'protocolo_atlante')     => preg_replace("[\n|\r|\n\r]", "",$value->protocolo_atlante),
                            preg_replace("[\n|\r|\n\r]", "",'fecha_diseno_atlante')  => preg_replace("[\n|\r|\n\r]", "",$value->fecha_diseno_atlante),
                            preg_replace("[\n|\r|\n\r]", "",'estado_atlante')        => preg_replace("[\n|\r|\n\r]", "",$value->estado_atlante),
                            preg_replace("[\n|\r|\n\r]", "",'fin_atlante')           => preg_replace("[\n|\r|\n\r]", "",$value->fin_atlante),
                            preg_replace("[\n|\r|\n\r]", "",'proyecto_agp')          => preg_replace("[\n|\r|\n\r]", "",$value->proyecto_agp),
                            preg_replace("[\n|\r|\n\r]", "",'estado_agp')            => preg_replace("[\n|\r|\n\r]", "",$value->estado_agp),
                            preg_replace("[\n|\r|\n\r]", "",'fin_agp')               => preg_replace("[\n|\r|\n\r]", "",$value->fin_agp),
                            preg_replace("[\n|\r|\n\r]", "",'finca')                 => preg_replace("[\n|\r|\n\r]", "",$value->finca),
                            preg_replace("[\n|\r|\n\r]", "",'tiempo_replica')        => preg_replace("[\n|\r|\n\r]", "",$value->tiempo_replica),
                            preg_replace("[\n|\r|\n\r]", "",'lca')                   => preg_replace("[\n|\r|\n\r]", "",$value->lca),
                            preg_replace("[\n|\r|\n\r]", "",'fecha_concluso')        => preg_replace("[\n|\r|\n\r]", "",$value->fecha_concluso),
                            preg_replace("[\n|\r|\n\r]", "",'ing_estudio')           => preg_replace("[\n|\r|\n\r]", "",$value->ing_estudio),
                            preg_replace("[\n|\r|\n\r]", "",'observaciones')         => preg_replace("[\n|\r|\n\r]", "",$value->observaciones),
                            preg_replace("[\n|\r|\n\r]", "",'plazos_atlante')        => preg_replace("[\n|\r|\n\r]", "",$value->plazos_atlante),
                            preg_replace("[\n|\r|\n\r]", "",'plazos_replica')        => preg_replace("[\n|\r|\n\r]", "",$value->plazos_replica),
                            preg_replace("[\n|\r|\n\r]", "",'tecnico_nipsa')         => preg_replace("[\n|\r|\n\r]", "",$value->tecnico_nipsa),
                            preg_replace("[\n|\r|\n\r]", "",'proyecto_nipsa')        => preg_replace("[\n|\r|\n\r]", "",$value->proyecto_nipsa),
                            preg_replace("[\n|\r|\n\r]", "",'pendiente_endesa')      => preg_replace("[\n|\r|\n\r]", "",$value->pendiente_endesa),
                            preg_replace("[\n|\r|\n\r]", "",'plazo')                 => preg_replace("[\n|\r|\n\r]", "",$value->plazo),
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
