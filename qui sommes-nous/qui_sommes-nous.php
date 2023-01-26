<?php
session_start();
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Qui sommes-nous</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
    <link rel="stylesheet" href="qui_sommes-nous.css">
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
            <div class="title"><h3> Qui somme-nous<h3></div>
            <div class="card">
                <div class="icon">
                    <img src="../php_project_pictures/27.jpeg" >
                </div>
                <div class="card-content">
                    <h3>Idee generale</h3>
                    <p>De nos jours, plusieurs programmes existent pour encourager et faciliter le recyclage. La population est de plus en plus sensibilisée à la préservation de l’environnement. Plusieurs personnes changent leurs habitudes, leur façon de consommer et effectuent divers gestes écoresponsables au quotidien. Réutiliser et recycler les objets du quotidien est un bel exemple. Faites aussi votre part en réutilisant les objets du quotidien pour les transformer en objets pratiques. Avec un peu d’imagination, tout est possible!</p>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <h3>Mission</h3>
                    <p>GreenWork est une société sans but lucratif. Sa mission est de promouvoir et de faciliter la récupération des résidus et des contenants des objetcs, de soutenir et d’encourager le recyclage des produits récupérés et de contribuer à la valorisation des rebuts.
                        <br> Chaque année, GreenWor met en place des stratégies pour informer, sensibiliser et éduquer la population afin que la récupération des résidus et des contenants des objects vides devienne une habitude pour le consommateur.
                        <br> Nous nous attaquons à la crise des déchets sous tous ses angles, en mettant au point des solutions innovantes pour
                    </p>
                </div>
                <div class="icon">
                    <img src="../php_project_pictures/28.jpg" >
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
    <script src="qui_somme-nous.js"></script>
</body>

</html>