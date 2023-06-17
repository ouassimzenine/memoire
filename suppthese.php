<?php
include 'conn.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Supprimer la thèse
    $sql = "DELETE FROM these_etudiant_encadreur WHERE id = $id";
    $result = mysqli_query($con, $sql);

    if ($result) {
        // Redirection vers la page principale
        header('Location: affthese.php');
        exit();
    } else {
        echo "Erreur lors de la suppression de la thèse : " . mysqli_error($con);
    }
} else {
    echo "ID de thèse non spécifié.";
}
?>
