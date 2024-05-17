<?php
function Database()
{
    try {
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $database = "Medicine";
        $mysql = new mysqli($hostname, $username, $password, $database);
        return $mysql;
    } catch (Exception $e) {
        die("<h2>" . "banco não encontado: " . $e->getMessage() . "</h2>");
    }
}
