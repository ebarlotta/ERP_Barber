<?php

namespace App\Http\Livewire\Certificado;

use Livewire\Component;
use Afip;
use App\Models\Certificado;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use JeroenNoten\LaravelAdminLte\View\Components\Form\Input;
use Illuminate\Support\Facades\Storage;
use PhpParser\JsonDecoder;




class CertificadoComponent extends Component
{
    public $tabActivo=1; 
    public $ModalDelete,$ModalModify,$ModalAgregarDetalle;
    public $txttax_id=null, $txtusername='', $txtpassword=null, $txtalias=null,$txtPtoVta;
    public $txtcertificado, $txtkey, $txtvisible_guardar=true; 
    public $estado='Habilitado', $estado_color='green';
    public $certificado_id, $certificado_PtoVta=null, $certificado_tax_id, $certificado_crt, $certificado_key, $certificado_alias, $certificado_production=false;

    public $demora=false;
    public $res; // Certificado
    public $certificados;

    public $clientes, $puntosdeventas;
    public $filtro;
    public $gbruto;

    public $datosCliente;

    public $CUIT, $options, $CERT, $PRIVATEKEY;

    public function render()
    {
        $options['CUIT'] = '20152680431';
        $options['cert'] = null;
        $options['key'] = null;

		// ini_set("soap.wsdl_cache_enabled", "0");

		if (!isset($options['CUIT'])) {
			throw new Exception("CUIT field is required in options array");
		} else {
			$this->CUIT = $options['CUIT'];
		}

		if (!isset($options['production'])) { $options['production'] = TRUE; }
		if (!isset($options['cert'])) { $options['cert'] = NULL; }
		if (!isset($options['key'])) { $options['key'] = NULL;  }

		$this->options = $options;

		$this->CERT 		= $options['cert'];
		$this->PRIVATEKEY 	= $options['key'];
	// dd($this->options);
    
    $xml = '';

        // return Http::get('http://wswhomo.afip.gov.ar/wsfev1/service.asmx');
        // return Http::get('http://servicios1.afip.gov.ar/wsfev1/service.asmx HTTP/1.1');


        $url = 'http://wswhomo.afip.gov.ar/wsfev1/service.asmx?op=FEDummy';


        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', $url);
        // $response = $client->request('GET', 'https://api.github.com/repos/guzzle/guzzle');
        
        echo $response->getStatusCode(); // 200
        echo $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
        echo $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'
        
        // Send an asynchronous request.
        // $request = new \GuzzleHttp\Psr7\Request('GET', 'http://httpbin.org');
        // $promise = $client->sendAsync($request)->then(function ($response) {
        //     echo 'I completed! ' . $response->getBody();
        // });

        // $promise->wait();

dd('termino');

        $client = new \GuzzleHttp\Client();
        // dd($client);

        // Import Guzzle Client

        // URL and XML VALUE
        $url = 'servicios1.afip.gov.ar/wsfev1/service.asmx';

        $xml = '<?xml version="1.0" encoding="utf-8"?>
                    <soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
                    <soap12:Body>
                        <FECAESolicitar xmlns="http://ar.gov.afip.dif.FEV1/">
                        <Auth>
                            <Token>string</Token>
                            <Sign>string</Sign>
                            <Cuit>long</Cuit>
                        </Auth>
                        <FeCAEReq>
                            <FeCabReq />
                            <FeDetReq>
                            <FECAEDetRequest />
                            <FECAEDetRequest />
                            </FeDetReq>
                        </FeCAEReq>
                        </FECAESolicitar>
                    </soap12:Body>
                    </soap12:Envelope>
                ';


        $options = [
            'headers' => [
                'Content-Type' => 'application/soap+xml; charset=utf-8'
            ],
            'body' => $xml
        ];

        // $client = new Client();

$response = $client->request('POST', $url, $options);
dd($response);
return $response->getBody();

// Response is normal

        // $response = Http::withHeaders(['Content-Type' => 'text/xml; charset=utf-8'])->send('POST', 'URL', [
        //     'body' => $xml,
        // ]);

        // $clean_xml = str_ireplace(['SOAP-ENV:', 'SOAP:'], '', $response);
        // $cxml = simplexml_load_string($clean_xml);
        
        // $res = $client->request('POST', $url, $data);

        // $response = $res->getBody();

        // if($res->getStatusCode() == 200) 
        // {
        //     print_r($res);

        // } else {

        //     print_r($response);

        // }

        // dd($cxml);

        $this-> setDatosCertificado();  // Llama al método para cargar todos los datos del certificado si es que encuentra alguno para la empresa seleccionada
        if(count($this->certificados)) { 
            $this->estado = $this->certificados[0]->estado; 
            $this->estado_color='lightgreen';
            
            $puntosVtas = $this->TraerPuntosDeVentas();
            session()->flash('message', $puntosVtas ? null : 'Debe agregar un punto de venta antes de continuar');

        } else { $this->estado = 'Vacio'; $this->estado_color='lightcoral'; }
        return view('livewire.certificado.certificado-component')->extends('layouts.adminlte');
    }

