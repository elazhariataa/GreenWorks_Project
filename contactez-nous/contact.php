<?php
session_start();
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>CONTACT</title>
    <link rel="stylesheet" href="contact.css">
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
                    <li><a href="contact.php">Contactez-nous</a></li>
                </ul>
                
            </nav>
        </header>
        <div class="main">
            <div class="form">
                <div class="title"><h3>Contactez-Nous</h3></div>
                <form name="form1" method="POST">
                    <div class="info">
                        <div class="personnel">
                            <label for="objet">Objet</label>
                            <input name="objet" type="text" id="idobjet">
                        </div>
                        <div class="personnel">
                            <label for="inputEmail">Email</label>
                            <input name="email" type="text" id="idemail">
                        </div>
                    </div>
                    <div class="info">
                        <div >
                            <label for="message">Message</label>
                            <textarea name="message" id="idmessage" 
                                rows="5"
                                cols="100"></textarea>
                                <div><input type="submit" name="envoyer" value="Envoyer" id="idenvoyer"></div>
                            </div>
                        </div>
                    </div>
                </form>
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
    <script src="contact.js"></script>
</body>

</html>