<?php
include 'conn.php';
if(isset($_POST['submit'])){
    $firstname=filter_var($_POST['firstname'],FILTER_SANITIZE_STRING);
    $lastname=filter_var($_POST['lastname'],FILTER_SANITIZE_STRING);
    $email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $password=filter_var($_POST['password'],FILTER_SANITIZE_STRING);
    $confirmpassow=filter_var($_POST['confirmpassow'],FILTER_SANITIZE_STRING);
    $rolee=filter_var($_POST['role'],FILTER_SANITIZE_NUMBER_INT) ;

    $errors=[];
    
    //Validation des champs vides
    if (empty($firstname)){
        $errors[]="Veuillez entrer le prénom";
    } elseif(empty($lastname)){
        $errors[]="Veuillez entrer le nom de famille";
    } elseif(empty($email)){
        $errors[]="Veuillez entrer votre adresse email";
    } elseif(empty($password)){
        $errors[]="Veuillez entrer votre mot de passe";
    } elseif(empty($confirmpassow)){
        $errors[]="Veuillez confirmer votre mot de passe";
    }
    
    //Validation de l'email
    if(filter_var($email,FILTER_VALIDATE_EMAIL)==false){
        $errors[]="Email non valide";
    }
    
    //Validation de la longueur du mot de passe et de la correspondance
    if(strlen($password)<6 ){
        $errors[]="Le mot de passe est trop court";
    } elseif($password!==$confirmpassow){
        $errors[]="Les mots de passe ne correspondent pas";
    }
    
    //validate email 
    $sta="SELECT email FROM user WHERE email='$email' ";
    $q=$con->prepare($sta);
    $q->execute();
    $data=$q->fetch();
    if ($data){
        $errors[]="l'email est utilise deja";
    }
   
    //Insertion des données dans la base de données
    if(empty($errors)){
        //$password=password_hash($password,PASSWORD_DEFAULT);
        //$confirmpassow=password_hash($confirmpassow,PASSWORD_DEFAULT);
        $stm="INSERT INTO user (firstname,lastname,email,role,passwordd,confirmpassword) VALUES ('$firstname','$lastname','$email','$rolee','$password','$confirmpassow')";
        mysqli_query($con, $stm);
        

    }

    //Affichage des erreurs
    if(!empty($errors)){
        foreach($errors as $msg){
            echo "<div>" . $msg . "</div>";
        }
    }
}












?>









<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="sign.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width,intial-scale=1.0"/>
</head>
<body>
    <header>
        <a href="CozyVibesStore.html" class="logo"><span>L</span>ab<span>G</span>ed</a>
    </header>
    <div class="signup-box">
        <h1>Sign Up</h1>
        <form method="post">
            <label>First Name</label>
            <input type="text" placeholder="" name="firstname" >
            <label>Last name</label>
            <input type="text" placeholder="" name="lastname">
            <label>Email</label>
            <input type="email" placeholder="you@example.com" name="email">
            <label>Password</label>
            <label>Votre role</label>
                <select name="role" id="role">
                <option value="">Sélectionnez votre role</option>
                <?php
                  include 'conn.php';
                  $membre = "SELECT * FROM membre";
                  $listmemebre = mysqli_query($con, $membre);
                  if (!$listmemebre) {
                      echo "Erreur : " . mysqli_error($con);
                  } else {
                      while ($enr = mysqli_fetch_array($listmemebre)) {
                          echo '<option value="' . $enr['id'] . '">' . $enr['rolee'] . '</option>';
                      }
                  }
                  mysqli_close($con);
                  ?>
                </select>
            <input type="password" placeholder="*************" name="password">
            <label>Confirm Password</label>
            <input type="password" placeholder="*************" name="confirmpassow">

            <button type="submit" name="submit">submit</button>
        </form>
        <p>By clicking the Sign Up button,you agree to our <br>
        <a href="#">Terms and Condition</a> and <a href="#">Policy Privacy</a>
        <p class="para-2">Already have an account? <a href="LOGIN.html">Login here</a></p>
        </p>
    </div>
        





</body> 
</html>   