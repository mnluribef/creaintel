<?php

namespace App\Http\Controllers;

use App\Models\Linea_Inves;
use App\Models\PNF;
use Illuminate\Http\Request;

class LineaInvesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lineainve = linea_inves::all();
        $pnf = PNF::all();
        return view('lineainves.index', compact('lineainve', 'pnf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lineainve = linea_inves::all();

        return view('lineainves.create', compact('lineainve'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lineainve = new linea_inves();

        $lineainve->nombre_LineaInve = $request->get('nombre_lineainves');
        $lineainve->descripcion = $request->get('descripcion');
        $lineainve->pnf_id = $request->get('pnf_id');
        $lineainve->save();

        if ($lineainve instanceof linea_inves) {
            toastr()->success('¡Datos guardados!', 'Éxito');
            return redirect('/lineainves');
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
        $lineainve = linea_inves::find($id);
        return view('lineainves.edit')->with('lineainve', $lineainve);
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
        $lineainve = linea_inves::find($id);

        $lineainve->nombre_LineaInve = $request->get('nombre_lineainves');
        $lineainve->descripcion = $request->get('descripcion');
        $lineainve->pnf_id = $request->get('pnf_id');

        $lineainve->save();

        if ($lineainve instanceof linea_inves) {
            toastr()->success('¡Datos guardados!', 'Éxito');
            return redirect('/lineainves');
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
