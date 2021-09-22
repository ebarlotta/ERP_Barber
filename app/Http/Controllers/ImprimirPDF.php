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

    public function ejemplo(Request $request) {
        $registros = DB::table('comprobantes')
        // ->selectRaw('sum(NetoComp-MontoPagadoComp) as Saldo'       
        ->where('comprobantes.Anio','>=',$request->anio)
        ->where('comprobantes.PasadoEnMes','<=',$request->mes)
        ->where('comprobantes.empresa_id','=',session('empresa_id'))
        ->where('ParticIva','=','Si')
        ->join('proveedors', 'comprobantes.proveedor_id', '=', 'proveedors.id')
        ->get();
        // dd($registros);
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

    public function encabezado($pagina, $mes, $anio) {
        $empresa = Empresa::find(session('empresa_id'));
        $mes = $this->ConvierteMesEnTexto($mes);
        $libro = 0;
        $encabezado = '<table style="font-size: 14px; line-height: 16px; width:100%; border: 1px solid #ddd; font-family: Arial, Helvetica, sans-serif">
        <tr>
            <td style="width:33%; text-align:left;">Empresa: ' . $empresa->name.'</td>
            <td style="width:33%; text-align:center;"></td>
            <td style="width:33%; text-align:right;">Mes: '. $mes.'</td>
        </tr>
        <tr>
            <td style="width:33%; text-align:left;">' . $empresa->direccion.'</td>
            <td style="width:33%; text-align:center;"><u>REGISTRO IVA COMPRAS</u></td>
            <td style="width:33%; text-align:right;">Libro Nro: ' . $libro.'</td>
        </tr>
        <tr>
            <td style="width:33%; text-align:left;">Cuit:' . $empresa->cuit.' - IB: ' . $empresa->ib.'</td>
            <td style="width:33%; text-align:center;"></td>
            <td style="width:33%; text-align:right;">Página Nro: ' . $pagina.'</td>
        </tr>
        <tr>
            <td style="width:33%; text-align:left;">Nro Establecimiento: ' . $empresa->establecimiento.'</td>
            <td style="width:33%; text-align:center;"></td>
            <td style="width:33%; text-align:right;">'. $mes.' - '.$anio.'</td>
        </tr>
        <tr>
            <td style="width:33%; text-align:left;">Condición IVA: ' . $empresa->actividad1.'</td>
            <td style="width:33%; text-align:center;"></td>
            <td style="width:33%; text-align:right;"></td>
        </tr>
    </table>
    <table style=" margin-top:3px; font-size: 12px; line-height: 12px; border-collapse: collapse; width:100%;">
        <tr style="color:black; background-color:#ddd; border: 1px solid #ddd;">
            <td style="border: 1px solid #ddd; text-align:center;">Fecha</td>
            <td style="border: 1px solid #ddd; text-align:center;">Comprobante</td>
            <td style="border: 1px solid #ddd; text-align:center;">Vendedor</td>
            <td style="border: 1px solid #ddd; text-align:center;">Cuit</td>
            <td style="border: 1px solid #ddd; text-align:center;">Bruto</td>
            <td style="border: 1px solid #ddd; text-align:center;">Iva</td>
            <td style="border: 1px solid #ddd; text-align:center;">Exento</td>
            <td style="border: 1px solid #ddd; text-align:center;">Imp.Interno</td>
            <td style="border: 1px solid #ddd; text-align:center;">Perc.Iva</td>
            <td style="border: 1px solid #ddd; text-align:center;">Ret.IB</td>
            <td style="border: 1px solid #ddd; text-align:center;">Ret.GAN</td>
            <td style="border: 1px solid #ddd; text-align:center;">Total</td>
        </tr>';
        return $encabezado;
    }

    public function IvaCompras(Request $request) {
        $html = "No hay registros para este período!!!";
        $registros = DB::table('comprobantes')
        // ->selectRaw('sum(NetoComp-MontoPagadoComp) as Saldo'       
        ->where('comprobantes.Anio','=',$request->anio)
        ->where('comprobantes.PasadoEnMes','=',$request->mes)
        ->where('comprobantes.empresa_id','=',session('empresa_id'))
        ->where('ParticIva','=','Si')
        ->join('proveedors', 'comprobantes.proveedor_id', '=', 'proveedors.id')
        ->orderByRaw('fecha, comprobante,BrutoComp')
        ->get();
        $BrutoComp=0; $MontoIva=0; $ExentoComp=0; $ImpInternoComp=0; $PercepcionIvaComp=0; $RetencionIB=0; $RetencionGan=0; $NetoComp=0;
        
        // <body style="font-family: Arial, Helvetica, sans-serif">';
        if(count($registros)) {
            $pagina=$registros->first()->Cerrado; $libro='0';
            $html =  $this->encabezado($pagina, $request->mes,$request->anio);
            $row=''; $i = 0;
            foreach($registros as $registro) {
                $row = $row . '<tr>
                <td style="text-align:center; border: 1px solid #ddd; mr-3 pr-3">'. substr($registro->fecha,8,2) ."-". substr($registro->fecha,5,2) ."-". substr($registro->fecha,0,4) .'</td>
                <td style="text-align:right; border: 1px solid #ddd; mr-3 pr-3">'. $registro->comprobante .'</td>
                <td style="text-align:right; border: 1px solid #ddd; mr-3 pr-3" style="color:red">'. $registro->name .'</td>
                <td style="text-align:center; border: 1px solid #ddd; mr-3 pr-3">'. substr($registro->cuit,0,2) ."-" . substr($registro->cuit,2,8) . "-" . substr($registro->cuit,10,1).'</td>
                <td style="text-align:right; border: 1px solid #ddd; mr-3 pr-3">'. number_format($registro->BrutoComp, 2, ',', '.') .'</td>
                <td style="text-align:right; border: 1px solid #ddd; mr-3 pr-3">'. number_format($registro->MontoIva, 2, ',', '.') .'</td>
                <td style="text-align:right; border: 1px solid #ddd; mr-3 pr-3">'. number_format($registro->ExentoComp, 2, ',', '.') .'</td>
                <td style="text-align:right; border: 1px solid #ddd; mr-3 pr-3">'. number_format($registro->ImpInternoComp, 2, ',', '.') .'</td>
                <td style="text-align:right; border: 1px solid #ddd; mr-3 pr-3">'. number_format($registro->PercepcionIvaComp, 2, ',', '.') .'</td>
                <td style="text-align:right; border: 1px solid #ddd; mr-3 pr-3">'. number_format($registro->RetencionIB, 2, ',', '.') .'</td>
                <td style="text-align:right; border: 1px solid #ddd; mr-3 pr-3">'. number_format($registro->RetencionGan, 2, ',', '.') .'</td>
                <td style="text-align:right; border: 1px solid #ddd; mr-3 pr-3">'. number_format($registro->NetoComp, 2, ',', '.') .'
                </td>
                </tr>';
        
                $BrutoComp=$BrutoComp + $registro->BrutoComp; 
                $MontoIva=$MontoIva + $registro->MontoIva; 
                $ExentoComp=$ExentoComp + $registro->ExentoComp; 
                $ImpInternoComp=$ImpInternoComp + $registro->ImpInternoComp; 
                $PercepcionIvaComp=$PercepcionIvaComp + $registro->PercepcionIvaComp; 
                $RetencionIB=$RetencionIB + $registro->RetencionIB; 
                $RetencionGan=$RetencionGan + $registro->RetencionGan; 
                $NetoComp=$NetoComp + $registro->NetoComp;

                $pie = '<tr style="background-color:#ddd;">
                <td style="text-align:right; border: 1px solid #ddd;"></td>
                <td style="text-align:right; border: 1px solid #ddd;"></td>
                <td style="text-align:right; border: 1px solid #ddd;"></td>
                <td style="text-align:right; border: 1px solid #ddd;">Totales</td>
                <td style="text-align:right; border: 1px solid #ddd;">'.  number_format($BrutoComp, 2, ',', '.').'</td>
                <td style="text-align:right; border: 1px solid #ddd;">'.  number_format($MontoIva, 2, ',', '.').'</td>
                <td style="text-align:right; border: 1px solid #ddd;">'.  number_format($ExentoComp, 2, ',', '.').'</td>
                <td style="text-align:right; border: 1px solid #ddd;">'.  number_format($ImpInternoComp, 2, ',', '.').'</td>
                <td style="text-align:right; border: 1px solid #ddd;">'.  number_format($PercepcionIvaComp, 2, ',', '.').'</td>
                <td style="text-align:right; border: 1px solid #ddd;">'.  number_format($RetencionIB, 2, ',', '.').'</td>
                <td style="text-align:right; border: 1px solid #ddd;">'.  number_format($RetencionGan, 2, ',', '.').'</td>
                <td style="text-align:right; border: 1px solid #ddd;">'.  number_format($NetoComp, 2, ',', '.').'</td>
                </tr>
                </table>';
                
                $i++;
                if($i>35) {
                    $row = $row . $pie;
                    $row = $row . '<div style="page-break-after:always;"></div>';
                    $pagina++;
                    $row = $row . $this->encabezado($pagina,$request->mes,$request->anio);
                    $i=0;
                }
            }        
            $html =  $html . $row .$pie ;
        
        }        
        $pdf = PDF::loadHtml($html);
        $pdf->setPaper('A4', 'landscape');
        //$pdf->render();
        return $pdf->stream('pdf_iva_view.pdf');
    }
}
