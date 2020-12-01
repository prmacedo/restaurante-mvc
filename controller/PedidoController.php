<?php 
$directory = explode('\\', __DIR__);
array_pop($directory);
$directory = implode('/', $directory);

require ($directory."/model/Pedido.php");
require ($directory."/model/PedidoDAO.php");

class PedidoController
{
  public function cadastrar($post) {
    $arrayKeys = array_keys($post);
    
    $conta = $post["conta"];

    $pedidoDAO = new PedidoDAO();
    
    foreach ($arrayKeys as $arrayKey) {
      if (strstr($arrayKey, "id-comida-")) {        
        $idComida = $post[$arrayKey];
        $qtdComidaIndex = "qtd-comida-$idComida";
        $qtdComida = $post[$qtdComidaIndex];
        
        if ($qtdComida > 0) {
          $precoComidaIndex = "preco-comida-$idComida";
          $precoComida = $post[$precoComidaIndex];
          $tipo = "comida";
          $valorParcial = $qtdComida * $precoComida;

          $pedido = new Pedido($idComida, $qtdComida, $tipo, $conta, $valorParcial);
        
          $pedidoDAO -> cadastrar($pedido);
        }

      } else if (strstr($arrayKey, "id-bebida-")) {
        
        $idBebida = $post[$arrayKey];
        $qtdBebidaIndex = "qtd-bebiba-$idBebida";
        $qtdBebida = $post[$qtdBebidaIndex];
        
        if ($qtdBebida > 0) {
          $precoBebidaIndex = "preco-bebida-$idBebida";
          $precoBebida = $post[$precoBebidaIndex];
          $tipo = "bebida";
          $valorParcial = $qtdBebida * $precoBebida;

          $pedido = new Pedido($idBebida, $qtdBebida, $tipo, $conta, $valorParcial);
          
          $pedidoDAO -> cadastrar($pedido);

        }
      }
    }
  }

  public static function listarPedidos($contaId) {
    $pedidoDAO = new PedidoDAO();    

    $pedidos = $pedidoDAO -> listarPedidos($contaId);

    return $pedidos;
  }
}