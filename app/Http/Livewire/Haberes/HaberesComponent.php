<?php

namespace App\Http\Livewire\Haberes;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Recibo;
use App\Http\Livewire\Haberes\clsRecibo as clsRecibo;
use App\Models\Categoriaprofesional;
use App\Models\Concepto;
use App\Models\ConceptoRecibo;
use App\Models\Empleado;
use App\Models\Empresa;

class HaberesComponent extends Component
{
    public $anio = 2022;
    public $mes = '00';
    public $EmpleadosActivos;
    // public $EmpleadoActivo;

    //Datos propios del recibo seleccionado
    public $empleadoseleccionado = 0;
    public $IdRecibo;
    public $LugarPago;
    public $FechaPago;
    public $PerPago;
    public $IdEmpleado = 0;
    public $IdCatProfe = 0;
    public $TotHaberes = 0;
    public $Rem = 0;
    public $NoRem = 0;
    public $Descuentos = 0;
    public $PerUltLiq = 0;
    public $FechaUltLiq = 0;
    public $Conceptos;  //Recordset de Conceptos del recibo
    public $SumHaberes;
    public $SumUnidades;
    public $TotalRemu;
    public $RB; //Utilizado para sumarizar la Remuneración Bruta a la cual hacerle los descuentos
    public $AcumRem;
    public $AcumNoRem;
    public $AcumDescuento;


    //Datos propios de la empresa
    public $NombreEmpresa;
    public $EmpresaId;
    public $Cuit;
    public $DireccionEmpresa;

    //Datos propios del Empleado
    public $NombreEmpleado;
    public $Cuil;
    public $FechaIngreso;
    public $Legajo;
    public $Seccion;
    public $Banco;
    public $CategoriaProfesional_id;

    //Datos propios de la Categoría Profesional
    public $NombreCategoria;
    public $NombreSubCategoria;
    public $CCT;

    //Modales
    public $ModalAgregar=false;

    // Propio de los items cargados para liquidar
    public $items;
    public $item;
    public $cantidad;
    public $cmbitem;

    public function render()
    {
        $this->EmpresaId = session('empresa_id');
        return view('livewire.haberes.haberes-component');
    }


    public function CargarEmpleadosActivosEnEsePeriodo()
    {
        $this->EmpleadosActivos = null;
        $this->EmpleadosActivos = DB::table('empleados')
            ->select('empleados.name', 'empleados.id', 'empleados.activo')
            ->leftjoin('recibos', 'empleado_id', 'empleados.id')
            ->leftjoin('empresas', 'empresas.id', 'empleados.empresa_id')
            ->where('recibos.perpago', $this->anio . $this->mes)
            // ->groupBy('Nombre')
            ->get();
        $this->EmpleadosActivos = json_decode(json_encode($this->EmpleadosActivos), true);
        //dd($this->EmpleadosActivos);
    }

    public function cargaIdEmpleado($id)
    {

        $this->empleadoseleccionado = $id;
        $this->CargarEmpleadosActivosEnEsePeriodo();
        $this->CargasDatosRecibo($this->anio . $this->mes, $this->empleadoseleccionado);
    }

