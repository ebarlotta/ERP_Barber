<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

class ImprimirPDF extends Controller
{
    public function DeudaPFD( Request $request) {

        $registros = DB::table('comprobantes')
        ->selectRaw('sum(NetoComp-MontoPagadoComp) as Saldo, proveedors.id, proveedors.name')
        ->join('proveedors', 'comprobantes.proveedor_id', '=', 'proveedors.id')
        ->groupBy('proveedors.id')
        //->whereBetween('comprobantes.fecha',["'".$this->ddesde."'","'".$this->dhasta."'"])
        ->where('comprobantes.fecha','>=',$request->ddesde)
        ->where('comprobantes.fecha','<=',$request->dhasta)
        ->get();

        $saldo = 0;
        foreach($registros as $registro) { $saldo = $saldo + $registro->Saldo; }
        
        $pdf = PDF::loadView('livewire.compra.pdf_view',compact('registros','saldo'));
        
        // download PDF file with download method
        return $pdf->stream('pdf_file.pdf');
    }
}
