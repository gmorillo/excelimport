<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Imports\GlobaletImport;
use App\Exports\GlobaletExport;
use App\Imports\gccImport;

use Session;
use Excel;
use File;
use Redirect;
use App\Globalet;
use App\Gcc;
use App\Cmetglobal;
use App\Globalcalidadet;

class GlobaletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getGlobaldata = Globalet::get();
        return view('sections.estudios_tecnicos.global.datos.main', compact('getGlobaldata'));
    }

    public function CMGlobalET(){
        $CMGlobalETData = Cmetglobal::orderBy('mes', 'asc')->get();
        return view('sections.estudios_tecnicos.global.cuadro_mando.main', compact('CMGlobalETData'));
    }

    public function CMCalidadET(){
        $CMCalidadETData = Globalcalidadet::orderBy('mes', 'asc')->get();
        return view('sections.estudios_tecnicos.global.calidad.main', compact('CMCalidadETData'));
    }

    public function importGlobalet(Request $request){
        //validate the xls file
        $this->validate($request, array(
            'file'      => 'required'
        ));
 
        if($request->hasFile('file')){
            $truncate = Globalet::truncate();
            //$truncate = gcc::truncate();
            //$truncate = Trackingproject::truncate();
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {

                $data = Excel::import(new GlobaletImport,request()->file('file'));
                //$datagcc = Excel::import(new TrackinglegalizationImport,request()->file('file'));
                //$dataTrackingProject = Excel::import(new TrackingprojectsImport,request()->file('file'));
                

                // IMPORTACIÓN DE SEGUIMIENTOS UNIFICADOS
                if(!empty($data)){
 
                    foreach ($data as $key => $value) {
                        $insert[] = [
                        'ingenieria'                => $value->ingenieria,
                        'zona'                      => $value->zona,
                        'codigo_expediente'         => $value->codigo_expediente,
                        'solicitud_principal'       => $value->solicitud_principal,
                        'tipo'                      => $value->tipo,
                        'subtipo'                   => $value->subtipo,
                        'descripcion_expediente'    => $value->descripcion_expediente,
                        'potencia_solicitada'       => $value->potencia_solicitada,
                        'tecnico_gestion_comercial' => $value->tecnico_gestion_comercial,
                        'tecnico_gestion_tecnica'   => $value->tecnico_gestion_tecnica,
                        'estado'                    => $value->estado,
                        'estado_solicitud'          => $value->estado_solicitud,
                        'fecha_asignacion'          => $value->fecha_asignacion,
                        'plazo_legal_contestacion'  => $value->plazo_legal_contestacion,
                        'fecha_hora_apertura'       => $value->fecha_hora_apertura,
                        'fecha_contestacion'        => $value->fecha_contestacion,
                        'fecha_limite'              => $value->fecha_limite,
                        'departamento'              => $value->departamento,
                        ];
                    }
 
                    if(!empty($insert)){
 
                        $insertData = DB::table('globalets')->insert($insert);
                        /*if ($insertData) {
                            return redirect('/estudios-tecnicos/global/')->with('success', 'Your Data has successfully imported');
                        }else {                        
                            Session::flash('error', 'Error inserting the data..');
                            return back();
                        }*/
                    }
                }

                //IMPORTACIÓN GCC
                /*if(!empty($datagcc)){
 
                    foreach ($datagcc as $key => $value) {
                        $insert[] = [
                            'ingenieria'                => $value->ingenieria,
                            'zona'                      => $value->zona,
                            'codigo_expediente'         => $value->codigo_expediente,
                            'solicitud_principal'       => $value->solicitud_principal,
                            'tipo'                      => $value->tipo,
                            'subtipo'                   => $value->subtipo,
                            'descripcion_expediente'    => $value->descripcion_expediente,
                            'potencia_solicitada'       => $value->potencia_solicitada,
                            'tecnico_gestion_comercial' => $value->tecnico_gestion_comercial,
                            'tecnico_gestion_tecnica'   => $value->tecnico_gestion_tecnica,
                            'estado'                    => $value->estado,
                            'estado_solicitud'          => $value->estado_solicitud,
                            'fecha_asignacion'          => $value->fecha_asignacion,
                            'plazo_legal_contestacion'  => $value->plazo_legal_contestacion,
                            'fecha_hora_apertura'       => $value->fecha_hora_apertura,
                            'fecha_contestacion'        => $value->fecha_contestacion,
                            'fecha_limite'              => $value->fecha_limite,
                        ];
                    }
 
                    if(!empty($insert)){
 
                        $insertdatagcc = DB::table('gccs')->insert($insert);
                        if ($insertdatagcc) {
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
                }*/
 
                return redirect('/')->with('success', 'Your Data has successfully imported');
                
 
            }else {
                return redirect('/')->with('error', 'File is a '.$extension.' file.!! Please upload a valid xls/csv file..!!');;
            }
        }
    }

    public function export() 
    {
        return Excel::download(new GlobaletExport, 'Datos_ET_Global'.now().'.xlsx');
    }
}
