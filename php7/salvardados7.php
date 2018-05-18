<?php

require_once "conecta.php";
require_once "config.php";

$corrente = $_GET['corrente'];
$potencia = $_GET['potencia'];


$sql = new Sql(); //classe SQL

$results = $sql->select("INSERT INTO tabela_arduino_final (corrente, potencia) VALUES ('$corrente','$potencia')"); //comando SQL


?>
