<?php

namespace App\Http\Controllers;

use App\Models\teachers;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $profesores = teachers::latest()->paginate(5);

        return view('index',compact('profesores'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add_profesor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'telephone' => 'required',
            'nif' => 'required',
            'email' => 'required',
        ]);

        //dd($request);
        //return $request->all();
        teachers::create($request->all());
        return redirect()->route('profesor.index')
            ->with('success','Profesor added successfully.');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(teachers $profesor)
    {
        //dd($profesor);
        $classes = teachers::find($profesor->id_teacher)->classroom
        ->where('id_teacher', $profesor->id_teacher);
       return view('profesor_details',compact('profesor','classes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(teachers $profesor)
    {
        return view('edit_profesor',compact('profesor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, teachers $profesor)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'telephone' => 'required',
            'nif' => 'required',
            'email' => 'required',
        ]);

        $profesor->update($request->all());

        return redirect()->route('profesor.index')
            ->with('success','Profesor actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(teachers $profesor)
    {
        $profesor->delete();

        return redirect()->route('profesor.index')
            ->with('success','Profesor borrado correctamente');
    }
}
