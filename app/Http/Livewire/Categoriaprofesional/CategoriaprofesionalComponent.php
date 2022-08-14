<?php

namespace App\Http\Livewire\Categoriaprofesional;

use App\Models\Categoriaprofesional;
use Livewire\Component;

class CategoriaprofesionalComponent extends Component
{
    public $categorias; 
    public $categoriaseleccionada;
    public $name;
    public $subcategoria;
    public $cct;
    public $preciodia;
    public $preciomes;
    public $preciohora;
    public $preciounidad;
    public $basico   ;
    public $basico1  ;
    public $basico2  ;
    public $porcentaje;
    public $activo;
    public $observacion;

    public function render()
    {
        $this->categorias = Categoriaprofesional::where('empresa_id',session('empresa_id'))->get();
        return view('livewire.categoriaprofesional.categoriaprofesional-component')->extends('layouts.adminlte');
    }

    public function CargarDatosCategoria($id) {
        $this->categoriaseleccionada=$id;
        $categoria = Categoriaprofesional::find($id);
        $this->id = $categoria->id;
        $this->name = $categoria->name;
        $this->subcategoria = $categoria->subcategoria;
        $this->cct = $categoria->cct;
        $this->preciodia = $categoria->preciodia;
        $this->preciomes = $categoria->preciomes;
        $this->preciohora = $categoria->preciohora;
        $this->preciounidad = $categoria->preciounidad;
        $this->basico    = $categoria->basico   ;
        $this->basico1   = $categoria->basico1  ;
        $this->basico2   = $categoria->basico2  ;
        $this->porcentaje = $categoria->porcentaje;
        $this->activo = $categoria->activo;
        $this->observacion = $categoria->observacion;
    }
}
