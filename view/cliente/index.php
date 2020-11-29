<?php
session_start();
require ("../../controller/SessaoController.php");

SessaoController::validarLoginCliente();

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
          <a href="#comidas" class="nav-item nav-link d-flex align-items-center py-3 mr-3"><img src="../img/comida-branco.svg" class="mr-2" alt="Comidas"> Comidas</a>
          <a href="#bebidas" class="nav-item nav-link d-flex align-items-center py-3"><img src="../img/bebida-branco.svg" class="mr-2" alt="Bebidas"> Bebidas</a>
        </div>
        <div class="navbar-nav">
          <a href="pedidos.php" class="nav-item nav-link d-flex align-items-center py-3 mr-3"><img src="../img/cardapio.svg" alt="Pedidos" class="mr-2"> Meus Pedidos</a>
          <a href="../index.php" class="nav-item nav-link d-flex align-items-center py-3"><img src="../img/logout.svg" alt="Sair" class="mr-2"> Sair</a>
        </div>
      </div>
    </nav>

    <form action="confirmacao.php">
      <div class="ancora" id="comidas"></div>

      <div class="card px-3 m-3">
        <header>
          <h1 class="my-4">Comidas</h1>
        </header>
        
        <main>
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col" class="w50">Nome</th>
                <th scope="col" class="w30">Preço</th>
                <th scope="col" class="w20">Quantidade</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="py-3 w50">
                  <p class="m-0">Misto</p>
                  <small>Pão, queijo e presunto</small>
                </td>
                <td class="py-3 w20">R$ 5,90</td>
                <td class="w30">
                  <input type="number" min="0" value="0" class="qtd-input">
                </td>
              </tr>
        
              <tr>
                <td class="py-3 w50">
                  <p class="m-0">Misto</p>
                  <small>Pão, queijo e presunto</small>
                </td>
                <td class="py-3 w20">R$ 5,90</td>
                <td class="w30">
                  <input type="number" min="0" value="0" class="qtd-input">
                </td>
              </tr>

              <tr>
                <td class="py-3 w50">
                  <p class="m-0">Misto</p>
                  <small>Pão, queijo e presunto</small>
                </td>
                <td class="py-3 w20">R$ 5,90</td>
                <td class="w30">
                  <input type="number" min="0" value="0" class="qtd-input">
                </td>
              </tr>

              <tr>
                <td class="py-3 w50">
                  <p class="m-0">Misto</p>
                  <small>Pão, queijo e presunto</small>
                </td>
                <td class="py-3 w20">R$ 5,90</td>
                <td class="w30">
                  <input type="number" min="0" value="0" class="qtd-input">
                </td>
              </tr>

              <tr>
                <td class="py-3 w50">
                  <p class="m-0">Misto</p>
                  <small>Pão, queijo e presunto</small>
                </td>
                <td class="py-3 w20">R$ 5,90</td>
                <td class="w30">
                  <input type="number" min="0" value="0" class="qtd-input">
                </td>
              </tr>

              <tr>
                <td class="py-3 w50">
                  <p class="m-0">Misto</p>
                  <small>Pão, queijo e presunto</small>
                </td>
                <td class="py-3 w20">R$ 5,90</td>
                <td class="w30">
                  <input type="number" min="0" value="0" class="qtd-input">
                </td>
              </tr>
            </tbody>
          </table>
        </main>
      </div>

      <div class="ancora" id="bebidas"></div>

      <div class="card px-3 m-3 mb-5">
        <header>
          <h1 class="my-4">Bebidas</h1>
        </header>
        
        <main>
          <table class="table table-hover">
            <thead>
              <tr>
              <th scope="col" class="w50">Nome</th>
                <th scope="col" class="w30">Preço</th>
                <th scope="col" class="w20">Quantidade</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="py-3 w50">Coca-Cola 2L
                </td>
                <td class="py-3 w20">R$ 8,90</td>
                <td class="w30">
                  <input type="number" min="0" value="0" class="qtd-input">
                </td>
              </tr>
        
              <tr>
                <td class="py-3 w50">Coca-Cola 2L
                </td>
                <td class="py-3 w20">R$ 8,90</td>
                <td class="w30">
                  <input type="number" min="0" value="0" class="qtd-input">
                </td>
              </tr>
              
              <tr>
                <td class="py-3 w50">Coca-Cola 2L
                </td>
                <td class="py-3 w20">R$ 8,90</td>
                <td class="w30">
                  <input type="number" min="0" value="0" class="qtd-input">
                </td>
              </tr>
            </tbody>
          </table>
        </main>
      </div>

      <div class="ancora"></div>

      <button type="submit" class="btn btn-verde px-5 btn-pedido">FINALIZAR PEDIDO</button>
    </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>