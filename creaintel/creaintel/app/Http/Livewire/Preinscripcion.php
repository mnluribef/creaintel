<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Periodo;
use Illuminate\Support\Carbon;

class Preinscripcion extends Component
{
    public $fecha_apertura, $fecha_cierre;

    public function checkFechas()
    {
        $hoy = now()->format('d/m/Y');

        // dump($hoy);

        if ($hoy > $this->fecha_apertura && $hoy <= $this->fecha_cierre) {
            return redirect()->route('preinscribir');
        } else {
            session()->flash('error', 'El período fue cerrado o no fue aperturado');
            // $this->dispatchBrowserEvent('swal:fire', [
            //     'type' => 'error',
            //     'title' => 'El período fue cerrado o no fue aperturado',
            //     'text' => ''
            // ]);
        }
    }

    public function render()
    {
        $periodo = Periodo::select('fecha_apertura', 'fecha_cierre')->first();

        $this->fecha_apertura = Carbon::parse($periodo->fecha_apertura)->format('d/m/Y');
        $this->fecha_cierre = Carbon::parse($periodo->fecha_cierre)->format('d/m/Y');

        // dump ($this->fecha_apertura);

        // $fecha_apertura = Periodo::pluck('fecha_apertura')->first();
        // $fecha_apertura = date('d/m/Y', strtotime($fecha_apertura));

        // $fecha_cierre = Periodo::pluck('fecha_cierre')->first();
        // $fecha_cierre = date('d/m/Y', strtotime($fecha_cierre));
        

        // @foreach ($periodo as $periodo)

        // <input type="hidden" id="fecha_apertura" class="form-control col-md-7" name="fecha_apertura" value="{{$periodo['fecha_apertura']}}">

        // <input type="hidden" class="form-control col-md-7" id="fecha_cierre" name="fecha_cierre" value="{{$periodo['fecha_cierre']}}">
        // @endforeach

        // if (check > desde && check <= hasta) {
        //     window . location . href = "preinscripcion/create";
        // } else {
        //     Swal . fire("El período fue cerrado o no fue aperturado");
        // }

        return view('livewire.preinscripcion')->extends('adminlte::page')->with([
        ]);
    }
}
