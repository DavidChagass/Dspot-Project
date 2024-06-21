<?php
require_once '../DAL/Conexao.php';
require_once '../DTO/FuncionariosDTO.php';


class FuncionariosBLL extends FuncionarioDTO
{

    public static function LoginFuncionario($dominio, $email, $senha)
    {
        $connObj = new Conexao();
        $conn = $connObj->retornaConexao();

        $sql_code = "call logFuncionario(:dominio, :email, :senha)";

        $stmt = $conn->prepare($sql_code);
        $stmt->bindParam(':dominio', $dominio);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }
}
