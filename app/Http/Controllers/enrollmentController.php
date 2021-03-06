<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\enrollment;
use App\Models\students;
use App\Models\courses;
class enrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $enrollments =enrollment::with('students','courses')->get();
        //print_r($enrollments);
        return view('indexe',compact('enrollments'))
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
        $students = students::get();
        $courses = courses::get();
        //dd($students);
        return view('add_enrollment',compact('students'),compact('courses'));
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(enrollment $enrollment)
    {
        //
        $student = students::where("id",$enrollment->id_student)->find($enrollment->id_student);
        $course = courses::where("id_course",$enrollment->id_course)->find($enrollment->id_course);
        return view('enrollment_details',compact('enrollment','course','student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(enrollment $enrollment)
    {
        //
        $students = students::get();
        $courses = courses::get();
        return view('edit_enrollment',compact('enrollment','students','courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, enrollment $enrollment)
    {
        //
        $request->validate([
            'id_student' => 'required',
            'id_course' => 'required',
            'status' => 'required',
        ]);

        $enrollment->update($request->all());

        return redirect()->route('enrollment.index')
            ->with('success','Inscripci??n actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(enrollment $enrollment)
    {
        //
        $enrollment->delete();

        return redirect()->route('enrollment.index')
            ->with('success','Enrollment deleted successfully');
    }
}
