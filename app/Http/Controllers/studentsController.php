<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\students;
use App\Models\enrollment;
use DB;
class studentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $students = students::with('enrollments')->get();
        // dd($enrollments);

        return view('indexs',compact('students'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('add_student');
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
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
        ]);

        //dd($request);
        //return $request->all();
        students::create($request->all());
        return redirect()->route('students.index')
            ->with('success','Student added successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(students $student)
    {
        //
        $enrollments = students::find(1)->enrollments;
        $users = DB::table('students')
        ->join('enrollments', 'students.id', '=', 'enrollments.id_student')
        ->join('courses', 'courses.id_course', '=', 'enrollments.id_course')
        ->select('students.*', 'courses.*', 'enrollments.*')
        ->where('students.id', $student->id)
        ->get();
        $trabajos = DB::table('students')
        ->join('works', 'students.id', '=', 'works.id_student')
        ->join('classrooms', 'classrooms.id_class', '=', 'works.id_class')
        ->select('students.*', 'classrooms.*', 'classrooms.name AS clase', 'works.*', 'works.name AS trabajo', 'works.mark AS nota')
        ->where('students.id', $student->id)
        ->get();
        $examenes = DB::table('students')
        ->join('exams', 'students.id', '=', 'exams.id_student')
        ->join('classrooms', 'classrooms.id_class', '=', 'exams.id_class')
        ->select('students.*', 'classrooms.name AS clase', 'exams.*', 'exams.name AS examen', 'exams.mark AS nota')
        ->where('students.id', $student->id)
        ->get();
        $notas_examenes=DB::select("SELECT COUNT(exams.id_exam) AS total_notas, SUM(exams.mark) AS nota_examenes, SUM(exams.mark)/COUNT(exams.id_exam) AS media_examenes, students.name, classrooms.name AS clase, students.id AS estudiante FROM students INNER JOIN enrollments ON enrollments.id_student=students.id INNER JOIN courses ON courses.id_course=enrollments.id_course  INNER JOIN classrooms ON classrooms.id_course=courses.id_course LEFT JOIN exams ON exams.id_class=classrooms.id_class AND exams.id_student=students.id WHERE exams.mark IS NOT NULL AND students.id=".$student->id." GROUP by classrooms.id_class,students.id");
        $notas_trabajos=DB::select("SELECT COUNT(works.id_work) AS total_notas, SUM(works.mark) AS nota_trabajos, SUM(works.mark)/COUNT(works.id_work) AS media_trabajos, students.name, classrooms.name AS clase, students.id AS estudiante FROM students INNER JOIN enrollments ON enrollments.id_student=students.id INNER JOIN courses ON courses.id_course=enrollments.id_course  INNER JOIN classrooms ON classrooms.id_course=courses.id_course LEFT JOIN works ON works.id_class=classrooms.id_class AND works.id_student=students.id WHERE works.mark IS NOT NULL AND students.id=".$student->id." GROUP by classrooms.id_class,students.id");
        //$notas_examenes=DB::select("SELECT COUNT(exams.id_exam) AS total_notas, SUM(exams.mark) AS nota_examenes, SUM(exams.mark)/COUNT(exams.id_exam) AS media_examenes, students.name, classrooms.name, students.id AS estudiante FROM students INNER JOIN enrollments ON enrollments.id_student=students.id INNER JOIN courses ON courses.id_course=enrollments.id_course  INNER JOIN classrooms ON classrooms.id_course=courses.id_course LEFT JOIN exams ON exams.id_class=classrooms.id_class AND exams.id_student=students.id WHERE exams.mark IS NOT NULL GROUP by classrooms.id_class,students.id");
        //$notas_trabajos=DB::select("SELECT COUNT(works.id_work) AS total_notas, SUM(works.mark) AS nota_trabajos, SUM(works.mark)/COUNT(works.id_work) AS media_trabajos, students.name, classrooms.name, students.id AS estudiante FROM students INNER JOIN enrollments ON enrollments.id_student=students.id INNER JOIN courses ON courses.id_course=enrollments.id_course  INNER JOIN classrooms ON classrooms.id_course=courses.id_course LEFT JOIN works ON works.id_class=classrooms.id_class AND works.id_student=students.id WHERE works.mark IS NOT NULL GROUP by classrooms.id_class,students.id");
        return view('students_details',compact('student','users','trabajos','examenes','notas_examenes','notas_trabajos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(students $student)
    {
        //
        return view('edit_students',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, students $student)
    {
        //
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')
            ->with('success','Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(students $student)
    {
        //
        $student->delete();

        return redirect()->route('students.index')
            ->with('success','Student deleted successfully');
    }
}
