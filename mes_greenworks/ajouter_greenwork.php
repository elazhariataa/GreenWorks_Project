<?php
session_start();
if(count($_SESSION)==0){
    header("Location:../connexion/connexion.php");
}

?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>liste des GreenWorks</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
    <link rel="stylesheet" href="ajouter_greenwork.css">
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
            <div class="title"><h3>Ajouter un GreenWork</h3></div>
            <?php
                if(isset($_GET["message"])){
                    extract($_GET);
                    switch($message){
                        case "error_titre" : echo "<div class='error'>Titre vide </div>";break;
                        case "error_Ing" : echo "<div class='error'>Ingrédients vide </div>";break;
                        case "error_etapes" : echo "<div class='error'>Etapes et démarches de réalisation vide </div>";break;
                        case "error_dateg" : echo "<div class='error'>date de creation de GreenWork vide </div>";break;
                        case "error_photo" : echo "<div class='error'>Aucune photo choisie </div>";break;
                    }
                }
            ?>
            <form name="form4" method="POST" enctype="multipart/form-data">
                <div>
                    <label>Titre du GreenWork</label>
                    <input type="text" name="titre" id="idtitre">
                </div>
                <div>
                    <label for="ing">Ingrédients</label>
                    <textarea name="ing" id="iding" 
                        rows="5"
                        cols="100">
                    </textarea>
                </div>
                <div>
                    <label for="etapes">Etapes et démarches de réalisation</label>
                    <textarea name="etapes" id="idetapes" 
                        rows="5"
                        cols="100">
                    </textarea>
                </div>
                <div>
                    <label for="dateg">Date de creation de GreenWork: </label>
                    <input type="date" name ="dateg" id="iddateg">
                </div>
                <div>
                    <label for="photo">Photo de GreenWork: </label>
                    <input type="file" name ="photo" id="idphoto">
                </div>
                <div>
                    <input type="submit" name="ajouter" value="Ajouter" id="idajouter">
                </div>
            </form>
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

<?php
include("../DB_connection.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
    extract($_POST);
    if(!isset($titre) || empty($titre)){
        header("Location:ajouter_greenwork.php?message=error_titre");
    }else{
        if(!isset($ing) || empty($ing)){
            header("Location:ajouter_greenwork.php?message=error_ing");
        }else{
            if(!isset($etapes) || empty($etapes)){
                header("Location:ajouter_greenwork.php?message=error_etapes");
            }else{
                if(!isset($dateg) || empty($dateg)){
                    header("Location:ajouter_greenwork.php?message=error_dateg");
                }else{
                    if($_FILES["photo"]["error"]==0){
                        $type_file= $_FILES["photo"]["type"];
                        $extension =["image/jpg","image/jpeg","image/gif","image/jfif","image/ico","image/png"];
                        if(in_array($type_file , $extension)){
                            move_uploaded_file($_FILES["photo"]["tmp_name"],"./uploaded_pictures/".$_FILES["photo"]["name"]);
                        }
                    }
                    try{
                        $requestAG = $db ->prepare("INSERT INTO greenwork(Titregreenwork,Inggreenwork,Etapesgreenwork,Dategreenwork,imagegreenwork,IdUtili) VALUES (?,?,?,?,?,?)");
                        $requestAG->execute([$titre,$ing,$etapes,$dateg,".\\uploaded_pictures\\".$_FILES["photo"]["name"],$_SESSION["id_user"]]);
                        header("Location:mes_greenworks.php");
                    }
                    catch(PDOException $e){
                        die("Erreur d'ajoute".$e->getMessage());
                    }
                }
            }
        }
    }
}

?>