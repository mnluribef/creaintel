<?php

namespace App\Http\Controllers;

use App\Models\Periodo;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PeriodoController extends Controller
{

        function __construct()
    {
        $this->middleware('permission:editar-periodo')->only('index');
/*         $this->middleware('permission:ver-preinscripcion|crear-preinscripcion|editar-preinscripcion|borrar-preinscripcion')->only('index');
 */     $this->middleware('permission:editar-periodo', ['only' => ['edit', 'update']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $fecha_apertura = Periodo::select('fecha_apertura')->value('fecha_apertura');
        $fecha_cierre = Periodo::select('fecha_cierre')->value('fecha_cierre');

        $fecha_apertura_format = Carbon::createFromFormat('Y-m-d', $fecha_apertura)->format('d/m/Y');
        $fecha_cierre_format = Carbon::createFromFormat('Y-m-d', $fecha_cierre)->format('d/m/Y');
        $periodo = Periodo::all();

        return view('periodo.index', compact('periodo', 'fecha_apertura_format', 'fecha_cierre_format'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $periodo = Periodo::all();

        return view('periodo.create', compact('periodo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $periodo = new Periodo();

        $periodo->anio_academico = $request->get('anio_academico');
        $periodo->fecha_apertura = $request->get('fecha_apertura');
        $periodo->fecha_cierre = $request->get('fecha_cierre');

        $periodo->save();

        if ($periodo instanceof Periodo) {
            toastr()->success('¡Datos guardados!', 'Éxito');
            return redirect('/periodo');
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
        $periodo = Periodo::find($id);        
        return view('periodo.edit', compact('periodo'));
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
        $periodo = Periodo::find($id);
        $periodo->anio_academico = $request->get('anio_academico');
        $periodo->fecha_apertura = $request->get('fecha_apertura');
        $periodo->fecha_cierre = $request->get('fecha_cierre');

        $periodo->save();

        if ($periodo instanceof Periodo) {
            toastr()->success('¡Datos guardados!', 'Éxito');
            return redirect('/periodo');
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
