<?php
class PedidoDAO {
   
  public function cadastrar($novoPedido) {
    $idProduto = $novoPedido->getIdProduto();
    $qtdProduto = $novoPedido->getQtdProduto();
    $tipoProduto = $novoPedido->getTipoProduto();
    $conta = $novoPedido->getConta();
    $valorParcial = $novoPedido->getValorParcial();

    try{
      $minhaConexao = Conexao::getConexao();
      $sql = "INSERT INTO pedido(produto_id, produto_qtd, produto_tipo, conta_id, valor_parcial) VALUES (:produto_id, :produto_qtd, :produto_tipo, :conta_id, :valor_parcial)";      
      $stmt = $minhaConexao -> prepare($sql);
      $stmt -> bindParam(":produto_id", $idProduto);
      $stmt -> bindParam(":produto_qtd", $qtdProduto);
      $stmt -> bindParam(":produto_tipo", $tipoProduto);
      $stmt -> bindParam(":conta_id", $conta);
      $stmt -> bindParam(":valor_parcial", $valorParcial);
      
      $stmt -> execute();

      $last_id = $minhaConexao -> lastInsertId();

      return $last_id;
    }
    catch(PDOException $e){
      return 0;
    }
  }

  public function listarPedidos($contaId) {
    try{
      $minhaConexao = Conexao::getConexao();
      $sql = "SELECT * FROM pedido WHERE conta_id = :conta_id";      
      $stmt = $minhaConexao -> prepare($sql);
      $stmt -> bindParam(":conta_id", $contaId);
      
      $stmt -> execute();

      return $stmt -> fetchAll();
    }
    catch(PDOException $e){
      return -1;
    }
  }

  public function buscarComida($idComida) {
    try{
      $minhaConexao = Conexao::getConexao();
      $sql = "SELECT * FROM comida WHERE id = :comida_id";      
      $stmt = $minhaConexao -> prepare($sql);
      $stmt -> bindParam(":comida_id", $idComida);
      
      $stmt -> execute();

      return $stmt -> fetch();
    }
    catch(PDOException $e){
      return -1;
    }
  }

  public function buscarBebida($idBebida) {
    try{
      $minhaConexao = Conexao::getConexao();
      $sql = "SELECT * FROM bebida WHERE id = :bebida_id";      
      $stmt = $minhaConexao -> prepare($sql);
      $stmt -> bindParam(":bebida_id", $idBebida);
      
      $stmt -> execute();

      return $stmt -> fetch();
    }
    catch(PDOException $e){
      return -1;
    }
  }
}
