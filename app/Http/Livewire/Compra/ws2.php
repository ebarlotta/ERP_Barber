<?php
// -*- coding: utf8 -*-
// This program is free software; you can redistribute it and/or modify
// it under the terms of the GNU Lesser General Public License as published by the
// Free Software Foundation; either version 3, or (at your option) any later
// version.
//
// This program is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
// or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU Lesser General Public License
// for more details.

/**
 * Módulo para obtener CAE/CAEA, código de autorización electrónico webservice 
 * WSFEv1 de AFIP (Factura Electrónica Nacional - Proyecto Version 1 - 2.13)
 * Según RG 2485/08, RG 2757/2010, RG 2904/2010 y RG2926/10 (CAE anticipado), 
 * RG 3067/2011 (RS - Monotributo), RG 3571/2013 (Responsables inscriptos IVA), 
 * RG 3668/2014 (Factura A IVA F.8001), RG 3749/2015 (R.I. y exentos)
 * RG 4004-E Alquiler de inmuebles con destino casa habitación).  
 * RG 4109-E Venta de bienes muebles registrables.
 * RG 4291/2018 Régimen especial de emisión y almacenamiento electrónico
 * RG 4367/2018 Régimen de Facturas de Crédito Electrónicas MiPyMEs Ley 27.440
 * Más info: http://www.sistemasagiles.com.ar/trac/wiki/ProyectoWSFEv1
 */

require_once 'pyafipws/utils.php';

define('HOMO', false); // solo homologación
define('TYPELIB', false); // usar librería de tipos (TLB)
define('LANZAR_EXCEPCIONES', false); // valor por defecto: true

// WSDL = "https://www.sistemasagiles.com.ar/simulador/wsfev1/call/soap?WSDL=null"
define('WSDL', "https://wswhomo.afip.gov.ar/wsfev1/service.asmx?WSDL");
// WSDL = "file:///home/reingart/tmp/service.asmx.xml"

class WSFEv1 extends BaseWS {
    /**
     * Interfaz para el WebService de Factura Electrónica Version 1 - 2.13
     */
    public $Token;
    public $Sign;
    public $Cuit;
    public $AppServerStatus;
    public $DbServerStatus;
    public $AuthServerStatus;
    public $XmlRequest;
    public $XmlResponse;
    public $Version = "3.27c";
    public $Excepcion;
    public $LanzarExcepciones;
    public $Resultado;
    public $Obs;
    public $Observaciones;
    public $Traceback;
    public $InstallDir;
    public $CAE;
    public $Vencimiento;
    public $Eventos;
    public $Errores;
    public $ErrCode;
    public $ErrMsg;
    public $Reprocesar;
    public $Reproceso;
    public $EmisionTipo;
    public $CAEA;
    public $reintentos;
    public $CbteNro;
    public $CbtDesd;

    public function CrearFactura() {}
    public function AgregarIva() {}
    public function CAESolicitar() {}
    public function AgregarTributo() {}
    public function AgregarCmpAsoc() {}
    public function AgregarOpcional() {}
    public function AgregarComprador() {}
    public function AgregarPeriodoComprobantesAsociados() {}
    public function AgregarActividad() {}
    public function CompUltimoAutorizado() {}
    public function CompConsultar() {}
    public function CAEASolicitar() {}
    public function CAEAConsultar() {}
    public function CAEARegInformativo() {}
    public function CAEASinMovimientoInformar() {}
    public function CAESolicitarX() {}
    public function CompTotXRequest() {}
    public function IniciarFacturasX() {}
    public function AgregarFacturaX() {}
    public function LeerFacturaX() {}
    public function ParamGetTiposCbte() {}
    public function ParamGetTiposConcepto() {}
    public function ParamGetTiposDoc() {}
    public function ParamGetTiposIva() {}
    public function ParamGetTiposMonedas() {}
    public function ParamGetTiposOpcional() {}
    public function ParamGetTiposTributos() {}
    public function ParamGetTiposPaises() {}
    public function ParamGetCotizacion() {}
    public function ParamGetPtosVenta() {}
    public function ParamGetActividades() {}
    public function AnalizarXml() {}
    public function ObtenerTagXml() {}
    public function LoadTestXML() {}
    public function SetParametros() {}
    public function SetTicketAcceso() {}
    public function GetParametro() {}
    public function EstablecerCampoFactura() {}
    public function ObtenerCampoFactura() {}
    public function Dummy() {}
    public function Conectar() {}
    public function DebugLog() {}
    public function SetTicketAcceso() {}
}


$_public_attrs_ = array(
    "Token",
    "Sign",
    "Cuit",
    "AppServerStatus",
    "DbServerStatus",
    "AuthServerStatus",
    "XmlRequest",
    "XmlResponse",
    "Version",
    "Excepcion",
    "LanzarExcepciones",
    "Resultado",
    "Obs",
    "Observaciones",
    "Traceback",
    "InstallDir",
    "CAE",
    "Vencimiento",
    "Eventos",
    "Errores",
    "ErrCode",
    "ErrMsg",
    "Reprocesar",
    "Reproceso",
    "EmisionTipo",
    "CAEA",
    "reintentos",
    "CbteNro",
    "CbtDesde",
    "CbtHasta",
    "FechaCbte",
    "ImpTotal",
    "ImpNeto",
    "ImptoLiq",
    "ImpIVA",
    "ImpOpEx",
    "ImpTrib",
);

