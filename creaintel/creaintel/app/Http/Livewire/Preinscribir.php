<?php

namespace App\Http\Livewire;

use Livewire\Component;
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
use App\Models\Status;
use App\Models\User;
use App\Models\Docente;
use App\Models\Linea_Inves;
use App\Models\Periodo;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Symfony\Component\CssSelector\XPath\Extension\FunctionExtension;
use Yoeunes\Toastr\Facades\Toastr;

class Preinscribir extends Component
{

public $lider, $estudiante2, $estudiante3, $sede, $pnf, $tipo_estudio, $turno, $trayecto, $seccion, $estado, $municipio, $parroquia, $sector,
$asesor, $tutor, $lineainve, $titulo, $objetivo, $alcance, $limitacion, $aportes_comu, $acciones_integra, $plan_patria;

public $nombre1, $apellido1, $mensajeError1, $nombre2, $apellido2, $mensajeError2, $nombre3, $apellido3, $mensajeError3, $busquedaRealizada1, $busquedaRealizada2, $busquedaRealizada3;

public $nombre4, $apellido4, $mensajeError4, $busquedaRealizada4;

public $nombre5, $apellido5, $mensajeError5, $busquedaRealizada5;
/* Preinscribir */

// public function realizarBusquedaEst1()
// {
//     $estudiante = Estudiante::find($this->lider);

//     $this->nombre1 = '';
//     $this->apellido1 = '';

//     if ($estudiante->lider_id == 1){

//      if ($estudiante) {
//         $this->nombre1 = $estudiante->nombre;
//         $this->apellido1 = $estudiante->apellido;
//     } else {
//         $this->nombre1 = null;
//         $this->apellido1 = null;
//     }

//     $this->busquedaRealizada1 = true;
//     }
//     else{
//         $this->nombre1 = null;
//         $this->apellido1 = null;
//     }
// }

// public function realizarBusquedaEst2()
// {

//     $estudiante = Estudiante::find($this->estudiante2);

//     $this->nombre2 = '';
//     $this->apellido2 = '';

//      if ($estudiante) {
//         $this->nombre2 = $estudiante->nombre;
//         $this->apellido2 = $estudiante->apellido;
//     } else {
//         $this->nombre2 = null;
//         $this->apellido2 = null;
//     }

//     $this->busquedaRealizada2 = true;
    
// }

// public function realizarBusquedaEst3()
// {
//     $estudiante = Estudiante::find($this->estudiante3);

//     $this->nombre3 = '';
//     $this->apellido3 = '';

//      if ($estudiante) {
//         $this->nombre3 = $estudiante->nombre;
//         $this->apellido3 = $estudiante->apellido;
//     } else {
//         $this->nombre3 = null;
//         $this->apellido3 = null;
//     }

//     $this->busquedaRealizada3 = true;
// }

public function realizarBusquedaEst1()
{
    $estudiante = Estudiante::find($this->lider);

    $this->nombre1 = '';
    $this->apellido1 = '';
    $this->mensajeError1 = '';

    if ($estudiante && $estudiante->lider_id == 1) {
        if ($estudiante) {
            // Verificar si el estudiante ya ha sido seleccionado anteriormente
            if ($this->estudiante2 == $this->lider || $this->estudiante3 == $this->lider) {
                // El estudiante ya ha sido seleccionado anteriormente, mostrar un mensaje de error
                $this->mensajeError1 = 'El estudiante ya ha sido seleccionado anteriormente.';
                $this->nombre1 = '';
                $this->apellido1 = '';
                $this->busquedaRealizada1 = false; // No se realizó la búsqueda correctamente
            } else {
                $this->nombre1 = $estudiante->nombre;
                $this->apellido1 = $estudiante->apellido;
                $this->busquedaRealizada1 = true;
            }
        } else {
            $this->mensajeError1 = 'No encontrado.';
            $this->busquedaRealizada1 = false; // No se encontró el estudiante
        }
    } else {
        $this->mensajeError1 = 'No se encontró el líder.';
        // $this->mensajeError1 = 'No se realizó la búsqueda correctamente para el líder.';
        $this->busquedaRealizada1 = false; // No se realizó la búsqueda correctamente
    }
}

public function realizarBusquedaEst2()
{
    $estudiante = Estudiante::find($this->estudiante2);

    $this->nombre2 = '';
    $this->apellido2 = '';
    $this->mensajeError2 = '';

    if ($estudiante) {
        // Verificar si el estudiante ya ha sido seleccionado anteriormente
        if ($this->lider == $this->estudiante2 || $this->estudiante3 == $this->estudiante2) {
            // El estudiante ya ha sido seleccionado anteriormente, mostrar un mensaje de error
            $this->mensajeError2 = 'El estudiante ya ha sido seleccionado anteriormente.';
            $this->nombre2 = '';
            $this->apellido2 = '';
            $this->busquedaRealizada2 = false; // No se realizó la búsqueda correctamente
        } else {
            $this->nombre2 = $estudiante->nombre;
            $this->apellido2 = $estudiante->apellido;
            $this->busquedaRealizada2 = true;
        }
    } else {
        $this->mensajeError2 = 'No encontrado.';
        $this->busquedaRealizada2 = false; // No se encontró el estudiante
    }
}

public function realizarBusquedaEst3()
{
    $estudiante = Estudiante::find($this->estudiante3);

    $this->nombre3 = '';
    $this->apellido3 = '';
    $this->mensajeError3 = '';

    if ($estudiante) {
        // Verificar si el estudiante ya ha sido seleccionado anteriormente
        if ($this->lider == $this->estudiante3 || $this->estudiante2 == $this->estudiante3) {
            // El estudiante ya ha sido seleccionado anteriormente, mostrar un mensaje de error
            $this->mensajeError3 = 'El estudiante ya ha sido seleccionado anteriormente.';
            $this->nombre3 = '';
            $this->apellido3 = '';
            $this->busquedaRealizada3 = false; // No se realizó la búsqueda correctamente
        } else {
            $this->nombre3 = $estudiante->nombre;
            $this->apellido3 = $estudiante->apellido;
            $this->busquedaRealizada3 = true;
        }
    } else {
        $this->mensajeError3 = 'No encontrado.';
        $this->busquedaRealizada3 = false; // No se encontró el estudiante
    }
}

public function realizarBusquedaDoc1()
{
   $estudiante = Docente::find($this->asesor);

    $this->nombre4 = '';
    $this->apellido4 = '';
    $this->mensajeError4 = '';

    if ($estudiante) {
        // Verificar si el estudiante ya ha sido seleccionado anteriormente
        if ($this->tutor == $this->asesor) {
            // El estudiante ya ha sido seleccionado anteriormente, mostrar un mensaje de error
            $this->mensajeError4 = 'El docente ya ha sido seleccionado anteriormente.';
            $this->nombre4 = '';
            $this->apellido4 = '';
            $this->busquedaRealizada4 = false; // No se realizó la búsqueda correctamente
        } else {
            $this->nombre4 = $estudiante->nombre;
            $this->apellido4 = $estudiante->apellido;
            $this->busquedaRealizada4 = true;
        }
    } else {
        $this->mensajeError4 = 'No encontrado.';
        $this->busquedaRealizada4 = false; // No se encontró el estudiante
    }
}

public function realizarBusquedaDoc2()
{
   $estudiante = Docente::find($this->tutor);

    $this->nombre5 = '';
    $this->apellido5 = '';
    $this->mensajeError5 = '';

    if ($estudiante) {
        // Verificar si el estudiante ya ha sido seleccionado anteriormente
        if ($this->tutor == $this->asesor) {
            // El estudiante ya ha sido seleccionado anteriormente, mostrar un mensaje de error
            $this->mensajeError5 = 'El docente ya ha sido seleccionado anteriormente.';
            $this->nombre5 = '';
            $this->apellido5 = '';
            $this->busquedaRealizada5 = false; // No se realizó la búsqueda correctamente
        } else {
            $this->nombre5 = $estudiante->nombre;
            $this->apellido5 = $estudiante->apellido;
            $this->busquedaRealizada5 = true;
        }
    } else {
        $this->mensajeError5 = 'No encontrado.';
        $this->busquedaRealizada5 = false; // No se encontró el estudiante
    }
}

/* Preinscribir */

public function save()
{
    $validator = Validator::make([
        'lider' => $this->lider,
        'estudiante2' => $this->estudiante2,
        'estudiante3' => $this->estudiante3,
        'tipo_estudio_id' => $this->tipo_estudio,
        'PNF_id' => $this->tipo_estudio,
        'sede_id' => $this->sede,
        'trayecto_id' => $this->trayecto,
        'seccion_id' => $this->seccion,
        'estado_id' => $this->estado,
        'municipio_id' => $this->municipio,
        'parroquia_id' => $this->parroquia,
        'turno_id' => $this->turno,
        'asesor_ci' => $this->asesor,
        'tutor_ci' => $this->tutor,
        'sector_id' => $this->sector,
        'titulo_Tentativo' => $this->titulo,
        'objetivo' => $this->objetivo,
        'alcance' => $this->alcance,
        'limitacion' => $this->limitacion,
        'lineaInves_id' => $this->lineainve,
        'aportes_comu' => $this->aportes_comu,
        'acciones_integra' => $this->acciones_integra,
        'plan_patria' => $this->plan_patria,
    ], [
        'lider' => 'different:estudiante2,estudiante3',
        'estudiante2' => 'different:lider,estudiante3|nullable',
        'estudiante3' => 'different:lider,estudiante2|nullable',
        'tipo_estudio_id' => 'required',
        'sede_id' => 'required',
        'PNF_id' => 'required',
        // 'trayecto_id' => 'required',
        // 'seccion_id' => 'required',
        // 'estado_id' => 'required',
        // 'municipio_id' => 'required',
        // 'parroquia_id' => 'required',
        // 'turno_id' => 'required',
        // 'asesor_ci' => 'required',
        // 'tutor_ci' => 'required',
        // 'sector_id' => 'required',
        // 'titulo_Tentativo' => 'required',
        // 'objetivo' => 'required',
        // 'alcance' => 'required',
        // 'limitacion' => 'required',
        // 'lineaInves_id' => 'required',
        // 'aportes_comu' => 'required',
        // 'acciones_integra' => 'required',
        // 'plan_patria' => 'required',
    ]);

    if ($validator->fails()) {
        $this->addError('lider', 'Este campo es requerido.');
        session()->flash('error', 'Tiene errores de validación.');
    } else {
        try {
            $nueva_preins = Preinscripcion::create([
                'estudiante_ci' => $this->lider,
                'estudiante2_ci' => $this->estudiante2,
                'estudiante3_ci' => $this->estudiante3,
                'tipo_estudio_id' => $this->tipo_estudio,
                'PNF_id' => $this->tipo_estudio,
                'sede_id' => $this->sede,
                'trayecto_id' => $this->trayecto,
                'seccion_id' => $this->seccion,
                'estado_id' => $this->estado,
                'municipio_id' => $this->municipio,
                'parroquia_id' => $this->parroquia,
                'turno_id' => $this->turno,
                'asesor_ci' => $this->asesor,
                'tutor_ci' => $this->tutor,
                'sector_id' => $this->sector,
                'titulo_Tentativo' => $this->titulo,
                'objetivo' => $this->objetivo,
                'alcance' => $this->alcance,
                'limitacion' => $this->limitacion,
                'lineaInves_id' => $this->lineainve,
                'aportes_comu' => $this->aportes_comu,
                'acciones_integra' => $this->acciones_integra,
                'plan_patria' => $this->plan_patria,
                // observaciones => $this->observaciones
            ]);
        } catch (\Illuminate\Database\QueryException $ex) {
            $errorCode = $ex->errorInfo[1];
            if ($errorCode == 1062) {
                session()->flash('error', 'El registro ya existe.');
            } else {
                session()->flash('error', 'Ocurrió un error en la base de datos.');
            }
        } catch (\Exception $ex) {
            session()->flash('error', 'Ocurrió un error inesperado.');
            // dd($ex->getMessage());
        }
        session()->flash('message', 'Datos guardados con éxito');
    }
}
        

