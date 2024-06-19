<?php

namespace App\Http\Livewire;

use App\Models\Preinscripcion;
use App\Models\User;
use App\Models\Docente;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Spatie\Permission\Models\Role;

class TablaInscripcion extends DataTableComponent
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
    public $usuario_id, $ci, $name, $apellido, $telefono, $email, $password, $password_confirmation, $edit_roles_select, $userRole, $password_antiguo;


    // Variables para las consultas del dropdown
    public $roles;

    // public $messages = [
    //     // 'ci.unique' => 'Esta cédula ya existe',
    //     'ci.required' => 'Este campo es requerido',
    //     'name.required' => 'Este campo es requerido',
    //     'apellido.required' => 'Este campo es requerido',
    //     // 'email.unique' => 'Este email ya existe',
    //     'email.required' => 'Este campo es requerido',
    //     'telefono.required' => 'Este campo es requerido',
    //     'telefono.min' => 'Teléfono debe tener al menos 11 caracteres',
    //     'password.required' => 'Este campo es requerido',
    //     'password.confirmed' => 'Las contraseñas no coinciden',
    //     'password_confirmation.required' => 'Este campo es requerido',
    //     'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
    //     'roles_select.required' => 'Este campo es requerido',
    // ];

    // public function cambiarStatus(int $id){

    //     $usuario = User::find($id);

    //     $usuario->status = $usuario->status == 0 ? 1 : 0;
    //     $usuario->save();

    // }

    public $vista_status;

    public function cambiarStatus(int $id)
    {
        try {
            $usuario = User::findOrFail($id);
            $this->vista_status = $usuario->status;

            $usuario->status = $usuario->status == 0 ? 1 : 0;
            $usuario->save();

            session()->flash('message', 'El status se ha actualizado correctamente.');
        } catch (\Exception $e) {
            session()->flash('error', 'No se pudo cambiar el estado del usuario. Error: ' . $e->getMessage());
        }
    }

    // Variables nuevas preinscripcion

    public $observaciones, $preinscripcion_id;


    public function accion(int $id)
    {
        $preinscripcion = Preinscripcion::find($id);

        $this->preinscripcion_id = $id;

        if ($preinscripcion){
            $this->observaciones = $preinscripcion->observaciones;
        }
    }

    public function updateObservaciones(){
      Preinscripcion::where('id', $this->preinscripcion_id)->first()->update([
    'observaciones' => $this->observaciones,
        ]);

        session()->flash('message', 'Datos actualizados con éxito');

        $this->dispatchBrowserEvent('close-modal');
    }

    public $especialista1, $especialista2, $especialista3;

    public function accionComite(int $id)
    {
        $preinscripcion = Preinscripcion::find($id);

        $this->preinscripcion_id = $id;

        if ($preinscripcion) {
            $this->especialista1 = $preinscripcion->especialista1_ci;
            $this->especialista2 = $preinscripcion->especialista2_ci;
            $this->especialista3 = $preinscripcion->especialista3_ci;
    }
}

    public function updateComite()
    {
        Preinscripcion::where('id', $this->preinscripcion_id)->first()->update([
            'especialista1_ci' => $this->especialista1,
            'especialista2_ci' => $this->especialista2,
            'especialista3_ci' => $this->especialista3,
        ]);

        session()->flash('message', 'Datos actualizados con éxito');

        $this->dispatchBrowserEvent('close-modal');
    }

    public $id_usuario_enc;

    public $email_usuario_enc;

    public function encontrarUsuario(int $id)
    {
        $this->resetInput();

        $usuario = User::find($id);
        if ($usuario) {
            $this->id_usuario_enc = $id;
            $this->email_usuario_enc = $usuario->email;
        }
    }

    public function updateUsuario()
    {
        $this->validate([
            'ci' => 'required',
            'name' => 'required|string',
            'apellido' => 'required|string',
            'email' => 'required|email',
            'telefono' => 'nullable|min:11',
            // 'password' => 'min:8|confirmed',
            // 'password_confirmation' => 'required',
        ]);

        if (!empty($this->password)) {
            $this->password = Hash::make($this->password);
        } else {
            // $previousPassword = $this->getOriginal('password');
            $this->password = $this->password_antiguo;
        }

        if ($this->usuario_id) {
            User::where('id', $this->usuario_id)->first()->update([
                'name' => $this->name,
                'apellido' => $this->apellido,
                'email' => $this->email,
                'telefono' => $this->telefono,
                'password' => $this->password,
            ]);

            DB::table('model_has_roles')
                ->where('model_id', $this->usuario_id)
                ->update(['role_id' => $this->edit_roles_select]);
        }

        //  if(!empty($this->password)){
        //     $this->password = Hash::make($this->password);
        // }else{
        //     $input = Arr::except($input,array('password'));
        // }

        $this->resetInput();
        session()->flash('message', 'Datos actualizados con éxito');

        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInput()
    {
        $this->name = '';
        $this->apellido = '';
        $this->email = '';
        $this->telefono = '';
        $this->password = '';
        $this->password_confirmation = '';
    }


    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function builder(): Builder
    {
        return Preinscripcion::query()->where('preins', '0');
    }

    public $userId;

    public function filters(): array
    {
        return [
            SelectFilter::make('status_planilla')
                ->setFilterPillTitle('Estado del Proyecto')
                ->setFilterPillValues([
                    '1' => 'Revisados',
                    '0' => 'Sin revisar',
                ])
                ->options([
                    '' => 'Todos',
                    '1' => 'Revisados',
                    '0' => 'Sin revisar',
                ])
                ->filter(function (Builder $builder, string $value) {
                    if ($value === '1') {
                        $builder->where('status_planilla', true);
                    } elseif ($value === '0') {
                        $builder->where('status_planilla', false);
                    }
                }),
        ];
    }

    public function mount()
    {
        if (Auth::check()) {
            $userId = Auth::id();
        }

        $this->userId = $userId;
    }

    public function bulkActions(): array
    {
        return [
            'activate' => 'Marcar como revisado',
            'deactivate' => 'Marcar como no revisado',
        ];
    }

    public function activate()
    {
        Preinscripcion::whereIn('id', $this->getSelected())->update(['status_planilla' => true]);

        $this->clearSelected();
    }

    public function deactivate()
    {
        Preinscripcion::whereIn('id', $this->getSelected())->update(['status_planilla' => false]);

        $this->clearSelected();
    }

    public function columns(): array
    {
        return [


 
            Column::make('Id', 'id')
                ->sortable()
                ->deselected(),

            Column::make('Código')->label(fn ($row) => view('livewire.codigo-proyecto')->with([
                'row' => $row,
                'preinscripciones' => Preinscripcion::where('id', $row->id)->get(),

            ])),
                  
            // sedes.abreviatura
            // trayectos.nombre_Trayecto
            // anio
            // correlativo
                // {{ $preinscripcion->pnfs['abreviatura'] }}{{ $preinscripcion->sedes['abreviatura'] }}-{{ $preinscripcion->trayectos['nombre_Trayecto'] }}-{{ $preinscripcion->anio }}-{{ $preinscripcion->correlativo }}

            Column::make('Cédula (Líder)', 'estudiante_ci')
                ->sortable()
                ->searchable(),

            Column::make('Nombre', 'estudiantes.Nombre')
            ->sortable()
            ->searchable(),

            Column::make('Apellido', 'estudiantes.Apellido')
            ->sortable()
            ->searchable(),

            Column::make('PNF', 'pnfs.nombre_PNF')
                ->sortable(),

            Column::make('Sede', 'sedes.nombre_Sede')
            ->sortable(),

            Column::make('Tipo Estudio', 'tipo_estudios.nombre_Tipo_Estudio')
            ->sortable(),

            Column::make('Trayecto', 'trayectos.nombre_Trayecto')
            ->sortable(),

            Column::make('Título del Proyecto', 'titulo_tentativo')
            ->sortable()
            ->searchable(),

            // BooleanColumn::make('Revisado', 'status_planilla')
            // ->sortable(),

            Column::make('Motivo Reprobado', 'motivo_reprobado')
            ->sortable(),

            Column::make('Observaciones', 'observaciones')
            ->sortable(),

            // Column::make('Teléfono', 'telefono')
            //     ->sortable(),

            // Column::make('Rol')
            //     ->label(function ($row) {
            //         return $row['roles']->pluck('name')->map(function ($role) {
            //             $color = $this->getBadgeColor($role);

            //             return '<span class="badge ' . $color . '" style="font-size: 14.5px;">' . $role . '</span>';
            //         })->implode(' ');
            //     })->html(),

            // BooleanColumn::make('status')
            //     ->sortable()
            //     ->collapseOnMobile(),

            Column::make('Actualizado', 'updated_at')
                ->sortable(),

            Column::make('Acciones')->label(fn ($row) => view('livewire.inscripcion-acciones')->with([
                $this->roles = Role::select('id', 'name')->get(),
                'lista_docentes' => Docente::select('docente_ci', 'nombre', 'apellido')->get(),
                'row' => $row,
                'roles' => $this->roles,
                'userRole' => $this->userRole,
            ])),
        ];
    }
}
