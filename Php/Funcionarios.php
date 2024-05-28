<?php

include('Conexao.php');

// $nomeFuncionario = $_POST['nomeFuncionario'];
// $nomeEmpresa = $_POST['nomeEmpresa'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$dominio = $_POST['dominio'];

try{
if (isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['dominio'])) {

    $sql_code = "SELECT * FROM Funcionario INNER JOIN Empresa ON(Funcionario.fk_idEmpresa = Empresa.idEmpresa) WHERE Empresa.dominio = '{$dominio}' AND Funcionario.emailFuncionario = '{$email}' AND Funcionario.senhaFuncionario = '{$senha}'";
    $stmt = $pdo->prepare($sql_code);
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $sql_query = $stmt->rowCount();


} else {
    echo "senha e email vazios";
}
}catch(PDOException $e){
    $sql_query . $e->getMessage();
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

    if($sql_query){
        foreach ($resultado as $linha) {

?>
        <table>

            <tr>
                <td>
                    <h3>id: <?= $linha['idFuncionario'] ?> </h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>Nome Empresa: <?= $linha['nomeEmpresa'] ?> </h3>
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

    <section><h2>BEM VINDO AO MENU DA EMPRESA <?= strtoupper($linha['nomeFuncionario']) ?></h2></section>
    <?php } }else{echo "erro ao mostrar";}?>
    
</body>
</html>
