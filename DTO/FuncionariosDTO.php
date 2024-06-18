<?php
include('Pessoa.php');
class Funcionario extends Pessoa{
// atributos do objeto


// metodo contrutor 

public function __construct($dominio, $email, $senha){
    parent::__construct($dominio, $email, $senha);

}

// funções do objeto

/*     public function getCpfFuncionario(){
        return $this->cpfFuncionario;
    }
    public function getIdFuncionario(){
        return $this->idFuncionario;
    } */
}