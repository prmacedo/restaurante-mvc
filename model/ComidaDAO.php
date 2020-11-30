<?php
class ComidaDAO
{
  public function cadastrar($novaComida) {  
    $nome = $novaComida->getNome();
    $preco = $novaComida->getPreco();
    $descricao = $novaComida->getDescricao();

    try{
      $minhaConexao = Conexao::getConexao();
      $sql = "INSERT INTO comida(nome, preco, descricao) VALUES (:nome, :preco, :descricao)";      
      $stmt = $minhaConexao -> prepare($sql);
      $stmt -> bindParam(":nome", $nome);
      $stmt -> bindParam(":preco", $preco);
      $stmt -> bindParam(":descricao", $descricao);
      
      $stmt -> execute();

      return true;
    }
    catch(PDOException $e){
      return 0;
    }
  }

  public function excluir($comidaId) {
    try{
      $minhaConexao = Conexao::getConexao();
      $sql = "DELETE FROM comida WHERE id = :id";
      $stmt = $minhaConexao -> prepare($sql);
      $stmt -> bindParam(":id", $comidaId);
      
      $stmt -> execute();

      return true;
    }
    catch(PDOException $e){
      return false;
    }
  }

  public function atualizar($comida, $comidaId) {
    $id = $comida->getId();
    $nome = $comida->getNome();
    $preco = $comida->getPreco();
    $descricao = $comida->getDescricao();

    try{
      $minhaConexao = Conexao::getConexao();
      $sql = "UPDATE comida SET id = :id, nome = :nome, preco = :preco, descricao = :descricao WHERE id = :idAntigo";
      $stmt = $minhaConexao -> prepare($sql);
      $stmt -> bindParam(":id", $id);
      $stmt -> bindParam(":idAntigo", $comidaId);
      $stmt -> bindParam(":nome", $nome);
      $stmt -> bindParam(":preco", $preco);
      $stmt -> bindParam(":descricao", $descricao);
      
      $stmt -> execute();

      return true;
    }
    catch(PDOException $e){
      return false;
    }
  }

  public function buscar($comidaId) {
    try{
      $minhaConexao = Conexao::getConexao();
      $sql = "SELECT * FROM comida WHERE id = :id";
      $stmt = $minhaConexao -> prepare($sql);
      $stmt -> bindParam(":id", $comidaId);
      
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
      $sql = "SELECT * FROM comida";
      $stmt = $minhaConexao -> prepare($sql);
      
      $stmt -> execute();

      return $stmt -> fetchAll();
    }
    catch(PDOException $e){
      return 0;
    }
  }
}
