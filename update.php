<?php
include 'conn.php';
$id=$_GET['update'];
$numEquipe=$_GET['numEquipe'];
$sqll="Select * from `chercheur` where id=$id ";
$resultt=mysqli_query($con,$sqll);
$row=mysqli_fetch_assoc($resultt);
$id=$row['id'];
$numEquipee=$row['num_dEquipe'];
$namee=$row['nom'];
$lastnamee=$row['prenom'];
$datenaisse=$row['date_de_naissance'];
$sexx=$row['sex'];
$epousedee=$row['epouse_de'];
$lastdiplomee=$row['dernier_diplome'];
$diplomeyearr=$row['an_obt_diplome'];
$gradee=$row['grade'];
$gradeyearr=$row['an_obt_grade'];
$statuss=$row['statut'];
$domainee=$row['domaine_principal'];
$structuree=$row['Structure_de_rattachement'];
$emaill=$row['email'];
$mmz="Select * from `equipe` where numero=$numEquipee";
$mmzz=mysqli_query($con,$mmz);
$rowmmz=mysqli_fetch_assoc($mmzz);
$nmmE=$rowmmz['intitule_DEquipe'];


if (isset($_POST['submit'])) {
  $numequipe = filter_var($_POST['equipe'], FILTER_SANITIZE_NUMBER_INT);
  $nom = filter_var($_POST['nom'], FILTER_SANITIZE_STRING);
  $prenom = filter_var($_POST['prenom'], FILTER_SANITIZE_STRING);
  $datedenaiss = $_POST['datenaiss'];
  $sex = isset($_POST['gender']) ? filter_var($_POST['gender'], FILTER_SANITIZE_STRING) : '';

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
  $errors = array();
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
    $errors['emailval'] = "Email non valide";
  }
  
  if (empty($errors)) {
    $sql = "UPDATE `chercheur` SET num_dEquipe='$numequipe', nom='$nom', prenom='$prenom', date_de_naissance='$datedenaiss', sex='$sex', epouse_de='$epouse', dernier_diplome='$diplome', an_obt_diplome='$datediplome', grade='$grade', an_obt_grade='$dategrade', statut='$statut', domaine_principal='$domaine', Structure_de_rattachement='$structure', email='$email' WHERE id=$id";

    $rss = mysqli_query($con, $sql);
    if ($rss) {
      header("location:affihchage.php?numEquipe=$numEquipe");
    } else {
      die(mysqli_error($con));
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
                <input type="Text" class="form-control" placeholder="Entrer votre nom" name=" nom" value=<?php  echo $namee;      ?> >
                <?php if (isset($errors['nom'])): ?>
                  <span class="error"><?php echo $errors['nom']; ?></span>
                <?php endif; ?> </div>
                
                
                <div class="form">
                <label >Prènom</label>
                <input type="Text" class="form-control" placeholder="Entrer votre prenom" name="prenom" value=<?php  echo $lastnamee;      ?>>
                <?php if (isset($errors['prenom'])): ?>
                  <span class="error"><?php echo $errors['prenom']; ?></span>
                <?php endif; ?>
                </div>
                
                <div class="form">
                <label >Date de naissance</label>
                <input type="date" class="form-control" placeholder="Entrer votre date naissance" name="datenaiss" value=<?php  echo $datenaisse;      ?>>
                <?php if (isset($errors['date'])): ?>
                  <span class="error"><?php echo $errors['date']; ?></span>
                <?php endif; ?>
                </div>
                
                <div class="form">
                <label >Epouse de </label>
                <input type="Text" class="form-control" placeholder="Epouse de" name="epouse" value=<?php  echo $epousedee;      ?>>
                <?php if (isset($errors['epouse'])): ?>
                  <span class="error"><?php echo $errors['epouse']; ?></span>
                <?php endif; ?>
                </div>
                
                <div class="form">
                <label >Dernier diplome</label>
                <input type="Text" class="form-control" placeholder="Entrer votre dernier diplome" name="diplome" value=<?php  echo $lastdiplomee;      ?>>
                <?php if (isset($errors['diplome'])): ?>
                  <span class="error"><?php echo $errors['diplome']; ?></span>
                <?php endif; ?>
                </div>
                
                <div class="form">
                <label>Annèe d'obtiention Diplome</label>
                <select name="anndiplome"  >
                <?php
                $annee_actuelle = date("Y");
                for ($i = 1900; $i <= $annee_actuelle; $i++) {
                  $selected = ($i == $diplomeyearr) ? "selected" : "";
                  echo "<option value='$i' $selected> $i </option>";
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
                <?php
                
                $annee_actuelle = date("Y");
                for ($i = 1900; $i <= $annee_actuelle; $i++) {
                  $selected = ($i == $gradeyearr) ? "selected" : "";
                  echo "<option value='$i' $selected> $i </option>";
                }
                ?>
              </select>
              <?php if (isset($errors['dateg'])): ?>
              <span class="error"><?php echo $errors['dateg']; ?></span>
              <?php endif; ?>
             </div>
                
                <div class="form">
                <label >Domaine principale</label>
                <input type="Text" class="form-control" placeholder="entrer votre domaine" name="domaine" value=<?php echo $domainee;         ?>>
                <?php if (isset($errors['domaine'])): ?>
                  <span class="error"><?php echo $errors['domaine']; ?></span>
                <?php endif; ?>
                </div>

                <div class="form">
                <label >structure de rattachement</label>
                <input type="Text" class="form-control" placeholder="entre " name="structure" value=<?php echo $structuree;         ?>>
                <?php if (isset($errors['str'])): ?>
                  <span class="error"><?php echo $errors['str']; ?></span>
                <?php endif; ?>
                </div>

                <div class="form">
                <label >email</label>
                <input type="email"  class="form-control" placeholder="entrer votre email" name="email" value=<?php echo $emaill;         ?>>
                <?php if (isset($errors['email'])): ?>
                  <span class="error"><?php echo $errors['email']; ?></span>
                <?php endif; ?>
                </div>
                
                

              <div class="form">
              <label for="">Grade</label>
                <select name="gradee" >
                  <option value="<?php echo $gradee?>"><?php echo $gradee?></option>
                  <option value="Pr">Pr</option>
                  <option value="MCB">MCB</option>
                  <option value="MAA">MAA</option>
                  <option value="MAB,D">MAB,D</option>
                  <option value="MCA">MCA</option>
                  </select>
                  <?php if (isset($errors['gr'])): ?>
                    <span class="error"><?php echo $errors['gr']; ?></span>
                  <?php endif; ?>
                </div>  
               
              
             
              <div>
              <label for="">Statut</label>
                <select name ="statute">
                <option value="<?php echo $statuss?>"><?php echo $statuss?></option> 
                <option value=" P Et"> P Et </option>
                <option value=" P H.E"> P H.E</option>
                </select>
                <?php if (isset($errors['stat'])): ?>
                  <span class="error"><?php echo $errors['stat']; ?></span>
                <?php endif; ?>
              </div>
                
              <div class="form">
                  <label>Sex</label>
                  <input type="radio" name="gender" value="Mr" <?php if ($sexx === 'Mr') echo 'checked'; ?>>Mr
                  <input type="radio" name="gender" value="Mme" <?php if ($sexx === 'Mme') echo 'checked'; ?>>Mme
                  <input type="radio" name="gender" value="Melle" <?php if ($sexx === 'Melle') echo 'checked'; ?>>Melle
                  <?php if (isset($errors['sex'])): ?>
                  <span class="error"><?php echo $errors['sex']; ?></span>
                <?php endif; ?>
                </div>

               <div class="form"> 
                <label>Les équipes</label>
                <select name="equipe" id="equipe">
                <option value="<?php echo $numEquipee;         ?>"><?php echo $nmmE;         ?></option>
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
                </select>
                <?php if (isset($errors['eqp'])): ?>
                  <span class="error"><?php echo $errors['eqp']; ?></span>
                <?php endif; ?>
                </div>
               

                

                


                <button type="submit" class="btnsub" name="submit">Modifier</button>
                
        
        </form>
    </div>

    
  </body>
</html>