<?PHP
session_start();
if(isset($_SESSION['login_sessao']))
	{
		?>
        <div class="padding20"><?PHP echo 'Olá '.$_SESSION['login_sessao'].', seja bem vindo!'; ?></div><?PHP
	}
?>
<link rel="stylesheet" href="style.css">
