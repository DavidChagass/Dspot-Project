<?php
include('Pessoa.php');
class Funcionario extends Pessoa
{
    // atributos do objeto


    // metodo contrutor 

    public function __construct($dominio, $email, $senha)
    {
        parent::__construct($dominio, $email, $senha);
    }
}
