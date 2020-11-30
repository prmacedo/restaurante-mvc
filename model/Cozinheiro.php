<?php
class Cozinheiro {
  private $id;
  private $nome;
  private $email;
  private $senha;

  public function __construct($nome, $email, $senha){ 
    $this->nome = $nome;
    $this->email = $email;
    $this->senha = $senha;
  }
  
  function getId() {
    return $this->id;
  }

  function setId($id) {
    $this->id = $id;
  }

  function getNome() {
    return $this->nome;
  }

  function setNome($nome) {
    $this->nome = $nome;
  }

  function getEmail() {
    return $this->email;
  }
  
  function setEmail($email) {
    $this->email = $email;
  }
  
  function getSenha() {
    return $this->senha;
  }

  function setSenha($senha) {
    $this->senha = $senha;
  }
}
