<?PHP
include('config_login.php');
include('menu.php');
# Validar os dados do usuário

function anti_sql_injection($string)
	{
		include('config_login.php');
		$string = stripslashes($string);
		$string = strip_tags($string);
		$string = mysqli_real_escape_string($conexao,$string);
		return $string;
	}

$sql = mysqli_query($conexao,"select * from tabela_usuarios where login='".anti_sql_injection($_POST['login'])."' and senha='".anti_sql_injection($_POST['senha'])."' limit 1") or die("Erro");
$linhas = mysqli_num_rows($sql);
if($linhas == '')
	{
		?>
        <div class="msg2 padding20">Usuário não encontrado ou usuário e senha inválidos.</div>
        <?PHP
	}
else
	{
		while($dados=mysqli_fetch_assoc($sql))
			{
				session_start();
				$_SESSION['login_sessao'] = $dados['login'];
				header("Location: conteudo.php");
			}
	}
?>