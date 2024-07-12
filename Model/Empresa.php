<?php
// atributos do objeto
class Empresa
{
  private $dominio;
  private $nome;
  private $email;
  private $senha;
  private $telefoneEmpresa;
  public function __construct($dominio, $nome, $email, $senha, $telefoneEmpresa)
  {
    $this->dominio = $dominio;
    $this->nome = $nome;
    $this->email = $email;
    $this->senha = $senha;
    $this->telefoneEmpresa = $telefoneEmpresa;
  }



  public function getDominio()
  {
    return $this->dominio;
  }
  public function getNomeEmpresa()
  {
    return $this->nome;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function getSenha()
  {
    return $this->senha;
  }
  public function getTelefoneEmpresa()
  {
    return $this->telefoneEmpresa;
  }
}

// metodo contrutor 

// funções do objeto
