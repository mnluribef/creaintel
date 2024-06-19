<?php

namespace App\Http\Controllers;

use App\Models\PNF;
use Illuminate\Http\Request;

class PNFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pnfs = PNF::all();
        return view('pnf.index')->with('pnfs', $pnfs);
    }

    public function dependiente(Request $request)
    {
        $pnf = PNF::when(request()->input('sede_id'), function ($query) {
            $query->where('sede_id', request()->input('sede_id'));
        })->pluck('nombre_Sede', 'id');

        return response()->json($pnf);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pnfs = PNF::all();

        return view('pnf.create', compact('pnfs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pnfs = new PNF();

        $pnfs->nombre_PNF = $request->get('nombre_PNF');
        $pnfs->save();

        if ($pnfs instanceof PNF) {
            toastr()->success('¡Datos guardados!', 'Éxito');
            return redirect('/pnf');
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

        $pnfs = PNF::find($id);
        return view('pnf.edit')->with('pnf', $pnfs);
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
        $pnfs = PNF::find($id);

        $pnfs->nombre_PNF = $request->get('nombre_PNF');

        $pnfs->save();

        if ($pnfs instanceof PNF) {
            toastr()->success('¡Datos guardados!', 'Éxito');
            return redirect('/pnf');
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
