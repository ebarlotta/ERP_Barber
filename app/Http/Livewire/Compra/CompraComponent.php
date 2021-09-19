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
    public $darea, $ddesde, $dhasta, $danio;
    public $DeudaProveedoresFiltro, $MostrarDeudaProveedores; 
    public $deudaPDF;

    // Crédito Proveedores
    public $carea, $cdesde, $chasta, $canio;
    public $CreditoProveedoresFiltro, $MostrarCreditoProveedores;

    // Libros de Iva
    public $lmes,$lanio;
    public $MostrarLibros, $LibroFiltro;

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
                //dd($sql);
                break;
            }
            case "deuda" : {
                
                //"SELECT proveedors.name as Name, Saldos.Saldo as Saldo FROM proveedors, (SELECT sum(NetoComp-MontoPagadoComp) as Saldo, comprobantes.proveedor_id as idproveedor FROM comprobantes WHERE fecha>='2021-09-01' and fecha<='2021-09-30' and empresa_id=1     GROUP BY comprobantes.proveedor_id ) as Saldos WHERE proveedors.id = Saldos.idproveedor and Saldos.Saldo>1
                
                if ($this->darea==0) { $darea=''; } else { $darea=' and comprobantes.area_id='.$this->darea; }  //Comprueba si se ha seleccionado un area en especìfico
                if ($this->danio==0) { $danio=''; } else { $danio=' and comprobantes.Anio='.$this->danio; }  //Comprueba si se ha seleccionado un año en especìfico

                // $sql="SELECT proveedors.name as Name, Saldos.Saldo as Saldo FROM proveedors, (SELECT sum(NetoComp-MontoPagadoComp) as Saldo, comprobantes.proveedor_id as idproveedor FROM comprobantes WHERE fecha>='". $this->ddesde."' and fecha<='". $this->dhasta."' and empresa_id=". session('empresa_id')." $darea $danio GROUP BY comprobantes.proveedor_id ) as Saldos WHERE proveedors.id = Saldos.idproveedor and Saldos.Saldo>1"; 
                
                // $sql = DB::table('proveedors')
                //     ->join('comprobantes',function ($query) {
                //         $query->selectRaw('sum(NetoComp-MontoPagadoComp) as Saldo')
                //             ->from('comprobantes')
                //             ->groupBy('proveedor_id');
                // })
                // ->get();
                
                
                //->where('comprobantes.empresa_id','=',session('empresa_id'))
                //->where('proveedors.empresa_id','=',session('empresa_id'))

                //->select(DB::raw('SUM(NetoComp-MontoPagadoComp) as Saldo'))
                    //->where(DB::raw('SUM(NetoComp-MontoPagadoComp),'>',1)
                    //->havingRaw('SUM(NetoComp-MontoPagadoComp) > ?', [1])
                    // ->whereBetween('fecha',["'".$this->ddesde."'","'".$this->dhasta."'"])
                //    ->groupBy('comprobantes.proveedor_id')
                    
                    // dd($sql);
// $proveedores = Proveedor::where('empresa_id','=',session('empresa_id'))->get();
// $comprobantes = Comprobante::where('empresa_id','=',session('empresa_id'))->get();
                    // $merded = $comprobantes->merge($proveedores);

                    $sql = DB::table('comprobantes')
                    ->selectRaw('sum(NetoComp-MontoPagadoComp) as Saldo, proveedors.id')
                    ->join('proveedors', 'comprobantes.proveedor_id', '=', 'proveedors.id')
                    ->groupBy('proveedors.id')
                    // ->whereRaw('(NetoComp-MontoPagadoComp)>1')
                    //->whereBetween('comprobantes.fecha',["'".$this->ddesde."'","'".$this->dhasta."'"])
                    ->where('comprobantes.fecha','>=',$this->ddesde)
                    ->where('comprobantes.fecha','<=',$this->dhasta)
                    //->orderByDesc('avg_salary')
                    ->get();
                    
                    // dd($sql);

                $this->MostrarDeudaProveedores=true;break;
            };
            case "credito" : {
                //"SELECT proveedors.name as Name, Saldos.Saldo as Saldo FROM proveedors, (SELECT sum(NetoComp-MontoPagadoComp) as Saldo, comprobantes.proveedor_id as idproveedor FROM comprobantes WHERE fecha>='2021-09-01' and fecha<='2021-09-30' and empresa_id=1     GROUP BY comprobantes.proveedor_id ) as Saldos WHERE proveedors.id = Saldos.idproveedor and Saldos.Saldo<1
                
                if ($this->carea==0) { $carea=''; } else { $carea=' and comprobantes.area_id='.$this->carea; }  //Comprueba si se ha seleccionado un area en especìfico
                if ($this->canio==0) { $canio=''; } else { $canio=' and comprobantes.Anio='.$this->canio; }  //Comprueba si se ha seleccionado un año en especìfico

                // $sql="SELECT proveedors.name as Name, Saldos.Saldo as Saldo FROM proveedors, (SELECT sum(NetoComp-MontoPagadoComp) as Saldo, comprobantes.proveedor_id as idproveedor FROM comprobantes WHERE fecha>='". $this->cdesde."' and fecha<='". $this->chasta."' and empresa_id=". session('empresa_id')." $carea  $canio  GROUP BY comprobantes.proveedor_id ) as Saldos WHERE proveedors.id = Saldos.idproveedor and Saldos.Saldo<1";
                $sql = DB::table('comprobantes')
                    ->selectRaw('sum(NetoComp-MontoPagadoComp) as Saldo, proveedors.id')
                    ->join('proveedors', 'comprobantes.proveedor_id', '=', 'proveedors.id')
                    ->groupBy('proveedors.id')
                    // ->whereRaw('(NetoComp-MontoPagadoComp)<1')
                    //->whereBetween('comprobantes.fecha',["'".$this->ddesde."'","'".$this->dhasta."'"])
                    ->where('comprobantes.fecha','>=',$this->cdesde)
                    ->where('comprobantes.fecha','<=',$this->chasta)
                    //->orderByDesc('avg_salary')
                    ->get();
                $this->MostrarCreditoProveedores=true;break;
            };
            case "libro" : {
                $sql="SELECT PasadoEnMes, Max(Cerrado) as Cerrado FROM comprobantes WHERE ParticIva='Si' and Anio=" . $this->lanio . " and empresa_id='".session('empresa_id')."' GROUP BY Anio,PasadoEnMes ORDER BY fecha";
                $this->MostrarLibros=true;break;
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

    public function CalcularDeudaProveedores($ret) {
        $registros = $this->ProcesaSQLFiltro('deuda'); // Procesa los campos a mostrar
        //dd($sql);
        //$registros = DB::select(DB::raw($sql));       // Busca el recordset

        // $registros = DB::table('comprobantes')
        //             ->selectRaw('sum(NetoComp-MontoPagadoComp) as Saldo, proveedors.id')
        //             ->join('proveedors', 'comprobantes.proveedor_id', '=', 'proveedors.id')
        //             ->groupBy('proveedors.id')
        //             //->whereBetween('comprobantes.fecha',["'".$this->ddesde."'","'".$this->dhasta."'"])
        //             ->where('comprobantes.fecha','>=',$this->ddesde)
        //             ->where('comprobantes.fecha','<=',$this->dhasta)
        //             //->orderByDesc('avg_salary')
        //             ->get();

        $this->deudaPDF = $registros;
        //dd($this->deudaPDF);
        //Dibuja el filtro
        $Saldo=0;
        $this->DeudaProveedoresFiltro = "<table class=\"mt-6\">
            <tr class=\"bg-blue-200 border border-blue-500\">
                <td class=\"center\">Nombre</td>
                <td class=\"center\">Deuda</td>
            </tr>";
        foreach($registros as $registro) {
            if ($registro->Saldo>1) {
                $proveedor = Proveedor::find($registro->id);
                $this->DeudaProveedoresFiltro = $this->DeudaProveedoresFiltro .
                "<tr>
                    <td class=\"bg-gray-100 border border-blue-500\">" . $proveedor->name . "</td>
                    <td class=\"bg-gray-100 border border-blue-500 text-right\">" . number_format($registro->Saldo,2,',','.') . "</td>
                </tr>";
                $Saldo = $Saldo + $registro->Saldo;
            }
        }
        $this->DeudaProveedoresFiltro = $this->DeudaProveedoresFiltro .
            "<tr class=\"bg-green-500\">
                <td class=\"colspan-2\">Total Deuda a Proveedores</td>
                <td>".number_format($Saldo,2,',','.')."</td>
            </tr>
            </table>";
            //dd("filtro" . $this->DeudaProveedoresFiltro);
            //$this->deudaPDF = $this->DeudaProveedoresFiltro;
        if($ret) return $this->DeudaProveedoresFiltro;
        //SELECT proveedors.name, Saldos.Saldo FROM proveedors, (SELECT sum(NetoComp-MontoPagadoComp) as Saldo, comprobantes.proveedor_id as idproveedor FROM comprobantes WHERE empresa_id=1 GROUP BY comprobantes.proveedor_id ) as Saldos WHERE proveedors.id = Saldos.idproveedor and Saldos.Saldo>1
    }

    public function CalcularCreditoProveedores() {
        $registros = $this->ProcesaSQLFiltro('credito'); // Procesa los campos a mostrar
        // $sql = $this->ProcesaSQLFiltro('credito'); // Procesa los campos a mostrar
        // $registros = DB::select(DB::raw($sql));       // Busca el recordset

        //Dibuja el filtro
        $Saldo=0;
        $this->CreditoProveedoresFiltro = "<table class=\"mt-6\">
            <tr class=\"bg-blue-200 border border-blue-500\">
                <td class=\"center\">Nombre</td>
                <td class=\"center\">Crédito</td>
            </tr>";
        foreach($registros as $registro) {
            if($registro->Saldo<1) {
                $proveedor = Proveedor::find($registro->id);
                $this->CreditoProveedoresFiltro = $this->CreditoProveedoresFiltro .
                "<tr>
                    <td class=\"bg-gray-100 border border-blue-500\">" . $proveedor->name . "</td>
                    <td class=\"bg-gray-100 border border-blue-500 text-right\">" . number_format($registro->Saldo * -1 ,2,',','.') . "</td>
                </tr>";
                $Saldo = $Saldo + $registro->Saldo * -1;
            }
        }
        $this->CreditoProveedoresFiltro = $this->CreditoProveedoresFiltro .
            "<tr class=\"bg-green-500\">
                <td class=\"colspan-2\">Total Crédito a Proveedores</td>
                <td>".number_format($Saldo,2,',','.')."</td>
            </tr>
            </table>";
    }

    public function MostrarLibros() {
        if($this->lmes && $this->lanio) {
        $sql = $this->ProcesaSQLFiltro('libro'); // Procesa los campos a mostrar
        $registros = DB::select(DB::raw($sql));       // Busca el recordset
        //Dibuja el filtro
        $Saldo=0;
        $this->LibroFiltro ="<table class=\"w-full mt-8  shadow-lg\" ><tr><td class=\"bg-gray-300 border border-green-400\">Mes</td><td class=\"bg-gray-300 border border-green-400\">Estado</td>";
        //dd($registros);
        foreach ($registros as $libro) {
            $NombreMes = $this->ConvierteMesEnTexto($libro->PasadoEnMes);
            if($libro->Cerrado>0) { $AbiertoCerrado = 'Cerrado'; } else { $AbiertoCerrado = 'Abierto'; }
            $this->LibroFiltro = $this->LibroFiltro . "<tr><td class=\"bg-gray-100 border border-green-400\">". $NombreMes . "</td><td class=\"bg-gray-100 border border-green-400\">" . $AbiertoCerrado . "</td>";
        }
        $this->LibroFiltro = $this->LibroFiltro . "</tr></table>";
    }
    }
}
