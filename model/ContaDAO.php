<?php
class ContaDAO {
   
  public function cadastrar($novaConta) {
    $mesa = $novaConta -> getMesa();
    $idCliente = $novaConta -> getCliente() -> getId();
    $valorTotal = $novaConta -> getValorTotal();
    $data = $novaConta -> getData();

    try{
      $minhaConexao = Conexao::getConexao();
      $sql = "INSERT INTO conta(mesa, cliente_id, valor_total, data) VALUES (:mesa, :cliente_id, :valor_total, :data)";      
      $stmt = $minhaConexao -> prepare($sql);
      $stmt -> bindParam(":mesa", $mesa);
      $stmt -> bindParam(":cliente_id", $idCliente);
      $stmt -> bindParam(":valor_total", $valorTotal);
      $stmt -> bindParam(":data", $data);
      
      $stmt -> execute();

      $last_id = $minhaConexao -> lastInsertId();
      return $last_id;
    }
    catch(PDOException $e){
      return -1;
    }

  }

  public function atualizar() {
    
  }

}
