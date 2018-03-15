<?php
require "../Model/valida.php";
$valida = new Validacao();

$email = $_POST['email'];
$senha = $_POST['senha'];

$_SESSION['msg'] = '';

$valida->validaEmail($email);
$valida->validaSenha($senha);

if(empty($_SESSION['msg'])){
  require "../Model/efetua_login.php";
}else{
  header("Location: ../View/login.php");
  exit;
}
?>
