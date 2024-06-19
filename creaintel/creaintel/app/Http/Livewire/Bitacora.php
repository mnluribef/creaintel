<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Bitacora extends Component
{
    public function render()
    {
        return view('livewire.bitacora')->extends('adminlte::page');
    }
}
