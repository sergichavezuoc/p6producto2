<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\courses;
use DB;
class coursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $courses =courses::latest()->paginate(5);

        return view('indexc',compact('courses'))
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
        return view('add_course');
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
            'description' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
            'active' => 'required',
        ]);

        //dd($request);
        //return $request->all();
        courses::create($request->all());
        return redirect()->route('courses.index')
            ->with('success','Course added successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(courses $course)
    {
        //
        $users = DB::table('courses')
        ->join('enrollments', 'courses.id_course', '=', 'enrollments.id_course')
        ->join('students', 'students.id', '=', 'enrollments.id_student')
        ->select('students.*','students.name as nombre', 'courses.*', 'enrollments.*')
        ->where('courses.id_course', $course->id_course)
        ->get();
        $clases = DB::table('classrooms')
        ->join('courses', 'courses.id_course', '=', 'classrooms.id_course')
        ->select('courses.*', 'classrooms.*','classrooms.name as clase')
        ->where('courses.id_course', $course->id_course)
        ->get();
        return view('courses_details',compact('course','users','clases'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(courses $course)
    {
        //
        return view('edit_courses',compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, courses $course)
    {
        //
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
            'active' => 'required',
        ]);

        $course->update($request->all());

        return redirect()->route('courses.index')
            ->with('success','Course updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(courses $course)
    {
        //
        $course->delete();

        return redirect()->route('courses.index')
            ->with('success','Course deleted successfully');
    }
}
