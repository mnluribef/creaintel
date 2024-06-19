<?php

namespace App\Http\Livewire;

use App\Models\Activity_Log;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Carbon\Carbon;

class TablaBitacora extends DataTableComponent
{
    public $empresas;

    protected $listeners = [
        'empresasEnviadas',
        'refreshDataTable' => '$refresh',
    ];

    public function empresasEnviadas($empresas)
    {
        $this->empresas = $empresas;
        $this->emitSelf('refreshDataTable');
    }

    // Variables para el modal de Editar
    public $area_geografica_id;

    public $nombre;

    // Variables para las consultas del dropdown

    public $messages = [
        'nombre.required' => 'Este campo es requerido',
        'nombre.unique' => 'Nombre debe ser único',
    ];

    // public function accion(int $id)
    // {
    //     $this->area_geografica_id = $id;
    //     $empresa = Activity_Log::find($id);

    //     if ($empresa) {
    //         $this->nombre = $empresa->nombre;
    //     }
    // }

    // public function updateRol()
    // {
    //     $this->validate([
    //         'nombre' => 'required|string|unique:area_geografica',
    //     ]);

    //     AreaGeografica::where('id', $this->area_geografica_id)->first()->update([
    //         'nombre' => strtoupper($this->nombre),
    //     ]);

    //     $this->resetInput();
    //     session()->flash('message', 'Datos actualizados con éxito');

    //     $this->dispatchBrowserEvent('close-modal');
    // }

    public function resetInput()
    {
        $this->nombre = '';
    }

    protected $model = Activity_Log::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        // $this->setRefreshVisible();
        // $this->setRefreshTime(2000);
    }

    public function builder(): Builder
    {
        return Activity_Log::query()->orderByDesc('updated_at');
    }


    public function columns(): array
    {
        return [

            Column::make('Id', 'id')
                ->sortable()
                ->deselected(),

            Column::make('ID Afectado', 'subject_id')
                ->sortable(),

            Column::make('Modelo', 'subject_type')
                ->sortable()
                ->searchable(),

            Column::make('Evento', 'event')
                ->sortable(),

            // Column::make('Usuario', 'causer_id')
            //     ->sortable(),

            Column::make('Usuario', 'user.ci')
                ->sortable()
                ->searchable(),

            Column::make('Anterior', 'properties->old')
                ->sortable()
                ->searchable(),

            Column::make('Cambios', 'properties->attributes')
                ->sortable()
                ->searchable(),

            Column::make('Fecha Actualización', 'updated_at')
                ->sortable()
                ->searchable()
                ->format(function ($value) {
                    return Carbon::parse($value)->subHours(4)->format('d-m-Y h:i:s A');
                }),

            // Column::make('Acciones')->label(fn ($row) => view('livewire.areas-geograficas-editar')->with([
            //     'user' => $row,
            // ])),
        ];
    }
}
