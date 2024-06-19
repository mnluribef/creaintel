<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Spatie\Permission\Models\Role;

class TablaUsuarios extends DataTableComponent
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

    public $messages = [
        // 'ci.unique' => 'Esta cédula ya existe',
        'ci.required' => 'Este campo es requerido',
        'name.required' => 'Este campo es requerido',
        'apellido.required' => 'Este campo es requerido',
        // 'email.unique' => 'Este email ya existe',
        'email.required' => 'Este campo es requerido',
        'telefono.required' => 'Este campo es requerido',
        'telefono.min' => 'Teléfono debe tener al menos 11 caracteres',
        'password.required' => 'Este campo es requerido',
        'password.confirmed' => 'Las contraseñas no coinciden',
        'password_confirmation.required' => 'Este campo es requerido',
        'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        'roles_select.required' => 'Este campo es requerido',
    ];

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
            session()->flash('error', 'No se pudo cambiar el estado del usuario. Error: '.$e->getMessage());
        }
    }

    public function accion(int $id)
    {
        // $this->resetInput();
        $this->usuario_id = $id;

        $usuario = User::find($id);
        if ($usuario) {
            $this->ci = $usuario->ci;
            $this->name = $usuario->name;
            $this->apellido = $usuario->apellido;
            $this->telefono = $usuario->telefono;
            $this->email = $usuario->email;
            $this->password_antiguo = $usuario->password;
            // $previousPassword = $this->getOriginal('password');
            // $rol = model_has_roles::SELECT('model_id','role_id')->where('model_id', '=', $id)->get();

            // $roles = DB::table('model_has_roles')->where('model_id',$id)->get();
            $role = DB::table('model_has_roles')
                ->where('model_id', $id)
                ->pluck('role_id')
                ->first();
            // dump($role);
            $this->edit_roles_select = $role;

        }
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

        if (! empty($this->password)) {
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

    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        // $this->setRefreshVisible();
        // $this->setRefreshTime(2000);
    }

    public function builder(): Builder
    {
        return User::query();
    }

    public $valores_areas_geo;

    public $valores_areas_trabajo;

    public $area;

    public $userId;

    public $valores_areas_geo_c;

    public $valores_areas_trabajo_c;

    public function getBadgeColor()
    {
        $role = DB::table('model_has_roles')
            ->where('model_id', 1)
            ->pluck('role_id')
            ->first();

        switch ($role) {
            case 'admin':
                return 'badge-danger';
            case 'editor':
                return 'badge-warning';
            case 'usuario':
                return 'badge-success';
            default:
                return 'badge-info';
        }
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Status')
                ->setFilterPillTitle('User Status')
                ->setFilterPillValues([
                    '1' => 'Active',
                    '0' => 'Inactive',
                ])
                ->options([
                    '' => 'Todos',
                    '1' => 'Activos',
                    '0' => 'Inactivos',
                ])
                ->filter(function (Builder $builder, string $value) {
                    if ($value === '1') {
                        $builder->where('status', true);
                    } elseif ($value === '0') {
                        $builder->where('status', false);
                    }
                }),
        ];
    }

    public function mount(){
        if (Auth::check()) {
            $userId = Auth::id();
        }

        $this->userId = $userId;
    }

    public function bulkActions(): array
    {
        return [
            'activate' => 'Activar',
            'deactivate' => 'Desactivar',
        ];
    }

    public function activate()
    {
        User::whereIn('id', $this->getSelected())->update(['status' => true]);

        $this->clearSelected();
    }

    public function deactivate()
    {
        User::whereIn('id', $this->getSelected())->update(['status' => false]);

        $this->clearSelected();
    }

    public function columns(): array
    {
        return [

            Column::make('Id', 'id')
                ->sortable()
                ->deselected(),

            Column::make('Cédula', 'ci')
                ->sortable()
                ->searchable(),

            Column::make('Nombre', 'name')
                ->sortable(),

            Column::make('Apellido', 'apellido')
                ->sortable(),

            Column::make('Email', 'email')
                ->sortable()
                ->searchable(),

            Column::make('Teléfono', 'telefono')
                ->sortable(),

            Column::make('Rol')
                ->label(function ($row) {
                    return $row['roles']->pluck('name')->map(function ($role) {
                        $color = $this->getBadgeColor($role);

                        return '<span class="badge '.$color.'" style="font-size: 14.5px;">'.$role.'</span>';
                    })->implode(' ');
                })->html(),

            BooleanColumn::make('status')
                ->sortable()
                ->collapseOnMobile(),

            Column::make('Actualizado', 'updated_at')
                ->sortable(),

            Column::make('Acciones')->label(fn ($row) => view('livewire.usuarios-editar')->with([
                $this->roles = Role::select('id', 'name')->get(),

                'user' => $row,
                'roles' => $this->roles,
                'userRole' => $this->userRole,
            ])),
        ];
    }
}
