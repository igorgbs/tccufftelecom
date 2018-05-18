<?php 

$conn = new PDO("mysql:dbname=bancoarduino;host=localhost","root", ""); //Função de conectar ao Banco. Parâmetros: mysql:dbname=Nome do banco;host=IP servidor, usuario, senha


if($conn)
	{
		echo "CONECTADO";
	} else { 
		echo "ERRO";
	}	

 ?>

