<?php

if (isset($_GET['status']) && isset($_GET['msg'])){
  $status = $_GET['status'];
  $msg = $_GET['msg'];
} else if(isset($_GET['status']) && !isset($_GET['msg'])){
  $status = $_GET['status'];
} else{}


// Inclui o arquivo com a conexão
include("php/connection.php");

// Consulta ao banco de dados
$sql = "SELECT id, nome FROM Marca";
$result = $conection->query($sql);

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
                <li><a class="dropdown-item" href="cadastro_marca.php">Cadastrar</a></li>
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

            <h1>Cadastro de Veiculos</h1>
            <form class="row mb-3" action="php/insert_veiculo.php" method="post">
              <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nome do Veiculo</label>
                <div class="col-sm-10">
                <input required maxlength="20" type="text" class="form-control" name="nome_veiculo">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Cor do Veiculo</label>
                <div class="col-sm-10">
                <input required maxlength="20" type="text" class="form-control" name="cor_veiculo">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-10">
                    <label for="inputState" class="col-sm-2 col-form-label">Marca</label>
                    <select name="id_marca" id="inputState" class="form-select">
                        <option selected value="0"></option>

                        <?php
                        // Verifica se há resultados
                        if ($result->num_rows > 0) {
                            // Exibe os dados de cada linha encontrada
                            while ($row = $result->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $row["id"] ?>"><?php echo $row["nome"] ?></option>
                        <?php
                            }
                        } else{}

                        // Fecha a conexão com o banco de dados
                        $conection->close();
                      ?>
                    </select>
                </div>
              </div>
                <button type="submit" class="btn btn-primary" formmethod="post" formaction="php/insert_veiculo.php">Cadastrar Veiculo</button>
            </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>