<?php
include ('Pessoa.php');

abstract class Gerente extends Pessoa{
 // atributos do objeto
private $nomeFuncionario;
private $idempresa;

// metodo contrutor 

  

        public function __construct($dominio,$email,$senha, $nomeFuncionario, $idempresa){
          parent::__construct($dominio, $email, $senha);
          $this->nomeFuncionario = $nomeFuncionario;
          $this->idempresa = $idempresa;
        }

        
  // funções do objeto
        public function getNomeFuncionario(){
          return $this->nomeFuncionario;
        }
        public function getIdEmpresa(){
          return $this->idempresa;
        }



}

