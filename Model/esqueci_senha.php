<?php
require "../Model/conecta.php";

//Confere se o email informado existe no banco de dados
$sql = "SELECT * FROM usuario WHERE email = :email";
$sql = $pdo->prepare($sql);
$sql->bindValue(":email", $email);
$sql->execute();

if($sql->rowCount() > 0){
  $dados = $sql->fetch();

  //Confere se esse usuário já tentou recuperar essa senha antes
  $sql = "SELECT * FROM redefinir_senha WHERE id_usuario = :id";
  $sql = $pdo->prepare($sql);
  $sql->bindValue(":id", $dados['id_usuario']);
  $sql->execute();

  //Apaga do registro qualquer token de uma tentativa anterior
  if($sql->rowCount() > 0){
    $sql = "DELETE FROM redefinir_senha WHERE id_usuario = :id";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(":id", $dados['id_usuario']);
    $sql->execute();
  }

  $token = md5(md5($dados['email']).rand(0,9999).time().md5($dados['senha']).rand(0,9999).time());

  $sql = "INSERT INTO redefinir_senha (id_usuario, token, expira_em)
          VALUES(:id, :token, :expira_em)";
  $sql = $pdo->prepare($sql);
  $sql->bindValue(":id", $dados['id_usuario']);
  $sql->bindValue(":token", $token);
  $sql->bindValue(":expira_em", date('Y-m-d H:i', strtotime('+2 hours') ) );
  $sql->execute();

  //Código para envio do email para recuperação de senha
  $link = "http://localhost/Hotel/View/redefinir_senha.php?t=$token";
  $link2 = "http://localhost/Email%20Futuro/View/esqueci_senha.php";

  $msg = "Clique <a href='$link' target='_blank'>aqui</a> ou no link abaixo para recuperar sua senha."
        ."<br><br> <a href='$link' target='_blank'>$link</a> <br><br>"
        ."O link tem validade de <b>duas horas</b>. Caso o link tenha expirado"
        ." você pode gerar outro <a href='$link2' target='_blank'>aqui</a>.<br><br>"
        ."Se você não solicitou uma recuperação de senha apenas ignore este email";

  echo $msg;

  //$assunto = "Recuperação de senha";
  //$headers = "From: max.umberto97@gmail.com"."\r\n"."X-Mailer: PHP/".phpversion();
  //mail($email, $assunto, $msg, $headers);*/

}else{
  $_SESSION['msg'] = 'Email inválido';
  header('Location: ../View/esqueci_senha.php');
  exit;
}
?>