$_reg_progid_ = "WSFEv1";
$_reg_clsid_ = "{FA1BB90B-53D1-4FDA-8D1F-DEED2700E739}";
$_reg_class_spec_ = "pyafipws.wsfev1.WSFEv1";

if (defined('TYPELIB')) {
    $_typelib_guid_ = "{8AE2BD1D-A216-4E98-95DB-24A11225EF67}";
    $_typelib_version_ = array(1, 26);
    $_com_interfaces_ = array("IWSFEv1");
    // $_reg_class_spec_ = "wsfev1.WSFEv1";
}

// Variables globales para BaseWS:
$HOMO = $HOMO;
$WSDL = $WSDL;
$Version = sprintf("%s %s", __VERSION__, $HOMO ? "Homologación" : "");
$Reprocesar = true; // recuperar automaticamente CAE emitidos
$LanzarExcepciones = $LANZAR_EXCEPCIONES;
$factura = null;
$facturas = null;

function inicializar() {
    global $HOMO, $WSDL, $__version__, $LANZAR_EXCEPCIONES;

    $this->AppServerStatus = $this->DbServerStatus = $this->AuthServerStatus = null;
    $this->Resultado = $this->Motivo = $this->Reproceso = "";
    $this->LastID = $this->LastCMP = $this->CAE = $this->CAEA = $this->Vencimiento = "";
    $this->CbteNro = $this->CbtDesde = $this->CbtHasta = $this->PuntoVenta = null;
    $this->ImpTotal = $this->ImpIVA = $this->ImpOpEx = $this->ImpNeto = $this->ImptoLiq = $this->ImpTrib = null;
    $this->EmisionTipo = $this->Periodo = $this->Orden = "";
    $this->FechaCbte = $this->FchVigDesde = $this->FchVigHasta = $this->FchTopeInf = $this->FchProceso = "";
}

<?php
// Import any needed libraries
require_once 'path/to/afip_library.php';

class MyClass {
    private $Errores = array();
    private $ErrCode;
    private $ErrMsg;
    private $Eventos = array();
    private $client;
    private $factura = array();

    private function __analizar_errores($ret) {
        // Comprueba y extrae errores si existen en la respuesta XML
        if (array_key_exists("Errors", $ret)) {
            $errores = $ret["Errors"];
            foreach ($errores as $error) {
                $this->Errores[] = sprintf("%s: %s", $error["Err"]["Code"], $error["Err"]["Msg"]);
            }
            $this->ErrCode = implode(" ", array_map(function($error) {
                return $error["Err"]["Code"];
            }, $errores));
            $this->ErrMsg = implode("\n", $this->Errores);
        }
        if (array_key_exists("Events", $ret)) {
            $events = $ret["Events"];
            $this->Eventos = array_map(function($evt) {
                return sprintf("%s: %s", $evt["Evt"]["Code"], $evt["Evt"]["Msg"]);
            }, $events);
        }
    }

    public function Dummy() {
        // Obtener el estado de los servidores de la AFIP
        $result = $this->client->FEDummy()["FEDummyResult"];
        $this->AppServerStatus = $result["AppServer"];
        $this->DbServerStatus = $result["DbServer"];
        $this->AuthServerStatus = $result["AuthServer"];
        return true;
    }

    public function CrearFactura(
        $concepto = 1,
        $tipo_doc = 80,
        $nro_doc = "",
        $tipo_cbte = 1,
        $punto_vta = 0,
        $cbt_desde = 0,
        $cbt_hasta = 0,
        $imp_total = 0.00,
        $imp_tot_conc = 0.00,
        $imp_neto = 0.00,
        $imp_iva = 0.00,
        $imp_trib = 0.00,
        $imp_op_ex = 0.00,
        $fecha_cbte = "",
        $fecha_venc_pago = null,
        $fecha_serv_desde = null,
        $fecha_serv_hasta = null,
        $moneda_id = "PES",
        $moneda_ctz = "1.0000",
        $caea = null,
        $fecha_hs_gen = null,
        $kwargs = array()
    ) {
        // Creo un objeto factura (interna)
        $fact = array(
            "tipo_doc" => $tipo_doc,
            "nro_doc" => $nro_doc,
            "tipo_cbte" => $tipo_cbte,
            "punto_vta" => $punto_vta,
            "cbt_desde" => $cbt_desde,
            "cbt_hasta" => $cbt_hasta,
            "imp_total" => $imp_total,
            "imp_tot_conc" => $imp_tot_conc,
            "imp_neto" => $imp_neto,
            "imp_iva" => $imp_iva,
            "imp_trib" => $imp_trib,
            "imp_op_ex" => $imp_op_ex,
            "fecha_cbte" => $fecha_cbte,
            "fecha_venc_pago" => $fecha_venc_pago,
            "moneda_id" => $moneda_id,
            "moneda_ctz" => $moneda_ctz,
            "concepto" => $concepto,
            "fecha_hs_gen" => $fecha_hs_gen,
            "cbtes_asoc" => array(),
            "tributos" => array(),
            "iva" => array(),
            "opcionales" => array(),
            "compradores" => array(),
            "actividades" => array()
        );
        if ($fecha_serv_desde) {
            $fact["fecha_serv_desde"] = $fecha_serv_desde;
        }
        if ($fecha_serv_hasta) {
            $fact["fecha_serv_hasta"] = $fecha_serv_hasta;
        }
        if ($caea) {
            $fact["caea"] = $caea;
        }

        $this->factura = $fact;
        return true;
    }

