<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Docente;
use App\Models\PNF;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tutor = docente::all();
        return view('docente.index')->with('docente', $tutor);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $tutor = docente::all();
        $pnfs = PNF::all();

        return view('docente.create', compact('docente', 'pnfs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tutor = new docente();

        $tutor->docente_ci = $request->get('docente_ci');
        $tutor->nombre = $request->get('nombre');
        $tutor->apellido = $request->get('apellido');
        $tutor->telefono = $request->get('telefono');
        $tutor->PNF_id = $request->get('PNF_id');

        $tutor->save();

        return redirect('/docente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tutor = docente::find($id);
        $pnfs = PNF::all();
        return view('docente.edit', compact('docente', 'pnfs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tutor = docente::find($id);

        $tutor->nombre = $request->get('nombre');
        $tutor->apellido = $request->get('apellido');
        $tutor->telefono = $request->get('telefono');
        $tutor->PNF_id = $request->get('PNF_id');
        $tutor->cargo = $request->get('cargo');
        $tutor->tiempo_servicio = $request->get('tiempo_servicio');
        

        $tutor->save();

        return redirect('/docente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
