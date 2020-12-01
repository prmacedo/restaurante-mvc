<?php 
$directory = explode('\\', __DIR__);
array_pop($directory);
$directory = implode('/', $directory);

require ($directory."/model/PedidoDAO.php");

class PedidoController
{
  public function cadastrar($dados) {
    var_dump($dados);
  }
}