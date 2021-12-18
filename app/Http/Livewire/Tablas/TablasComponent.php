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


    public function render()
    {
        $this->empresa_id=session('empresa_id');
        $this->users = User::join('empresa_usuarios', 'empresa_usuarios.user_id','=', 'users.id')
        ->where('empresa_usuarios.empresa_id','=',$this->empresa_id)->get();

//        $this->tablas = Tabla::where('empresa_id',$this->empresa_id)->get();

        return view('livewire.tablas.tablas-component',['datos'=> Tabla::where('empresa_id', $this->empresa_id)->paginate(4),])->extends('layouts.adminlte');
    }

    public function CargarInformesHabilitados($usuario_id) {
        $this->tablas = TablaUsuario::join('tablas', 'tabla_usuarios.tabla_id','=', 'tablas.id')
        ->where('tablas.empresa_id','=',$this->empresa_id)
        ->where('tabla_usuarios.user_id','=',$usuario_id)
        ->get();
        //->where('tabla_usuarios.user_id','=',$usuario_id)->get();
//dd($this->tablas);
        //$this->tablas = Tabla::where('empresa_id',$this->empresa_id)->get();
    }

}
