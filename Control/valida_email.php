<?php
require "../Model/valida.php";
$valida = new Validacao();

$destinatario = $_POST['destinatario'];
$assunto = $_POST['assunto'];
$texto = $_POST['texto'];
$dia = $_POST['dia'];
$mes = $_POST['mes'];
$ano = $_POST['ano'];

$_SESSION['msg'] = '';

$valida->validaEmail($destinatario);
$valida->validaAssunto($assunto);
$valida->validaTexto($texto);
$valida->validaData($dia,$mes,$ano);

if(empty($_SESSION['msg'])){
  require "../Model/novo_email.php";
}else{
  $_SESSION['dia'] = $dia;
  $_SESSION['mes'] = $mes;
  $_SESSION['ano'] = $ano;
  header("Location: ../View/novo_email.php");
  exit;
}
?>
