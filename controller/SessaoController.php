<?php
class SessaoController {
  public static function autenticarSessaoCliente() {
    $_SESSION["authCliente"] = true;
  }

  public static function validarLoginCliente() {
    if(!$_SESSION["authCliente"]) {
      header("Location: ../");
    }
  }

  public static function autenticarSessaoGerente() {
    $_SESSION["authGerente"] = true;
  }

  public static function validarLoginGerente() {
    if(!$_SESSION["authGerente"]) {
      header("Location: ../login-gerente.php");
    }
  }

  public static function autenticarSessaoCozinheiro() {
    $_SESSION["authCozinheiro"] = true;
  }

  public static function validarLoginCozinheiro() {
    if(!$_SESSION["authCozinheiro"]) {
      header("Location: ../login-cozinha.php");
    }
  }

  public static function finalizarSessao(){
    unset($_SESSION);
    session_destroy();
  }
}