<?php
require_once 'Pagamento.php';
require_once 'Pedido.php';
class Conta {
    private $id, $pedido, $pagamento;
    
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }
    
    public function cadastrarConta($id) {
        $this->setId($id);
    }
    
    public function excluirConta() {
        
    }
    
    public function atualizarConta() {
        
    }
    
    public function listarConta() {
       
    }
}