    public function CargasDatosRecibo($Periodo, $IdEmpleado)
    {
        $ReciboRec = Recibo::where('empleado_id', $IdEmpleado)
            ->where('perpago', $Periodo)
            ->get();

        // dd($ReciboRec=json_decode(json_encode($ReciboRec), true));
        if (count($ReciboRec)) {
            $this->LugarPago = $ReciboRec[0]['lugarpago'];
            $fecha = $ReciboRec[0]['fechapago'];
            $this->FechaPago = SUBSTR($fecha, 8, 2) . "-" . SUBSTR($fecha, 5, 2) . "-" . SUBSTR($fecha, 0, 4);

            $this->PerPago = $ReciboRec[0]['perpago'];

            // dd($this->PerPago,4,2);
            switch (substr($fecha, 4, 2)) {
                case 13:
                    $this->PerPago = '1er SAC ' . substr($fecha, 0, 4);
                    break;
                case 14:
                    $this->PerPago = '2do SAC ' . substr($fecha, 0, 4);
                    break;
                case 15:
                    $this->PerPago = 'Vacaciones ' . substr($fecha, 0, 4);
            }

            $this->IdRecibo = $ReciboRec[0]['id'];
            $this->IdEmpleado = $ReciboRec[0]['empleado_id'];
            $this->IdCatProfe = $ReciboRec[0]['categoriaprofesional_id']; //REVISAR QUE COINCIDAN LA CAT PROF DEL RECIBO CON LA DEL EMPLEADO

            $this->TotHaberes = $ReciboRec[0]['totalhaberes']; // REVISAR QUE DEVUELVA EL BÁSICO DE LA CATEGORÍA SEGÚN SEA MENSUAL/DIARIO/ETC
            $this->NoRem = $ReciboRec[0]['noremunerativo'];
            $this->Descuentos = $ReciboRec[0]['descuentos'];

            $this->PerUltLiq = $ReciboRec[0]['perultimaliq'];
            $this->FechaUltLiq = $ReciboRec[0]['fechaultliq'];

            //$this->Banco=$row['Banco'];
            $this->AcumRem = 0;
            $this->AcumNoRem = 0;
            $this->AcumDescuento = 0;

            $this->CargarDatosDeLaEmpresa();
            $this->CargarDatosDelEmpleado();
            $this->CargarDatosCategoriaProfesional($ReciboRec[0]['categoriaprofesional_id']);
            $this->DevolverConceptosRecibo($this->IdRecibo);
        }
        // dd($Recibo);
        // $sSql='SELECT * FROM tblRecibos WHERE IdEmpleado='.$IdEmpleado.' and PerPago='.$PerPago;
        // // echo $sSql;
        //     unset($result);
        //     $stmt =  $GLOBALS['pdo']->prepare($sSql); $stmt->execute();
        // //   	$result = mysql_db_query($_SESSION['db'],$sSql);
        // // 	if (!$result) {
        //            $row=$stmt->fetch();
        // // 		$row = mysql_fetch_array($result);
        //          $this->LugarPago=$row['LugarPago'];
        //         $this->Banco=$row['Banco'];
        //         //$this->FPago=$FI;
        //          $this->FPago=SUBSTR($row['FPago'],8,2)."-".SUBSTR($row['FPago'],5,2)."-".SUBSTR($row['FPago'],0,4) ;
        //         $this->PerPago=$row['PerPago'];
        //         //$this->PerPago=$MP;
        // // $this->PerPago=substr($row['PerPago'],4,2);
        //         switch (substr($row['PerPago'],4,2)) { 
        //         case 13 :  $this->PerPago='1er SAC '.substr($row['PerPago'],0,4); break;
        //         case 14 :  $this->PerPago='2do SAC '.substr($row['PerPago'],0,4); break;
        //         case 15 :  $this->PerPago='Vacaciones '.substr($row['PerPago'],0,4); }
        // // 		else case { $this->PerPago=$row['PerPago']; }
        //         $this->IdRecibo=$row['IdRecibo'];
        //         $this->IdEmpleado=$row['IdEmpleado'];
        //         $this->IdCatProfe=$row['IdCatProfe'];

        //         $this->TotHaberes=$row['TotHaberes'];
        //         $this->NoRem=$row['NoRem'];
        //         $this->Descuentos=$row['Descuentos'];

        //         $this->PerUltLiq=$row['PerUltLiq'];
        //         $this->FechaUltLiq=$row['FechaUltLiq'];

    }

