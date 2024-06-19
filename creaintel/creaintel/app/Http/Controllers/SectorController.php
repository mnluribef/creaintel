<?php

namespace App\Http\Controllers;


use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sectores = sector::all();
        return view('Sector.index')->with('sectores', $sectores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $sectores = sector::all();

        return view('Sector.create', compact('sectores'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sectores = new sector();

        $sectores->nombre_Sector = $request->get('nombre_sector');
        $sectores->save();

        if ($sectores instanceof sector) {
            toastr()->success('¡Datos guardados!', 'Éxito');
            return redirect('/sector');
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
        $sectores = sector::find($id);
        return view('sector.edit')->with('sectores', $sectores);
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
        $sectores = sector::find($id);

        $sectores->nombre_Sector = $request->get('nombre_sector');

        $sectores->save();

        if ($sectores instanceof sector) {
            toastr()->success('¡Datos guardados!', 'Éxito');
            return redirect('/sector');
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
