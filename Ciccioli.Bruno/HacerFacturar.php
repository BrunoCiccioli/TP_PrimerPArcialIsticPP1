<?php

$archivo=fopen("estacionados.txt", "r");
$miPatenteParaCobrar = $_GET['patente'];

while(!feof($archivo)) 
{
	$objeto = json_decode(fgets($archivo));
	if ($objeto->patente == $miPatenteParaCobrar);
	{
		$horaEgreso = mktime();
		$tiempoTranscurrido = $horaEgreso-$horaIngreso;
		$ValoraCobrar = ($tiempoTranscurrido/60*100);
		header("Location: okfacturar.php? &cobrar=".$ValoraCobrar);
		break;	
	}	

}

fclose($archivo)



?>