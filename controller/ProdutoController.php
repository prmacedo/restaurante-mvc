<?php 
$directory = explode('\\', __DIR__);
array_pop($directory);
$directory = implode('/', $directory);

require ($directory."/model/ComidaDAO.php");
require ($directory."/model/BebidaDAO.php");

class ProdutoController
{
  public static function buscarProduto($produtoId, $produtoTipo) {
    if($produtoTipo == "comida") {
      $comidaDAO = new ComidaDAO();
      $produto = $comidaDAO -> buscar($produtoId);
    } else if ($produtoTipo == "bebida") {
      $bebidaDAO = new BebidaDAO();
      $produto = $bebidaDAO -> buscar($produtoId);
    }
    return $produto;
  }
}