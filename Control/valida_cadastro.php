<?php
require "../Model/valida.php";
$valida = new Validacao();

$email = $_POST['email'];
$nome = $_POST['nome'];
$senha = $_POST['senha'];
$senha2 = $_POST['senha2'];

$_SESSION['msg'] = '';

$valida->validaEmail($email);
$valida->validaNome($nome);
$valida->validaSenha($senha);
$valida->confereSenha($senha, $senha2);

if(empty($_SESSION['msg'])){
  require "../Model/efetua_cadastro.php";
}else{
  header("Location: ../View/cadastro.php");
  exit;
}
?>
