<?php

date_default_timezone_get('America/Argentina/Buenos_Aires')

$miPatenteParaCobrar=$_GET ['patente'];

$archivo = fopen("estacionados.txt", "r");

while(!feof($archivo)) 
{
	$objeto = json_decode(fgets($archivo));
	if(objeto->patente==$miPatenteParaCobrar)
	{
		$horaEgreso = mktime();
		$tiempoTranscurrido = $horaEgreso-$horaIngreso;
		$ValoraCobrar = ($tiempoTranscurrido/60)*100;

	}	

}	
fclose($archivo)

?>