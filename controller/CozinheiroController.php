<?php 
$directory = explode('\\', __DIR__);
array_pop($directory);
$directory = implode('/', $directory);

require ($directory."/model/CozinheiroDAO.php");

class CozinheiroController
{
  public function login($post) {
    $email = $post["email"];
    $senha = $post["senha"];
    
    $cozinheiro = new Cozinheiro("", $email, $senha);

    $cozinheiroDAO = new CozinheiroDAO();
    $dadosCozinheiro = $cozinheiroDAO -> login($cozinheiro);
    if (!empty($dadosCozinheiro)) {
      SessaoController::autenticarSessaoCozinheiro();
      
      $_SESSION["cozinheiro"] = $dadosCozinheiro;
      return true;
    } else {
      $_SESSION["erroLogin"] = "Usuário não encontrado";
      return false;
    }
  }

  public static function cadastrar($post) {
    $nome = $post["nome"];
    $email = $post["email"];
    $senha = $post["senha"];

    $cozinheiro = new Cozinheiro($nome, $email, $senha);

    $cozinheiroDAO = new CozinheiroDAO();

    return $cozinheiroDAO -> cadastrar($cozinheiro);
    
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

  public static function atualizar($post) {
    $cozinheiroId = $post["id"];
    $nome = $post["nome"];
    $email = $post["email"];
    $senha = $post["senha"];

    $cozinheiro = new Cozinheiro($nome, $email, $senha);
    
    $cozinheiroDAO = new CozinheiroDAO();
    return $cozinheiroDAO -> atualizar($cozinheiro, $cozinheiroId);
  }

  public static function excluir($post) {
    $cozinheiroId = $post["id"];

    $cozinheiroDAO = new CozinheiroDAO();

    return $cozinheiroDAO -> excluir($cozinheiroId);
    
  }
}