    // public function ExecuteRequest($operation, $params = array())
	// {
	// 	$this->options = array('service' => 'ws_sr_constancia_inscripcion');

	// 	$results = parent::ExecuteRequest($operation, $params);

	// 	return $results->{
	// 		$operation === 'getPersona_v2' ? 'personaReturn' :
	// 			($operation === 'getPersonaList_v2' ? 'personaListReturn': 'return')
	// 		};
	// }


    public function setDatosCertificado() {
        $this->certificados = Certificado::where('empresa_id','=',session('empresa_id'))->get();
        if(count($this->certificados)) { 
            $this->certificado_id = $this->certificados[0]->id;
            $this->certificado_tax_id = $this->certificados[0]->tax_id;
            $this->certificado_alias = $this->certificados[0]->alias;
            $this->certificado_crt = Storage::disk('local')->get('certificados/'.$this->certificados[0]->tax_id.'_'.$this->certificados[0]->alias.'.crt');
            $this->certificado_key = Storage::disk('local')->get('certificados/'.$this->certificados[0]->tax_id.'_'.$this->certificados[0]->alias.'.key');
            // dd($this->certificados);
        }
    }

    public function CambiarTab($id) {
        $this->tabActivo=$id;
    }

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
            // $wsid = 'wsfe';
            $wsid = 'ws_sr_constancia_inscripcion';
            
            $afip = new Afip(array('CUIT' => $tax_id ));
            $res = $afip->CreateWSAuth($username, $password, $alias, $wsid);
            dd($username. $password. $alias. $wsid.' ' . $res);

