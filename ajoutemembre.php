<?php
include 'conn.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

if(isset($_POST['sub'])){
    $nom1 = $_POST['nom1'];
    $nom2 = $_POST['nom2'];
    $prenom1 = $_POST['prenom1'];
    $prenom2 = $_POST['prenom2'];
    $errors = [];

    // Vérifier si tous les champs sont vides
    if (empty($nom1) && empty($nom2) && empty($prenom1) && empty($prenom2)) {
        $errors[] = "Veuillez saisir au moins un membre (nom et prénom).";
    }

    // Vérifier si nom1 est rempli et prenom1 est vide
    if (!empty($nom1) && empty($prenom1)) {
        $errors[] = "Veuillez saisir le prénom du membre 1.";
    }

    // Vérifier si prenom1 est rempli et nom1 est vide
    if (!empty($prenom1) && empty($nom1)) {
        $errors[] = "Veuillez saisir le nom du membre 1.";
    }

    // Vérifier si nom2 est rempli et prenom2 est vide
    if (!empty($nom2) && empty($prenom2)) {
        $errors[] = "Veuillez saisir le prénom du membre 2.";
    }

    // Vérifier si prenom2 est rempli et nom2 est vide
    if (!empty($prenom2) && empty($nom2)) {
        $errors[] = "Veuillez saisir le nom du membre 2.";
    }

    // Si au moins un nom et prénom sont saisis, effectuer les insertions dans la base de données
    if (empty($errors)) {
        if (!empty($nom1) && !empty($prenom1)) {
            $sql1 = "INSERT INTO mombre (projet_id, nom, prenom) VALUES ('$id','$nom1','$prenom1')";
            $rst1 = mysqli_query($con, $sql1);
        }

        if (!empty($nom2) && !empty($prenom2)) {
            $sql2 = "INSERT INTO mombre (projet_id, nom, prenom) VALUES ('$id','$nom2','$prenom2')";
            $rst2 = mysqli_query($con, $sql2);
        }

        header("location: affthese.php");
        exit; // Ajout de l'instruction exit pour arrêter l'exécution du script après la redirection
    }
}
?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="ajoutequipe.css" >
    
    <title>Ajouter membres du projet</title>
  </head>
  <body>
    <div class="container">
      <h1>Ajouter membres du projet </h1>
      <form method="post">
       
      <div class="form"> 
        <label for="nom1"> Nom membre 1:</label>
        <input type="text" id="nom1" name="nom1" class="form-control" placeholder="Entrer le nom du membre 1">
      </div>
        <div class="form">
        <label for="prenom1"> Prenom membre 1:</label>
        <input type="text" id="prenom1" name="prenom1" class="form-control" placeholder="Entrer le prenom du membre 1">
        </div>  
        <div class="form"> 
        <label for="nom2"> Nom membre 2:</label>
        <input type="text" id="nom2" name="nom2" class="form-control" placeholder="Entrer le nom du membre 2" >
        </div>
        <div class="form"> 
        <label for="prenom2"> Prenom membre 2:</label>
        <input type="text" id="prenom2" name="prenom2" class="form-control" placeholder="Entrer le prenom du membre 2"> 
        </div>
        <br>
        <?php
        if(!empty($errors)){
            foreach($errors as $error){
                echo "<p style='color: red;'>".$error."</p>";
            }
        }
        ?>
        
        <br>
        <button type="submit" name="sub">Ajouter</button>
      </form>
    </div>
  </body>
</html>