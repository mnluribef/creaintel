<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;


class Usuarios extends Component
{
    //      function __construct()
    // {
    //      $this->middleware('permission:ver-usuarios|editar-usuarios', ['only' => ['index']]);
    //     //  $this->middleware('permission:crear-usuarios', ['only' => ['create','store']]);
    //      $this->middleware('permission:editar-usuarios', ['only' => ['edit','update']]);
    //     //  $this->middleware('permission:borrar-usuarios', ['only' => ['destroy']]);
    // }

    public $empresas;

    protected $listeners = ['empresasEnviadas'];

    public function empresasEnviadas($empresas)
    {
        $this->empresas = $empresas;
    }

    public $gest_empresas;

    public $area_geo;

    public $area_trabajo;

    // $nuevoUsuario->assignRole('Monitoreo');
    // $nuevoUsuario->assignRole(intval($this->roles_select));

    /* Variables de Creación de Usuario */
    public $ci;

    public $name;

    public $apellido;


    public $telefono;

    public $email;

    public $password;

    public $password_confirmation;

    public $roles_select;

    public $messages = [
        'ci.unique' => 'Esta cédula ya existe',
        'ci.required' => 'Este campo es requerido',
        'name.required' => 'Este campo es requerido',
        'apellido.required' => 'Este campo es requerido',
        'email.unique' => 'Este email ya existe',
        'email.required' => 'Este campo es requerido',
        'telefono.required' => 'Este campo es requerido',
        'telefono.min' => 'Teléfono debe tener al menos 11 caracteres',
        'password.required' => 'Este campo es requerido',
        'password.confirmed' => 'Las contraseñas no coinciden',
        'password_confirmation.required' => 'Este campo es requerido',
        'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        'roles_select.required' => 'Este campo es requerido',
    ];

    public function registrarUsuario()
    {
        $this->validate([
            'ci' => 'required|unique:users|integer',
            'name' => 'required|string',
            'apellido' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'telefono' => 'nullable|min:11',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
            // 'roles_select' => 'required'
        ]);

        /*  'required|min:8|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/
        /*  'password' => 'required|min:8|same:confirm_password', */
        /* 'roles' => 'required' */

        try {
            $nuevoUsuario = new User;
            $nuevoUsuario->ci = $this->ci;
            $nuevoUsuario->name = $this->name;
            $nuevoUsuario->apellido = $this->apellido;
            $nuevoUsuario->email = $this->email;
            // $nuevoUsuario->telefono = $this->telefono;

            $nuevoUsuario->password = Hash::make($this->password);

            $nuevoUsuario->status = 1;
            $nuevoUsuario->save();

            // dump(intval($this->roles_select));
            // dump($nuevoUsuario);

            $idUsuario = $nuevoUsuario->id;

            DB::table('model_has_roles')->insert([
                'role_id' => $this->roles_select,
                'model_type' => 'App\Models\User',
                'model_id' => $idUsuario,
            ]);

        } 

        catch (\Illuminate\Database\QueryException $ex) {
    $errorCode = $ex->errorInfo[1];
    if ($errorCode == 1062) {
        session()->flash('error', 'El registro ya existe.');
    } else {
        $errorMessage = $ex->getMessage(); // Obtener el mensaje de error completo
        $errorSql = $ex->getSql(); // Obtener la consulta SQL que causó el error
        $errorBindings = $ex->getBindings(); // Obtener los valores de enlace utilizados en la consulta
        session()->flash('error', 'Ocurrió un error en la base de datos. Detalles: ' . $errorMessage);
        // También puedes mostrar $errorSql y $errorBindings si deseas información adicional
    }
}
    
        // catch (\Illuminate\Database\QueryException $ex) {
        //     $errorCode = $ex->errorInfo[1];
        //     if ($errorCode == 1062) {
        //         session()->flash('error', 'El registro ya existe.');
        //     } else {
        //         session()->flash('error', 'Ocurrió un error en la base de datos.');
        //     }
        // } catch (\Exception $ex) {
        //     session()->flash('error', 'Ocurrió un error inesperado.');
        //     dd($ex->getMessage());
        // }

        $this->ci = '';
        $this->name = '';
        $this->apellido = '';
        $this->email = '';
        $this->telefono = '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->roles_select = '';
        $idUsuario = '';

        $this->dispatchBrowserEvent('close-modal');
        $this->emit('refreshDataTable');
        session()->flash('message', 'Datos guardados con éxito');
    }

    public function render()
    {

        $usuarios = User::SELECT('ci', 'name', 'apellido', 'email')->get();
        // $roles = Role::pluck('name')->all();
        $roles = Role::pluck('name', 'id')->all();

        return view('livewire.usuarios')->extends('adminlte::page')
            ->with([
                'usuarios' => $usuarios,
                'roles' => $roles,
            ]);
    }
}
