<?php
try{
include('Conexao.php');

// $nomeFuncionario = $_POST['nomeFuncionario'];
// $nomeEmpresa = $_POST['nomeEmpresa'];
$email = trim($_POST['email']);
$senha = trim($_POST['senha']);
$dominio = trim($_POST['dominio']);


if (isset($email) && isset($senha) && isset($dominio)) {

    $sql_code = "SELECT DISTINCT * FROM Funcionario INNER JOIN Empresa ON(Funcionario.fk_idEmpresa = Empresa.idEmpresa) WHERE Empresa.dominio = :dominio AND Funcionario.emailFuncionario = :email AND Funcionario.senhaFuncionario = :senha";
    $stmt = $pdo->prepare($sql_code);
    $stmt->bindParam(':dominio', $dominio);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $sql_query = $stmt->rowCount();


} else {
    echo "senha e email vazios";
}
}catch(PDOException $e){
  "erro " . $sql_query . " " . $e->getMessage() and die('erro no sql');
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
                    <h3>Nome da Empresa: <?= $linha['nomeEmpresa'] ?> </h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>Nome do funcionario: <?= $linha['nomeFuncionario'] ?> </h3>
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
    <?php } }else{echo "<h2>DOMINIO, EMAIL OU SENHA INCORRETOS</h2>
         <button class=\"button-3\" onclick='history.back()'>VOLTAR</button>";}?>
    
</body>
</html>
