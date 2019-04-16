<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Imports\StudentsImport;
use App\Imports\UsersImport;

use Session;
use Excel;
use File;
use Redirect;
 
class StudentController extends Controller
{
    public function index()
    {
        return view('sections.home.main');
    }
 
    public function import(Request $request){
        //validate the xls file
        $this->validate($request, array(
            'file'      => 'required'
        ));
 
        if($request->hasFile('file')){
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {

                $data = Excel::import(new StudentsImport,request()->file('file'));
                $dataTwo = Excel::import(new UsersImport,request()->file('file'));
 				
                if(!empty($data)){
 
                    foreach ($data as $key => $value) {
                        $insert[] = [
                        'name' => $value->name,
                        'email' => $value->email,
                        'phone' => $value->phone,
                        ];
                    }
 
                    if(!empty($insert)){
 
                        $insertData = DB::table('students')->insert($insert);
                        if ($insertData) {
                            return redirect('/')->with('success', 'Your Data has successfully imported');
                        }else {                        
                            Session::flash('error', 'Error inserting the data..');
                            return back();
                        }
                    }
                }

                if (!empty($dataTwo)) {
                        foreach ($dataTwo as $key => $userdata) {
                            $insertUser[] = [
                                'email' => $userdata->email,
                            ];
                        }

                        if(!empty($insertUser)){
                            $insertDataRecord = DB::table('users')->insert($insertUser);
                            if ($insertDataRecord) {
                                return redirect('/')->with('success', 'Your Data has successfully imported');
                            }else {                        
                                return redirect('/')->with('error', 'Error inserting the data..');
                            }
                        }
                    }
 
                return redirect('/administration')->with('success', 'Your Data has successfully imported');
                
 
            }else {
                return redirect('/')->with('error', 'File is a '.$extension.' file.!! Please upload a valid xls/csv file..!!');;
            }
        }
    }
 
     
}