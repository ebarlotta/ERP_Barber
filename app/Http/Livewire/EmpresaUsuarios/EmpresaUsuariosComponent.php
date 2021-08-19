<?php

namespace App\Http\Livewire\EmpresaUsuarios;

use Livewire\Component;
use App\Models\EmpresaUsuario;
use App\Models\Empresa;
//use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;

class EmpresaUsuariosComponent extends Component
{
    public $isModalOpen = false;
    //public $empresa_id;

    public $name;

    public $usuariosglobales;
    public $lista = array("amaya","julio","javier","nacho","sonsoles");
    //public $usuarios;
    public $usuariosdelaempresa;
    public $usuariosdelaemp;
    public $usuariosNOempresa;
    public $empresas;
    public $empresaseleccionada;
    public $seleccionado=1;

    public function render()
    {
        $this->usuariosglobales= User::all();
        //$this->usuarios = User::all();
        $this->empresas = Empresa::all()->sortBy('id');
        //$this->seleccionado = 1; //$this->empresas->first()->id;      //Generalmente es el primer registro "1"
        //$this->CargarUsuarios($this->seleccionado);
        return view('livewire.empresa-usuarios.empresa-usuarios-component');
    }

    public function relacionar()
    {
        //$this->usuariosglobales = User::all();
        //$this->empresas = Empresa::all();
        return view('livewire.empresa-usuarios.empresarelacion');
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
        $this->isModalOpen = true;
        return view('livewire.empresa-usuarios.empresarelacion');
    }

    public function mostrarmodal()
    {
        $this->isModalOpen = true;
    }
    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }   

    public function CargarUsuarios($id)
    {
        $this->empresaseleccionada = Empresa::find($id);
        //$this->seleccionado = $this->empresaseleccionada->id;
         $this->usuariosdelaempresa = DB::table('users')->distinct()
            ->join('empresa_usuarios', 'users.id', '=', 'empresa_usuarios.user_id')
            ->join('empresas',  'empresas.id', '=', 'empresa_usuarios.empresa_id',)
            ->where('empresas.id', $this->empresaseleccionada->id)
            ->select('users.*', 'empresas.name as empresa')
            ->get();
            $this->usuariosdelaemp = $this->usuariosdelaempresa;
            // if($this->usuariosdelaempresa) { $this->usuariosdelaempresa=json_encode($this->usuariosdelaempresa, false); } 
            // else { $this->usuariosdelaempresa = null;}
            
            // $this->usuariosdelaempresa=DB::select(DB::raw('SELECT empresas.id as empresa_id, empresas.name as nombre_empresa, empresas.direccion, users.name as name_user, users.email, users.id as id_user FROM empresas,empresa_usuarios,users WHERE empresas.id = empresa_usuarios.empresa_id and empresa_usuarios.user_id = users.id and empresas.id=' . $this->empresaseleccionada->id));
            //dd($this->usuariosdelaempresa);

        //$this->usuariosdelaempresa=User::all();
        //dd($this->usuariosdelaempresa);
        //$this->usuariosdelaempresa=User::all();
        $array = json_decode($this->usuariosdelaempresa, true);
        $this->usuariosdelaempresa=$array;
        $this->usuariosNOempresa=User::all();
    }

    public function AgregarUsuario($user_id)
    {
        EmpresaUsuario::create(['empresa_id' => $this->empresaseleccionada->id, 'user_id' => $user_id]);
        $this->closeModalPopover();
        $this->usuarios = User::all();
        $this->CargarUsuarios($this->empresaseleccionada->id);
        return view('livewire.empresa-usuarios.empresa-usuarios-component');
    }

    public function EliminarUsuario($user_id)
    {
        $a = EmpresaUsuario::where('empresa_id', "=", $this->empresaseleccionada->id)
            ->where('user_id', "=", $user_id)->delete();
        //dd($a);
        $this->closeModalPopover();
        $this->usuarios = User::all();
        $this->CargarUsuarios($this->empresaseleccionada->id);
        return view('livewire.empresa-usuarios.empresa-usuarios-component');
    }
}
