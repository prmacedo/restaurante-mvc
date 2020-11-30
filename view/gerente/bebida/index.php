<?php
session_start();
require ("../../../model/Conexao.php");

require ("../../../controller/SessaoController.php");
require ("../../../controller/BebidaController.php");

SessaoController::validarLoginGerente();

$bebidas = BebidaController::listar();

// var_dump($bebs);

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
        <a class="voltar" href="../index.php">← Voltar</a>
        <div class="d-flex justify-content-between align-items-center mt-2">
          <h1 class="m-0">Bebidas</h1>
          <a href="adicionar.php" class="d-none d-sm-block btn btn-verde m-0 px-4">Nova Bebida</a>
          <a href="adicionar.php" class="d-block d-sm-none btn btn-verde m-0"><img src="../../img/plus.svg" alt="Nova Bebida"></a>
        </div>
      </header>
      
      <main>
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">Fornecedor</th>
              <th scope="col">Preço</th>
              <th scope="col">Opções</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($bebidas as $bebida) { ?>
            <tr>
              <td class="py-3"><?php echo $bebida["nome"] ?></td>
              <td class="py-3"><?php echo $bebida["fornecedor"] ?></td>
              <td class="py-3">R$ <?php echo number_format($bebida["preco"], 2, ',', '.') ?></td>
              <td class="d-flex">
                <a href="editar.php?id=<?php echo $bebida['id'] ?>" class="btn mr-2 px-0" title="Editar cadastro"><img src="../../img/edit.svg" alt="Editar"> <span class="ml-1 d-none d-sm-inline">Editar</span></a>
                <form action="../../../controller/Rotas.php" method="POST">
                  <input type="hidden" name="acao" value="bebidaExcluir">
                  <input type="hidden" name="id" value="<?php echo $bebida['id'] ?>">
                  <button type="submit" class="btn m-0" title="Excluir cadastro"> <img src="../../img/trash.svg" alt="Excluir"><span class="ml-1 d-none d-sm-inline">Excluir</span></button>
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