<?php
session_start();
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>liste des GreenWorks</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
    <link rel="stylesheet" href="liste_greenworks.css">
</head>

<body>
    <div class="continer">
        <header>
            <nav>
            <div class="logo">
                <div>
                <a href="../qui sommes-nous/qui_sommes-nous.php"><img src="../php_project_pictures/18.png" alt="logo"></a>
                <p>GreenWorks</p>
                </div>
                <?php
                if(count($_SESSION)!=0){
                    ?>

                <div>
                    <button> <a href="../connexion/deconnexion.php" onclick= 'return confirm("<?php echo $_SESSION["user"] ?> Êtes-vous sûr de vouloir vous déconnecter?")'>Deconexion</a></button>
                </div>
                <?php
                }
                ?>
            </div>
                
                <ul id="list1">
                    <li><a href="../Accueil/Accueil.php">Accueil</a></li>
                    <li><a href="liste_greenworks.php">Les GreenWorks</a></li>
                    <?php 
                    if(count($_SESSION)==0){
                        ?>
                    
                    <li><a href="#">Mes GreenWorks</a>
                        
                            <ul>
                                <li><a href="../connexion/connexion.php">Connexion</a></li>
                                <li><a href="../inscription/inscription.php">Inscription</a></li>
                            </ul>
                        
                    </li>
                    <?php
                    }else{
                        ?>
                        <li><a href="#">Mes GreenWorks</a>
                        
                        <ul>
                            <li><a href="../mes_greenworks/mes_greenworks.php">liste mes GreenWork</a></li>
                            <li><a href="../mes_greenworks/ajouter_greenwork.php">Ajouter GreenWork</a></li>
                        </ul>
                    
                </li>
                <?php
                    }
                    ?>
                    <li><a href="../qui sommes-nous/qui_sommes-nous.php">Qui sommes-nous</a></li>
                    <li><a href="../contactez-nous/contact.php">Contactez-nous</a></li>
                </ul>
                
            </nav>
        </header>
        

           
        <div class="main">
        <?php 
        include("../DB_connection.php");
        try{
            $rqg=$db->prepare("SELECT Titregreenwork,imagegreenwork,idgreenwork FROM greenwork");
            $rqg->execute();
            $infos = $rqg->fetchAll();
            foreach($infos as $info){
                $id=$info[2]
                ?>
            <div class="card">
                <div class="card-content">
                    <h3><?php echo $info[0] ?></h3>
                    <button id="detailsbtn"><?php echo "<a href='../details_greenwork/details_greenwork.php?id=$id' >Voire les detailes</a>" ?></button>
                </div>
                <div class="icon">
                    <?php echo"<img class='tablepic' src='../mes_greenworks/$info[1]'>";?>
                </div>
            </div>
            <?php
}

}
catch(PDOException $e){
    die("Erreur d'affichage".$e->getMessage());
}

?>
            
        </div>
        <div class="move-up"><img src="../php_project_pictures/move-up.png" onclick="topFunction()"></div>
        <footer>
            <ul>
                <li><a href="#">Info</a></li>
                <li><a href="#">Support</a></li>
            </ul>
            <ul>
                <li><a href="#">Term of Use</a></li>
                <li><a href="#">Privacy Policy</a></li>
            </ul>
            <p>Copyrights &copy; GreenWorks. All rights reserved</p>
        </footer>
    </div>
    <script src="liste_greenworks.js"></script>
</body>

</html>

