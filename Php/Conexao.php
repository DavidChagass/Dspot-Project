<?php
class Conectar{
    function Database(){
        
        try{
            $mysql = new mysqli('Medicine');
            $con = mysqli_connect('localhost', 'root', '');
            mysqli_select_db($mysql, $con);
            
        }catch(Exception $e){ die("banco não encontado: " . $e->getMessage());}
    }
}
?>