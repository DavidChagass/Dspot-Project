<?php
require_once '../DAL/Conexao.php';
require_once '../DTO/FuncionariosDTO.php';


$conn = new Conexao;

class FuncionariosBLL extends Funcionario {

    function LoginFuncionario($dominio, $email, $senha){

        global $conn;
        $conn = $conn->retornaConexao();

        $sql_code = "SELECT *
         FROM Funcionario
          INNER JOIN Empresa ON(Funcionario.fk_idEmpresa = Empresa.idEmpresa)
        WHERE Empresa.dominio = :dominio AND
         Funcionario.emailFuncionario = :email AND Funcionario.senhaFuncionario = :senha";
        $stmt = $conn->prepare($sql_code);
        $stmt->bindParam(':dominio', $dominio);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $resultado;
    }
}



?>