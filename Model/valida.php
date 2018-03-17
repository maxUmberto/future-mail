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

  public function validaAssunto($var){
    if(empty($var)){
      $_SESSION['msg'] .= "Assunto não pode ser em branco<br>";
    }
  }

  public function validaTexto($var){
    if(empty($var)){
      $_SESSION['msg'] .= "Texto não pode ser em branco<br>";
    }
  }

  public function validaData($dia,$mes,$ano){
    $mes31 = [1,3,5,7,8,10,12];
    if($mes == 2 && $dia > 28){
      $_SESSION['msg'] .= 'Fevereiro possui somente 28 dias<br>';
    }elseif($dia == 31 && !in_array($mes, $mes31)){
      $_SESSION['msg'] .= 'O mês escolhido tem somente 30 dias<br>';
    }elseif(strtotime("$dia-$mes-$ano") < strtotime(date('d-m-Y'))){
      $_SESSION['msg'] .= 'Você não pode enviar um email para o passado<br>';
    }
  }
}
?>
