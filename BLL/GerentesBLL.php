<?php
require_once '../DAL/Conexao.php';
require_once '../DTO/GerenteDTO.php';

class GerentesBLL extends GerenteDTO
{
    public static function cadfuncionario($idempresa, $nomeFuncionario, $email, $senha)
    {
        $connObj = new Conexao();
        $conn = $connObj->retornaConexao();
        $sql_code = "INSERT INTO Funcionario (nomeFuncionario, emailFuncionario, senhaFuncionario, fk_idEmpresa) 
                       VALUES (:nomeFuncionario, :email, :senha, :idEmpresa)";

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

    public static function LogGerentes($dominio, $email, $senha)
    {
        $connObj = new Conexao();
        $conn = $connObj->retornaConexao();

        $sql_code = "call logGerentes(:dominio, :email, :senha)";

        $stmt = $conn->prepare($sql_code);
        $stmt->bindParam(':dominio', $dominio);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultado;
    }


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
