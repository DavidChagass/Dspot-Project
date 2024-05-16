<?php
     function Database(){
        try{
            $hostname = "localhost";
            $username = "root";
            $password = "";
            $database = "Medicine";
            $mysql = new mysqli( $hostname, $username, $password, $database);            
            return $mysql;
        }catch(Exception $e){ die("<h2>" . "banco não encontado: " . $e->getMessage() . "</h2>" );}
      
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    bom dia
</body>
</html>