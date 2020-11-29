<?php
class Funcionario {
    private $id, $email, $senha;
    
    function getId() {
        return $this->id;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }
    
    public function cadastrarFuncionario($id, $email, $senha) {
        $this->setId($id);
        $this->setEmail($email);
        $this->setSenha($senha);
    }

    public function listarFuncionario() {
        
    }
    
    public function excluirFuncionario() {
      
    }
    
    public function atualizarFuncionario($email, $senha) {
        $this->setEmail($email);
        $this->setSenha($senha);
    }

}
