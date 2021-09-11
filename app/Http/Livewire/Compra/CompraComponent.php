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

class CompraComponent extends Component
{
    public $areas, $cuentas, $ivas, $proveedores;       // Globales
    public $empresa_id; public $tabActivo=1; public $comprobante_id;
    
    //Comprobantes
    public $iva_value=0;
    public $isModalOpen = false;
    public $giva=1;
    public $ModalDelete, $openModalDelete;
    public $ModalModify, $openModalModify;
    public $gfecha,$gproveedor, $gcomprobante, $gcuenta, $gdetalle, $ganio, $gmes, $garea, $gpartiva, $gbruto, $giva2, $gexento, $gimpinterno, $gperciva, $gretgan, $gperib, $gneto, $gmontopagado, $gcantidad;
    //Variables del filtro
    public $gfmes, $gfproveedor, $gfparticipa, $gfiva, $gfdetalle, $gfarea, $gfcuenta, $gfanio, $fgascendente, $gfsaldo; //Comprobantes
    
    // Deuda Proveedores
    public $darea, $ddesde, $dhasta;
    public $DeudaProveedoresFiltro, $MostrarDeudaProveedores; 



    //Listado de filtros
    public $filtro;                 // Comprobantes

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
        if(is_null($this->gfecha)) $this->gfecha=now();
        if(is_null($this->gbruto)) $this->gbruto=0.00;
        if(is_null($this->gexento)) $this->gexento=0.00;
        if(is_null($this->gimpinterno)) $this->gimpinterno=0.00;
        if(is_null($this->gperciva)) $this->gperciva=0.00;
        if(is_null($this->gperib)) $this->gperib=0.00;
        if(is_null($this->gretgan)) $this->gretgan=0.00;
        if(is_null($this->gneto)) $this->gneto=0.00;
        if(is_null($this->gbruto)) $this->gbruto=0.00;
        if(is_null($this->gmontopagado)) $this->gmontopagado=0.00;
        if(is_null($this->gcantidad)) $this->gcantidad=0.00;
        if(is_null($this->giva2)) $this->giva2=0.00;
        
        
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
        $this->RellenarCamposVacios();
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
        //dd($this->gbruto. " " . $this->giva);
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
            <tr class=\"bg-gradient-to-r from-green-400 to-blue-500\">
                <td class=\"border border-green-600\">Fecha</td><td class=\"border border-green-600\">Comprobante</td><td class=\"border border-green-600\">Proveedor</td><td class=\"border border-green-600\">Detalle</td><td class=\"border border-green-600\">Bruto</td><td class=\"border border-green-600\">Iva</td><td class=\"border border-green-600\">exento</td><td class=\"border border-green-600\">Imp.Interno</td><td class=\"border border-green-600\">Percec.Iva</td><td class=\"border border-green-600\">Retenc.IB</td><td class=\"border border-green-600\">Retenc.Gan</td><td class=\"border border-green-600\">Neto</td><td class=\"border border-green-600\">Pagado</td><td class=\"border border-green-600\">Saldo</td><td class=\"border border-green-600\">Cant.Litros</td><td class=\"border border-green-600\">Partic.Iva</td><td class=\"border border-green-600\">Pasado EnMes</td><td class=\"border border-green-600\">Area</td><td class=\"border border-green-600\">Cuenta</td>
            </tr>";
            $Cantidad = 0; $MontoPagado = 0; $Neto = 0; $RetGan = 0; $RetIB = 0; $PerIva = 0; $Exento = 0 ;$ImpInterno = 0; $Bruto = 0; $MontoIvaT =0; $NetoT = 0;
        foreach($registros as $registro) {
            //dd($registro);
            $Fecha = substr($registro->fecha,8,2) ."-". substr($registro->fecha,5,2) ."-". substr($registro->fecha,0,4);
            $Area=Area::find($registro->area_id);
            $Cuenta=Cuenta::find($registro->cuenta_id);
            $Iva=Iva::find($registro->iva_id);
            $Proveedor=Proveedor::find($registro->proveedor_id);
            //dd($Iva->monto);
            if($Iva->monto==0) { $MontoIva=0; } else {
                $MontoIva=($registro->BrutoComp*$Iva->monto/100);
            }
            //dd(number_format($MontoIva, 2,'.',''));
            $Neto = $Neto + $registro->NetoComp;
            //Sumatoria de los registros encontrados para subtotal
            $Bruto = $Bruto + $registro->BrutoComp;
            $MontoIvaT = $MontoIvaT + $registro->MontoIva;
            $Exento = $Exento + $registro->ExentoComp;
            $ImpInterno= $ImpInterno + $registro->ImpInternoComp;
            $PerIva = $PerIva + $registro->PercepcionIvaComp;
            $RetIB = $RetIB + $registro->RetencionIB;
            $RetGan = $RetGan + $registro->RetencionGan;
            $MontoPagado = $MontoPagado + $registro->MontoPagadoComp;
            $Saldo=$Saldo+$registro->NetoComp-$registro->MontoPagadoComp;
            $Cantidad=$Cantidad+$registro->CantidadLitroComp;
            $NetoT = $NetoT + $registro->NetoComp;

            $this->filtro=$this->filtro."<tr class=\"hover:bg-yellow-100\" wire:click=\"gCargarRegistro(". $registro->id .")\"><td class=\"border border-green-600\">$Fecha</td><td class=\"border border-green-600 text-right\">$registro->comprobante</td><td class=\"border border-green-600\">$Proveedor->name</td><td class=\"border border-green-600 text-right\">$registro->detalle</td><td class=\"border border-green-600 text-right\">".number_format($registro->BrutoComp, 2,'.','')."</td><td class=\"border border-green-600 text-right\">".number_format($MontoIva, 2,'.','')."</td><td class=\"border border-green-600 text-right\">".number_format($registro->ExentoComp, 2,'.','')."</td><td class=\"border border-green-600 text-right\">".number_format($registro->ImpInternoComp, 2,'.','')."</td><td class=\"border border-green-600 text-right\">".number_format($registro->PercepcionIvaComp, 2,'.','')."</td><td class=\"border border-green-600 text-right\">".number_format($registro->RetencionIB, 2,'.','')."</td><td class=\"border border-green-600 text-right\">".number_format($registro->RetencionGan, 2,'.','')."</td><td class=\"border border-green-600 text-right\">".number_format($registro->NetoComp, 2,'.','')."</td><td class=\"text-red-600 border border-green-600 text-right\">".number_format($registro->MontoPagadoComp, 2,'.','')."</td><td class=\"border border-green-600 text-right\">".number_format($Saldo, 2,'.','')."</td><td class=\"border border-green-600 text-right\">".number_format($registro->CantidadLitroComp, 2,'.','')."</td><td class=\"border border-green-600\">$registro->ParticIva</td><td class=\"border border-green-600\">" . $this->ConvierteMesEnTexto($registro->PasadoEnMes) . "</td><td class=\"border border-green-600\">".$Area->name."</td><td class=\"border border-green-600\">".$Cuenta->name."</td></tr>
            </tr>";
        }
        $this->filtro = $this->filtro."<tr class=\"bg-gradient-to-r from-purple-400 via-pink-500 to-red-500\"><td></td><td></td><td></td><td>Totales</td><td class=\"text-right\">".number_format($Bruto, 2,'.','')."</td><td class=\"text-right\">".number_format($MontoIvaT, 2,'.','')."</td><td class=\"text-right\">".number_format($Exento, 2,'.','')."</td><td class=\"text-right\">".number_format($ImpInterno, 2,'.','')."</td><td class=\"text-right\">".number_format($PerIva, 2,'.','')."</td><td class=\"text-right\">".number_format($RetIB, 2,'.','')."</td><td class=\"text-right\">".number_format($RetGan, 2,'.','')."</td><td class=\"text-right\">".number_format($NetoT, 2,'.','')."</td><td class=\"text-right\">".number_format($MontoPagado, 2,'.','')."</td><td class=\"text-right\"><strong>".number_format($Saldo, 2,'.','')."</strong></td><td class=\"text-right\">".number_format($Cantidad, 2,'.','')."</td></tr>";
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
        $sql='';
        switch ($interfaz) {
            case "comprobantes" : {
                //Mes 	Proveedor 	ParticipaIva 	Iva 	Detalle 	Area 	Cuenta 	Año 	Asc. C/Saldo
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
            }
            case "deuda" : {
                $sql="SELECT * FROM comprobantes"; 
                $this->MostrarDeudaProveedores=true;
            };
        }
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
        $this->gbruto=number_format($registro->BrutoComp, 2, '.','');
        $this->gpartiva=$registro->ParticIva;
        $a=Iva::find($registro->iva_id);
        $this->iva_value= $a->monto;
        //  dd($this->iva_value);
        $this->giva2=number_format($registro->MontoIva, 2, '.','');
        $this->gexento=number_format($registro->ExentoComp, 2, '.','');
        $this->gimpinterno=number_format($registro->ImpInternoComp, 2, '.','');
        $this->gperciva=number_format($registro->PercepcionIvaComp, 2, '.','');
        $this->gperib=number_format($registro->RetencionIB, 2, '.','');
        $this->gretgan=number_format($registro->RetencionGan, 2, '.','');
        $this->gneto=number_format($registro->NetoComp, 2, '.','');
        $this->gmontopagado=number_format($registro->MontoPagadoComp, 2, '.','');
        $this->gcantidad=number_format($registro->CantidadLitroComp, 2, '.','');
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
        if ($this->gbruto=="") $this->gbruto=0.00;
        $this->iva_value= $a->monto;
        if($this->iva_value<>0) {
            $result = (float)$this->gbruto * (float)$this->iva_value / 100;
            (float) $this->giva2 = number_format($result,2,'.','');
        } else {
            (float) $this->giva2 = 0;
        }

