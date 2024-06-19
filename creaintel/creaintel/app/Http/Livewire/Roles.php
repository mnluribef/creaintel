<?php

namespace App\Http\Livewire;

use App\Models\Roles as ModelsRoles;
use Illuminate\Support\Facades\DB;
//agregamos
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    /* Variables de Creación de Usuario */

    public $name;

    public $permission_checkbox;

    public $messages = [
        'name.unique' => 'Este Rol ya existe',
        'name.required' => 'Este campo es requerido',
        'permission_checkbox.*.required' => 'Debe asignar al menos un permiso',
    ];

    public function registrarRol()
    {

        $nextId = DB::table('roles')->select('id')->max('id') + 1;

        $this->validate([
            'name' => 'required|unique:roles,name',
            'permission_checkbox.*' => 'required',
        ]);

        ModelsRoles::create([
            'name' => $this->name,
            'guard_name' => 'web',
        ]);

        Role::find($nextId)->syncPermissions($this->permission_checkbox);

        // foreach ($this->permission_checkbox as $permission) {
        // DB::table('role_has_permissions')->insert([
        // 'role_id' => $nextId,
        // 'permission_id' => $permission,
        // ]);
        // }

        // DB::table('role_has_permissions')->insert([
        // 'role_id' => $nextId,
        // 'permission_id' => $this->permission_checkbox,
        // ]);

        // $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $nextId);
        $this->name = '';
        $this->permission_checkbox = [];

        $this->dispatchBrowserEvent('close-modal');
        $this->emit('refreshDataTable');
        session()->flash('message', 'Datos guardados con éxito');
    }

    public function render()
    {
        $permission2 = Permission::get();

        return view('livewire.roles')->extends('adminlte::page')
            ->with([
                'permission2' => $permission2,
            ]);
    }
}
