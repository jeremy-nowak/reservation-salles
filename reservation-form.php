<?php 
   include 'connect.php';
   if(isset($_POST['soumettre'])){

    $titre = $_POST["titre"];
    $debut = $_POST['horraire_debut'];
    $fin = $_POST['horraire_fin'];
    $resa_start = ($_POST['date_resa']. ' ' . $_POST['horraire_debut']. ":00:00" );
    $resa_end = ($_POST['date_resa']. ' ' . $_POST['horraire_fin']. ":00:00" );

    // $comment_clean = mysqli_real_escape_string($connect, $_POST['description']);
    var_dump($_POST['titre']);
    var_dump($_POST['description']);
    var_dump($_POST['horraire_debut']);
    var_dump($_POST['horraire_fin']);
    var_dump($_SESSION['id']);
    var_dump($_POST['date_resa']);
    var_dump($resa_start);
    var_dump($resa_end);



    
    
} 

            
 if(isset($_SESSION['login']) && isset($_POST["soumettre"])){        
     $add_reservation = " INSERT INTO reservations(titre, description, debut, fin, id_utilisateur) VALUES ('$titre','($_POST[description])','$resa_start','$resa_end','$_SESSION[id]')";
     $querry_reservation = $connect->query($add_reservation);
  header("location:planning.php");
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewporth" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reservation.css">
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
    <div class="formulaire">
    
    <form method="post">
    <h1>Formulaire de reservation:</h1>
    <fieldset>
        <legend> <span class="number">1.</span>Inscritption :</legend>
        <label for="name">Titre:</label><br>
        <input type="text" name="titre" id="titre">
        Message :<br/>
        <textarea name="description"rows="8" cols="35"> 
        </textarea> <br />

    </fieldset>
     <fieldset>
        
        <legend><span class="number">2.</span>Horraires:</legend>
        <p style="color:red">Horraire de reservation de 9h à 18h.</p>
        <p>Horraire de début de reservation:</p>
    <select name="horraire_debut">
        <?php
    for ($i = 9; $i < 19; $i++) {
        if($i <10){
            echo "<option>"."0"."$i","</option>";

        }
        else{
            
            echo "<option>"."$i","</option>";
            
    }
    }
    ?>
    </select>
        <p>Horraire de fin de reservation:</p>
    <select name="horraire_fin">
        <?php
    for ($i = 10; $i < 19; $i++) {
        if($i <10){
            echo "<option>"."0"."$i","</option>";

        }
        else{ 
        echo "<option>" ."$i" ,"</option>";
     }
    }   
    ?>
</select>



    </fieldset>

    <fieldset>
    <legend> <span class="number">3.</span>Date :</legend>
    
    <label for="start">Date de réservation:</label>
    <input type="date" name="date_resa"
       min="2022-01-01" max="2023-12-31">

    </fieldset>

    <br><button type="submit" name="soumettre">Valider</button>

</form>
</div>
</div>
    
   

</div>
<footer>
<?php
   include 'footer.php';
   ?>
</footer>
</body>
</html>