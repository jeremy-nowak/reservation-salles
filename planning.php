<?php 
   include 'connect.php';
   $requete = "SELECT reservations.titre, reservations.description, DATE_FORMAT(reservations.debut, '%a %d %b %H') as debut, DATE_FORMAT(reservations.fin, '%a %d %b %H') as fin , id FROM reservations";
    $exec_req = mysqli_query($connect, $requete);
    $reservation = mysqli_fetch_all($exec_req, MYSQLI_ASSOC);
    // $reservationdeb = $reservation[0]['debut'] -> format('Y m d H');

     



   ?>

 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="livre-or.css">
    <style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@900;900&display=swap');
</style>

    <title>Home</title>

    


</head>
<body>
<header>
   <?php 
   include 'header.php';
   ?>
</header>
<div class="millieu">
<?php if(isset($_SESSION["login"])){ ?>
   <h1>Bonjour <?= $_SESSION["login"]?> </h1>
   <?php } 
   else {
     echo "<h1> Mode invité sans login</h1>";
   }
   ?>
   <?php
    //    $dates = [
    //     "Lundi",
    //     "Mardi",
    //     "Mercredi",
    //     "Jeudi",
    //     "Vendredi",
    //     "Samedi",
    //     "Dimanche",

    // ];
    // $horraires = [ 
    //     "08h00 à 09h00",
    //      "09h00 à 10h00",
    //      "10h00 à 11h00",
    //      "11h00 à 12h00",
    //      "12h00 à 13h00",
    //      "13h00 à 14h00",
    //      "14h00 à 15h00",
    //      "15h00 à 16h00",
    //      "16h00 à 17h00",
    //      "17h00 à 18h00",

    // ];
     ?>
     
<table class="tftable" border="2">
    
<?php



    ?>
<thead>
   <tr>
    <th>Horaires</th>
        <?php $date = new DateTime("midnight + 8 hours", new DateTimeZone("Europe/Paris")); ?>
        
                

            <?php for ($j=0; $j < 7; $j++) : ?>

                <?php    echo "<th>" . $date->format("D j M") . "</th>";

                $date->modify("next day"); ?>  
                 

            <?php endfor; ?>
    </tr>
</thead>



<tbody>

                <?php for ($i=8; $i < 19; $i++) : ?>
    <tr> 
                    
                    <?= "<td>" .$i."h00"."</td>"?>


                    <?php for ($k=0; $k < 7 ; $k++) : ?>

                        <?php $date = new DateTime("midnight + $i hours + $k days")?>
                        <?php $dateformat = $date -> format('D d M H');?>
                        <?="<td>"?>

                        <?php for ($j = 0; isset($reservation[$j]); $j++ ) : ?>
                            <?php  $date = new DateTime("+ 1 days"); $datecompare = $date -> format('D d M H') ?>
                            
                            <?php if($reservation[$j]['debut'] == $datecompare && $reservation[$j]['fin'] == $datecompare) : ?>
                            
                                <?="<td>". "Reservé". " " . $reservation[$j]['titre'] ."</td>" ?>

<!-- creer une condition qui vérifi que $début et $fin soit bel et bien egal a $dateformat  en fonction de $j sinon echo libre

$reserved = false;
Textes complets
                                for ($j = 0; isset($resultp[$j]); $j++) {


                                    $debut = $resultp[$j][2];
                                    $fin = $resultp[$j][3];
                                    $debut1 = new DateTime($debut);
                                    $fin1 = new DateTime($fin);

                                    if ($date->format("D j M H") >= $debut1->format("D j M H") && $date->format("D j M H") <= $fin1->format("D j M H")) {
                                        echo "<a href='reservation.php?id=" . $resultp[$j][4] . "'>"  .  $resultp[$j][0]  . "<br>" . $resultp[$j][1] . "</a>";

                                        $reserved = true;


                                        a mettre apres dateformat=date->format.....

-->


                        

                        <?php  ?>
                        <?php endif; ?>
                        <?php endfor; ?>
                        <?php endfor; ?>
                        

</tr>
                        <?php endfor; ?>




                               


                                    
                                

                            
                        
                            
                    
                         
                    
<!-- // faire boucle qui parcours le tableau et qui affiche mon le contenut SINON affiche "libre  
"<td>". $date->format("D j M")." ". $date->format('H'). "</td>"
-->


<!-- //creer variable pour que toutes les données soit au meme format ($reservation et $date) -->

                              




</tbody>



</table>
   
</div>
<footer>
<?php
   include 'footer.php';
   ?>
</footer>
</body>
</html>