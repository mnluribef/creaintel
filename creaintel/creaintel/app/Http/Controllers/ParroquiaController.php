<?php

namespace App\Http\Controllers;


use App\Models\Parroquia;
use Illuminate\Http\Request;

class ParroquiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parroquias = parroquia::all();
        return view('Parroquia.index')->with('parroquias', $parroquias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $parroquias = parroquia::all();

        return view('Parroquia.create', compact('parroquias'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parroquias = new parroquia();

        $parroquias->nombre_Parroquia = $request->get('nombre_parroquia');
        $parroquias->save();

        return redirect('/parroquia');
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
        $parroquias = parroquia::find($id);
        return view('parroquia.edit')->with('parroquias', $parroquias);
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
        $parroquias = parroquia::find($id);

        $parroquias->nombre_Parroquia = $request->get('nombre_Parroquia');

        $parroquias->save();

        return redirect('/parroquia');
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
