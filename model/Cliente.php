<?php
class Cliente {
  private $id;
  private $nome;
  private $email;
  private $cpf;
  private $bonus;

  public function __construct($nome, $email, $cpf){ 
    $this->nome = $nome;
    $this->email = $email;
    $this->cpf = $cpf;
    $this->bonus = 0;
  }
      
  public function getId() {
    return $this->id;
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

  public function getCpf() {
    return $this->cpf;
  }

  public function setCpf($cpf) {
    $this->cpf = $cpf;
  }
      
  public function getBonus() {
    return $this->bonus;
  }

  public function setBonus($bonus) {
    $this->bonus = $bonus;
  }
}

?>