<?php
include 'conn.php';
if(isset($_POST['sub'])){
    
    $numero = filter_var($_POST["numero"],FILTER_SANITIZE_NUMBER_INT);
    $intitule = filter_var($_POST["intitule"],FILTER_SANITIZE_STRING);
    $chef = filter_var($_POST["chef"],FILTER_SANITIZE_STRING);
    $description = filter_var($_POST["description"],FILTER_SANITIZE_STRING);
    $adeq=filter_var($_POST["adequation"],FILTER_SANITIZE_STRING);
    $environement=filter_var($_POST["environnement"],FILTER_SANITIZE_STRING);
    $traveau=filter_var($_POST["traveaux"],FILTER_SANITIZE_STRING);
    $acronyme=filter_var($_POST['acronyme'],FILTER_SANITIZE_STRING);
    $errors=[];


$sql = "INSERT INTO equipe (numero, intitule_DEquipe, acronyme_DEquipe, chef_DEquipe, description_scientifique,adequation,environnement_et_contraint,traveaux_en_cours)
        VALUES ('$numero', '$intitule','$acronyme', '$chef', '$description','$adeq','$environement','$traveau')";


$rr=mysqli_query($con, $sql);
if($rr){
  header('location:affequipe.php');
}else{
  echo "Une erreur s'est produite lors de l'ajoute d'equipe.";
}
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
}







}


?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="ajoutequipe.css" >
    
    <title>Ajouter une équipe</title>
  </head>
  <body>
    <div class="container">
      <h1>Ajouter une équipe</h1>
      <form method="post">
        <label for="numero">Numéro :</label>
        <input type="text" id="numero" name="numero">

        <label for="intitule">Intitulé de l'équipe :</label>
        <input type="text" id="intitule" name="intitule">

        <label for="chef">Chef de l'équipe :</label>
        <input type="text" id="chef" name="chef">

        <label for="acronyme">Acronyme de l'équipe :</label>
        <input type="text" name="acronyme"> 

        <label for="description">Description scientifique :</label>
        <textarea id="description" name="description"></textarea>

        <label for="adequation">Adéquation entre le programme initial de l'équipe et les résultats obtenus :</label>
        <textarea id="adequation" name="adequation"></textarea>

        <label for="environnement">Environnement et contraintes :</label>
        <textarea id="environnement" name="environnement"></textarea>

        <label for="traveaux">Travaux en cours :</label>
        <textarea id="traveaux" name="traveaux"></textarea>

        <button type="submit" name="sub">Ajouter</button>
      </form>
    </div>
  </body>
</html>