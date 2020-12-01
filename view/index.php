<?php
session_start();
require ("../controller/SessaoController.php");

SessaoController::finalizarSessao();

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
          <h1>Seja<br>Bem-vindo!</h1>
          <p>Faça o login e veja nosso cardápio!</p>
        </div>
        
        <form action="../controller/Rotas.php" method="POST">
          <input type="hidden" name="acao" value="clienteLogin">
          <div class="form-group">
            <label class="m-0" for="mesa">Mesa</label>
            <input type="number" class="form-control" id="mesa" name="mesa" min="1" placeholder="Digite o número de sua mesa" required>
          </div>
        
          <div class="form-group">
            <label class="m-0" for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
              placeholder="Digite seu e-mail" required>
          </div>
        
          <div class="form-group">
            <div class="d-flex justify-content-between align-items-end">
              <label class="m-0" for="senha">Senha</label>
              <small class="m-0" data-toggle="modal" data-target="#modalSenha">Esqueceu a senha?</small>
            </div>
            <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" required>
          </div>
        
          <div>
            <button type="submit" class="btn btn-verde">ENTRAR</button>
            <a href="cadastro.php" class="btn btn-outline-azul">Cadastrar-se</a>
          </div>
        </form>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalSenha" tabindex="-1" role="dialog" aria-labelledby="modalSenha"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalSenhaTitle">Esqueceu a senha?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Sua senha é o CPF que foi incluído<br>ao realizar o cadastro.
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