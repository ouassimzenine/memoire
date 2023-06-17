<?php
include 'conn.php';
    $numero = $_GET['numero'];
    $sql = "SELECT * FROM equipe WHERE numero = $numero";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $numeroo=$row['numero'];
    $intitulee = $row['intitule_DEquipe'];
    $acronymee = $row['acronyme_DEquipe'];
    $cheff = $row['chef_DEquipe'];
    $descriptionn = $row['description_scientifique'];
    $adequationn =$row['adequation'];
    $environnementt = $row['environnement_et_contraint'];
    $traveauxx = $row['traveaux_en_cours'];










  
    

if (isset($_POST['submit'])){
   
    $intitule = $_POST['intitule'];
    $acronyme = $_POST['acronyme'];
    $chef = $_POST['chef'];
    $description = $_POST['description'];
    $adequation = $_POST['adequation'];
    $environnement = $_POST['environnement'];
    $traveaux = $_POST['traveaux'];
    $errors=[];

    if (empty($intitule)){
        $errors[]='veuillez entrer le prenom';
    }elseif(empty($acronyme)){
        $errors[]='veuillez entrer acronyme';
    }elseif(empty($chef)){
        $errors[]='veuillez entrer le chef';
    }elseif(empty($description)){
        $errors[]='veuillez entrer la description';
    }
    elseif(empty($adequation)){
        $errors[]='veuillez entrer adequation';
    }elseif(empty($environnement)){
        $errors[]='veuillez entrer environnement';
    }elseif(empty($traveaux)){
        $errors[]='veuillez entrer traveaux';
    }else{
        $sl = "UPDATE equipe SET numero='$numero', intitule_DEquipe = '$intitule', acronyme_DEquipe = '$acronyme', chef_DEquipe = '$chef', description_scientifique='$description', adequation='$adequation', environnement_et_contraint='$environnement', traveaux_en_cours='$traveaux' WHERE numero = $numero";
        $reslt = mysqli_query($con, $sl);
        if($reslt){
            header('location:affequipe.php');
        }else{
            echo "Une erreur s'est produite lors de la modification de l'équipe.";
        }
    }
    if(isset($errors)){
        if(!empty($errors)){
            foreach($errors as $msg){
                echo $msg . "<br>";
            }
        }
      }
     
}
    
    
    


?>












<!doctype html>
<html>
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <link rel="stylesheet" href="editeqp.css" >
    

    <title>update</title>
  </head>
  <body>
    <div class="container">
        <form method="post">
         
        

        <label for="intitule">Intitulé de l'équipe :</label>
        <input type="text" id="intitule" name="intitule" value="<?php echo $intitulee;?>"><br>

        <label for="acronyme">Acronyme de l'equipe</label>
        <input type="text" id="acronyme" name="acronyme" value="<?php echo $acronymee;?>"><br>

        <label for="chef">Chef de l'équipe :</label>
        <input type="text" id="chef" name="chef" value="<?php echo $cheff;?>"><br>

        <label for="description">Description scientifique :</label>
        <textarea id="description" name="description"><?php echo $descriptionn;?></textarea><br>

        <label for="adequation">adéquation_entre_le_programme_initial_de  :</label>
        <textarea id="adequation" name="adequation"><?php echo $adequationn;?></textarea><br>

        <label for="environnement">environnement et contraint :</label>
        <textarea id="environnement" name="environnement"><?php echo $environnementt;?></textarea><br>

        <label for="traveaux">traveaux en cours:</label>
        <textarea id="traveaux" name="traveaux"><?php echo $traveauxx; ?></textarea><br>

        
        <button type="submit" name="submit">Modifier</button>
        
            
            
                
        
        </form>
    </div>

    
  </body>
</html>
