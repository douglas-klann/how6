<?php
// Inclui o arquivo com a conexão
include("connection.php");

// Verifica se os dados foram enviados via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os valores enviados pelo formulário
    $nome = $_POST["nome_veiculo"];
    $cor = $_POST["cor_veiculo"];
    $marca = $_POST["id_marca"];

    // Prepara a consulta SQL para inserção dos dados
    $sql = "INSERT INTO Veiculo (nome, cor, id_marca) VALUES ('$nome', '$cor', '$marca')";

    if ($conection->query($sql) === TRUE) {
        // Redireciona de volta para a página do formulário após a inserção
        header("Location: ../cadastro_veiculo.php?status=success");
        exit();
    } else {
        // Redireciona de volta para a página do formulário após a inserção
        header("Location: ../cadastro_veiculo.php?status=error&msg=".$conection['error']);
        exit();
    }
}

// Fecha a conexão com o banco de dados
$conection->close();
?>