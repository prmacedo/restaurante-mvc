<?php

require ("../model/GerenteDAO.php");

class GerenteController
{
  
  function login($gerente) {
    $gerenteDAO = new GerenteDAO();
    $dadosGerente = $gerenteDAO -> login($gerente);
    if (!empty($dadosGerente)) {
      SessaoController::autenticarSessaoGerente();
      
      $gerente -> setId($dadosGerente["id"]);
      $gerente -> setNome($dadosGerente["nome"]);
      
      $_SESSION["gerente"] = $dadosGerente["id"];
      header("Location: ../view/gerente/index.php");
    } else {
      $_SESSION["erroLogin"] = "Usuário não encontrado";
      header("Location: ../view/login-gerente.php");
    }
  }
}



/*
session_start();

if (empty($_POST)) {
  header("Location: ../view/index.php");
}

require ("../model/Gerente.php");
require ("../model/GerenteDAO.php");
require ("SessaoController.php");

$nome = "";
$email = $_POST["email"];
$senha = $_POST["senha"];

$acao = $_POST["acao"];

$gerente = new Gerente($nome, $email, $senha);
$gerenteDAO = new GerenteDAO();

function login($gerente, $gerenteDAO) {
  $dadosGerente = $gerenteDAO -> login($gerente);
  if (!empty($dadosGerente)) {
    SessaoController::autenticarSessaoGerente();
    
    $gerente -> setId($dadosGerente["id"]);
    $gerente -> setNome($dadosGerente["nome"]);
    
    $_SESSION["gerente"] = $dadosGerente["id"];
    header("Location: ../view/gerente/index.php");
  } else {
    $_SESSION["erroLogin"] = "Usuário não encontrado";
    header("Location: ../view/login-gerente.php");
  }
}

// function buscar($gerente, $gerenteDAO) {
//   $dadosGerente = $gerenteDAO -> buscar($gerente->getId());
//   if (!empty($dadosGerente)) {
//   } else {
//     echo "erro";
//   }
// }
echo $gerente->getNome();
function buscar($gerente) {
  $_SESSION["nome"] = $gerente->getNome();
  $_SESSION["email"] = $gerente->getEmail();
  $_SESSION["senha"] = $gerente->getSenha();

  header("Location: ../view/gerente/meus-dados/editar.php");
}

if ($acao == "login") {
  login($gerente, $gerenteDAO);
} else if($acao == "buscar") {
  buscar($gerente);
}

