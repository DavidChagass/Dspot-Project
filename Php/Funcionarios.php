<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionarios</title>
</head>

<body>
<h1>Hello World</h1>
    <?php

    include 'Conexao.php';
    $email = "sanduicheiche@gmail.com";
    $senha = "samuelsilva";
    function email($email)
    {
        $conn =  Database();
        if (isset($email)) {
            $sql = "SELECT idFuncionario FROM Funcionario WHERE emailFuncionario = {$email}";
            $result = $conn->query($sql);   
        } else {
            echo "<h1>" . "error email" . "</h1>";
        }
        echo $sql;
    }
    function senha($senha)
    {
        $conn = Database();
        if (isset($senha)) {
            $sql = "SELECT idFuncionario FROM Funcionario WHERE senhaFuncionario = {$senha}";
            $result = $conn->query($sql);
        } else {
            echo "<h1>" . "error senha" . "</h1>";
        }
    }   
    
    ?>

</body>

</html>