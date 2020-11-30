<?php 
$directory = explode('\\', __DIR__);
array_pop($directory);
$directory = implode('/', $directory);

require ($directory."/model/CozinheiroDAO.php");

class CozinheiroController
{
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

    if($cozinheiroDAO -> atualizar($cozinheiro, $cozinheiroId)) {
      header("Location: ../view/gerente/cozinheiro/");
    } else {
      header("Location: ../view/gerente/cozinheiro/editar.php?id=$cozinheiroId");
    }
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
