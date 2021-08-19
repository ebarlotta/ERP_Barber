<?php

namespace App\Http\Livewire\Modulo;

use App\Models\EmpresaModulo;
use App\Models\Modulo;
use Livewire\Component;

class ModuloComponent extends Component
{
    public $empresa_id;
    public $modulos;

    public function render()
    {
        $empresa_modulos = EmpresaModulo::where('empresa_id',session('empresa_id'))->get('modulo_id');
        $this->modulos=Modulo::find($empresa_modulos);
        return view('livewire.modulo.modulo-component',$this->modulos);
    }
}
