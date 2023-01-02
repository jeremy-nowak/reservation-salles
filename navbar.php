<?php 
   include 'connect.php';

   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
</head>
<body>
<header>
            
            <div class="cadre">
                <div class="sommaire">                 
                    <ul>
                    <?php if (!isset($_SESSION["login"])) : ?>
                        <li><a href="index.php"><h3>Home</h3></a></li>
                        <li><a href="connexion.php"><h3>Connexion</h3></a></li>
                        <li><a href="inscription.php"><h3>Inscription</h3></a></li>
                        <?php else: ?>
                            <li><a href="index.php"><h3>Home</h3></a></li>
                            <li><a href="profil.php"><h3>Modification des informations</h3></a></li>
                            <li><a href="planning.php"><h3>Acceder au planning</h3></a></li>
                            <li> <a href="reservation-form.php"><h3>Reservation de la salle</h3></a></li>
                        <li><a href="deconnexion.php"><h3>Deconnexion</h3></a></li>
                        
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="banniere">

                    <img src="" alt="">
                </div>
                
            </div>
</header>
</body>
</html>
    
