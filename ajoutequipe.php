<?php
include 'conn.php';

$errors = [];

if(isset($_POST['sub'])){
    
    $numero = filter_var($_POST["numero"], FILTER_SANITIZE_NUMBER_INT);
    $intitule = filter_var($_POST["intitule"], FILTER_SANITIZE_STRING);
    $chef = filter_var($_POST["chef"], FILTER_SANITIZE_STRING);
    $description = filter_var($_POST["description"], FILTER_SANITIZE_STRING);
    $adeq = filter_var($_POST["adequation"], FILTER_SANITIZE_STRING);
    $environnement = filter_var($_POST["environnement"], FILTER_SANITIZE_STRING);
    $traveau = filter_var($_POST["traveaux"], FILTER_SANITIZE_STRING);
    $acronyme = filter_var($_POST['acronyme'], FILTER_SANITIZE_STRING);

    if(empty($numero)){
        $errors['numero'] = "Veuillez entrer le numéro d'équipe";
    } else {
      // Vérifier si le numéro d'équipe existe déjà
      $query = "SELECT * FROM equipe WHERE numero = '$numero'";
      $result = mysqli_query($con, $query);
      if(mysqli_num_rows($result) > 0){
          $errors['numero'] = "Ce numéro d'équipe existe déjà. Veuillez en choisir un autre.";
      }
    }
    if(empty($intitule)){
        $errors['intitule'] = "Veuillez entrer l'intitulé d'équipe";
    }
    if(empty($acronyme)){
        $errors['acronyme'] = "Veuillez entrer l'acronyme d'équipe";
    }
    if(empty($environnement)){
      $errors['ev']="veuillez entre l'environement et les contrainte de l'equipe";
    }
    if(empty($chef)){
        $errors['chef'] = "Veuillez entrer le chef d'équipe";
    }
    if(empty($description)){
        $errors['description'] = "Veuillez entrer la description";
    }
    if(empty($adeq)){
        $errors['adequation'] = "Veuillez entrer l'adéquation";
    }
    if(empty($traveau)){
        $errors['traveaux'] = "Veuillez entrer les travaux d'équipe";
    }

    if(empty($errors)){
        $sql = "INSERT INTO equipe (numero, intitule_DEquipe, acronyme_DEquipe, chef_DEquipe, description_scientifique, adequation, environnement_et_contraint, traveaux_en_cours)
            VALUES ('$numero', '$intitule', '$acronyme', '$chef', '$description', '$adeq', '$environnement', '$traveau')";

        $rr = mysqli_query($con, $sql);
        if($rr){
            header('location: affequipe.php');
            exit;
        }else{
            echo "Une erreur s'est produite lors de l'ajout de l'équipe.";
        }
    }
}
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="ajoutequipe.css">
    <title>Ajouter une équipe</title>
</head>
<body>
    <div class="container">
        <h1>Ajouter une équipe</h1>
        <form method="post">
            <div class="form">
                <label for="numero">Numéro :</label>
                <input type="text" id="numero" name="numero" class="form-control" placeholder="Entrer le numéro d'équipe que vous souhaitez">
                <?php if(isset($errors['numero'])): ?>
                    <span class="error"><?php echo $errors['numero']; ?></span>
                <?php endif; ?>
            </div>
            <div class="form">
                <label for="intitule">Intitulé de l'équipe :</label>
                <input type="text" id="intitule" name="intitule" class="form-control" placeholder="Entrer l'intitulé d'équipe">
                <?php if(isset($errors['intitule'])): ?>
                    <span class="error"><?php echo $errors['intitule']; ?></span>
                <?php endif; ?>
            </div>
            <div class="form">
                <label for="chef">Chef de l'équipe :</label>
                <input type="text" id="chef" name="chef" class="form-control" placeholder="Entrer le chef d'équipe">
                <?php if(isset($errors['chef'])): ?>
                    <span class="error"><?php echo $errors['chef']; ?></span>
                <?php endif; ?>
            </div>
            <div class="form">
                <label for="acronyme">Acronyme de l'équipe :</label>
                <input type="text" id="acronyme" name="acronyme" class="form-control" placeholder="Entrer l'acronyme d'équipe">
                <?php if(isset($errors['acronyme'])): ?>
                    <span class="error"><?php echo $errors['acronyme']; ?></span>
                <?php endif; ?>
            </div>
            <div class="form">
                <label for="description">Description scientifique :</label>
                <textarea id="description" name="description" class="form-control" placeholder="Entrer la description scientifique"></textarea>
                <?php if(isset($errors['description'])): ?>
                    <span class="error"><?php echo $errors['description']; ?></span>
                <?php endif; ?>
            </div>
            <div class="form">
                <label for="adequation">Adéquation :</label>
                <textarea id="adequation" name="adequation" class="form-control" placeholder="Adéquation entre le programme initial de l'équipe et les résultats"></textarea>
                <?php if(isset($errors['adequation'])): ?>
                    <span class="error"><?php echo $errors['adequation']; ?></span>
                <?php endif; ?>
            </div>
            <div class="form">
                <label for="environnement">Environnement et contraintes :</label>
                <textarea id="environnement" name="environnement" class="form-control" placeholder="Entrer l'environnement et les contraintes"></textarea>
                <?php if(isset($errors['ev'])): ?>
                    <span class="error"><?php echo $errors['ev']; ?></span>
                <?php endif; ?>
            </div>
            <div class="form">
                <label for="traveaux">Travaux en cours :</label>
                <textarea id="traveaux" name="traveaux" class="form-control" placeholder="Entrer les travaux en cours"></textarea>
                <?php if(isset($errors['traveaux'])): ?>
                    <span class="error"><?php echo $errors['traveaux']; ?></span>
                <?php endif; ?>
            </div>
            <div class="form">
                <button type="submit" name="sub" class="form-control">Ajouter</button>
            </div>
        </form>
    </div>
</body>
</html>
