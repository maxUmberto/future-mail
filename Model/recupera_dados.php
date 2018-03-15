<?php
require "../Model/conecta.php";

$sql = "SELECT * FROM usuario WHERE id_usuario = :id";
$sql = $pdo->prepare($sql);
$sql->bindValue(":id", $_SESSION['logado']);
$sql->execute();

if($sql->rowCount() > 0){
  $dados = $sql->fetch();
}else{
  $_SESSION['msg'] = 'Erro no banco de dados, por favor efetur login novamente';
  header('Location: ../Control/logout.php');
  exit;
}
?>
