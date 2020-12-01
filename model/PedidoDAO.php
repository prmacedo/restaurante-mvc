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

  public function atualizar() {
    
  }

}
