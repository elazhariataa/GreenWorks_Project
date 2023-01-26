<?php
session_start();
include("../DB_connection.php");
if(isset($_GET["id"])){
    extract($_GET);
    try{
        $requestDG=$db->prepare("SELECT * FROM greenwork WHERE idgreenwork =? ");
        $requestDG->execute([$id]);
        $info= $requestDG->fetch();
    }
    catch(PDOException $e){
        die("Erreur de selection GreenWork".$e->getMessage());
    }
}
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>GreenWork details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
    <link rel="stylesheet" href="details_greenwork.css">
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
                        <button> <a href="../connexion/deconnexion.php" onclick= 'return confirm("Êtes-vous sûr de vouloir vous déconnecter?")'>Deconexion</a></button>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                
                <ul id="list1">
                    <li><a href="../Accueil/Accueil.php">Accueil</a></li>
                    <li><a href="../liste_greenworks/liste_greenworks.php">Les GreenWorks</a></li>
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
            <div class="title"><h3><?php echo $info[1] ?></h3></div>
            <div class="card">
                <div class="icon">
                    <?php echo"<img class='tablepic' src='../mes_greenworks$info[5]'>";?>
                    <h3> les ingrédients</h3>
                </div>
                <div class="card-content">
                    
                    <p><?php echo $info[2] ?></p>
                </div>
            </div>
            <div class="card">
                <div class="icon">
                    <h3> les étapes</h3>
                    <?php echo"<img class='tablepic' src='../mes_greenworks/$info[5]'>";?>
                </div>
                <div class="card-content">
                    <p><?php echo $info[3] ?></p>
                </div>
            </div>
            
            
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
    <script src="details_greenwork.js"></script>
</body>

</html>