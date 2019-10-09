<?php

$precio = 5;
$archivo=fopen("estacionados.txt", "r");
$miPatenteParaCobrar = $_GET['patente'];

while(!feof($archivo)) 
{
	$objeto = json_decode(fgets($archivo));
	if ($objeto->Patente == $miPatenteParaCobrar);
	{
		$horaEgreso = mktime();
		$tiempoTranscurrido = ($horaEgreso-$objeto->fechaIngreso)/60/60;
		$ValoraCobrar = $tiempoTranscurrido. $objeto->fechaIngreso;

		$vehiculofacturado = new stdClass();

		date_default_timezone_set('America/Argentina/Buenos_Aires');

		$vehiculofacturado->Auto = $miPatenteParaCobrar;
		$vehiculofacturado->Ingreso = date("d-m-y H:i",$objeto->fechaIngreso);
		$vehiculofacturado->horaEgreso = date("d-m-y H:i",$horaEgreso);

		$archivo1 = fopen('facturados.txt', 'a');
		fwrite($archivo1, json_encode($vehiculofacturado). "\n");
		fclose($archivo1);

		header("Location: okfacturar.php? &cobrar=".$ValoraCobrar);
		break;	
	}	

}

fclose($archivo)



?>