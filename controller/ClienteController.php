<?php

$directory = explode('\\', __DIR__);
array_pop($directory);
$directory = implode('/', $directory);
require ($directory."/model/ClienteDAO.php");

class ClienteController
{
  public static function login($post) {
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $cliente = new Cliente("", $email, $senha);

    $clienteDAO = new ClienteDAO();

    $dadosCliente = $clienteDAO -> login($cliente);
    if (!empty($dadosCliente)) {
      $cliente -> setId($dadosCliente["id"]);
      $_SESSION["id"] = $dadosCliente["id"];
      $_SESSION["nome"] = $dadosCliente["nome"];
      $_SESSION["email"] = $dadosCliente["email"];
      $_SESSION["bonus"] = $dadosCliente["bonus"];
      
      return $cliente;
    } else {
      $_SESSION["erroLogin"] = "Usuário não encontrado";
      return null;
    }
  }

  public static function cadastrar($post) {
    $nome = $post["nome"];
    $email = $post["email"];
    $senha = $post["cpf"];

    $cliente = new Cliente($nome, $email, $senha);
    
    $clienteDAO = new ClienteDAO();

    $id = $clienteDAO -> incluir($cliente);

    if ($id == 0) {
      $_SESSION["erroCadastrarCliente"] = "Erro ao cadastrar!";
      return false;
    }
    return true;
  }

  public static function buscar($idCliente) {
    $clienteDAO = new ClienteDAO();

    $cliente = $clienteDAO -> buscar($idCliente);
    return $cliente;
  }

  public static function atualizarBonus($post) {
    $clienteDAO = new ClienteDAO();

    $bonus = 0.1*$post["valorTotal"];
    $idCliente = $post["idCliente"];
    
    $cliente = $clienteDAO -> atualizarBonus($idCliente, $bonus);
  }

  public static function aplicarDesconto($idCliente) {
    $clienteDAO = new ClienteDAO();
    $bonus = $clienteDAO -> validarDesconto($idCliente);
    if(!empty($bonus)) {
      $bonus = 0;
    } else {
      $bonus = $clienteDAO -> buscarDesconto($idCliente);
    }

    return $bonus;
  }
}