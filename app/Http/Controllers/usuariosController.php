<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\students;
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
    
}
