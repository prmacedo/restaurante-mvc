<?php
session_start();
require ("../../controller/SessaoController.php");

SessaoController::validarLoginGerente();

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

    <title>Restaurante - Gerente</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-light py-0 px-3 px-lg-5 bg-azul">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link py-3 mr-3" href="meus-dados/index.php"><img src="../img/avatar.svg" class="mr-2" alt="Meus dados"> Meus dados</a>
          <a class="nav-item nav-link py-3" href="../login-gerente.php"><img src="../img/logout.svg" class="mr-2" alt="Sair"> Sair</a>
        </div>
      </div>
    </nav>

    <main class="container my-5">
      <div class="card-deck">
        <div class="card pt-5 pb-3" onclick="location.href='cozinheiro/index.php'">
          <img class="card-img-top mb-2" src="../img/chef.svg" alt="Cozinheiro">
          <div class="card-body text-center">
            <h5 class="card-title">Cozinheiros</h5>
            <p class="card-text">Clique para adicionar, editar e excluir</p>
          </div>
        </div>

        <div class="card pt-5 pb-3" onclick="location.href='comida/index.php'">
          <img class="card-img-top mb-2" src="../img/comida.svg" alt="Comida">
          <div class="card-body text-center">
            <h5 class="card-title">Comidas</h5>
            <p class="card-text">Clique para adicionar, editar e excluir</p>
          </div>
        </div>

        <div class="card pt-5 pb-3" onclick="location.href='bebida/index.php'">
          <img class="card-img-top mb-2" src="../img/bebida.svg" alt="Bebida">
          <div class="card-body text-center">
            <h5 class="card-title">Bebidas</h5>
            <p class="card-text">Clique para adicionar, editar e excluir</p>
          </div>
        </div>
      </div>
    </main>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>