<?php
class Pedido {
    private $dataDoPedido, $valorTotal, $id, $mesa, $cliente;
    
    function getDataDoPedido() {
        return $this->dataDoPedido;
    }

    function getValorTotal() {
        return $this->valorTotal;
    }

    function getId() {
        return $this->id;
    }

    function getMesa() {
        return $this->mesa;
    }

    function setDataDoPedido($dataDoPedido) {
        $this->dataDoPedido = $dataDoPedido;
    }

    function setValorTotal($valorTotal) {
        $this->valorTotal = $valorTotal;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setMesa($mesa) {
        $this->mesa = $mesa;
    }

    public function cadastrarPedido($dataDoPedido, $valorTotal, $id, $mesa) {
        $this->setDataDoPedido($dataDoPedido);
        $this->setValorTotal($valorTotal);
        $this->setId($id);
        $this->setMesa($mesa);
    }
    
    public function atualizarPedido($dataDoPedido, $valorTotal, $mesa) {
        $this->setDataDoPedido($dataDoPedido);
        $this->setValorTotal($valorTotal);
        $this->setMesa($mesa);
    }
    
    public function excluirPedido() {
        
    }
    
    public function listarPedido() {
        
    }
}
