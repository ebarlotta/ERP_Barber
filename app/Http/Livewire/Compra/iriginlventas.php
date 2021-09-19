<?
session_start();
require_once("../ajax/xajaxcore/xajax.inc.php");
include_once("stringconexion.inc");
include_once("librerias.php");
try {
	$pdo = new PDO('mysql:host=localhost;dbname=barl83_barlotta', $_SESSION['user'], $_SESSION['password']);
} catch (Exception $e) {
	echo '<script language="javascript">window.location="../sistema/index.php"</script>';
}
//$link = mysql_connect ("localhost", $_SESSION['user'], $_SESSION['password']) or die ("No se puede conectar a la Base de Datos");
//$pdo = new PDO('mysql:host=127.0.0.1;dbname=barl83_barlotta', $_SESSION['user'], $_SESSION['password']);

function CargarDatosComprobante($Campos) {
	$objResponse = new xajaxResponse();
// $mysqli = new mysqli("localhost", $_SESSION['user'], $_SESSION['password'], "barl83_barlotta") or die ("No se puede conectar a la Base de Datos");
	$pieces = explode("  ", $Campos);
	//$sSql="SELECT * FROM ViewComprobantesVentas WHERE FechaComp='".$pieces[0]."' and NroComp='".$pieces[1]."' and CuitComp='".$pieces[2]."'";
	$sSql="SELECT * FROM ViewComprobantesVentas WHERE IdComp=".$Campos; // and NroComp='".$pieces[1]."' and CuitComp='".$pieces[2]."'";
// 	$stmt = $mysqli->prepare($sSql);
// 	$stmt->execute();
// 	$stmt->bind_result($Cuit);
// 	$row->fetch();
 	$stmt =  $GLOBALS['pdo']->prepare($sSql); $stmt->execute();
//  	$result = mysql_db_query($_SESSION['db'],$sSql);
//  	$objResponse->alert($sSql);
//  	while($row = mysql_fetch_array($result)) { 
	$row=$stmt->fetch();
		$objResponse->assign("Fecha","value",$row[FechaComp]);
		$objResponse->assign("txtCuitProveedores","value",$row[CuitComp]);
		$objResponse->assign("Comprobante","value",$row[NroComp]);
		$objResponse->assign("Detalle","value",$row[DetalleComp]);
		$objResponse->assign("Anio","value",$row[Anio]);
		$objResponse->assign("ParticIva","value",$row[ParticipaEnIva]);
		$objResponse->assign("PasadoEnMes","value",$row[PasadoEnMes]);
		$objResponse->assign("Areas","value",$row[DescripcionAreas]);
		$objResponse->assign("Cuentas","value",$row[DescripcionCuentas]);
		$objResponse->assign("Bruto","value",$row[BrutoComp]);
		$objResponse->assign("Iva","value",$row[IvaComp]);
		$objResponse->assign("Exento","value",$row[ExentoComp]);
		$objResponse->assign("ImpInterno","value",$row[ImpInternoComp]);
		$objResponse->assign("PercIva","value",$row[PercepcionIvaComp]);
		$objResponse->assign("Neto","value",$row[NetoComp]);
		$objResponse->assign("MontoPagado","value",$row[MontoPagadoComp]);
		$objResponse->assign("PagosParcial","value","falta");
		$objResponse->assign("cmbProveedores","value",$row[NombreProveedor]);
		$objResponse->assign("CantLitros","value",$row[CantidadLitroComp]); 

		$objResponse->assign("VartxtFecha","value",$row[FechaComp]);
		$objResponse->assign("VarComprobante","value",$row[NroComp]);
		$objResponse->assign("VartxtCuitProveedores","value",$row[CuitComp]);
		
		$objResponse->assign("IdComp","value",$row[IdComp]);

		//$objResponse->assign("cmbEmpresas","value",$row[Empresa]);
// 	} 
	return $objResponse;
}
// function CargarCombo($Combo,$tabla,$campo,$sql,$EnDiv,$Primero,$Eventos,$LongCombo,$Impreso) {
// // $mysqli = new mysqli("localhost", $_SESSION['user'], $_SESSION['password'], "barl83_barlotta") or die ("No se puede conectar a la Base de Datos");
// //Combo es el nombre del control donde se van a asignar los datos recuperados
// //Tabla es la tabla de la base de datos que vamos a recorrer para encontrar los datos
// //Campo es el campo dentro de la tabla en el que queremos buscar datos. Experimental: Se pueden colocar varios campos separados por comas
// //SQL es la instrucciÃ³n Sql si se quiere filtrar los datos, se puede o no pasar como parÃ¡metros, es decir es opcional
// //EnDiv es el nombre del control DIV donde vamos a asignar todo el Html del combo que queremos mostrar. Es el Id del div
// //Primero es el valor que queremos que aparezca como valor por defecto, puede ser blanco.
// //Eventos: lista de los eventos y parÃ¡metros de los mismos para ser cargados en el html del control antes de ser enviados
// 	if (substr(strtoupper($campo),0,8)=="DISTINCT") { $dist=" DISTINCT "; $campo=substr(strtoupper($campo),9); }
// 	if ($sql<>"") {	$sSql="SELECT ".$dist.$campo." FROM ".$tabla." WHERE ".$sql; } else { $sSql="SELECT ".$dist.$campo." FROM ".$tabla; }
// 	$AUX='<SELECT id="' . $Combo . '" name="' . $Combo . '" ' . $Eventos . ' style="max-width : '.$LongCombo.'px;">';
// 	if ($Primero<>"") {$AUX=$AUX.'<OPTION value="'.$Primero.'">'.$Primero.'</option>\n';}
// 	if ($sql<>"Meses") {
// 	//print $sSql;
// 
// // 	$stmt = $mysqli->prepare($sSql);
// // 	$stmt->execute();
// // 	$stmt->bind_result($Cuit);
// /*	$stmt->fetch()*/;
// 
// 
//  	$result = mysql_db_query($_SESSION['db'],$sSql);		
//  		while($row = mysql_fetch_array($result)) { $AUX=$AUX.'<OPTION value="'.$row["$campo"] .'">'.$row["$campo"].'</option>\n'; }
// // 	while($row = $stmt->fetch()) { $AUX=$AUX.'<OPTION value="'.$row["$campo"] .'">'.$row["$campo"].'</option>\n'; }
// 	} else { $AUX=$AUX.'<OPTION> </option><OPTION value="enero">enero</option><OPTION value="febrero">febrero</option><OPTION value="marzo">marzo</option><OPTION value="abril">abril</option><OPTION value="mayo">mayo</option><OPTION value="junio">junio</option><OPTION value="julio">julio</option><OPTION value="agosto">agosto</option><OPTION value="setiembre">setiembre</option><OPTION value="octubre">octubre</option><OPTION value="noviembre">noviembre</option><OPTION value="diciembre">diciembre</option>'; }
// 	$AUX=$AUX.'</SELECT>';
// 	//IF ($Combo=="FAreas") $AUX=$AUX.$sSql;
// 	if($Impreso==1) { print $AUX;} else { return $AUX;}
// }

function CargarCuitProveerdor($Proveedor) {
	$objResponse = new xajaxResponse();
	$sSql="SELECT Cuit FROM tblProveedores WHERE NombreProveedor='$Proveedor' and Empresa='".$_SESSION['CuitEmpresa']."'";
	
	//$sSql="SELECT Cuit FROM tblProveedores WHERE NombreProveedor='$Proveedor'";

// 	$stmt = $mysqli->prepare($sSql);
// 	$stmt->execute();
// 	$stmt->bind_result($Cuit);
// 	$stmt->fetch();
	$stmt =  $GLOBALS['pdo']->prepare($sSql); 	$stmt->execute();
// / 	$result = mysql_db_query($_SESSION['db'],$sSql);
// 	while($row = mysql_fetch_array($result)) { 
	while($row=$stmt->fetch()) { $objResponse->assign("txtCuitProveedores", "value", $row[Cuit]); }
// $objResponse->assign("txtCuitProveedores", "value", $Cuit); 
// 		$objResponse->assign("txtCuitProveedores", "value", $row[Cuit]); 
// 	}
	return $objResponse;
}

