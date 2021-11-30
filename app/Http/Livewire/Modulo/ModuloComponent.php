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
        if(session('empresa_id')) {
        $empresa_modulos = EmpresaModulo::where('empresa_id',session('empresa_id'))->get('modulo_id');
        //dd(session('empresa_id'));
        //dd($empresa_modulos);

        $this->modulos=Modulo::find($empresa_modulos);
        return view('livewire.modulo.modulo-component',$this->modulos);
        } else {
            return view('livewire.empresa.empresa-component');
        }
    }
}
