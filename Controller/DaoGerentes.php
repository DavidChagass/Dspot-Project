<?php
require_once 'Conexao.php';
require_once '../Model/Gerente.php';

class DaoGerentes extends Gerente
{

    //Cadastrar Funcionarios

    public static function cadfuncionario($idempresa, $nomeFuncionario, $email, $senha)
    {
        $connObj = new Conexao();
        $conn = $connObj->retornaConexao();
        $sql_code = "call CadFuncionario(:idEmpresa, :nomeFuncionario, :email, :senha)";

        $stmt = $conn->prepare($sql_code);
        $stmt->bindParam(':idEmpresa', $idempresa);
        $stmt->bindParam(':nomeFuncionario', $nomeFuncionario);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        if ($stmt->execute()) {
            return "funcionario inserido";
        } else {
            echo "erro ao inserir";
        }
    }

    //Login De Gerentes
    
    public static function Login($dominio, $email, $senha)
    {
        $connObj = new Conexao();
        $conn = $connObj->retornaConexao();

        $sql_code = "call logGerente(:dominio, :email, :senha)";

        $stmt = $conn->prepare($sql_code);
        $stmt->bindParam(':dominio', $dominio);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $resultado;
    }
    // Contar A Quantidade De Funcionarios

    public static function ContFuncionario($dominio)
    {
        $connObj = new Conexao();
        $conn = $connObj->retornaConexao();

        $sql_code = "call contFuncionarios(:dominio, @quantidadeTotal)";
        $stmt = $conn->prepare($sql_code);
        $stmt->bindParam(':dominio', $dominio);
        $stmt->execute();
        $stmt->closeCursor();
        $resultado = $conn->query("SELECT @quantidadeTotal AS total")->fetch(PDO::FETCH_ASSOC);
        return $resultado['total'];
    }
}
