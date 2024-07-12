<?php
require_once("conexao.php");
require_once("../Model/Empresa.php");

class DaoEmpresas extends Empresa
{

    public static function inserir($dominio, $nome, $email, $telefone)
    {
        $connObj = new Conexao();
        $conn = $connObj->retornaConexao();

        $sql = "INSERT INTO Empresa (dominio, nomeEmpresa, emailEmpresa, telefoneEmpresa) VALUES( :dominio, :nomeEmpresa, :email, :telefone)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":dominio", $dominio);
        $stmt->bindParam(":nomeEmpresa", $nome);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":telefone", $telefone);
        $stmt->execute();
    }

    public static function listar($dominio)
    {
        $connObj = new Conexao();
        $conn = $connObj->retornaConexao();
        $sql = "SELECT nomeEmpresa, emailEmpresa, telefoneEmpresa, dominio FROM Empresa WHERE dominio = :dominio";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":dominio", $dominio);
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
}
