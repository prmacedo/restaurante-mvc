<?php 
$directory = explode('\\', __DIR__);
array_pop($directory);
$directory = implode('/', $directory);

require ($directory."/model/BebidaDAO.php");

class BebidaController
{
  public static function cadastrar($bebida) {
    $bebidaDAO = new BebidaDAO();

    $preco = $bebida -> getPreco();
    $preco = str_replace(',', '.', $preco);
    $bebida -> setPreco($preco);

    $true = $bebidaDAO -> cadastrar($bebida);
    if($true) {
      header("Location: ../view/gerente/bebida");
    } else {
      header("Location: ../view/gerente/bebida/adicionar.php");
    }
  }

  public static function listar() {
    $bebidaDAO = new BebidaDAO();

    $bebidas = $bebidaDAO -> listar();
    return $bebidas;
  }

  public static function buscar($bebidaId) {
    $bebidaDAO = new BebidaDAO();

    $bebida = $bebidaDAO -> buscar($bebidaId);
    return $bebida;
  }

  public static function atualizar($bebida, $bebidaId) {
    $bebidaDAO = new BebidaDAO();

    if($bebidaDAO -> atualizar($bebida, $bebidaId)) {
      header("Location: ../view/gerente/bebida/");
    } else {
      header("Location: ../view/gerente/bebida/editar.php?id=$bebidaId");
    }
  }

  public static function excluir($bebidaId) {
    $bebidaDAO = new BebidaDAO();

    $true = $bebidaDAO -> excluir($bebidaId);
    if ($true) {
      // echo "ioo";
    } else {
      // echo "asd";
    }
    header("Location: ../view/gerente/bebida/");
  }
}
