<?php

date_default_timezone_get('America/Argentina/Buenos_Aires')
$horaEgreso = mktime();

$archivo = fopen("estacionados.txt", "r");

while(!feof($archivo)) 
{
$objeto = json_decode(fgets($archivo));
if ($objeto->Usuario == $_GET['usuario']) 
{	
if ($objeto->Clave == $_GET['clave'])
{
header("Location: oklogin.php");
fclose($archivo);
exit();
}
else
{
header("Location: no.php");
fclose($archivo);
exit();
}
}


}
fclose($archivo);

exit();

?>