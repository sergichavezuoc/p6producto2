<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\classroom;
use App\Models\enrollment;
use App\Models\students;
use App\Models\courses;
use App\Models\works;
class worksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    public function index()
    {
        //
        $works =works::with('students','classrooms')->get();
        //print_r($enrollments);
        return view('indexw',compact('works'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
*/
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    public function create()
    {
        //
        $students = students::get();
        $courses = courses::get();
        //dd($students);
        return view('add_enrollment',compact('students'),compact('courses'));
    }
*/
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*
    public function store(Request $request)
    {
        //
        $request->validate([
            'id_student' => 'required',
            'id_course' => 'required',
            'status' => 'required',
        ]);

        //dd($request);
        //return $request->all();
        enrollment::create($request->all());
        return redirect()->route('enrollment.index')
            ->with('success','Enrollment added successfully.');

    }
*/
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*
    public function show(enrollment $enrollment)
    {
        //
        $student = students::where("id",$enrollment->id_student)->find($enrollment->id_student);
        $course = courses::where("id_course",$enrollment->id_course)->find($enrollment->id_course);
        return view('enrollment_details',compact('enrollment','course','student'));
    }
*/
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit(works $work)
    {
        //
        $students = students::get();
        $classrooms = classroom::get();
        return view('edit_work',compact('work','students','classrooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, works $work)
    {
        //


        $work->update($request->all());
$classroom = classroom::where('id_class',$work->id_class)->first();

        return redirect()->route('classroom.show',$classroom)
            ->with('success','Trabajo modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(works $work)
    {
        //
        $enrollment->delete();

        return redirect()->route('classroom.index')
            ->with('success','Trabajo borrado satisfactoriamente');
    }
}