        // if ($nueva_preins instanceof Preinscripcion) {
        //     toastr()->success('¡Datos guardados!', 'Éxito');
        //     return redirect('/preinscripcion');
        // } else {
        //     toastr()->error('Se ha producido un error, inténtalo de nuevo más tarde.');
        //     return back();
        // }
    


    // public function updatedsede(){
    //     $this->pnf = 0;
    // }

    public function render()
    {
            // Preinscripcion

        $estudiantes = Estudiante::all();
        $tipo_estudios = Tipo_Estudio::all();
        $sedes = Sede::SELECT('id', 'nombre_Sede')->get();

        $pnfs = PNF::SELECT('nombre_PNF', 'pnf.abreviatura')
        // ->JOIN('sede', 'sede.id', '=', 'sede_pnf.sede_id')
        // ->WHERE('sede_pnf.sede_id', intval($this->sede))
        ->get();

        // $sede_pnf = Sede_PNF::select('nombre_PNF', 'nombre_Sede', 'sede_pnf.pnf_id', 'sede_pnf.sede_id', 'pnf.abreviatura')
        // ->join('pnf', 'pnf.id', '=', 'pnf_id')
        // ->join('sede', 'sede.id', '=', 'pnf_id')
        // ->WHERE('sede_pnf.sede_id', 1)
        // ->get();


        $trayectos = Trayecto::all();
        $secciones = seccion::all();
        $estados = estado::all();
        $municipios = municipio::select('id', 'nombre_Municipio', 'estado_id')
        ->where('estado_id', $this->estado)
        ->get();

        $parroquias = parroquia::select('id', 'nombre_Parroquia', 'municipio_id')
        ->where('municipio_id', $this->municipio)
        ->get();

        $sectores = sector::all();
        $turnos = turno::all();
        $users = user::all();
        $docente = docente::all();
        $linea_inve = Linea_Inves::SELECT('id', 'nombre_LineaInve', 'descripcion', 'PNF_id')
        ->WHERE('PNF_id', intval($this->pnf))
        ->GET();
         
        $fecha_apertura = Periodo::pluck('fecha_apertura')->first();
        $fecha_apertura = date('d/m/Y', strtotime($fecha_apertura));

        $fecha_cierre = Periodo::pluck('fecha_cierre')->first();
        $fecha_cierre = date('d/m/Y', strtotime($fecha_cierre));

        return view('livewire.preinscribir')
         ->extends('adminlte::page')
            ->with([
                'estudiantes' => $estudiantes,
                'fecha_apertura'=> $fecha_apertura,
                'fecha_cierre'=> $fecha_cierre,
                'tipo_estudios' => $tipo_estudios,
                'sedes' => $sedes,
                'pnfs' => $pnfs,
                'trayectos' => $trayectos,
                'secciones' => $secciones,
                'estados' => $estados,
                'municipios' => $municipios,
                'parroquias' => $parroquias,
                'sectores' => $sectores,
                'turnos' => $turnos,
                'users'=>$users,
                'docente' => $docente,
                'linea_inve' => $linea_inve,  
            ]);;
    }
}
