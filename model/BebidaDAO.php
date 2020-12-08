<?php
class BebidaDAO
{
  public function cadastrar($novaBebida) {  
    $id = $novaBebida->getId();
    $nome = $novaBebida->getNome();
    $preco = $novaBebida->getPreco();
    $fornecedor = $novaBebida->getFornecedor();

    try{
      $minhaConexao = Conexao::getConexao();
      $sql = "INSERT INTO bebida(id, nome, preco, fornecedor) VALUES (:id, :nome, :preco, :fornecedor)";      
      $stmt = $minhaConexao -> prepare($sql);
      $stmt -> bindParam(":id", $id);
      $stmt -> bindParam(":nome", $nome);
      $stmt -> bindParam(":preco", $preco);
      $stmt -> bindParam(":fornecedor", $fornecedor);
      
      $stmt -> execute();

      return true;
    }
    catch(PDOException $e){
      return 0;
    }
  }

  public function excluir($bebidaId) {
    try{
      $minhaConexao = Conexao::getConexao();
      $sql = "DELETE FROM bebida WHERE id = :id";
      $stmt = $minhaConexao -> prepare($sql);
      $stmt -> bindParam(":id", $bebidaId);
      
      $stmt -> execute();

      return true;
    }
    catch(PDOException $e){
      return false;
    }
  }

  public function atualizar($bebida, $bebidaId) {
    $id = $bebida->getId();
    $nome = $bebida->getNome();
    $preco = $bebida->getPreco();
    $fornecedor = $bebida->getFornecedor();

    try{
      $minhaConexao = Conexao::getConexao();
      $sql = "UPDATE bebida SET id = :id, nome = :nome, preco = :preco, fornecedor = :fornecedor WHERE id = :idAntigo";
      $stmt = $minhaConexao -> prepare($sql);
      $stmt -> bindParam(":id", $id);
      $stmt -> bindParam(":idAntigo", $bebidaId);
      $stmt -> bindParam(":nome", $nome);
      $stmt -> bindParam(":preco", $preco);
      $stmt -> bindParam(":fornecedor", $fornecedor);
      
      $stmt -> execute();

      return true;
    }
    catch(PDOException $e){
      return false;
    }
  }

  public function buscar($bebidaId) {
    try{
      $minhaConexao = Conexao::getConexao();
      $sql = "SELECT * FROM bebida WHERE id = :id";
      $stmt = $minhaConexao -> prepare($sql);
      $stmt -> bindParam(":id", $bebidaId);
      
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
      $sql = "SELECT * FROM bebida";
      $stmt = $minhaConexao -> prepare($sql);
      
      $stmt -> execute();

      return $stmt -> fetchAll();
    }
    catch(PDOException $e){
      return 0;
    }
  }
}
