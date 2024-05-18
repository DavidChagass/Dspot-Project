<?php 
  include('conexao.php');
function NomeGerente($nome){
  $conn = Database();
  $sql = "SELECT idGerente FROM Gerente WHERE nomeGerente = {$nome}";
  
  include 'Conexao.php';
  $email = "david@email.com";
  $senha = "david123";
  function email($email)
  {
      $conn =  Database();

      if (isset($email)) {
          $sql = "SELECT idGerentes FROM Gerentes WHERE emailGerentes = {$email}";
          $result = $conn->query($sql);
      } else {
          echo "<h1>" . "error email" . "</h1>";
      }
      echo $sql;
  }
  function senha($senha)
  {
      $conn = Database();
      if (isset($senha)) {
          $sql = "SELECT idGerente FROM Gerente WHERE senhaGerente = {$senha}";
          $result = $conn->query($sql);
      } else {
          echo "<h1>" . "error senha" . "</h1>";
      }

}

?>
