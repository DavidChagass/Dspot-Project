<?php
require_once '../BLL/GerentesBLL.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idempresa = $_POST['idEmpresa'];
    $nomeFuncionario = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $message = GerentesBLL::cadfuncionario($idempresa, $nomeFuncionario, $email, $senha);
    echo $message;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionario</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/Funcionario.css">
</head>

<body>

</body>

</html>