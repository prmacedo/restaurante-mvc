<?php
class Pedido {
  private $id;
  private $idProduto;
  private $qtdProduto;
  private $tipoProduto;
  private $conta;
  private $valorParcial;

  public function __construct($idProduto, $qtdProduto, $tipoProduto, $conta, $valorParcial) {
    $this->idProduto = $idProduto;
    $this->qtdProduto = $qtdProduto;
    $this->tipoProduto = $tipoProduto;
    $this->conta = $conta;
    $this->valorParcial = $valorParcial;
  }

  function getId() {
    return $this->id;
  }

  function setId($id) {
    $this->id = $id;
  }

  function getIdProduto() {
    return $this->idProduto;
  }

  function setIdProduto($idProduto) {
    $this->idProduto = $idProduto;
  }

  function getQtdProduto() {
    return $this->qtdProduto;
  }

  function setQtdProduto($qtdProduto) {
    $this->qtdProduto = $qtdProduto;
  }

  function getTipoProduto() {
    return $this->tipoProduto;
  }

  function setTipoProduto($tipoProduto) {
    $this->tipoProduto = $tipoProduto;
  }

  function getConta() {
    return $this->conta;
  }

  function setConta($conta) {
    $this->conta = $conta;
  }

  function getValorParcial() {
    return $this->valorParcial;
  }

  function setValorParcial($valorParcial) {
    $this->valorParcial = $valorParcial;
  }

}
