<?php
session_start();

if(!isset($_SESSION['logado']) || empty($_SESSION['logado'])){
  header('Location: login.php');
  exit;
}
require "../Model/recupera_dados.php";

$dia = $mes = $ano = '';
if(isset($_SESSION['mes'])){
  $dia = $_SESSION['dia'];
  $mes = $_SESSION['mes'];
  $ano = $_SESSION['ano'];
  unset($_SESSION['dia']);
  unset($_SESSION['mes']);
  unset($_SESSION['ano']);
}

if(isset($_POST['agendar'])){
  require '../Control/valida_email.php';
}
?>
<html>
<head>
  <meta charset="utf-8">
  <title>Email para o futuro</title>
</head>

<body>
  <?php
  if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
  }
  ?>

  <h1>Novo Email</h1>

  <form method="post">
    Data:<br>
    Dia: <select name="dia"><?php
      for($i = 1; $i <= 31; $i++){
        if(!empty($dia) && $dia == $i){
          echo "<option value='$i' selected>$i</option>";
        }elseif(empty($dia) && date('d') == $i){
          echo "<option value='$i' selected>$i</option>";
        }else{
          echo "<option value='$i'>$i</option>";
        }
      }
    ?></select>
    Mês: <select name="mes"><?php
      $month = ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'];
      for($i = 1; $i <= 12; $i++){
        if(!empty($mes) && $mes == $i){
          echo "<option value='$i' selected>".($month[$i-1])."</option>";
        }elseif(empty($mes) && date('m') == $i){
          echo "<option value='$i' selected>".($month[$i-1])."</option>";
        }else{
          echo "<option value='$i'>".($month[$i-1])."</option>";
        }
      }
    ?></select>
    Ano: <select name="ano"><?php
      for($i = date('Y'); $i <= date('Y', strtotime('+15 years')); $i++){
        if(!empty($ano) && $ano == $i){
          echo "<option value='$i' selected>".$i."</option>";
        }else{
          echo "<option value='$i'>$i</option>";
        }
      }
    ?></select>
    <br><br>
    Destinatário: <input type="email" name="destinatario"><br><br>
    Assunto: <input type="text" name="assunto"><br><br>
    Texto: <textarea name="texto"></textarea><br><br>
    <input type="submit" name="agendar" value="Agendar">
  </form>
  <a href="index.php">Voltar</a>
</body>
</html>
