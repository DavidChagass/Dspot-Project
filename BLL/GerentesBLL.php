<?php
require_once '../DAL/Conexao.php';
require_once '../DTO/GerenteDTO.php';

class GerentesBLL extends GerenteDTO
{
    public static function cadfuncionario($idempresa,$nomeFuncionario, $email, $senha ) {
            $connObj = new Conexao();
            $conn = $connObj->retornaConexao();
            $sql_code = "call CadFuncionario(:idEmpresa,:nome , :email, :senha)";

            $stmt = $conn->prepare($sql_code);
            $stmt->bindParam(':idEmpresa', $idempresa);
            $stmt->bindParam(':nomeFuncionario', $nomeFuncionario);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            return $resultado;

}

}