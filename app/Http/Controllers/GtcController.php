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

class GtcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
                            'mes'                => $value->mes,
                            'encargados_mes'     => $value->encargados_mes,
                            'terminados_mes'     => $value->terminados_mes,
                            'pendiente_datos'    => $value->pendiente_datos,
                            'pendiente_entrega'  => $value->pendiente_entrega,
                            'fuera_plazo'        => $value->fuera_plazo,
                        ];
                    }
 
                    if(!empty($insert)){$insertData = DB::table('gtcs')->insert($insert);}
                }
                return redirect('/')->with('success', 'Archivo importado correctamente');
            }else{
                return redirect('/')->with('error', 'No se ha podido importar el documento con extensión '.$extension.' !! Porfavor importe un documento con extensión xls o csv!!');;
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
