
<?php
try{
    include('../DAL/Conexao.php');

    
$login = new Pessoa($_POST['dominio'], $_POST['email'], $_POST['senha']);
$mostrar = $login->login();
if (isset($email) && isset($senha) && isset($dominio)) {

    $sql_code = "SELECT DISTINCT * FROM Funcionario INNER JOIN Empresa ON(Funcionario.fk_idEmpresa = Empresa.idEmpresa) 
    WHERE Empresa.dominio = :dominio AND Funcionario.emailFuncionario = :email AND Funcionario.senhaFuncionario = :senha";
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