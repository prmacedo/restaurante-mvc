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

  public static function listarContas($clienteId) {
    $contaDAO = new ContaDAO();
    
    $contas = $contaDAO -> listarContas($clienteId);

    return $contas;
  }

  public static function listarContasDoDia($data) {
    $contaDAO = new ContaDAO();
    
    $contas = $contaDAO -> listarContasDoDia($data);

    return $contas;
  }

  public static function aguardar($post) {
    $contaDAO = new ContaDAO();
    $contaId = $post["conta"];
    $contas = $contaDAO -> aguardar($contaId);

    return $contas;
  }

  public static function entregar($post) {
    $contaDAO = new ContaDAO();
    $contaId = $post["contaId"];
    $contas = $contaDAO -> entregar($contaId);

    return $contas;
  }

  public static function verificarStatus($contaId) {
    $contaDAO = new ContaDAO();
    
    $conta = $contaDAO -> buscar($contaId);
    $status = $conta["status"];
    if ($status == 'Aberta') {
      return $contaDAO -> excluir($contaId);      
    } else if($status == 'Pago'){
      return true;
    } else {
      $_SESSION["erroDeslogar"] = "Ainda existem contas a serem pagas.";
      return false;
    }
  }
}