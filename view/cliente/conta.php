<?php
session_start();

require ("../../model/Conexao.php");

require ("../../controller/SessaoController.php");
require ("../../controller/ContaController.php");
require ("../../controller/PedidoController.php");
require ("../../controller/ProdutoController.php");
require ("../../controller/ClienteController.php");

SessaoController::validarLoginCliente();

$contaId = $_GET["idConta"];
$conta = ContaController::buscar($contaId);
$listaDeProdutos = PedidoController::listarPedidos($contaId);
$clienteId = $conta["cliente_id"];
$valorTotal = 0;

$bonus = ClienteController::aplicarDesconto($clienteId)["bonus"];
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Fontes -->
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;600&family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- Meu CSS -->
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/painel-administrativo.css">
    <link rel="stylesheet" href="../css/styles.css">

    <title>Restaurante - Cardápio</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-light py-0 px-3 px-lg-5 bg-azul fixed-top">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a href="index.php#comidas" class="nav-item nav-link d-flex align-items-center py-3 mr-3"><img src="../img/comida-branco.svg" class="mr-2" alt="Comidas"> Comidas</a>
          <a href="index.php#bebidas" class="nav-item nav-link d-flex align-items-center py-3"><img src="../img/bebida-branco.svg" class="mr-2" alt="Bebidas"> Bebidas</a>
        </div>
        <div class="navbar-nav">
          <a href="pedidos.php" class="nav-item nav-link d-flex align-items-center py-3 mr-3"><img src="../img/cardapio.svg" alt="Pedidos" class="mr-2"> Meus Pedidos</a>
          <a href="../index.php" class="nav-item nav-link d-flex align-items-center py-3"><img src="../img/logout.svg" alt="Sair" class="mr-2"> Sair</a>
        </div>
      </div>
    </nav>

    <div class="ancora"></div>

    <div class="px-3 m-3">
      <main>
        <div class="cliente-titulo d-flex align-items-end">
          <h2>Mesa <?php echo str_pad($conta["mesa"], 2, "0", STR_PAD_LEFT) ?></h2>
          <p class="ml-4 mb-2">(<?php echo $conta["data"] ?>)</p>
        </div>
        
        <hr>
    
        <table class="table table-borderless">
          <thead style="border-bottom: 1px solid #E5E5E5;">
            <tr>
              <th class="w50" scope="col">Pedido (<?php echo $conta["hora"] ?>)</th>
              <th class="w20" scope="col">Pço unid</th>
              <th class="w30" scope="col">Pço Total</th>
            </tr>
          </thead>

          <tbody>
          <?php foreach ($listaDeProdutos as $produto) { 
            $produtoDetalhe = ProdutoController::buscarProduto($produto["produto_id"], $produto["produto_tipo"]);
            $qtd = $produto["produto_qtd"];
            $nome = $produtoDetalhe["nome"];
            $preco = number_format($produtoDetalhe["preco"], 2, ',', '.');
            $precoParcial = number_format($produto["valor_parcial"], 2, ',', '.');
            $valorTotal += $produto["valor_parcial"];
          ?>
            <tr>
              <td class="w50"><?php echo $qtd ?> &nbsp; <?php echo $nome ?></td>
              <td class="w20">R$ <?php echo $preco ?></td>
              <td class="w30">R$ <?php echo $precoParcial ?></td>
            </tr>
          <?php } 
            if ($bonus > 0) { 
              $valorTotal -= $bonus;  
            ?>
              <tr>
                <td class="w50"><b>Bônus</b></td>
                <td class="w20">--</td>
                <td class="w30"><b>R$ <?php echo number_format($bonus, 2, ',', '.') ?></b></td>
              </tr>              
          <?php } ?>          
          </tbody>
        </table>

        <hr>

        <div class="d-flex justify-content-between total">
          <p class="my-2">TOTAL:</p>
          <p class="my-2">R$ <?php echo number_format($valorTotal, 2, ',', '.') ?></p>
        </div>
        
        <hr>

        <div class="d-flex justify-content-end">
          <a href="" data-toggle="modal" data-target="#modalCartao" class="btn btn-verde px-5 mt-0 ml-3">PAGAR CONTA</a>
        </div>
      </main>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="modalCartao" tabindex="-1" role="dialog" aria-labelledby="modalCartaoLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalCartaoLabel">Pagamento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body px-4 pb-5">
            <form action="../../controller/Rotas.php" method="POST">
              <input type="hidden" name="idConta" id="idConta" value="<?php echo $contaId ?>">
              <input type="hidden" name="idCliente" id="idCliente" value="<?php echo $clienteId ?>">
              <input type="hidden" name="acao" id="idConta" value="contaPagar">
              <input type="hidden" name="valorTotal" value="<?php echo $valorTotal ?>">
              <h4>Forma de Pagamento: </h4>  
              <div class="form-group">
                <input type="radio" name="cartao" id="credito" value="credito" required>
                <label class="m-0 mr-4" for="credito">Crédito</label>
                
                <input type="radio" name="cartao" id="debito" value="debito" required>
                <label class="m-0" for="debito">Débito</label>
              </div>

              <h4>Número do cartão: </h4>
              <div class="form-group">
                <input type="text" class="form-control" id="cartao" name="numeroCartao" placeholder="Digite o número do cartão" required>
              </div>
              
              <button type="submit" class="px-5 mt-4 btn btn-verde">EFETUAR PAGAMENTO</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>