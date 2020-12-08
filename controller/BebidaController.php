<?php 
$directory = explode('\\', __DIR__);
array_pop($directory);
$directory = implode('/', $directory);

require ($directory."/model/BebidaDAO.php");

class BebidaController
{
  public static function cadastrar($post) {
    $codigo = $post["codigo"];
    $nome = $post["nome"];
    $preco = str_replace(',', '.', $post["preco"]);
    $fornecedor = $post["fornecedor"];

    $bebida = new Bebida($nome, $preco, $fornecedor);
    $bebida -> setId($codigo);

    $bebidaDAO = new BebidaDAO();

    return $bebidaDAO -> cadastrar($bebida);
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

  public static function atualizar($post) {
    $bebidaId = $post["idAntigo"];
    $id = $post["id"];
    $nome = $post["nome"];
    $preco = $post["preco"];
    $fornecedor = $post["fornecedor"];

    $bebida = new Bebida($nome, $preco, $fornecedor);
    $bebida -> setId($id);

    $bebidaDAO = new BebidaDAO();

    return $bebidaDAO -> atualizar($bebida, $bebidaId);
    
  }

  public static function excluir($post) {
    $bebidaId = $post["id"];
    $bebidaDAO = new BebidaDAO();

    return $bebidaDAO -> excluir($bebidaId);
  }
}
