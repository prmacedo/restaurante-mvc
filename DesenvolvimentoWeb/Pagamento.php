<?php
require_once 'Conta.php';
class Pagamento {
    private $id, $conta;
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }
    
    public function realizarPagamento($conta) {
        if ($this->conta->getId() <= $conta) {
            return true;
        } else {
            return false;
        }
    }
    
    public function listarPagamento() {
        
    }
    
    public function excluirPagamento() {
        
    }
}