//function LlamarFiltro($Proveedores,$Mes,$ParticipaEnIva,$Areas,$Cuentas,$Anio,$Detalle2) {
function LlamarFiltro($Proveedores,$Mes,$ParticipaEnIva,$Areas,$Cuentas,$Anio,$Detalle2,$Orden,$ConSaldo) {
    
    $objResponse = new xajaxResponse();

		if ($Proveedores<>" ") {
		  if ($a<>"") { $a=$a." and "; }
		  $a=$a." NombreProveedor='$Proveedores' ";
		}

		if ($Mes<>" ") {
		  if ($a<>"") { $a=$a." and "; }
		  $a=$a." PasadoEnMes='$Mes' ";
		}

		if ($ParticipaEnIva<>" ") {
		  if ($a<>"") { $a=$a." and "; }
		  $a=$a." ParticipaEnIva='$ParticipaEnIva' ";
		}
		if ($Areas<>" ") {
		  if ($a<>"") { $a=$a." and "; }
		  $a=$a." DescripcionAreas='$Areas' ";
		}

		if ($Cuentas<>" ") {
		  if ($a<>"") { $a=$a." and "; }
		  $a=$a." DescripcionCuentas='$Cuentas' ";
		}

		if ($Anio<>" ") {
		  if ($a<>"") { $a=$a." and "; }
		  $a=$a." Anio='$Anio' ";
		}

		if ($a<>"") { $a=$a." and "; $a=$a." Empresa='".$_SESSION['CuitEmpresa']."'";}

		// Esto llena solo el combo del detalle
		  $x="SELECT DISTINCT DetalleComp FROM ViewComprobantesVentas WHERE ". $a . " ORDER BY DetalleComp";

		if ($Detalle2<>" ") {
		  if ($a<>"") { $a=$a." and "; }
		  $a=$a." DetalleComp='".$Detalle2."' ";
		}

		$a="SELECT * FROM ViewComprobantesVentas WHERE ".$a." and EmpresaProveedor='".$_SESSION['CuitEmpresa']."' ORDER BY Anio,FechaComp,NroComp,CuitComp,DetalleComp";
// 	$result = mysql_db_query($_SESSION['db'],$a);
 	$stmt =  $GLOBALS['pdo']->prepare($a); $stmt->execute();

//  	$objResponse->alert($a);
// $b='<table  border=1><tr><td>Op</td><td align="center">Fecha</td><td align="center">Comprobante</td><td align="center">CUIT</td><td align="center">Proveedor</td><td align="center">Detalle</td><td align="center">Bruto</td><td align="center">Iva</td><td align="center">Exento</td><td align="center">Imp<br>Interno</td><td align="center">Percec<br>Iva</td><td align="center">Retenc<br>IB</td><td align="center">Neto</td><td align="center">Pagado</td><td align="center">Cant<br>Litros</td><td align="center">Partic<br>Iva</td><td align="center">Pasado<br>EnMes</td><td align="center">Area</td><td align="center">Cuenta</td>';
	$b='<div class="content-responsive" style="none repeat scroll 0 0;overflow:auto;color:#ffffff;width:98%;height:60%;padding:4px;">
        <table class="table table-responsive table-hover" border=1 style="font-size:9px; margin-bottom: 0px;">
			<tr bgcolor="#b0e3ff"><td align="center">Fecha</td><td align="center">Comprobante</td><td align="center">CUIT</td><td align="center">Proveedor</td><td align="center">Detalle</td><td align="center">Bruto</td><td align="center">Iva</td><td align="center">Exento</td><td align="center">Imp<br>Interno</td><td align="center">Percec<br>Iva</td><td align="center">Retenc<br>IB</td><td align="center">RetGan</td><td align="center">Neto</td><td align="center">Pagado</td><td align="center">Cant<br>Litros</td><td align="center">Partic<br>Iva</td><td align="center">Pasado<br>EnMes</td><td align="center">Area</td><td align="center">Cuenta</td>';

	

// 	while($row = mysql_fetch_array($result)) {
	while($row=$stmt->fetch()) {
	$nombre=$row[IdComp];
	$evento=' onClick="xajax.call(\'CargarDatosComprobante\', {method: \'get\', parameters:['.$nombre.']}); return false;"';
	//$objResponse->alert($nombre);
// 	$evento=' onClick="xajax.call('."'".'CargarDatosComprobante'."'".', {method: '."'".'get'."'".', parameters:[xajax.getFormValues('."'".'testForm3'."'".'),'.$nombre.']}); return false;"';
	IF (($NroRegistro % 2)==1) { $colorFondo="lightGray"; } else {  $colorFondo=""; }
	$NroRegistro++;
	$b=$b.'<tr '.$evento.'bgcolor=\''.$colorFondo.'\' onmouseover="this.style.backgroundColor=\'#ffff66\';" onmouseout="this.style.backgroundColor=\''.$colorFondo.'\';">';
	$b=$b.'
		<td width=60>' . $row[FechaComp] . '</td> <td align="right" width=70>' . $row[NroComp] . '</td>	<td width=75>'.$row[Cuit].'</td><td width=100>'.$row[NombreProveedor].'</td><td width=100>'.$row[DetalleComp].'</td><td 
		align="right" width=25>'.$row[BrutoComp]. '</td><td  align="right" width=25>'.number_format(($row[BrutoComp]*$row[IvaComp]/100),2).'</td><td  align="right" width=25>'.$row[ExentoComp].'</td><td align="right" width=15>'.$row[ImpInternoComp].'</td><td align="right" width=25>'.$row[PercepcionIvaComp].'</td><td align="right" width=25>'.$row[RetencionIB].'</td><td align="right" width=25>'.$row[RetencionGan].'</td><td align="right" width=25>'.$row[NetoComp].'</td><td align="right" style="color:#ff0000;" width=25>-'.$row[MontoPagadoComp].'</td><td align="right" width=15>'.$row[CantidadLitroComp].'</td><td align="center" width=15>' . $row[ParticipaEnIva] . '</td><td width=25>' . $row[PasadoEnMes] . '</td><td width=65>' . $row[DescripcionAreas] . '</td><td width=65>' . $row[DescripcionCuentas] . '</td></tr>';
		$AcumBruto=$AcumBruto+$row[BrutoComp];
		$AcumExento=$AcumExento+$row[ExentoComp];
		$AcumImpInt=$AcumImpInt+$row[ImpInternoComp];
		$AcumPerIva=$AcumPerIva+$row[PercepcionIvaComp];
		$AcumRetIB=$AcumRetIB+$row[RetencionIB];
		$AcumRetGan=$AcumRetGan+$row[RetencionGan];
		$AcumNeto=$AcumNeto+$row[NetoComp];
		$AcumLitros=$AcumLitros+$row[CantidadLitroComp];
		$AcumPagado=$AcumPagado+$row[MontoPagadoComp];
		$AcumIva=$AcumIva+($row[BrutoComp]*$row[IvaComp]/100);
	}
	$Saldo=$AcumNeto-$AcumPagado;
	$b=$b.'<tr bgcolor=\'#A4FF9C\'><td></td><td></td><td></td><td></td><td>Totales</td><td align="right">'.number_format($AcumBruto,2).'</td><td align="right">'. number_format($AcumIva,2).'</td><td align="right">'.number_format($AcumExento,2).'</td><td align="right">'.number_format($AcumImpInt,2).'</td><td align="right">'.number_format($AcumPerIva,2).'</td><td align="right">'.number_format($AcumRetIB,2).'</td><td align="right">'.number_format($AcumRetGan,2).'</td><td align="right">'.number_format($AcumNeto,2).'</td><td align="right" style="color:#ff0000;">-'.number_format($AcumPagado,2).'</td><td align="right">'.number_format($AcumLitros,2).'</td><td align="right">Saldo</td><td align="right">'.number_format($Saldo,2).'</td><td></td>';
	$b=$b.'</td></tr></table></div>';
	$objResponse->assign("Filtro", "innerHTML", "");
	$objResponse->assign("Filtro", "innerHTML", $b);

// CArga la parte del filtro del Detalle de los comprobantes
// 		$result = mysql_db_query($_SESSION['db'],$x);	
	$stmt =  $GLOBALS['pdo']->prepare($x); $stmt->execute();

$Filtro='
xajax.call(\'LlamarFiltro\', {method: \'get\', parameters:[FProveedores.value,FMes.value,FParticipaIva.value,FAreas.value,FCuentas.value,FAnio.value,FDetalle2.value]});"';
// 		$Filtro='onClick="xajax.call('."'".'LlamarFiltro'."'".', {method: '."'".'get'."'".', parameters:[xajax.getFormValues('."'".'testForm3'."'".')]}); return false;" onChange="xajax.call('."'".'LlamarFiltro'."'".', {method: '."'".'get'."'".', parameters:[xajax.getFormValues('."'".'testForm3'."'".')]}); return false;"';
		$AUX='<SELECT id="FDetalle2" name="FDetalle2"' . $Filtro .'>';
		$AUX=$AUX.'<OPTION value=" "> </option>';
// 		while($row = mysql_fetch_array($result)) { $AUX=$AUX.'<OPTION value="'.utf8_decode($row[DetalleComp]) .'">'.utf8_decode($row[DetalleComp]).'</option>'; }
 		while($row=$stmt->fetch()) { $AUX=$AUX.'<OPTION value="'.utf8_decode($row[DetalleComp]) .'">'.utf8_decode($row[DetalleComp]).'</option>'; }

	 	$AUX=$AUX.'</SELECT>';
// 		$objResponse->aLERT("Valor de AUX".$AUX);
		$objResponse->assign("Detallen", "innerHTML", $AUX);

	return $objResponse;
}

function LlamarFiltro2($FProveedores2,$FMes2,$FParticipaIva2,$FAreas2,$FCuentas2,$F2Anio,$FFDesde,$FFHasta) {
	$objResponse = new xajaxResponse();
		if ($FProveedores2<>" ") {
		  if ($a<>"") { $a=$a." and "; }
		  $a=$a." NombreProveedor='$FProveedores2' ";
		}
		if ($FMes2<>" ") {
		  if ($a<>"") { $a=$a." and "; }
		  $a=$a." PasadoEnMes='$FMes2' ";
		}
		if ($FParticipaIva2<>" ") {
		  if ($a<>"") { $a=$a." and "; }
		  $a=$a." ParticipaEnIva='$FParticipaIva2' ";
		}
		if ($FAreas2<>" ") {
		  if ($a<>"") { $a=$a." and "; }
		  $a=$a." DescripcionAreas='$FAreas2' ";
		}
		if ($FCuentas2<>" ") {
		  if ($a<>"") { $a=$a." and "; }
		  $a=$a." DescripcionCuentas='$FCuentas2' ";
		}
		if ($FFDesde<>" ") {
		  if ($a<>"") { $a=$a." and "; }
		  $a=$a." FechaComp>='$FFDesde' ";
		}
		if ($FFHasta<>" ") {
		  if ($a<>"") { $a=$a." and "; }
		  $a=$a." FechaComp<='$FFHasta' ";
		}
		if ($F2Anio<>" ") {
		  if ($a<>"") { $a=$a." and "; }
		  $a=$a." Anio='$F2Anio' ";
		}
		if ($cmbDeudaEmpresa<>" ") {
		  if ($a<>"") { $a=$a." and "; }
		  $a=$a." Empresa='".$_SESSION['CuitEmpresa']."' ";
		}
        $a="SELECT * FROM ViewComprobantesVentas WHERE ".$a.' ORDER BY Anio,FechaComp,NroComp,CuitComp,DetalleComp';
// 	$result = mysql_db_query($_SESSION['db'],$a);
	$stmt =  $GLOBALS['pdo']->prepare($a); $stmt->execute();

	//$objResponse->alert($a);
	$b='<table  border=1><tr><td>Opcion</td><td>Fecha</td><td>Comprobante</td><td>CUIT</td><td>Proveedor</td><td>Detalle</td><td>Bruto</td><td>Iva</td><td>Exento</td><td>ImpInterno</td><td>PercecIva</td><td>Neto</td><td>Pagado</td><td>CantLitros</td><td>ParticIva</td><td>PasadoEnMes</td><td>Area</td><td>Cuenta</td>';
// 	while($row = mysql_fetch_array($result)) {
	while($row=$stmt->fetch()) {
		$nombre=$row[IdComp];
	$evento=' onClick="xajax.call(\'CargarDatosComprobante\', {method: \'get\', parameters:['.$nombre.']}); return false;"';
// 	$evento=' onClick="xajax.call('."'".'CargarDatosComprobante'."'".', {method: '."'".'get'."'".', parameters:[xajax.getFormValues('."'".'testForm3'."'".'),'.$nombre.']}); return false;"';
	IF (($NroRegistro % 2)==1) { $colorFondo=' bgcolor="lightGray"'; } else {  $colorFondo=""; }
	$NroRegistro++;	
	$b=$b.'<tr'.$colorFondo.'>
		<td align="center"><input type="checkbox" name="pepe"'.$evento.'> </td>
		<td>' . $row[FechaComp] . '</td> <td align="right">' . $row[NroComp] . '</td>	<td>'.$row[CuitComp].'</td><td>'.$row[NombreProveedor].'</td><td>'.$row[DetalleComp].'</td><td 
		align="right">'.$row[BrutoComp]. '</td><td 
 align="right">'.number_format(($row[BrutoComp]*$row[IvaComp]/100),2).'</td><td  align="right">'.$row[ExentoComp].'</td><td align="right">'.$row[ImpInternoComp].'</td><td align="right">'.$row[PercepcionIvaComp].'</td><td align="right">'.$row[NetoComp].'</td><td align="right" style="color:#ff0000;">-'.$row[MontoPagadoComp].'</td><td align="right">'.$row[CantidadLitroComp].'</td><td align="center">'.$row[ParticipaEnIva].'</td><td>'.$row[PasadoEnMes].'</td><td>'.$row[DescripcionAreas].'</td><td>'.$row[DescripcionCuentas].'</td></tr>';
		$AcumBruto=$AcumBruto+$row[BrutoComp];
		$AcumExento=$AcumExento+$row[ExentoComp];
		$AcumImpInt=$AcumImpInt+$row[ImpInternoComp];
		$AcumPerIva=$AcumPerIva+$row[PercepcionIvaComp];
		$AcumNeto=$AcumNeto+$row[NetoComp];
		$AcumLitros=$AcumLitros+$row[CantidadLitroComp];
		$AcumPagado=$AcumPagado+$row[MontoPagadoComp];
		$AcumIva=$AcumIva+($row[BrutoComp]*$row[IvaComp]/100);
	}
	$Saldo=$AcumNeto-$AcumPagado;
	$b=$b.'<tr><td></td><td></td><td></td><td></td><td></td><td>Totales</td><td align="right">'.number_format($AcumBruto,2).'</td><td align="right">'. number_format($AcumIva,2).'</td><td align="right">'.number_format($AcumExento,2).'</td><td align="right">'.number_format($AcumImpInt,2).'</td><td align="right">'.number_format($AcumPerIva,2).'</td><td align="right">'.number_format($AcumNeto,2).'</td><td align="right" style="color:#ff0000;">-'.number_format($AcumPagado,2).'</td><td align="right">'.number_format($AcumLitros,2).'</td><td align="right">Saldo</td><td align="right">'.number_format($Saldo,2).'</td><td></td>';
	$b=$b.'</td></tr></table>';
	$objResponse->assign("Filtro2", "innerHTML", "");
	$objResponse->assign("Filtro2", "innerHTML", $b);
	return $objResponse;
}

function AgregarComprobante( $Anio1,$PasadoEnMes,$ParticipaEnIva,$Areas1,$Cuentas1,$IvaComp,$CuitProveedores,$Comprobante,$Fecha,$Detalle1,$Bruto,$Exento,$ImpInterno,$PercIva,$Neto,$MontoPagado,$CantLitros) {
	$objResponse = new xajaxResponse();
	//Controla si el comprobante se encuentra en un libro cerrado, si es asÃ­ no lo deja modificar
	$sSql="SELECT * FROM tblVentas1 WHERE Anio=$Anio1 and Empresa='".$_SESSION['CuitEmpresa']."' and PasadoEnMes='$PasadoEnMes' and ParticipaEnIva='Si'";
 	//$objResponse->alert($sSql);
// 	$stmt =  $GLOBALS['pdo']->prepare($sSql); $stmt->execute();
// 	$result = mysql_db_query($_SESSION['db'],$sSql);
// 	$row=$stmt->fetch();
	if ($row['Cerrado']==1 and $ParticipaEnIva=='Si') { 
		$objResponse->alert("El comprobante no se ha dado de alta porque se encuentra dentro de un libro cerrado!!!");
		return $objResponse;
	}
	//AGREGA UN COMPROBANTE NUEVO
	$sql="SELECT IdArea FROM tblAreas WHERE DescripcionAreas='".$Areas1."' and Empresa='".$_SESSION['CuitEmpresa']."'";
 	//$objResponse->alert($sSql);
	$stmt =  $GLOBALS['pdo']->prepare($sql); $stmt->execute();
// 	$result = mysql_db_query($_SESSION['db'],$sql);
 	$row=$stmt->fetch(); // $row = mysql_fetch_array($result);
	$Area=$row[IdArea];
	$sql="SELECT IdCuenta FROM tblCuentas WHERE DescripcionCuentas='".$Cuentas1."' and Empresa='".$_SESSION['CuitEmpresa']."'";
 	//$objResponse->alert($sSql);
	$stmt =  $GLOBALS['pdo']->prepare($sql); $stmt->execute();
// 	$result = mysql_db_query($_SESSION['db'],$sql);
// 	$objResponse->alert($sql);
	$row=$stmt->fetch();// 	$row = mysql_fetch_array($result);	
	$Cuenta=$row[IdCuenta];
	$lafecha=$Fecha;
	$usuario=$_SESSION['usuario'];
	$fecha=date("Y/m/d H:i:s");
	if ($IvaComp<>"-") {
	$sql="INSERT INTO tblVentas1 (FechaComp,CuitComp,NroComp,DetalleComp,ParticipaEnIva,PasadoEnMes,IdArea,IdCuenta,BrutoComp,IvaComp,MontoIva,ExentoComp, ImpInternoComp,PercepcionIvaComp,NetoComp,MontoPagadoComp,IdPagosParciales,CantidadLitroComp,usuario,fechamodif,Anio,Empresa) VALUES ('$lafecha','$CuitProveedores', '$Comprobante','$Detalle1','$ParticipaEnIva','$PasadoEnMes','$Area','$Cuenta','$Bruto','$IvaComp','$Bruto*$IvaComp/100','$Exento','$ImpInterno','$PercIva','$Neto','$MontoPagado','$PagosParcial','$CantLitros','$usuario','$fecha','$Anio1','".$_SESSION['CuitEmpresa']."')";
	} else {
	$sql="INSERT INTO tblVentas1 (FechaComp,CuitComp,NroComp,DetalleComp,ParticipaEnIva,PasadoEnMes,IdArea,IdCuenta,BrutoComp,IvaComp,MontoIva,ExentoComp, ImpInternoComp,PercepcionIvaComp,NetoComp,MontoPagadoComp,IdPagosParciales,CantidadLitroComp,usuario,fechamodif,Anio,Empresa) VALUES ('$lafecha','$CuitProveedores', '$Comprobante','$Detalle1','$ParticipaEnIva','$PasadoEnMes','$Area','$Cuenta','$Bruto','-','".AcumuladoIVA($lafecha,$CuitProveedores,$Comprobante)."','$Exento','$ImpInterno','$PercIva','$Neto','$MontoPagado','$PagosParcial','$CantLitros','$usuario','$fecha','$Anio1','".$_SESSION['CuitEmpresa']."')";
	}
	$stmt =  $GLOBALS['pdo']->prepare($sql); $stmt->execute();// 	$result = mysql_db_query($_SESSION['db'],$sql);
 	//$objResponse->alert($sql);
 	//$objResponse->alert($sql);
// // // // // // //  	$stmt =  $GLOBALS['pdo']->prepare($sql); $stmt->execute();
	if (!$stmt->affected_rows) { 
// 	if ($result==1) { 
		$objResponse->alert("Se agregó correctamente"); 
// 		NuevoComprobante();
// 		LlamarFiltro($CuitProveedores,$PasadoEnMes,$ParticipaEnIva,$Area,$Cuenta,$Anio1,$Empresa,$Detalle1);
	}
	else { $objResponse->alert("Se produjo un error"); }
	return $objResponse;
}

/*function DevolverDato($Tabla,$sql,$DatoEnv,$Control) {
//CargarCombo("cmbProveedores","tblProveedores","NombreProveedor","","Proveedores");
//'tblProveedores','NombreProveedor','Comprobante','CuitProveedor','txtDetalle',''
//Tabla: Nombre de la tabla en donde se buscarÃ¡ el dato a devolver
////Campo: Nombre del campo de la tabla que se debe leer
//sql: sql utilizado para restringir la consulta, es opcional
////DatoIng: Dato que debe buscar en la tabla y columna especificados
//DatoDev: Nombre de la Columna del dato que debe devolver
//Control: Id del control en donde se asignarÃ¡n los resultados obtenidos

	//$objResponse = new xajaxResponse();
	if ($sql<>"") {	$sSql="SELECT ".$DatoEnv." FROM ".$Tabla." WHERE ".$sql; } else { $sSql="SELECT ".$DatoEnv." FROM ".$Tabla; }
	$result = mysql_db_query($_SESSION['db'],$sSql);
	print "<script>alert($sSql);</script>";
	//if ($result==1) {
//		$AUX='<SELECT name="'.$Combo.'">';
		while($row = mysql_fetch_array($result)) { 
			$DatoAEnviar=$row[$DatoEnv];
			//$AUX=$AUX.'<OPTION value='. $row[$campo] .'>' . $row[$campo] . "</option>\n";
		}
		//$AUX=$AUX.'</SELECT>';

	if ($Control<>"") { print "<script>document.getElementById($Control).value=$DatoAEnviar;</script>";	 } else { print $DatoAEnviar; }

//	$objResponse->assign($EnDiv, "innerHTML", $AUX);
//	}else{ $objResponse->alert("Se produjo un error"); }
//	return $objResponse;
}
*/
function NuevoComprobante() {
	$objResponse = new xajaxResponse();
		$objResponse->assign("Fecha","value","");
		$objResponse->assign("txtCuitProveedores","value","");
		$objResponse->assign("Comprobante","value","");
		$objResponse->assign("Detalle","value","");
		$objResponse->assign("Anio","value","2014");
		$objResponse->assign("ParticIva","selectIndex[0]","");
		$objResponse->assign("PasadoEnMes","selectIndex[0]","");
		$objResponse->assign("cmbArea","selectIndex[0]","");
		$objResponse->assign("cmbCuenta","selectIndex[0]","");
		$objResponse->assign("Bruto","value","0");
		$objResponse->assign("Iva","selectIndex[0]","");
		$objResponse->assign("Exento","value","0");
		$objResponse->assign("ImpInterno","value","0");
		$objResponse->assign("PercIva","value","0");
		$objResponse->assign("Neto","value","");
		$objResponse->assign("MontoPagado","value","0");
		$objResponse->assign("PagosParcial","value","0");
		$objResponse->assign("CantLitros","value","0"); 
		//LlamarFiltro($formData);
	return $objResponse;
}

function ModificarComprobante1( $Anio1,$PasadoEnMes,$ParticipaEnIva,$Areas1,$Cuentas1,$IvaComp,$CuitProveedores,$Comprobante,$Fecha,$Detalle1,$Bruto,$Exento,$ImpInterno,$PercIva,$Neto,$MontoPagado,$CantLitros,$IdComp) {
	$objResponse = new xajaxResponse();
	//Controla si el comprobante se encuentra en un libro cerrado, si es asÃ­ no lo deja modificar
	$sSql="SELECT * FROM tblVentas1 WHERE Anio=$Anio1 and Empresa='".$_SESSION['CuitEmpresa']."' and PasadoEnMes='$PasadoEnMes' and ParticipaEnIva='Si'";


 	$stmt =  $GLOBALS['pdo']->prepare($sSql); $stmt->execute(); // 	$result = mysql_db_query($_SESSION['db'],$sSql);
	$row=$stmt->fetch(); // 	$row = mysql_fetch_array($result);
	if ($row['Cerrado']==1 and $ParticipaEnIva=='Si') { 
		$objResponse->alert("El comprobante no se puede modificar porque se encuentra dentro de un libro cerrado!!!");
		return $objResponse;
	}
	// comienza a modificar el comprobante
	$sql="SELECT IdArea FROM tblAreas WHERE DescripcionAreas='".$Areas1."' and Empresa='".$_SESSION['CuitEmpresa']."'";
 	$stmt =  $GLOBALS['pdo']->prepare($sql); $stmt->execute(); // 	$result = mysql_db_query($_SESSION['db'],$sql);
	$row=$stmt->fetch(); // 	$row = mysql_fetch_array($result);
	$Area=$row[IdArea];

	$sql="SELECT IdCuenta FROM tblCuentas WHERE DescripcionCuentas='".$Cuentas1."' and Empresa='".$_SESSION['CuitEmpresa']."'";
 	$stmt =  $GLOBALS['pdo']->prepare($sql); $stmt->execute(); // 	$result = mysql_db_query($_SESSION['db'],$sql);
	$row=$stmt->fetch(); // 	$row = mysql_fetch_array($result);
	$Cuenta=$row[IdCuenta];
	//$fecha=$formData[VartxtFecha];
	//$comprobante=$formData[VarComprobante];
	//$cuit=$formData[VartxtCuitProveedores];
//,document.getElementById('txtFecha').value,document.getElementById('Comprobante').value,document.getElementById('txtCuitProveedores').value
	//Controla si el comprobante se encuentra en un libro cerrado, si es asÃ­ no lo deja modificar
	$sSql="SELECT * FROM tblVentas1 WHERE IdComp=$IdComp";
 	$stmt =  $GLOBALS['pdo']->prepare($sSql); $stmt->execute(); // 	$result = mysql_db_query($_SESSION['db'],$sql);
	$row=$stmt->fetch(); // 	$row = mysql_fetch_array($result);
	if ($row['Cerrado']>0) { 
		$objResponse->alert("El comprobante no se ha modificado porque se encuentra dentro de un libro cerrado!!!");
		return $objResponse;
	}
	// Modifica los datos del comprobante
	$usuario=$_SESSION['usuario'];
	$fecha=date("Y/m/d H:i:s");
	$sSql="UPDATE tblVentas1 SET FechaComp='".$Fecha."', CuitComp='$CuitProveedores', NroComp='$Comprobante', DetalleComp='$Detalle1', ParticipaEnIva='$ParticipaEnIva', PasadoEnMes='$PasadoEnMes', IdArea='$Area', IdCuenta='$Cuenta', BrutoComp='$Bruto', IvaComp='$IvaComp', MontoIva='".number_format(($Bruto*$IvaComp/100),2)."',ExentoComp='$Exento', ImpInternoComp='$ImpInterno', PercepcionIvaComp='$PercIva', NetoComp='$Neto', MontoPagadoComp='$MontoPagado', IdPagosParciales='$PagosParcial', CantidadLitroComp='$CantLitros',usuario='$usuario',fechamodif='$fecha',Anio='$Anio1' ,Empresa='".$_SESSION['CuitEmpresa']."' WHERE IdComp=$IdComp";
/*	$sSql="UPDATE tblVentas1 SET FechaComp='".$formData[txtFecha]."', CuitComp='$formData[txtCuitProveedores]', NroComp='$formData[Comprobante]', DetalleComp='$formData[Detalle]', ParticipaEnIva='$formData[ParticIva]', PasadoEnMes='$formData[PasadoEnMes]', IdArea='$Area', IdCuenta='$Cuenta', BrutoComp='$formData[Bruto]', IvaComp='$formData[Iva]', MontoIva='".number_format(($formData[Bruto]*$formData[Iva]/100),2)."',ExentoComp='$formData[Exento]', ImpInternoComp='$formData[ImpInterno]', PercepcionIvaComp='$formData[PercIva]', NetoComp='$formData[Neto]', MontoPagadoComp='$formData[MontoPagado]', IdPagosParciales='$formData[PagosParcial]', CantidadLitroComp='$formData[CantLitros]' WHERE IdComp=$formData[IdComp]";*/

//FechaComp='$formData[VartxtFecha]' and NroComp='$formData[VarComprobante]' and CuitComp='$formData[VartxtCuitProveedores]'";
   	//$objResponse->alert($sSql);
 	$stmt =  $GLOBALS['pdo']->prepare($sSql); $stmt->execute(); // 	$result = mysql_db_query($_SESSION['db'],$sql);
	if (!$stmt->affected_rows) { //	if ($result==1) { 
		$objResponse->alert("Se modificó correctamente"); 
// 		NuevoComprobante();
// 		LlamarFiltro($CuitProveedores,$PasadoEnMes,$ParticipaEnIva,$Area,$Cuenta,$Anio1,$Empresa,$Detalle1);
// 		LlamarFiltro($formData);
	}
	else { $objResponse->alert("Se produjo un error"); }
	
	return $objResponse;
}

function AgregarDesgloce($fecha,$cuit,$Comp) {
	//$objResponse = new xajaxResponse();
	  $sSql="DELETE FROM tblVentas1 WHERE FechaComp='$formData[txtFecha]' and CuitComp='$formData[txtCuitProveedores]' and"; 
	  if ($result==1) { 
		//$objResponse->alert("Se EliminÃ³ correctamente"); 
		$objResponse->assign("Borrar","value","0");
		//LlamarFiltro($formData);
	  }
	  else { $objResponse->alert("Se produjo un error"); }
	  return $objResponse;
}

function AcumuladoIVA($fecha,$cuit,$Comp) {
	//$objResponse = new xajaxResponse();
	$sSql="SELECT * FROM tblDesgloceIva WHERE Fecha='$fecha' and Cuit='$cuit' and NroComp='$Comp'";
 	$stmt =  $GLOBALS['pdo']->prepare($sSql); $stmt->execute(); // 	$result = mysql_db_query($_SESSION['db'],$sql);
 	while($row=$stmt->fetch()) { // $row = mysql_fetch_array($result);
		$Acumulado=$Acumulado+$row[Iva]*$row[MontoBruto]/100;
	}
	return $Acumulado;
}

function SolicitarDeudaProveedores($CmbDeuda,$DeudaAnio) {
	$objResponse = new xajaxResponse();
	//$sSql="SELECT SUM(NetoComp-MontoPagadoComp) AS Saldo, CuitComp , Cuit, NombreProveedor, DireccionProveedor FROM tblVentas1, tblProveedores WHERE tblProveedores.NombreProveedor=tblVentas1.CuitComp and ((NetoComp-MontoPagadoComp)>1) GROUP BY CuitComp";

	if ($CmbDeuda=="Todos")
		{$mas="";}
		else { $mas=" DescripcionAreas='" . $CmbDeuda. "'"; }
		
	if ($DeudaAnio=="Todos") 
		{ //$mas="";}
}
		else { if (strlen($mas>1)) { $mas=$mas." and Anio=".$DeudaAnio; }
		       else { $mas=$mas." Anio=".$DeudaAnio;}
		}

		if (strlen($mas)) { $mas=$mas." and Empresa=".$_SESSION['CuitEmpresa']; }
		else { $mas=$mas." Empresa=".$_SESSION['CuitEmpresa'];}

	if (strlen($mas)) {$mas=" WHERE ".$mas;}
	$sSql="SELECT CuitComp as NombreProveedor,Cuit, Saldo as Deuda FROM (SELECT sum(NetoComp-MontoPagadoComp) as Saldo, CuitComp, Cuit FROM ViewComprobantesVentas ".$mas." GROUP BY CuitComp) as f WHERE Saldo>1";
	//$objResponse->alert($sSql);
 	$stmt =  $GLOBALS['pdo']->prepare($sSql); $stmt->execute(); // 	$result = mysql_db_query($_SESSION['db'],$sql);
	$p="<table border=1>
		<tr><td>Nombre</td><td>Cuit</td><td>Deuda</td></tr>";
 	while($row=$stmt->fetch()) { // $row = mysql_fetch_array($result);
		$p=$p."<tr><td>$row[NombreProveedor]</td><td>$row[Cuit]</td><td align='right'>$row[Deuda]</td></tr>";
		$Acumulado=$Acumulado+$row[Deuda];
	}
	$p=$p."<tr><td colspan=2 align='right'>Total Deuda a Proveedores</td><td>$Acumulado</td></tr>";
	$objResponse->assign("DeudaProveedores","innerHTML",$p);
	return $objResponse;
}

function SolicitarDeudaPorAreas($AreasAnio,$Quienes) {
	$objResponse = new xajaxResponse();
	switch ($Quienes) {
		case "Todos": $SQLQuien=""; break;
		case "Si": $SQLQuien=' ParticipaenIva="Si" and '; break;
		case "No": $SQLQuien=' ParticipaenIva="No" and '; break;
	}
	//$sSql="SELECT SUM(NetoComp-MontoPagadoComp) AS Saldo, CuitComp , Cuit, NombreProveedor, DireccionProveedor FROM tblVentas1, tblProveedores WHERE tblProveedores.NombreProveedor=tblVentas1.CuitComp and ((NetoComp-MontoPagadoComp)>1) GROUP BY CuitComp";
	$sSql='SELECT  PasadoEnMes, DescripcionAreas, DescripcionCuentas, sum(CASE IvaComp WHEN "10.5" THEN (BrutoComp) ELSE 0 END) as "10.5", sum(CASE IvaComp WHEN "21.0" THEN (BrutoComp) ELSE 0 END) as "21.0", sum(CASE IvaComp WHEN "27.0" THEN (BrutoComp) ELSE 0 END) as "27.0", sum(ExentoComp) as Exento, sum(PercepcionIvaComp) as Percepcion, sum(ImpInternoComp) as ImpInt, sum(MontoIva) as Iva, sum(NetoComp) as Neto, sum(BrutoComp) as Bruto FROM ViewComprobantesVentas WHERE '.$SQLQuien.' Anio='.$AreasAnio.' and Empresa='.$_SESSION['CuitEmpresa'].' GROUP BY PasadoEnMes,DescripcionAreas, DescripcionCuentas ORDER BY PasadoEnMes, DescripcionAreas, DescripcionCuentas';

//$sSql="SELECT CuitComp as NombreProveedor,Cuit, Saldo as Deuda FROM (SELECT sum(NetoComp-MontoPagadoComp) as Saldo, CuitComp, Cuit FROM ViewComprobantesVentas GROUP BY CuitComp) as f WHERE Saldo>1";
	//$objResponse->alert("Pedo");
 	//$objResponse->alert($sSql);
 	$stmt =  $GLOBALS['pdo']->prepare($sSql); $stmt->execute(); // 	$result = mysql_db_query($_SESSION['db'],$sql);
 	$p="<table border=1>
 		<tr><td>Mes</td><td>Area</td><td>Cuenta</td><td>Bruto</td><td>10,5</td><td>21,0</td><td>27,0</td><td>Exento</td><td>Percepcion</td><td>ImpInt</td><td>Iva</td><td>Neto</td></tr>";
 	while($row = $stmt->fetch()) {// $row = mysql_fetch_array($result);
 		$p=$p."<tr><td>$row[PasadoEnMes]</td><td>$row[DescripcionAreas]</td><td >$row[DescripcionCuentas]</td><td align='right'>$row[Bruto]</td><td align='right'>$row[3]</td><td align='right'>$row[4]</td><td align='right'>$row[5]</td><td align='right'>$row[Exento]</td><td align='right'>$row[Percepcion]</td><td align='right'>$row[ImpInt]</td><td align='right'>".number_format($row[Iva],2)."</td><td align='right'>$row[Neto]</td></tr>";
 		$Acumulado=$Acumulado+$row[Neto];
 	}
 	$p=$p."<tr><td colspan=2 align='right'>Total Deuda por Areas</td><td>$Acumulado</td></tr>";
 	$objResponse->assign("DeudaPorAreas","innerHTML",$p);
	return $objResponse;
}

function CargarAreasCuentas1($Empresa) {
	$objResponse = new xajaxResponse();

	$ElFiltro='xajax.call(\'LlamarFiltro\', {method: \'get\',parameters:[FProveedores.value,FMes.value,FParticipaIva.value,FAreas.value,FCuentas.value,FAnio.value,FDetalle2.value]});"';

    $ElFiltro2='onClick="xajax.call(\'LlamarFiltro2\', {method: \'get\',parameters:[FProveedores2.value,FMes2.value,FParticipaIva2.value,FAreas2.value,FCuentas2.value,F2Anio.value,FFDesde.value,FFHasta.value]});"; onChange="xajax.call(\'LlamarFiltro2\', {method: \'get\',parameters:[FProveedores.value,FMes.value,FParticipaIva.value,FAreas.value,FCuentas.value,FAnio.value,FDetalle2.value]});"';
    
    $sSql="SELECT * FROM tblAreas WHERE Empresa='".$_SESSION['CuitEmpresa']."' ORDER BY DescripcionAreas";
	$Areas='<SELECT id="Areas" name="Areas" style="max-width:100px;">';
	$FAreas='<SELECT id="FAreas" name="FAreas" style="max-width:100px;" onClick="'.$ElFiltro.'" onChange="'.$ElFiltro.'">';

	$FAreas2='<SELECT id="FAreas2" name="FAreas2" style="max-width:100px;" onClick="'.$ElFiltro2.'" onChange="'.$ElFiltro2.'">';
	$CmbDeuda='<SELECT id="CmbDeuda" name="CmbDeuda" style="max-width:100px;">';

   	$stmt = $GLOBALS['pdo']->prepare($sSql); $stmt->execute(); // 	$result = mysql_db_query($_SESSION['db'],$sql);
		$Areas=$Areas.'<OPTION value=" "> </option>';
		$FAreas=$FAreas.'<OPTION value=" "> </option>';
		$FAreas2=$FAreas2.'<OPTION value=" "> </option>';
		$CmbDeuda=$CmbDeuda.'<OPTION value="Todos">Todos</option>';
 		while($row=$stmt->fetch()) {// $row = mysql_fetch_array($result);

			$Areas=$Areas.'<OPTION value="'.$row["DescripcionAreas"] .'">'.$row["DescripcionAreas"].'</option>';
			$FAreas=$FAreas.'<OPTION value="'.$row["DescripcionAreas"] .'">'.$row["DescripcionAreas"].'</option>';
			$FAreas2=$FAreas2.'<OPTION value="'.$row["DescripcionAreas"] .'">'.$row["DescripcionAreas"].'</option>';
			$CmbDeuda=$CmbDeuda.'<OPTION value="'.$row["DescripcionAreas"] .'">'.$row["DescripcionAreas"].'</option>';
		}
	$Areas=$Areas.'</SELECT>';
	$FAreas=$FAreas.'</SELECT>';
	$FAreas2=$FAreas2.'</SELECT>';
	$CmbDeuda=$CmbDeuda.'</SELECT>';

	$sSql="SELECT * FROM tblCuentas WHERE Empresa='".$_SESSION['CuitEmpresa']."' ORDER BY DescripcionCuentas";
	$Cuentas='<SELECT id="Cuentas" name="Cuentas" style="max-width:100px;">';
	$FCuentas='<SELECT id="FCuentas" name="FCuentas" style="max-width:100px;" onClick="'.$ElFiltro.'" onChange="'.$ElFiltro.'">';

	$FCuentas2='<SELECT id="FCuentas2" name="FCuentas2" style="max-width:100px;" onClick="'.$ElFiltro2.'" onChange="'.$ElFiltro2.'">';

   	$stmt =  $GLOBALS['pdo']->prepare($sSql); $stmt->execute(); // 	$result = mysql_db_query($_SESSION['db'],$sql);		
		$Cuentas=$Cuentas.'<OPTION value=" "> </option>';
		$FCuentas=$FCuentas.'<OPTION value=" "> </option>';
		$FCuentas2=$FCuentas2.'<OPTION value=" "> </option>';
 		while($row=$stmt->fetch()) {// $row = mysql_fetch_array($result);
			$Cuentas=$Cuentas.'<OPTION value="'.$row["DescripcionCuentas"] .'">'.$row["DescripcionCuentas"].'</option>';
			$FCuentas=$FCuentas.'<OPTION value="'.$row["DescripcionCuentas"] .'">'.$row["DescripcionCuentas"].'</option>';
			$FCuentas2=$FCuentas2.'<OPTION value="'.$row["DescripcionCuentas"] .'">'.$row["DescripcionCuentas"].'</option>';
		}

	$Cuentas=$Cuentas.'</SELECT>';
	$FCuentas=$FCuentas.'</SELECT>';
	$FCuentas2=$FCuentas2.'</SELECT>';

 	//$Eventos='  onChange="xajax.call(\'CargarCuitProveerdor\', {method: \'get\', parameters:[cmbProveedores.value]});" onClick="xajax.call(\'CargarCuitProveerdor\', {method: \'get\', parameters:[cmbProveedores.value,cmbEmpresas.value]});"';
	$Eventos='  onChange="xajax.call(\'CargarCuitProveerdor\', {method: \'get\', parameters:[cmbProveedores.value]});"';
	$a=CargarCombo("cmbProveedores","tblProveedores","NombreProveedor","NombreProveedor","Cuit<>'' and Empresa='".$_SESSION['CuitEmpresa']."' ORDER BY NombreProveedor","Proveedores"," ",$Eventos,150,0,"");
	$objResponse->assign("Proveedores","innerHTML",$a);

	$Eventos=' onchange="xajax.call(\'LlamarFiltro\', {method: \'get\', parameters:[FProveedores.value,FMes.value,FParticipaIva.value,FAreas.value,FCuentas.value,FAnio.value,FDetalle2.value,FOrden.checked,FConSaldo.checked]})"';
	//$a=CargarCombo("FProveedores","tblProveedores","NombreProveedor","NombreProveedor","Cuit<>'' and Empresa='".$_SESSION['CuitEmpresa']."' ORDER BY NombreProveedor","FProveedores"," ",'onclick="xajax.call(\'LlamarFiltro\', {method: \'get\', parameters:[FProveedores.value,FMes.value,FParticipaIva.value,FAreas.value,FCuentas.value,FAnio.value,cmbEmpresas.value,FDetalle2.value,FOrden.checked,FConSaldo.checked,Pagina.value]});"',150,0,"");
	$a=CargarCombo("FProveedores","tblProveedores","NombreProveedor","NombreProveedor","Cuit<>'' and Empresa='".$_SESSION['CuitEmpresa']."' ORDER BY NombreProveedor","FProveedores"," ",$Eventos,200,0,"");
	$objResponse->assign("ProveedoresComprobantes","innerHTML",$a);

	$a=CargarCombo("FProveedores2","tblProveedores","NombreProveedor","NombreProveedor","Cuit<>'' and Empresa='".$_SESSION['CuitEmpresa']."' ORDER BY NombreProveedor","FProveedores2"," ",$Eventos,50,0,"");
	$objResponse->assign("ProveedoresDeuda","innerHTML",$a);
	
	
	$objResponse->assign("DivAreas","innerHTML",$Areas);
	$objResponse->assign("DivFAreas","innerHTML",$FAreas);
	$objResponse->assign("DivFAreas2","innerHTML",$FAreas2);
	$objResponse->assign("DivCmbDeuda","innerHTML",$CmbDeuda);
//$objResponse->alert($CmbDeuda);
	$objResponse->assign("DivCuentas","innerHTML",$Cuentas);
	$objResponse->assign("DivFCuentas","innerHTML",$FCuentas);
	$objResponse->assign("DivFCuentas2","innerHTML",$FCuentas2);

// 	$objResponse->alert($sSql);
	return $objResponse;
}

function CargarAreasCuentas($Empresa) {
	$objResponse = new xajaxResponse();
 	//$objResponse->assign("DivAreas","innerHTML",CargarCombo("cmbAreas", "tblAreas",  "DescripcionAreas",  " WHERE Empresa=".$formData['cmbEmpresas'],"Areas"," ",$Eventos,80));
//	$rr=CargarCombo("cmbAreas", "tblAreas",  "DescripcionAreas",  " Empresa='20943576727'","Areas"," ",$Eventos,80,0);
/*
$ElFiltro='
xajax.call(\'LlamarFiltro\', {method: \'get\', parameters:[FProveedores.value,FMes.value,FParticipaIva.value,FAreas.value,FCuentas.value,FAnio.value,cmbEmpresas.value,FDetalle2.value]});return false;"';

$ElFiltro2='onClick="
xajax.call(\'LlamarFiltro2\', {method: \'get\', parameters:[FProveedores2.value,FMes2.value,FParticipaIva2.value,FAreas2.value,FCuentas2.value,F2Anio.value,cmbDeudaEmpresa.value,FFDesde.value,FFHasta.value]});";

onChange="
xajax.call(\'LlamarFiltro2\', {method: \'get\', parameters:[FProveedores.value,FMes.value,FParticipaIva.value,FAreas.value,FCuentas.value,FAnio.value,cmbEmpresas.value,FDetalle2.value]});return false;"';

// 	$ElFiltro=' Proveedores=document.getElementById(\'FProveedores\').value; Mes=document.getElementById(\'FMes\').value; ParticipaIva=document.getElementById(\'FParticipaIva\').value; Areas1=document.getElementById(\'FAreas\').value; Cuentas1=document.getElementById(\'FCuentas\').value; Empresa=document.getElementById(\'cmbEmpresas\').value; Detalle2=document.getElementById(\'FDetalle2\').value; Anio1=document.getElementById(\'FAnio\').value; xajax.call(\'LlamarFiltro\', {method: \'get\', parameters:[xajax.getFormValues(Proveedores,Mes,ParticipaIva,Areas,Cuentas,Anio,Empresa,Detalle2)]}); return false;';

	$sSql="SELECT * FROM tblAreas WHERE Empresa='$Empresa' ORDER BY DescripcionAreas";
	$Areas='<SELECT id="Areas" name="Areas" style="max-width:100px;">';
	$FAreas='<SELECT id="FAreas" name="FAreas" style="max-width:100px;" onClick="'.$ElFiltro.'" onChange="'.$ElFiltro.'">';

	$FAreas2='<SELECT id="FAreas2" name="FAreas2" style="max-width:100px;" onClick="'.$ElFiltro2.'" onChange="'.$ElFiltro2.'">';	$CmbDeuda='<SELECT id="CmbDeuda" name="CmbDeuda" style="max-width:100px;">';

	$result = mysql_db_query($_SESSION['db'],$sSql);		
		$Areas=$Areas.'<OPTION value=" "> </option>';
		$FAreas=$FAreas.'<OPTION value=" "> </option>';
		$FAreas2=$FAreas2.'<OPTION value=" "> </option>';
		$CmbDeuda=$CmbDeuda.'<OPTION value="Todos">Todos</option>';
		while($row = mysql_fetch_array($result)) { 
			$Areas=$Areas.'<OPTION value="'.$row["DescripcionAreas"] .'">'.$row["DescripcionAreas"].'</option>';
			$FAreas=$FAreas.'<OPTION value="'.$row["DescripcionAreas"] .'">'.$row["DescripcionAreas"].'</option>';
			$FAreas2=$FAreas2.'<OPTION value="'.$row["DescripcionAreas"] .'">'.$row["DescripcionAreas"].'</option>';
			$CmbDeuda=$CmbDeuda.'<OPTION value="'.$row["DescripcionAreas"] .'">'.$row["DescripcionAreas"].'</option>';
		}
	$Areas=$Areas.'</SELECT>';
	$FAreas=$FAreas.'</SELECT>';
	$FAreas2=$FAreas2.'</SELECT>';
	$CmbDeuda=$CmbDeuda.'</SELECT>';

	$sSql="SELECT * FROM tblCuentas WHERE Empresa='$Empresa' ORDER BY DescripcionCuentas";
	$Cuentas='<SELECT id="Cuentas" name="Cuentas" style="max-width:100px;">';
	$FCuentas='<SELECT id="FCuentas" name="FCuentas" style="max-width:100px;" onClick="'.$ElFiltro.'" onChange="'.$ElFiltro.'">';

	$FCuentas2='<SELECT id="FCuentas2" name="FCuentas2" style="max-width:100px;" onClick="'.$ElFiltro2.'" onChange="'.$ElFiltro2.'">';

	$result = mysql_db_query($_SESSION['db'],$sSql);		
		$Cuentas=$Cuentas.'<OPTION value=" "> </option>';
		$FCuentas=$FCuentas.'<OPTION value=" "> </option>';
		$FCuentas2=$FCuentas2.'<OPTION value=" "> </option>';
		while($row = mysql_fetch_array($result)) { 
			$Cuentas=$Cuentas.'<OPTION value="'.$row["DescripcionCuentas"] .'">'.$row["DescripcionCuentas"].'</option>';
			$FCuentas=$FCuentas.'<OPTION value="'.$row["DescripcionCuentas"] .'">'.$row["DescripcionCuentas"].'</option>';
			$FCuentas2=$FCuentas2.'<OPTION value="'.$row["DescripcionCuentas"] .'">'.$row["DescripcionCuentas"].'</option>';
		}
	$Cuentas=$Cuentas.'</SELECT>';
	$FCuentas=$FCuentas.'</SELECT>';
	$FCuentas2=$FCuentas2.'</SELECT>';

	$objResponse->assign("DivAreas","innerHTML",$Areas);
	$objResponse->assign("DivFAreas","innerHTML",$FAreas);
	$objResponse->assign("DivFAreas2","innerHTML",$FAreas2);
	$objResponse->assign("DivCmbDeuda","innerHTML",$CmbDeuda);
//$objResponse->alert($CmbDeuda);
	$objResponse->assign("DivCuentas","innerHTML",$Cuentas);
	$objResponse->assign("DivFCuentas","innerHTML",$FCuentas);
	$objResponse->assign("DivFCuentas2","innerHTML",$FCuentas2);
*/
	return $objResponse;
}

function EliminarComprobante($IdComp,$Borrar) {
	$objResponse = new xajaxResponse();
	//Controla si el comprobante se encuentra en un libro cerrado, si es asÃ­ no lo deja modificar
	$sSql="SELECT * FROM tblVentas1 WHERE IdComp=$IdComp";
 	$stmt =  $GLOBALS['pdo']->prepare($sSql); $stmt->execute(); // 	$result = mysql_db_query($_SESSION['db'],$sql);
	$row=$stmt->fetch(); // 	$row = mysql_fetch_array($result);
	if ($row['Cerrado']==1) { 
		$objResponse->alert("El comprobante no se puede eliminar porque se encuentra dentro de un libro cerrado!!!");
		return $objResponse;
	}
	//Comienza a borrar
	if ($Borrar=='1') { 
	  $sSql="DELETE FROM tblVentas1 WHERE IdComp=$IdComp"; //FechaComp='$formData[txtFecha]' and CuitComp='$formData[txtCuitProveedores]' and NroComp='$formData[Comprobante]'"
	$stmt =  $GLOBALS['pdo']->prepare($sSql); $stmt->execute(); // 	$result = mysql_db_query($_SESSION['db'],$sql);
	if (!$stmt->affected_rows) { //	if ($result==1) {
		$objResponse->alert("Se EliminÃ³ correctamente"); 
		$objResponse->assign("Borrar","value","0");
// 		LlamarFiltro($CuitProveedores,$PasadoEnMes,$ParticipaEnIva,$Area,$Cuenta,$Anio1,$Empresa,$Detalle1);
	  }
	  else { $objResponse->alert("Se produjo un error"); }
	  return $objResponse;
	}
}

function CerrarLibro($Cerrar,$LibroAnio,$LibroMes)  {
	$objResponse = new xajaxResponse();
	if ($Cerrar=='1') { 
	//Controla si el comprobante se encuentra en un libro cerrado, si es asÃ­ no lo deja modificar
	$sSql="SELECT * FROM tblVentas1 WHERE Anio=$LibroAnio and Empresa='".$_SESSION['CuitEmpresa']."' and PasadoEnMes='$LibroMes' and ParticipaEnIva='Si'";
	$stmt =  $GLOBALS['pdo']->prepare($sSql); $stmt->execute(); // 	$result = mysql_db_query($_SESSION['db'],$sql);
	$row=$stmt->fetch(); // $row = mysql_fetch_array($result); 		
	if ($row['Cerrado']>1) { 
		$objResponse->alert("El Libro ya se encontraba cerrado!!!");
		return $objResponse;
	}
// 		Obtiene el mayor nÃºmero de hoja del libro de compras 35
	$sSql="SELECT max(Cerrado) as Libro FROM tblVentas1 WHERE Empresa='".$_SESSION['CuitEmpresa']."'";
		$stmt =  $GLOBALS['pdo']->prepare($sSql); $stmt->execute();
		$row=$stmt->fetch(); 
		$Folio=$row['Libro']+1;
		$Listado="SELECT IdComp,NroComp,FechaComp,CuitComp FROM tblVentas1 WHERE PasadoEnMes='$LibroMes' and (ParticipaEnIva='Si' or ParticipaEnIva='IB' or ParticipaEnIva='BsPersonal') and Anio=$LibroAnio and Empresa='".$_SESSION['CuitEmpresa']."' ORDER BY FechaComp,NroComp,CuitComp,DetalleComp";
 		$stmt =  $GLOBALS['pdo']->prepare($Listado); $stmt->execute();
 		$cont=0;
		while($row=$stmt->fetch()) {
			if ($cont==35) { $Folio++; $cont=0; }
			$cont++;
			if ($NroComp==$row[NroComp] and $FechaComp==$row[FechaComp] and $Cuit==$row[CuitComp]) { $cont=$cont-1; }
			
			$Listado="UPDATE tblVentas1 SET Cerrado=$Folio WHERE IdComp=$row[IdComp]";
 			$RecModif = $GLOBALS['pdo']->prepare($Listado); $RecModif->execute();
			$IdComp=$row[IdComp]; $NroComp=$row[NroComp]; $FechaComp=$row[FechaComp]; $Cuit=$row[CuitComp];
		}
		if ($RecModif->affected_rows) {  
			$objResponse->alert("Se CerrÃ³ correctamente"); 
			$objResponse->assign("Cerrar","value","0");
		}
	  else { $objResponse->alert("NO SE PUDO CERRAR EL LIBRO"); }
	}
	return $objResponse;
}

function DibujarLibrosCerrados($LibroAnio) {
	$objResponse = new xajaxResponse();
	$sSql="SELECT PasadoEnMes,Cerrado FROM tblVentas1 WHERE ParticipaEnIva='Si' and Anio='$LibroAnio' and Empresa='".$_SESSION['CuitEmpresa']."' GROUP BY Anio,PasadoEnMes ORDER BY FechaComp";
// 	$objResponse->alert($sSql);
 	$stmt =  $GLOBALS['pdo']->prepare($sSql); $stmt->execute(); // 	$result = mysql_db_query($_SESSION['db'],$sql);
	$P=$P.'<div class="contenedor-tabla">';

	while($row = $stmt->fetch()) {// $row = mysql_fetch_array($result);
		$P=$P.
		"    <div class=\"contenedor-fila\">
        		<div class=\"contenedor-columna\">";
				$P=$P.$row[PasadoEnMes];
        	$P=$P."</div>";
			if($row[Cerrado]) { 
			   $P=$P."<div class=\"contenedor-columna-cerrado\">";
			   $P=$P."CERRADO"; }
			ELSE { 
   			   $P=$P."<div class=\"contenedor-columna\">";
			   $P=$P."ABIERTO"; }
        	$P=$P."</div>
    		     </div>
	</div>";
	}
// UPDATE tblComprobantes SET Cerrado=1 WHERE Empresa='".$formData['cmbEmpresasCerrarLibro']."' and PasadoEnMes='".$formData['LibroMesCerrarLibro']."' and Anio='".$formData['LibroAnioCerrarLibro']."' and ParticipaEnIva='SI'";
// 		$result = mysql_db_query($_SESSION['db'],$sSql);
// $objResponse->alert($sSql.$P);
	$objResponse->assign("DivLibrosC","innerHTML",$P);
	return $objResponse;
}

$xajax = new xajax();
$xajax->registerFunction("CargarCuitProveerdor");
$xajax->registerFunction("LlamarFiltro");
$xajax->registerFunction("LlamarFiltro2");
$xajax->registerFunction("AgregarComprobante");
$xajax->registerFunction("CargarDatosComprobante");
$xajax->registerFunction("NuevoComprobante");
$xajax->registerFunction("ModificarComprobante1");
$xajax->registerFunction("EliminarComprobante");
$xajax->registerFunction("AcumuladoIVA");
$xajax->registerFunction("AgregarDesgloce");
$xajax->registerFunction("SolicitarDeudaProveedores");
$xajax->registerFunction("SolicitarDeudaPorAreas");
$xajax->registerFunction("CargarAreasCuentas");
$xajax->registerFunction("CargarAreasCuentas1");
$xajax->registerFunction("DibujarLibrosCerrados");
$xajax->registerFunction("CerrarLibro");
$xajax->processRequest();

echo "<head><title>Ventas</title>";
	$xajax_files = array();
	$xajax_files[] = array("../../ajax/xajaxjs/xajax_core.js", "xajax");
	$xajax->printJavascript("../", $xajax_files)
?>
<script type="text/javascript">
function setupCallback() {
	xajax.callback.global.onRequest = function(){ alert('In global.onRequest'); };
	xajax.callback.global.onFailure = function(args)
	{
		alert("In global.onFailure...HTTP status code: " + args.request.status);
	}
	xajax.callback.global.onComplete = function(){ alert('In global.onComplete'); };
	var cb = xajax.callback.create();
	cb.onRequest = function() { alert('Original onRequest'); };
	cb.onResponseDelay = function(){ alert('Original onRequestDelay'); };
	cb.timers.onResponseDelay.delay = 2600;
	return cb;
}
</script>
<?php include_once("Estilos.css"); ?>


<!-- Tags para el tab -->
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.8.1/build/fonts/fonts-min.css" /> 
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.8.1/build/tabview/assets/skins/sam/tabview.css" /> 
<script type="text/javascript" src="http://yui.yahooapis.com/2.8.1/build/yahoo-dom-event/yahoo-dom-event.js"></script> 
<script type="text/javascript" src="http://yui.yahooapis.com/2.8.1/build/element/element-min.js"></script> 
<script type="text/javascript" src="http://yui.yahooapis.com/2.8.1/build/tabview/tabview-min.js"></script> 
<script language="javascript" type="text/javascript" src="/sistema/calendario/datetimepicker.js"></script>

<!-- MASCARA PARA NUMEROS -->
<script src="../../sistema/jquery.js" type="text/javascript"></script>
<script src="../../sistema/jquery.maskedinput.js" type="text/javascript"></script>
<script src="../../sistema/jquery.maskMoney.js" type="text/javascript"></script>


<script>
    jQuery(function($){
    $("#Bruto").maskMoney({thousands:'',allowNegative:true,decimal:'.'});
    $("#Exento").maskMoney({thousands:'',allowNegative:true,decimal:'.'});
    $("#ImpInterno").maskMoney({thousands:'',allowNegative:true,decimal:'.'});
    $("#PercIva").maskMoney({thousands:'',allowNegative:true,decimal:'.'});
    $("#RetencionIB").maskMoney({thousands:'',allowNegative:true,decimal:'.'});
    $("#RetencionGan").maskMoney({thousands:'',allowNegative:true,decimal:'.'});
    $("#MontoPagado").maskMoney({thousands:'',allowNegative:true,decimal:'.'});
    //$("#DeudaDesde").mask("9999-99-99");
    //$("#DeudaHasta").mask("9999-99-99");
    //$("#CreditoDesde").mask("9999-99-99");
    //$("#CreditoHasta").mask("9999-99-99");
    
    });

    </script>


<style type="text/css"> 
/*margin and padding on body element can introduce errors in determining element position and are not recommended;
  we turn them off as a foundation for YUI CSS treatments. */
body {
	margin:0;
	padding:0  ;
	background-color:#d3f2b2;
}
table, th, td {
    font-weight : normal;
    font-family:arial;
font-family: trebuchet MS , Lucida sans , Arial;
/*   font-size: 10px; */
  color: #444;
 
  border: solid #ccc 1px;
  border-collapse: separate;
  border-spacing: 0;

}
table { 
  -moz-border-radius: 6px;
  -webkit-border-radius: 6px;
  border-radius: 6px;
}
navbar, navbar-default {
	margin:0;
	padding:0;
	margin-bottom: 10px;
}
yui-navset {
	margin-top:200px;
	padding:100;
}
</style> 

    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1"> 

<center>

<? print $encabezado; ?>
		<link href = "bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href = "bootstrap/css/bootstrap.css" rel="stylesheet">
		<link href = "bootstrap/js/bootstrap.js" rel="stylesheet">
</head>
<!-- <body class="yui-skin-sam"  onload="xajax.call('CargarAreasCuentas1', {method: 'get', parameters:[cmbEmpresas.value]});"> -->
  		<?php 
  		$_SESSION['Modulo']="V E N T A S";
  		echo '<body class="yui-skin-sam" onload="xajax.call(\'CargarAreasCuentas1\', {method: \'get\', parameters:['.$_SESSION['CuitEmpresa'].']});">';
  		
                //$_SESSION['CuitEmpresa']=$_GET['Empresa'];
                include "navbar.php";
  		?>

<!-- Proveedores=document.getElementById(\'FProveedores\').value; Mes=document.getElementById(\'FMes\').value; ParticipaIva=document.getElementById(\'FParticipaIva\').value; Areas1=document.getElementById(\'FAreas\').value; Cuentas1=document.getElementById(\'FCuentas\').value; Empresa=document.getElementById(\'cmbEmpresas\').value; Detalle2=document.getElementById(\'FDetalle2\').value; Anio1=document.getElementById(\'FAnio\').value;  -->
<?php $ElFiltro=' 
xajax.call(\'LlamarFiltro\', {method: \'get\', parameters:[FProveedores.value,FMes.value,FParticipaIva.value,FAreas.value,FCuentas.value,FAnio.value,FDetalle2.value]});'?>

<form id="testForm3" onSubmit="return false">
<div id="demo" class="yui-navset">
    <ul class="yui-nav">
        <li class="selected"><a href="#tab1"><em>Gestionar	 Comprobantes</em></a></li> 
        <li ><a href="#tab2"><em>Saldo Cuentas Bancarias</em></a></li> 
        <li ><a href="#tab3"><em>Deuda a Proveedores</em></a></li> 
        <li ><a href="#tab4"><em>Deuda por area/sector</em></a></li> 
        <li ><a href="#tab5"><em>Libro de Iva</em></a></li> 
	<li ><a href="#tab6"><em>Cerrar Libros Iva</em></a></li> 
    </ul>
    <div class="yui-content" style="background:#d3f2b2;"> 
  <div id="tab1" style="background=#FFF;">
<font face="Verdana" size="1">

<table border="1"style="font-size : 1px; margin-bottom: 0px;" class="table table-responsive table-hover">
  <tbody bgcolor="#EFF3F7" bordercolor="#FFFFFF" style="font-family : Verdana; font-size : 12px; font-weight : 300;">
    <r align="center">
<td>
<div id="Empresas" style="background:#d3f2b2;">
<? 
//$Eventos=" onChange=\"xajax.call('CargarAreasCuentas1', {method: 'get', parameters:[cmbEmpresas.value]});\" onClick=\"xajax.call('CargarAreasCuentas1', {method: 'get', parameters:[cmbEmpresas.value]});\"";

// $Eventos=' onkeypress="javascript:if(getKeyCode(event)==13) document.forms[0].Comprobante.focus();"  onChange="xajax.call(\'CargarAreasCuentas\', {method: \'get\', parameters:[xajax.getFormValues(\'testForm3\')]});" onClick="xajax.call(\'CargarAreasCuentas\', {method: \'get\', parameters:[xajax.getFormValues(\'testForm3\')]}); return false;"';
//CargarCombo("cmbEmpresas","ViewUsuariosEmpresas WHERE NombreUsuario='".$_SESSION['usuario']."'","Nombre","Cuit","","Empresas"," ",$Eventos,250,1,0);
//echo CargarCombo("cmbEmpresas","tblVentas1","DISTINCT Empresa","","Empresas"," ",$Eventos,100,1);
// $Eventos="";
?>
<!-- <INPUT type="submit" value="Nuevo" onClick="xajax.call('NuevoComprobante', {method: 'get', parameters:[xajax.getFormValues('testForm3')]}); return false;"> 
AltaEmpresa=document.getElementById('cmbEmpresas').value; 
 AltaCuitProveedores=document.getElementById('cmbProveedores').value; 
 AltaAnio1 =document.getElementById('Anio').value; 
 AltaComprobante=document.getElementById('Comprobante').value; 
 AltaDetalle1=document.getElementById('Detalle').value; 
 AltaFecha=document.getElementById('Fecha').value; 
 AltaPasadoEnMes=document.getElementById('PasadoEnMes').value; 
 AltaAreas1=document.getElementById('Areas').value; 
 AltaCuentas1=document.getElementById('Cuentas').value;
 AltaBruto=document.getElementById('Bruto').value; 
 AltaParticipaEnIva=document.getElementById('ParticIva').value; 
 AltaIvaComp=document.getElementById('Iva').value; 
 AltaExento=document.getElementById('Exento').value; 
 AltaImpInterno=document.getElementById('ImpInterno').value; 
 AltaPercIva=document.getElementById('PercIva').value; 
 AltaRetencionIB=document.getElementById('RetencionIB').value; 
 AltaRetencionGan=document.getElementById('RetencionGan').value; 
 AltaNeto=document.getElementById('Neto').value; 
 AltaMontoPagado=document.getElementById('MontoPagado').value; 
 AltaCantLitros=document.getElementById('CantLitros').value;

<INPUT  class="ButtonAceptar" type="submit" value="Agregar" onClick="
 

xajax.call('AgregarComprobante', {method: 'get', parameters:[Anio.value,PasadoEnMes.value,ParticIva.value,Areas.value,Cuentas.value,Iva.value,cmbProveedores.value,Comprobante.value,Fecha.value,Detalle.value,Bruto.value,Exento.value,ImpInterno.value,PercIva.value,Neto.value,MontoPagado.value,CantLitros.value]}); <?php echo $ElFiltro; ?> ">

<INPUT class="ButtonModificar" type="submit" value="Modificar" onclick="xajax.call('ModificarComprobante1', {method: 'get',parameters:[Anio.value,PasadoEnMes.value,ParticIva.value,Areas.value,Cuentas.value,Iva.value,cmbProveedores.value,Comprobante.value,Fecha.value,Detalle.value,Bruto.value,Exento.value,ImpInterno.value,PercIva.value,Neto.value,MontoPagado.value,CantLitros.value,IdComp.value]});" <?php echo $ElFiltro; ?> >
<INPUT  class="ButtonEliminar" type="submit" value="Eliminar" onClick="Preguntar(); ElimBorrar=document.getElementById('Borrar').value; ElimIdComp=document.getElementById('IdComp').value; xajax.call('EliminarComprobante', {method: 'get', parameters:[ElimIdComp,ElimBorrar]});  <?php echo $ElFiltro; ?> ">-->
<!-- alert(Anio.value+cmbEmpresas.value+PasadoEnMes.value+ParticIva.value+Areas.value+Cuentas.value+Iva.value+cmbProveedores.value+Comprobante.value+Fecha.value+Detalle.value+Bruto.value+Exento.value+ImpInterno.value+PercIva.value); -->
<!-- +Neto.value+MontoPagado.value+CantLitros.value+IdComp.value -->
<!--<INPUT  class="ButtonModificar" type="submit" value="Modificar" onClick="xajax.call('ModificarComprobante', {method: 'get', parameters:[xajax.getFormValues('testForm3')]});  <?php echo $ElFiltro; ?> ">-->

<div class="col-md-12 col-xs-12" style="align-content: center; background: #d3f2b2;">
	<div class="col-xs-3 col-md-3 col-md-offset-1">
		<input class="ButtonAceptar form-control col-md-3 btn btn-success" type="submit" value="Agregar" onClick="xajax.call('AgregarComprobante', {method: 'get', parameters:[Anio.value,PasadoEnMes.value,ParticIva.value,Areas.value,Cuentas.value,Iva.value,cmbProveedores.value,Comprobante.value,Fecha.value,Detalle.value,Bruto.value,Exento.value,ImpInterno.value,PercIva.value,Neto.value,MontoPagado.value,CantLitros.value]}); <?php echo $ElFiltro2; ?> ">
	</div>
	<div class="col-xs-3 col-md-3">
		<input class="ButtonModificar form-control col-xs-3 col-md-3 btn btn-warning" type="submit" value="Modificar" onClick="xajax.call('ModificarComprobante1', {method: 'get', parameters:[Anio.value,PasadoEnMes.value,ParticIva.value,Areas.value,Cuentas.value,Iva.value,cmbProveedores.value,Comprobante.value,Fecha.value,Detalle.value,Bruto.value,Exento.value,ImpInterno.value,PercIva.value,Neto.value,MontoPagado.value,CantLitros.value,IdComp.value]}); <?php echo $ElFiltro2; ?> ">
	</div>
	<div class="col-xs-3 col-md-3">
        <input type="hidden" id="VartxtFecha" name="VartxtFecha">
        <input type="hidden" id="VarComprobante" name="VarComprobante">
        <input type="hidden" id="VartxtCuitProveedores" name="VartxtCuitProveedores">
        
        <input class="ButtonEliminar form-control col-xs-3 col-md-3 btn btn-danger" type="submit" value="Eliminar" onClick="Preguntar(); ElimBorrar=document.getElementById('Borrar').value; ElimIdComp=document.getElementById('IdComp').value; xajax.call('EliminarComprobante', {method: 'get', parameters:[ElimIdComp,ElimBorrar]}); <?php echo $ElFiltro2; ?> ">
        <input type="hidden" id="Borrar" name="Borrar" value="0">
        <input type="hidden" id="Cerrar" name="Cerrar" value="0" onchange="xajax.call('CargarAreasCuentas1', {method: 'get', parameters:[cmbEmpresas.value]});">
	</div>
</div>



<INPUT type="hidden" id="VartxtFecha" name="VartxtFecha">
<INPUT type="hidden" id="VarComprobante" name="VarComprobante">
<INPUT type="hidden" id="VartxtCuitProveedores" name="VartxtCuitProveedores">
<INPUT type="hidden" id="Borrar" name="Borrar" value="0">
<INPUT type="hidden" id="Cerrar" name="Cerrar" value="0">
<!-- <INPUT type="button" value="Volver" onClick="javascript: window.location.href='../sistema/menu.php';"> -->
</div>
<table border="1"style="font-size : 1px; margin-bottom: 0px;" class="table table-responsive table-hover">
  <tbody bgcolor="#b3f36f" bordercolor="#FFFFFF" style="font-family : Verdana; font-size : 12px; font-weight : 300;">
    <tr align="center">
      <td>Fecha</td>
      <td>Cliente</td>
      <td>Cuit</td>
      <td>Comprobante</td>
      <td>Detalle</td>
		<td>A&ntilde;o</td>
	  <!-- <td>Haber</td> -->
      <td>PasadoEnMes</td>
      <td>Area</td>
      <td>Cuenta</td>
    </tr>
    <tr><input id="IdComp" name="IdComp" type="hidden" size="10">
      <td><input id="Fecha" name="txtFecha" type="date" size="10" onkeypress="javascript:if(getKeyCode(event)==13) document.forms[0].cmbProveedores.focus();" >
      	<!-- <a href="javascript:NewCal('Fecha','YYYYMMDD')"><img src="calendario/cal.gif" width="16" height="16" border="0" alt="Ingrese fecha"></a> -->
      </td>
      <td>
	<div id="Proveedores">
	  <?php setlocale(LC_MONETARY, 'en_ES');
 		////$Eventos='  onChange="xajax.call(\'CargarCuitProveerdor\', {method: \'get\', parameters:[cmbProveedores.value]});" onClick="xajax.call(\'CargarCuitProveerdor\', {method: \'get\', parameters:[cmbProveedores.value]});"';
		////CargarCombo("cmbProveedores","tblProveedores","NombreProveedor","NombreProveedor","Cuit<>'' ORDER BY NombreProveedor","Proveedores"," ",$Eventos,50,1,"");
		?>
	</div>
      </td>
      <td><div id="CuitProveedores"><INPUT type="text" name="txtCuitProveedores" size="11" id="txtCuitProveedores"></div></td>
      <td><INPUT type="text" name="Comprobante" id="Comprobante" align="left" size="10" onkeypress="javascript:if(getKeyCode(event)==13) document.forms[0].Detalle.focus();"></td>
      <td><INPUT type="text" id="Detalle" name="Detalle" size="10" onkeypress="javascript:if(getKeyCode(event)==13) document.forms[0].ParticIva.focus();"></td>

      <td align="center"><SELECT id="Anio" name="Anio"><OPTION>2021</OPTION><OPTION>2020</OPTION><OPTION>2019</OPTION><OPTION>2018</OPTION><OPTION>2017</OPTION><OPTION>2016</OPTION><OPTION>2015</OPTION><OPTION>2014</OPTION><OPTION>2013</OPTION><OPTION>2012</OPTION></SELECT>

<!-- 	<INPUT type="text" id="anio" name="anio" size="10" onkeypress="javascript:if(getKeyCode(event)==13) document.forms[0].Haber.focus();"  onkeyup="CalcularNeto();"> -->
	</td>

		<!-- <td> -->
			<INPUT type="hidden" id="Haber" name="Haber" size="10" onkeypress="javascript:if(getKeyCode(event)==13) document.forms[0].PasadoEnMes.focus();" onkeyup="CalcularNeto();">
		<!-- </td> -->
      <td><div id="DivPasadoEnMes"><?php $Eventos='onkeypress="javascript:if(getKeyCode(event)==13) document.forms[0].cmbAreas.focus();"'; CargarCombo("PasadoEnMes","","","Meses","Meses","PasadoEnMes"," ",$Eventos,90,1,0); ?></div></td>
      <td><div id="DivAreas">  <?php $Eventos='onkeypress="javascript:if(getKeyCode(event)==13) document.forms[0].cmbCuentas.focus();"'; //CargarCombo("cmbAreas", "tblAreas",  "DescripcionAreas",  " Empresa='20943576727'","Areas"," ",$Eventos,80); ?>   </div></td>
      <td><div id="DivCuentas"><?php //CargarCombo("cmbCuentas","tblCuentas","DescripcionCuentas"," WHERE Empresa=".$formData['cmbEmpresas'] ,"Cuentas"," ","",100); ?> </div></td>
    </tr>
    <tr align="center">
      <td>Bruto</td>
      <td>ParticIva&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          Iva</td>
      <td>Exento</td>
      <td>Imp.Interno</td>
      <td>Perc.Iva</td>
      <td>Neto</td>
      <td onclick="javascript:document.getElementById('MontoPagado').value=document.getElementById('Neto').value;">Monto Pagado</td>
      <td>PagosParciales</td>
      <td>CantLitros</td>
    </tr>
    <tr>
      <td><input type="text" name="Bruto" style="text-align:right;" id="Bruto" size="8" onfocus="this.select();" onblur="CalcularNeto();" onchange="CalcularNeto();" onkeyup=" CalcularNeto(); return soloNumero(this.value,10,2);" ></td>    
      <!--  <td><INPUT type="text" name="Bruto" align="right" id="Bruto" size="10" onkeypress="javascript:if(getKeyCode(event)==13) document.forms[0].Iva.focus();" onfocus="return validacion(this); CalcularNeto();" onblur="return validacion(this); CalcularNeto();" onkeyup="CalcularNeto();"></td>-->
      <td><div id="DivParticIva"><?php $Eventos='onkeypress="javascript:if(getKeyCode(event)==13) document.forms[0].PasadoEnMes.focus();"'; CargarCombo("ParticIva","tblParticIva","DescripcionPartic","DescripcionPartic","","ParticIva"," ",$Eventos,50,1,0); ?>
        	  <SELECT name="Iva" id="Iva" onkeypress="javascript:if(getKeyCode(event)==13) document.forms[0].Exento.focus();" onchange="CalcularNeto();" onclick="javascript:if(getKeyCode(event)==13) document.forms[0].Exento.focus();" ><OPTION>21.00</OPTION><OPTION>10.50</OPTION><OPTION>27.00</OPTION><OPTION>0.00</OPTION></SELECT> </td></div>
      <td><INPUT type="text" name="Exento"       align="right" id="Exento"       size="10" onblur="return validacion(this); CalcularNeto();" onkeyup="CalcularNeto();" onkeypress="javascript:if(getKeyCode(event)==13) document.forms[0].ImpInterno.focus();"></td>
      <td><INPUT type="text" name="ImpInterno"   align="right" id="ImpInterno"   size="10" onblur="return validacion(this); CalcularNeto();" onkeyup="CalcularNeto();" onkeypress="javascript:if(getKeyCode(event)==13) document.forms[0].PercIva.focus();"></td>
      <td><INPUT type="text" name="PercIva"      align="right" id="PercIva"      size="10" onblur="return validacion(this); CalcularNeto();" onkeyup="CalcularNeto();" onkeypress="javascript:if(getKeyCode(event)==13) document.forms[0].Neto.focus();"></td>
      <td><INPUT type="text" name="Neto"         align="right" id="Neto"         size="10" onblur="return validacion(this); CalcularNeto();" onkeypress="javascript:if(getKeyCode(event)==13) document.forms[0].MontoPagado.focus();"></td>
      <td><INPUT type="text" name="MontoPagado"  align="right" id="MontoPagado"  size="10" onblur="return validacion(this); CalcularNeto();" onkeypress="javascript:if(getKeyCode(event)==13) document.forms[0].PagosParcial.focus();"></td>
      <td><INPUT type="text" name="PagosParcial" align="right" id="PagosParcial" size="10" onblur="return validacion(this); CalcularNeto();" onkeypress="javascript:if(getKeyCode(event)==13) document.forms[0].CantLitros.focus();"></td>
      <td><INPUT type="text" name="CantLitros"   align="right" id="CantLitros" size="10" onblur="return validacion(this);"></td>
    </tr>
  </tbody>
</table>

</td>
</tr>
</tbody>
</table>

<!--<INPUT type="submit" onClick="xajax.call('CargarDatosComprobante', {method: 'get',parameters:[xajax.getFormValues('testForm3'),'0000-00-00 202020 20-15268043-1']}); return false;"> -->
<!--<INPUT type="checkbox" id="" name="pepe y juan" onChange="alert('pepe');">-->
<Table class="table table-responsive table-hover" title="Filtrar por:" border="1">
  <TR>
    <TD>Actualiz</TD><TD>Mes</TD><TD>Cliente</TD><TD>ParticIva</TD><TD>Detalle</TD><TD>Area</TD><TD>Cuenta</TD><TD>MostrarTodos</TD><TD>A&ntilde;o</TD><td align="center">Asc. C/Saldo</td>
  </TR>
  <TR><?php 
$Filtro='onClick="
xajax.call(\'LlamarFiltro\', {method: \'get\', parameters:[FProveedores.value,FMes.value,FParticipaIva.value,FAreas.value,FCuentas.value,FAnio.value,FDetalle2.value]})"

onChange="
xajax.call(\'LlamarFiltro\', {method: \'get\', parameters:[FProveedores.value,FMes.value,FParticipaIva.value,FAreas.value,FCuentas.value,FAnio.value,FDetalle2.value]})"';
 ?>
    <TD align="center"><input type="button" <?php echo $Filtro; ?>></TD>
    <TD><?php CargarCombo("FMes","","Meses","Meses","Meses","FMes2"," ",$Filtro,100,1,"");?></TD>
    <TD><div id="ProveedoresComprobantes"></div><?php //CargarCombo("FProveedores","tblProveedores","NombreProveedor","NombreProveedor","Cuit<>'' ORDER BY NombreProveedor","Proveedores"," ",$Filtro,50,1,0);?></TD>
    <TD><?php CargarCombo("FParticipaIva","tblParticIva","DescripcionPartic","DescripcionPartic","","ParticIva"," ",$Filtro,30,1,0); ?></TD>
    <TD><div id="Detallen"><?php CargarCombo("FDetalle2", "tblVentas1",  "distinct DetalleComp", "", "","Detalle"," ",$Filtro,100,1,0); ?></div></TD>
    <TD><div id=DivFAreas></div></TD>
    <TD><div id=DivFCuentas></div></TD>
    <TD><SELECT name="FFiltrar"><OPTION>Si</OPTION><OPTION>No</OPTION></SELECT></TD>
    <TD><SELECT name="FAnio" <?php echo $Filtro;?> ><OPTION>2021</OPTION><OPTION>2020</OPTION><OPTION>2019</OPTION><OPTION>2018</OPTION><OPTION>2017</OPTION><OPTION>2016</OPTION><OPTION>2015</OPTION><OPTION>2014</OPTION><OPTION>2013</OPTION><OPTION>2012</OPTION></SELECT></TD>
    <td><input type="checkbox" name="FOrden" checked="true" id="FOrden"><input type="checkbox" name="FConSaldo" checked="false" id="FConSaldo"></input></td>
  </TR>
</Table>
<div id="Filtro"></div>
</font>
  </div>
  <div id="tab2">
<font face="Verdana" size="1">
<Table title="Filtrar por:" border="1">
  <TR>
    <TD>Mes</TD><TD>Proveedor</TD><TD>ParticIva</TD><TD>Detalle</TD><TD>Area</TD><TD>Cuenta</TD><TD>MostrarTodos</TD><TD>Desde</TD><TD>Hasta</TD><TD>Empresa</TD>
  </TR>
  <TR><?php /*$Filtro='onClick="xajax.call('."'".'LlamarFiltro2'."'".', {method: '."'".'get'."'".', parameters:[xajax.getFormValues('."'".'testForm3'."'".')]}); return false;" onChange="xajax.call('."'".'LlamarFiltro2'."'".', {method: '."'".'get'."'".', parameters:[xajax.getFormValues('."'".'testForm3'."'".')]}); return false;"';*/ 
$Filtro2='onClick="
xajax.call(\'LlamarFiltro2\', {method: \'get\', parameters:[FProveedores2.value,FMes2.value,FParticipaIva2.value,FAreas2.value,FCuentas2.value,F2Anio.value,FFDesde.value,FFHasta.value]});"

onChange="
xajax.call(\'LlamarFiltro2\', {method: \'get\', parameters:[FProveedores.value,FMes.value,FParticipaIva.value,FAreas.value,FCuentas.value,FAnio.value,FDetalle2.value]});"';

?>
    <TD><?php CargarCombo("FMes2","","","Meses","Meses","FMes2"," ",$Filtro2,100,1,0);?></TD>
    <TD><div id="ProveedoresDeuda"></div><?php //CargarCombo("FProveedores2","tblProveedores","NombreProveedor","NombreProveedor","Cuit<>'' ORDER BY NombreProveedor","Proveedores"," ",$Filtro2,100,1,0);?></TD>
    <TD><?php CargarCombo("FParticipaIva2","tblParticIva","DescripcionPartic","DescripcionPartic","","ParticIva"," ",$Filtro2,30,1,0); ?></TD>
    <TD><div id="Detalle"><?php CargarCombo("FDetalle", "tblComprobantes",  "distinct DetalleComp", "", "","Detalle"," ",$Filtro2,100,1,0); ?></div></TD>
    <TD><div id=DivFAreas2></div></TD>
    <TD><div id=DivFCuentas2></div></TD>
    <TD><SELECT name="FFiltrar"><OPTION>Si</OPTION><OPTION>No</OPTION></SELECT></TD>
    <TD><INPUT type="text" id="FFDesde" name="FFDesde" value="2012-01-01" <?echo $Filtro2;?> </TD>
    <TD><INPUT type="text" id="FFHasta" name="FFHasta" <?echo $Filtro2; echo " value=\"".date("Y-m-d")."\""; ?> > </TD>
    <TD><?php //CargarCombo("cmbDeudaEmpresa","tblVentas1","DISTINCT Empresa","Empresa","","Empresas"," ",$Eventos,100,1,0);
                echo "Empresa: ".$_SESSION['NombreEmpresa']."&nbsp&nbsp";
				//CargarCombo("cmbDeudaEmpresa","ViewUsuariosEmpresas WHERE NombreUsuario='".$_SESSION['usuario']."'","Nombre","Cuit","","Empresas"," ",$Eventos,250,1,0);
				//CargarCombo("cmbDeudaEmpresa","ViewUsuariosEmpresas WHERE NombreUsuario='".$_SESSION['usuario']."'","Empresa","Empresa","","Empresas"," ",$Eventos,100,1,0);?></TD>
    <TD><SELECT id="FFiltrar" name="FFiltrar"><OPTION>Si</OPTION><OPTION>No</OPTION></SELECT></TD>
    <TD><SELECT id="F2Anio" name="F2Anio" <?php $Filtro2 ?>><OPTION>2021</OPTION><OPTION>2020</OPTION><OPTION>2019</OPTION><OPTION>2018</OPTION><OPTION>2017</OPTION><OPTION>2016</OPTION><OPTION>2015</OPTION><OPTION>2014</OPTION><OPTION>2013</OPTION><OPTION>2012</OPTION></SELECT></TD>
  </TR>
</Table>
<div class="content" style="none repeat scroll 0 0;overflow:auto;color:#ffffff;width:98%;height:60%;	:4px;">
	<div id="Filtro2"></div>
</div>
</font>
	
  </div>

  <div id="tab3">
	<div id="DivCmbDeuda"></div>
	<?php // CargarCombo("cmbAreasDeudasProov", "tblAreas",  "DescripcionAreas",  "","Areas","Todos",'',100,1); ?>
	<INPUT class="ButtonAceptar" type="button" onclick="xajax.call('SolicitarDeudaProveedores', {method: 'get', parameters:[CmbDeuda.value,DeudaAnio.value]}); return false;" value="Solicitar Deuda">

	<INPUT class="ButtonAceptar" type="button" onclick="var xxx='../sistema/DeudaProveedoresPDF.php?mas='+getElementById('cmbAreasDeudasProov').value; window.open(xxx,'nuevaVentana','width=300, height=400');" value="Generar PDF">
    	<SELECT name="DeudaAnio"><OPTION>Todos</OPTION><OPTION>2021</OPTION><OPTION>2020</OPTION><OPTION>2019</OPTION><OPTION>2018</OPTION><OPTION>2017</OPTION><OPTION>2016</OPTION><OPTION>2015</OPTION><OPTION>2014</OPTION><OPTION>2013</OPTION><OPTION>2012</OPTION></SELECT>
	<div id="DeudaProveedores"></div>
  </div>
<div id="tab4">
	<INPUT class="ButtonAceptar" type="button" onclick="xajax.call('SolicitarDeudaPorAreas', {method: 'get', parameters:[AreasAnio.value,DeudaQuienes.value]}); return false;" value="Solicitar Deuda por Area">
	<INPUT class="ButtonAceptar" type="button" onclick="var xxx='../sistema/DeudaPorAreasPDF.php'; window.open(xxx,'nuevaVentana','width=300, height=400');" value="Generar PDF">
    	<select id="DeudaQuienes" name="DeudaQuienes">
			<option value="Todos">Todos</option>
			<option value="Si">SI</option>
			<option value="No">NO</option>
    	</select> 
    	
    	<SELECT name="AreasAnio" <?php $Filtro ?>><OPTION>2021</OPTION><OPTION>2020</OPTION><OPTION>2019</OPTION><OPTION>2018</OPTION><OPTION>2017</OPTION><OPTION>2016</OPTION><OPTION>2015</OPTION><OPTION>2014</OPTION><OPTION>2013</OPTION><OPTION>2012</OPTION></SELECT>
	<div id="DeudaPorAreas"></div>
</div>
  <div id="tab5">
	<?php 
	
	   //$Filtro="onChange=\"var PasadoEnMes=getElementById('LibroMes') ; var Empresa=getElementById('cmbEmpresasLibroIva'); var Anio=getElementById('LibroAnio'); var xxx='../sistema/LibroIvaPDF.php?PasadoEnMes=' + PasadoEnMes.value + '&Anio=' + Anio.value + '&Empresa=' + ".$_SESSION['CuitEmpresa']." + '&Compra=0'; window.open(xxx,'nuevaVentana','width=300, height=400')\"";
	   $Filtro="onChange=\"var PasadoEnMes=getElementById('LibroMes') ; var Empresa=getElementById('cmbEmpresasLibroIva'); var Anio=getElementById('LibroAnio'); var xxx='../sistema/LibroIvaPDF.php?PasadoEnMes=' + PasadoEnMes.value + '&Anio=' + Anio.value + '&Empresa=' + ".$_SESSION['CuitEmpresa']." + '&Compra=0'; window.open(xxx,'nuevaVentana','width=300, height=400')\"";
	   echo "Empresa: ".$_SESSION['NombreEmpresa']."&nbsp&nbsp";
// <input type="submit" value="PDF" onClick="var PasadoEnMes=getElementById('LibroMes'); var xxx='../sistema/LibroIvaPDF.php?PasadoEnMes=' + PasadoEnMes.value; window.open(xxx,'nuevaVentana','width=300, height=400');">
	//CargarCombo("cmbEmpresasLibroIva","ViewUsuariosEmpresas WHERE NombreUsuario='".$_SESSION['usuario']."'","Nombre","Cuit","","Empresas"," ",$Filtro,250,1,0);
	CargarCombo("LibroMes","","","Meses","Meses","LibroMes"," ",$Filtro,100,1,0);
	echo '<SELECT name="LibroAnio" id="LibroAnio" '. $Filtro . '><OPTION>2021</OPTION><OPTION>2020</OPTION><OPTION>2019</OPTION><OPTION>2018</OPTION><OPTION>2017</OPTION><OPTION>2016</OPTION><OPTION>2015</OPTION><OPTION>2014</OPTION><OPTION>2013</OPTION><OPTION>2012</OPTION> <OPTION>2011</OPTION> <OPTION>2010</OPTION> </SELECT>'; ?>
<!--<INPUT type="button" onclick="var PasadoEnMes=getElementById('LibroMes'); var Anio=getElementById('LibroAnio'); var xxx='../sistema/LibroIvaPDF.php?PasadoEnMes=' + PasadoEnMes.value + '&Anio=' + Anio.value ;window.open(xxx,'nuevaVentana','width=600, height=800');">-->
  </div>
<div id="tab6">
	<?php 
$Filtro='onChange=" xajax.call(\'DibujarLibrosCerrados\', {method: \'get\', parameters:[LibroAnioCerrarLibro.value]});"';
	//CargarCombo("cmbEmpresasCerrarLibro","ViewUsuariosEmpresas WHERE NombreUsuario='".$_SESSION['usuario']."'","Nombre","Cuit","","Empresas"," ",$Filtro,250,1,"");
    echo "Empresa: ".$_SESSION['NombreEmpresa']."&nbsp&nbsp";
	CargarCombo("LibroMesCerrarLibro","","","Meses","Meses","LibroMesCerrarLibro"," ",$Filtro,100,1,"");
	echo '<SELECT name="LibroAnioCerrarLibro" id="LibroAnioCerrarLibro" '. $Filtro . '><OPTION>2021</OPTION><OPTION>2020</OPTION><OPTION>2019</OPTION><OPTION>2018</OPTION><OPTION>2017</OPTION><OPTION>2016</OPTION><OPTION>2015</OPTION><OPTION>2014</OPTION><OPTION>2013</OPTION><OPTION>2012</OPTION> <OPTION>2011</OPTION><OPTION>2010</OPTION></SELECT>'; ?>
	<INPUT class="ButtonEliminar" type="button" value= "Cerrar Libro" onclick="PreguntarCerrar(); 
  xajax.call('CerrarLibro', {method: 'get', parameters:[Cerrar.value,LibroAnioCerrarLibro.value,LibroMesCerrarLibro.value]});
  xajax.call('DibujarLibrosCerrados', {method: 'get', parameters:[LibroAnioCerrarLibro.value]}); return false;">
<div id="DivLibrosC"></div>
  </div>

<div class="BotonVolver2 form-group col-md-2">
 
 <?php  
	       if ($_SESSION['NuevoMenu']==true) { 
	           echo '<button type="button" class="btn btn-info" onClick="javascript: window.location.href=\'../../sistema/menu1.php\';">Volver al principio</button>'; }
           else {
	           echo '<button type="button" class="btn btn-info" onClick="javascript: window.location.href=\'../../sistema/menu1.php\';">Volver al principio</button>'; } 
 ?>
</div>
  
<!-- <INPUT class="ButtonVolver" type="button" value="Volver" onClick="javascript: window.location.href='../sistema/menu.php';"> -->


 </div>
</div>

<!--<button id="btnIngresar" class="btn btn-default" onkeyup="fncKeyStop(document.getElementById(this));" name="btnIngresar" type="submit">Ingresar</button>-->

<script type="text/javascript">
function CalcularNeto() {
var Haber=Number(document.getElementById('Haber').value);
var Bruto=Number(document.getElementById('Bruto').value);
var Iva=Number(document.getElementById('Iva').value);
var Exento=Number(document.getElementById('Exento').value);
var ImpInterno=Number(document.getElementById('ImpInterno').value);
var PercIva=Number(document.getElementById('PercIva').value);
var Neto=Number(Bruto+(Bruto*Iva/100)+Exento+ImpInterno+PercIva+Haber);

document.getElementById('Neto').value=Number(Neto.toFixed(2));;
}

function validacion(f)  {
f.value=parseFloat(f.value.replace(",","."));
}

    //*** Este Codigo permite Validar que sea un campo Numerico
    function Solo_Numerico(variable){
        Numer=parseFloat(variable);
        if (isNaN(Numer)){
            return "";
        }
        return Numer;
    }
    function ValNumero(Control){
        Control.value=Solo_Numerico(Control.value);
    }
    //*** Fin del Codigo para Validar que sea un campo Numerico

function getKeyCode(e)
{
e= (window.event)? event : e;
intKey = (e.keyCode)? e.keyCode: e.charCode;
return intKey;
}
function Preguntar() { 
	Respuesta=confirm("Seguro que quiere eliminar?");
	if (Respuesta) { document.getElementById('Borrar').value=1; }
}
function PreguntarCerrar() { 
	Respuesta=confirm("Seguro que quiere CERRAR el libro?");
	if (Respuesta) { document.getElementById('Cerrar').value=1; }
}
</script> 



</form>
<script> 
(function() {
    var tabView = new YAHOO.widget.TabView('demo');
 
    YAHOO.log("The example has finished loading; as you interact with it, you'll see log messages appearing here.", "info", "example");
})();
</script> 

</body>
</html>

<script type="text/javascript" src="http://l.yimg.com/d/lib/rt/rto1_78.js"></script>
<script>var rt_page="792404224:FRTMA"; var rt_ip="190.113.129.12";
if ("function" == typeof(rt_AddVar) ){ rt_AddVar("ys", escape("F04C9345")); rt_AddVar("cr", escape("41xC54zZn9T"));
rt_AddVar("sg", escape("/SIG=13n6nr41i3tbvl1d66ktf9&b=4&d=nU4tQkNpYFYMrN3CObnGfzjWNWBgk94Yk7xy&s=f0&i=ySTaqLFCBDlgVRVuZXoP/1287691342/190.113.129.12/F04C9345")); rt_AddVar("yd", escape("633095664"));
}</script>
<script language=javascript> 
if(window.yzq_d==null)window.yzq_d=new Object();
window.yzq_d['tGuDH0wNPRg-']='&U=13e2mp49r%2fN%3dtGuDH0wNPRg-%2fC%3d289534.9603437.10326224.9298098%2fD%3dFOOT%2fB%3d4123617%2fV%3d1';
</script>
<script language=javascript> 
if(window.yzq_p==null)document.write("<scr"+"ipt language=javascript src=http://l.yimg.com/d/lib/bc/bc_2.0.4.js></scr"+"ipt>");
</script>
<script language=javascript> 
if(window.yzq_p)yzq_p('P=GxX8I0WTTNI.r_ULTGp16RBhvnGBDEzAnE4AA9kr&T=17smmmg4n%2fX%3d1287691342%2fE%3d792404224%2fR%3ddev_net%2fK%3d5%2fV%3d1.1%2fW%3dJ%2fY%3dYAHOO%2fF%3d1443549700%2fH%3dc2VydmVJZD0iR3hYOEkwV1RUTkkucl9VTFRHcDE2UkJodm5HQkRFekFuRTRBQTlrciIgc2l0ZUlkPSI0NDY1NTUxIiB0U3RtcD0iMTI4NzY5MTM0MjI2MjY2NSIg%2fS%3d1%2fJ%3dF04C9345');
if(window.yzq_s)yzq_s();
</script>
</center>
