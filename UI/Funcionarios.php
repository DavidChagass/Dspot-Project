<?php
require_once '../BLL/FuncionariosBLL.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dominio = $_POST['dominio'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $resultados = FuncionariosBLL::LoginFuncionario($dominio, $email, $senha);
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

    <table>
        <tr>
            <td>
                <h3>Dominio:<?= $dominio ?></h3>
            </td>
        </tr>
        <tr>
            <td>
                <h3>Email:<?= $email ?></h3>
            </td>
        </tr>
        <tr>
            <td>
                <h3>Senha:<?= $senha ?></h3>
            </td>
        </tr>
    </table>
</body>

</html>