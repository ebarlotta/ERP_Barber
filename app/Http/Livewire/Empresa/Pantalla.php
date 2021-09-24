<?php 
if(!isset($_GET['Ancho']) && !isset($_GET['Alto']) ) {
   echo "<script language=\"JavaScript\">
   document.location=\"$PHP_SELF?Ancho=\"+screen.width+\"&Alto=\"+screen.height;
   </script>";
}
else {
   if(isset($_GET['Ancho']) && isset($_GET['Alto'])) {
      // Resolución de pantalla detectada
      
      session(['ancho'=>$_GET['Ancho']]);
      session(['alto'=>$_GET['Alto']]);
   }
   else { echo "No se ha podido detectar la resolución de pantalla"; }
}
?>