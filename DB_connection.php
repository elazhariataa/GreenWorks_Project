<?php
   try{
    $db = new PDO("mysql:host=localhost;dbname=greenworks;charset=utf8","root","",[PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION]);
   }
   catch(PDOException $e){
    die("Erreur de connexion : ".$e->getMessage());
   }

?>