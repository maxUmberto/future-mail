<?php
class Validacao{
  public function validaEmail($var){
    if(empty($var)){
      $_SESSION['msg'] .= "Email vazio<br>";
    }elseif(strlen($var) < 6){
      $_SESSION['msg'] .= 'Email muito curto<br>';
    }elseif(!filter_var($var, FILTER_VALIDATE_EMAIL)){
      $_SESSION['msg'] .= 'Email inválido<br>';
    }
  }

  public function validaSenha($var){
    if(empty($var)){
      $_SESSION['msg'] .= 'Senha vazia<br>';
    }elseif(strlen($var) < 5){
      $_SESSION['msg'] .= 'Senha muito curta<br>';
    }
  }

  public function validaNome($var){
    if(empty($var)){
      $_SESSION['msg'] .= 'Nome vazio<br>';
    }elseif(!preg_match('|^[\pL\s]+$|u', $var)){
      $_SESSION['msg'] .= 'Nome inválido<br>';
    }
  }

  public function confereSenha($var1, $var2){
    if($var1 != $var2){
      $_SESSION['msg'] .= 'Senhas são diferentes<br>';
    }
  }
}
?>
