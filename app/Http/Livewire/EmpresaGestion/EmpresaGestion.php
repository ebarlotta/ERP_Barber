<?php

namespace App\Http\Livewire\EmpresaGestion;

use Livewire\Component;
use App\Models\Empresa;

class EmpresaGestion extends Component
{
    public $empresas;
    public $isModalOpen;
    public $seleccionado;
    public $empresa;
    public $empresa_id, $name, $direccion, $cuit, $ib, $establecimiento, $telefono, $actividad, $actividad1;

    public function render()
    {
        $this->empresas=Empresa::all();
        return view('livewire.empresa-gestion.empresa-gestion')->extends('layouts.adminlte')
        ->section('content');
    }

    public function mostrarmodal()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }
    public function CargarDatosEmpresa($id) {
        $empresa = Empresa::find($id);
        $this->name = $empresa->name; 
        $this->direccion = $empresa->direccion; 
        $this->cuit = $empresa->cuit; 
        $this->ib = $empresa->ib; 
        $this->establecimiento = $empresa->establecimiento; 
        $this->telefono = $empresa->telefono; 
        $this->actividad = $empresa->actividad; 
        $this->actividad1 = $empresa->actividad1; 
        $this->empresa_id = $id; 

        $this->mostrarmodal();
    }

    public function CrearEmpresa() {
        $this->name = ""; 
        $this->direccion = ""; 
        $this->cuit = ""; 
        $this->ib = ""; 
        $this->establecimiento = ""; 
        $this->telefono = ""; 
        $this->actividad = ""; 
        $this->actividad1 = ""; 
        $this->empresa_id = null; 

        $this->mostrarmodal();
    }

    public function store() {
        $this->validate([
            'name' => 'required',
            'direccion' => 'required',
            'cuit' => 'required',
            'ib' => 'required',
            'establecimiento' => 'required',
            'telefono' => 'required',
            'actividad' => 'required',
            'actividad1' => 'required',
        ]);
        Empresa::updateOrCreate(['id' => $this->empresa_id],[
            'name' => $this->name,
            'direccion' => $this->direccion,
            'cuit' => $this->cuit,
            'establecimiento' => $this->establecimiento,
            'ib' => $this->ib,
            'telefono' => $this->telefono,
            'actividad' => $this->actividad,
            'actividad1' => $this->actividad1,
        ]);
        $this->closeModalPopover();
    }
}
