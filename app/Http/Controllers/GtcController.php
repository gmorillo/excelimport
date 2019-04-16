<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Imports\GtcImport;

use Session;
use Excel;
use File;
use Redirect;
use App\Gtc;
use App\Globalet;

class GtcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getGtcdata = Globalet::where('departamento', 'GTC')->get();
        return view('sections.estudios_tecnicos.gtc.main', compact('getGtcdata'));
    }

    public function CMGTC(){
        $CMGTC = Gtc::orderBy('mes', 'asc')->get();
        return view('sections.estudios_tecnicos.gtc.cuadro_mando.main', compact('CMGTC'));
    }

    public function importCmetGtc(Request $request){
        //validate the xls file
        $this->validate($request, array(
            'file'      => 'required'
        ));
 
        if($request->hasFile('file')){
            $truncate = Gtc::truncate();
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {

                $data = Excel::import(new GtcImport,request()->file('file'));                

                // IMPORTACIÓN DATOS PARA GRÁFICO CALIDAD ET
                if(!empty($data)){
 
                    foreach ($data as $key => $value) {
                        $insert[] = [
                            preg_replace("[\n|\r|\n\r]", "",'mes')                => preg_replace("[\n|\r|\n\r]", "",$value->mes),
                            preg_replace("[\n|\r|\n\r]", "",'encargados_mes')     => preg_replace("[\n|\r|\n\r]", "",$value->encargados_mes),
                            preg_replace("[\n|\r|\n\r]", "",'terminados_mes')     => preg_replace("[\n|\r|\n\r]", "",$value->terminados_mes),
                            preg_replace("[\n|\r|\n\r]", "",'pendiente_datos')    => preg_replace("[\n|\r|\n\r]", "",$value->pendiente_datos),
                            preg_replace("[\n|\r|\n\r]", "",'pendiente_entrega')  => preg_replace("[\n|\r|\n\r]", "",$value->pendiente_entrega),
                            preg_replace("[\n|\r|\n\r]", "",'fuera_plazo')        => preg_replace("[\n|\r|\n\r]", "",$value->fuera_plazo),
                        ];
                    }
 
                    if(!empty($insert)){$insertData = DB::table('gtcs')->insert($insert);}
                }
                return redirect('/estudios-tecnicos/gtc/graficos')->with('success', 'Archivo importado correctamente');
            }else{
                return redirect('/estudios-tecnicos/gtc/graficos')->with('error', 'No se ha podido importar el documento con extensión '.$extension.' !! Porfavor importe un documento con extensión xls o csv!!');;
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
