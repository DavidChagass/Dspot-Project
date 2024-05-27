<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerente</title>
</head>

<body>

    <?php

    include('Conexao.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (isset($_POST['email']) || isset($_POST['senha'])) {


        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM Gerente WHERE emailGerente = '$email' AND senhaGerente = '$senha'";
      
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código mysql: " . $mysqli->error);
    } else {
        echo "senha e email vazios";
    }

    foreach ($sql_query as $linha) {

    ?>
        <table>

            <tr>
                <td>
                    <h3>id: <?= $linha['idGerente'] ?> </h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>nome: <?= $linha['nomeGerente'] ?> </h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>senha: <?= $linha['senhaGerente'] ?></h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>email:<?= $linha['emailGerente'] ?></h3>
                </td>
            </tr>
        </table>
    <?php } ?>
    <section><h2>BEM VINDO AO MENU DA EMPRESA <?= strtoupper($linha['nomeGerente']) ?></h2></section>
</body>

</html>
