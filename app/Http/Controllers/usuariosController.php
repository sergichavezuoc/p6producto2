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
        $calendario = DB::select("SELECT schedule.time_start, schedule.time_end, schedule.day, courses.name AS CURSO, classrooms.color AS COLOR, classrooms.name AS NOMBRE FROM users INNER JOIN enrollments ON enrollments.id_student=users.id INNER JOIN courses ON courses.id_course=enrollments.id_course INNER JOIN classrooms ON classrooms.id_course=courses.id_course INNER JOIN schedule ON schedule.id_class=classrooms.id_class WHERE users.id=".Auth::guard('students')->user()->id);
        return view('indexu',compact('calendario'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function dashboard()
    {
        //
        return view('dashboard');
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
    public function expediente ()
    {
        $notas_examenes=DB::select("SELECT exams.mark AS nota_examen, exams.name AS nombre,classrooms.id_class AS identificador_clase, classrooms.name AS clase FROM students INNER JOIN enrollments ON enrollments.id_student=students.id INNER JOIN courses ON courses.id_course=enrollments.id_course  INNER JOIN classrooms ON classrooms.id_course=courses.id_course INNER JOIN exams ON exams.id_class=classrooms.id_class AND exams.id_student=students.id WHERE exams.mark IS NOT NULL AND exams.id_student=".Auth::guard('students')->user()->id);
        $notas_trabajos=DB::select("SELECT works.mark AS nota_trabajo, works.name AS nombre,classrooms.id_class AS identificador_clase, classrooms.name AS clase FROM students INNER JOIN enrollments ON enrollments.id_student=students.id INNER JOIN courses ON courses.id_course=enrollments.id_course  INNER JOIN classrooms ON classrooms.id_course=courses.id_course INNER JOIN works ON works.id_class=classrooms.id_class AND works.id_student=students.id WHERE works.mark IS NOT NULL AND works.id_student=".Auth::guard('students')->user()->id);
        $notas=DB::select("SELECT COUNT(exams.id_exam) AS total_notas, SUM(exams.mark) AS nota_examenes,classrooms.id_class AS identificador_clase, SUM(exams.mark)/COUNT(exams.id_exam) AS media_examenes, students.name, classrooms.name AS clase, students.id AS estudiante, COUNT(works.id_work) AS total_notas_works, SUM(works.mark) AS nota_trabajos, SUM(works.mark)/COUNT(works.id_work) AS media_trabajos FROM students INNER JOIN enrollments ON enrollments.id_student=students.id INNER JOIN courses ON courses.id_course=enrollments.id_course  INNER JOIN classrooms ON classrooms.id_course=courses.id_course LEFT JOIN works ON works.id_class=classrooms.id_class AND works.id_student=students.id LEFT JOIN exams ON exams.id_class=classrooms.id_class AND exams.id_student=students.id WHERE exams.mark IS NOT NULL AND exams.id_student=".Auth::guard('students')->user()->id." GROUP by classrooms.id_class ");
        // $notas_trabajos=DB::select("SELECT  students.name, classrooms.name AS clase, students.id AS estudiante FROM students INNER JOIN enrollments ON enrollments.id_student=students.id INNER JOIN courses ON courses.id_course=enrollments.id_course  INNER JOIN classrooms ON classrooms.id_course=courses.id_course LEFT JOIN works ON works.id_class=classrooms.id_class AND works.id_student=students.id WHERE works.mark IS NOT NULL AND classrooms.id_class=".$classroom->id_class." GROUP by classrooms.id_class,students.id");
//print_r($notas_examenes);
        return view('expediente',compact('notas','notas_examenes','notas_trabajos'));
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
        return view('dashboard')
            ->with('success','Perfil acualizado correctamente');
    } 
}
