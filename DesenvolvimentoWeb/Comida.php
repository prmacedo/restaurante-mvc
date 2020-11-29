<?php
require_once 'Produto.php';
class Comida extends Produto{
    private $descricao;
    
    function getDescricao() {
        return $this->descricao;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }


}
