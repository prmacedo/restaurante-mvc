<?php
session_start();
require ("../../../model/Conexao.php");

require ("../../../controller/SessaoController.php");
require ("../../../controller/ComidaController.php");

SessaoController::validarLoginGerente();

$comida = ComidaController::buscar($_GET["id"]);

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
    <link rel="stylesheet" href="../../css/global.css">
    <link rel="stylesheet" href="../../css/painel-administrativo.css">
    
    <title>Restaurante - Gerente</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-light py-0 px-3 px-lg-5 bg-azul">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link d-flex align-items-center py-3 mr-3" href="../meus-dados/index.php"><img src="../../img/avatar.svg" class="mr-2" alt="Meus dados"> Meus dados</a>
          <a class="nav-item nav-link d-flex align-items-center py-3" href="../../login-gerente.php"><img src="../../img/logout.svg" class="mr-2" alt="Sair"> Sair</a>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <header class="my-4">
        <a class="voltar" href="index.php">← Voltar</a>
        <div>
          <h1 class="m-0">Comidas</h1>
          <p>Atualização de dados</p>
        </div>
      </header>
      
      <main>
        <form action="../../../controller/Rotas.php" method="POST">
          <input type="hidden" name="acao" value="comidaEditar">
          <input type="hidden" name="idAntigo" value="<?php echo $comida["id"] ?>">
          <div class="form-group col-md-7 px-0">
            <label class="m-0" for="id">Código do produto</label>
            <input type="number" class="form-control" id="id" name="id" min="0" value="<?php echo $comida["id"] ?>" required>
          </div>
          
          <div class="form-group col-md-7 px-0">
            <label class="m-0" for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $comida["nome"] ?>" required>
          </div>
          
          <div class="form-group col-md-7 px-0">
            <label class="m-0" for="descricao">Descrição</label>
            <input type="text" class="form-control" id="descricao" name="descricao" value="<?php echo $comida["descricao"] ?>" required>
          </div>

          <div class="form-group col-md-7 px-0">
            <label class="m-0" for="preco">Preço</label>
            <input type="number" class="form-control" id="preco" name="preco" min="0" step=".01" value="<?php echo $comida["preco"] ?>" required>
          </div>
          
          <button type="submit" class="btn btn-verde px-5">SALVAR ALTERAÇÕES</button>
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