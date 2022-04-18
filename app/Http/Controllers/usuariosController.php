<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\students;
use App\Models\notifications;
use Illuminate\Support\Facades\Auth;
use DB;
class usuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $calendario = DB::select("SELECT schedule.time_start, schedule.time_end, schedule.day, courses.name AS CURSO, classrooms.color AS COLOR, classrooms.name AS NOMBRE FROM users INNER JOIN enrollments ON enrollments.id_student=users.id INNER JOIN courses ON courses.id_course=enrollments.id_course INNER JOIN classrooms ON classrooms.id_course=courses.id_course INNER JOIN schedule ON schedule.id_class=classrooms.id_class WHERE users.id=1");
        return view('indexu',compact('calendario'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(students $student)
    {
        //
        //$notificaciones = DB::select("SELECT * FROM notifications WHERE id_student='".Auth::guard('students')->user()->id."' LIMIT 1");
        $notificaciones = DB::table('notifications')->where('id_student', Auth::guard('students')->user()->id)->first();
        return view('edit_profile',compact('student','notificaciones'));
    }
    public function update(Request $request, students $student)
    {
        //
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'work' => 'required',
            'exam' => 'required',
            'continuous_assessment' => 'required',
            'final_note' => 'required',

        ]);
        $sentencia = DB::select("UPDATE students SET username='".$request["username"]."', email='".$request["email"]."', password='".password_hash($request["password"], PASSWORD_DEFAULT)."' WHERE id='".$request["estudiante"]."'");        
        $notificaciones = DB::select("SELECT * FROM notifications WHERE id_student='".$request["estudiante"]."'");
        if ($notificaciones==false){
            notifications::create(['id_student'=>$request["estudiante"],'work'=>$request["work"],'exam'=>$request["exam"],'continuous_assessment'=>$request["continuous_assessment"],'final_note'=>$request["final_note"]]);
        }
        else {
            $notificaciones = DB::select("UPDATE notifications SET work=".$request["work"].", exam=".$request["exam"].", continuous_assessment=".$request["continuous_assessment"].", final_note=".$request["final_note"]." WHERE id_student='".$request["estudiante"]."'");
        };
        return redirect()->route('usuarios.index')
            ->with('success','Perfil acualizado correctamente');
    } 
}
