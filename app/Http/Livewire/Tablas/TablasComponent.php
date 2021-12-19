<?php

namespace App\Http\Livewire\Tablas;

use Livewire\Component;
use App\Models\EmpresaUsuario;
use App\Models\Tabla;
use App\Models\TablaUsuario;
use App\Models\User;


class TablasComponent extends Component
{

    public $isModalOpen = false;
    public $tablas = [];
    public $user_id;


    public function render()
    {
        if(is_null($this->user_id)) $this->user_id = 0;
        $this->empresa_id=session('empresa_id');
        $this->users = User::join('empresa_usuarios', 'empresa_usuarios.user_id','=', 'users.id')
        ->where('empresa_usuarios.empresa_id','=',$this->empresa_id)->get();

        return view('livewire.tablas.tablas-component',['datos'=> Tabla::where('empresa_id', $this->empresa_id)->paginate(4),])->extends('layouts.adminlte');
    }

    public function CargarInformesHabilitados($usuario_id) {
        $this->tablas = TablaUsuario::join('tablas', 'tabla_usuarios.tabla_id','=', 'tablas.id')
        ->where('tablas.empresa_id','=',$this->empresa_id)
        ->where('tabla_usuarios.user_id','=',$usuario_id)
        ->get();
        $this->user_id = $usuario_id;   // Establece el ide de ususario con el que se va a trabajar
    }

    public function CargarInformesConEstado($user_id) {
        $this->ListadeTablas = Tabla::selectraw(' name, (select tabla_id from tabla_usuarios WHERE tabla_usuarios.tabla_id = tablas.id and tabla_usuarios.user_id = '.$user_id.') as valor, empresa_id')
        ->where('id','>=',1)
        ->where('empresa_id','=',$this->empresa_id)
        ->get();


        // select name, (select tabla_id from tabla_usuarios WHERE tabla_usuarios.tabla_id = tablas.id) as valor, empresa_id from `tablas` where `id` >= 1;


        //$this->ListadeTablas = Tabla::where('empresa_id','=',$this->empresa_id)
//            ->select('name', '(select name from tablas WHERE tabla_usuarios.tabla_id = tabla.id)' . 'as valor')            
            //->selectraw(' name, (select tabla_id from tabla_usuarios WHERE tabla_usuarios.tabla_id = tablas.id) as valor from tablas where empresa_id = 1;')            
            //->orderby('name')->get();

//         SELECT SupplierName, (SELECT ProductName FROM Products WHERE Products.SupplierID = Suppliers.supplierID AND Price = 22) as valor
// FROM Suppliers
// WHERE 1 order by SupplierName;


//select name, (select name from tablas, tabla_usuarios WHERE tabla_usuarios.tabla_id = tablas.id) as valor from `tablas` where `empresa_id` = 1 order by `name` asc
    }

    public function create($user_id)
    {
        $this->resetCreateForm();   
        $this->openModalPopover();
        $this->isModalOpen=true;
        $this->CargarInformesConEstado($user_id);
        //return view('livewire.proveedor.createproveedores')->with('isModalOpen', $this->isModalOpen)->with('name', $this->name);
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
        $this->CargarInformesHabilitados($this->user_id);
    }

    private function resetCreateForm(){
        // $this->proveedor_id = '';

        // $this->name = '';
        // $this->direccion = '';
        // $this->cuit = '';
        // $this->telefono = '';
        // $this->email = '';
    }
    
}
