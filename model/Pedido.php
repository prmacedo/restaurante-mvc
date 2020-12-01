<?php
class Pedido {
  private $id;
  private $mesa;
  private $cliente;
  private $valorTotal;
  private $dataDoPedido;

  public function __construct($mesa, $cliente, $valorTotal, $dataDoPedido) {
    $this->mesa = $mesa;
    $this->cliente = $cliente;
    $this->valorTotal = $valorTotal;
    $this->dataDoPedido = $dataDoPedido;
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

      
  function getDataDoPedido() {
    return $this->dataDoPedido;
  }

  function setDataDoPedido($dataDoPedido) {
    $this->dataDoPedido = $dataDoPedido;
  }

   
}
