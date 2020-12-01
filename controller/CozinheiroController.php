<?php 
$directory = explode('\\', __DIR__);
array_pop($directory);
$directory = implode('/', $directory);

require ($directory."/model/CozinheiroDAO.php");

class CozinheiroController
{
  public function login($cozinheiro) {
    $cozinheiroDAO = new CozinheiroDAO();
    $dadosCozinheiro = $cozinheiroDAO -> login($cozinheiro);
    if (!empty($dadosCozinheiro)) {
      SessaoController::autenticarSessaoCozinheiro();
      
      $_SESSION["cozinheiro"] = $dadosCozinheiro;
      header("Location: ../view/cozinheiro/index.php");
    } else {
      $_SESSION["erroLogin"] = "Usuário não encontrado";
      header("Location: ../view/login-cozinha.php");
    }
  }

  public static function cadastrar($cozinheiro) {
    $cozinheiroDAO = new CozinheiroDAO();

    $true = $cozinheiroDAO -> cadastrar($cozinheiro);
    if($true) {
      header("Location: ../view/gerente/cozinheiro");
    } else {
      header("Location: ../view/gerente/cozinheiro/adicionar.php");
    }
  }

  public static function listar() {
    $cozinheiroDAO = new CozinheiroDAO();

    $cozinheiros = $cozinheiroDAO -> listar();
    return $cozinheiros;
  }

  public static function buscar($cozinheiroId) {
    $cozinheiroDAO = new CozinheiroDAO();

    $cozinheiro = $cozinheiroDAO -> buscar($cozinheiroId);
    return $cozinheiro;
  }

  public static function atualizar($cozinheiro, $cozinheiroId) {
    $cozinheiroDAO = new CozinheiroDAO();
    return $cozinheiroDAO -> atualizar($cozinheiro, $cozinheiroId);
  }

  public static function excluir($cozinheiroId) {
    $cozinheiroDAO = new CozinheiroDAO();

    $true = $cozinheiroDAO -> excluir($cozinheiroId);
    if ($true) {
      // echo "ioo";
    } else {
      // echo "asd";
    }
    header("Location: ../view/gerente/cozinheiro/");
  }
}
