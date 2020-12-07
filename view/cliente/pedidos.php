<?php
session_start();

require ("../../model/Conexao.php");

require ("../../controller/SessaoController.php");
require ("../../controller/ContaController.php");

SessaoController::validarLoginCliente();

$idCliente = $_SESSION["id"];

$listaDeContas = ContaController::listarContas($idCliente);

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
          <form action="../../controller/Rotas.php" method="post" class="d-flex align-items-center px-2">
            <input type="hidden" name="acao" value="clienteSair">
            <input type="hidden" name="contaId" value="<?php echo $conta ?>">
            <button href="../index.php" class="btn transparent nav-item nav-link d-flex align-items-center py-3"><img src="../img/logout.svg" alt="Sair" class="mr-2"> Sair</button>
          </form>
        </div>
      </div>
    </nav>

    <div class="ancora"></div>

    <div class="px-3 m-3">
      <header>
        <h1 class="my-4">Meus Pedidos</h1>
        <?php if(isset($_SESSION["erroDeslogar"])) {?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <?php echo $_SESSION["erroDeslogar"] ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php 
          unset($_SESSION["erroDeslogar"]);
        } ?>
      </header>
    
      <main>
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Data</th>
              <th scope="col">Hora</th>
              <th scope="col">Mesa</th>
              <th scope="col">Status</th>
              <th scope="col">Detalhes</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($listaDeContas as $conta) { 
            $idConta = $conta["id"];
            $data = $conta["data"];
            $hora = $conta["hora"];
            $mesa = $conta["mesa"];
            $status = $conta["status"];
          ?>
            <tr>
              <td class="py-3"><?php echo $data ?></td>
              <td class="py-3"><?php echo $hora ?></td>
              <td class="py-3"><?php echo $mesa ?></td>
              <td class="py-3"><?php echo $status ?></td>
              <td class="">
                <form action="../../controller/Rotas.php" method="POST">
                  <input type="hidden" name="acao" value="verPedido">
                  <input type="hidden" name="contaId" value="<?php echo $idConta ?>">
                  <button type="submit" class="btn mr-2 px-2">Ver pedido</a>
                  <!-- <a href="pedido.php" class="btn mr-2 px-0" title="Editar cadastro">Ver pedido</a> -->
                </form>
              </td>
            </tr>            
          <?php } ?>

          </tbody>
        </table>
      </main>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>