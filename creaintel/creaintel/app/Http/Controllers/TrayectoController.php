<?php

namespace App\Http\Controllers;


use App\Models\Trayecto;
use Illuminate\Http\Request;

class TrayectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trayectos = trayecto::all();
        return view('Trayecto.index')->with('trayectos', $trayectos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $trayectos = trayecto::all();

        return view('Trayecto.create', compact('trayectos'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trayectos = new trayecto();

        $trayectos->nombre_Trayecto = $request->get('nombre_trayecto');
        $trayectos->save();

        if ($trayectos instanceof Trayecto) {
            toastr()->success('¡Datos guardados!', 'Éxito');
            return redirect('/trayecto');
        } else {

            toastr()->error('Se ha producido un error, inténtalo de nuevo más tarde.');

            return back();
        } 
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
        $trayectos = trayecto::find($id);
        return view('trayecto.edit')->with('trayectos', $trayectos);
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
        $trayectos = trayecto::find($id);

        $trayectos->nombre_Trayecto = $request->get('nombre_trayecto');

        $trayectos->save();

        if ($trayectos instanceof Trayecto) {
            toastr()->success('¡Datos guardados!', 'Éxito');
            return redirect('/trayecto');
        } else {

            toastr()->error('Se ha producido un error, inténtalo de nuevo más tarde.');

            return back();
        } 
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
