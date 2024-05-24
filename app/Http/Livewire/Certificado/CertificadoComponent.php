<?php

namespace App\Http\Livewire\Certificado;

use Livewire\Component;
use Afip;
use App\Models\Certificado;
use Exception;
use JeroenNoten\LaravelAdminLte\View\Components\Form\Input;
use Illuminate\Support\Facades\Storage;
use PhpParser\JsonDecoder;

class CertificadoComponent extends Component
{
    public $tabActivo=1; 
    public $ModalDelete,$ModalModify,$ModalAgregarDetalle;
    public $txttax_id=null, $txtusername='', $txtpassword=null, $txtalias=null;
    public $txtcertificado, $txtkey, $certificado_crt, $certificado_key;
    public $estado='Habilitado', $estado_color='green', $txtvisible_guardar=true,$certificado_id;

    public $demora=false;
    public $res; // Certificado
    public $certificados;

    public $clientes;
    public $filtro;
    public $gbruto;

    public function render()
    {
        // return view('livewire.certificado.certificado-component');
        $this->certificados = Certificado::where('empresa_id','=',session('empresa_id'))->get();
        if(count($this->certificados)) { 
            $this->estado = $this->certificados[0]->estado; 
            $this->certificado_id = $this->certificados[0]->id;

            $this->estado_color='lightgreen';
            
            $this->certificado_crt = Storage::disk('local')->get('certificados/'.$this->certificados[0]->tax_id.'_'.$this->certificados[0]->alias.'.crt');
            $this->certificado_key = Storage::disk('local')->get('certificados/'.$this->certificados[0]->tax_id.'_'.$this->certificados[0]->alias.'.key');

        } else { $this->estado = 'Vacio'; $this->estado_color='lightcoral'; }
        return view('livewire.certificado.certificado-component')->extends('layouts.adminlte');
    }

    public function CambiarTab($id) {
        $this->tabActivo=$id;
    }

    // public function GrabarFichero() {
    //     $datos = $this->res->cert;
    //     $key   = $this->res->key;
    //     // Escribir los contenidos en el fichero,
    //     Storage::disk('local')->put('certificados/'.$this->txttax_id.'_'.$this->txtalias.'.crt', $datos) ? $this->estado = "Grabado" : $this->estado = 'Error!';
    //     Storage::disk('local')->put('certificados/'.$this->txttax_id.'_'.$this->txtalias.'.key', $key  ) ? $this->estado = "Grabado" : $this->estado = 'Error!';    
    // }

    public function GenerarCertificado() {
        // CUIT al cual le queremos generar el certificado
        // $tax_id = 20255083571; 

        // Usuario para ingresar a AFIP.
        // Para la mayoria es el mismo CUIT, pero al administrar
        // una sociedad el CUIT con el que se ingresa es el del administrador
        // de la sociedad.
        // $username = '20255083571'; 

        // Contraseña para ingresar a AFIP.
        // $password = 'sOCIEDAD2023';

        // Alias para el certificado (Nombre para reconocerlo en AFIP)
        // un alias puede tener muchos certificados, si estas renovando
        // un certificado podes utilizar el mismo alias
        // $alias = 'afipsdkCertificado';

        // Creamos una instancia de la libreria
        // $afip = new Afip(array('CUIT' => $tax_id ));

        // Creamos el certificado (¡Paciencia! Esto toma unos cuantos segundos)
        // $res = $afip->CreateCert($username, $password, $alias);

        // Mostramos el certificado por pantalla
        // var_dump($res->cert);

        // Mostramos la key por pantalla
        // var_dump($res->key);

        //Ahora si, paso los datos para generar el certificado
        $this->validate([
            'txttax_id' => 'required|digits:11',
            'txtusername' => 'required',
            'txtpassword' => 'required',
            'txtalias' => 'required',
        ]);

        $this->demora = true;
        
        try {
            $tax_id = $this->txttax_id;
            $username =$this->txtusername;
            $password =$this->txtpassword;
            $alias =$this->txtalias;
            $afip = new Afip(array('CUIT' => $tax_id ));
            $this->res = $afip->CreateCert($username, $password, $alias);
        } catch (Exception $ex) {
            session(['message' => 'Se produjo un error, controle todos los datos']);
        }
        
        $this->demora = false;
        $datos = $this->res->cert;
        $key   = $this->res->key;

        $this->
        // Escribir los contenidos en el fichero,
        Storage::disk('local')->put('certificados/'.$this->txttax_id.'_'.$this->txtalias.'.crt', $datos) ? $this->estado = "Grabado" : $this->estado = 'Error!';
        Storage::disk('local')->put('certificados/'.$this->txttax_id.'_'.$this->txtalias.'.key', $key  ) ? $this->estado = "Grabado" : $this->estado = 'Error!';    

        $cert = new Certificado;
        $cert->tax_id= $this->txttax_id;
        $cert->username = $this->txtusername;
        $cert->password = $this->txtpassword;
        $cert->alias = $this->txtalias;
        $cert->estado = 'Para autorizar';
        $cert->empresa_id = session('empresa_id');
        $a = $cert->save();



        if($a) { $this->txtvisible_guardar = true; } else { $this->txtvisible_guardar = false; }
        // dd($res->cert);
    }

