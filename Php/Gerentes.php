<?php
try{
include('Conexao.php');

// $nomeFuncionario = $_POST['nomeFuncionario'];
// $nomeEmpresa = $_POST['nomeEmpresa'];

$email = trim($_POST['email']);
$senha = trim($_POST['senha']);
$dominio = trim($_POST['dominio']);

if (isset($email) && isset($senha) && isset($dominio)) {

    $sql_code = "SELECT * FROM Gerente INNER JOIN Empresa ON(Gerente.fk_idEmpresa = Empresa.idEmpresa) WHERE Empresa.dominio = :dominio AND Gerente.emailGerente = :email AND Gerente.senhaGerente = :senha";
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
    <title>Gerente</title>
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
                    <h3>id: <?= $linha['idGerente'] ?> </h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>Nome da Empresa: <?= $linha['nomeEmpresa'] ?> </h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>Nome do funcionario: <?= $linha['nomeGerente'] ?> </h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>senha: <?= $linha['senhaGerente'] ?></h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>email: <?= $linha['emailGerente'] ?></h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>dominio: <?= $linha['dominio'] ?></h3>
                </td>
            </tr>
        </table>

    <header><h2>BEM VINDO AO MENU DA EMPRESA <?= strtoupper($linha['nomeGerente']) ?></h2></header>
    <?php } }else{
        echo "<h2>DOMINIO, EMAIL OU SENHA INCORRETOS</h2><br>
        <button class=\"button-3\" onclick='history.back()'>VOLTAR</button>"; }?>
    
</body>
</html>
