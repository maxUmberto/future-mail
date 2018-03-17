<?php
require "../Model/conecta.php";

$data = "$ano-$mes-$dia";

$sql = "INSERT INTO email (id_usuario, destinatario, assunto, corpo, data_envio) VALUES (:id, :destinatario, :assunto, :corpo, :data_envio)";
$sql = $pdo->prepare($sql);
$sql->bindValue(":id",$_SESSION['logado']);
$sql->bindValue(":destinatario",$destinatario);
$sql->bindValue(":assunto",$assunto);
$sql->bindValue(":corpo",$texto);
$sql->bindValue(":data_envio",$data);
$sql->execute();

$_SESSION['msg'] = 'Email agendado com sucesso';
header('Location: ../View/index.php');
exit;
?>
