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
        $enrollments =enrollment::latest()->paginate(5);
        $students = students::latest()->paginate(5);
        $courses = courses::latest()->paginate(5);
        return view('indexe',compact('enrollments'),compact('students'),compact('courses'))
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
        $students = students::latest()->paginate(5);
        $courses = courses::latest()->paginate(5);
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
        $student = enrollment::find(1)->student;
        $course = enrollment::find(1)->course;
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
        return view('edit_enrollment',compact('enrollment'));
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
            ->with('success','Enrollment updated successfully');
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
