<?php
include 'conn.php';
$errors = [];

if (isset($_POST['submit'])) {
  $numequipe = filter_var($_POST['equipe'], FILTER_SANITIZE_NUMBER_INT);
  $nom = filter_var($_POST['nom'], FILTER_SANITIZE_STRING);
  $prenom = filter_var($_POST['prenom'], FILTER_SANITIZE_STRING);
  $datedenaiss = $_POST['datenaiss'];
  $sex = isset($_POST['gender']) ? filter_var($_POST['gender']) : '';

  $epouse = filter_var($_POST['epouse'], FILTER_SANITIZE_STRING);
  $diplome = filter_var($_POST['diplome'], FILTER_SANITIZE_STRING);
  $datediplome = $_POST['anndiplome'];
  $grade = filter_var($_POST['gradee'], FILTER_SANITIZE_STRING);
  $dategrade = $_POST['anngrade'];
  $statut = filter_var($_POST['statute'], FILTER_SANITIZE_STRING);
  $domaine = filter_var($_POST['domaine'], FILTER_SANITIZE_STRING);
  $structure = filter_var($_POST['structure'], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  
  // Validation des champs requis
  if (empty($prenom)) {
    $errors['prenom'] = "Veuillez entrer le prénom";
  }
  if (empty($nom)) {
    $errors['nom'] = "Veuillez entrer le nom de famille";
  }
  if (empty($datedenaiss)) {
    $errors['date'] = "Veuillez entrer votre date de naissance";
  }
  if (empty($diplome)) {
    $errors['diplome'] = "Veuillez entrer votre diplôme";
  }
  if (empty($epouse)) {
    $errors['epouse'] = "Veuillez entrer votre épouse";
  }
  if (empty($datediplome)) {
    $errors['dated'] = "Veuillez entrer votre date d'obtention de diplôme";
  }
  if (empty($dategrade)) {
    $errors['dateg'] = "Veuillez entrer votre date d'obtention de grade";
  }
  if (empty($domaine)) {
    $errors['domaine'] = "Veuillez entrer votre domaine";
  }
  if (empty($structure)) {
    $errors['str'] = "Veuillez entrer votre structure de rattachement";
  }
  if (empty($email)) {
    $errors['email'] = "Veuillez entrer votre adresse email";
  }
  if (empty($sex)) {
    $errors['sex'] = "Veuillez sélectionner votre sexe";
  }
  if (empty($grade)) {
    $errors['gr'] = "Veuillez entrer votre grade";
  }
  if (empty($statut)) {
    $errors['stat'] = "Veuillez entrer votre statut";
  }
  if (empty($numequipe)) {
    $errors['eqp'] = "Veuillez entrer votre équipe";
  }

  // Validation de l'email
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email2'] = "Email non valide";
  }

  // Vérification des erreurs
  if (!empty($errors)) {
    foreach ($errors as $msg) {
      
    }
  } else {
    // Insertion des données dans la base de données
    $sql = "INSERT INTO `chercheur` (num_dEquipe, nom, prenom, date_de_naissance, sex, epouse_de, dernier_diplome, an_obt_diplome, grade, an_obt_grade, statut, domaine_principal, Structure_de_rattachement, email)
    VALUES ('$numequipe', '$nom', '$prenom', '$datedenaiss', '$sex', '$epouse', '$diplome', '$datediplome', '$grade', '$dategrade', '$statut', '$domaine', '$structure', '$email')";
  
    $rsse = mysqli_query($con, $sql);
    if ($rsse) {
      header('location: affequipe.php');
      exit;
    } else {
      echo "Une erreur s'est produite lors de l'ajout";
    }
  }
}
?>