    public function AltaRecibo($a, $m)
    {
        //Prepara el recibo para el siguiente periodo
        $mx = $m;
        $mx = $mx + 1;
        if ($mx == 13) {
            $mx = '01';
            $a = $a + 1;
        }  //Coloca mes en 1 y suma un año si es el recibo de diciembre

        if (strlen($m) == 1) {
            $m = '0' . $m;
        }
        $reciboActual = Recibo::where('perpago', $a . $m)
            ->where('empleado_id', $this->empleadoseleccionado)
            ->get();
        if (strlen($mx) == 1) {
            $mx = '0' . $mx;
        }

        $recibo = Recibo::where('perpago', $a . $mx)
            ->where('empleado_id', $this->empleadoseleccionado)
            ->get();
        //Si ya estaba generado el recibo, se le avisa al usuario, sino, se genera
        if (!count($recibo)) {
            $ReciboN = new Recibo;
            $ReciboN->fechapago = date('Y-m-d');
            $ReciboN->perpago = $a . $mx;
            $ReciboN->lugarpago = 'San MArtín';
            $ReciboN->totalhaberes = 0;
            $ReciboN->noremunetativo = 0;
            $ReciboN->descuentos = 0;
            $ReciboN->perultimaliq = $reciboActual->max('perultimaliq');
            $ReciboN->fechaultliq = $reciboActual->max('fechaultliq');
            $ReciboN->estado = 1;
            $ReciboN->empleado_id = $this->empleadoseleccionado;
            $ReciboN->categoriaprofesional_id = $reciboActual[0]['categoriaprofesional_id'];
            $ReciboN->save();
            session()->flash('messageOk', 'El recibo se agregó con éxito');
        } else {
            session()->flash('messageError', 'El recibo ya se encontraba generado');
        }
    }

    public function EliminarRecibo($IdRecibo)
    {
        $ReciboRec = Recibo::where('id', $IdRecibo);
        $ReciboRec->destroy();

        session()->flash('messageOk', 'El recibo se eliminó con éxito');
    }

    public function ModificarEscala($IdRecibo, $IdCatProf)
    {
        $ReciboRec = Recibo::find($IdRecibo);
        $ReciboRec->categoriaprofesional_id = $IdCatProf;
        $ReciboRec->save();

        session()->flash('messageOk', 'Escala Profesional modificada con éxito');
    }

    public function CargarDatosDeLaEmpresa()
    {
        //Busca los datos de la empresa
        $Empresa = Empresa::where('id', $this->EmpresaId)->get();
        $this->NombreEmpresa = $Empresa[0]['name'];
        $this->Cuit = $Empresa[0]['cuit'];
        $this->DireccionEmpresa = $Empresa[0]['direccion'];
    }

    public function CargarDatosDelEmpleado()
    {
        //Busca los datos del Empleado
        $Empleado = Empleado::where('empresa_id', $this->EmpresaId)
            ->where('id', $this->empleadoseleccionado)->get();
        $this->NombreEmpleado = $Empleado[0]['name'];
        $this->Cuil = $Empleado[0]['cuil'];
        $this->FechaIngreso = $Empleado[0]['ingreso'];
        $this->Legajo = $Empleado[0]['legajo'];
        $this->Seccion = $Empleado[0]['seccion'];
        $this->Banco = $Empleado[0]['banco'];
        $this->CategoriaProfesional_id = $Empleado[0]['categoriaprofesional_id'];
    }

    public function CargarDatosCategoriaProfesional($id)
    {
        $Categoria = Categoriaprofesional::find($id);
        // $Categoria = Categoriaprofesional::find($this->CategoriaProfesional_id)->get();
        // dd($Categoria);
        $this->NombreCategoria = $Categoria->name;
        $this->NombreSubCategoria = $Categoria->subcategoria;
        $this->CCT = $Categoria->cct;
    }

