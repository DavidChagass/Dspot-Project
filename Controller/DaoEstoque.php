<?php
require_once 'Conexao.php';
require_once '../Model/Estoque.php';

class DaoEstoque extends Estoque{


//modificar a quantidade de produtos


public static function alterarProdutos($quantatual, $idestoque, $dominio){

    $connObj = new Conexao();
    $conn = $connObj->retornaConexao();

    $sql = "UPDATE Estoque INNER JOIN Empresa  ON Estoque.fk_idEmpresa = Empresa.idEmpresa SET quantidadeAtual = :quantatual WHERE idEstoque = :idestoque AND dominio = :dominio";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":quantatual", $quantatual);
    $stmt->bindParam(":idEstoque", $idestoque);
    $stmt->bindParam(":dominio", $dominio);
    if ($stmt->execute()){
        return ;
    } else{
        return "erro ao atualizar";
    }
}


public static function contProdutos($dominio){
    $connObj = new Conexao();
    $conn = $connObj->retornaConexao();

    $sql = "SELECT COUNT(*) FROM Estoque INNER JOIN Empresa ON Estoque.fk_idEmpresa = Empresa.idEmpresa  WHERE dominio = :dominio";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":dominio", $dominio);
    $stmt->execute();
    $linha = $stmt->rowCount();
    
    return $linha;
}


public static function dadosProdutos($dominio){
    $connObj = new Conexao();
    $conn = $connObj->retornaConexao();

    $sql = "SELECT * FROM Estoque INNER JOIN Empresa ON Estoque.fk_idEmpresa = Empresa.idEmpresa  WHERE dominio = :dominio";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":dominio", $dominio);
    $stmt->execute();
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $dados;
}



}
