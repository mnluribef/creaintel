<?php

namespace App\Http\Controllers;


use App\Models\Municipio;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $municipios = municipio::all();
        return view('municipio.index')->with('municipios', $municipios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $municipios = municipio::all();

        return view('municipio.create', compact('municipios'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $municipios = new municipio();

        $municipios->nombre_Municipio = $request->get('nombre_municipio');
        $municipios->save();

        if ($municipios instanceof municipio) {
            toastr()->success('¡Datos guardados!', 'Éxito');
            return redirect('/municipio');
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
        $municipios = municipio::find($id);
        return view('municipio.edit')->with('municipios', $municipios);
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
        $municipios = municipio::find($id);

        $municipios->nombre_Municipio = $request->get('nombre_municipio');

        $municipios->save();

        if ($municipios instanceof municipio) {
            toastr()->success('¡Datos guardados!', 'Éxito');
            return redirect('/municipio');
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
