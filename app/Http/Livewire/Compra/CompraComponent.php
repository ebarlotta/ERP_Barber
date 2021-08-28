<?php

namespace App\Http\Livewire\Compra;

use App\Models\Cliente;
use Livewire\Component;
use App\Models\Proveedor;
use App\Models\Area;
use App\Models\Cuenta;
use App\Models\Iva;


class CompraComponent extends Component
{
    public $isModalOpen = false;

    public $areas, $cuentas, $ivas, $proveedores;
    public $empresa_id;
    
    public $tabActivo=1;
    // public $cliente, $cliente_id;
    // public $clientes;

    // public $name;
    // public $direccion;
    // public $cuil;
    // public $telefono;
    // public $email;


    public function render()
    {
        $this->empresa_id = session('empresa_id');
        $this->areas = Area::where('empresa_id', $this->empresa_id)->get();
        $this->cuentas = Cuenta::where('empresa_id', $this->empresa_id)->get();
        $this->proveedores = Proveedor::where('empresa_id', $this->empresa_id)->get();
        $this->ivas = Iva::all();
        return view('livewire.compra.compra-component');
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
        $this->isModalOpen = true;
        return view('livewire.cliente.createclientes')->with('isModalOpen', $this->isModalOpen)->with('name', $this->name);
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }

    private function resetCreateForm()
    {
        $this->cliente_id = '';

        $this->name = '';
        $this->direccion = '';
        $this->cuil = '';
        $this->telefono = '';
        $this->email = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'direccion' => 'required',
            'cuil' => 'required|integer',
            'telefono' => 'required|integer',
            'email' => 'required|email',
        ]);
        Cliente::updateOrCreate(['id' => $this->cliente_id], [
            'name' => $this->name,
            'empresa_id' => $this->empresa_id,
            'direccion' => $this->direccion,
            'cuil' => $this->cuil,
            'telefono' => $this->telefono,
            'email' => $this->email,
        ]);

        session()->flash('message', $this->cliente_id ? 'Cliente Actualizado.' : 'Cliente Creado.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        $this->id = $id;
        $this->cliente_id = $id;
        $this->name = $cliente->name;
        $this->direccion = $cliente->direccion;
        $this->cuil = $cliente->cuil;
        $this->telefono = $cliente->telefono;
        $this->email = $cliente->email;

        $this->openModalPopover();
    }

    public function delete($id)
    {
        Cliente::find($id)->delete();
        session()->flash('message', 'Cliente Eliminado.');
    }

    public function CambiarTab($id) {
        $this->tabActivo=$id;
    }
}
