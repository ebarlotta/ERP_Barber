<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

class ImprimirPDF extends Controller
{
    public function DeudaPFD( Request $request) {
        $operacion = "deuda"; //$request->operacion;
        $registros = DB::table('comprobantes')
        ->selectRaw('sum(NetoComp-MontoPagadoComp) as Saldo, proveedors.id, proveedors.name')
        ->join('proveedors', 'comprobantes.proveedor_id', '=', 'proveedors.id')
        ->groupBy('proveedors.id')
        //->whereBetween('comprobantes.fecha',["'".$this->ddesde."'","'".$this->dhasta."'"])
        // ->whereRaw('(NetoComp-MontoPagadoComp)>1')
        ->where('comprobantes.fecha','>=',$request->ddesde)
        ->where('comprobantes.fecha','<=',$request->dhasta)
        ->get();

        $saldo = 0;
        foreach($registros as $registro) { 
            if($registro->Saldo>1) { $saldo = $saldo + $registro->Saldo; }
        }
        
        $pdf = PDF::loadView('livewire.compra.pdf_view',compact('registros','saldo','operacion'));
        
        // download PDF file with download method
        return $pdf->stream('pdf_file.pdf');
    }

    public function CreditoPFD( Request $request) {
        $operacion = "credito"; //$request->operacion;
        $registros = DB::table('comprobantes')
        ->selectRaw('sum(NetoComp-MontoPagadoComp) as Saldo, proveedors.id, proveedors.name')
        ->join('proveedors', 'comprobantes.proveedor_id', '=', 'proveedors.id')
        ->groupBy('proveedors.id')
        //->whereBetween('comprobantes.fecha',["'".$this->ddesde."'","'".$this->dhasta."'"])
        // ->whereRaw('(NetoComp-MontoPagadoComp)<1')
        ->where('comprobantes.fecha','>=',$request->cdesde)
        ->where('comprobantes.fecha','<=',$request->chasta)
        ->get();

        $saldo = 0;
        foreach($registros as $registro) { 
            if($registro->Saldo<1) { $saldo = $saldo + $registro->Saldo; }
        }
        $saldo = $saldo *-1;
        $pdf = PDF::loadView('livewire.compra.pdf_view',compact('registros','saldo','operacion'));
        
        // download PDF file with download method
        return $pdf->stream('pdf_file.pdf');
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

    public function IvaCompras(Request $request) {
        $registros = DB::table('comprobantes')
        // ->selectRaw('sum(NetoComp-MontoPagadoComp) as Saldo'       
        ->where('comprobantes.Anio','>=',$request->anio)
        ->where('comprobantes.PasadoEnMes','<=',$request->mes)
        ->where('comprobantes.empresa_id','=',session('empresa_id'))
        ->where('ParticIva','=','Si')
        ->get();
        $BrutoComp=0; $MontoIva=0; $ExentoComp=0; $ImpInternoComp=0; $PercepcionIvaComp=0; $RetencionIB=0; $RetencionGan=0; $NetoComp=0;$MontoPagadoComp = 0; $CantidadLitroComp=0;
        foreach($registros as $registro) { 
            $BrutoComp=$BrutoComp + $registro->BrutoComp; 
            $MontoIva=$MontoIva + $registro->MontoIva; 
            $ExentoComp=$ExentoComp + $registro->ExentoComp; 
            $ImpInternoComp=$ImpInternoComp + $registro->ImpInternoComp; 
            $PercepcionIvaComp=$PercepcionIvaComp + $registro->PercepcionIvaComp; 
            $RetencionIB=$RetencionIB + $registro->RetencionIB; 
            $RetencionGan=$RetencionGan + $registro->RetencionGan; 
            $NetoComp=$NetoComp + $registro->NetoComp;
        }
        $mes = $this->ConvierteMesEnTexto($request->mes);
        $anio = $request->anio;
        //dd($registros);
        $empresa = Empresa::find(session('empresa_id'));
        $pdf = PDF::loadView('livewire.compra.pdf_iva_view',compact('registros','BrutoComp', 'MontoIva', 'ExentoComp', 'ImpInternoComp', 'PercepcionIvaComp', 'RetencionIB', 'RetencionGan', 'NetoComp', 'empresa','mes','anio'))->setPaper('a4', 'landscape');
        return $pdf->stream('pdf_file.pdf');
        
    }
}
