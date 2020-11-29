<?php
session_start();

require ('../model/Conexao.php');
require ('SessaoController.php');

require ('../model/Gerente.php');
require ('GerenteController.php');

require ('../model/Cliente.php');
require ('ClienteController.php');

if (empty($_POST)) {
  header('Location: ../view');
}

$acao = $_POST["acao"];


if ($acao == "clienteLogin") {
  $mesa = $_POST["mesa"];
  $email = $_POST["email"];
  $senha = $_POST["senha"];

  $cliente = new Cliente("", $email, $senha);
  ClienteController::login($cliente);
}
else if ($acao == "clienteCadastrar") {
  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $senha = $_POST["cpf"];

  $cliente = new Cliente($nome, $email, $senha);
  ClienteController::cadastrar($cliente);
}
else if ($acao == "gerenteLogin") {
  $email = $_POST["email"];
  $senha = $_POST["senha"];

  $gerente = new Gerente("", $email, $senha);
  GerenteController::login($gerente);
}
else if ($acao == "gerenteAtualizar") {
  $id = $_POST["id"];
  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $senha = $_POST["senha"];

  $gerente = new Gerente($nome, $email, $senha);
  $gerente -> setId($id);
  GerenteController::atualizar($gerente);
}