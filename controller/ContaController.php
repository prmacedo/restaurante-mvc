<?php 
$directory = explode('\\', __DIR__);
array_pop($directory);
$directory = implode('/', $directory);

// require ($directory."/model/Conta.php");
require ($directory."/model/ContaDAO.php");

class ContaController
{
  public static function cadastrar($novaConta) {
    $_SESSION["mesa"] = $novaConta -> getMesa();
    $contaDAO = new ContaDAO();

    $conta = $contaDAO -> cadastrar($novaConta);
    $_SESSION["conta"] = $conta;
    
    return $conta;
  }

  public static function pagar($post) {
    $contaId = $post["idConta"];
    $valorTotal = $post["valorTotal"];
    $status = "Pago";

    $conta = new Conta("", "", $valorTotal, "", "", $status);
    $conta -> setId($contaId);
    
    $contaDAO = new ContaDAO();

    $contaPaga = $contaDAO -> pagar($conta);
    return $contaPaga;
  }

  public static function buscar($contaId) {
    $contaDAO = new ContaDAO();
    
    $conta = $contaDAO -> buscar($contaId);

    return $conta;
  }
}