<?php
class GerenteDAO{

  public function login($gerente){
    $email = $gerente -> getEmail();
    $senha = $gerente -> getSenha();

    try {
      $minhaConexao = Conexao::getConexao();
      $sql = "SELECT * FROM gerente WHERE email = :email AND senha = :senha";
      $stmt = $minhaConexao -> prepare($sql);
      $stmt -> bindParam(":email", $email);
      $stmt -> bindParam(":senha", $senha);  
      $stmt -> execute();

      return $stmt -> fetch();
    }
    catch(PDOException $e) {
      return 0;
    }
  }

  public function atualizar($gerente){
    $id = $gerente -> getId();
    $nome = $gerente -> getNome();
    $email = $gerente -> getEmail();
    $senha = $gerente -> getSenha();
    
    try {
      $minhaConexao = Conexao::getConexao();
      $sql = "UPDATE gerente SET nome = :nome, email = :email, senha = :senha WHERE id = :id"; 
      $stmt = $minhaConexao -> prepare($sql);
      $stmt -> bindParam(":id", $id);  
      $stmt -> bindParam(":nome", $nome);  
      $stmt -> bindParam(":email", $email);  
      $stmt -> bindParam(":senha", $senha);  
      $stmt -> execute();

      $sql = "SELECT * FROM gerente WHERE id = :id";
      $stmt = $minhaConexao -> prepare($sql);
      $stmt -> bindParam(":id", $id); 
      $stmt -> execute();

      return $stmt -> fetch();
    }
    catch(PDOException $e) {
      return false;
    }
  }


}

?>