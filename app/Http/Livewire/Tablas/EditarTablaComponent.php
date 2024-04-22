<?php

namespace App\Http\Livewire\Tablas;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Tabla;

class EditarTablaComponent extends Component
{
    public $isModalOpen = false;
    public $ListadeTablas;
    
    public function render()
    {
        $this->ListadeTablas = Tabla::selectraw(' name, (select id from tabla_usuarios WHERE tabla_usuarios.tabla_id = tablas.id and tabla_usuarios.user_id = '.Auth::user()->id.') as relac_id, empresa_id, id as tabla_id')
        ->where('id','>=',1)
        ->where('empresa_id','=',session('empresa_id'))
        ->get();
        // dd($this->ListadeTablas);
        return view('livewire.tablas.editar-tabla-component',['datos'=> $this->ListadeTablas])->extends('layouts.adminlte');
    }

    public function edit() {
        dd('En construcción');
    }

    public function delete() {
        dd('En construcción');
    }

    public function create() {
        dd('En construcción');
    }
}