    public function DevolverConceptosRecibo($IdRecibo)
    {

        $Detalle = DB::table('concepto_recibos')
            ->join('conceptos', 'concepto_id', '=', 'conceptos.id')
            ->where('recibo_id', '=', $IdRecibo)->get(['concepto_recibos.id','concepto_id','recibo_id','cantidad','orden','name','unidad','haber','rem','norem','descuento','montofijo','calculo','montomaximo']);

        $Detalle = json_decode($Detalle, true);
        // $a = Recibo::find($this->IdRecibo);
// dd($Detalle);
        $a = Categoriaprofesional::find($this->IdCatProfe);
        $e = Empleado::where('empresa_id', $this->EmpresaId)->where('id', $this->empleadoseleccionado)->get();
        // $e = json_decode($e, true);
        $precios = array($a->preciomes, $a->preciodia, $a->preciohora, $a->preciounidad, $a->basico, $a->basico1, $a->basico2);
        // dd($e);
        // $precios = array($a->CategoriaProfesional->preciomes,$a->CategoriaProfesional->preciodia,$a->CategoriaProfesional->preciohora,$a->CategoriaProfesional->preciounidad,$a->CategoriaProfesional->basico,$a->CategoriaProfesional->basico1,$a->CategoriaProfesional->basico2);
        $precios = implode("#", $precios);

        $activo = array($e[0]['mensualizado'], $e[0]['jornalizado'], $e[0]['hora'], $e[0]['unidad']);
        // dd($e);
        // $activo = array($a->DatosEmpleado->mensualizado,$a->DatosEmpleado->jornalizado,$a->DatosEmpleado->hora,$a->DatosEmpleado->unidad);
        $tipos = implode("#", $activo);

        $i = 0;
        // dd($Detalle);
        unset($AA);
        unset($this->Conceptos);
        foreach ($Detalle as $Conceptohtml) {

            $AA[$i]['id'] = $Conceptohtml['id'];
            $AA[$i]['orden'] = $Conceptohtml['orden'];
            $AA[$i]['cantidad'] = $Conceptohtml['cantidad'];
            $AA[$i]['name'] = $Conceptohtml['name'];
            $AA[$i]['Rem'] = '0';
            $AA[$i]['NoRem'] = '0';
            $AA[$i]['Descuento'] = '0';
            // dd($Conceptohtml['cantidad']." ". $Conceptohtml['unidad']." ". $Conceptohtml['montofijo']." ". $Conceptohtml['calculo']);
            if ($Conceptohtml['rem'] > 0) {
                $AA[$i]['Rem'] = $this->CalcularExpresion($precios, $tipos, $Conceptohtml['cantidad'], $Conceptohtml['montofijo'], $Conceptohtml['calculo']);
                $AA[$i]['NoRem'] = 0;
                $AA[$i]['Descuento'] = 0;
                $this->AcumRem = $this->AcumRem + $AA[$i]['Rem'];
            }
            if ($Conceptohtml['norem'] > 0) {
                $AA[$i]['Rem'] = 0;
                $AA[$i]['NoRem'] = $this->CalcularExpresion($precios, $tipos, $Conceptohtml['cantidad'], $Conceptohtml['montofijo'], $Conceptohtml['calculo']);
                $AA[$i]['Descuento'] = 0;
                $this->AcumNoRem = $this->AcumNoRem + $AA[$i]['NoRem'];
            }
            if ($Conceptohtml['descuento'] > 0) {
                $AA[$i]['Rem'] = 0;
                $AA[$i]['NoRem'] = 0;
                $AA[$i]['Descuento'] = $this->CalcularExpresion($precios, $tipos, $Conceptohtml['cantidad'], $Conceptohtml['montofijo'], $Conceptohtml['calculo']);
                $this->AcumDescuento = $this->AcumDescuento + $AA[$i]['Descuento'];
            }
            $i++;
            // $AA[$i]['NR']=$this->CalcularExpresion($precios, $tipos, $Conceptohtml['cantidad'], $Conceptohtml['unidad'], $Conceptohtml['montofijo'], $Conceptohtml['calculo']);
        }
        if (isset($AA)) {
            $this->Conceptos = $AA;
        }
        // dd($this->Conceptos);
        // for ($i=0; $i<count($this->Conceptos);$i++) {

        // }
        // dd($this->Conceptos['name']);
        // dd($this->Conceptos[1]['name']);
        // $HTM='';
        // $R='';
        // $NR='';
        // $D=0;

        // $pp=0;


        // dd($pp);

        // if ($this->Conceptos[0]['montofijo']>0) {

        //     $pp=floatval($this->CalcularExpresion($precios, $tipos, $this->Conceptos[0]['cantidad'], $this->Conceptos[0]['unidad'], $this->Conceptos[0]['montofijo'], $this->Conceptos[0]['calculo']));
        //     // $pp=$this->CalcularExpresion($precios,$tipos,$this->Conceptos->cantidad,$this->Conceptos->unidad,$this->Conceptos->montofijo,$this->Conceptos->calculo,$this->SumHaberes,$this->SumUnidades);
        //     if ($this->Rem>0) { 
        //         $HTM=$HTM.'<td align="right">'.number_format($pp, 2, ',', '.').'</td>'; $R=$R+$this->Conceptos[0]['montofijo']; } 
        //     else { $HTM=$HTM.'<td align="right">0,00</td>';}
        //     if ($this->NoRem>0) { $HTM=$HTM.'<td align="right">'.number_format($pp, 2, ',', '.').'</td>'; $NR=$NR+$pp; } 
        //     else { $HTM=$HTM.'<td align="right">0,00</td>';}
        //     if ($this->Descuentos>0) { 
        //         $HTM=$HTM.'<td align="right">'.number_format($this->Conceptos[0]['montofijo'], 2, ',', '.').'</td>'; 
        //         // dd($this->Descuentos);
        //         $D=$D+$this->Conceptos[0]['montofijo']; } 
        //     else { $HTM=$HTM.'<td align="right">0,00</td></tr>';}
        // } 
        // else {

        //     $pp=floatval($this->CalcularExpresion($precios, $tipos, $this->Conceptos[0]['cantidad'], $this->Conceptos[0]['unidad'], $this->Conceptos[0]['montofijo'], $this->Conceptos[0]['calculo']));
        //     if ($this->Rem>0) { $HTM=$HTM.'<td align="right">'.number_format($pp, 2, ',', '.').'</td>';  $R=$R+$pp;} else { $HTM=$HTM.'<td align="right">0,00</td>';}
        //     $this->TotalRemu=$this->TotalRemu+$pp;
        //      if ($this->NoRem>0) { $HTM=$HTM.'<td align="right">'.number_format($pp, 2, ',', '.').'</td>'; $NR=$NR+$pp;} else { $HTM=$HTM.'<td align="right">0,00</td>';}
        //     if ($this->Descuentos>0) { $HTM=$HTM.'<td align="right">'.number_format($pp, 2, ',', '.').'</td>';  $D=$D+$pp; } else { $HTM=$HTM.'<td align="right">0,00</td></tr>';}
        // }
        // }

        // public function DevolverConceptosRecibo($IdRecibo) {
        //     $this->Conceptos = DB::table('concepto_recibos')
        //     ->join('conceptos','concepto_id','=','conceptos.id')
        //     ->where('recibo_id','=',$IdRecibo)->get();

        //     $this->Conceptos=json_encode($this->Conceptos, true);
        //     dd($this->Conceptos['name']);
        //     dd($this->Conceptos[1]['name']);
        //     $HTM='';
        //     $R='';
        //     $NR='';
        //     $D=0;
        //     $a = Recibo::find($this->IdRecibo);

        //     $precios = array($a->CategoriaProfesional->preciomes,$a->CategoriaProfesional->preciodia,$a->CategoriaProfesional->preciohora,$a->CategoriaProfesional->porunidad,$a->CategoriaProfesional->basico,$a->CategoriaProfesional->basico1,$a->CategoriaProfesional->basico2);
        // 	$precios = implode("#", $precios);

        //     $activo = array($a->DatosEmpleado->mensualizado,$a->DatosEmpleado->jornalizado,$a->DatosEmpleado->hora,$a->DatosEmpleado->unidad);
        //     $tipos= implode("#", $activo);

        //     $pp=0;
        //     $pp=$this->CalcularExpresion($precios, $tipos, $this->Conceptos[0]['cantidad'], $this->Conceptos[0]['unidad'], $this->Conceptos[0]['montofijo'], $this->Conceptos[0]['calculo']);

        //     // dd($pp);

        //     if ($this->Conceptos[0]['montofijo']>0) {

        //         $pp=floatval($this->CalcularExpresion($precios, $tipos, $this->Conceptos[0]['cantidad'], $this->Conceptos[0]['unidad'], $this->Conceptos[0]['montofijo'], $this->Conceptos[0]['calculo']));
        //         // $pp=$this->CalcularExpresion($precios,$tipos,$this->Conceptos->cantidad,$this->Conceptos->unidad,$this->Conceptos->montofijo,$this->Conceptos->calculo,$this->SumHaberes,$this->SumUnidades);
        //         if ($this->Rem>0) { 
        //             $HTM=$HTM.'<td align="right">'.number_format($pp, 2, ',', '.').'</td>'; $R=$R+$this->Conceptos[0]['montofijo']; } 
        //         else { $HTM=$HTM.'<td align="right">0,00</td>';}
        //         if ($this->NoRem>0) { $HTM=$HTM.'<td align="right">'.number_format($pp, 2, ',', '.').'</td>'; $NR=$NR+$pp; } 
        //         else { $HTM=$HTM.'<td align="right">0,00</td>';}
        //         if ($this->Descuentos>0) { 
        //             $HTM=$HTM.'<td align="right">'.number_format($this->Conceptos[0]['montofijo'], 2, ',', '.').'</td>'; 
        //             // dd($this->Descuentos);
        //             $D=$D+$this->Conceptos[0]['montofijo']; } 
        //         else { $HTM=$HTM.'<td align="right">0,00</td></tr>';}
        //     } 
        //     else {

        //         $pp=floatval($this->CalcularExpresion($precios, $tipos, $this->Conceptos[0]['cantidad'], $this->Conceptos[0]['unidad'], $this->Conceptos[0]['montofijo'], $this->Conceptos[0]['calculo']));
        //         if ($this->Rem>0) { $HTM=$HTM.'<td align="right">'.number_format($pp, 2, ',', '.').'</td>';  $R=$R+$pp;} else { $HTM=$HTM.'<td align="right">0,00</td>';}
        //         $this->TotalRemu=$this->TotalRemu+$pp;
        //          if ($this->NoRem>0) { $HTM=$HTM.'<td align="right">'.number_format($pp, 2, ',', '.').'</td>'; $NR=$NR+$pp;} else { $HTM=$HTM.'<td align="right">0,00</td>';}
        //         if ($this->Descuentos>0) { $HTM=$HTM.'<td align="right">'.number_format($pp, 2, ',', '.').'</td>';  $D=$D+$pp; } else { $HTM=$HTM.'<td align="right">0,00</td></tr>';}
        //     }
    }


