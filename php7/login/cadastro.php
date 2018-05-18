<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
</head>

<body>
<?PHP include('menu.php'); ?>
<h1>Cadastro</h1>
<br>
<script type="text/javascript">
function valida_campos()
	{
		if(document.getElementById('login').value == '')
			{
				alert('Por favor, preencha os campos obrigatórios.');
				document.getElementById('login').focus();
				return false;
			}
		
		if(document.getElementById('senha').value == '')
			{
				alert('Por favor, não é permitido deixar o campo em branco.');
				document.getElementById('senha').focus();
				return false;
			}
	}
</script>
<form action="cadastrar.php" method="post" onSubmit="return valida_campos();">
	* Login<br>
    <input type="text" name="login" id="login">
	<br>
	* Senha<br>
	<input type="password" name="senha" id="senha">
<br>
	<br><input type="submit" value="Cadastrar" class="but_comando">
</form>
</body>
</html>