    public function AutorizarCertificado() {
        // CUIT al cual le queremos generar la autorización
        // $tax_id = 20255083571; 

        // Usuario para ingresar a AFIP.
        // Para la mayoria es el mismo CUIT, pero al administrar
        // una sociedad el CUIT con el que se ingresa es el del administrador
        // de la sociedad.
        // $username = '20255083571'; 

        // Contraseña para ingresar a AFIP.
        // $password = 'sOCIEDAD2023';

        // Alias del certificado a autorizar (previamente creado)
        // $alias = 'afipsdkCertificado';

        // Id del web service a autorizar
        // $wsid = 'wsfe';

        // Creamos una instancia de la libreria
        // $afip = new Afip(array('CUIT' => $tax_id ));

        // Creamos la autorizacion (¡Paciencia! Esto toma unos cuantos segundos)
        // $res = $afip->CreateWSAuth($username, $password, $alias, $wsid);

        // Mostramos el resultado por pantalla
        // var_dump($res);

        try {
            $tax_id = $this->certificados[0]->tax_id;
            $username =strval($this->certificados[0]->username);
            $password =$this->certificados[0]->password;
            $alias =$this->certificados[0]->alias;
            $wsid = 'wsfe';

            $afip = new Afip(array('CUIT' => $tax_id ));

            $res = $afip->CreateWSAuth($username, $password, $alias, $wsid);

            $cert = Certificado::where('id','=',$this->certificado_id);
            $cert->estado = 'Activo - Autorizado';
            $cert->estado_color='lightgreen';
            $cert->save();            

        } catch (Exception $ex) {
            session(['message' => 'Se produjo un error, controle todos los datos']);
        }
    }

    public function Emitidos() {

        // Certificado (Puede estar guardado en archivos, DB, etc)
        // $cert = file_get_contents('/home/enzo/Escritorio/erp.softxplus.com/app/Http/Livewire/Compra/certificado.crt');

        // Key (Puede estar guardado en archivos, DB, etc)
        // $key = file_get_contents('/home/enzo/Escritorio/erp.softxplus.com/app/Http/Livewire/Compra/key.key');

        // Tu CUIT
        // $tax_id = 30712141790;
        // $tax_id = 20255083571;

        $tax_id = $this->certificados[0]->tax_id;
        $cert = Storage::disk('local')->get('certificados/'.$this->certificados[0]->tax_id.'_'.$this->certificados[0]->alias.'.crt');
        $key  = Storage::disk('local')->get('certificados/'.$this->certificados[0]->tax_id.'_'.$this->certificados[0]->alias.'.key');

        $afip = new Afip(array(
            'CUIT' => $tax_id,
            'cert' => $cert,
            'key' => $key
        ));

        $voucher_types = $afip->ElectronicBilling->GetVoucherTypes();
        $CbteTipo = $voucher_types[0]->Id;
        // dd($CbteTipo);

        $sales_points = $afip->ElectronicBilling->GetSalesPoints();
        $PtoVta = $sales_points[0]->Nro;
        // dd($PtoVta);
        /**
        * @param int $number 		Number of voucher to get information
        * @param int $sales_point 	Sales point of voucher to get information
        * @param int $type 			Type of voucher to get information */
        $number = 2;
        $sales_point = $PtoVta;
        $a = $afip->ElectronicBilling->GetVoucherInfo($number, $sales_point, $CbteTipo);
        dd($a);
    }

