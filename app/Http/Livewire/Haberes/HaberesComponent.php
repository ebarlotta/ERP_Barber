<?php

namespace App\Http\Livewire\Haberes;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Recibo;
use App\Http\Livewire\Haberes\clsRecibo as clsRecibo;
use App\Models\Categoriaprofesional;
use App\Models\Empleado;
use App\Models\Empresa;

class HaberesComponent extends Component
{
    public $anio=2022;
    public $mes='00';
    public $EmpleadosActivos;
    // public $EmpleadoActivo;
    
    //Datos propios del recibo seleccionado
    public $empleadoseleccionado=0;
    public $IdRecibo;
    public $LugarPago;
    public $FechaPago;
    public $PerPago;
    public $IdEmpleado=0;
    public $IdCatProfe=0;
    public $TotHaberes=0;
    public $NoRem=0;
    public $Descuentos=0;
    public $PerUltLiq=0;
    public $FechaUltLiq=0;
    
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
    Public $CategoriaProfesional_id;

    //Datos propios de la Categoría Profesional
    public $NombreCategoria;
    public $NombreSubCategoria;
    public $CCT;


    public function render()
    {
        $this->EmpresaId = session('empresa_id');
        return view('livewire.haberes.haberes-component');
    }

    
    public function CargarEmpleadosActivosEnEsePeriodo(){
        $this->EmpleadosActivos=null;
        $this->EmpleadosActivos = DB::table('empleados')
        ->select('empleados.name','empleados.id', 'empleados.activo')
        ->leftjoin('recibos','empleado_id','empleados.id')
        ->leftjoin('empresas','empresas.id','empleados.empresa_id')
        ->where('recibos.perpago',$this->anio . $this->mes)
        // ->groupBy('Nombre')
        ->get();
        $this->EmpleadosActivos = json_decode(json_encode($this->EmpleadosActivos), true);
        //dd($this->EmpleadosActivos);
    }

    public function cargaIdEmpleado($id) {
        
        $this->empleadoseleccionado=$id;
        $this->CargarEmpleadosActivosEnEsePeriodo();
        $this->CargasDatosRecibo($this->anio.$this->mes,$this->empleadoseleccionado);
    }

