<?PHP include('menu.php'); ?>
<?PHP
# Receber os dados vindos do formulário
# incluir arquivo de conexao
include('config_login.php');

$login = ucwords($_POST['login']); # Coloca a primeira letra da string em maiúsculo
$senha = $_POST['senha'];

$in = mysqli_query($conexao,"insert into tabela_usuarios (login,senha) values ('$login','$senha')") or die("Erro");
?>
<div class="msg1 padding20">Cadastro realizado com sucesso</div>