<?php
include 'conn.php';

if (isset($_POST['sub'])) {
  $nomEt = filter_var($_POST['netudiant'], FILTER_SANITIZE_STRING);
  $nomEn = filter_var($_POST['nencadreur'], FILTER_SANITIZE_STRING);
  $prenomEt = filter_var($_POST['petudiant'], FILTER_SANITIZE_STRING);
  $prenomEn = filter_var($_POST['pencadreur'], FILTER_SANITIZE_STRING);
  $theme = filter_var($_POST['theme'], FILTER_SANITIZE_STRING);
  $resume = filter_var($_POST['resume'], FILTER_SANITIZE_STRING);
  $dates = $_POST['dates'];
  $errors = [];

  if (empty($nomEt)) {
      $errors['nom'] = "Veuillez entrer le nom d'étudiant";
  }
  if (empty($prenomEt)) {
      $errors['prenom'] = "Veuillez entrer le prénom d'étudiant";
  }
  if (empty($nomEn)) {
    $errors['nomm'] = "Veuillez entrer le nom de l'encadreur";
}
if (empty($prenomEn)) {
    $errors['prenomm'] = "Veuillez entrer le prénom de l'encadreur";
}
if (empty($theme)) {
    $errors['theme'] = "Veuillez entrer le thème";
}
if (empty($resume)) {
    $errors['resume'] = "Veuillez entrer le résumé";
}
if(empty($dates)){
  $errors['date']="Veuillez entrer le date de soutenance ";
}

  if (empty($errors)) {
      $sql1 = "INSERT INTO etudiant (nom, prenom) VALUES ('$nomEt', '$prenomEt')";
      $result1 = mysqli_query($con, $sql1);

      if ($result1) {
          $etudId = mysqli_insert_id($con);

          if (empty($nomEn)) {
              $errors['nomm'] = "Veuillez entrer le nom de l'encadreur";
          }
          if (empty($prenomEn)) {
              $errors['prenomm'] = "Veuillez entrer le prénom de l'encadreur";
          }
          if (empty($theme)) {
              $errors['theme'] = "Veuillez entrer le thème";
          }
          if (empty($resume)) {
              $errors['resume'] = "Veuillez entrer le résumé";
          }
          if(empty($dates)){
            $errors['date']="Veuillez entrer le date de soutenance ";
          }

          if (empty($errors)) {
              $sql2 = "INSERT INTO encadreur (nom, prenom) VALUES ('$nomEn', '$prenomEn')";
              $result2 = mysqli_query($con, $sql2);

              if ($result2) {
                  $encadId = mysqli_insert_id($con);

                  if (empty($nomEn)) {
                    $errors['nomm'] = "Veuillez entrer le nom de l'encadreur";
                   }
                if (empty($prenomEn)) {
                    $errors['prenomm'] = "Veuillez entrer le prénom de l'encadreur";
                  }
                 
                  if (empty($nomEt)) {
                    $errors['nom'] = "Veuillez entrer le nom d'étudiant";
                }
                if (empty($prenomEt)) {
                    $errors['prenom'] = "Veuillez entrer le prénom d'étudiant";
                }
                 
                  if (empty($theme)) {
                      $errors['theme'] = "Veuillez entrer le thème";
                  }
                  if (empty($resume)) {
                      $errors['resume'] = "Veuillez entrer le résumé";
                  }
                  if(empty($dates)){
                    $errors['date']="Veuillez entrer le date de soutenance ";
                  }

                  if (empty($errors)) {
                      $sql3 = "INSERT INTO these (etudiant_id, encadreur_id, theme, resume, date_soutenance) VALUES ('$etudId', '$encadId', '$theme', '$resume', '$dates')";
                      $result3 = mysqli_query($con, $sql3);

                      if ($result3) {
                          $theseId = mysqli_insert_id($con);

                          $sql4 = "INSERT INTO these_etudiant_encadreur (these_id, etudiant_id, encadreur_id) VALUES ('$theseId', '$etudId', '$encadId')";
                          $result4 = mysqli_query($con, $sql4);

                          if ($result4) {
                              // Succès : la thèse a été ajoutée avec succès à la base de données
                              echo "La thèse a été ajoutée avec succès.";
                              header("location: affthese.php");
                          } else {
                              // Erreur lors de l'insertion de l'association entre la thèse, l'étudiant et l'encadreur
                              echo "Erreur lors de l'ajout de l'association entre la thèse, l'étudiant et l'encadreur : " . mysqli_error($con);
                          }
                      } else {
                          // Erreur lors de l'insertion de la thèse
                          echo "Erreur lors de l'ajout de la thèse : " . mysqli_error($con);
                      }
                  }
              } else {
                  // Erreur lors de l'insertion de l'encadreur
                  echo "Erreur lors de l'ajout de l'encadreur : " . mysqli_error($con);
              }
          }
      } else {
          // Erreur lors de l'insertion de l'étudiant
          echo "Erreur lors de l'ajout de l'étudiant : " . mysqli_error($con);
      }
  }
}

