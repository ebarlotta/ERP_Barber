<?php

namespace App\Http\Livewire\Compra;

use App\Models\Cliente;
use Livewire\Component;
use App\Models\Proveedor;
use App\Models\Area;
use App\Models\Comprobante;
use App\Models\Cuenta;
use App\Models\Iva;
use Illuminate\Support\Facades\DB;

class CompraComponent extends Component
{
    public $isModalOpen = false;

    public $areas, $cuentas, $ivas, $proveedores;
    public $empresa_id;
    
    public $tabActivo=1;

    public $gfecha,$gproveedor, $gcomprobante, $gcuenta, $gdetalle, $ganio, $gmes, $garea, $gpartiva, $gbruto, $giva, $giva2, $gexento, $gimpinterno, $gperciva, $gpergan, $gretgan, $gneto, $gmontopagado, $gcantidad;
    //Variables del filtro
    public $gfmes, $gfproveedor, $gfparticipa, $gfiva, $gfdetalle, $gfarea, $gfcuenta, $gfanio, $fgascendente, $gfsaldo;
    
    //Listado de filtros
    public $filtro;

    public function render()
    {
        $this->empresa_id = session('empresa_id');
        $this->areas = Area::where('empresa_id', $this->empresa_id)->get();
        $this->cuentas = Cuenta::where('empresa_id', $this->empresa_id)->get();
        $this->proveedores = Proveedor::where('empresa_id', $this->empresa_id)->get();
        $this->ivas = Iva::all();
        //return view('livewire.compra.index');
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

    public function gfiltro(){
        
        $sql = $this->ProcesaSQLFiltro('comprobantes'); // Procesa los campos a mostrar
        $registros = DB::select(DB::raw($sql));       // Busca el recordset
        //$registros = DB::select( DB::raw($sql) );       // Busca el recordset
        //$registros=Comprobante::all();
        //$registros = $registros->result_array();
        //dd($registros[0]->comprobante);
        //$registros = implode(";", $registros);
        //$registros = json_decode($registros, true);
        //dd($registros);
        //Dibuja el filtro
        $Saldo=0;
        $this->filtro="
        <table class=\"table-auto w-full border border-green-800 border-collapse bg-gray-300 rounded-md text-xs\">
            <tr>
                <td class=\"border border-green-600\">Fecha</td><td class=\"border border-green-600\">Comprobante</td><td class=\"border border-green-600\">Proveedor</td><td class=\"border border-green-600\">Detalle</td><td class=\"border border-green-600\">Bruto</td><td class=\"border border-green-600\">Iva</td><td class=\"border border-green-600\">exento</td><td class=\"border border-green-600\">Imp.Interno</td><td class=\"border border-green-600\">Percec.Iva</td><td class=\"border border-green-600\">Retenc.IB</td><td class=\"border border-green-600\">Retenc.Gan</td><td class=\"border border-green-600\">Neto</td><td class=\"border border-green-600\">Pagado</td><td class=\"border border-green-600\">Saldo</td><td class=\"border border-green-600\">Cant.Litros</td><td class=\"border border-green-600\">Partic.Iva</td><td class=\"border border-green-600\">Pasado EnMes</td><td class=\"border border-green-600\">Area</td><td class=\"border border-green-600\">Cuenta</td>
            </tr>";
        foreach($registros as $registro) {
            //dd($registro);
            $Fecha = substr($registro->fecha,8,2) ."-". substr($registro->fecha,5,2) ."-". substr($registro->fecha,0,4);
            $Area=Area::find($registro->area_id);
            $Cuenta=Cuenta::find($registro->cuenta_id);
            $Iva=Iva::find($registro->iva_id);
            $MontoIva=($registro->BrutoComp)*($Iva->monto/100);
            $Saldo=$Saldo+$registro->NetoComp-$registro->MontoPagadoComp;
            $this->filtro=$this->filtro."<tr><td class=\"border border-green-600\">$Fecha</td><td class=\"border border-green-600\">$registro->comprobante</td><td class=\"border border-green-600\">Proveedor</td><td class=\"border border-green-600\">$registro->detalle</td><td class=\"border border-green-600\">".number_format($registro->BrutoComp, 2, ',')."</td><td class=\"border border-green-600\">".number_format($MontoIva, 2, ',')."</td><td class=\"border border-green-600\">".number_format($registro->ExentoComp, 2, ',')."</td><td class=\"border border-green-600\">".number_format($registro->ImpInternoComp, 2, ',')."</td><td class=\"border border-green-600\">".number_format($registro->PercepcionIvaComp, 2, ',')."</td><td class=\"border border-green-600\">".number_format($registro->RetencionIB, 2, ',')."</td><td class=\"border border-green-600\">".number_format($registro->RetencionGan, 2, ',')."</td><td class=\"border border-green-600\">".number_format($registro->NetoComp, 2, ',')."</td><td class=\"border border-green-600\">".number_format($registro->MontoPagadoComp, 2, ',')."</td><td class=\"border border-green-600\">".number_format($Saldo, 2, ',')."</td><td class=\"border border-green-600\">".number_format($registro->CantidadLitroComp, 2, ',')."</td><td class=\"border border-green-600\">$registro->ParticIva</td><td class=\"border border-green-600\">" . $this->ConvierteMesEnTexto($registro->PasadoEnMes) . "</td><td class=\"border border-green-600\">".$Area->name."</td><td class=\"border border-green-600\">".$Cuenta->name."</td></tr>
            </tr>";
        }
        // foreach($registros as $registro) {
        //     $Fecha = substr($registro->fecha,8,2) ."-". substr($registro->fecha,5,2) ."-". substr($registro->fecha,0,4);
        //     $Area=$registro->area;
        //     $Cuenta=$registro->cuenta;
        //     $Saldo=$Saldo+$registro->NetoComp-$registro->MontoPagadoComp;
        //     $this->filtro=$this->filtro."<tr><td class=\"border border-green-600\">$Fecha</td><td class=\"border border-green-600\">$registro->comprobante</td><td class=\"border border-green-600\">Proveedor</td><td class=\"border border-green-600\">$registro->detalle</td><td class=\"border border-green-600\">$registro->BrutoComp</td><td class=\"border border-green-600\">$registro->IvaComp</td><td class=\"border border-green-600\">$registro->ExentoComp</td><td class=\"border border-green-600\">$registro->ImpInternoComp</td><td class=\"border border-green-600\">$registro->PercepcionIvaComp</td><td class=\"border border-green-600\">$registro->RetencionIB</td><td class=\"border border-green-600\">$registro->RetencionGan</td><td class=\"border border-green-600\">$registro->NetoComp</td><td class=\"border border-green-600\">$registro->MontoPagadoComp</td><td class=\"border border-green-600\">$Saldo</td><td class=\"border border-green-600\">$registro->CantidadLitroComp</td><td class=\"border border-green-600\">$registro->ParticIva</td><td class=\"border border-green-600\">" . $this->ConvierteMesEnTexto($registro->PasadoEnMes) . "</td><td class=\"border border-green-600\">".$Area['name']."</td><td class=\"border border-green-600\">".$Cuenta['name']."</td></tr>
        //     </tr>";
        // }
        $this->filtro=$this->filtro."</table>";
    }

    public function ConvierteMesEnTexto($id) {
        switch ($id) {
            case 1 : $caso="Enero"; break;
            case 2 : $caso="Febrero"; break;
            case 3 : $caso="Marzo"; break;
            case 4 : $caso="Abril"; break;
            case 5 : $caso="Mayo"; break;
            case 6 : $caso="Junio"; break;
            case 7 : $caso="Julio"; break;
            case 8 : $caso="Agosto"; break;
            case 9 : $caso="Setiembre"; break;
            case 10 : $caso="Octubre"; break;
            case 11 : $caso="Noviembre"; break;
            case 12 : $caso="Diciembre"; break;
        }
        return $caso;
    }

    public function ProcesaSQLFiltro($interfaz){
        //Mes 	Proveedor 	ParticipaIva 	Iva 	Detalle 	Area 	Cuenta 	Año 	Asc. C/Saldo
        $sql='';
        if ($this->gfmes) $sql=" PasadoEnMes=" . $this->gfmes;
        if ($this->gfproveedor) $sql=$sql ? $sql=$sql." and proveedor_id=" . $this->gfproveedor : " proveedor_id=" . $this->gfproveedor;
        if ($this->gfparticipa) $sql=$sql ? $sql=$sql." and ParticIva='" . $this->gfparticipa . "'" : " ParticIva='" . $this->gfparticipa . "'";
        if ($this->gfiva) $sql=$sql ? $sql=$sql." and iva_id=" . $this->gfiva : " iva_id=" . $this->gfiva;
        if ($this->gfdetalle) $sql=$sql ? $sql=$sql." and detalle='" . $this->gfdetalle . "'" : " detalle='" . $this->gfdetalle . "'";
        if ($this->gfarea) $sql=$sql ? $sql=$sql." and area_id=" . $this->gfarea : " area_id=" . $this->gfarea;
        if ($this->gfcuenta) $sql=$sql ? $sql=$sql." and cuenta_id=" . $this->gfcuenta : " cuenta_id=" . $this->gfcuenta;
        if ($this->gfanio) $sql=$sql ? $sql=$sql." and Anio=" . $this->gfanio : " Anio=" . $this->gfanio;
        $sql=$sql ? $sql=$sql." and empresa_id=" . session('empresa_id') : $sql." empresa_id=" . session('empresa_id');;

        //Fecha	Comprobante	Proveedor	Detalle	Bruto	Iva	exento	Imp.Interno	Percec.Iva	Retenc.IB	Retenc.Gan	Neto	Pagado	Saldo	Cant.Litros	Partic.Iva	Pasado EnMes	Area	Cuenta
        $sql = "SELECT * FROM comprobantes WHERE" . $sql . " ORDER BY fecha, comprobante";
        if ($this->fgascendente) $sql=$sql . " ASC";
        //dd($sql);
        return $sql;
    }
}
