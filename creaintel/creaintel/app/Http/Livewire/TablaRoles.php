<?php

namespace App\Http\Livewire;

use App\Models\Roles;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class TablaRoles extends DataTableComponent
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
    public $rol_id;

    public $name;

    public $permission_checkbox;

    public $userRole;

    public $permission;

    public $rolePermissions;

    // Variables para las consultas del dropdown
    public $roles;

    //     public function updatedSelectedRole($value)
    // {
    //     $this->selectedpermissions=[];
    //     $role=Role::find($value);
    //     if($role) {
    //         $this->selectedpermissions =$role->getAllPermissions()
    //              ->sortBy('name')
    //              ->pluck('id', 'id')
    //              ->toArray();
    //     }
    // }

    public function accion(int $id)
    {
        // $this->resetInput();
        $this->rol_id = $id;
        $rol = Role::find($id);

        if ($rol) {
            $this->name = $rol->name;
            $this->permission_checkbox = $rol->getAllPermissions()
                ->sortBy('name')
                ->pluck('id', 'id')
                ->toArray();
        }

    }

    public function updateRol()
    {
        Roles::where('id', $this->rol_id)->update([
            'name' => $this->name,
        ]);

        Role::find($this->rol_id)->syncPermissions($this->permission_checkbox);

        $this->resetInput();
        session()->flash('message', 'Datos actualizados con éxito');

        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInput()
    {
        $this->name = '';
    }

    protected $model = Roles::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        // $this->setRefreshVisible();
        // $this->setRefreshTime(2000);
    }

    public function builder(): Builder
    {
        return Roles::query();

    }

    public function columns(): array
    {
        return [

            Column::make('Id', 'id')
                ->sortable()
                ->deselected(),

            Column::make('Rol', 'name')
                ->sortable(),

            // Column::make("Rol")
            // ->label(function($row) {
            //     return $row['roles']->pluck('name')->map(function($role){
            //         return '<span class="badge badge-info" style="font-size: 14.5px;">'.$role.'</span>';
            //     })->implode(' ');
            // })->html(),

            Column::make('Actualizado', 'updated_at')
                ->sortable(),

            Column::make('Acciones')->label(fn ($row) => view('livewire.roles-editar')->with([
                $this->roles = Role::select('id', 'name')->get(),

                $this->permission = Permission::get(),

                $this->rolePermissions = DB::table('role_has_permissions')->where('role_has_permissions.role_id', $this->rol_id)
                    ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
                    ->all(),

                'user' => $row,
                'roles' => $this->roles,
                'userRole' => $this->userRole,
                'permission' => $this->permission,
                'rolePermissions' => $this->rolePermissions,

            ])),
        ];
    }
}
