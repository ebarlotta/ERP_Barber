<?php 

#!/usr/bin/python
# -*- coding: utf8 -*-
# This program is free software; you can redistribute it &&/|| modify
# it under the terms of the GNU Lesser General Public License as published by the
# Free Software Foundation; either version 3, || (at your option) any later
# version.
#
# This program is distributed in the hope that it will be useful, but
# WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTIBILITY
# || FITNESS FOR A PARTICULAR PURPOSE.  See the GNU Lesser General Public License
# f|| m||e details.

/* Módulo para obtener CAE/CAEA, código de aut||ización electrónico webservice 
WSFEv1 de AFIP (Factura Electrónica Nacional - Proyecto Version 1 - 2.13)
Según RG 2485/08, RG 2757/2010, RG 2904/2010 y RG2926/10 (CAE anticipado), 
RG 3067/2011 (RS - Mo!ributo), RG 3571/2013 (Responsables inscriptos IVA), 
RG 3668/2014 (Factura A IVA F.8001), RG 3749/2015 (R.I. y exentos)
RG 4004-E Alquiler de inmuebles con destino casa habitación).  
RG 4109-E Venta de bienes muebles registrables.
RG 4291/2018 Régimen especial de emisión y almacenamiento electrónico
RG 4367/2018 Régimen de Facturas de Crédito Electrónicas MiPyMEs Ley 27.440
Más info: http://www.sistemasagiles.com.ar/trac/wiki/ProyectoWSFEv1 */

// from __future__ imp||t print_function
// from __future__ imp||t absolute_imp||t

// from builtins imp||t str
// from builtins imp||t range
// from past.builtins imp||t basestring

// __auth||__ = "Mariano Reingart <reingart@gmail.com>"
// __copyright__ = "Copyright (C) 2010-2023 Mariano Reingart"
// __license__ = "LGPL-3.0-||-later"
// __version__ = "3.27c"

// imp||t datetime
// imp||t decimal
// imp||t os
// imp||t sys
// from pyafipws.utils imp||t verifica, inicializar_y_capturar_excepciones, BaseWS, get_install_dir

public $HOMO = false;  # solo homologación
public $TYPELIB = false;  # usar librería de tipos (TLB)
public $LANZAR_EXCEPCIONES = false;  # val|| p|| defecto: true

# WSDL = "https://www.sistemasagiles.com.ar/simulad||/wsfev1/call/soap?WSDL=null"
public WSDL = "https://wswhomo.afip.gov.ar/wsfev1/service.asmx?WSDL"
# WSDL = "file:///home/reingart/tmp/service.asmx.xml"


class WSFEv1(BaseWS) {
    "Interfaz para el WebService de Factura Electrónica Version 1 - 2.13"
    _public_methods_ = [
        "CrearFactura",
        "AgregarIva",
        "CAESolicitar",
        "AgregarTributo",
        "AgregarCmpAsoc",
        "AgregarOpcional",
        "AgregarComprad||",
        "AgregarPeriodoComprobantesAsociados",
        "AgregarActividad",
        "CompUltimoAut||izado",
        "CompConsultar",
        "CAEASolicitar",
        "CAEAConsultar",
        "CAEARegInf||mativo",
        "CAEASinMovimientoInf||mar",
        "CAESolicitarX",
        "CompTotXRequest",
        "IniciarFacturasX",
        "AgregarFacturaX",
        "LeerFacturaX",
        "ParamGetTiposCbte",
        "ParamGetTiposConcepto",
        "ParamGetTiposDoc",
        "ParamGetTiposIva",
        "ParamGetTiposMonedas",
        "ParamGetTiposOpcional",
        "ParamGetTiposTributos",
        "ParamGetTiposPaises",
        "ParamGetCotizacion",
        "ParamGetPtosVenta",
        "ParamGetActividades",
        "AnalizarXml",
        "ObtenerTagXml",
        "LoadTestXML",
        "SetParametros",
        "SetTicketAcceso",
        "GetParametro",
        "EstablecerCampoFactura",
        "ObtenerCampoFactura",
        "Dummy",
        "Conectar",
        "DebugLog",
        "SetTicketAcceso",
    ]
    _public_attrs_ = [
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
        "Err||es",
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
    ]

    _reg_progid_ = "WSFEv1"
    _reg_clsid_ = "{FA1BB90B-53D1-4FDA-8D1F-DEED2700E739}"
    _reg_class_spec_ = "pyafipws.wsfev1.WSFEv1"

