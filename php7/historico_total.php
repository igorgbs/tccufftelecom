<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>DADOS ARDUINO</title>
	</head>
	<body>
		<h1><center>DADOS ARDUINO</center></h1>
		
		<table width="500" border="1" cellspacing="2" cellpadding="5" align=center>
		
		
		<tr>
			<td><b><center>ID</center></b></td>
			<td><b><center>DATA E HORA</center></b></td>
			<td><b><center>CORRENTE</center></b></td>
			<td><b><center>POTÊNCIA</center></b></td>
		</tr>
		
<?php

	require_once "config.php"; //incluir arquivo config.php
	
	$sql = new Sql(); //classe SQL

	$results = $sql->select("SELECT * FROM tabela_arduino_final"); //comando SQL

	
		//Para cada results(array com valores do banco) atribua as row(linhas da tabela no banco)
		foreach ($results as $row) {
	
			//Para cada linha, atribua as $key(nome das colunas da referida tabela) com seus respectivos $value(valores destas colunas)
			foreach ($row as $key => $value) {
		
				echo'<tr>';
			echo '<td>'.'<center>'.$row["id"].'</center>'.'</td>';
			echo '<td>'.'<center>'.date('d/m/Y - H:i:s', strtotime($row["tempo"])).'</center>'.'</td>';
			echo '<td>'.'<center>'.$row["corrente"].'</center>'.'</td>';
			echo '<td>'.'<center>' . $row["potencia"]. '</center>'.'</td>';
				echo'</tr>';
	}

	
}
	
	
			
?>
		
		</table>
		
	</body>
<html>