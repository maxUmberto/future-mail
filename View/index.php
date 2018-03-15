<?php
session_start();

if(!isset($_SESSION['logado']) || empty($_SESSION['logado'])){
  header('Location: login.php');
  exit;
}
require "../Model/recupera_dados.php";
?>
<h1>Bem vindo <b><?php echo $dados['nome']; ?></b></h1>
<a href="../Control/logout.php">Sair</a>