<!doctype html>
<html>
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <link rel="stylesheet" href="ajouter.css" >

    <title>ajoutez</title>
  </head>
  <body>
    <div class="container">
        <form method="post">
               
                <div class="form">
                <label >Nom</label>
                <input type="Text" class="form-control" placeholder="Entrer votre nom" name=" nom" >
                <?php if (isset($errors['nom'])): ?>
                  <span class="error"><?php echo $errors['nom']; ?></span>
                <?php endif; ?>
              </div>
                
                
                <div class="form">
                <label >Prènom</label>
                <input type="Text" class="form-control" placeholder="Entrer votre prenom" name="prenom">
                <?php if (isset($errors['prenom'])): ?>
                  <span class="error"><?php echo $errors['prenom']; ?></span>
                <?php endif; ?>
                </div>
                
                <div class="form">
                <label >Date de Naissance</label>
                <input type="date" class="form-control" placeholder="Entrer votre date naissance" name="datenaiss">
                <?php if (isset($errors['date'])): ?>
                  <span class="error"><?php echo $errors['date']; ?></span>
                <?php endif; ?>
                
                </div>
                
                <div class="form">
                <label >Epouse de </label>
                <input type="Text" class="form-control" placeholder="Epouse de" name="epouse">
                <?php if (isset($errors['epouse'])): ?>
                  <span class="error"><?php echo $errors['epouse']; ?></span>
                <?php endif; ?>
                
                </div>
                
                <div class="form">
                <label >Dernier Diplome</label>
                <input type="Text" class="form-control" placeholder="Entrer votre dernier diplome" name="diplome">
                <?php if (isset($errors['diplome'])): ?>
                  <span class="error"><?php echo $errors['diplome']; ?></span>
                <?php endif; ?>
                
                </div>
                
                <div class="form">
                  <label>Annèe d'obtiention Diplome</label>
                  <select name="anndiplome">
                    <option value="">Annèe</option>
                    

                  <?php
                  $annee_actuelle = date("Y");
                  for ($i = 1900; $i <= $annee_actuelle; $i++) {
                    echo "<option value='$i'>$i</option>";
                  }
                  ?>
                  </select>
                  <?php if (isset($errors['dated'])): ?>
                    <span class="error"><?php echo $errors['dated']; ?></span>
                  <?php endif; ?>
                </div>

                
                <div class="form">
                  <label for="">Annèe d'obtiention de Grade </label>
                  <select name="anngrade">
                  <option value="">Annèe</option>
                  <?php
                
                  for ($i = 1900; $i <= $annee_actuelle; $i++) {
                    echo "<option value='$i'>$i</option>";
                  }
                
                  ?>
                </select>
                <?php if (isset($errors['dateg'])): ?>
                  <span class="error"><?php echo $errors['dateg']; ?></span>
                  <?php endif; ?>
                </div>
                
                <div class="form">
                <label >Domaine principale</label>
                <input type="Text" class="form-control" placeholder="Entrer votre domaine" name="domaine">
                <?php if (isset($errors['domaine'])): ?>
                  <span class="error"><?php echo $errors['domaine']; ?></span>
                <?php endif; ?>
                
                </div>

                <div class="form">
                <label >Structure de rattachement</label>
                <input type="Text" class="form-control" placeholder="Entrer votre structure " name="structure">
                <?php if (isset($errors['str'])): ?>
                  <span class="error"><?php echo $errors['str']; ?></span>
                <?php endif; ?>
                
                </div>

                <div class="form">
                <label >Email</label>
                <input type="email"  class="form-control" placeholder="entrer votre email" name="email">
                <?php if (isset($errors['email'])): ?>
                  <span class="error"><?php echo $errors['email']; ?></span>
                  
                <?php endif; ?>
                
                </div>
                
                

              <div class='form'>
                <label for="">Grade</label>
                <select name="gradee" >
                  <option value=""> Selectionner le Grade </option>
                  <option value="Pr">Pr</option>
                  <option value="Mcb">MCB</option>
                  <option value="MAA">MAA</option>
                  <option value="MAB,D">MAB,D</option>
                  <option value="MCA">MCA</option>
                
                
                </select>
                  <?php if (isset($errors['gr'])): ?>
                    <span class="error"><?php echo $errors['gr']; ?></span>
                  <?php endif; ?>
                </div>
                <div class="form">
                  <label for="">Statut</label>
                <select name ="statute">
                <option value=""> Selectionner statut </option>
                <option value=" P Et"> P Et </option>
                <option value=" P H.E"> P H.E</option>
             
                </select>
                <?php if (isset($errors['stat'])): ?>
                  <span class="error"><?php echo $errors['stat']; ?></span>
                <?php endif; ?>   
                </div>
                
                <div class="form">
                <label >Sex</label>
                <input type="radio" name="gender" value="Mr">Mr
                <input type="radio" name="gender" value="Mme">Mme
                <input type="radio" name="gender" value="Melle">Melle 
                <?php if (isset($errors['sex'])): ?>
                  <span class="error"><?php echo $errors['sex']; ?></span>
                <?php endif; ?>
                </div>
                
                
                <div class="form">
                  <label>Les équipes</label>
                  <select name="equipe" id="equipe">
                  <option value="">Sélectionnez une équipe</option>
                  <?php
                    include 'conn.php';
                    $equipe = "SELECT * FROM equipe";
                    $listequipe = mysqli_query($con, $equipe);
                    if (!$listequipe) {
                        echo "Erreur : " . mysqli_error($con);
                    } else {
                        while ($enr = mysqli_fetch_array($listequipe)) {
                            echo '<option value="' . $enr['numero'] . '">' . $enr['intitule_DEquipe'] . '</option>';
                        }
                    }
                    mysqli_close($con);
                    ?>
                    <?php if (isset($errors['eqp'])): ?>
                    <span class="error"><?php echo $errors['eqp']; ?></span>
                  <?php endif; ?>
                  
                  </select>
                  <?php if (isset($errors['eqp'])): ?>
                    <span class="error"><?php echo $errors['eqp']; ?></span>
                  <?php endif; ?>
                </div>

                

                


                <div class="form">
                <button type="submit" class="btnsub" name="submit">ajoutez</button>
                </div>
        
        </form>
    </div>

    
  </body>
</html>