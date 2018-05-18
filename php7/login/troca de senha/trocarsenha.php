<?PHP include('menu_trocarsenha.php'); ?>
<?PHP
# Receber os dados vindos do formulário
# incluir arquivo de conexao
include('config_login.php');

$login = ucwords($_POST['login']); # Coloca a primeira letra da string em maiúsculo
$nova_senha = $_POST['nova_senha'];

$in = mysqli_query($conexao,"uptade tabela_usuarios set (senha) values ('$nova_senha')") or die("Erro");
?>
<div class="msg1 padding20">Senha alterada com sucesso!</div>