            $cert = Certificado::where('id','=',$this->certificado_id);
            $cert->estado = 'Activo - Autorizado';
            $cert->estado_color='lightgreen';
            $cert->save();            

        } catch (Exception $ex) {
            session(['message' => 'Se produjo un error, controle todos los datos']);
        }
    }

    public function Emitidos() {

        $afip = new Afip(array(
            'CUIT' => $this->certificado_tax_id,
            'cert' => $this->certificado_crt,
            'key' =>  $this->certificado_key,
            'access_token' => env('AFIP_ACCESS_TOKEN'),
        ));

        $voucher_types = $afip->ElectronicBilling->GetVoucherTypes();
        $CbteTipo = $voucher_types[0]->Id;
        // dd($CbteTipo);
        // dd($voucher_types);
        $CbteTipo=11;
        // $sales_points = $afip->ElectronicBilling->GetSalesPoints();
        // $PtoVta = $sales_points[0]->Nro;

        /**
        * @param int $number 		Number of voucher to get information
        * @param int $sales_point 	Sales point of voucher to get information
        * @param int $type 			Type of voucher to get information */
        $number = 58;
        $sales_point = 9;
        // $sales_point = $PtoVta;
        $a = $afip->ElectronicBilling->GetVoucherInfo($number, $sales_point, $CbteTipo);
        dd($a);
    }


    public function __construct() {
        
        
        // $xml = '';

        // $response = Http::withHeaders(['Content-Type' => 'text/xml; charset=utf-8'])->send('POST', 'URL', [
        //     'body' => $xml,
        // ]);

        // $clean_xml = str_ireplace(['SOAP-ENV:', 'SOAP:'], '', $response);
        // $cxml = simplexml_load_string($clean_xml);

        // dd($cxml);

}


    // public function GetServiceTA($service, $force = FALSE)
	// {
	// 	// Prepare data to for request
	// 	$data = array(
	// 		'environment' => $this->options['production'] === TRUE ? "prod" : "dev",
	// 		'wsid' => $service,
	// 		'tax_id' => $this->options['CUIT'],
	// 		'force_create' => $force
	// 	);

	// 	// Add cert if is set
	// 	if (isset($this->CERT)) {
	// 		$data['cert'] = $this->CERT;
	// 	}

	// 	// Add key is is set
	// 	if ($this->PRIVATEKEY) {
	// 		$data['key'] = $this->PRIVATEKEY;
	// 	}

	// 	$headers = array(
	// 		'Content-Type' => 'application/json',
	// 		'sdk-version-number' => $this->sdk_version_number,
	// 		'sdk-library' => 'php',
	// 		'sdk-environment' => $this->options['production'] === TRUE ? "prod" : "dev"
	// 	);

	// 	if (isset($this->options['access_token'])) {
	// 		$headers['Authorization'] = 'Bearer '.$this->options['access_token'];
	// 	}

	// 	// $request = static Request::getRequestUri('https://wswhomo.afip.gov.ar/wsfev1/service.asmx?', $headers, json_encode($data));
	// 	$request = Requests::post('https://app.afipsdk.com/api/v1/afip/auth', $headers, json_encode($data));
        
	// 	if ($request->success) {
	// 		$decoded_res = json_decode($request->body);

	// 		//Return response
	// 		return new TokenAuthorization($decoded_res->token, $decoded_res->sign);
	// 	}
	// 	else {
	// 		$error_message = $request->body;

	// 		try {
	// 			$json_res = json_decode($request->body);

	// 			if (isset($json_res->message)) {
	// 				$error_message = $json_res->message;
	// 			}
	// 		} catch (Exception $e) {}

	// 		throw new Exception($error_message);
	// 	}
	// }

    private function GetWSInitialRequest($operation)
	{
		if ($operation == 'FEDummy') {
			return array();
		}

		$ta = $this->afip->GetServiceTA('wsfe');

		return array(
			'Auth' => array( 
				'Token' => $ta->token,
				'Sign' 	=> $ta->sign,
				'Cuit' 	=> $this->afip->CUIT
				)
		);
	}

    public function ExecuteRequest($operation, $params = array())
	{
		$this->options = array('service' => 'wsfe');

		$params = array_replace($this->GetWSInitialRequest($operation), $params); 

		$results = parent::ExecuteRequest($operation, $params);

		$this->_CheckErrors($operation, $results);

		return $results->{$operation.'Result'};
	}

    public function TraerPuntosDeVentas() {

        // $afip = new Afip(array(
        //     'CUIT' => $this->certificado_tax_id,
        //     'cert' => $this->certificado_crt,
        //     'key' =>  $this->certificado_key,
        //     'access_token' => env('AFIP_ACCESS_TOKEN'),
        // ));

        $afip = array(
            'CUIT' => $this->certificado_tax_id,
            'cert' => $this->certificado_crt,
            'key' =>  $this->certificado_key,
            'access_token' => env('AFIP_ACCESS_TOKEN'),
        );

        // dd($afip->options['production']);
        $sales_points = $this->ExecuteRequest('FEParamGetPtosVenta');

        
        
        foreach($sales_points as $sale_point) {
            if($sale_point->FchBaja === "NULL" && $sale_point->Bloqueado=='N') { 
                $this->certificado_PtoVta = $sale_point->Nro;                 
            }
        }

        // Revisa si el certificado es de producción o testing
        if($afip->options['production']===FALSE) { 
            $this->certificado_PtoVta=10; 
            $this->certificado_production=false;
        } else {
            $this->certificado_production=true;
        }
        
        // dd($this->certificado_PtoVta);
        return $this->certificado_PtoVta;

        if($this->certificado_PtoVta)

        $PtoVta = $sales_points[0]->Nro;
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

        $afip = new Afip(array(
            'CUIT' => $this->certificado_tax_id,
            'cert' => $this->certificado_crt,
            'key' =>  $this->certificado_key,
            'access_token' => env('AFIP_ACCESS_TOKEN'),
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

    public function ObtenerDatosCliente() {
        

        // $certificado_tax_id = 20255083571;
        // $certificado_alias = 'NUEVO';
        // $certificado_crt = Storage::disk('local')->get('certificados/'.$certificado_tax_id.'_'.$certificado_alias.'.crt');
        // $certificado_key = Storage::disk('local')->get('certificados/'.$certificado_tax_id.'_'.$certificado_alias.'.key');

        $Aafip = new Afip(array(
            'CUIT' => $this->certificado_tax_id,
            'cert' => $this->certificado_crt,
            'key' =>  $this->certificado_key,
            'access_token' => env('AFIP_ACCESS_TOKEN'),
        ));
        // $server_status = $afip->RegisterInscriptionProof->GetServerStatus();

        // echo 'Este es el estado del servidor:';
        // echo '<pre>';
        // dd($server_status);
        // echo '</pre>';
        // dd($afip->RegisterScopeTen->GetTaxpayerDetails(27273497159));
        // dd($afip->RegisterScopeTen->GetServerStatus());

        $afip = new Afip(array('CUIT' => 20409378472, 'production' => FALSE));


        // CUIT del contribuyente
        // $identifier=20000000516;
        $tax_id = 20000000516;
        $taxpayer_details = $afip->RegisterInscriptionProof->GetTaxpayerDetails($tax_id); 
        // $taxpayer_details = $afip->RegisterScopeTen->GetTaxpayerDetails($tax_id);
        // dd($taxpayer_details);   
        // CUITs de los contribuyentes
        // $tax_ids = Array(20111111111, 20111111112);

        // $taxpayers_details = $afip->getPersona_v2($tax_id);
        // $taxpayers_details = $afip->RegisterInscriptionProof->GetTaxpayersDetails($tax_ids);


        $this->datosCliente = json_encode($taxpayer_details);
    }
}