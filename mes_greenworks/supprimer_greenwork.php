<?php
session_start();
if(count($_SESSION)==0){
    header("Location:../connexion.php");
}
if(isset($_GET["id"])){
    extract($_GET);
    include("../DB_connection.php");
    try{
        $supprimer=$db->prepare("DELETE FROM greenwork WHERE idgreenwork =? ");
        $supprimer->execute([$id]);
        header("Location:mes_greenworks.php");
    }
    catch(PDOException $e){
        die("Erreur de suppression GreenWork".$e->getMessage());
    }
}



?>