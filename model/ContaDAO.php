<?php
class ContaDAO {
   
  public function cadastrar($novaConta) {
    $mesa = $novaConta -> getMesa();
    $idCliente = $novaConta -> getCliente() -> getId();
    $valorTotal = $novaConta -> getValorTotal();
    $data = $novaConta -> getData();
    $hora = $novaConta -> getHora();
    $status = $novaConta -> getStatus();

    try{
      $minhaConexao = Conexao::getConexao();
      $sql = "INSERT INTO conta(mesa, cliente_id, valor_total, data, hora, status) VALUES (:mesa, :cliente_id, :valor_total, :data, :hora, :status)";      
      $stmt = $minhaConexao -> prepare($sql);
      $stmt -> bindParam(":mesa", $mesa);
      $stmt -> bindParam(":cliente_id", $idCliente);
      $stmt -> bindParam(":valor_total", $valorTotal);
      $stmt -> bindParam(":data", $data);
      $stmt -> bindParam(":hora", $hora);
      $stmt -> bindParam(":status", $status);
      
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
