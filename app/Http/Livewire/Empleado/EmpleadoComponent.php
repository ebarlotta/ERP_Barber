<?php

namespace App\Http\Livewire\Empleado;

use Livewire\Component;
use App\Models\Empleado;

class EmpleadoComponent extends Component
{
    public $isModalOpen = false;
    public $empleado, $empleado_id;
    public $empleados;

    public $name, $domicilio, $cuil, $telefono, $legajo, $dni, $nacimiento, $ingreso, $estadocivil, $tipocontratacion;
    public $regimen, $banco, $nrocuentabanco, $jornalizado, $mensualizado=false, $hora, $unidad, $seccion, $activo, $baja;

    public $empresa_id;
    public function render()
    {
        $this->empresa_id = session('empresa_id');
        $this->empleados = Empleado::where('empresa_id', $this->empresa_id)->get();
        return view('livewire.empleado.empleado-component');
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
        $this->isModalOpen = true;
        return view('livewire.empleado.createempleados')->with('isModalOpen', $this->isModalOpen)->with('name', $this->name);
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
        $this->empleado_id = '';

        $this->name = '';
        $this->domicilio = '';
        $this->cuil = '';
        $this->telefono = '';
        $this->legajo = '';
        $this->dni = '';
        $this->nacimiento = '';
        $this->ingreso = '';
        $this->estadocivil = '';
        $this->tipocontratacion;
        $this->regimen = '';
        $this->banco = '';
        $this->nrocuentabanco = '';
        $this->jornalizado = '';
        $this->mensualizado = '';
        $this->hora = '';
        $this->unidad = '';
        $this->seccion = '';
        $this->activo = '';
        $this->baja = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'domicilio' => 'required',
            'cuil' => 'required|integer',
            'telefono' => 'required|integer',
            'legajo' => 'required|integer',
            'dni' => 'required|integer',
            'nacimiento' => 'required|datetime',
            'ingreso' => 'required|datetime',
            'estadocivil' => 'required',
            'tipocontratacion' => 'required',
            'regimen' => 'required',
            'banco' => 'required',
            'nrocuentabanco' => 'required|integer',
            'jornalizado' => 'required|bool',
            'mensualizado' => 'required|bool',
            'hora' => 'required|bool',
            'unidad' => 'required|bool',
            'seccion' => 'required',
            'activo' => 'required|bool',
            'baja' => 'required|datetime',
        ]);
        Empleado::updateOrCreate(['id' => $this->empleado_id], [
            'name' => $this->name,
            'empresa_id' => $this->empresa_id,
            'domicilio' => $this->domicilio,
            'cuil' => $this->cuil,
            'telefono' => $this->telefono,
            'legajo' => $this->legajo,
            'dni' => $this->dni,
            'nacimiento'=> $this->nacimiento,
            'ingreso' => $this->ingreso,
            'estadocivil' => $this->estadocivil,
            'tipocontratacion' => $this->tipocontratacion,
            'regimen' => $this->regimen,
            'banco' => $this->banco,
            'nrocuentabanco' => $this->nrocuentabanco,
            'jornalizado' => $this->jornalizado,
            'mensualizado' => $this->mensualizado,
            'hora' => $this->hora,
            'unidad' => $this->unidad,
            'seccion' => $this->seccion,
            'activo' => $this->activo,
            'baja'=> $this->baja,
        ]);

        session()->flash('message', $this->empleado_id ? 'Empleado Actualizado.' : 'Empleado Creado.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);
        $this->id = $id;
        $this->empleado_id = $id;
        $this->legajo = $empleado->legajo;
        $this->name = $empleado->name;
        $this->domicilio = $empleado->domicilio;
        $this->dni = $empleado->dni;
        $this->cuil = $empleado->cuil;
        $this->nacimiento = date('d-m-Y', strtotime($empleado->nacimiento));
        $this->ingreso = date('d-m-Y', strtotime($empleado->ingreso));
        $this->estadocivil = $empleado->estadocivil;
        $this->tipocontratacion = $empleado->tipocontratacion;
        $this->regimen = $empleado->regimen;
        $this->banco = $empleado->banco;
        $this->nrocuentabanco = $empleado->nrocuentabanco;
        $this->estadocivil = $empleado->estadocivil;
        $this->telefono = $empleado->telefono;
        $this->jornalizado = $empleado->jornalizado;
        $this->mensualizado = $empleado->mensualizado;
        $this->hora = $empleado->hora;
        $this->unidad = $empleado->unidad;
        $this->seccion = $empleado->seccion;
        $this->activo = $empleado->activo;
        $this->baja = $empleado->baja;

        $this->openModalPopover();
    }

    public function delete($id)
    {
        Empleado::find($id)->delete();
        session()->flash('message', 'Empleado Eliminado.');
    }
}
