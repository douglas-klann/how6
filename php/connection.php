<?php

// Configurações do banco de dados
$server = "localhost";
$user = "id20847314_how6";
$password = "@How6123";
$dbname = "id20847314_dbhow6";

// Conexão com o banco de dados
$conection = mysqli_connect($server, $user, $password, $dbname);

// Verifica se ocorreu algum erro na conexão
if ($conection->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conection->connect_error);
}

?>