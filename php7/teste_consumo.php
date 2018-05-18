<?php 

require_once("config.php");

$sql = new Sql();

$results = $sql->select("SELECT potencia FROM tabela_arduino_final");


$soma =0;

for ($i=0; $i <= count($results); $i++) { 
	
	$soma += array_sum($results[$i]);

}

echo $soma;

?>
