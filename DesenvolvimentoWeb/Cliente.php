<?php
class Cliente {
    private $email, $cpf, $nome, $id, $bonus;
    
    function getEmail() {
        return $this->email;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getNome() {
        return $this->nome;
    }

    function getId() {
        return $this->id;
    }

    function getBonus() {
        return $this->bonus;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setBonus($bonus) {
        $this->bonus = $bonus;
    }

    public function cadastrarCliente($email, $cpf, $nome, $id) {
        $this->setEmail($email);
        $this->setCpf($cpf);
        $this->setNome($nome);
        $this->setId($id);
        $this->setBonus(0);
    }
    
    public function excluirCliente() {

    }
    
    public function atualizarCliente($email, $cpf, $nome, $bonus) { 
        $this->setEmail($email);
        $this->setCpf($cpf);
        $this->setNome($nome);
        $this->setBonus($bonus);
    }
    
    public function possuiBonus() {
        $bonus = $this->getBonus();
        if ($bonus > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function valorDoBonus() {
        return $this->getBonus();
    }
}
