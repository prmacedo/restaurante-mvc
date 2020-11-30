<?php
class Bebida {
  private $id;
  private $nome;
  private $preco;
  private $fornecedor;

  public function __construct($nome, $preco, $fornecedor){ 
    $this->nome = $nome;
    $this->preco = $preco;
    $this->fornecedor = $fornecedor;
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

    function getFornecedor() {
    return $this->fornecedor;
  }

  function setFornecedor($fornecedor) {
    $this->fornecedor = $fornecedor;
  }

}
