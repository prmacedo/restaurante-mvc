<?php
class Gerente {
  private $id;
  private $nome;
  private $email;
  private $senha;

  public function __construct($nome, $email, $senha){ 
    $this->nome = $nome;
    $this->email = $email;
    $this->senha = $senha;
  }

  public function getId() {
    return $this->$id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getNome() {
    return $this->nome;
  }

  public function setNome($nome) {
    $this->nome = $nome;
  }

  public function getEmail() {
    return $this->email;
  }

  public function setEmail($email) {
    $this->email = $email;
  }

  public function getSenha() {
    return $this->senha;
  }

  public function setSenha($senha) {
    $this->senha = $senha;
  }
}
