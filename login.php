<?php
include 'conn.php';
if(isset($_POST['sub'])){
    $email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $password=filter_var($_POST['password'],FILTER_SANITIZE_STRING);
 
    $errors=[];
    if(empty($email)){
        $errors[]="il faut entrer l'email";
       }
    
    
       // validat passw
       if(empty($password)){
            $errors[]="il faut entrer le mot de pass ";
       }
    
    
    
       // insert or errros 
       if(empty($errors)){
       
          // echo "check db";
    
          $stm = "SELECT * FROM user WHERE email = '$email' AND passwordd = '$password'";
            $q = mysqli_query($con,$stm);
            $row = mysqli_num_rows($q);
            if ($row ==1){
                
            }else{
                $errors[]="email ou mot de passs inccorecte";
            }
            
           
        
         
        
       }
       //l'affichage tae les errors hezo ada hoto kima theb hata fi div
       if(isset($errors)){
        if(!empty($errors)){
            foreach($errors as $msg){
                echo $msg . "<br>";
            }
    
        }
    }
    if (empty($errors)) {
        $us = "SELECT * FROM user WHERE email = '$email' AND passwordd = '$password' ";
        $k = mysqli_query($con,$us);
        $row = mysqli_fetch_assoc($k);
        $role=$row['role'];
        if($role==1){
            header("Location: acceuil2.php");

        }elseif ($role==2) {
            $sql="SELECT equipe FROM user where email='$email'";
            $result=mysqli_query($con,$sql);
            $row=mysqli_fetch_assoc($result);
            $equipe=$row['equipe'];
            header("Location: acceuil3.php?numEquipe=$equipe");
            

        }
        
        exit();
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
        <a href="acceuilu.php" class="logo"><span>L</span>ab<span>G</span>ed</a>
    </header>
    <div class="login-box" >
        <h1>Login</h1>
        <form method="post" >
            <label>Email</label>
            <input type="email" name="email" placeholder="email">
            <label>Password</label>
            <input type="password" name="password" placeholder="**********">
            <button type="submit" name="sub">submit</button>
            
        </form>
        
</div>








</body>