<?php
require_once '../DAL/Conexao.php';
require_once '../DTO/FuncionariosDTO.php';


class FuncionariosBLL extends FuncionarioDTO
{

    public static function LoginFuncionario($dominio, $email, $senha)
    {
        $connObj = new Conexao();
        $conn = $connObj->retornaConexao();

        $sql_code = "SELECT * FROM Funcionario 
                INNER JOIN Empresa ON Funcionario.fk_idEmpresa = Empresa.idEmpresa 
                WHERE Empresa.dominio = :dominio AND 
                Funcionario.emailFuncionario = :email AND 
                senhaFuncionario = :senha;";

        $stmt = $conn->prepare($sql_code);
        $stmt->bindParam(':dominio', $dominio);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    
            return $resultado;
        }
    }

