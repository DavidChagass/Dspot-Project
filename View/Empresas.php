<?php 
require_once("../Controller/DaoEmpresas.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dominio = $_POST['dominio'];
    $nomeEmpresa = $_POST['NomeEmpresa'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $message = DaoEmpresas::inserir($dominio, $nomeEmpresa, $email, $telefone);
}
    $resultados = DaoEmpresas::listar($dominio);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <H1>EMPRESA CRIADA</H1>
        <table>
            <tr>
                <td>
                    <h3>Dominio: <?= $dominio ?> </h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>Nome Gerente: <?= $nomeEmpresa ?> </h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>Email: <?= $email ?> </h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>Senha: <?= $telefone?> </h3>
                </td>
            </tr>
        </table>

</body>
</html>