<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
</head>

<body>
<?PHP include('menu.php'); ?>
<h1>Login</h1>
<br>
<form action="valida.php" method="post">
	* Login<br>
	<input type="text" name="login" id="login">
<br>
	* Senha<br>
	<input type="password" name="senha" id="senha">
  <br>
  <br><input type="submit" value="Login" class="but_comando">
</form>
</body>
</html>