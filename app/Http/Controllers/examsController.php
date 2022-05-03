<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\classroom;
use App\Models\enrollment;
use App\Models\students;
use App\Models\courses;
use App\Models\exams;
class examsController extends Controller
{
 
    public function edit(exams $exam)
    {
        //
        $students = students::get();
        $classrooms = classroom::get();
        return view('edit_exam',compact('exam','students','classrooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, exams $exam)
    {
        //


        $exam->update($request->all());
$classroom = classroom::where('id_class',$exam->id_class)->first();

        return redirect()->route('classroom.show',$classroom)
            ->with('success','Examen modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(exams $exam)
    {
        //
        $enrollment->delete();

        return redirect()->route('classroom.index')
            ->with('success','Examen borrado correctamente');
    }
}
