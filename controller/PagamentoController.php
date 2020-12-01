<?php 
$directory = explode('\\', __DIR__);
array_pop($directory);
$directory = implode('/', $directory);

require ($directory."/model/Pagamento.php");
require ($directory."/model/PagamentoDAO.php");

class PagamentoController
{
  public static function cadastrar($post) {
    $idConta = $post["idConta"];
    $data = date('Y-m-d');

    $pagamento = new Pagamento($idConta, $data);

    $pagamentoDAO = new PagamentoDAO();
    $foiPago = $pagamentoDAO -> cadastrar($pagamento);
    
    return $foiPago;
  }
}