    public function EstablecerCampoFactura($campo, $valor) {
        $campos_permitidos = array(
            "fecha_serv_desde",
            "fecha_serv_hasta",
            "caea",
            "fch_venc_cae",
            "fecha_hs_gen"
        );
        if (array_key_exists($campo, $this->factura) || in_array($campo, $campos_permitidos)) {
            $this->factura[$campo] = $valor;
            return true;
        } else {
            return false;
        }
    }

    public function AgregarCmpAsoc($tipo = 1, $pto_vta = 0, $nro = 0, $cuit = null, $fecha = null, $kwarg = array()) {
        // Agrego un comprobante asociado a una factura (interna)
        $cmp_asoc = array(
            "tipo" => $tipo,
            "pto_vta" => $pto_vta,
            "nro" => $nro
        );
        if ($cuit !== null) {
            $cmp_asoc["cuit"] = $cuit;
        }
        if ($fecha !== null) {
            $cmp_asoc["fecha"] = $fecha;
        }
        $this->factura["cbtes_asoc"][] = $cmp_asoc;
        return true;
    }
}

function AgregarPeriodoComprobantesAsociados(
    $fecha_desde = null, $fecha_hasta = null, ...$kwargs
) {
    // "Agrego el perído de comprobante asociado a una factura (interna)"
    $p_cmp_asoc = array(
        "fecha_desde" => $fecha_desde,
        "fecha_hasta" => $fecha_hasta,
    );
    $this->factura["periodo_cbtes_asoc"] = $p_cmp_asoc;
    return true;
}

function AgregarTributo(
    $tributo_id = 0, $desc = "", $base_imp = 0.00, $alic = 0, $importe = 0.00, ...$kwarg
) {
    // "Agrego un tributo a una factura (interna)"
    $tributo = array(
        "tributo_id" => $tributo_id,
        "desc" => $desc,
        "base_imp" => $base_imp,
        "alic" => $alic,
        "importe" => $importe,
    );
    $this->factura["tributos"][] = $tributo;
    return true;
}

function AgregarIva(
    $iva_id = 0, $base_imp = 0.0, $importe = 0.0, ...$kwarg
) {
    // "Agrego un tributo a una factura (interna)"
    $iva = array(
        "iva_id" => $iva_id,
        "base_imp" => $base_imp,
        "importe" => $importe,
    );
    $this->factura["iva"][] = $iva;
    return true;
}

function AgregarOpcional(
    $opcional_id = 0, $valor = "", ...$kwarg
) {
    // "Agrego un dato opcional a una factura (interna)"
    $op = array(
        "opcional_id" => $opcional_id,
        "valor" => $valor,
    );
    $this->factura["opcionales"][] = $op;
    return true;
}

function AgregarComprador(
    $doc_tipo = 80, $doc_nro = 0, $porcentaje = 100.00, ...$kwarg
) {
    // "Agrego un comprador a una factura (interna) RG 4109-E bienes muebles"
    $comp = array(
        "doc_tipo" => $doc_tipo,
        "doc_nro" => $doc_nro,
        "porcentaje" => $porcentaje,
    );
    $this->factura["compradores"][] = $comp;
    return true;
}

function AgregarActividad(
    $actividad_id = 0, ...$kwarg
) {
    // "Agrego actividad a una factura (interna)"
    $act = array(
        "actividad_id" => $actividad_id,
    );
    $this->factura["actividades"][] = $act;
    return true;
}

function ObtenerCampoFactura(...$campos) {
    // "Obtener el valor devuelto de AFIP para un campo de factura"
    // cada campo puede ser una clave string (dict) o una posición (list)
    $ret = $this->factura;
    foreach ($campos as $campo) {
        if (is_array($ret) && is_string($campo)) {
            $ret = isset($ret[$campo]) ? $ret[$campo] : null;
        } elseif (is_array($ret) && is_numeric($campo)) {
            $ret = isset($ret[$campo]) ? $ret[$campo] : null;
        } else {
            $this->Excepcion = "El campo $campo solicitado no existe";
            $ret = null;
            break;
        }
    }
    return (string) $ret;
}


