<?php

namespace App\Http\Controllers;

use App\Models\Seccion;
use Illuminate\Http\Request;

class SeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $secciones = seccion::all();
        return view('seccion.index')->with('secciones', $secciones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $secciones = seccion::all();

        return view('seccion.create', compact('secciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $secciones = new seccion();

        $secciones->nombre_Seccion = $request->get('nombre_seccion');
        $secciones->save();

        if ($secciones instanceof Seccion) {
            toastr()->success('¡Datos guardados!', 'Éxito');
            return redirect('/seccion');
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
        $secciones = seccion::find($id);
        return view('seccion.edit')->with('secciones', $secciones);
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
        $secciones = seccion::find($id);

        $secciones->nombre_Seccion = $request->get('nombre_seccion');

        $secciones->save();

        if ($secciones instanceof Seccion) {
            toastr()->success('¡Datos guardados!', 'Éxito');
            return redirect('/seccion');
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
