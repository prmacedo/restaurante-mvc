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

  public function listarContas($clienteId) {
    try{
      $minhaConexao = Conexao::getConexao();
      $sql = "SELECT *, DATE_FORMAT(data, '%d de %M de %Y') AS data, TIME_FORMAT(hora, '%H\:%i') as hora FROM conta WHERE cliente_id = :cliente_id AND status <> 'Aberta' ORDER BY id DESC";      
      $stmt = $minhaConexao -> prepare($sql);
      $stmt -> bindParam(":cliente_id", $clienteId);
      
      $stmt -> execute();

      return $stmt -> fetchAll();
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

  public function listarContasDoDia($data) {
    try{
      $minhaConexao = Conexao::getConexao();
      $sql = "SELECT *, DATE_FORMAT(data, '%d de %M de %Y') AS data, TIME_FORMAT(hora, '%H\:%i') as hora FROM conta WHERE data = :data AND status = 'Em preparo' ORDER BY id ASC";      
      $stmt = $minhaConexao -> prepare($sql);
      $stmt -> bindParam(":data", $data);
      
      $stmt -> execute();

      return $stmt -> fetchAll();
    }
    catch(PDOException $e){
      return null;
    }
  }

  public function aguardar($contaId) {
    $status = "Em preparo";
    try{
      $minhaConexao = Conexao::getConexao();
      $sql = "UPDATE conta SET status = :status WHERE id = :id";
      $stmt = $minhaConexao -> prepare($sql);
      $stmt -> bindParam(":id", $contaId);
      $stmt -> bindParam(":status", $status);
      
      $stmt -> execute();

      return true;
    }
    catch(PDOException $e){
      return false;
    }
  }

  public function entregar($contaId) {
    $status = "Pronto";
    try{
      $minhaConexao = Conexao::getConexao();
      $sql = "UPDATE conta SET status = :status WHERE id = :id";
      $stmt = $minhaConexao -> prepare($sql);
      $stmt -> bindParam(":id", $contaId);
      $stmt -> bindParam(":status", $status);
      
      $stmt -> execute();

      return true;
    }
    catch(PDOException $e){
      return false;
    }
  }

  public function excluir($contaId) {
    try{
      $minhaConexao = Conexao::getConexao();
      $sql = "DELETE FROM conta WHERE id = :id";      
      $stmt = $minhaConexao -> prepare($sql);
      $stmt -> bindParam(":id", $contaId);
      
      $stmt -> execute();

      return true;
    }
    catch(PDOException $e){
      return false;
    }
  }

}
