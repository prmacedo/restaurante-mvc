<?php

require ("C:/xampp/htdocs/Restaurante/model/GerenteDAO.php");

class GerenteController
{
  
  function login($gerente) {
    $gerenteDAO = new GerenteDAO();
    $dadosGerente = $gerenteDAO -> login($gerente);
    if (!empty($dadosGerente)) {
      SessaoController::autenticarSessaoGerente();
      
      $gerente -> setId($dadosGerente["id"]);
      $gerente -> setNome($dadosGerente["nome"]);
      
      $_SESSION["gerenteId"] = $dadosGerente["id"];
      header("Location: ../view/gerente/index.php");
    } else {
      $_SESSION["erroLogin"] = "Usuário não encontrado";
      header("Location: ../view/login-gerente.php");
    }
  }

  function buscar($gerenteId) {
    $gerenteDAO = new GerenteDAO();

    $dadosGerente = $gerenteDAO -> buscar($gerenteId);
    if (!empty($dadosGerente)) {
      $_SESSION["gerente"] = $dadosGerente;
      header("Location: ../view/gerente/meus-dados/editar.php");
    } else {
      echo "erro";
    }
  }
}