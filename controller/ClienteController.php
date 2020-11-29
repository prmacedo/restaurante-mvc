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
      
      header("Location: ../view/cliente/index.php");
    } else {
      $_SESSION["erroLogin"] = "Usuário não encontrado";
      header("Location: ../view/");
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





/*
session_start();

if (empty($_POST)) {
  header("Location: ../view/index.php");
}

require ("../model/Cliente.php");
require ("../model/ClienteDAO.php");
require ("SessaoController.php");

$nome = !empty($_POST["nome"])?$_POST["nome"]:"";
$mesa = !empty($_POST["mesa"])?$_POST["mesa"]:"";
$email = $_POST["email"];
$cpf = $_POST["cpf"];

$acao = $_POST["acao"];

$cliente = new Cliente($nome, $email, $cpf);
$clienteDAO = new ClienteDAO();


function cadastrar($novoCliente, $clienteDAO) {
  $id = $clienteDAO -> incluir($novoCliente);
  $_SESSION["id"] = $id;

  SessaoController::autenticarSessaoCliente();
  
  header("Location: ../view/cliente/index.php");
}

function login($cliente, $clienteDAO) {
  $dadosCliente = $clienteDAO -> login($cliente);
  if (!empty($dadosCliente)) {
    $_SESSION["id"] = $dadosCliente["id"];
    $_SESSION["nome"] = $dadosCliente["nome"];
    $_SESSION["email"] = $dadosCliente["email"];
    $_SESSION["bonus"] = $dadosCliente["bonus"];

    SessaoController::autenticarSessaoCliente();
    
    header("Location: ../view/cliente/index.php");
  } else {
    $_SESSION["erroLogin"] = "Usuário não encontrado";
    header("Location: ../view/");
  }
}

if ($acao == "login") {
  login($cliente, $clienteDAO);
} else if($acao == "cadastrar") {
  cadastrar($cliente, $clienteDAO);
}

?>