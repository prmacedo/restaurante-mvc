<?php
class PagamentoDAO
{
  public function cadastrar($novoPagamento) {  
    $idConta = $novoPagamento->getContaId();
    $dataPagamento = $novoPagamento->getDataPagamento();

    try{
      $minhaConexao = Conexao::getConexao();
      $sql = "INSERT INTO pagamento(conta_id, data) VALUES (:conta_id, :data)";
      $stmt = $minhaConexao -> prepare($sql);
      $stmt -> bindParam(":conta_id", $idConta);
      $stmt -> bindParam(":data", $dataPagamento);
      
      $stmt -> execute();

      return true;
    }
    catch(PDOException $e){
      return false;
    }
  }
}
