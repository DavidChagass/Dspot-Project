<!DOCTYPE html>
<html lang="pt-br">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionario</title>
    <link rel="stylesheet" href="Funcionario.css">
</head>

<body>

    <?php

    include('Conexao.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (isset($_POST['email']) || isset($_POST['senha'])) {


        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM Funcionario WHERE emailFuncionario = '$email' AND senhaFuncionario = '$senha'";
      
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código mysql: " . $mysqli->error);
    } else {
        echo "senha e email vazios";
    }
    foreach ($sql_query as $linha) {

    ?>
        <table>

            <tr>
                <td>
                    <h3>id: <?= $linha['idFuncionario'] ?> </h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>nome: <?= $linha['nomeFuncionario'] ?> </h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>cpf: <?= $linha['cpfFuncionario'] ?></h3>
                </td><br>
            </tr>
            <tr>
                <td>
                    <h3>senha: <?= $linha['senhaFuncionario'] ?></h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>email: <?= $linha['emailFuncionario'] ?></h3>
                </td>
            </tr>
        </table>
    <?php } ?>
    <section><h2>BEM VINDO AO MENU DA EMPRESA <?= strtoupper($linha['nomeFuncionario']) ?></h2></section>

    
</body>
</html>