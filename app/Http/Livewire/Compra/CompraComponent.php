<?php

namespace App\Http\Livewire\Compra;

use Livewire\Component;
use App\Models\Proveedor;
use App\Models\Area;
use App\Models\Comprobante;
use App\Models\Cuenta;
use App\Models\EmpresaUsuario;
use App\Models\Iva;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class CompraComponent extends Component
{
    public $isModalOpen = false;

    public $areas, $cuentas, $ivas, $proveedores;
    public $empresa_id, $iva_value=0;
    
    public $tabActivo=1; public $giva=1;

    public $ModalDelete, $openModalDelete;
    public $ModalModify, $openModalModify;

    public $gfecha,$gproveedor, $gcomprobante, $gcuenta, $gdetalle, $ganio, $gmes, $garea, $gpartiva, $gbruto, $giva2, $gexento, $gimpinterno, $gperciva, $gretgan, $gperib, $gneto, $gmontopagado, $gcantidad, $comprobante_id;
    
    //Variables del filtro
    public $gfmes, $gfproveedor, $gfparticipa, $gfiva, $gfdetalle, $gfarea, $gfcuenta, $gfanio, $fgascendente, $gfsaldo;
    
    //Listado de filtros
    public $filtro;

    public function render() {
        //dd($this->empresa_id);
        if (!is_null(session('empresa_id'))) { $this->empresa_id = session('empresa_id'); } 
        else { 
            $userid=auth()->user()->id;
            $empresas= EmpresaUsuario::where('user_id',$userid)->get();
            return view('livewire.empresa.empresa-component')->with('empresas', $empresas); 
        }
        $this->areas = Area::where('empresa_id', $this->empresa_id)->get();
        $this->cuentas = Cuenta::where('empresa_id', $this->empresa_id)->get();
        $this->proveedores = Proveedor::where('empresa_id', $this->empresa_id)->get();
        $this->ivas = Iva::where('id','>',1)->get();
        //return view('livewire.compra.index');
        return view('livewire.compra.compra-component');
    }

    public function openModalDelete() { $this->ModalDelete = true;  }
    public function closeModalDelete() { $this->ModalDelete = false;  }

    public function openModalModify() { $this->ModalModify = true;  }
    public function closeModalModify() { $this->ModalModify = false;  }

    public function RellenarCamposVacios() {
        if(isEmpty($this->gfecha)) $this->gfecha=now();
        if(isEmpty($this->gbruto)) $this->gbruto=0.00;

        if(isEmpty($this->gexento)) $this->gexento=0.00;
        if(isEmpty($this->gimpinterno)) $this->gimpinterno=0.00;
        if(isEmpty($this->gperciva)) $this->gperciva=0.00;
        if(isEmpty($this->gperib)) $this->gperib=0.00;
        if(isEmpty($this->gretgan)) $this->gretgan=0.00;
        if(isEmpty($this->gneto)) $this->gneto=0.00;
        if(isEmpty($this->gbruto)) $this->gbruto=0.00;
        if(isEmpty($this->gmontopagado)) $this->gmontopagado=0.00;
        if(isEmpty($this->gcantidad)) $this->gcantidad=0.00;
        if(isEmpty($this->giva2)) $this->giva2=0.00;
        
        
    }

    public function store() {
        $this->RellenarCamposVacios();            

        $this->validate([
            'gfecha'            => 'required|date',
            'gbruto'            => 'numeric',
            'gpartiva'          => 'required',
            'giva2'             => 'numeric',
            'gexento'           => 'numeric',
            'gimpinterno'       => 'numeric',
            'gperciva'          => 'numeric',
            'gperib'            => 'numeric',
            'gretgan'           => 'numeric',
            'gneto'             => 'numeric',
            'gmontopagado'      => 'numeric', 
            'gcantidad'         => 'numeric',
            'ganio'             => 'required|integer',
            'gmes'              => 'required',
            'giva'              => 'required|integer',
            'garea'             => 'required|integer',
            'gcuenta'           => 'required|integer',
            'gproveedor'        => 'required|integer',
        ]);
        Comprobante::create([
            'fecha'             => $this->gfecha,
            'comprobante'       => $this->gcomprobante,
            'detalle'           => $this->gdetalle,
            'BrutoComp'         => $this->gbruto,
            'ParticIva'         => $this->gpartiva,
            'MontoIva'          => $this->giva2,
            'ExentoComp'        => $this->gexento,
            'ImpInternoComp'    => $this->gimpinterno,
            'PercepcionIvaComp' => $this->gperciva,
            'RetencionIB'       => $this->gperib,
            'RetencionGan'      => $this->gretgan,
            'NetoComp'          => $this->gneto,
            'MontoPagadoComp'   => $this->gmontopagado, 
            'CantidadLitroComp' => $this->gcantidad,
            'Anio'              => $this->ganio,
            'PasadoEnMes'       => $this->gmes,
            'iva_id'            => $this->giva,
            'area_id'           => $this->garea,
            'cuenta_id'         => $this->gcuenta,
            'user_id'           => auth()->user()->id,
            'empresa_id'        => session('empresa_id'),
            'proveedor_id'      => $this->gproveedor,
        ]);
        //updateOrCreate
        $this->gfiltro();
        session()->flash('message', 'Comprobante Creado.');
    }

    public function edit() {
        $comp = Comprobante::find($this->comprobante_id);
        $this->validate([
            'gfecha'            => 'required|date',
            'gbruto'            => 'numeric',
            'gpartiva'          => 'required',
            'giva2'             => 'numeric',
            'gexento'           => 'numeric',
            'gimpinterno'       => 'numeric',
            'gperciva'          => 'numeric',
            'gperib'            => 'numeric',
            'gretgan'           => 'numeric',
            'gneto'             => 'numeric',
            'gmontopagado'      => 'numeric', 
            'gcantidad'         => 'numeric',
            'ganio'             => 'required|integer',
            'gmes'              => 'required',
            'giva'              => 'required|integer',
            'garea'             => 'required|integer',
            'gcuenta'           => 'required|integer',
            'gproveedor'        => 'required|integer',
        ]);
        $comp->update([
            'fecha'             => $this->gfecha,
            'comprobante'       => $this->gcomprobante,
            'detalle'           => $this->gdetalle,
            'BrutoComp'         => $this->gbruto,
            'ParticIva'         => $this->gpartiva,
            'MontoIva'          => $this->giva2,
            'ExentoComp'        => $this->gexento,
            'ImpInternoComp'    => $this->gimpinterno,
            'PercepcionIvaComp' => $this->gperciva,
            'RetencionIB'       => $this->gperib,
            'RetencionGan'      => $this->gretgan,
            'NetoComp'          => $this->gneto,
            'MontoPagadoComp'   => $this->gmontopagado, 
            'CantidadLitroComp' => $this->gcantidad,
            'Anio'              => $this->ganio,
            'PasadoEnMes'       => $this->gmes,
            'iva_id'            => $this->giva,
            'area_id'           => $this->garea,
            'cuenta_id'         => $this->gcuenta,
            'user_id'           => auth()->user()->id,
            'empresa_id'        => session('empresa_id'),
            'proveedor_id'      => $this->gproveedor,
        ]);
        //updateOrCreate
        $this->gfiltro();
        $this->closeModalModify();
        session()->flash('message2', $this->comprobante_id ? 'Comprobante Actualizado.' : 'No se pudo modificar.');
    }

    public function delete() {
        //$this->comprobante_id = $id;
        Comprobante::find($this->comprobante_id)->delete();
        $this->gfiltro();
        $this->comprobante_id=null;
        $this->closeModalDelete();
        session()->flash('message3', 'Comprobante Eliminado.');
    }

    public function CambiarTab($id) {
        $this->tabActivo=$id;
    }

    public function gfiltro(){
        
        $sql = $this->ProcesaSQLFiltro('comprobantes'); // Procesa los campos a mostrar
        $registros = DB::select(DB::raw($sql));       // Busca el recordset
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
            $Proveedor=Proveedor::find($registro->proveedor_id);
            //dd($Iva->monto);
            $MontoIva=($registro->BrutoComp*$Iva->monto/100);
            $Saldo=$Saldo+$registro->NetoComp-$registro->MontoPagadoComp;
            $this->filtro=$this->filtro."<tr class=\"hover:bg-yellow-100\" wire:click=\"gCargarRegistro(". $registro->id .")\"><td class=\"border border-green-600\">$Fecha</td><td class=\"border border-green-600\">$registro->comprobante</td><td class=\"border border-green-600\">$Proveedor->name</td><td class=\"border border-green-600\">$registro->detalle</td><td class=\"border border-green-600\">".number_format($registro->BrutoComp, 2, ',')."</td><td class=\"border border-green-600\">".number_format($MontoIva, 2, ',')."</td><td class=\"border border-green-600\">".number_format($registro->ExentoComp, 2, ',')."</td><td class=\"border border-green-600\">".number_format($registro->ImpInternoComp, 2, ',')."</td><td class=\"border border-green-600\">".number_format($registro->PercepcionIvaComp, 2, ',')."</td><td class=\"border border-green-600\">".number_format($registro->RetencionIB, 2, ',')."</td><td class=\"border border-green-600\">".number_format($registro->RetencionGan, 2, ',')."</td><td class=\"border border-green-600\">".number_format($registro->NetoComp, 2, ',')."</td><td class=\"border border-green-600\">".number_format($registro->MontoPagadoComp, 2, ',')."</td><td class=\"border border-green-600\">".number_format($Saldo, 2, ',')."</td><td class=\"border border-green-600\">".number_format($registro->CantidadLitroComp, 2, ',')."</td><td class=\"border border-green-600\">$registro->ParticIva</td><td class=\"border border-green-600\">" . $this->ConvierteMesEnTexto($registro->PasadoEnMes) . "</td><td class=\"border border-green-600\">".$Area->name."</td><td class=\"border border-green-600\">".$Cuenta->name."</td></tr>
            </tr>";
        }
        
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

    public function gCargarRegistro($id) {
        $registro=Comprobante::find($id);
        $this->comprobante_id = $id;
        $this->id = $id; //Utilizado para buscar el registro para eliminar
        $this->gfecha= substr($registro->fecha,0,10);
        $this->gcomprobante=$registro->comprobante;
        $this->gdetalle=$registro->detalle;
        $this->gbruto=number_format($registro->BrutoComp, 2, '.');
        $this->gpartiva=$registro->ParticIva;
        $a=Iva::find($registro->iva_id);
        $this->iva_value= $a->monto;
        //  dd($this->iva_value);
        $this->giva2=number_format($registro->MontoIva, 2, '.');
        $this->gexento=number_format($registro->ExentoComp, 2, '.');
        $this->gimpinterno=number_format($registro->ImpInternoComp, 2, '.');
        $this->gperciva=number_format($registro->PercepcionIvaComp, 2, '.');
        $this->gperib=number_format($registro->RetencionIB, 2, '.');
        $this->gretgan=number_format($registro->RetencionGan, 2, '.');
        $this->gneto=number_format($registro->NetoComp, 2, '.');
        $this->gmontopagado=number_format($registro->MontoPagadoComp, 2, '.');
        $this->gcantidad=number_format($registro->CantidadLitroComp, 2, '.');
        $this->ganio=$registro->Anio;
        $this->gmes=$registro->PasadoEnMes;
        $this->garea=$registro->area_id;
        $this->gcuenta=$registro->cuenta_id;
        $this->giva=$registro->iva_id;
        $this->gproveedor=$registro->proveedor_id;

        $this->validate([
            'gfecha'            => 'required|date',
            'gbruto'            => 'numeric',
            'gpartiva'          => 'required',
            'giva2'             => 'numeric',
            'gexento'           => 'numeric',
            'gimpinterno'       => 'numeric',
            'gperciva'          => 'numeric',
            'gperib'            => 'numeric',
            'gretgan'           => 'numeric',
            'gneto'             => 'numeric',
            'gmontopagado'      => 'numeric', 
            'gcantidad'         => 'numeric',
            'ganio'             => 'required|integer',
            'gmes'              => 'required',
            'giva'              => 'required|integer',
            'garea'             => 'required|integer',
            'gcuenta'           => 'required|integer',
            'gproveedor'        => 'required|integer',
        ]);
    }

    public function CalcularIva() {
        //dd($this->iva_value);$a=Iva::find($registro->iva_id);
        $a=Iva::find($this->giva);
        //dd($this->gbruto);
        if ($this->gbruto=="") $this->gbruto=0.00;
        $this->iva_value= $a->monto;
        $this->giva2 = number_format($this->gbruto * $this->iva_value /100, 2, '.');
    }
}
