<?php
session_start();
if(count($_SESSION)==0){
    header("Location:../connexion.php");
}
include("../DB_connection.php")

?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>liste des GreenWorks</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
    <link rel="stylesheet" href="mes_greenworks.css">
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
            <div class="title"> <h3>Liste de mes GreenWorks</h3></div>
            <div class="tablegreenwork">
                <table class="greenworks-table">
                    <thead>
                        <th>Nom de créateur</th>
                        <th>Titre de GreenWork</th>
                        <th>Date de creation</th>
                        <th>Photo de GreenWork</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        
                        <?php
                        try{
                            $rqg=$db->prepare("SELECT * FROM greenwork WHERE IdUtili = ?");
                            $rqg->execute([$_SESSION["id_user"]]);
                            $infos = $rqg->fetchAll();
                            foreach($infos as $info){
                                echo "<tr>";
                                $id=$info[0];
                                $rquser=$db->prepare("SELECT  NomUtili, PrenomUtili FROM compte WHERE IdUtili = ?");
                                $rquser->execute([$info[6]]);
                                $fullname = $rquser->fetch();
                                echo"<td>".$fullname[0]." ".$fullname[1]."</td>";
                                echo"<td>".$info[1]."</td>";
                                echo"<td>".$info[4]."</td>";
                                echo"<td><img class='tablepic' src='".$info[5]."'></td>";
                                echo"<td><button class='supbtn'><a href='supprimer_greenwork.php?id=$id' onclick='return confirm(\"Etes-vous sûr de vouloir supprimer ce GreenWork?\")'>Supprimer</a></button><br><button class='modbtn'><a href='modifier_greenwork.php?id=$id' >Modifier</a></button></td></tr>";
                                
                                
                            }
                        }
                        catch(PDOException $e){
                            die("Erreur d'affichage".$e->getMessage());
                        }
                        ?>
                    </tbody>
                </table>
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
    <script src="mes_greenworks.js"></script>
</body>

</html>
