<?php
require "../Model/conecta.php";

$sql = "SELECT * FROM usuario WHERE email = :email AND senha = :senha";
$sql = $pdo->prepare($sql);
$sql->bindValue(":email", $email);
$sql->bindValue(":senha", md5($senha));
$sql->execute();

if($sql->rowCount() > 0){
  $sql = $sql->fetch();
  $_SESSION['logado'] = $sql['id_usuario'];
  header('Location: ../View/index.php');
  exit;
}else{
  $_SESSION['msg'] = "Email ou senha inválidos";
  header('Location: ../View/login.php');
  exit;
}
?>
