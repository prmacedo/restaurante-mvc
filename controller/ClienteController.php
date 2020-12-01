<?php

require ("../model/ClienteDAO.php");

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
    }
  }

  public static function cadastrar($novoCliente) {
    $clienteDAO = new ClienteDAO();

    $id = $clienteDAO -> incluir($novoCliente);
    $_SESSION["id"] = $id;

    SessaoController::autenticarSessaoCliente();
    
    header("Location: ../view/cliente/index.php");
  }
}