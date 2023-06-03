<?php

if (isset($_GET['status']) && isset($_GET['msg'])){
  $status = $_GET['status'];
  $msg = $_GET['msg'];
} else if(isset($_GET['status']) && !isset($_GET['msg'])){
  $status = $_GET['status'];
} else{}

?>

<!doctype html>
<html lang="pt_br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projeto HOW6</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.html">HOW6</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Marca
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item active" href="cadastro_marca.php">Cadastrar</a></li>
                  <li><a class="dropdown-item" href="listar_marca.php">Listar</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Veículo
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="cadastro_veiculo.php">Cadastrar</a></li>
                  <li><a class="dropdown-item" href="listar_veiculo.php">Listar</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
    </nav>

    <div class="container text-center">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <?php
              if (isset($status)){
                if ($status=="success") {
              ?>
                  <div class="alert alert-success" role="alert">
                    Cadastro realizado com sucesso!
                  </div>
              <?php

                } else if ($status=="error"){
                
              ?>
                  <div class="alert alert-danger" role="alert">
                    Houve um erro no cadastro. Mensagem: <?php echo $msg ?>
                  </div>

              <?php

                }else {}
              } else{}
              ?>
            <h1>Cadastro de Marcas</h1>
            <form action="php/insert_marca.php" method="post">
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Nome da Marca</label>
                  <div class="col-sm-10">
                    <input required maxlength="20" type="text" class="form-control" name="nome_marca">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">País</label>
                  <div class="col-sm-10">
                    <input required maxlength="20" type="text" class="form-control" name="pais_marca">
                  </div>
                </div>
                <div class="row mb-3">
                    <label for="descricao_marca" class="col-sm-2 col-form-label">Descrição</label>
                    <div class="col-sm-10">
                        <textarea required maxlength="255" class="form-control" name="descricao_marca" rows="3"></textarea>
                    </div> 
                </div>
                <button type="submit" class="btn btn-primary" formmethod="post" formaction="php/insert_marca.php">Cadastrar Marca</button>
              </form>
          </div>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>