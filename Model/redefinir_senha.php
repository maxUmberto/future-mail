<?php
$sql = "UPDATE usuario SET senha = :senha WHERE id_usuario = :id";
$sql = $pdo->prepare($sql);
$sql->bindValue(":senha", md5($senha));
$sql->bindValue(":id", $dados['id_usuario']);
$sql->execute();

$_SESSION['msg'] = 'Senha alterada com sucesso. Faça login para continuar';
header('Location: ../View/login.php');
exit;
?>
