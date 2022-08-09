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
    public $xMensualizado;
    public $xJornalizado;
    public $xHora;
    public $xUnidad;

    //Datos propios de la Categoría Profesional
    public $NombreCategoria;
    public $NombreSubCategoria;
    public $CCT;
    public $xPrecioMes;
    public $xPrecioDia;
    public $xPrecioHora;
    public $xPrecioUnidad;

    //Modales
    public $ModalAgregar=false;
    public $ModificarEscalaShow=false;
    public $ModificarConceptoShow=false;
    public $GestionarConceptos=false;

    // Propio de los items cargados para liquidar
    public $item_id;
    public $items;
    public $item;
    public $cantidad;
    public $cmbitem;

    public $name;
    public $orden;
    public $unidad;
    public $haberes;
    public $remunerativo;
    public $noremunerativo;
    public $descuento;
    public $activo;
    public $montofijo;
    public $calculo;
    public $montomaximo;


    //Propio de Modificar Categoría
    public $cmbOpcionCatProf;

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

    public function cargaIdEmpleado($id) {
        $this->empleadoseleccionado = $id;
        $this->CargarEmpleadosActivosEnEsePeriodo();
        // $this->CargarEmpleadosTipoYCategoria($id);
        $this->CargasDatosRecibo($this->anio . $this->mes, $this->empleadoseleccionado);
    }

    public function CargasDatosRecibo($Periodo, $IdEmpleado) {
        $ReciboRec = Recibo::where('empleado_id', $IdEmpleado)
            ->where('perpago', $Periodo)
            ->get();

        if (count($ReciboRec)) {
            $this->LugarPago = $ReciboRec[0]['lugarpago'];
            $fecha = $ReciboRec[0]['fechapago'];
            $this->FechaPago = SUBSTR($fecha, 8, 2) . "-" . SUBSTR($fecha, 5, 2) . "-" . SUBSTR($fecha, 0, 4);

            $this->PerPago = $ReciboRec[0]['perpago'];

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
    }

    // public function CargarEmpleadosTipoYCategoria($id) {
    //     $Empleado = Empleado::find($id);
    //     $Categoria = Categoriaprofesional::find($Empleado->categoriaprofesional_id);
    //     if($Empleado->mensualizado) { $this->xPrecioMes    = $Categoria->preciomes;    $this->TotHaberes=$Categoria->preciomes;  }
    //     if($Empleado->jornalizado)  { $this->xPrecioDia    = $Categoria->preciodia;    $this->TotHaberes=$Categoria->preciodia;  }
    //     if($Empleado->hora)         { $this->xPrecioHora   = $Categoria->preciohora;   $this->TotHaberes=$Categoria->preciohora;}
    //     if($Empleado->unidad)       { $this->xPrecioUnidad = $Categoria->preciounidad; $this->TotHaberes=$Categoria->preciounidad;}
    // }

    public function AltaRecibo($a, $m) {
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

    public function CargarDatosDeLaEmpresa() {
        //Busca los datos de la empresa
        $Empresa = Empresa::where('id', $this->EmpresaId)->get();
        $this->NombreEmpresa = $Empresa[0]['name'];
        $this->Cuit = $Empresa[0]['cuit'];
        $this->DireccionEmpresa = $Empresa[0]['direccion'];
    }

    public function CargarDatosDelEmpleado() {
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

    public function CargarDatosCategoriaProfesional($id) {

        $Empleado = Empleado::find($id);
        $Categoria = Categoriaprofesional::find($Empleado->categoriaprofesional_id);
        if($Empleado->mensualizado) { $this->xPrecioMes    = $Categoria->preciomes;    $this->TotHaberes=$Categoria->preciomes;  }
        if($Empleado->jornalizado)  { $this->xPrecioDia    = $Categoria->preciodia;    $this->TotHaberes=$Categoria->preciodia;  }
        if($Empleado->hora)         { $this->xPrecioHora   = $Categoria->preciohora;   $this->TotHaberes=$Categoria->preciohora;}
        if($Empleado->unidad)       { $this->xPrecioUnidad = $Categoria->preciounidad; $this->TotHaberes=$Categoria->preciounidad;}

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
        $a = Categoriaprofesional::find($this->IdCatProfe);
        $e = Empleado::where('empresa_id', $this->EmpresaId)->where('id', $this->empleadoseleccionado)->get();
        $precios = array($a->preciomes, $a->preciodia, $a->preciohora, $a->preciounidad, $a->basico, $a->basico1, $a->basico2);
        $precios = implode("#", $precios);
        $activo = array($e[0]['mensualizado'], $e[0]['jornalizado'], $e[0]['hora'], $e[0]['unidad']);
        $tipos = implode("#", $activo);

        $i = 0;
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
        }
        if (isset($AA)) {
            $this->Conceptos = $AA;
        }

        // if ($this->Conceptos[0]['montofijo']>0) {

        //     $pp=floatval($this->CalcularExpresion($precios, $tipos, $this->Conceptos[0]['cantidad'], $this->Conceptos[0]['unidad'], $this->Conceptos[0]['montofijo'], $this->Conceptos[0]['calculo']));
        // $pp=$this->CalcularExpresion($precios,$tipos,$this->Conceptos->cantidad,$this->Conceptos->unidad,$this->Conceptos->montofijo,$this->Conceptos->calculo,$this->SumHaberes,$this->SumUnidades);
      

        // public function DevolverConceptosRecibo($IdRecibo) {
        //     $this->Conceptos = DB::table('concepto_recibos')
        //     ->join('conceptos','concepto_id','=','conceptos.id')
        //     ->where('recibo_id','=',$IdRecibo)->get();


        //     if ($this->Conceptos[0]['montofijo']>0) {

        //         $pp=floatval($this->CalcularExpresion($precios, $tipos, $this->Conceptos[0]['cantidad'], $this->Conceptos[0]['unidad'], $this->Conceptos[0]['montofijo'], $this->Conceptos[0]['calculo']));
        // $pp=$this->CalcularExpresion($precios,$tipos,$this->Conceptos->cantidad,$this->Conceptos->unidad,$this->Conceptos->montofijo,$this->Conceptos->calculo,$this->SumHaberes,$this->SumUnidades);
        
    }


    public function CalcularExpresion($precio, $tipo, $CA, $MF, $expre)
    {
        // dd($MF);
        unset($A);
        unset($pieces);

        $A = array();

        $precios = explode("#", $precio);
        $PM = $precios[0]; $PD = $precios[1]; $PH = $precios[2]; $PU = $precios[3]; $BC = $precios[4]; $B1 = $precios[5]; $B2 = $precios[6];

        $tipos   = explode("#", $tipo);
        $TM = $tipos[0]; $TD = $tipos[1]; $TH = $tipos[2]; $TU = $tipos[3];
        
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
                    // dd($CA);
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

    public function ModificarEscalaShow() {
        $this->CategoriasProf = Categoriaprofesional::all();
        $this->ModificarEscalaShow=true;
    }

    public function ModificarEscalaHide() {
        $this->ModificarEscalaShow=false;
    }

    public function ModificarEscala($IdCatProf, $Opcion)
    {
        $ReciboRec = Recibo::find($this->IdRecibo);
        $Empleado = Empleado::find($ReciboRec->DatosEmpleado->id);
        // dd($Empleado);
        switch ($Opcion) {
            case 1: $ReciboRec->categoriaprofesional_id = $IdCatProf; $ReciboRec->save(); break;    // Solo cambia la categoría de este recibo
            case 2: $Empleado->categoriaprofesional_id = $IdCatProf; $Empleado->save(); break;  // Sólo cambia la categoría del Empleado
            case 3: $ReciboRec->categoriaprofesional_id = $IdCatProf; $ReciboRec->save(); 
                    $Empleado->categoriaprofesional_id = $IdCatProf; $Empleado->save(); break;  // CAmbia del recibo y del empleado
        }        
        $this->ModificarEscalaHide();
        session()->flash('messageOk', 'Escala Profesional modificada con éxito');
    }

    public function EliminarRecibo() {
        // dd($this->IdRecibo);
        $ReciboRec = Recibo::find($this->IdRecibo);
        $ReciboRec->destroy($this->IdRecibo);
        $this->CargarEmpleadosActivosEnEsePeriodo();
        session()->flash('messageOk', 'El recibo se eliminó con éxito');
    }

    public function ModificarConceptoShow($item_id,$item_name,$item_cantidad) {
        $this->ModificarConceptoShow=true;
        $this->item_id  = $item_id;
        $this->item  = $item_name;
        $this->cantidad = $item_cantidad;
    }

    public function ModificarConceptoHide() {
        $this->ModificarConceptoShow=false;
    }

    public function ModificarConcepto() {
        $ConceptoAEditar = ConceptoRecibo::find($this->item_id);
        // $ConceptoAEditar = ConceptoRecibo::where('recibo_id',$this->IdRecibo)->where('concepto_id',$this->item_id)->get();
        $ConceptoAEditar->cantidad = $this->cantidad;
        // dd($ConceptoAEditar);
        $ConceptoAEditar->save();
        $this->DevolverConceptosRecibo($this->IdRecibo);
        session()->flash('messageOk', 'El Concepto se actualizó con éxito');
        $this->ModificarConceptoHide();
    }

    public function GestionarConceptosShow() {
        $this->CargarListaDeConceptos();
        // dd($this->items);
        $this->GestionarConceptos=true;
    }

    public function GestionarConceptoHide() {
        $this->GestionarConceptos=false;
    }

    public function CargarListaDeConceptos() {
        $this->items = Concepto::where('empresa_id',session('empresa_id'))->get();
    }

    public function CargarItemAModificar() {
        $item = Concepto::where('empresa_id',session('empresa_id'))->where('id',$this->cmbitem)->get();
        //$item = utf8_encode(Concepto::where('empresa_id',session('empresa_id'))->where('id',$this->cmbitem)->get());
        
        //dd($item[0]['orden']);// $this->name = $this->item->name;
        $this->orden = $item[0]['orden'];
        $this->name = $item[0]['name'];
        $this->unidad = $item[0]['unidad'];
        $this->haberes = $item[0]['haberes'];
        $this->remunerativo = $item[0]['rem'];
        $this->noremunerativo = $item[0]['norem'];
        $this->descuento = $item[0]['descuento'];
        $this->activo = $item[0]['activo'];
        $this->montofijo = $item[0]['montofijo'];
        $this->calculo = $item[0]['calculo'];
        $this->montomaximo = $item[0]['montomaximo'];
        //dd($item);
    }

    public function EliminarConcepto(){ 
        $Concepto = Concepto::find($this->cmbitem);
        $Concepto_Recibo = ConceptoRecibo::where('concepto_id',$this->cmbitem)->get();
        if(count($Concepto_Recibo)) {
            $Concepto->activo = false;
            $Concepto->save();
            session()->flash('messageModalOk', 'El Concepto se marcó como no activo.');
        } else {
            $Concepto->destroy($this->cmbitem);
            session()->flash('messageModalOk', 'El Concepto se eliminó.');
        }
        $this->CargarListaDeConceptos();
    }

    public function ActualizaConcepto(){ 
        //Genera nuevo Concepto con los datos del anterior
        $ConceptoNuevo = new Concepto();
        $ConceptoNuevo->orden = $this->orden;
        $ConceptoNuevo->name = $this->name;
        $ConceptoNuevo->unidad = $this->unidad;
        dd($this->haberes);
        $ConceptoNuevo->haber = $this->haberes;
        $ConceptoNuevo->rem = $this->remunerativo;
        $ConceptoNuevo->norem = $this->noremunerativo;
        $ConceptoNuevo->descuento = $this->descuento;
        $ConceptoNuevo->montofijo = $this->montofijo;
        $ConceptoNuevo->calculo = $this->calculo;
        $ConceptoNuevo->montomaximo = $this->montomaximo;
        $ConceptoNuevo->empresa_id = session('empresa_id');
        $ConceptoNuevo->activo=true;
        $ConceptoNuevo->save();
        // Desactiva el Concepto anterior
        $Concepto = Concepto::find($this->cmbitem);
        $Concepto->activo = false;
        $Concepto->save();
        $this->CargarListaDeConceptos();
        session()->flash('messageModalOk', 'Se Actualizó el Concepto con los nuevos valores');
    }

    public function ModificarValoresDeConcepto() {
        $Concepto = Concepto::find($this->cmbitem);
        $Concepto->orden = $this->orden;
        $Concepto->name = $this->name;
        $Concepto->unidad = $this->unidad;
        is_null($this->haberes) ? $Concepto->haber = 0 : $this->haberes = $Concepto->haber;
        is_null($this->remunerativo) ? $Concepto->rem = 0 : $Concepto->rem = $this->remunerativo;
        is_null($this->noremunerativo) ? $Concepto->norem = 0 : $Concepto->norem = $this->noremunerativo;
        is_null($this->descuento) ? $Concepto->descuento = 0 : $Concepto->descuento = $this->descuento;

        // $Concepto->norem = $this->noremunerativo;
        // $Concepto->descuento = $this->descuento;
        //dd($Concepto->haber . ' ' . $Concepto->rem . ' ' . $Concepto->norem . ' ' . $Concepto->descuento);
        $Concepto->montofijo = $this->montofijo;
        $Concepto->calculo = $this->calculo;
        $Concepto->montomaximo = $this->montomaximo;
        //$Concepto->empresa_id = session('empresa_id');
        $Concepto->activo=$this->activo;
        $Concepto->save();
        $this->CargarListaDeConceptos();
        session()->flash('messageModalOk', 'Se Modificó el valor del Concepto para todos los valores.');
    }

    public function NuevoConcepto(){ 
        $ConceptoNuevo = new Concepto();
        $ConceptoNuevo->orden = $this->orden;
        $ConceptoNuevo->name = $this->name;
        $ConceptoNuevo->unidad = $this->unidad;
        $ConceptoNuevo->haber = $this->haberes;
        $ConceptoNuevo->rem = $this->remunerativo;
        $ConceptoNuevo->norem = $this->noremunerativo;
        $ConceptoNuevo->descuento = $this->descuento;
        $ConceptoNuevo->montofijo = $this->montofijo;
        $ConceptoNuevo->calculo = $this->calculo;
        $ConceptoNuevo->montomaximo = $this->montomaximo;
        $ConceptoNuevo->empresa_id = session('empresa_id');
        $ConceptoNuevo->activo=true;
        $ConceptoNuevo->save();
        session()->flash('messageModalOk', 'Se Actualizó el Concepto con los nuevos valores');
        $this->CargarListaDeConceptos();
    }

}
