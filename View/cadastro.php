<?php
session_start();

if(isset($_POST['cadastrar'])){
  require "../Control/valida_cadastro.php";
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
  <h2>Cadastro</h2>

  <form method="post">
    Email:<br>
    <input type="email" name="email"><br><br>

    Nome:<br>
    <input type="text" name="nome"><br><br>

    Senha:<br>
    <input type="password" name="senha"><br><br>

    Confirme sua senha:<br>
    <input type="password" name="senha2"><br><br>

    <input type="submit" name="cadastrar" value="Cadastrar"><br><br>
  </form>
  <a href="login.php">Voltar</a>
</body>
</html>
