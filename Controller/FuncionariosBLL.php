<?php
require_once 'Conexao.php';
require_once '../Model/FuncionariosDTO.php';


class FuncionariosBLL extends FuncionariosDTO
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

