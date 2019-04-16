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
                        preg_replace("[\n|\r|\n\r]", "",'ingenieria')                => preg_replace("[\n|\r|\n\r]", "",$value->ingenieria),
                        preg_replace("[\n|\r|\n\r]", "",'zona')                      => preg_replace("[\n|\r|\n\r]", "",$value->zona),
                        preg_replace("[\n|\r|\n\r]", "",'codigo_expediente')         => preg_replace("[\n|\r|\n\r]", "",$value->codigo_expediente),
                        preg_replace("[\n|\r|\n\r]", "",'solicitud_principal')       => preg_replace("[\n|\r|\n\r]", "",$value->solicitud_principal),
                        preg_replace("[\n|\r|\n\r]", "",'tipo')                      => preg_replace("[\n|\r|\n\r]", "",$value->tipo),
                        preg_replace("[\n|\r|\n\r]", "",'subtipo')                   => preg_replace("[\n|\r|\n\r]", "",$value->subtipo),
                        preg_replace("[\n|\r|\n\r]", "",'descripcion_expediente')    => preg_replace("[\n|\r|\n\r]", "",$value->descripcion_expediente),
                        preg_replace("[\n|\r|\n\r]", "",'potencia_solicitada')       => preg_replace("[\n|\r|\n\r]", "",$value->potencia_solicitada),
                        preg_replace("[\n|\r|\n\r]", "",'tecnico_gestion_comercial') => preg_replace("[\n|\r|\n\r]", "",$value->tecnico_gestion_comercial),
                        preg_replace("[\n|\r|\n\r]", "",'tecnico_gestion_tecnica')   => preg_replace("[\n|\r|\n\r]", "",$value->tecnico_gestion_tecnica),
                        preg_replace("[\n|\r|\n\r]", "",'estado')                    => preg_replace("[\n|\r|\n\r]", "",$value->estado),
                        preg_replace("[\n|\r|\n\r]", "",'estado_solicitud')          => preg_replace("[\n|\r|\n\r]", "",$value->estado_solicitud),
                        preg_replace("[\n|\r|\n\r]", "",'fecha_asignacion')          => preg_replace("[\n|\r|\n\r]", "",$value->fecha_asignacion),
                        preg_replace("[\n|\r|\n\r]", "",'plazo_legal_contestacion')  => preg_replace("[\n|\r|\n\r]", "",$value->plazo_legal_contestacion),
                        preg_replace("[\n|\r|\n\r]", "",'fecha_hora_apertura')       => preg_replace("[\n|\r|\n\r]", "",$value->fecha_hora_apertura),
                        preg_replace("[\n|\r|\n\r]", "",'fecha_contestacion')        => preg_replace("[\n|\r|\n\r]", "",$value->fecha_contestacion),
                        preg_replace("[\n|\r|\n\r]", "",'fecha_limite')              => preg_replace("[\n|\r|\n\r]", "",$value->fecha_limite),
                        preg_replace("[\n|\r|\n\r]", "",'departamento')              => preg_replace("[\n|\r|\n\r]", "",$value->departamento),
                        ];
                    }
                    if(!empty($insert)){$insertData = DB::table('globalets')->insert($insert);}
                }

                return redirect('/estudios-tecnicos/datos-et-global/')->with('success', 'Your Data has successfully imported');
                
 
            }else {
                return redirect('/estudios-tecnicos/datos-et-global/')->with('error', 'File is a '.$extension.' file.!! Please upload a valid xls/csv file..!!');;
            }
        }
    }

    public function export() 
    {
        return Excel::download(new GlobaletExport, 'Datos_ET_Global'.now().'.xlsx');
    }
}