mysqli_close($con);
?>




<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="ajoutequipe.css" >
    
    <title>Ajouter une These</title>
  </head>
  <body>
    <div class="container">
      <h1>Ajouter une These</h1>
      
      <div class="form">
      <form method="post">
        <label for="netudiant"> Nom de l'Etudiant:</label>
        <input type="text" id="netudiant" name="netudiant" class="form-control" placeholder="Entrer le nom d'etuidant">
        <?php if (isset($errors['nom'])): ?>
                  <span class="error"><?php echo $errors['nom']; ?></span>
                <?php endif; ?>
        </div>
       
        <div class="form">
        <label for="petudiant"> Prenom de l'Etudiant:</label>
        <input type="text" id="petudiant" name="petudiant" class="form-control" placeholder="Entrer le prenom d'etuidant">
        <?php if (isset($errors['prenom'])): ?>
                  <span class="error"><?php echo $errors['prenom']; ?></span>
                <?php endif; ?>
        </div>
       
        <div class="form">
        <label for="nencadreur"> Nom de l'Encadreur:</label>
        <input type="text" id="nencadreur" name="nencadreur" class="form-control" placeholder="Entrer le nom d'encadreur">
        <?php if (isset($errors['nomm'])): ?>
                  <span class="error"><?php echo $errors['nomm']; ?></span>
                <?php endif; ?>
       </div> 
       
        <div class="form">
        <label for="pencadreur"> Prenom de l'Encadreur:</label>
        <input type="text" id="pencadreur" name="pencadreur"class="form-control" placeholder="Entrer le prenom d'encadreur" >
        <?php if (isset($errors['prenomm'])): ?>
                  <span class="error"><?php echo $errors['prenomm']; ?></span>
                <?php endif; ?>
        </div>
        
        <div class="form">
        <label for="theme">Theme:</label>
        <textarea id="theme" name="theme" class="form-control" placeholder=""></textarea>
        <?php if (isset($errors['theme'])): ?>
                  <span class="error"><?php echo $errors['theme']; ?></span>
                <?php endif; ?>
        </div>

        <div class="form">
        <label for="resume">Resume:</label>
        <textarea id="resume" name="resume" class="form-control" placeholder="" ></textarea>
        <?php if (isset($errors['resume'])): ?>
                  <span class="error"><?php echo $errors['resume']; ?></span>
                <?php endif; ?>
        </div>
        <div class="form">
        <label for="dates">Date de soutenance:</label>
        <input type="date"  placeholder="entrer votre date" name="dates" class="form-control" placeholder="">
        <?php if (isset($errors['date'])): ?>
                  <span class="error"><?php echo $errors['date']; ?></span>
                <?php endif; ?>
        <br>
         </div>       
        
        

        <br><button type="submit" name="sub">Ajouter</button>
        
        
        
      </form>
    </div>
  </body>
</html>