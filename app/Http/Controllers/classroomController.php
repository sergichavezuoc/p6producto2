<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\classroom;
use App\Models\courses;
use App\Models\teachers;
use App\Models\schedule;
use App\Models\exams;
use App\Models\students;
use DB;
class classroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $classrooms =classroom::with('schedule','courses','teachers')->get();
        return view('indexcl',compact('classrooms'))
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
        //$students = students::latest()->paginate(5);
        //$courses = courses::latest()->paginate(5);
        //dd($students);
        $teachers = teachers::latest()->paginate(5);
        $courses = courses::latest()->paginate(5);
        return view('add_classroom',compact('teachers','courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeExam(Request $request)
    {
    exams::create($request->all());
    return redirect()->route('classroom.index')
        ->with('success','Examen añadido correctamente.');
    }
    public function store(Request $request)
    {
        //
        $request->validate([
            'id_teacher' => 'required',
            'id_course' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
            'day' => 'required',
            'name' => 'required',
            'color' => 'required',
        ]);
        $sentencia = DB::select("SHOW TABLE status LIKE 'classrooms'");
        $nextId = $sentencia[0]->Auto_increment;
        $schedule= schedule::create(['id_class' => $nextId,'time_start' => $request['time_start'],'time_end' => $request['time_end'],'day' => $request['day']]);
        $scheduleId= $schedule -> id_schedule;
        //dd($request);
        //return $request->all();
        classroom::create(['id_schedule'=> $scheduleId, 'id_teacher' => $request['id_teacher'],'id_course' => $request['id_course'],'name' => $request['name'],'color' => $request['color']]);
        return redirect()->route('classroom.index')
            ->with('success','Class added successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(classroom $classroom)
    {
        $users = DB::table('students')
        ->join('enrollments', 'students.id', '=', 'enrollments.id_student')
        ->join('courses', 'courses.id_course', '=', 'enrollments.id_course')
        ->join('classrooms', 'courses.id_course', '=', 'classrooms.id_course')
        ->select('students.name AS nombre','students.surname AS apellido', 'courses.*', 'enrollments.*', 'classrooms.*')
        ->where('classrooms.id_class', $classroom->id_class)
        ->get();
        $trabajos = DB::table('students')
        ->join('works', 'students.id', '=', 'works.id_student')
        ->join('classrooms', 'classrooms.id_class', '=', 'works.id_class')
        ->select('students.*', 'classrooms.*', 'works.*')
        ->where('classrooms.id_class', $classroom->id_class)
        ->get();
        $examenes = DB::table('students')
        ->join('exams', 'students.id', '=', 'exams.id_student')
        ->join('classrooms', 'classrooms.id_class', '=', 'exams.id_class')
        ->select('students.*', 'students.name AS nombre','students.surname AS apellido', 'exams.name AS examen', 'exams.mark AS nota')
        ->where('classrooms.id_class', $classroom->id_class)
        ->get();
        //
        //$student = enrollment::find(1)->student;
        //$course = enrollment::find(1)->course;
        return view('classroom_details',compact('classroom','users','trabajos','examenes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(classroom $classroom)
    {
        //
        return view('edit_classroom',compact('classroom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addExam(Request $request)
    {
        $classrooms =classroom::get();
        $students =students::get();
        return view('add_exam_classroom',compact('students','classrooms','request'));
    }
    public function update(Request $request, classroom $classroom)
    {
        //
        $request->validate([
            'id_teacher' => 'required',
            'id_course' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
            'day' => 'required',
        ]);

        $classroom->update($request->all());

        return redirect()->route('classroom.index')
            ->with('success','Classroom updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(classroom $classroom)
    {
        //
        $classroom->delete();

        return redirect()->route('classroom.index')
            ->with('success','Class deleted successfully');
    }
}
