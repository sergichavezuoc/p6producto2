<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\incidences;

class incidencesController extends Controller
{
    public function incidences(){
        $incidences = DB::table('incidences')->get();
        return view('incidences_admin', compact('incidences'));
    }
    public function response( $id_incidence){
        return view('incidence_response', compact('id_incidence'));
    }
    public function addResponse(Request $request){
       
        if(isset($request['response'])){ 
            DB::select("UPDATE incidences SET response = '".$request["response"]."', incidence_read_at ='".date("Y-m-d H:i:s")."' WHERE id_incidence ='".$request["id_incidence"]."' ");
        }
        $incidences = DB::table('incidences')->get();
        return view('incidences_admin', compact('incidences'));
    }
    public function incidenceStudent(){
       // $incidences = DB::table('incidences')->where('id_student', Auth::guard('students')->user()->id);
        //var_dump($incidences->response);
        $incidences =DB::select("SELECT * FROM incidences WHERE id_student = '".Auth::guard('students')->user()->id."' ");
        return view('incidences_student', compact('incidences'));
    }
    public function addIncidence(){
        return view('addIncidences_student');
    }
    public function newIncidence(Request $request){
        
        if(isset($request['description'])){
            $insert = DB::select("INSERT INTO incidences (id_student, description) VALUES ('".Auth::guard('students')->user()->id."', '".$request['description']."' )");
            
        }
        $incidences =DB::select("SELECT * FROM incidences WHERE id_student = '".Auth::guard('students')->user()->id."' ");
        return view('incidences_student', compact('incidences'));
    }
    public function readIncidence(Request $request){
        $request->validate([
            'id_incidence' => 'required',
        ]);
        
        $incidence = incidences::where('id_incidence', $request['id_incidence'])->first();   
        $incidence->update($request->all());

        return redirect()->route('student.incidences')
        ->with('success','Incidencia marcada como leida');
    }
}
/*
 DB::select("INSERT INTO enrollment (id_student, id_course, status) VALUES (".Auth::guard('students')->user()->id.", ".$request['id_course']." , 1 )");
$notificaciones = DB::table('notifications')->where('id_student', Auth::guard('students')->user()->id)->first();
DB::select("INSERT INTO enrollment (id_student, id_course, status) VALUES (".Auth::guard('students')->user()->id.", ".$request['id_course']." , 1 )");
*/