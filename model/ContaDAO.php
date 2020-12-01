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

  public function detalhar($contaId) {
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

  public function buscar($contaId) {
    try{
      $minhaConexao = Conexao::getConexao();
      $sql = "SELECT *, DATE_FORMAT(data, '%d de %M de %Y') AS data, TIME_FORMAT(hora, '%H\h%i\min') as hora FROM conta WHERE id = :id";      
      $stmt = $minhaConexao -> prepare($sql);
      $stmt -> bindParam(":id", $contaId);
      
      $stmt -> execute();

      return $stmt -> fetch();
    }
    catch(PDOException $e){
      return -1;
    }
  }

  public function pagar($conta) {
    $contaId = $conta -> getId();
    $valorTotal = $conta -> getValorTotal();
    $status = $conta -> getStatus();

    try{
      $minhaConexao = Conexao::getConexao();
      $sql = "UPDATE conta SET valor_total = :valor_total, status = :status WHERE id = :id";
      $stmt = $minhaConexao -> prepare($sql);
      $stmt -> bindParam(":id", $contaId);
      $stmt -> bindParam(":valor_total", $valorTotal);
      $stmt -> bindParam(":status", $status);
      
      $stmt -> execute();

      return true;
    }
    catch(PDOException $e){
      return false;
    }
  }

}
