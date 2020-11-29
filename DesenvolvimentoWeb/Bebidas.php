<?php
require_once 'Produto.php';
class Bebidas extends Produto {
    private $fornecedor;
    
    function getFornecedor() {
        return $this->fornecedor;
    }

    function setFornecedor($fornecedor) {
        $this->fornecedor = $fornecedor;
    }

}
