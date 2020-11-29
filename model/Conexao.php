<?php
class Conexao{
  public static function getConexao(){
    $servername = "localhost"; 
    $username = "root";
    $password = "";
    $dbname = "db_restaurante";

    try {
      $minhaConexao = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $minhaConexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
      return $minhaConexao;
    } catch(PDOException $e) {
      return null;
    }
  }

}