        $this->CalcularNeto();
        //$this->gfsaldo = $this->gneto-$this->gmontopagado;
    }

    public function CalcularNeto() {
        $this->gneto = number_format( floatval($this->gbruto) + floatval($this->giva2) + floatval($this->gexento) + floatval($this->gimpinterno) + floatval($this->gperciva) + floatval($this->gperib) + floatval($this->gretgan),2 ,'.','' ) ;
    }

    public function CalcularDeudaProveedores() {
        $sql = $this->ProcesaSQLFiltro('deuda'); // Procesa los campos a mostrar
        $registros = DB::select(DB::raw($sql));       // Busca el recordset
        //Dibuja el filtro
        $Saldo=0;
        $this->DeudaProveedoresFiltro ="<table border=\"1\"><tbody><tr bgcolor=\"#b0e3ff\"><td align=\"center\">Nombre</td><td align=\"center\">Cuit</td><td align=\"center\">Deuda</td></tr><tr><td>AFIP-931-APORTES OS</td><td>20-15268043-1</td><td align=\"right\">1842.26</td></tr><tr><td>AFIP-931-APORTES SS</td><td>20-15268043-1</td><td align=\"right\">10439.45</td></tr><tr><td>AFIP-931-CONTRIBUCIONES OS</td><td>20-15268043-1</td><td align=\"right\">3684.52</td></tr><tr><td>AFIP-931-CONTRIBUCIONES SS</td><td>20-15268043-1</td><td align=\"right\">9496.41</td></tr><tr><td>AFIP-931-LRT</td><td>20-15268043-1</td><td align=\"right\">7405.58</td></tr><tr><td>AFIP-931-SEGURO</td><td>20-15268043-1</td><td align=\"right\">48.70</td></tr><tr bgcolor=\"#A4FF9C\"><td colspan=\"2\" align=\"right\">Total Deuda a Proveedores</td><td>32916.92</td></tr></tbody></table>";

    }
}
