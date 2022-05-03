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
