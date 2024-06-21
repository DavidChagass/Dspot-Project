<?php
require_once '../DAL/Conexao.php';
require_once '../DTO/GerenteDTO.php';

class GerenteBLL extends GerenteDTO
{

    public static function CadastrarFuncionario(){
        $connObj = new Conexao();
        $conn = $connObj->retornaConexao();

        $sql_code = "call logFuncionario(:dominio, :email, :senha)";

        $stmt = $conn->prepare($sql_code);
        $stmt->bindParam(':dominio', $dominio);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam('nome' , $nome);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public static function logfuncionario($dominio, $email, $senha) {
        try {
            $connObj = new Conexao();
            $conn = $connObj->retornaConexao();

           
            $stmt = $conn->prepare("CALL LogFuncionario(:dominio, :email, :senha, @Funcionarios)");
            $stmt->bindParam(':dominio', $dominio);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->execute();

            
            $stmt = $conn->query("SELECT Funcionarios AS Funcionarios");
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            $logFuncionario = $resultado['Funcionarios'];

           
            $funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

            
            $retorno = array(
                'Funcionarios' => $logFuncionario,
                'funcionarios' => $funcionarios
            );

            return $retorno;
        } catch (PDOException $e) {
        }
}//s
v
}