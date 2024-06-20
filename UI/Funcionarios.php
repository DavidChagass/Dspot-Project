<?php
require_once '../BLL/FuncionariosBLL.php';
$dominio = $_POST['dominio'];
$email = $_POST['email'];
$senha = $_POST['senha'];

/* $dominio = "12345-1*23";
$email = 'sanduicheiche@gmail.com';
$senha = "samuelsilva";
 */
$funcionarios = new FuncionariosBLL($dominio,$email,$senha);
$funcionarios->LoginFuncionario($dominio,$email,$senha);
$resultados = $funcionarios;
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


<?php 
        var_dump($resultados);
        foreach ($resultados as $linha) {
?>
        <table>

            <tr>
                <td>
                    <h3>id: <?= $linha->dominio ?> </h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>Nome da Empresa: <?= $linha->email ?> </h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>Nome do funcionario: <?= $linha->senha ?> </h3>
                </td>
            </tr>
        </table>

    <section><h2>BEM VINDO AO MENU DA EMPRESA</h2></section>
    <?php }?>
    
</body>
</html>
