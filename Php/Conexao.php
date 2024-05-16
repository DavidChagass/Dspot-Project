<?php
     function Database(){
        try{
            $mysql = new mysqli('localhost','root','','Medicine');            
        }catch(Exception $e){ die("banco não encontado: " . $e->getMessage());}
    }
?>