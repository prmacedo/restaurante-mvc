<?php

require ("../model/GerenteDAO.php");

class GerenteController
{
  
  function login($post) {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $gerente = new Gerente("", $email, $senha);

    $gerenteDAO = new GerenteDAO();
    $dadosGerente = $gerenteDAO -> login($gerente);
    if (!empty($dadosGerente)) {
      
      $_SESSION["gerente"] = $dadosGerente;
      return true;
    } else {
      $_SESSION["erroLogin"] = "Usuário não encontrado";
      return false;
    }
  }

  function atualizar($post) {
    $id = $post["id"];
    $nome = $post["nome"];
    $email = $post["email"];
    $senha = $post["senha"];

    $gerente = new Gerente($nome, $email, $senha);
    $gerente -> setId($id);

    $gerenteDAO = new GerenteDAO();
    $dadosAtualizados = $gerenteDAO -> atualizar($gerente);
    
    if (!empty($dadosAtualizados)) {
      $_SESSION["gerente"] = $dadosAtualizados;      
      return true;
    } else {
      $_SESSION["erroLogin"] = "Erro ao atualizar cadastro!";
      return false;
    }
  }
  
}