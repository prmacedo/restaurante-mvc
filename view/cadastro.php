<?php
session_start();
require ("../controller/SessaoController.php");
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
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/page-login.css">

    <title>Restaurante</title>
  </head>
  <body>
    <div class="d-flex align-items-center page-form-login">
      <div class="form-login">
        <div class="header">
          <h1>Cadastre-se</h1>
          <p>Realize o cadastro para fazer seus pedidos!</p>
          <?php if(isset($_SESSION["erroCadastrarCliente"])) {?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?php echo $_SESSION["erroCadastrarCliente"] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php 
            unset($_SESSION["erroCadastrarCliente"]);
          } ?>
        </div>
        
        <form action="../controller/Rotas.php" method="POST">
          <input type="hidden" name="acao" value="clienteCadastrar">
          <div class="form-group">
            <label class="m-0" for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome" required>
          </div>
        
          <div class="form-group">
            <label class="m-0" for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
              placeholder="Digite seu e-mail" required>
          </div>
        
          <div class="form-group">
            <label class="m-0" for="cpf">CPF</label>
            <input type="text" pattern="[0-9]{11}" class="form-control" id="cpf" name="cpf" placeholder="Digite seu cpf" required>
          </div>
        
          <div>
            <button type="submit" class="btn btn-verde">CADASTRAR</button>
            <a href="index.php" class="btn btn-outline-azul">Voltar</a>
          </div>
        </form>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>

