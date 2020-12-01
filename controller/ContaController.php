<?php 
$directory = explode('\\', __DIR__);
array_pop($directory);
$directory = implode('/', $directory);

require ($directory."/model/ContaDAO.php");

class ContaController
{
  public function cadastrar($novaConta) {
    $contaDAO = new ContaDAO();

    return $contaDAO -> cadastrar($novaConta);
  
  }
}