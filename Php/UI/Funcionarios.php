<?php
include('/xampp/htdocs/Dspot-Project/BLL/FuncionariosBLL.php');

$dominio = $_POST['dominio'];
$email = $_POST['email'];
$senha = $_POST['senha'];

/* $dominio = "12345-1*23";
$email = 'sanduicheiche@gmail.com';
$senha = "samuelsilva";
 */
$funcionarios = new FuncionariosBLL($dominio, $email, $senha);
$funcionarios->LoginFuncionario($dominio,$email,$senha);
$funcionarios = $abc;
echo $abc;
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
