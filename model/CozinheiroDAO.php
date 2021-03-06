<?php
class CozinheiroDAO
{

  public function login($cozinheiro){
    echo $email = $cozinheiro -> getEmail();
    echo $senha = $cozinheiro -> getSenha();

    try {
      $minhaConexao = Conexao::getConexao();
      $sql = "SELECT * FROM cozinheiro WHERE email = :email AND senha = :senha";
      $stmt = $minhaConexao -> prepare($sql);
      $stmt -> bindParam(":email", $email);
      $stmt -> bindParam(":senha", $senha);  
      $stmt -> execute();

      return $stmt -> fetch();
    }
    catch(PDOException $e) {
      var_dump($e);
    }
  }

  public function cadastrar($novoCozinheiro) {  
    $nome = $novoCozinheiro->getNome();
    $email = $novoCozinheiro->getEmail();
    $senha = $novoCozinheiro->getSenha();

    try{
      $minhaConexao = Conexao::getConexao();
      $sql = "INSERT INTO cozinheiro(nome, email, senha) VALUES (:nome, :email, :senha)";      
      $stmt = $minhaConexao -> prepare($sql);
      $stmt -> bindParam(":nome", $nome);
      $stmt -> bindParam(":email", $email);
      $stmt -> bindParam(":senha", $senha);
      
      $stmt -> execute();

      return true;
    }
    catch(PDOException $e){
      return false;
    }
  }

  public function excluir($cozinheiroId) {
    try{
      $minhaConexao = Conexao::getConexao();
      $sql = "DELETE FROM cozinheiro WHERE id = :id";
      $stmt = $minhaConexao -> prepare($sql);
      $stmt -> bindParam(":id", $cozinheiroId);
      
      $stmt -> execute();

      return true;
    }
    catch(PDOException $e){
      return false;
    }
  }

  public function atualizar($cozinheiro, $cozinheiroId) {
    $nome = $cozinheiro->getNome();
    $email = $cozinheiro->getEmail();
    $senha = $cozinheiro->getSenha();

    try{
      $minhaConexao = Conexao::getConexao();
      $sql = "UPDATE cozinheiro SET nome = :nome, email = :email, senha = :senha WHERE id = :id";
      $stmt = $minhaConexao -> prepare($sql);
      $stmt -> bindParam(":id", $cozinheiroId);
      $stmt -> bindParam(":nome", $nome);
      $stmt -> bindParam(":email", $email);
      $stmt -> bindParam(":senha", $senha);
      
      $stmt -> execute();

      return true;
    }
    catch(PDOException $e){
      return false;
    }
  }

  public function buscar($cozinheiroId) {
    try{
      $minhaConexao = Conexao::getConexao();
      $sql = "SELECT * FROM cozinheiro WHERE id = :id";
      $stmt = $minhaConexao -> prepare($sql);
      $stmt -> bindParam(":id", $cozinheiroId);
      
      $stmt -> execute();

      return $stmt -> fetch();
    }
    catch(PDOException $e){
      return 0;
    }
  }

  public function listar() {
    try{
      $minhaConexao = Conexao::getConexao();
      $sql = "SELECT * FROM cozinheiro";
      $stmt = $minhaConexao -> prepare($sql);
      
      $stmt -> execute();

      return $stmt -> fetchAll();
    }
    catch(PDOException $e){
      return 0;
    }
  }
}
