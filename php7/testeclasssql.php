<?php 

require_once("config.php");

$sql = new Sql();

$teste = $sql->select("SELECT * FROM tabela_arduino_teste");

echo json_encode($teste);


 ?>