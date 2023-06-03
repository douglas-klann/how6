<?php
// Inclui o arquivo com a conexão
include("connection.php");

// Verifica se os dados foram enviados via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os valores enviados pelo formulário
    $nome = $_POST["nome_marca"];
    $pais = $_POST["pais_marca"];
    $descricao = $_POST["descricao_marca"];

    // Prepara a consulta SQL para inserção dos dados
    $sql = "INSERT INTO Marca (nome, pais, descricao) VALUES ('$nome', '$pais', '$descricao')";

    if ($conection->query($sql) === TRUE) {
        // Redireciona de volta para a página do formulário após a inserção
        header("Location: ../cadastro_marca.php?status=success");
        exit();
    } else {
        // Redireciona de volta para a página do formulário após a inserção
        header("Location: ../cadastro_marca.php?status=errormsg=".$conection['error']);
        exit();
    }
}

// Fecha a conexão com o banco de dados
$conection->close();
?>
