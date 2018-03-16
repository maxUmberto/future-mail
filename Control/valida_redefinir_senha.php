<?php
require "../Model/conecta.php";
$sql = "SELECT * FROM redefinir_senha WHERE token = :token AND expira_em > :agora";
$sql = $pdo->prepare($sql);
$sql->bindValue(":token", $token);
$sql->bindValue(":agora", date('Y-m-d H:i'));
$sql->execute();

if($sql->rowCount() == 0){
  $_SESSION['msg'] = 'Token inválido ou não existe';
  header('Location: ../View/login.php');
  exit;
}else{
  $dados = $sql->fetch();
}

if(isset($_POST['redefinir'])){
  require "../Model/valida.php";
  $valida = new Validacao();

  $senha = $_POST['senha'];
  $senha2 = $_POST['senha2'];

  $_SESSION['msg'] = '';

  $valida->validaSenha($senha);
  $valida->confereSenha($senha,$senha2);

  if(empty($_SESSION['msg'])){
    require '../Model/redefinir_senha.php';
  }
}
?>
