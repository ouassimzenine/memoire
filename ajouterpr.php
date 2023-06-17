<?php
include 'conn.php';
if (isset($_POST['sub'])){
    $code=filter_var($_POST['code'],FILTER_SANITIZE_STRING);
    $type=filter_var($_POST['type'],FILTER_SANITIZE_STRING);
    $chef=filter_var($_POST['chef'],FILTER_SANITIZE_STRING);
    $dated=$_POST['dated'];
    $datef=$_POST['datef'];
    $errors=[];
    
    if (empty($code)) {
      $errors['code'] = "Veuillez entrer le Code";
    }
    if (empty($type)) {
      $errors['type'] = "Veuillez entrer le Type";
    }
    if (empty($chef)) {
      $errors['chef'] = "Veuillez entrer le Chef de *Projet";
    }if(empty($dated)){
      $errors['dated']= "Veuillez entrer votre date de debut de soutenance";
    }
    if (!empty($errors)) {
      foreach ($errors as $msg) {
        
      }
    } else{
      $sql1 = "INSERT INTO projet(code, type, chefprojet, date_debut, date_fin)
        VALUES ('$code','$type','$chef','$dated','$datef')";
        $rest1=mysqli_query($con,$sql1);
    if($rest1){
      $projet_id=mysqli_insert_id($con);
      header("location: ajoutemembre.php?id=$projet_id");
        exit();
    } else {
      echo "Erreur lors de l'ajout du projet : " . mysqli_error($con);
  }
    }
    
      
    
    







}




?>




<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="ajoutequipe.css" >
    
    <title>Ajouter un Projet</title>
  </head>
  <body>
    <div class="container">
      <h1>Ajouter un Projet</h1>
      
      <div class="form">
      <form method="post">
        <label for="code"> Code:</label>
        <input type="text" id="code" name="code" class="form-control" placeholder="Entrer le code">
        <?php if (isset($errors['code'])): ?>
                  <span class="error"><?php echo $errors['code']; ?></span>
                <?php endif; ?>
              </div>
                <div class="form">
        <label for="type"> Type:</label>
        <input type="text" id="type" name="type" class="form-control" placeholder="Entrer le type">
        <?php if (isset($errors['type'])): ?>
                  <span class="error"><?php echo $errors['type']; ?></span>
                <?php endif; ?>
        </div>
        
                <div class="form">
        <label for="chef"> Chef Projet:</label>
        <input type="text" id="chef" name="chef" class="form-control" placeholder="Entrer le chef de projet">
        <?php if (isset($errors['chef'])): ?>
                  <span class="error"><?php echo $errors['chef']; ?></span>
                <?php endif; ?>
              </div>
        
                <div class="form">       
        <label for="dated">Date de debut </label>
        <input type="date"  placeholder="entrer votre date" name="dated" class="form-control"><br>
        <?php if (isset($errors['dated'])): ?>
                  <span class="error"><?php echo $errors['dated']; ?></span>
                <?php endif; ?> </div> 
    
        <div class="form">
        <label for="dates">Date de fin </label>
        <input type="date"  placeholder="entrer votre date" name="datef" class="form-control"><br>
         </div>       
        
        

        <br> <div class="form"><button type="submit" name="sub">Suivant</button></div>
      </form>
    </div>
  </body>
</html>