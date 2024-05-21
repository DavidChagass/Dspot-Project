<?php


    $usuario = 'root';
    $senha = '';
    $database = 'Dspot';
    $host = 'localhost';

    $mysqli = new mysqli($host, $usuario, $senha, $database);
    return $mysqli;
    if ($mysqli->error) {
        die("Falha ao conectar ao banco de dados: " . $mysqli->error);
    }
?>