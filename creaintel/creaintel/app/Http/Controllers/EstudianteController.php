<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Lider;
use App\Models\Prefijo;
use App\Models\Sede;
use App\Models\PNF;
use Illuminate\Contracts\Validation\Validator;
use Yoeunes\Toastr\Facades\Toastr;


class EstudianteController extends Controller
{

    function __construct()
    {
      $this->middleware('permission:crear-estudiante|editar-estudiante')->only('index');
/*       $this->middleware('permission:ver-preinscripcion|crear-preinscripcion|editar-preinscripcion|borrar-preinscripcion')->only('index');
 */ 
    $this->middleware('permission:crear-estudiante', ['only' => ['create', 'store']]);
    $this->middleware('permission:editar-estudiante', ['only' => ['edit', 'update']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     
    public function index()
    {
        $estudiante = Estudiante::all();
        $lider = Lider::all();
        $prefijos = Prefijo::all();
        $sedes = Sede::all();
        $pnfs = PNF::all();
        return view('estudiante.index', compact('estudiante', 'lider', 'prefijos', 'sedes', 'pnfs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $estudiante = Estudiante::all();
        $lider = Lider::all();
        $prefijos = Prefijo::all();
        $sedes = Sede::all();

        return view('estudiante.create', compact('estudiante', 'lider', 'prefijos', 'sedes'));
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
            'estudiante_ci' => 'required|unique:estudiante,estudiante_ci',
        ]);
 */

        $estudiante = new Estudiante();

        $estudiante->estudiante_ci = $request->get('estudiante_ci');
        $estudiante->nombre = $request->get('nombre');
        $estudiante->apellido = $request->get('apellido');
        $estudiante->telefono = $request->get('telefono');
        $estudiante->correo = $request->get('correo');
        $estudiante->prefijo_id = $request->get('prefijo_id');
        $estudiante->sede_id = $request->get('sede_id');
        $estudiante->PNF_id = $request->get('PNF_id');
        $estudiante->lider_id = $request->get('lider_id');

        $estudiante->save();
        
         if ($estudiante instanceof Estudiante) {
            toastr()->success('¡Datos guardados!', 'Éxito');
            return redirect('/estudiante');
        }
        else{

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
        $estudiante = estudiante::find($id);
        $prefijos = prefijo::all();
        $sedes = Sede::all();

        return view('estudiante.edit', compact('estudiante', 'prefijos', 'sedes'));
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
        $estudiante = estudiante::find($id);

        $estudiante->nombre = $request->get('nombre');
        $estudiante->apellido = $request->get('apellido');
        $estudiante->telefono = $request->get('telefono');
        $estudiante->correo = $request->get('correo');
        $estudiante->prefijo_id = $request->get('prefijo_id');
        $estudiante->sede_id = $request->get('sede_id');
        $estudiante->PNF_id = $request->get('PNF_id');
        
        $estudiante->save();

        if ($estudiante instanceof Estudiante) {
            toastr()->success('¡Datos guardados!', 'Éxito');
            return redirect('/estudiante');
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
