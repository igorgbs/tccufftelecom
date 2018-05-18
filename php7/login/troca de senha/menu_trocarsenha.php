<?PHP
session_start();
if(isset($_SESSION['login_sessao']))
	{
		?>
        <div class="padding20"><?PHP echo 'Olá '.$_SESSION['login_sessao'].', seja bem vindo!'; ?></div><?PHP
	}
?>
<link rel="stylesheet" href="style.css">
<div class="menu">Menu</div>
<p><a href="conteudo.php">Conteúdo restrito</a></p>
<p><a href="cadastro.php">Cadastro de usuários</a></p>
<p><a href="login.php">Login</a></p>
<p><a href="logout.php">Logout</a></p>
