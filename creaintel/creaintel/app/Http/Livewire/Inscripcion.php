<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Periodo;
use Illuminate\Support\Carbon;

class Inscripcion extends Component
{
    public $fecha_apertura, $fecha_cierre;

    public function render()
    {
        $periodo = Periodo::select('fecha_apertura', 'fecha_cierre')->first();

        $this->fecha_apertura = Carbon::parse($periodo->fecha_apertura)->format('d/m/Y');
        $this->fecha_cierre = Carbon::parse($periodo->fecha_cierre)->format('d/m/Y');

        return view('livewire.inscripcion')->extends('adminlte::page')->with([]);
    }
}
