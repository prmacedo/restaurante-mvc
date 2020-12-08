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
  unset($_POST["acao"]);

  $cliente = ClienteController::login($_POST);
  if ($cliente) {
    SessaoController::autenticarSessaoCliente();
    
    $contaAberta = ContaController::cadastrar($_POST, $cliente);
    header("Location: ../view/cliente/index.php");
  } else {
    header("Location: ../view/");
  }
}
else if ($acao == "clienteCadastrar") {
  unset($_POST["acao"]);

  if (ClienteController::cadastrar($_POST)) {
    header("Location: ../view/index.php");    
  } else {
    header("Location: ../view/cadastro.php");    
  }
}
else if ($acao == "gerenteLogin") {
  unset($_POST["acao"]);
  
  if (GerenteController::login($_POST)) {
    SessaoController::autenticarSessaoGerente();
    header("Location: ../view/gerente/index.php");
  } else {
    header("Location: ../view/login-gerente.php");
  }
}
else if ($acao == "gerenteAtualizar") {
  unset($_POST["acao"]);
  
  if (GerenteController::atualizar($_POST)) {
    header("Location: ../view/gerente/meus-dados/");
  } else {
    header("Location: ../view/gerente/meus-dados/editar.php");
  }
}
else if($acao == "bebidaCadastrar") {
  unset($_POST["acao"]);

  if(BebidaController::cadastrar($_POST)) {
    header("Location: ../view/gerente/bebida");
  } else {
    header("Location: ../view/gerente/bebida/adicionar.php");
  }
}
else if($acao == "bebidaEditar") {
  unset($_POST["acao"]);
  
  if(BebidaController::atualizar($_POST)) {
    header("Location: ../view/gerente/bebida/");
  } else {
    $id = $_POST['idAntigo'];
    header("Location: ../view/gerente/bebida/editar.php?id=$id");
  }
}
else if($acao == "bebidaExcluir") {
  unset($_POST["acao"]);

  BebidaController::excluir($_POST);
  header("Location: ../view/gerente/bebida/");
}
else if($acao == "comidaCadastrar") {
  unset($_POST["acao"]);
   
  if(ComidaController::cadastrar($_POST)) {
    header("Location: ../view/gerente/comida");
  } else {
    header("Location: ../view/gerente/comida/adicionar.php");
  }
}
else if($acao == "comidaEditar") {
  unset($_POST["acao"]);
  
  if(ComidaController::atualizar($_POST)) {
    header("Location: ../view/gerente/comida/");
  } else {
    $id = $_POST['idAntigo'];
    header("Location: ../view/gerente/comida/editar.php?id=$id");
  }
}
else if($acao == "comidaExcluir") {
  unset($_POST["acao"]);
  
  ComidaController::excluir($_POST);
  header("Location: ../view/gerente/comida/");
}
else if($acao == "cozinheiroCadastrar") {
  unset($_POST["acao"]);
  
  if(CozinheiroController::cadastrar($_POST)) {
    header("Location: ../view/gerente/cozinheiro");
  } else {
    header("Location: ../view/gerente/cozinheiro/adicionar.php");
  }
}
else if($acao == "cozinheiroEditar") {
  unset($_POST["acao"]);
  
  if(CozinheiroController::atualizar($_POST)) {
    header("Location: ../view/gerente/cozinheiro/");
  } else {
    header("Location: ../view/gerente/cozinheiro/editar.php?id=$cozinheiroId");
  }
}
else if($acao == "cozinheiroExcluir") {
  unset($_POST["acao"]);

  CozinheiroController::excluir($_POST);
  header("Location: ../view/gerente/cozinheiro/");
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
  ClienteController::atualizarBonus($_POST);
  header("Location: ../view/cliente/finalizacao.php");
}
else if ($acao == "continuarPedindo") {
  $idCliente = $_SESSION["id"];
  $email = $_SESSION["email"];  

  $cliente = new Cliente("", $email, "");
  $cliente -> setId($idCliente);

  $contaAberta = ContaController::cadastrar($_POST, $cliente);

  header("Location: ../view/cliente/index.php");
}
else if($acao == "verPedido") {
  $_SESSION["contaDetalhe"] = $_POST["contaId"];
  header("Location: ../view/cliente/pedido.php");
}
else if ($acao == "cozinheiroLogin") {
  unset($_POST["acao"]);
  if (CozinheiroController::login($_POST)) {
    header("Location: ../view/cozinheiro/index.php");
  } else {
    header("Location: ../view/login-cozinha.php");
  }
}
else if($acao == "cozinheiroVerPedido") {
  $_SESSION["contaDetalhe"] = $_POST["contaId"];
  header("Location: ../view/cozinheiro/detalhes.php");
}
else if($acao == "entregarPedido") {
  $contaAberta = ContaController::entregar($_POST);
  header("Location: ../view/cozinheiro/");
}
else if($acao == "cozinheiroAtualizar") {
  unset($_POST["acao"]);

  if(CozinheiroController::atualizar($_POST)) {
    header("Location: ../view/cozinheiro/meus-dados/");
  } else {
    header("Location: ../view/cozinheiro/meus-dados/editar.php");
  }
}
else if($acao == "clienteSair") {
  unset($_POST["acao"]);
  $permissao = ContaController::verificarStatus($_POST["contaId"]);
    
  if (!$permissao) {
    header("Location: ../view/cliente/pedidos.php");
  } else {
    SessaoController::finalizarSessao();
    header("Location: ../view/");
  }
}