<?php 
$directory = explode('\\', __DIR__);
array_pop($directory);
$directory = implode('/', $directory);

require ($directory."/model/ComidaDAO.php");

class ComidaController
{
  public static function cadastrar($comida) {
    $comidaDAO = new ComidaDAO();

    $preco = $comida -> getPreco();
    $preco = str_replace(',', '.', $preco);
    $comida -> setPreco($preco);

    $true = $comidaDAO -> cadastrar($comida);
    if($true) {
      header("Location: ../view/gerente/comida");
    } else {
      header("Location: ../view/gerente/comida/adicionar.php");
    }
  }

  public static function listar() {
    $comidaDAO = new ComidaDAO();

    $comidas = $comidaDAO -> listar();
    return $comidas;
  }

  public static function buscar($comidaId) {
    $comidaDAO = new ComidaDAO();

    $comida = $comidaDAO -> buscar($comidaId);
    return $comida;
  }

  public static function atualizar($comida, $comidaId) {
    $comidaDAO = new ComidaDAO();

    if($comidaDAO -> atualizar($comida, $comidaId)) {
      header("Location: ../view/gerente/comida/");
    } else {
      header("Location: ../view/gerente/comida/editar.php?id=$comidaId");
    }
  }

  public static function excluir($comidaId) {
    $comidaDAO = new ComidaDAO();

    $true = $comidaDAO -> excluir($comidaId);
    if ($true) {
      // echo "ioo";
    } else {
      // echo "asd";
    }
    header("Location: ../view/gerente/comida/");
  }
}