    public function CargasDatosRecibo($Periodo,$IdEmpleado) {
        $ReciboRec = Recibo::where('empleado_id',$IdEmpleado)
        ->where('perpago',$Periodo)
        ->get();

        $this->CargarDatosDeLaEmpresa();
        $this->CargarDatosDelEmpleado();
        $this->CargarDatosCategoriaProfesional();

        // dd($ReciboRec=json_decode(json_encode($ReciboRec), true));
        if(count($ReciboRec)) {
            $this->LugarPago=$ReciboRec[0]['lugarpago'];
            $fecha=$ReciboRec[0]['fechapago'];
            $this->FechaPago=SUBSTR($fecha,8,2)."-".SUBSTR($fecha,5,2)."-".SUBSTR($fecha,0,4) ;

            $this->PerPago=$ReciboRec[0]['perpago'];

            // dd($this->PerPago,4,2);
            switch (substr($fecha,4,2)) { 
                case 13 :  $this->PerPago='1er SAC '.substr($fecha,0,4); break;
                case 14 :  $this->PerPago='2do SAC '.substr($fecha,0,4); break;
                case 15 :  $this->PerPago='Vacaciones '.substr($fecha,0,4); 
            }
            
            $this->IdRecibo=$ReciboRec[0]['id'];
            $this->IdEmpleado=$ReciboRec[0]['empleado_id'];
            $this->IdCatProfe=$ReciboRec[0]['categoriaprofesional_id'];
            
            $this->TotHaberes=$ReciboRec[0]['totalhaberes'];
            $this->NoRem=$ReciboRec[0]['noremunerativo'];
            $this->Descuentos=$ReciboRec[0]['descuentos'];
            
            $this->PerUltLiq=$ReciboRec[0]['perultimaliq'];
            $this->FechaUltLiq=$ReciboRec[0]['fechaultliq'];

            //$this->Banco=$row['Banco'];

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

    public function AltaRecibo($a, $m) {
        //Prepara el recibo para el siguiente periodo
        $mx=$m; $mx = $mx + 1;
        if($mx==13) { $mx='01'; $a=$a+1;}  //Coloca mes en 1 y suma un año si es el recibo de diciembre

        if(strlen($m)==1) { $m='0'.$m; }
        $reciboActual=Recibo::where('perpago',$a.$m)
        ->where('empleado_id', $this->empleadoseleccionado)
        ->get();
        if(strlen($mx)==1) { $mx='0'.$mx; }

        $recibo=Recibo::where('perpago',$a.$mx)
        ->where('empleado_id', $this->empleadoseleccionado)
        ->get();
        //Si ya estaba generado el recibo, se le avisa al usuario, sino, se genera
        if(!count($recibo)) {
            $ReciboN = new Recibo;
            $ReciboN->fechapago = date('Y-m-d');
            $ReciboN->perpago = $a.$mx;
            $ReciboN->lugarpago = 'San MArtín';
            $ReciboN->totalhaberes = 0;
            $ReciboN->noremunetativo=0;
            $ReciboN->descuentos=0;
            $ReciboN->perultimaliq=$reciboActual->max('perultimaliq');
            $ReciboN->fechaultliq=$reciboActual->max('fechaultliq');
            $ReciboN->estado= 1;
            $ReciboN->empleado_id = $this->empleadoseleccionado;
            $ReciboN->categoriaprofesional_id = $reciboActual[0]['categoriaprofesional_id'];
            $ReciboN->save();
            session()->flash('messageOk','El recibo se agregó con éxito');
        }
        else {
            session()->flash('messageError','El recibo ya se encontraba generado');
        }
    }

    public function EliminarRecibo($IdRecibo) {
        $ReciboRec = Recibo::where('id',$IdRecibo);
        $ReciboRec->destroy();

        session()->flash('messageOk','El recibo se eliminó con éxito');
    }
    
    public function ModificarEscala($IdRecibo,$IdCatProf) {
        $ReciboRec = Recibo::find($IdRecibo);
        $ReciboRec->categoriaprofesional_id= $IdCatProf;
        $ReciboRec->save();

        session()->flash('messageOk','Escala Profesional modificada con éxito');
    }

    public function CargarDatosDeLaEmpresa() {
        //Busca los datos de la empresa
        $Empresa = Empresa::where('id',$this->EmpresaId)->get();
        $this->NombreEmpresa = $Empresa[0]['name'];
        $this->Cuit = $Empresa[0]['cuit'];
        $this->DireccionEmpresa = $Empresa[0]['direccion'];
    }

    public function CargarDatosDelEmpleado() {
        //Busca los datos del Empleado
        $Empleado = Empleado::where('empresa_id',$this->EmpresaId)
        ->where('id',$this->empleadoseleccionado)->get();
        $this->NombreEmpleado = $Empleado[0]['name'];
        $this->Cuil = $Empleado[0]['cuil'];
        $this->FechaIngreso = $Empleado[0]['ingreso'];
        $this->Legajo = $Empleado[0]['legajo'];
        $this->Seccion = $Empleado[0]['seccion'];
        $this->Banco = $Empleado[0]['banco'];
        $this->CategoriaProfesional_id = $Empleado[0]['categoriaprofesional_id'];
    }

    public function CargarDatosCategoriaProfesional() {
        $Categoria = Categoriaprofesional::find($this->CategoriaProfesional_id)->get();
        $this->NombreCategoria = $Categoria[0]['name'];
        $this->NombreSubCategoria = $Categoria[0]['subcategoria'];
        $this->CCT = $Categoria[0]['cct'];
    }
}