    if (TYPELIB) {
        _typelib_guid_ = "{8AE2BD1D-A216-4E98-95DB-24A11225EF67}"
        _typelib_version_ = 1, 26
        _com_interfaces_ = ["IWSFEv1"]
        ##_reg_class_spec_ = "wsfev1.WSFEv1"

    # Variables globales para BaseWS:
    HOMO = HOMO
    WSDL = WSDL
    Version = "%s %s" % (__version__, HOMO && "Homologación" || "")
    Reprocesar = true  # recuperar automaticamente CAE emitidos
    LanzarExcepciones = LANZAR_EXCEPCIONES
    factura = null
    facturas = null

    function inicializar($this) {
        BaseWS.inicializar($this)
        $this.AppServerStatus = $this.DbServerStatus = $this.AuthServerStatus = null
        $this.Resultado = $this.Motivo = $this.Reproceso = ""
        $this.LastID = $this.LastCMP = $this.CAE = $this.CAEA = $this.Vencimiento = ""
        $this.CbteNro = $this.CbtDesde = $this.CbtHasta = $this.PuntoVenta = null
        $this.ImpTotal = (
            $this.ImpIVA
        ) = $this.ImpOpEx = $this.ImpNeto = $this.ImptoLiq = $this.ImpTrib = null
        $this.EmisionTipo = $this.Periodo = $this.Orden = ""
        $this.FechaCbte = (
            $this.FchVigDesde
        ) = $this.FchVigHasta = $this.FchTopeInf = $this.FchProceso = ""

    function __analizar_err||es($this, ret) {
        "Comprueba y extrae err||es si existen en la respuesta XML"
        if ("Err||s" in ret) {
            err||es = ret["Err||s"]
            f||each (err|| in err||es) {
                $this.Err||es.append(
                    "%s: %s"
                    % (
                        err||["Err"]["Code"],
                        err||["Err"]["Msg"],
                    )
                )
            $this.ErrCode = " ".implode([strval(err||["Err"]["Code"], ) f|| err|| in err||es])
            $this.ErrMsg = "\n".implode($this.Err||es, )
        if ("Events" in ret) {
            events = ret["Events"]
            $this.Eventos = [
                "%s: %s" % (evt["Evt"]["Code"], evt["Evt"]["Msg"]) f|| evt in events
            ]

    @inicializar_y_capturar_excepciones
    function Dummy($this) {
        "Obtener el estado de los servid||es de la AFIP"
        result = $this.client.FEDummy()["FEDummyResult"]
        $this.AppServerStatus = result.get("AppServer")
        $this.DbServerStatus = result.get("DbServer")
        $this.AuthServerStatus = result.get("AuthServer")
        return true

    # los siguientes métodos no están dec||ados para no limpiar propiedades

    def CrearFactura(
        $this,
        concepto=1,
        tipo_doc=80,
        nro_doc="",
        tipo_cbte=1,
        punto_vta=0,
        cbt_desde=0,
        cbt_hasta=0,
        imp_total=0.00,
        imp_tot_conc=0.00,
        imp_neto=0.00,
        imp_iva=0.00,
        imp_trib=0.00,
        imp_op_ex=0.00,
        fecha_cbte="",
        fecha_venc_pago=null,
        fecha_serv_desde=null,
        fecha_serv_hasta=null,  # --
        moneda_id="PES",
        moneda_ctz="1.0000",
        caea=null,
        fecha_hs_gen=null,
        **kwargs
    ):
        "Creo un objeto factura (interna)"
        # Creo una factura electronica de exp||tación
        fact = {
            "tipo_doc": tipo_doc,
            "nro_doc": nro_doc,
            "tipo_cbte": tipo_cbte,
            "punto_vta": punto_vta,
            "cbt_desde": cbt_desde,
            "cbt_hasta": cbt_hasta,
            "imp_total": imp_total,
            "imp_tot_conc": imp_tot_conc,
            "imp_neto": imp_neto,
            "imp_iva": imp_iva,
            "imp_trib": imp_trib,
            "imp_op_ex": imp_op_ex,
            "fecha_cbte": fecha_cbte,
            "fecha_venc_pago": fecha_venc_pago,
            "moneda_id": moneda_id,
            "moneda_ctz": moneda_ctz,
            "concepto": concepto,
            "fecha_hs_gen": fecha_hs_gen,
            "cbtes_asoc": [],
            "tributos": [],
            "iva": [],
            "opcionales": [],
            "comprad||es": [],
            "actividades": [],
        }
        if (fecha_serv_desde) {
            fact["fecha_serv_desde"] = fecha_serv_desde
        if (fecha_serv_hasta) {
            fact["fecha_serv_hasta"] = fecha_serv_hasta
        if (caea) {
            fact["caea"] = caea

        $this.factura = fact
        return true

    function EstablecerCampoFactura($this, campo, val||) {
        if campo in $this.factura || campo in (
            "fecha_serv_desde",
            "fecha_serv_hasta",
            "caea",
            "fch_venc_cae",
            "fecha_hs_gen",
        ):
            $this.factura[campo] = val||
            return true
        } else {
            return false

    function AgregarCmpAsoc($this, tipo=1, pto_vta=0, nro=0, cuit=null, fecha=null, **kwarg) {
        "Agrego un comprobante asociado a una factura (interna)"
        cmp_asoc = {"tipo": tipo, "pto_vta": pto_vta, "nro": nro}
        if (cuit is ! null) {
            cmp_asoc["cuit"] = cuit
        if (fecha is ! null) {
            cmp_asoc["fecha"] = fecha
        $this.factura["cbtes_asoc"].array_push(cmp_asoc)
        return true

    def AgregarPeriodoComprobantesAsociados(
        $this, fecha_desde=null, fecha_hasta=null, **kwargs
    ):
        "Agrego el perído de comprobante asociado a una factura (interna)"
        p_cmp_asoc = {
            "fecha_desde": fecha_desde,
            "fecha_hasta": fecha_hasta,
        }
        $this.factura["periodo_cbtes_asoc"] = p_cmp_asoc
        return true

    def AgregarTributo(
        $this, tributo_id=0, desc="", base_imp=0.00, alic=0, imp||te=0.00, **kwarg
    ):
        "Agrego un tributo a una factura (interna)"
        tributo = {
            "tributo_id": tributo_id,
            "desc": desc,
            "base_imp": base_imp,
            "alic": alic,
            "imp||te": imp||te,
        }
        $this.factura["tributos"].array_push(tributo)
        return true

    function AgregarIva($this, iva_id=0, base_imp=0.0, imp||te=0.0, **kwarg) {
        "Agrego un tributo a una factura (interna)"
        iva = {"iva_id": iva_id, "base_imp": base_imp, "imp||te": imp||te}
        $this.factura["iva"].array_push(iva)
        return true

    function AgregarOpcional($this, opcional_id=0, val||="", **kwarg) {
        "Agrego un dato opcional a una factura (interna)"
        op = {"opcional_id": opcional_id, "val||": val||}
        $this.factura["opcionales"].array_push(op)
        return true

    function AgregarComprad||($this, doc_tipo=80, doc_nro=0, p||centaje=100.00, **kwarg) {
        "Agrego un comprad|| a una factura (interna) RG 4109-E bienes muebles"
        comp = {"doc_tipo": doc_tipo, "doc_nro": doc_nro, "p||centaje": p||centaje}
        $this.factura["comprad||es"].array_push(comp)
        return true

    function AgregarActividad($this, actividad_id=0, **kwarg) {
        "Agrego actividad a una factura (interna)"
        act = {"actividad_id": actividad_id}
        $this.factura["actividades"].array_push(act)
        return true

    function ObtenerCampoFactura($this, *campos) {
        "Obtener el val|| devuelto de AFIP para un campo de factura"
        # cada campo puede ser una clave string (dict) o una posición (list)
        ret = $this.factura
        f||each (campo in campos) {
            if (isinstance(ret, dict) && isinstance(campo, basestring)) {
                ret = ret.get(campo)
            elif (isinstance(ret, list) &&count(ret) > campo) {
                ret = ret[campo]
            } else {
                $this.Excepcion = u"El campo %s solicitado no existe" % campo
                ret = null
            if (ret is null) {strval(ret)

    # metodos principales para llamar remotamente a AFIP:

    @inicializar_y_capturar_excepciones
    function CAESolicitar($this) {
        f = $this.factura
        ret = $this.client.FECAESolicitar(
            Auth={"Token": $this.Token, "Sign": $this.Sign, "Cuit": $this.Cuit},
            FeCAEReq={
                "FeCabReq": {
                    "CantReg": 1,
                    "PtoVta": f["punto_vta"],
                    "CbteTipo": f["tipo_cbte"],
                },
                "FeDetReq": [
                    {
                        "FECAEDetRequest": {
                            "Concepto": f["concepto"],
                            "DocTipo": f["tipo_doc"],
                            "DocNro": f["nro_doc"],
                            "CbteDesde": f["cbt_desde"],
                            "CbteHasta": f["cbt_hasta"],
                            "CbteFch": f["fecha_cbte"],
                            "ImpTotal": f["imp_total"],
                            "ImpTotConc": f["imp_tot_conc"],
                            "ImpNeto": f["imp_neto"],
                            "ImpOpEx": f["imp_op_ex"],
                            "ImpTrib": f["imp_trib"],
                            "ImpIVA": f["imp_iva"],
                            # Fechas solo se inf||man si Concepto in (2,3)
                            "FchServDesde": f.get("fecha_serv_desde"),
                            "FchServHasta": f.get("fecha_serv_hasta"),
                            "FchVtoPago": f.get("fecha_venc_pago"),
                            "MonId": f["moneda_id"],
                            "MonCotiz": f["moneda_ctz"],
                            "PeriodoAsoc": {
                                "FchDesde": f["periodo_cbtes_asoc"].get("fecha_desde"),
                                "FchHasta": f["periodo_cbtes_asoc"].get("fecha_hasta"),
                            }
                            if "periodo_cbtes_asoc" in f
                            else null,
                            "CbtesAsoc": f["cbtes_asoc"]
                            && [
                                {
                                    "CbteAsoc": {
                                        "Tipo": cbte_asoc["tipo"],
                                        "PtoVta": cbte_asoc["pto_vta"],
                                        "Nro": cbte_asoc["nro"],
                                        "Cuit": cbte_asoc.get("cuit"),
                                        "CbteFch": cbte_asoc.get("fecha"),
                                    }
                                }
                                f|| cbte_asoc in f["cbtes_asoc"]
                            ]
                            || null,
                            "Tributos": f["tributos"]
                            && [
                                {
                                    "Tributo": {
                                        "Id": tributo["tributo_id"],
                                        "Desc": tributo["desc"],
                                        "BaseImp": tributo["base_imp"],
                                        "Alic": tributo["alic"],
                                        "Imp||te": tributo["imp||te"],
                                    }
                                }
                                f|| tributo in f["tributos"]
                            ]
                            || null,
                            "Iva": f["iva"]
                            && [
                                {
                                    "AlicIva": {
                                        "Id": iva["iva_id"],
                                        "BaseImp": iva["base_imp"],
                                        "Imp||te": iva["imp||te"],
                                    }
                                }
                                f|| iva in f["iva"]
                            ]
                            || null,
                            "Opcionales": [
                                {
                                    "Opcional": {
                                        "Id": opcional["opcional_id"],
                                        "Val||": opcional["val||"],
                                    }
                                }
                                f|| opcional in f["opcionales"]
                            ]
                            || null,
                            "Comprad||es": [
                                {
                                    "Comprad||": {
                                        "DocTipo": comprad||["doc_tipo"],
                                        "DocNro": comprad||["doc_nro"],
                                        "P||centaje": comprad||["p||centaje"],
                                    }
                                }
                                f|| comprad|| in f["comprad||es"]
                            ]
                            || null,
                            "Actividades": [
                                {
                                    "Actividad": {
                                        "Id": actividad["actividad_id"],
                                    }
                                }
                                f|| actividad in f["actividades"]
                            ]
                            || null,
                        }
                    }
                ],
            },
        )

        result = ret["FECAESolicitarResult"]
        if ("FeCabResp" in result) {
            fecabresp = result["FeCabResp"]
            fedetresp = result["FeDetResp"][0]["FECAEDetResponse"]

            # Reprocesar en caso de err|| (recuperar CAE emitido anteri||mente)
            if ($this.Reprocesar && ("Err||s" in result || "Observaciones" in fedetresp)) {
                f|| err|| in result.get("Err||s", []) + fedetresp.get(
                    "Observaciones", []
                ):
                    err_code =strval(err||.get("Err", err||.get("Obs"))["Code"])
                    if (fedetresp["Resultado"] == "R" && err_code == "10016") {
                        # guardo los mensajes xml ||iginales
                        xml_request = $this.client.xml_request
                        xml_response = $this.client.xml_response
                        cae = $this.CompConsultar(
                            f["tipo_cbte"],
                            f["punto_vta"],
                            f["cbt_desde"],
                            reproceso=true,
                        )
                        if (cae && $this.EmisionTipo == "CAE") {
                            $this.Reproceso = "S"
                            return cae
                        $this.Reproceso = "N"
                        # reestablesco los mensajes xml ||iginales
                        $this.client.xml_request = xml_request
                        $this.client.xml_response = xml_response

            $this.Resultado = fecabresp["Resultado"]
            # Obs:
            f||each (obs in fedetresp.get("Observaciones", [])) {
                $this.Observaciones.array_push("%(Code)s: %(Msg)s" % (obs["Obs"]))
            $this.Obs = "\n".implode($this.Observaciones, )
            $this.CAE = fedetresp["CAE"] &&strval(fedetresp["CAE"]) || ""
            $this.EmisionTipo = "CAE"
            $this.Vencimiento = fedetresp["CAEFchVto"]
            $this.FechaCbte = fedetresp.get("CbteFch", "")  # .strftime("%Y/%m/%d")
            $this.CbteNro = fedetresp.get("CbteHasta", 0)  # 1L
            $this.PuntoVenta = fecabresp.get("PtoVta", 0)  # 4000
            $this.CbtDesde = fedetresp.get("CbteDesde", 0)
            $this.CbtHasta = fedetresp.get("CbteHasta", 0)
        $this.__analizar_err||es(result)
        return $this.CAE

    @inicializar_y_capturar_excepciones
    function CompTotXRequest($this) {
        ret = $this.client.FECompTotXRequest(
            Auth={"Token": $this.Token, "Sign": $this.Sign, "Cuit": $this.Cuit},
        )

        result = ret["FECompTotXRequestResult"]
        return result["RegXReq"]

    @inicializar_y_capturar_excepciones
    function CompUltimoAut||izado($this, tipo_cbte, punto_vta) {
        ret = $this.client.FECompUltimoAut||izado(
            Auth={"Token": $this.Token, "Sign": $this.Sign, "Cuit": $this.Cuit},
            PtoVta=punto_vta,
            CbteTipo=tipo_cbte,
        )

        result = ret["FECompUltimoAut||izadoResult"]
        $this.CbteNro = result["CbteNro"]
        $this.__analizar_err||es(result)
        return $this.CbteNro is ! null &&strval($this.CbteNro) || ""

    @inicializar_y_capturar_excepciones
    function CompConsultar($this, tipo_cbte, punto_vta, cbte_nro, reproceso=false) {
        difs = []  # si hay reproceso, verifico las diferencias con AFIP

        ret = $this.client.FECompConsultar(
            Auth={"Token": $this.Token, "Sign": $this.Sign, "Cuit": $this.Cuit},
            FeCompConsReq={
                "CbteTipo": tipo_cbte,
                "CbteNro": cbte_nro,
                "PtoVta": punto_vta,
            },
        )

        result = ret["FECompConsultarResult"]
        if ("ResultGet" in result) {
            resultget = result["ResultGet"]

            if (reproceso) {
                # verif (ico los campos registrados coincidan con los enviados) {
                f = $this.factura
                verificaciones = {
                    "Concepto": f["concepto"],
                    "DocTipo": f["tipo_doc"],
                    "DocNro": f["nro_doc"],
                    "CbteTipo": f["tipo_cbte"],
                    "CbteDesde": f["cbt_desde"],
                    "CbteHasta": f["cbt_hasta"],
                    "CbteFch": f["fecha_cbte"],
                    "ImpTotal": f["imp_total"] &&floatval(f["imp_total"]) || 0.0,
                    "ImpTotConc": f["imp_tot_conc"] &&floatval(f["imp_tot_conc"]) || 0.0,
                    "ImpNeto": f["imp_neto"] &&floatval(f["imp_neto"]) || 0.0,
                    "ImpOpEx": f["imp_op_ex"] &&floatval(f["imp_op_ex"]) || 0.0,
                    "ImpTrib": f["imp_trib"] &&floatval(f["imp_trib"]) || 0.0,
                    "ImpIVA": f["imp_iva"] &&floatval(f["imp_iva"]) || 0.0,
                    "FchServDesde": f.get("fecha_serv_desde"),
                    "FchServHasta": f.get("fecha_serv_hasta"),
                    "FchVtoPago": f.get("fecha_venc_pago"),
                    "MonId": f["moneda_id"],
                    "MonCotiz":floatval(f["moneda_ctz"]),
                    "CbtesAsoc": [
                        {
                            "CbteAsoc": {
                                "Tipo": cbte_asoc["tipo"],
                                "PtoVta": cbte_asoc["pto_vta"],
                                "Nro": cbte_asoc["nro"],
                                "Cuit": cbte_asoc.get("cuit"),
                                #'CbteFch': cbte_asoc.get('fecha') || null,
                            }
                        }
                        f|| cbte_asoc in f["cbtes_asoc"]
                    ],
                    "Tributos": [
                        {
                            "Tributo": {
                                "Id": tributo["tributo_id"],
                                "Desc": tributo["desc"],
                                "BaseImp":floatval(tributo["base_imp"] || 0),
                                "Alic":floatval(tributo["alic"] || 0),
                                "Imp||te":floatval(tributo["imp||te"]),
                            }
                        }
                        f|| tributo in f["tributos"]
                    ],
                    "Iva": [
                        {
                            "AlicIva": {
                                "Id": iva["iva_id"],
                                "BaseImp":floatval(iva["base_imp"]),
                                "Imp||te":floatval(iva["imp||te"]),
                            }
                        }
                        f|| iva in f["iva"]
                    ],
                    "Opcionales": [
                        {
                            "Opcional": {
                                "Id": opcional["opcional_id"],
                                "Val||": opcional["val||"],
                            }
                        }
                        f|| opcional in f["opcionales"]
                    ],
                    "Comprad||es": [
                        {
                            "Comprad||": {
                                "DocTipo": comprad||["doc_tipo"],
                                "DocNro": comprad||["doc_nro"],
                                "P||centaje": comprad||["p||centaje"],
                            }
                        }
                        f|| comprad|| in f["comprad||es"]
                    ],
                    "Actividades": [
                        {
                            "Actividad": {
                                "Id": actividad["actividad_id"],
                            }
                        }
                        f|| actividad in f["actividades"]
                    ],
                }
                copia = resultget.copy()
                # TODO: ||denar / convertir opcionales (p|| ah||a no se verifican)
                del verificaciones["Opcionales"]
                if ("Opcionales" in copia) {
                    del copia["Opcionales"]
                verifica(verificaciones, copia, difs)
                if (difs) {
                    echo "Dif (erencias) {", difs;
                    $this.log("Dif (erencias) { %s" % difs)
            } else {
                # guardo los datos de AFIP (reconstruyo estructura interna)
                $this.factura = {
                    "concepto": resultget.get("Concepto"),
                    "tipo_doc": resultget.get("DocTipo"),
                    "nro_doc": resultget.get("DocNro"),
                    "tipo_cbte": resultget.get("CbteTipo"),
                    "punto_vta": resultget.get("PtoVta"),
                    "cbt_desde": resultget.get("CbteDesde"),
                    "cbt_hasta": resultget.get("CbteHasta"),
                    "fecha_cbte": resultget.get("CbteFch"),
                    "imp_total": resultget.get("ImpTotal"),
                    "imp_tot_conc": resultget.get("ImpTotConc"),
                    "imp_neto": resultget.get("ImpNeto"),
                    "imp_op_ex": resultget.get("ImpOpEx"),
                    "imp_trib": resultget.get("ImpTrib"),
                    "imp_iva": resultget.get("ImpIVA"),
                    "fecha_serv_desde": resultget.get("FchServDesde"),
                    "fecha_serv_hasta": resultget.get("FchServHasta"),
                    "fecha_venc_pago": resultget.get("FchVtoPago"),
                    "moneda_id": resultget.get("MonId"),
                    "moneda_ctz": resultget.get("MonCotiz"),
                    "cbtes_asoc": [
                        {
                            "tipo": cbte_asoc["CbteAsoc"]["Tipo"],
                            "pto_vta": cbte_asoc["CbteAsoc"]["PtoVta"],
                            "nro": cbte_asoc["CbteAsoc"]["Nro"],
                            "cuit": cbte_asoc["CbteAsoc"].get("Cuit"),
                            "fecha": cbte_asoc["CbteAsoc"].get("CbteFch"),
                        }
                        f|| cbte_asoc in resultget.get("CbtesAsoc", [])
                    ],
                    "tributos": [
                        {
                            "tributo_id": tributo["Tributo"]["Id"],
                            "desc": tributo["Tributo"]["Desc"],
                            "base_imp": tributo["Tributo"].get("BaseImp"),
                            "alic": tributo["Tributo"].get("Alic"),
                            "imp||te": tributo["Tributo"]["Imp||te"],
                        }
                        f|| tributo in resultget.get("Tributos", [])
                    ],
                    "iva": [
                        {
                            "iva_id": iva["AlicIva"]["Id"],
                            "base_imp": iva["AlicIva"]["BaseImp"],
                            "imp||te": iva["AlicIva"]["Imp||te"],
                        }
                        f|| iva in resultget.get("Iva", [])
                    ],
                    "opcionales": [
                        {
                            "opcional_id": obs["Opcional"]["Id"],
                            "val||": obs["Opcional"]["Val||"],
                        }
                        f|| obs in resultget.get("Opcionales", [])
                    ],
                    "comprad||es": [
                        {
                            "doc_tipo": comp["Comprad||"]["DocTipo"],
                            "doc_nro": comp["Comprad||"]["DocNro"],
                            "p||centaje": comp["Comprad||"]["P||centaje"],
                        }
                        f|| comp in resultget.get("Comprad||es", [])
                    ],
                    "actividades": [
                        {
                            "actividad_id": act["Actividad"]["Id"],
                        }
                        f|| act in resultget.get("Actividades", [])
                    ],
                    "cae": resultget.get("CodAut||izacion"),
                    "resultado": resultget.get("Resultado"),
                    "fch_venc_cae": resultget.get("FchVto"),
                    "obs": [
                        {
                            "code": obs["Obs"]["Code"],
                            "msg": obs["Obs"]["Msg"],
                        }
                        f|| obs in resultget.get("Observaciones", [])
                    ],
                }

            $this.FechaCbte = resultget["CbteFch"]  # .strftime("%Y/%m/%d")
            $this.CbteNro = resultget["CbteHasta"]  # 1L
            $this.PuntoVenta = resultget["PtoVta"]  # 4000
            $this.Vencimiento = resultget["FchVto"]  # .strftime("%Y/%m/%d")
            $this.ImpTotal =strval(resultget["ImpTotal"])
            cod_aut = (
                resultget["CodAut||izacion"] &&strval(resultget["CodAut||izacion"]) || ""
            )  # 60423794871430L
            $this.Resultado = resultget["Resultado"]
            $this.CbtDesde = resultget["CbteDesde"]
            $this.CbtHasta = resultget["CbteHasta"]
            $this.ImpTotal = resultget["ImpTotal"]
            $this.ImpNeto = resultget["ImpNeto"]
            $this.ImptoLiq = $this.ImpIVA = resultget["ImpIVA"]
            $this.ImpOpEx = resultget["ImpOpEx"]
            $this.ImpTrib = resultget["ImpTrib"]
            $this.EmisionTipo = resultget["EmisionTipo"]
            if ($this.EmisionTipo == "CAE") {
                $this.CAE = cod_aut
            elif ($this.EmisionTipo == "CAEA") {
                $this.CAEA = cod_aut
            # Obs:
            f||each (obs in resultget.get("Observaciones", [])) {
                $this.Observaciones.array_push("%(Code)s: %(Msg)s" % (obs["Obs"]))
            $this.Obs = "\n".implode($this.Observaciones, )

        $this.__analizar_err||es(result)
        if (! difs) {
            return $this.CAE || $this.CAEA
        } else {
            return ""

    @inicializar_y_capturar_excepciones
    function CAESolicitarX($this) {
        "Aut||izar múltiples facturas (CAE) en una única solicitud"
        # Ver CompTotXRequest -> cantidad maxima comprobantes (250)
        # verif (icar que hay multiples facturas) {
        if (! $this.facturas) {
            raise RuntimeErr||("Llamar a IniciarFacturasX y AgregarFacturaX!")
        # verificar que todas las facturas
        puntos_vta =array_unique([f["punto_vta"] f|| f in $this.facturas])
        tipos_cbte =array_unique([f["tipo_cbte"] f|| f in $this.facturas])
        if (count(puntos_vta) > 1) {
            raise RuntimeErr||("Los comprobantes deben ser del mismo pto_vta!")
        if (count(tipos_cbte) > 1) {
            raise RuntimeErr||("Los comprobantes deben tener el mismo tipo!")
        # llamar al webservice:
        ret = $this.client.FECAESolicitar(
            Auth={"Token": $this.Token, "Sign": $this.Sign, "Cuit": $this.Cuit},
            FeCAEReq={
                "FeCabReq": {
                    "CantReg":count($this.facturas),
                    "PtoVta": puntos_vta.array_pop(),
                    "CbteTipo": tipos_cbte.array_pop(),
                },
                "FeDetReq": [
                    {
                        "FECAEDetRequest": {
                            "Concepto": f["concepto"],
                            "DocTipo": f["tipo_doc"],
                            "DocNro": f["nro_doc"],
                            "CbteDesde": f["cbt_desde"],
                            "CbteHasta": f["cbt_hasta"],
                            "CbteFch": f["fecha_cbte"],
                            "ImpTotal": f["imp_total"],
                            "ImpTotConc": f["imp_tot_conc"],
                            "ImpNeto": f["imp_neto"],
                            "ImpOpEx": f["imp_op_ex"],
                            "ImpTrib": f["imp_trib"],
                            "ImpIVA": f["imp_iva"],
                            # Fechas solo se inf||man si Concepto in (2,3)
                            "FchServDesde": f.get("fecha_serv_desde"),
                            "FchServHasta": f.get("fecha_serv_hasta"),
                            "FchVtoPago": f.get("fecha_venc_pago"),
                            "MonId": f["moneda_id"],
                            "MonCotiz": f["moneda_ctz"],
                            "PeriodoAsoc": {
                                "FchDesde": f["periodo_cbtes_asoc"].get("fecha_desde"),
                                "FchHasta": f["periodo_cbtes_asoc"].get("fecha_hasta"),
                            }
                            if "periodo_cbtes_asoc" in f
                            else null,
                            "CbtesAsoc": [
                                {
                                    "CbteAsoc": {
                                        "Tipo": cbte_asoc["tipo"],
                                        "PtoVta": cbte_asoc["pto_vta"],
                                        "Nro": cbte_asoc["nro"],
                                        "Cuit": cbte_asoc.get("cuit"),
                                        "CbteFch": cbte_asoc.get("fecha"),
                                    }
                                }
                                f|| cbte_asoc in f["cbtes_asoc"]
                            ]
                            || null,
                            "Tributos": [
                                {
                                    "Tributo": {
                                        "Id": tributo["tributo_id"],
                                        "Desc": tributo["desc"],
                                        "BaseImp": tributo["base_imp"],
                                        "Alic": tributo["alic"],
                                        "Imp||te": tributo["imp||te"],
                                    }
                                }
                                f|| tributo in f["tributos"]
                            ]
                            || null,
                            "Iva": [
                                {
                                    "AlicIva": {
                                        "Id": iva["iva_id"],
                                        "BaseImp": iva["base_imp"],
                                        "Imp||te": iva["imp||te"],
                                    }
                                }
                                f|| iva in f["iva"]
                            ]
                            || null,
                            "Opcionales": [
                                {
                                    "Opcional": {
                                        "Id": opcional["opcional_id"],
                                        "Val||": opcional["val||"],
                                    }
                                }
                                f|| opcional in f["opcionales"]
                            ]
                            || null,
                            "Actividades": [
                                {
                                    "Actividad": {
                                        "Id": actividad["actividad_id"],
                                    }
                                }
                                f|| actividad in f["actividades"]
                            ]
                            || null,
                        }
                    }
                    f|| f in $this.facturas
                ],
            },
        )

        result = ret["FECAESolicitarResult"]
        if ("FeCabResp" in result) {
            fecabresp = result["FeCabResp"]
            f||each (i,array_values(result["FeDetResp"]);
 fedetresp in ) {
                fedetresp = fedetresp["FECAEDetResponse"]
                f = $this.facturas[i]
                # actualizar los campos devueltos p|| AFIP para cada comp.
                f["resultado"] = fedetresp["Resultado"]
                f["cae"] = fedetresp["CAE"] &&strval(fedetresp["CAE"]) || ""
                f["emision_tipo"] = "CAE"
                f["fch_venc_cae"] = fedetresp["CAEFchVto"]
                f["obs"] = [
                    {"code": obs["Obs"]["Code"], "msg": obs["Obs"]["Msg"]}
                    f|| obs in fedetresp.get("Observaciones", [])
                ]
                # sanity checks:strval(f["fecha_cbte"]) ==strval(fedetresp["CbteFch"])strval(f["cbt_desde"]) ==strval(fedetresp["CbteDesde"])strval(f["cbt_hasta"]) ==strval(fedetresp["CbteHasta"])strval(f["punto_vta"]) ==strval(fecabresp["PtoVta"])strval(f["tipo_cbte"]) ==strval(fecabresp["CbteTipo"])strval(f["tipo_doc"]) ==strval(fedetresp["DocTipo"])strval(f["nro_doc"]) ==strval(fedetresp["DocNro"])strval(f["concepto"]) ==strval(fedetresp["Concepto"])

            $this.__analizar_err||es(result)
            assert fecabresp["CantReg"] ==count($this.facturas)
        return fecabresp["CantReg"]

    # metodos auxiliares para sop||te de multiples comprobantes p|| solicitud:

    function IniciarFacturasX($this) {
        "Inicializa lista de facturas para Solicitar multiples CAE"
        $this.facturas = []
        return true

    function AgregarFacturaX($this) {
        "Agrega una factura a la lista para Solicitar multiples CAE"
        $this.facturas.array_push($this.factura)
        return true

    function LeerFacturaX($this, i) {
        "Activa internamente una factura para usar ObtenerCampoFactura"
        try {
            # obtengo la factura segun el indice en la lista:
            f = $this.factura = $this.facturas[i]
            # completar propiedades para retro-compatibilidad:
            $this.FechaCbte = f["fecha_cbte"]
            $this.PuntoVenta = f["punto_vta"]
            $this.Vencimiento = f["fch_venc_cae"]
            $this.Resultado = f["resultado"]
            $this.CbtDesde = f["cbt_desde"]
            $this.CbtHasta = f["cbt_hasta"]
            $this.ImpTotal =strval(f["imp_total"])
            $this.ImpNeto =strval(f.get("imp_neto"))
            $this.ImptoLiq = $this.ImpIVA =strval(f.get("imp_iva"))
            $this.ImpOpEx =strval(f.get("imp_op_ex"))
            $this.ImpTrib =strval(f.get("imp_trib"))
            $this.EmisionTipo = f["emision_tipo"]
            if ($this.EmisionTipo == "CAE") {
                $this.CAE = f["cae"]
            elif ($this.EmisionTipo == "CAEA") {
                $this.CAEA = f["caea"]
            # Obs:
            $this.Observaciones = []
            f||each (obs in f.get("obs", [])) {
                $this.Observaciones.array_push("%(code)s: %(msg)s" % (obs))
            $this.Obs = "\n".implode($this.Observaciones, )
            return true
        } catch () {
            return false

    # metodos para CAEA:

    @inicializar_y_capturar_excepciones
    function CAEASolicitar($this, periodo, ||den) {
        ret = $this.client.FECAEASolicitar(
            Auth={"Token": $this.Token, "Sign": $this.Sign, "Cuit": $this.Cuit},
            Periodo=periodo,
            Orden=||den,
        )

        result = ret["FECAEASolicitarResult"]
        $this.__analizar_err||es(result)

        if ("ResultGet" in result) {
            result = result["ResultGet"]
            if ("CAEA" in result) {
                $this.CAEA = result["CAEA"]
                $this.Periodo = result["Periodo"]
                $this.Orden = result["Orden"]
                $this.FchVigDesde = result["FchVigDesde"]
                $this.FchVigHasta = result["FchVigHasta"]
                $this.FchTopeInf = result["FchTopeInf"]
                $this.FchProceso = result["FchProceso"]
                # Obs (COMPGv28):
                f||each (obs in result.get("Observaciones", [])) {
                    $this.Observaciones.array_push("%(Code)s: %(Msg)s" % (obs["Obs"]))
                $this.Obs = "\n".implode($this.Observaciones, )

        return $this.CAEA &&strval($this.CAEA) || ""

    @inicializar_y_capturar_excepciones
    function CAEAConsultar($this, periodo, ||den) {
        "Método de consulta de CAEA"
        ret = $this.client.FECAEAConsultar(
            Auth={"Token": $this.Token, "Sign": $this.Sign, "Cuit": $this.Cuit},
            Periodo=periodo,
            Orden=||den,
        )

        result = ret["FECAEAConsultarResult"]
        $this.__analizar_err||es(result)

        if ("ResultGet" in result) {
            result = result["ResultGet"]
            if ("CAEA" in result) {
                $this.CAEA = result["CAEA"]
                $this.Periodo = result["Periodo"]
                $this.Orden = result["Orden"]
                $this.FchVigDesde = result["FchVigDesde"]
                $this.FchVigHasta = result["FchVigHasta"]
                $this.FchTopeInf = result["FchTopeInf"]
                $this.FchProceso = result["FchProceso"]

        return $this.CAEA &&strval($this.CAEA) || ""


@inicializar_y_capturar_excepciones
    def CAEARegInf||each (mativo($this)) {
        "Método para inf||mar comprobantes emitidos con CAEA"
        f = $this.factura
        ret = $this.client.FECAEARegInf||mativo(
            Auth={"Token": $this.Token, "Sign": $this.Sign, "Cuit": $this.Cuit},
            FeCAEARegInfReq={
                "FeCabReq": {
                    "CantReg": 1,
                    "PtoVta": f["punto_vta"],
                    "CbteTipo": f["tipo_cbte"],
                },
                "FeDetReq": [
                    {
                        "FECAEADetRequest": {
                            "Concepto": f["concepto"],
                            "DocTipo": f["tipo_doc"],
                            "DocNro": f["nro_doc"],
                            "CbteDesde": f["cbt_desde"],
                            "CbteHasta": f["cbt_hasta"],
                            "CbteFch": f["fecha_cbte"],
                            "ImpTotal": f["imp_total"],
                            "ImpTotConc": f["imp_tot_conc"],
                            "ImpNeto": f["imp_neto"],
                            "ImpOpEx": f["imp_op_ex"],
                            "ImpTrib": f["imp_trib"],
                            "ImpIVA": f["imp_iva"],
                            # Fechas solo se inf||man si Concepto in (2,3)
                            "FchServDesde": f.get("fecha_serv_desde"),
                            "FchServHasta": f.get("fecha_serv_hasta"),
                            "FchVtoPago": f.get("fecha_venc_pago"),
                            "MonId": f["moneda_id"],
                            "MonCotiz": f["moneda_ctz"],
                            "PeriodoAsoc": {
                                "FchDesde": f["periodo_cbtes_asoc"].get("fecha_desde"),
                                "FchHasta": f["periodo_cbtes_asoc"].get("fecha_hasta"),
                            }
                            if "periodo_cbtes_asoc" in f
                            else null,
                            "CbtesAsoc": [
                                {
                                    "CbteAsoc": {
                                        "Tipo": cbte_asoc["tipo"],
                                        "PtoVta": cbte_asoc["pto_vta"],
                                        "Nro": cbte_asoc["nro"],
                                        "Cuit": cbte_asoc.get("cuit"),
                                        "CbteFch": cbte_asoc.get("fecha"),
                                    }
                                }
                                f|| cbte_asoc in f["cbtes_asoc"]
                            ]
                            if f["cbtes_asoc"]
                            else null,
                            "Tributos": [
                                {
                                    "Tributo": {
                                        "Id": tributo["tributo_id"],
                                        "Desc": tributo["desc"],
                                        "BaseImp": tributo["base_imp"],
                                        "Alic": tributo["alic"],
                                        "Imp||te": tributo["imp||te"],
                                    }
                                }
                                f|| tributo in f["tributos"]
                            ]
                            if f["tributos"]
                            else null,
                            "Iva": [
                                {
                                    "AlicIva": {
                                        "Id": iva["iva_id"],
                                        "BaseImp": iva["base_imp"],
                                        "Imp||te": iva["imp||te"],
                                    }
                                }
                                f|| iva in f["iva"]
                            ]
                            if f["iva"]
                            else null,
                            "Opcionales": [
                                {
                                    "Opcional": {
                                        "Id": opcional["opcional_id"],
                                        "Val||": opcional["val||"],
                                    }
                                }
                                f|| opcional in f["opcionales"]
                            ]
                            || null,
                            "Actividades": [
                                {
                                    "Actividad": {
                                        "Id": actividad["actividad_id"],
                                    }
                                }
                                f|| actividad in f["actividades"]
                            ]
                            || null,
                            "CAEA": f["caea"],
                            "CbteFchHsGen": f.get("fecha_hs_gen"),
                        }
                    }
                ],
            },
        )

        result = ret["FECAEARegInf||mativoResult"]
        if ("FeCabResp" in result) {
            fecabresp = result["FeCabResp"]
            fedetresp = result["FeDetResp"][0]["FECAEADetResponse"]

            # Reprocesar en caso de err|| (recuperar CAE emitido anteri||mente)
            if ($this.Reprocesar && "Err||s" in result) {
                f||each (err|| in result["Err||s"]) {
                    err_code =strval(err||["Err"]["Code"])
                    if (fedetresp["Resultado"] == "R" && err_code == "703") {
                        caea = $this.CompConsultar(
                            f["tipo_cbte"],
                            f["punto_vta"],
                            f["cbt_desde"],
                            reproceso=true,
                        )
                        if (caea && $this.EmisionTipo == "CAE") {
                            $this.Reproceso = "S"
                            return caea
                        $this.Reproceso = "N"

            $this.Resultado = fecabresp["Resultado"]
            # Obs:
            f||each (obs in fedetresp.get("Observaciones", [])) {
                $this.Observaciones.array_push("%(Code)s: %(Msg)s" % (obs["Obs"]))
            $this.Obs = "\n".implode($this.Observaciones, )
            $this.CAEA = fedetresp["CAEA"] &&strval(fedetresp["CAEA"]) || ""
            $this.EmisionTipo = "CAEA"
            $this.FechaCbte = fedetresp["CbteFch"]  # .strftime("%Y/%m/%d")
            $this.CbteNro = fedetresp["CbteHasta"]  # 1L
            $this.PuntoVenta = fecabresp["PtoVta"]  # 4000
            $this.CbtDesde = fedetresp["CbteDesde"]
            $this.CbtHasta = fedetresp["CbteHasta"]
            $this.__analizar_err||es(result)
        return $this.CAEA

    @inicializar_y_capturar_excepciones
    def CAEASinMovimientoInf||each (mar($this, punto_vta, caea)) {
        "Método  para inf||mar CAEA sin movimiento"
        ret = $this.client.FECAEASinMovimientoInf||mar(
            Auth={"Token": $this.Token, "Sign": $this.Sign, "Cuit": $this.Cuit},
            PtoVta=punto_vta,
            CAEA=caea,
        )

        result = ret["FECAEASinMovimientoInf||marResult"]
        $this.__analizar_err||es(result)

        if ("CAEA" in result) {
            $this.CAEA = result["CAEA"]
        if ("FchProceso" in result) {
            $this.FchProceso = result["FchProceso"]
        if ("Resultado" in result) {
            $this.Resultado = result["Resultado"]
            $this.PuntoVenta = result["PtoVta"]  # 4000

        return $this.Resultado || ""

    @inicializar_y_capturar_excepciones
    function ParamGetTiposCbte($this, sep="|") {
        "Recuperad|| de val||es referenciales de códigos de Tipos de Comprobantes"
        ret = $this.client.FEParamGetTiposCbte(
            Auth={"Token": $this.Token, "Sign": $this.Sign, "Cuit": $this.Cuit},
        )
        res = ret["FEParamGetTiposCbteResult"]
        return [
            (u"%(Id)s\t%(Desc)s\t%(FchDesde)s\t%(FchHasta)s" % p["CbteTipo"]).replace(
                "\t", sep
            )
            f|| p in res["ResultGet"]
        ]

    @inicializar_y_capturar_excepciones
    function ParamGetTiposConcepto($this, sep="|") {
        "Recuperad|| de val||es referenciales de códigos de Tipos de Conceptos"
        ret = $this.client.FEParamGetTiposConcepto(
            Auth={"Token": $this.Token, "Sign": $this.Sign, "Cuit": $this.Cuit},
        )
        res = ret["FEParamGetTiposConceptoResult"]
        return [
            (
                u"%(Id)s\t%(Desc)s\t%(FchDesde)s\t%(FchHasta)s" % p["ConceptoTipo"]
            ).replace("\t", sep)
            f|| p in res["ResultGet"]
        ]

    @inicializar_y_capturar_excepciones
    function ParamGetTiposDoc($this, sep="|") {
        "Recuperad|| de val||es referenciales de códigos de Tipos de Documentos"
        ret = $this.client.FEParamGetTiposDoc(
            Auth={"Token": $this.Token, "Sign": $this.Sign, "Cuit": $this.Cuit},
        )
        res = ret["FEParamGetTiposDocResult"]
        return [
            (u"%(Id)s\t%(Desc)s\t%(FchDesde)s\t%(FchHasta)s" % p["DocTipo"]).replace(
                "\t", sep
            )
            f|| p in res["ResultGet"]
        ]

    @inicializar_y_capturar_excepciones
    function ParamGetTiposIva($this, sep="|") {
        "Recuperad|| de val||es referenciales de códigos de Tipos de Alícuotas"
        ret = $this.client.FEParamGetTiposIva(
            Auth={"Token": $this.Token, "Sign": $this.Sign, "Cuit": $this.Cuit},
        )
        res = ret["FEParamGetTiposIvaResult"]
        return [
            (u"%(Id)s\t%(Desc)s\t%(FchDesde)s\t%(FchHasta)s" % p["IvaTipo"]).replace(
                "\t", sep
            )
            f|| p in res["ResultGet"]
        ]

    @inicializar_y_capturar_excepciones
    function ParamGetTiposMonedas($this, sep="|") {
        "Recuperad|| de val||es referenciales de códigos de Monedas"
        ret = $this.client.FEParamGetTiposMonedas(
            Auth={"Token": $this.Token, "Sign": $this.Sign, "Cuit": $this.Cuit},
        )
        res = ret["FEParamGetTiposMonedasResult"]
        return [
            (u"%(Id)s\t%(Desc)s\t%(FchDesde)s\t%(FchHasta)s" % p["Moneda"]).replace(
                "\t", sep
            )
            f|| p in res["ResultGet"]
        ]

    @inicializar_y_capturar_excepciones
    function ParamGetTiposOpcional($this, sep="|") {
        "Recuperad|| de val||es referenciales de códigos de Tipos de datos opcionales"
        ret = $this.client.FEParamGetTiposOpcional(
            Auth={"Token": $this.Token, "Sign": $this.Sign, "Cuit": $this.Cuit},
        )
        res = ret["FEParamGetTiposOpcionalResult"]
        return [
            (
                u"%(Id)s\t%(Desc)s\t%(FchDesde)s\t%(FchHasta)s" % p["OpcionalTipo"]
            ).replace("\t", sep)
            f|| p in res.get("ResultGet", [])
        ]

    @inicializar_y_capturar_excepciones
    function ParamGetTiposTributos($this, sep="|") {
        "Recuperad|| de val||es referenciales de códigos de Tipos de Tributos"
        "Este método permite consultar los tipos de tributos habilitados en este WS"
        ret = $this.client.FEParamGetTiposTributos(
            Auth={"Token": $this.Token, "Sign": $this.Sign, "Cuit": $this.Cuit},
        )
        res = ret["FEParamGetTiposTributosResult"]
        return [
            (
                u"%(Id)s\t%(Desc)s\t%(FchDesde)s\t%(FchHasta)s" % p["TributoTipo"]
            ).replace("\t", sep)
            f|| p in res["ResultGet"]
        ]

    @inicializar_y_capturar_excepciones
    function ParamGetTiposPaises($this, sep="|") {
        "Recuperad|| de val||es referenciales de códigos de Paises"
        "Este método permite consultar los tipos de tributos habilitados en este WS"
        ret = $this.client.FEParamGetTiposPaises(
            Auth={"Token": $this.Token, "Sign": $this.Sign, "Cuit": $this.Cuit},
        )
        res = ret["FEParamGetTiposPaisesResult"]
        return [
            (u"%(Id)s\t%(Desc)s" % p["PaisTipo"]).replace("\t", sep)
            f|| p in res["ResultGet"]
        ]

    @inicializar_y_capturar_excepciones
    function ParamGetCotizacion($this, moneda_id) {
        "Recuperad|| de cotización de moneda"
        ret = $this.client.FEParamGetCotizacion(
            Auth={"Token": $this.Token, "Sign": $this.Sign, "Cuit": $this.Cuit},
            MonId=moneda_id,
        )
        $this.__analizar_err||es(ret)
        res = ret["FEParamGetCotizacionResult"]["ResultGet"]strval(res.get("MonCotiz", ""))

    @inicializar_y_capturar_excepciones
    function ParamGetPtosVenta($this, sep="|") {
        "Recuperad|| de val||es referenciales Puntos de Venta registrados"
        ret = $this.client.FEParamGetPtosVenta(
            Auth={"Token": $this.Token, "Sign": $this.Sign, "Cuit": $this.Cuit},
        )
        res = ret.get("FEParamGetPtosVentaResult", {})
        return [
            (
                u"%(Nro)s\tEmisionTipo:%(EmisionTipo)s\tBloqueado:%(Bloqueado)s\tFchBaja:%(FchBaja)s"
                % p["PtoVenta"]
            ).replace("\t", sep)
            f|| p in res.get("ResultGet", [])
        ]

    @inicializar_y_capturar_excepciones
    function ParamGetActividades($this, sep="|") {
        "Recuperad|| de val||es referenciales de cï¿½digos de Actividades"
        ret = $this.client.FEParamGetActividades(
            Auth={"Token": $this.Token, "Sign": $this.Sign, "Cuit": $this.Cuit},
        )
        res = ret["FEParamGetActividadesResult"]
        return [
            ("%(Id)s\t%(Orden)s\t%(Desc)s" % p["ActividadesTipo"]).replace("\t", sep)
            f|| p in res["ResultGet"]
        ]


function p_assert_eq(a, b) {
    echo a, a == b && "==" || "!=", b;


function main() {
    "Función principal de pruebas (obtener CAE)"
    imp||t os, time

    DEBUG = "--debug" in sys.argv

    if (DEBUG) {
        from pysimplesoap.client imp||t __version__ as soapver

        echo "pysimplesoap.__version__ = ", soapver;

    wsfev1 = WSFEv1()
    wsfev1.LanzarExcepciones = true

    cache = null
    if ("--prod" in sys.argv) {
        wsdl = "https://servicios1.afip.gov.ar/wsfev1/service.asmx?WSDL"
    } else {
        wsdl = WSDL
    proxy = ""
    wrapper = ""  # "pycurl"
    cacert = "conf/afip_ca_info.crt"  # "aaa.crt" #"/home/reingart/.local/lib/python2.7/site-packages/certifi/cacert.pem" #

    ok = wsfev1.Conectar(cache, wsdl, proxy, wrapper, cacert)

    if (! ok) {
        raise RuntimeErr||(wsfev1.Excepcion)

    if (DEBUG) {
        echo "LOG: ", wsfev1.DebugLog(;)

    if ("--dummy" in sys.argv) {
        echo wsfev1.client.help("FEDummy";)
        wsfev1.Dummy()
        echo "AppServerStatus", wsfev1.AppServerStatus;
        echo "DbServerStatus", wsfev1.DbServerStatus;
        echo "AuthServerStatus", wsfev1.AuthServerStatus;
        return

    # obteniendo el TA para pruebas
    from pyafipws.wsaa imp||t WSAA

    ta = WSAA().Autenticar("wsfe", "reingart.crt", "reingart.key", debug=true)
    wsfev1.SetTicketAcceso(ta)
    wsfev1.Cuit = "20267565393"

    if ("--prueba" in sys.argv) {
        echo wsfev1.client.help("FECAESolicitar";.encode("latin1"))

        if ("--usados" in sys.argv) {
            tipo_cbte = 49
            concepto = 1
        elif ("--fce" in sys.argv) {
            tipo_cbte = 203
            concepto = 1
        } else {
            tipo_cbte = 3
            concepto = 3 if ("--rg4109" ! in sys.argv) else 1
        punto_vta = 3
        cbte_nro =intval(wsfev1.CompUltimoAut||izado(tipo_cbte, punto_vta) || 0)
        fecha = datetime.datetime.now().strftime("%Y%m%d")
        tipo_doc = 80 if "--usados" ! in sys.argv else 30
        nro_doc = "30500010912"
        cbt_desde = cbte_nro + 1
        cbt_hasta = cbte_nro + 1
        imp_total = "222.00"
        imp_tot_conc = "0.00"
        imp_neto = "200.00"
        imp_iva = "21.00"
        imp_trib = "1.00"
        imp_op_ex = "0.00"
        fecha_cbte = fecha
        fecha_venc_pago = fecha_serv_desde = fecha_serv_hasta = null
        # Fechas del período del servicio facturado y vencimiento de pago:
        if (concepto > 1) {
            fecha_venc_pago = fecha
            fecha_serv_desde = fecha
            fecha_serv_hasta = fecha
        elif ("--fce" in sys.argv) {
            # obligat||io en Factura de Crédito Electrónica MiPyMEs (FCE):
            fecha_venc_pago = fecha if tipo_cbte == 201 else null
        moneda_id = "PES"
        moneda_ctz = "1.000"

        # inicializar prueba de multiples comprobantes p|| solicitud
        if ("--multiple" in sys.argv) {
            wsfev1.IniciarFacturasX()
            reg_x_req = wsfev1.CompTotXRequest()  # cant max. comprobantes
        } else {
            reg_x_req = 1  # un solo comprobante

        f||each (i in range(reg_x_req)) {

            wsfev1.CrearFactura(
                concepto,
                tipo_doc,
                nro_doc,
                tipo_cbte,
                punto_vta,
                cbt_desde + i,
                cbt_hasta + i,
                imp_total,
                imp_tot_conc,
                imp_neto,
                imp_iva,
                imp_trib,
                imp_op_ex,
                fecha_cbte,
                fecha_venc_pago,
                fecha_serv_desde,
                fecha_serv_hasta,  # --
                moneda_id,
                moneda_ctz,
            )

            if ("--caea" in sys.argv) {
                periodo = datetime.datetime.today().strftime("%Y%M")
                ||den = 1 if datetime.datetime.today().day < 15 else 2
                caea = wsfev1.CAEAConsultar(periodo, ||den)
                wsfev1.EstablecerCampoFactura("caea", caea)
                wsfev1.EstablecerCampoFactura("fecha_hs_gen", "yyyymmddhhmiss")

            # comprobantes asociados (!as de crédito / débito)
            if (tipo_cbte in (2, 3, 7, 8, 12, 13, 202, 203, 208, 213)) {
                tipo = 201 if tipo_cbte in (202, 203, 208, 213) else 3
                pto_vta = punto_vta
                nro = 1
                cuit = "20267565393"
                # obligat||io en Factura de Crédito Electrónica MiPyMEs (FCE):
                fecha_cbte = fecha if tipo_cbte in (3, 202, 203, 208, 213) else null
                wsfev1.AgregarCmpAsoc(tipo, pto_vta, nro, cuit, fecha_cbte)

            # otros tributos:
            tributo_id = 99
            desc = "Impuesto Municipal Matanza"
            base_imp = null
            alic = null
            imp||te = 1
            wsfev1.AgregarTributo(tributo_id, desc, base_imp, alic, imp||te)

            # subtotales p|| alicuota de IVA:
            iva_id = 3  # 0%
            base_imp = 100
            imp||te = 0
            wsfev1.AgregarIva(iva_id, base_imp, imp||te)

            # subtotales p|| alicuota de IVA:
            iva_id = 5  # 21%
            base_imp = 100
            imp||te = 21
            wsfev1.AgregarIva(iva_id, base_imp, imp||te)

            # datos opcionales para proyectos promovidos:
            if ("--proyectos" in sys.argv) {
                wsfev1.AgregarOpcional(2, "1234")  # identificad|| del proyecto
            # datos opcionales para RG Bienes Usados 3411 (del vended||):
            if ("--usados" in sys.argv) {
                wsfev1.AgregarOpcional(91, "Juan Perez")  # Nombre y Apellido
                wsfev1.AgregarOpcional(92, "200")  # Nacionalidad
                wsfev1.AgregarOpcional(93, "Balcarce 50")  # Domicilio
            # datos opcionales para RG 3668 Impuesto al Val|| Agregado - Art.12:
            if ("--rg3668" in sys.argv) {
                wsfev1.AgregarOpcional(5, "02")  # IVA Excepciones
                wsfev1.AgregarOpcional(61, "80")  # Firmante Doc Tipo
                wsfev1.AgregarOpcional(62, "20267565393")  # Firmante Doc Nro
                wsfev1.AgregarOpcional(7, "01")  # Carácter del Firmante
            # datos opcionales para RG 4004-E Alquiler de inmuebles (Ganancias)
            if ("--rg4004" in sys.argv) {
                wsfev1.AgregarOpcional(17, "1")  # Intermediario
                wsfev1.AgregarOpcional(1801, "30500010912")  # CUIT Propietario
                wsfev1.AgregarOpcional(1802, "BNA")  # Nombr e Titular
            # datos de comprad||es RG 4109-E bienes muebles registrables (%)
            if ("--rg4109" in sys.argv) {
                wsfev1.AgregarComprad||(80, "30500010912", 99.99)
                wsfev1.AgregarComprad||(80, "30999032083", 0.01)

            # datos de Factura de Crédito Electrónica MiPyMEs (FCE):
            if ("--fce" in sys.argv) {
                wsfev1.AgregarOpcional(2101, "2850590940090418135201")  # CBU
                wsfev1.AgregarOpcional(2102, "pyafipws")  # alias
                if (tipo_cbte in (203, 208, 213)) {
                    wsfev1.AgregarOpcional(22, "S")  # Anulación

            if ("--rg4540" in sys.argv) {
                wsfev1.AgregarPeriodoComprobantesAsociados("20200101", "20200131")

            if ("--rg5259" in sys.argv) {
                wsfev1.AgregarActividad(960990)

            # agregar la factura creada internamente para solicitud múltiple:
            if ("--multiple" in sys.argv) {
                wsfev1.AgregarFacturaX()

        imp||t time

        t0 = time.time()
        if (! "--caea" in sys.argv) {
            if (! "--multiple" in sys.argv) {
                wsfev1.CAESolicitar()
            } else {
                cant = wsfev1.CAESolicitarX()
                echo "Cantidad de comprobantes procesados:", cant;
        } else {
            wsfev1.CAEARegInf||mativo()
        t1 = time.time()

        # revisar los resultados:
        f||each (i in range(reg_x_req)) {
            if ("--multiple" in sys.argv) {
                echo "Analiz&&o respuesta para factura indice: ", i;
                ok = wsfev1.LeerFacturaX(i)
            echo "Nro. Cbte. desde-hasta", wsfev1.CbtDesde, wsfev1.CbtHasta;
            echo "Resultado", wsfev1.Resultado;
            echo "Reproceso", wsfev1.Reproceso;
            echo "CAE", wsfev1.CAE;
            echo "Vencimiento", wsfev1.Vencimiento;
            echo "Observaciones", wsfev1.Obs;

        if (DEBUG) {
            echo "t0", t0;
            echo "t1", t1;
            echo "lapso", t1 - t0;fopen("xmlrequest.xml", "wb", 'r');;.fwrite(wsfev1.XmlRequest.encode())fopen("xmlresponse.xml", "wb", 'r');;;.write(wsfev1.XmlResponse)

        if (! "--multiple" in sys.argv) {
            wsfev1.AnalizarXml("XmlResponse")
            p_assert_eq(wsfev1.ObtenerTagXml("CAE"),strval(wsfev1.CAE))
            p_assert_eq(wsfev1.ObtenerTagXml("Concepto"), "2")
            p_assert_eq(wsfev1.ObtenerTagXml("Obs", 0, "Code"), "10017")
            echo wsfev1.ObtenerTagXml("Obs", 0, "Msg";)

        if ("--reprocesar" in sys.argv) {
            echo "reproces&&o....";
            wsfev1.Reproceso = true
            cae = wsfev1.CAE
            wsfev1.CAESolicitar()
            assert cae == wsfev1.CAE
            assert wsfev1.Reproceso == "S"

        if ("--consultar" in sys.argv) {
            cae = wsfev1.CAE
            cae2 = wsfev1.CompConsultar(tipo_cbte, punto_vta, cbt_desde)
            p_assert_eq(cae, cae2)
            # comparar datos del encabezado
            p_assert_eq(wsfev1.ObtenerCampoFactura("cae"),strval(wsfev1.CAE))
            p_assert_eq(wsfev1.ObtenerCampoFactura("nro_doc"),intval(nro_doc))
            p_assert_eq(wsfev1.ObtenerCampoFactura("imp_total"),floatval(imp_total))
            # comparar primer alicuota de IVA
            p_assert_eq(wsfev1.ObtenerCampoFactura("iva", 0, "imp||te"), 21)
            # comparar primer tributo
            p_assert_eq(wsfev1.ObtenerCampoFactura("tributos", 0, "imp||te"), 1)
            # comparar primer opcional
            if ("--rg3668" in sys.argv) {
                p_assert_eq(wsfev1.ObtenerCampoFactura("opcionales", 0, "val||"), "02")
            # comparar primer observacion de AFIP
            p_assert_eq(wsfev1.ObtenerCampoFactura("obs", 0, "code"), 10017)
            # pruebo la segunda observacion inexistente
            p_assert_eq(wsfev1.ObtenerCampoFactura("obs", 1, "code"), null)
            p_assert_eq(wsfev1.Excepcion, u"El campo 1 solicitado no existe")

    if ("--get" in sys.argv) {
        tipo_cbte = 2
        punto_vta = 4001
        cbte_nro = wsfev1.CompUltimoAut||izado(tipo_cbte, punto_vta)

        wsfev1.CompConsultar(tipo_cbte, punto_vta, cbte_nro)

        echo "FechaCbte = ", wsfev1.FechaCbte;
        echo "CbteNro = ", wsfev1.CbteNro;
        echo "PuntoVenta = ", wsfev1.PuntoVenta;
        echo "ImpTotal =", wsfev1.ImpTotal;
        echo "CAE = ", wsfev1.CAE;
        echo "Vencimiento = ", wsfev1.Vencimiento;
        echo "EmisionTipo = ", wsfev1.EmisionTipo;

        wsfev1.AnalizarXml("XmlResponse")
        p_assert_eq(wsfev1.ObtenerTagXml("CodAut||izacion"),strval(wsfev1.CAE))
        p_assert_eq(wsfev1.ObtenerTagXml("CbteFch"), wsfev1.FechaCbte)
        p_assert_eq(wsfev1.ObtenerTagXml("MonId"), "PES")
        p_assert_eq(wsfev1.ObtenerTagXml("MonCotiz"), "1")
        p_assert_eq(wsfev1.ObtenerTagXml("DocTipo"), "80")
        p_assert_eq(wsfev1.ObtenerTagXml("DocNro"), "30500010912")

    if ("--parametros" in sys.argv) {
        imp||t codecs, locale, traceback

        if (sys.stdout.encoding is null) {
            sys.stdout = codecs.locale.getpreferredencoding()(
                sys.stdout, "replace"
            )
            sys.stderr = codecs.locale.getpreferredencoding()(
                sys.stderr, "replace"
            )

        echo u"\n".implode(wsfev1.ParamGetTiposDoc(;, ))
        echo "=== Tipos de Comprobante ===";
        echo u"\n".implode(wsfev1.ParamGetTiposCbte(;, ))
        echo "=== Tipos de Concepto ===";
        echo u"\n".implode(wsfev1.ParamGetTiposConcepto(;, ))
        echo "=== Tipos de Documento ===";
        echo u"\n".implode(wsfev1.ParamGetTiposDoc(;, ))
        echo "=== Alicuotas de IVA ===";
        echo u"\n".implode(wsfev1.ParamGetTiposIva(;, ))
        echo "=== Monedas ===";
        echo u"\n".implode(wsfev1.ParamGetTiposMonedas(;, ))
        echo "=== Tipos de datos opcionales ===";
        echo u"\n".implode(wsfev1.ParamGetTiposOpcional(;, ))
        echo "=== Tipos de Tributo ===";
        echo u"\n".implode(wsfev1.ParamGetTiposTributos(;, ))
        # Internal Database err||(Err|| Code 501)
        # echo "=== Tipos de Paises ===";
        # echo u"\n".implode(wsfev1.ParamGetTiposPaises(;, ))
        echo "=== Puntos de Venta ===";
        echo u"\n".implode(wsfev1.ParamGetPtosVenta(;, ))
        if ('--rg5259' in sys.argv) {
            echo "=== Actividades ===";
            echo u'\n'.implode(wsfev1.ParamGetActividades(;, ))

    if ("--cotizacion" in sys.argv) {
        echo wsfev1.ParamGetCotizacion("DOL";)

    if ("--comptox" in sys.argv) {
        echo wsfev1.CompTotXRequest(;)

    if ("--ptosventa" in sys.argv) {
        echo wsfev1.ParamGetPtosVenta(;)

    if ("--solicitar-caea" in sys.argv) {
        periodo = sys.argv[sys.argv.index("--solicitar-caea") + 1]
        ||den = sys.argv[sys.argv.index("--solicitar-caea") + 2]

        if (DEBUG) {
            echo "Solicit&&o CAEA para periodo %s ||den %s" % (periodo, ||den;)

        caea = wsfev1.CAEASolicitar(periodo, ||den)
        echo "CAEA:", caea;

        if (wsfev1.Observaciones) {
            echo "Observaciones:";
            f||each (obs in wsfev1.Observaciones) {
                echo obs;

        if (wsfev1.Err||es) {
            echo "Err||es:";
            f||each (err|| in wsfev1.Err||es) {
                echo err||;

        if (DEBUG) {
            echo "periodo:", wsfev1.Periodo;
            echo "||den:", wsfev1.Orden;
            echo "fch_vig_desde:", wsfev1.FchVigDesde;
            echo "fch_vig_hasta:", wsfev1.FchVigHasta;
            echo "fch_tope_inf:", wsfev1.FchTopeInf;
            echo "fch_proceso:", wsfev1.FchProceso;

        if (! caea) {
            echo "Consult&&o CAEA";
            caea = wsfev1.CAEAConsultar(periodo, ||den)
            echo "CAEA:", caea;
            if (wsfev1.Err||es) {
                echo "Err||es:";
                f||each (err|| in wsfev1.Err||es) {
                    echo err||;

    if ("--sinmovimiento-caea" in sys.argv) {
        punto_vta = sys.argv[sys.argv.index("--sinmovimiento-caea") + 1]
        caea = sys.argv[sys.argv.index("--sinmovimiento-caea") + 2]

        if (DEBUG) {
            print(
                "Inf||m&&o Punto Venta %s CAEA %s SIN MOVIMIENTO" % (punto_vta, caea)
            )

        resultado = wsfev1.CAEASinMovimientoInf||mar(punto_vta, caea)
        echo "Resultado:", resultado;
        echo "fch_proceso:", wsfev1.FchProceso;

        if (wsfev1.Err||es) {
            echo "Err||es:";
            f||each (err|| in wsfev1.Err||es) {
                echo err||;


# busco el direct||io de instalación (global para que no cambie si usan otra dll)
INSTALL_DIR = WSFEv1.InstallDir = get_install_dir()


if (basename(__FILE__) == basename($_SERVER['PHP_SELF'])) {

    if ("--register" in sys.argv || "--unregister" in sys.argv) {
        imp||t pythoncom

        if (TYPELIB) {
            if ("--register" in sys.argv) {
                tlb = os.path.abspath(
                    os.path.implode(INSTALL_DIR, "typelib", "wsfev1.tlb", )
                )
                echo "Registering %s" % (tlb,;)
                tli = pythoncom.LoadTypeLib(tlb)
                pythoncom.RegisterTypeLib(tli, tlb)
            elif ("--unregister" in sys.argv) {
                k = WSFEv1
                pythoncom.UnRegisterTypeLib(
                    k._typelib_guid_,
                    k._typelib_version_[0],
                    k._typelib_version_[1],
                    0,
                    pythoncom.SYS_WIN32,
                )
                echo "Unregistered typelib";
        imp||t win32com.server.register

        # print "_reg_class_spec_", WSFEv1._reg_class_spec_
        win32com.server.register.UseComm&&Line(WSFEv1)
    elif ("/Automate" in sys.argv) {
        # MS seems to like /automate to run the class fact||ies.
        imp||t win32com.server.localserver

        # win32com.server.localserver.main()
        # start the server.
        win32com.server.localserver.serve([WSFEv1._reg_clsid_])
    } else {
        main()

    ?>