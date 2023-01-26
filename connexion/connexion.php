<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="connexion.css">
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
                                <li><a href="connexion.php">Connexion</a></li>
                                <li><a href="../inscription/inscription.php">Inscription</a></li>
                            </ul>
                        
                    </li>
                    <li><a href="../qui sommes-nous/qui_sommes-nous.php">Qui sommes-nous</a></li>
                    <li><a href="../contactez-nous/contact.php">Contactez-nous</a></li>
                </ul>
                
            </nav>
        </header>
        <div class="main">
            <div class="form">
                <div class="title"><h3>Connexion</h3></div>
                <?php
                if(isset($_GET["message"])){
                    extract($_GET);
                    switch($message){
                        case "error_login" : echo "<div class='error'>Login vide </div>";break;
                        case "error_mpasse" : echo "<div class='error'>Mot de passe vide </div>";break;
                        case "error_loginMpasse" : echo "<div class='error'>Login ou le mot de passe incorrect </div>";break;
                    }
                }
                ?>
                <form name="form2" method="POST">
                    <div class="info">
                        <div class="personnel">
                            <label for="login">Login</label>
                            <input name="login" type="text" id="idlogin">
                        </div>
                        <div class="personnel">
                            <label for="pass">Mot de passe</label>
                            <input name="pass" type="password" id="idpass">
                        </div>
                    </div>
                    <div class="info">
                        <div >
                            <div><input type="submit" name="connexion" value="connexion" id="idconnexion"></div>
                            <div class="text">vous n'avez pas de compte ?</div>
                            <div><button id="inscrire"><a href="../inscription/inscription.php">S'inscrire</a></button></div>
                        </div>
                    </div>
                </form>
                <?php
                if($_SERVER["REQUEST_METHOD"]=="POST"){
                    extract($_POST);
                    if(!isset($login) || empty($login)){
                        header("Location:connexion.php?message=error_login");
                    }else{
                        if(!isset($pass) || empty($pass)){
                            header("Location:connexion.php?message=error_mpasse");
                        }else{
                            include("../DB_connection.php");
                            try{
                                $req=$db->prepare("SELECT * FROM compte WHERE Login = :login and Mpasse=:mpasse");
                                $req->execute([
                                    "login"=>$login,
                                    "mpasse"=>$pass
                                ]);
                                $nb = $req->rowCount();
                                if($nb === 1 ){
                                    $info = $req->fetch();
                                    session_start();
                                    $_SESSION["user"]=$info["NomUtili"];
                                    $_SESSION["id_user"] = $info["IdUtili"];
                                    $_SESSION["id_sess"] = session_create_id();
                                    header("Location:../mes_greenworks/mes_greenworks.php");
                                }
                                else {
                                    header("Location:connexion.php?message=error_loginMpasse");
                                }
                            }
                            catch(PDOException $e){
                                die("Erreur de selection : ".$e->getMessage());
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
    <script src="connexion.js"></script>
</body>

</html>