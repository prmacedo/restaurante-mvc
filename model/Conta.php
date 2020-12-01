<?php
class Conta {
  private $id;
  private $mesa;
  private $cliente;
  private $valorTotal;
  private $data;

  public function __construct($mesa, $cliente, $valorTotal, $data) {
    $this->mesa = $mesa;
    $this->cliente = $cliente;
    $this->valorTotal = $valorTotal;
    $this->data = $data;
  }

  function getId() {
    return $this->id;
  }

  function setId($id) {
    $this->id = $id;
  }

  function getMesa() {
    return $this->mesa;
  }

  function setMesa($mesa) {
    $this->mesa = $mesa;
  }

  function getCliente() {
    return $this->cliente;
  }

  function setCliente($cliente) {
    $this->cliente = $cliente;
  } 

  function getValorTotal() {
    return $this->valorTotal;
  }

  function setValorTotal($valorTotal) {
    $this->valorTotal = $valorTotal;
  }

      
  function getData() {
    return $this->data;
  }

  function setData($data) {
    $this->data = $data;
  }

   
}
