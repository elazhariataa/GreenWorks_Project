<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="inscription.css">
</head>

<body>
    <div class="continer">
        <header>
            <nav>
                <div class="logo">
                    <a href="../qui sommes-nous/qui_sommes-nous.html"><img src="../php_project_pictures/18.png" alt="logo"></a>
                    <p>GreenWorks</p>
                </div>
                
                <ul id="list1">
                    <li><a href="../Accueil/Accueil.php">Accueil</a></li>
                    <li><a href="../liste_greenworks/liste_greenworks.php">Les GreenWorks</a></li>
                    <li><a href="#">Mes GreenWorks</a>
                        
                            <ul>
                                <li><a href="../connexion/connexion.php">Connexion</a></li>
                                <li><a href="inscription.php">Inscription</a></li>
                            </ul>
                        
                    </li>
                    <li><a href="../qui sommes-nous/qui_sommes-nous.php">Qui sommes-nous</a></li>
                    <li><a href="../contactez-nous/contact.php">Contactez-nous</a></li>
                </ul>
                
            </nav>
        </header>
        <div class="main">
            <div class="form">
                <div class="title"><h3>Inscription</h3></div>
                <?php
if(isset($_GET["message"])){
    extract($_GET);
    switch($message){
        case "error_nom" : echo "<div class='error'>Nom vide </div>";break;
        case "error_nomNV" : echo "<div class='error'>Nom invalide </div>";break;
        case "error_prenom" : echo "<div class='error'>Prenom vide </div>";break;
        case "error_prenomNV" : echo "<div class='error'>Prenom invalide </div>";break;
        case "error_email" : echo "<div class='error'>Email vide </div>";break;
        case "error_emailNV" : echo "<div class='error'>Email invalide </div>";break;
        case "error_login" : echo "<div class='error'>Login vide </div>";break;
        case "error_loginNV" : echo "<div class='error'>Login invalide </div>";break;
        case "error_mpasse" : echo "<div class='error'>Mot de passe vide </div>";break;
        case "error_mpasseNV" : echo "<div class='error'>Mot de passe invalide </div>";break;
        case "error_rmpasse" : echo "<div class='error'>Confirmation de mot de passe invalide </div>";break;
    }
}
?>
                <form name="form3" method="POST">
                    <div class="info">
                        <div class="personnel">
                            <label for="nom">Nom</label>
                            <input name="nom" type="text" id="idnom">
                        </div>
                        <div class="personnel">
                            <label for="prenom">Prenom</label>
                            <input name="prenom" type="text" id="idprenom">
                        </div>
                    </div>
                    <div class="info">
                        <div class="personnel">
                            <label for="email">Email</label>
                            <input name="email" type="email" id="idemail">
                        </div>
                        <div class="personnel">
                            <label for="nomu">Nom d'utilisateur</label>
                            <input name="login" type="text" id="idnomu">
                        </div>
                    </div>
                    <div class="info">
                        <div class="personnel">
                            <label for="pass">Mot de passe</label>
                            <input name="pass" type="password" id="idpass">
                        </div>
                        <div class="personnel">
                            <label for="repass">Confirmation mot de passe</label>
                            <input name="repass" type="password" id="idrepass">
                        </div>
                    </div>
                    <div class="info">
                        <div >
                            <div><input type="submit" name="inscrire" value="S'inscrire" id="inscrire"></div>
                            <div class="text">Vous avez déjà un compte?</div>
                            <div><button id="idconnexion"><a href="../connexion/connexion.php">connexion</a></button></div>
                        </div>
                    </div>
                </form>
                <?php
                if($_SERVER["REQUEST_METHOD"]=="POST"){
                    extract($_POST);
                    if(!isset($nom) || empty($nom)){
                        header("Location:inscription.php?message=error_nom");
                    }else{
                        if(!preg_match("/^[a-zA-Z-' ]*$/",$nom)){
                            header("Location:inscription.php?message=error_nomNV");
                        }else{
                            if(!isset($prenom) || empty($prenom)){
                                header("Location:inscription.php?message=error_prenom");
                            }else{
                                if(!preg_match("/^[a-zA-Z-' ]*$/",$prenom)){
                                    header("Location:inscription.php?message=error_prenomNV");
                                }else{
                                    if(!isset($email) || empty($email)){
                                        header("Location:inscription.php?message=error_email");
                                    }else{
                                        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                                            header("Location:inscription.php?message=error_emailNV");
                                        }else{
                                            if(!isset($login) || empty($login)){
                                                header("Location:inscription.php?message=error_login");
                                            }else{
                                                if(!preg_match('/^[A-Za-z]{1}[A-Za-z0-9]{5,31}$/', $login)){
                                                    header("Location:inscription.php?message=error_loginNV");
                                                }else{
                                                    if(!isset($pass) || empty($pass)){
                                                        header("Location:inscription.php?message=error_mpasse");
                                                    }else{
                                                        if(!preg_match("/^[A-Za-z]/",$pass)){
                                                            header("Location:inscription.php?message=error_mpasseNV");
                                                        }else{
                                                            if(!isset($repass) || empty($repass)){
                                                                header("Location:inscription.php?message=error_rmpasse");
                                                            }else{
                                                                if($pass != $repass){
                                                                    header("Location:inscription.php?message=error_rmpasse");
                                                                }else{
                                                                    include("../DB_connection.php");
                                                                    try{
                                                                        $req = $db -> prepare("INSERT INTO compte(NomUtili,PrenomUtili,EmailUtili,Login,Mpasse) VALUES(:NomUtili,:PrenomUtili,:EmailUtili,:Login,:Mpasse)");
                                                                        $req -> execute([
                                                                            "NomUtili" => $nom,
                                                                            "PrenomUtili" =>$prenom,
                                                                            "EmailUtili" =>$email,
                                                                            "Login" => $login,
                                                                            "Mpasse" => $pass
                                                                        ]);
                                                                        header("Location:../connexion/connexion.php");
                                                                    }
                                                                    catch(PDOException $e ){
                                                                        die("Erreur d'inscription".$e->getMessage());
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                
                ?>
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
    <script src="inscription.js"></script>
</body>

</html>