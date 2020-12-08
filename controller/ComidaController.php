<?php 
$directory = explode('\\', __DIR__);
array_pop($directory);
$directory = implode('/', $directory);

require ($directory."/model/ComidaDAO.php");

class ComidaController
{
  public static function cadastrar($post) {
    $codigo = $post["codigo"];
    $nome = $post["nome"];
    $preco = str_replace(',', '.', $post["preco"]);
    $descricao = $post["descricao"];

    $comida = new Comida($nome, $preco, $descricao);
    $comida -> setId($codigo);

    $comidaDAO = new ComidaDAO();

    return $comidaDAO -> cadastrar($comida);
    
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

  public static function atualizar($post) {
    $idAntigo = $post["idAntigo"];
    $id = $post["id"];
    $nome = $post["nome"];
    $preco = $post["preco"];
    $descricao = $post["descricao"];

    $comida = new Comida($nome, $preco, $descricao);
    $comida -> setId($id);

    $comidaDAO = new ComidaDAO();

    return $comidaDAO -> atualizar($comida, $idAntigo);
    
  }

  public static function excluir($post) {
    $comidaId = $post["id"];

    $comidaDAO = new ComidaDAO();

    return $comidaDAO -> excluir($comidaId);
    
  }
}
