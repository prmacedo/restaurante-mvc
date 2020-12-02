<?php

$directory = explode('\\', __DIR__);
array_pop($directory);
$directory = implode('/', $directory);
require ($directory."/model/ClienteDAO.php");

class ClienteController
{
  public static function login($cliente) {
    $clienteDAO = new ClienteDAO();

    $dadosCliente = $clienteDAO -> login($cliente);
    if (!empty($dadosCliente)) {
      $_SESSION["id"] = $dadosCliente["id"];
      $_SESSION["nome"] = $dadosCliente["nome"];
      $_SESSION["email"] = $dadosCliente["email"];
      $_SESSION["bonus"] = $dadosCliente["bonus"];

      SessaoController::autenticarSessaoCliente();
      
      return $dadosCliente["id"];
    } else {
      $_SESSION["erroLogin"] = "Usuário não encontrado";
      return -1;
    }
  }

  public static function cadastrar($novoCliente) {
    $clienteDAO = new ClienteDAO();

    $id = $clienteDAO -> incluir($novoCliente);

    if ($id = 0) {
      $_SESSION["erroCadastrarCliente"] = "Erro ao cadastrar!";
    }
    return $id;
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