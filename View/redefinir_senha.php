<?php
session_start();

if(isset($_SESSION['logado'])){
  header('Location: index.php');
  exit;
}

if(isset($_GET['t'])){
  $token = $_GET['t'];
  require "../Control/valida_redefinir_senha.php";
}else{
  $_SESSION['msg'] = 'Token não existe';
  header('Location: index.php');
  exit;
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
  <h2>Recupera Senha</h2>

  <form method="post">
    Senha:<br>
    <input type="password" name="senha"><br><br>

    Confirme sua senha:<br>
    <input type="password" name="senha2"><br><br>

    <input type="submit" name="redefinir" value="Redefinir"><br><br>
  </form>
  <a href="cadastro.php">Cadastrar-se</a>
  <a href="recupera_senha.php">Esqueci a senha</a>
</body>
</html>
