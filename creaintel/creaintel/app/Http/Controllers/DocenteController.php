<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Docente;
use App\Models\PNF;
use App\Models\Sede;
use App\Models\Prefijo;

class DocenteController extends Controller
{

        function __construct()
    {
        $this->middleware('permission:crear-docente|editar-docente')->only('index');
/*         $this->middleware('permission:ver-preinscripcion|crear-preinscripcion|editar-preinscripcion|borrar-preinscripcion')->only('index');
 */     $this->middleware('permission:crear-docente', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-docente', ['only' => ['edit', 'update']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docentes = Docente::all();
        $sedes = Sede::all();
        $prefijos = Prefijo::all();
        $pnfs = PNF::all();
        return view('docente.index', compact('docentes', 'sedes', 'prefijos', 'pnfs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $docentes = Docente::all();
        $pnfs = PNF::all();
        $sedes = Sede::all();
        $prefijos = Prefijo::all();

        return view('docente.create', compact('docentes', 'pnfs', 'sedes', 'prefijos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
/*         $this->validate($request, [
            'docente_ci' => 'required|unique:docente,docente_ci',
        ]); */

        $docente = new docente();

        $docente->docente_ci = $request->get('docente_ci');
        $docente->nombre = $request->get('nombre');
        $docente->apellido = $request->get('apellido');
        $docente->telefono = $request->get('telefono');
        $docente->PNF_id = $request->get('PNF_id');
        $docente->prefijo_id = $request->get('prefijo_id');
        $docente->sede_id = $request->get('sede_id');

        $docente->save();

        if ($docente instanceof Docente) {
            toastr()->success('¡Datos guardados!', 'Éxito');
            return redirect('/docente');
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
        $docente = docente::find($id);
        $pnfs = PNF::all();
        $sedes = Sede::all();
        $prefijos = Prefijo::all();
        return view('docente.edit', compact('docente', 'pnfs', 'sedes', 'prefijos'));
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
        $docente = docente::find($id);

        $docente->nombre = $request->get('nombre');
        $docente->apellido = $request->get('apellido');
        $docente->telefono = $request->get('telefono');
        $docente->PNF_id = $request->get('PNF_id');
        $docente->prefijo_id = $request->get('prefijo_id');
        $docente->sede_id = $request->get('sede_id');
    
        $docente->save();

        if ($docente instanceof Docente) {
            toastr()->success('¡Datos guardados!', 'Éxito');
            return redirect('/docente');
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
