<?php
// Inclui o arquivo com a conexão
include("connection.php");


if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Prepara a consulta SQL para excluir o registro com base na ID
    $sql = "DELETE FROM Veiculo WHERE id = '$id'";

    if ($conection->query($sql) === TRUE) {
        // Fecha a conexão com o banco de dados e retorna
        $conection->close();
        header("Location: ../listar_veiculo.php?status=success");
        exit();
    } else {
        // Fecha a conexão com o banco de dados e retorna
        $conection->close();
        header("Location: ../listar_veiculo.php?status=error&msg=".$conection['error']);
        exit();
    }

} else{}

?>