    public function Facturar(){

        // Certificado (Puede estar guardado en archivos, DB, etc)
        // $cert = file_get_contents('/home/enzo/Escritorio/erp.softxplus.com/app/Http/Livewire/Compra/certificado.crt');

        // Key (Puede estar guardado en archivos, DB, etc)
        // $key = file_get_contents('/home/enzo/Escritorio/erp.softxplus.com/app/Http/Livewire/Compra/key.key');

        // Tu CUIT
        // $tax_id = 30712141790;
        $cert = Storage::disk('local')->get('certificados/'.$this->certificados[0]->tax_id.'_'.$this->certificados[0]->alias.'.crt');
        $key  = Storage::disk('local')->get('certificados/'.$this->certificados[0]->tax_id.'_'.$this->certificados[0]->alias.'.key');
        
        $tax_id = 20255083571;

        $afip = new Afip(array(
            'CUIT' => $tax_id,
            'cert' => $cert,
            'key' => $key
        ));


        // Para hacer pruebas
        // Tu CUIT
        // $tax_id = 20111111112;
        // $afip = new Afip(array('CUIT' => 20255083571));

        $voucher_types = $afip->ElectronicBilling->GetVoucherTypes();
        $CbteTipo = $voucher_types[0]->Id;
        // dd($CbteTipo);

        $sales_points = $afip->ElectronicBilling->GetSalesPoints();
        $PtoVta = $sales_points[0]->Nro;
        // dd($PtoVta);

        $DocTipos = $afip->ElectronicBilling->GetDocumentTypes();
        $DocTipo = $DocTipos[0]->Id;    // 0: CUIT  y 9:DNI
        // dd($DocTipos);

        $TiposIva = $afip->ElectronicBilling->GetAliquotTypes();
        $TipoIva = $TiposIva[2]->Id;   // El Concepto del arrary en la posición 2, tiene en su ID el valor 5 que es IVA al 21%
        // dd($TipoIva);

        $Conceptos = $afip->ElectronicBilling->GetConceptTypes();
        $Concepto = $Conceptos[2]->Id;  // Concepto del Comprobante: (1)Productos, (2)Servicios, (3)Productos y Servicios
        // El Concepto del arrary en la posición 2, tiene en su ID el valor 3 que es Productos y Servicios
        // dd($Conceptos); 

        $Tributos = $afip->ElectronicBilling->GetTaxTypes();
        $Tributo = $Tributos[4]->Id; // El Concepto del arrary en la posición 4, tiene en su ID el valor 99 que es Otros Tributos
        $TributoDesc = $Tributos[4]->Desc; 
        // dd($Tributo);


        //$CbteNro = $afip->ElectronicBilling->GetLastVoucher($PtoVta,$CbteTipo);
        //dd($CbteNro);


        $data = array(
            'CantReg' 		=> 1, // Cantidad de comprobantes a registrar
            'PtoVta' 		=> $PtoVta, // Punto de venta
            'CbteTipo' 		=> $CbteTipo, // Tipo de comprobante (ver tipos disponibles) 
            'Concepto' 		=> $Concepto, // Concepto del Comprobante: (1)Productos, (2)Servicios, (3)Productos y Servicios
            'DocTipo' 		=> $DocTipo, // Tipo de documento del comprador (ver tipos disponibles)
            'DocNro' 		=> 20111111112, // Numero de documento del comprador
            'CbteDesde' 	=> 1, // Numero de comprobante o numero del primer comprobante en caso de ser mas de uno
            'CbteHasta' 	=> 1, // Numero de comprobante o numero del ultimo comprobante en caso de ser mas de uno
            'CbteFch' 		=> intval(date('Ymd')), // (Opcional) Fecha del comprobante (yyyymmdd) o fecha actual si es nulo
            'ImpTotal' 		=> 189.3, // Importe total del comprobante
            'ImpTotConc' 	=> 0, // Importe neto no gravado
            'ImpNeto' 		=> 150, // Importe neto gravado
            'ImpOpEx' 		=> 0, // Importe exento de IVA
            'ImpIVA' 		=> 31.5, //Importe total de IVA
            'ImpTrib' 		=> 7.8, //Importe total de tributos
            'FchServDesde' 	=> intval(date('Ymd')), // (Opcional) Fecha de inicio del servicio (yyyymmdd), obligatorio para Concepto 2 y 3
            'FchServHasta' 	=> intval(date('Ymd')), // (Opcional) Fecha de fin del servicio (yyyymmdd), obligatorio para Concepto 2 y 3
            'FchVtoPago' 	=> intval(date('Ymd')), // (Opcional) Fecha de vencimiento del servicio (yyyymmdd), obligatorio para Concepto 2 y 3
            'MonId' 		=> 'PES', //Tipo de moneda usada en el comprobante (ver tipos disponibles)('PES' para pesos argentinos) 
            'MonCotiz' 	    => 1, 
            'Tributos' 		=> array( // (Opcional) Tributos asociados al comprobante
                array(
                    'Id' 		=>  $Tributo, // Id del tipo de tributo (ver tipos disponibles) 
                    'Desc' 		=>  $TributoDesc, //'Ingresos Brutos', // (Opcional) Descripcion
                    'BaseImp' 	=> 150, // Base imponible para el tributo
                    'Alic' 		=> 5.2, // Alícuota
                    'Importe' 	=> 7.8 // Importe del tributo
                )
            ),
	        'Iva' 			=> array( // (Opcional) Alícuotas asociadas al comprobante
		        array(
			        'Id' 		=> $TipoIva, // Id del tipo de IVA (ver tipos disponibles) 
        			'BaseImp' 	=> 150, // Base imponible
		        	'Importe' 	=> 31.5 // Importe 
                ),
            ),
        );

        $a = $afip->ElectronicBilling->CreateNextVoucher($data);

        dd($a);

        // include('/home/enzo/Escritorio/erp.softxplus.com/app/Http/Livewire/Compra/ElectronicBilling.php');
        // $Factura = new ElectronicBilling('wsfe');
        // $sales_points = $Factura->GetDocumentTypes();

        // $sales_points = $afip->ElectronicBilling->GetDocumentTypes();
        // $sales_points = $afip->ElectronicBilling->GetAliquotTypes();

}
}