    public function CalcularExpresion($precio, $tipo, $CA, $MF, $expre)
    {
        // dd($MF);
        unset($A);
        unset($pieces);

        $A = array();

        $precios = explode("#", $precio);
        $PM = $precios[0];
        $PD = $precios[1];
        $PH = $precios[2];
        $PU = $precios[3];
        $BC = $precios[4];
        $B1 = $precios[5];
        $B2 = $precios[6];
        //dd($precios);
        $tipos   = explode("#", $tipo);
        $TM = $tipos[0];
        $TD = $tipos[1];
        $TH = $tipos[2];
        $TU = $tipos[3];
        // dd($tipos);
        // PD: Precio Mes   PD: Precio Dia    PH: Precio Hora    PU: Precio Unidad
        // TM: Tipo Mes     TD: Tipo Dia      TH: Tipo Hora      TU: Tipo Unidad
        $pieces = explode("*", $expre);

        /*
        RA	    Remuneración básica
        RB	    Remuneración básica
        AAOS	Aporte Adicional Obra Social
        AASS	Aporte Adicional Seg. Social
        ANR	    Asig. No Remunerat
        BC	    Básico Categoría al inicio
        B1	    Básico Categoría Uno
        B2	    Básico Categoría Dos
        ANT	    Antiguedad
        CA	    Cantidad
        MF	    Monto Fijo
        -- UN	    Unidades --
        DE	    Total Descuentos
        
        */
        for ($c = 0; $c < count($pieces); $c++) {
            // dd($pieces[$c]);

            // 	while ($pieces[$c]) {
            // 		$c++;
            switch ($pieces[$c]) {
                case "RA": {
                        $A[$c] = $PM * $TM + $PD * $TD + $PH * $TH + $PU * $TU;
                        break;
                    } // 'R'emuneracion 'A'signada
                case "RB": {
                        $A[$c] = ($PM * $TM + $PD * $TD + $PH * $TH + $PU * $TU);
                        $this->RB = $A[$c];
                        break;
                    } // 'R'emuneracion 'A'signada
                    //case "TH":{ $A[$c]=($PD*$TD+$PH*$TH+$PM*$TM+$PU*$TU)*$C;	break;}// 'T'otal 'H'aberes

                    // case "U": {	 $A[$c]=$U;  break;}				// 'U'nidades
                case "DE": {
                        $A[$c] = $this->RB;
                        break;
                    }            // 'D'escuentos 

                case "MF": {
                        $A[$c] = $MF;
                        break;
                    }                    // 'M'onto 'F'ijo
                case "CA": {
                        $A[$c] = $CA;
                        break;
                    }                // 'C'antidad
                case "BC": {
                        $A[$c] = $BC;
                        break;
                    }                // 'B'ásico 'C'ategoria
                case "B1": {
                        $A[$c] = $B1;
                        break;
                    }                // 'B'ásico 'C'ategoria 1
                case "B2": {
                        $A[$c] = $B2;
                        break;
                    }                // 'B'ásico 'C'ategoria 2

                    //             case "AAOS": { if (($SH*0.03)<$C) { $A[$c]=$C-($SH*0.03); } else { $A[$c]=0;} break;}	//
                    //             case "AASS": { if (($SH*0.14)<$C) { $A[$c]=$C-($SH*0.14); } else { $A[$c]=0;} break;}	//
                    //             case "ANR": {	 if ($SumUnidades<=$C) { $A[$c]=$U*$SumUnidades/200;} else { $A[$c]=$MF*$SumUnidades; } break;}	// Asignacion No Remunerativa
                    //             case "ANT": {	$Empl = new clsEmpleado($Periodo,$IdEmp); $A[$c]=$Empl->Antiguedad; unset($Empl); break;} // Devuelve la cantidad de a&ntilde;os
                    //               // case "ANTFCalc": {	$Empl = new clsEmpleado($Periodo,$IdEmp); $A[$c]=$Empl->AntiguedadFC($Periodo); unset($Empl); break;} // Devuelve la cantidad de a&ntilde;os
                    // // 			case "ANR": {	 if ($SumUnidades<=200) { $A[$c]=239*$SumUnidades/200;} else { $A[$c]=239; } break;}	// Asignacion No Remunerativa
                    //             case "2SAC":{ $Anio=substr($Periodo,0,4);
                    //                 $sSql="SELECT sum(TotHaberes)/12 as Tot FROM tblRecibos WHERE PerPago<=".$Anio."12 and PerPago >=".$Anio."07 and IdEmpleado=$IdEmp";
                    //                 $stmt =  $GLOBALS['pdo']->prepare($sSql); $stmt->execute();
                    //                 $row=$stmt->fetch();
                    //                 $A[$c]=$row['Tot'];   break;}// 2do SAC
                    //             case "1SAC":{ $Anio=substr($Periodo,0,4);
                    //                 $sSql="SELECT sum(TotHaberes)/12 as Tot FROM tblRecibos WHERE PerPago<=".$Anio."06 and PerPago >=".$Anio."01 and IdEmpleado=$IdEmp";
                    //                 $stmt =  $GLOBALS['pdo']->prepare($sSql); $stmt->execute();
                    //                 $row=$stmt->fetch();
                    //                 $A[$c]=$row['Tot'];   break;}// 2do SAC

                    // case is_numeric($pieces[$c]) : { $A[$c]=$pieces[$c]; break;} // Si es un numero
            }
        }
        // $res=$A[0];
        //dd($A[0]);

        $res = reset($A);
        // dd($res);
        for ($d = 1; $d < count($A); $d++) {
            $res = $res * $A[$d];
        }

        return $res * $CA;
        //Controla que si hay un tope maximo, este no sea superado por el calculo obtenido
        // if ($res>$MM && $MM<>0) { $res=$MM; }
        // return $res;
    }

    public function EliminarDetalle($id) {
        $detalle = ConceptoRecibo::find($id);
        // dd($detalle);
        $detalle->destroy($id);
        session()->flash('messageOk', 'El detalle se eliminó con éxito');
        $this->cargaIdEmpleado($this->empleadoseleccionado);
    }

    public function MostrarOcultarModalAgregar() {
        $this->items = Concepto::all();
        $this->ModalAgregar = true;
    }

    public function closeModalPopover() {
        $this->ModalAgregar=false;
    }

    public function GrabarItem($item,$cantidad) {
        $concepto_recibo = new ConceptoRecibo();
        $concepto_recibo->concepto_id = $item;
        $concepto_recibo->recibo_id = $this->IdRecibo;
        $concepto_recibo->cantidad = $cantidad;
        $concepto_recibo->save();
        session()->flash('messageOk', 'Concepto agregado con éxito');
        $this->DevolverConceptosRecibo($this->IdRecibo);
        $this->closeModalPopover();
    }
}
