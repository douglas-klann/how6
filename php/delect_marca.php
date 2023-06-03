<?php
// Inclui o arquivo com a conexão
include("connection.php");


if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Prepara a consulta SQL para excluir o registro com base na ID
    $sql = "DELETE FROM Marca WHERE id = '$id'";

    if ($conection->query($sql) === TRUE) {
        // Fecha a conexão com o banco de dados e retorna
        $conection->close();
        header("Location: ../listar_marca.php?status=success");
        exit();
    } else {
        // Fecha a conexão com o banco de dados e retorna
        $conection->close();
        header("Location: ../listar_marca.php?status=errormsg=".$conection['error']);
        exit();
    }

} else{}

?>