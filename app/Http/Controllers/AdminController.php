<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\incidences;
class AdminController extends Controller
{
    //
    public function dashboard()
    {
        $incidences = incidences::all()->where('response','=','');
        // $cursos = DB::select("SELECT courses.name AS curso from courses INNER JOIN enrollment ON enrollment.id_course=courses.id_course INNER JOIN students on students.id=enrollment.id_student WHERE students.id=".Auth::guard('students')->user()->id);
         $incidencesCount = $incidences->count();
        return view('adminDashboard',compact('incidencesCount'));
    }
}
