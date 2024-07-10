<?php
   abstract class Pessoa{
    private $dominio;
    private $email;
    private $senha;

    
        public function __construct($dominio,$email,$senha){
            $this->dominio = $dominio;
            $this->email = $email;
            $this->senha = $senha;
        }



      public function getDominio() {
        return $this->dominio;  
      }

      public function getEmail() {
        return $this->email;
      }

      public function getSenha() {
        return $this->senha;
      }

   
}