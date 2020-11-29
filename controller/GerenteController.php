<?php

require ("../model/GerenteDAO.php");

class GerenteController
{
  
  function login($gerente) {
    $gerenteDAO = new GerenteDAO();
    $dadosGerente = $gerenteDAO -> login($gerente);
    if (!empty($dadosGerente)) {
      SessaoController::autenticarSessaoGerente();
      
      $_SESSION["gerente"] = $dadosGerente;
      header("Location: ../view/gerente/index.php");
    } else {
      $_SESSION["erroLogin"] = "Usuário não encontrado";
      header("Location: ../view/login-gerente.php");
    }
  }

  // function buscar($gerenteId) {
  //   $gerenteDAO = new GerenteDAO();

  //   $dadosGerente = $gerenteDAO -> buscar($gerenteId);
  //   if (!empty($dadosGerente)) {
  //     $_SESSION["gerente"] = $dadosGerente;
  //     header("Location: ../view/gerente/meus-dados/editar.php");
  //   } else {
  //     echo "erro";
  //   }
  // }

  function atualizar($gerente) {
    $gerenteDAO = new GerenteDAO();
    $dadosAtualizados = $gerenteDAO -> atualizar($gerente);
    
    if (!empty($dadosAtualizados)) {
      $_SESSION["gerente"] = $dadosAtualizados;
      
      header("Location: ../view/gerente/meus-dados/");
    } else {
      $_SESSION["erroLogin"] = "Erro ao atualizar cadastro!";
      header("Location: ../view/gerente/meus-dados/editar.php");
    }
  }
  
}