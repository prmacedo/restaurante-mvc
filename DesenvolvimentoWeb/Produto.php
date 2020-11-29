<?php
class Produto {
    private $nome, $codigo, $preco;
    
    function getNome() {
        return $this->nome;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getPreco() {
        return $this->preco;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setPreco($preco) {
        $this->preco = $preco;
    }

    function cadastrarProdutos($nome, $codigo, $preco) {
        $this->setNome($nome);
        $this->setCodigo($codigo);
        $this->setPreco($preco);
    }
    
    public function listarProduto() {
        
    }
    
    public function atualizarProduto($nome, $preco) {
        $this->setNome($nome);
        $this->setPreco($preco);
    }
    
    public function excluirProduto() {

    }

}
