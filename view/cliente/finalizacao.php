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
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/global.css">

    <title>Restaurante</title>
  </head>
  <body>
    <div id="page-confirmacao-pedido" class="d-flex align-items-center">
      <div class="container-fluid">
        <div class="text-center">
          <img src="../img/checked.svg" alt="Bandeja de comida">
        </div>
        
        <div class="text-center my-5">
          <h3>Seu pagamento foi realizado com sucesso!</h3>
          <p>Volte sempre</p>
        </div>
        
        <div class="row mx-1 justify-content-center">
          <a href="../index.php" class="btn btn-outline-azul col-12 col-md-3">Sair da plataforma</a>
          <form action="../../controller/Rotas.php" method="POST" class="col-12 col-md-3 offset-md-2 px-0 mt-3 mt-md-0">
            <input type="hidden" name="acao" value="continuarPedindo">
            <input type="hidden" name="mesa" value="<?php echo $_SESSION['mesa'] ?>">
            <button type="submit" class="btn btn-verde">Continuar Pedindo</button>
          </form>
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