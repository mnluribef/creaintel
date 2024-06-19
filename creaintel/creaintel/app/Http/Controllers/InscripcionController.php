<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscripcion;
use App\Models\Preinscripcion;
use App\Models\Tipo_Estudio;
use App\Models\Sede;
use App\Models\PNF;
use App\Models\Trayecto;
use App\Models\Seccion;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;
use App\Models\Sector;
use App\Models\Estudiante;
use App\Models\Turno;
use App\Models\User;
use App\Models\Docente;
use App\Models\Periodo;

class InscripcionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-inscripcion|')->only('index');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preinscripcion = Preinscripcion::all();
        $periodo = Periodo::all();

        return view('inscripcion.index', compact('preinscripcion', 'periodo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estudiantes = estudiante::all();
        $tipo_estudios = Tipo_Estudio::all();
        $sedes = sede::all();
        $pnfs = PNF::all();
        $trayectos = trayecto::all();
        $seccion = seccion::all();
        $estado = estado::all();
        $municipio = municipio::all();
        $parroquia = parroquia::all();
        $sector = sector::all();
        $turnos = turno::all();
        $inscripciones = Preinscripcion::all();

        return view('inscripcion.create', compact('estudiantes', 'tipo_estudios', 'sedes', 'pnfs', 'trayectos', 'seccion', 'estado', 'municipio', 'parroquia', 'sector', 'turnos', 'inscripciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $preinscripciones = new Preinscripcion();

        $preinscripciones->objetivo = $request->get('objetivo');
        $preinscripciones->alcance = $request->get('alcance');
        $preinscripciones->limitacion = $request->get('limitacion');
        /*         $preinscripciones->lineaInves = $request->get('lineaInves_id'); */
        $preinscripciones->aportes_comu = $request->get('aportes_comu');
        $preinscripciones->acciones_integra = $request->get('acciones_integra');
        $preinscripciones->plan_patria = $request->get('plan_patria');

        $preinscripciones->save();

        return redirect('/inscripcion');
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
        $inscripcion = preinscripcion::find($id);
        $estudiantes = estudiante::all();
        $tipo_estudios = Tipo_Estudio::all();
        $sedes = sede::all();
        $pnfs = PNF::all();
        $trayectos = trayecto::all();
        $seccion = seccion::all();
        $estado = estado::all();
        $municipio = municipio::all();
        $parroquia = parroquia::all();
        $sector = sector::all();
        $turnos = turno::all();
        $users = user::all();
        $asesores = docente::all();

        return view('inscripcion.edit', compact('inscripcion', 'pnfs', 'estudiantes', 'tipo_estudios', 'sedes', 'pnfs', 'trayectos', 'seccion', 'estado', 'municipio', 'parroquia', 'sector', 'turnos', 'asesores'));
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
        $inscripcion = preinscripcion::find($id);

        /*         $inscripcion->ci_Estudiante = $request->get('ci_Estudiante'); */
        $inscripcion->objetivo = $request->get('objetivo');
        $inscripcion->alcance = $request->get('alcance');
        $inscripcion->limitacion = $request->get('limitacion');
        $inscripcion->aportes_comu = $request->get('aportes_comu');
        $inscripcion->acciones_integra = $request->get('acciones_integra');
        $inscripcion->plan_patria = $request->get('plan_patria');

        $inscripcion->save();

        return redirect('/inscripcion');
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
