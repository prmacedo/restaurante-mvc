<?php
class GerenteDAO{

  public function login($gerente){
    $email = $gerente -> getEmail();
    $senha = $gerente -> getSenha();

    try {
      $minhaConexao = Conexao::getConexao();

      $sql = "SELECT id FROM gerente WHERE email = :email AND senha = :senha";
      
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

  public function buscar($gerente) {
    $id = $gerente;

    try {
      $minhaConexao = Conexao::getConexao();

      $sql = "SELECT nome, email, senha FROM gerente WHERE id = :id";
      
      $stmt = $minhaConexao -> prepare($sql);
      $stmt -> bindParam(":id", $id);
      
      $stmt -> execute();

      return $stmt -> fetch();
    }
    catch(PDOException $e) {
      return 0;
    }
  }
}

?>