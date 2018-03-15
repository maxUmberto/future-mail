<?php
require "../Model/conecta.php";

$sql = "SELECT * FROM usuario WHERE email = :email";
$sql = $pdo->prepare($sql);
$sql->bindValue(":email", $email);
$sql->execute();

if($sql->rowCount() == 0){
  $sql = "INSERT INTO usuario (email, senha, nome) VALUES (:email, :senha, :nome)";
  $sql = $pdo->prepare($sql);
  $sql->bindValue(":email", $email);
  $sql->bindValue(":senha", md5($senha));
  $sql->bindValue(":nome", $nome);
  $sql->execute();

  $_SESSION['msg'] = "Cadastro feito com sucesso. Faça login para continuar";
  header('Location: ../View/login.php');
  exit;
}else{
  $_SESSION['msg'] = "Este email já foi cadastrado";
  header('Location: ../View/cadastro.php');
  exit;
}
?>
