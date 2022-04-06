<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\students;
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
        $students = students::latest()->paginate(5);
        $enrollments = students::find(1)->enrollments;
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
        return view('students_details',compact('student'),compact('enrollments'));
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
