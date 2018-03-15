<?php
require "../Model/conecta.php";

//Confere se o email informado existe no banco de dados
$sql = "SELECT * FROM email WHERE email = :email";
$sql = $pdo->prepare($sql);
$sql->bindValue(":email", $email);
$sql->execute();

if($sql->rowCount() > 0){
  $sql = $sql->fetch();

  //Confere se esse usuário já tentou recuperar essa senha antes
  $sql = "SELECT * FROM redefinir_senha WHERE id_usuario = :id";
  $sql = $pdo->prepare($sql);
  $sql->bindValue(":id_usuario", $sql['id_usuario']);
  $sql->execute();

  //Apaga do registro qualquer token de uma tentativa anterior
  if($sql->rowCount() > 0){
    $sql = "DELETE FROM redefinir_senha WHERE id_usuario = :id";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(":id_usuario", $sql['id_usuario']);
    $sql->execute();
  }

  $token = md5(md5($email).rand(0,9999).time().rand(0,9999));

  $sql = "INSERT INTO redefinir_senha (id_usuario, token, expira_em)
          VALUES(:id, :token, :expira_em)";
  $sql = $pdo->prepare($sql);
  $sql->bindValue(":id", $sql['id_usuario']);
  $sql->bindValue(":token", $token);
  $sql->bindValue(":expira_em", date('Y-m-d H:i', strtotime('+2 hours') ) );
  $sql->execute();
  
}else{
  $_SESSION['msg'] = 'Email inválido';
  header('Location: ../View/recupera_senha.php');
  exit;
}
?>
