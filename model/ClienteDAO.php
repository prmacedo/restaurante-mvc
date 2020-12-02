<?php
class ClienteDAO{

  public function incluir($novoCliente) {  
    $nome = $novoCliente->getNome();
    $email = $novoCliente->getEmail();
    $cpf = $novoCliente->getCpf();

    try{
      $minhaConexao = Conexao::getConexao();

      $sql = "INSERT INTO cliente(nome, email, cpf) VALUES (:nome, :email, :cpf)";
      
      $stmt = $minhaConexao -> prepare($sql);
      $stmt -> bindParam(":nome", $nome);
      $stmt -> bindParam(":email", $email);
      $stmt -> bindParam(":cpf", $cpf);
      
      $stmt -> execute();

      $last_id = $minhaConexao -> lastInsertId();
      $novoCliente -> setId($last_id);
      
      return $last_id;
    }
    catch(PDOException $e){
      return 0;
    }
  }

  public function login($cliente) {
    $email = $cliente->getEmail();
    $cpf = $cliente->getCpf();

    try{
      $minhaConexao = Conexao::getConexao();

      $sql = "SELECT * FROM cliente WHERE email = :email AND cpf = :cpf";
      
      $stmt = $minhaConexao -> prepare($sql);
      $stmt -> bindParam(":email", $email);
      $stmt -> bindParam(":cpf", $cpf);
      
      $stmt -> execute();

      return $stmt -> fetch();
    }
    catch(PDOException $e){
      return 0;
    }
  }

  public function buscar($idCliente) {
    try{
      $minhaConexao = Conexao::getConexao();
      $sql = "SELECT * FROM cliente WHERE id = :cliente_id";      
      $stmt = $minhaConexao -> prepare($sql);
      $stmt -> bindParam(":cliente_id", $idCliente);
      
      $stmt -> execute();

      return $stmt -> fetch();
    }
    catch(PDOException $e){
      return -1;
    }
  }

  public function atualizarBonus($idCliente, $bonus) {
    try{
      $minhaConexao = Conexao::getConexao();
      $sql = "UPDATE cliente SET bonus=:bonus WHERE id=:id";      
      $stmt = $minhaConexao -> prepare($sql);
      $stmt -> bindParam(":id", $idCliente);
      $stmt -> bindParam(":bonus", $bonus);
      
      $stmt -> execute();

      return $stmt -> fetch();
    }
    catch(PDOException $e){
      return -1;
    }
  }

  public function validarDesconto($idCliente) {
    try{
      $minhaConexao = Conexao::getConexao();
      $sql = "SELECT bonus FROM cliente JOIN conta ON cliente.id = conta.cliente_id WHERE cliente.id = :id AND conta.data = CURRENT_DATE AND status = 'Pago' ORDER BY conta.id DESC";      
      $stmt = $minhaConexao -> prepare($sql);
      $stmt -> bindParam(":id", $idCliente);
      
      $stmt -> execute();

      return $stmt -> fetch();
    }
    catch(PDOException $e){
      return -1;
    }
  }

  public function buscarDesconto($idCliente) {
    try{
      $minhaConexao = Conexao::getConexao();
      $sql = "SELECT bonus FROM cliente JOIN conta ON cliente.id = conta.cliente_id WHERE cliente.id = :id AND conta.data < CURRENT_DATE ORDER BY conta.id DESC";      
      $stmt = $minhaConexao -> prepare($sql);
      $stmt -> bindParam(":id", $idCliente);
      
      $stmt -> execute();

      return $stmt -> fetch();
    }
    catch(PDOException $e){
      return -1;
    }
  }
}

?>