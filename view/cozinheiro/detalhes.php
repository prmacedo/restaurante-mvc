<?php
session_start();

require ("../../model/Conexao.php");

require ("../../controller/SessaoController.php");
require ("../../controller/ContaController.php");
require ("../../controller/PedidoController.php");
require ("../../controller/ProdutoController.php");
require ("../../controller/ClienteController.php");


$data = date('Y-m-d');

SessaoController::validarLoginCozinheiro();
$listaDeContas = ContaController::listarContasDoDia($data);

$contaId = $_SESSION["contaDetalhe"];
$conta = ContaController::buscar($contaId);

$idCliente = $conta["cliente_id"];
$cliente = ClienteController::buscar($idCliente);

$listaDeProdutos = PedidoController::listarPedidos($contaId);
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
    
    <title>Restaurante - Cozinheiro</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-light py-0 px-3 px-lg-5 bg-azul">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link d-flex align-items-center py-3 mr-3" href="meus-dados/index.php"><img src="../img/avatar.svg" class="mr-2" alt="Meus dados"> Meus dados</a>
          <a class="nav-item nav-link d-flex align-items-center py-3" href="../login-cozinha.php"><img src="../img/logout.svg" class="mr-2" alt="Sair"> Sair</a>
        </div>
      </div>
    </nav>

    <div class="px-3 m-3">
      <header class="my-4">
        <a class="voltar" href="index.php">← Voltar</a>
        <div class="d-flex justify-content-between align-items-center mt-2">
          <h1 class="m-0">Detalhes do pedido</h1>
        </div>
      </header>
      
      <main>
        <div class="cliente-titulo d-flex align-items-end">
          <h2><?php echo $cliente["nome"] ?> - Mesa <?php echo str_pad($conta["mesa"], 2, "0", STR_PAD_LEFT) ?></h2>
          <p class="ml-4 mb-2">(<?php echo $conta["data"] ?>)</p>
        </div>

        <hr>

        <?php foreach ($listaDeProdutos as $produto) { 
          $produtoDetalhe = ProdutoController::buscarProduto($produto["produto_id"], $produto["produto_tipo"]);
          $qtd = $produto["produto_qtd"];
          $nome = $produtoDetalhe["nome"];
        ?>
        <div class="pedido-grupo">
          <div class="pedido-item d-flex">
            <p class="mr-3"><?php echo $qtd ?></p>
            <p><?php echo $nome ?></p>
          </div>
        <?php } ?>

        <form action="../../controller/Rotas.php" method="POST">
          <input type="hidden" name="acao" value="entregarPedido">
          <input type="hidden" name="contaId" value="<?php echo $contaId ?>">
          <button class="btn btn-verde px-5">ENTREGAR PEDIDO</button>
        </form>
      </main>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>