<?php
require_once '../BLL/FuncionariosBLL.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dominio = $_POST['dominio'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $funcionariosBLL = new FuncionariosBLL($dominio, $email, $senha);
    $resultados = $funcionariosBLL->LoginFuncionario($dominio, $email, $senha);
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


<?php 
        foreach ($resultados as $linha) {
?>
        <table>

            <tr>
                <td>
                    <h3>Dominio: <?= $linha->dominio ?> </h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>Email: <?= $linha->email ?> </h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>Senha: <?= $linha->senha ?> </h3>
                </td>
            </tr>
        </table>

    <section><h2>BEM VINDO AO MENU DA EMPRESA</h2></section>
    <?php }?>
    
</body>
</html>
