<?php
session_start();

if(isset($_SESSION['logado'])){
  header('Location: index.php');
  exit;
}

if(isset($_POST['recuperar'])){
  require "../Control/valida_esqueci_senha.php";
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
    Email:<br>
    <input type="email" name="email"><br><br>

    <input type="submit" name="recuperar" value="Recuperar"><br><br>
  </form>
  <a href="login.php">Voltar</a>
</body>
</html>
