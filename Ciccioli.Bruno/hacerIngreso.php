<?php
$MiObjeto= new stdClass();

date_default_timezone_set('America/Argentina/Buenos_Aires');
$horaIngreso = mktime();

$MiObjeto->Patente=$_GET['patente'];
$MiObjeto->fechaIngreso=$horaIngreso;

$archivo=fopen('estacionados.txt', 'a');
fwrite($archivo,json_encode($MiObjeto)."\n");
fclose($archivo);
?>