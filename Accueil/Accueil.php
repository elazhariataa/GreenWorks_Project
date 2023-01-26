<?php

session_start();
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
    <link rel="stylesheet" href="Accueil.css">
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
                        <button> <a href="../connexion/deconnexion.php" onclick= 'return confirm("<?php echo $_SESSION["user"] ?> etes-vous sûr de vouloir vous déconnecter?")'>Deconexion</a></button>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                
                <ul id="list1">
                    <li><a href="Accueil.php">Accueil</a></li>
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
            <div class="continer">
                <div class="card">
                    <div class="icon">
                        <img src="../php_project_pictures/3.jpg" >
                    </div>
                    <div class="card-content">
                        <h3>Pourquoi recycler</h3>
                        <p>Chaque jour, nous produisons des déchets sous différentes formes. Papier, carton, verre, plastique, céramique et bien d’autres encore se retrouvent à la poubelle et peuvent même polluer l’environnement. Fort heureusement, il existe une activité capable de les renouveler et de les rendre utile tout en préservant l’environnement. C’est le recyclage.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="icon">
                        <img src="../php_project_pictures/24.jpg" >
                    </div>
                    <div class="card-content">
                        <h3>La pollution de l'air</h3>
                        <p>Les déchets qui ne sont pas collectés de manière adéquate se retrouvent dans la nature et constituent une pollution visuelle et olfactive. Lorsqu’ils se décomposent, leurs composants (particules de plastique, certaines molécules, etc.) sont libérés et polluent l’environnement. Ces composants persistent pendant des périodes plus ou moins longues dans la nature</p>
                    </div>
                </div>
                <div class="card">
                    <div class="icon">
                        <img src="../php_project_pictures/25.jpg" >
                    </div>
                    <div class="card-content">
                        <h3>Disparition de la forêt</h3>
                        <p>Aujourd'hui, le manque de propreté est l'une des principales réclamations faite par les usagers des forêts. Quelle que soit leur nature (gravats, électroménager, alimentaires, déchets verts...), les déchets polluent les eaux et les sols. Ils sont dangereux pour les animaux et parfois pour l'Homme.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="icon">
                        <img src="../php_project_pictures/26.jpg" >
                    </div>
                    <div class="card-content">
                        <h3>Sea Population</h3>
                        <p>On a actuellement identifié trois gigantesques « îles » formées de déchets plastiques qui flottent au milieu des océans (deux dans le Pacifique, une dans l’Atlantique). Ce sont les courants marins qui transportent les détritus de plastiques (pièces de bateaux, filets de pêche, bouchons, sacs plastique, bouteilles, poupées, briquets, brosses à dents…) qui ensuite s’accumulent dans des zones plus calmes au centre de tourbillons.</p>
                    </div>
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
    <script src="Accueil.js"></script>
</body>

</html>