<?php

namespace App\Http\Livewire\Empresa;

use App\Models\Empresa;
use App\Models\EmpresaUsuario;
use Livewire\Component;
use App\Models\EmpresaModulo;
use App\Models\Modulo;



class EmpresaComponent extends Component
{
    public $empresas;
    public $empresa_id;

    public function render()
    {
        $userid=auth()->user()->id;
        $empresas_usuario = EmpresaUsuario::where('user_id',$userid)->get('id');
        $this->empresas=Empresa::find($empresas_usuario);
        return view('livewire.empresa.empresa-component');
    }

    public function cargamodulos($id) {
        session(['empresa_id' => $id]);
        $this->empresa_id=$id;
        $empresa_modulos = EmpresaModulo::where('empresa_id',$this->empresa_id)->get('modulo_id');
        $modulos=Modulo::find($empresa_modulos);
        return view('livewire.modulo.modulo-component',$modulos);
    }
    
}
