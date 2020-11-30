<?php
class Comida {
  private $id;
  private $nome;
  private $preco;
  private $descricao;

  public function __construct($nome, $preco, $descricao){ 
    $this->nome = $nome;
    $this->preco = $preco;
    $this->descricao = $descricao;
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

  function getPreco() {
    return $this->preco;
  }  

  function setPreco($preco) {
    $this->preco = $preco;
  }

    function getDescricao() {
    return $this->descricao;
  }

  function setDescricao($descricao) {
    $this->descricao = $descricao;
  }

}
