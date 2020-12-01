<?php
session_start();

require ('../model/Conexao.php');
require ('SessaoController.php');

require ('../model/Gerente.php');
require ('GerenteController.php');

require ('../model/Cliente.php');
require ('ClienteController.php');

require ('../model/Bebida.php');
require ('BebidaController.php');

require ('../model/Comida.php');
require ('ComidaController.php');

require ('../model/Cozinheiro.php');
require ('CozinheiroController.php');

require ('PedidoController.php');

require ('../model/Conta.php');
require ('ContaController.php');

require ('PagamentoController.php');

if (empty($_POST)) {
  header('Location: ../view');
}

$acao = $_POST["acao"];


if ($acao == "clienteLogin") {
  $mesa = $_POST["mesa"];
  $email = $_POST["email"];
  $senha = $_POST["senha"];

  date_default_timezone_set("America/Bahia");
  $data = date('Y-m-d');
  $hora = date('H:i');
  $status = "Aberta";

  $cliente = new Cliente("", $email, $senha);
  $idCliente = ClienteController::login($cliente);
  $cliente -> setId($idCliente);

  $conta = new Conta($mesa, $cliente, 0, $data, $hora, $status);
  $contaAberta = ContaController::cadastrar($conta);

  if($contaAberta > 0) {
    header("Location: ../view/cliente/index.php");
  } else {
    header("Location: ../view/");
  }
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
else if($acao == "bebidaCadastrar") {
  $codigo = $_POST["codigo"];
  $nome = $_POST["nome"];
  $preco = $_POST["preco"];
  $fornecedor = $_POST["fornecedor"];

  $bebida = new Bebida($nome, $preco, $fornecedor);
  $bebida -> setId($codigo);
  BebidaController::cadastrar($bebida);
}
else if($acao == "bebidaEditar") {
  $idAntigo = $_POST["idAntigo"];
  $id = $_POST["id"];
  $nome = $_POST["nome"];
  $preco = $_POST["preco"];
  $fornecedor = $_POST["fornecedor"];

  $bebida = new Bebida($nome, $preco, $fornecedor);
  $bebida -> setId($id);
  BebidaController::atualizar($bebida, $idAntigo);
}
else if($acao == "bebidaExcluir") {
  $id = $_POST["id"];
  
  BebidaController::excluir($id);
}
else if($acao == "comidaCadastrar") {
  $codigo = $_POST["codigo"];
  $nome = $_POST["nome"];
  $preco = $_POST["preco"];
  $descricao = $_POST["descricao"];

  $comida = new Comida($nome, $preco, $descricao);
  $comida -> setId($codigo);
  ComidaController::cadastrar($comida);
}
else if($acao == "comidaEditar") {
  $idAntigo = $_POST["idAntigo"];
  $id = $_POST["id"];
  $nome = $_POST["nome"];
  $preco = $_POST["preco"];
  $descricao = $_POST["descricao"];

  $comida = new Comida($nome, $preco, $descricao);
  $comida -> setId($id);
  ComidaController::atualizar($comida, $idAntigo);
}
else if($acao == "comidaExcluir") {
  $id = $_POST["id"];
  
  ComidaController::excluir($id);
}
else if($acao == "cozinheiroCadastrar") {
  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $senha = $_POST["senha"];

  $comida = new Cozinheiro($nome, $email, $senha);
  $comida -> setId($codigo);
  CozinheiroController::cadastrar($comida);
}
else if($acao == "cozinheiroEditar") {
  $id = $_POST["id"];
  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $senha = $_POST["senha"];

  $comida = new Cozinheiro($nome, $email, $senha);
  CozinheiroController::atualizar($comida, $id);
}
else if($acao == "cozinheiroExcluir") {
  $id = $_POST["id"];
  
  CozinheiroController::excluir($id);
}
else if($acao == "pedidoCadastrar") {
  unset($_POST["acao"]);
  PedidoController::cadastrar($_POST);
  ContaController::aguardar($_POST);
  header("Location: ../view/cliente/confirmacao.php");
}
else if ($acao == "contaPagar") {
  unset($_POST["acao"]);
  ContaController::pagar($_POST);
  PagamentoController::cadastrar($_POST);
  header("Location: ../view/cliente/finalizacao.php");
}
else if ($acao == "continuarPedindo") {
  // var_dump($_SESSION);
  $mesa = $_SESSION["mesa"] = 4;
  $idCliente = $_SESSION["id"];
  $email = $_SESSION["email"];

  // var_dump($_SESSION);
  date_default_timezone_set("America/Bahia");
  $data = date('Y-m-d');
  $hora = date('H:i');
  $status = "Aberta";

  $cliente = new Cliente("", $email, "");
  $cliente -> setId($idCliente);

  $conta = new Conta($mesa, $cliente, 0, $data, $hora, $status);
  $contaAberta = ContaController::cadastrar($conta);

  var_dump($contaAberta);
  header("Location: ../view/cliente/index.php");
}
else if($acao == "verPedido") {
  $_SESSION["contaDetalhe"] = $_POST["contaId"];
  header("Location: ../view/cliente/pedido.php");
}
else if ($acao == "cozinheiroLogin") {
  $email = $_POST["email"];
  $senha = $_POST["senha"];
  
  $cozinheiro = new Cozinheiro("", $email, $senha);
  CozinheiroController::login($cozinheiro);
}
else if($acao == "cozinheiroVerPedido") {
  $_SESSION["contaDetalhe"] = $_POST["contaId"];
  header("Location: ../view/cozinheiro/detalhes.php");
}
else if($acao == "entregarPedido") {
  $contaAberta = ContaController::entregar($_POST);
  header("Location: ../view/cozinheiro/");
}

