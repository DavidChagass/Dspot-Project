<?php
class Conexao
{
  private $host = "localhost";
  private $dbname = "dspot";
  private $user = "root";
  private $password = "";
  private $conn;


    public function __construct(){
      try{
            $this->conn = new PDO("mysql:host=$this->host;
                                  dbname=$this->dbname",
                                  $this->user,
                                  $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, 
                                      PDO::ERRMODE_EXCEPTION);
      }catch(PDOException $e){
        echo "erro na conexao" . $e->getMessage();
      }
    }
  

  public function retornaConexao(){
    return $this->conn;
  }
}
