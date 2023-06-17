<?php
include 'conn.php';

if (isset($_POST['sub'])) {
    // Récupérer les valeurs du formulaire
    $theseId = $_POST['these'];
    $nomEtudiant = filter_var($_POST['netudiant'], FILTER_SANITIZE_STRING);
    $prenomEtudiant = filter_var($_POST['petudiant'], FILTER_SANITIZE_STRING);
    $nomEncadreur = filter_var($_POST['nencadreur'], FILTER_SANITIZE_STRING);
    $prenomEncadreur = filter_var($_POST['pencadreur'], FILTER_SANITIZE_STRING);

    // Insertion de l'étudiant
    $sqlInsertEtudiant = "INSERT INTO etudiant (nom, prenom) VALUES ('$nomEtudiant', '$prenomEtudiant')";
    $resultInsertEtudiant = mysqli_query($con, $sqlInsertEtudiant);

    if ($resultInsertEtudiant) {
        $etudiantId = mysqli_insert_id($con); // Récupération de l'ID de l'étudiant nouvellement inséré

        // Insertion de l'encadreur
        $sqlInsertEncadreur = "INSERT INTO encadreur (nom, prenom) VALUES ('$nomEncadreur', '$prenomEncadreur')";
        $resultInsertEncadreur = mysqli_query($con, $sqlInsertEncadreur);

        if ($resultInsertEncadreur) {
            $encadreurId = mysqli_insert_id($con); // Récupération de l'ID de l'encadreur nouvellement inséré

            // Insertion de l'association entre l'étudiant, la thèse et l'encadreur
            $sqlInsertAssociation = "INSERT INTO these_etudiant_encadreur (these_id, etudiant_id, encadreur_id) 
                                     VALUES ('$theseId', '$etudiantId', '$encadreurId')";
            $resultInsertAssociation = mysqli_query($con, $sqlInsertAssociation);

            if ($resultInsertAssociation) {
                echo "Les données ont été ajoutées avec succès.";
                header("location: affthese.php");
            } else {
                echo "Erreur lors de l'insertion de l'association : " . mysqli_error($con);
            }
        } else {
            echo "Erreur lors de l'insertion de l'encadreur : " . mysqli_error($con);
        }
    } else {
        echo "Erreur lors de l'insertion de l'étudiant : " . mysqli_error($con);
    }
}

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
      <h1>ajouter</h1>
      <form method="post">
      
      <label>Les these </label>
        <select name="these" id="these">
      <option value="">Sélectionnez le theme </option>
      <?php
                  include 'conn.php';
                  $sqlthese = "SELECT * FROM these";
                  $rst = mysqli_query($con, $sqlthese);
                  if (!$rst) {
                      echo "Erreur : " . mysqli_error($con);
                  } else {
                      while ($enr = mysqli_fetch_array($rst)) {
                          echo '<option value="' . $enr['id_t'] . '">' . $enr['theme'] . '</option>';
                      }
                  }
                  mysqli_close($con);
                ?>
                </select>
      
        <label for="netudiant"> Nom de l'Etudiant:</label>
        <input type="text" id="netudiant" name="netudiant">
        
        <label for="petudiant"> Prenom de l'Etudiant:</label>
        <input type="text" id="petudiant" name="petudiant">

        
        <label for="nencadreur"> Nom de l'Encadreur:</label>
        <input type="text" id="nencadreur" name="nencadreur">
        
        <label for="pencadreur"> Prenom de l'Encadreur:</label>
        <input type="text" id="pencadreur" name="pencadreur">

                
        
        

        <button type="submit" name="sub">Ajouter</button>
       
      </form>
    </div>
  </body>
</html