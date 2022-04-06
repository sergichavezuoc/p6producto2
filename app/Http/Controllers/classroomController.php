<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\classroom;
use App\Models\courses;
use App\Models\teachers;
use App\Models\schedules;
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
        $teachers = teachers::latest()->paginate(5);
        $courses = courses::latest()->paginate(5);
        $classrooms =classroom::latest()->paginate(5);
        return view('indexcl',compact('classrooms','courses','teachers'))
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
    public function store(Request $request)
    {
        //
        $request->validate([
            'id_teacher' => 'required',
            'id_course' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
            'day' => 'required',
        ]);

        //dd($request);
        //return $request->all();
        classroom::create($request->all());
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
        //
        //$student = enrollment::find(1)->student;
        //$course = enrollment::find(1)->course;
        return view('classroom_details',compact('classroom'));
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
