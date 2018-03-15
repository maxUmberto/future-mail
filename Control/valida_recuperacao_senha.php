<?php
require "../Model/valida.php";
$valida = new Validacao();

$email = $_POST['email'];

$_SESSION['msg'] = '';

$valida->validaEmail($email);

if(empty($_SESSION['msg'])){
  require "../Model/recupera_senha.php";
}else{
  header("Location: ../View/login.php");
  exit;
}
?>
