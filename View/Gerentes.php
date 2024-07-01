<?php
require_once '../Controller/GerentesBLL.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dominio = $_POST['dominio'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $resultados = GerentesBLL::LogGerentes($dominio, $email, $senha);
}
/* 
if(!empty($dominio)) {
    $totalFuncionarios = GerentesBLL::ContFuncionario($dominio);
    echo "<h3>TOTAL FUNCIONARIOS: " . $totalFuncionarios . "</h3>";
} */
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerentes</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/Funcionario.css">
</head>

<body>
    <?php
    if ($resultados) {
        $dominio = htmlspecialchars($resultados['dominio']);
        $nome = htmlspecialchars($resultados['nomeGerente']);
        $email = htmlspecialchars($resultados['emailGerente']);
        $senha = htmlspecialchars($resultados['senhaGerente']);
    ?>
        <table>
            <tr>
                <td>
                    <h3>Dominio: <?= $dominio ?> </h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>Nome Gerente: <?= $nome ?> </h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>Email: <?= $email ?> </h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>Senha: <?= $senha ?> </h3>
                </td>
            </tr>
        </table>
    <?php

        if(!empty($dominio)) {
        $totalFuncionarios = GerentesBLL::ContFuncionario($dominio);
        echo "<h3>TOTAL FUNCIONARIOS: " . $totalFuncionarios . "</h3>";
        echo "<a href=\"CadastrarFuncionarios.php\">Cadastre seus funcionarios</a>";
        }

    } else {
        echo "Login inválido";
    }

    ?>
</body>

</html>