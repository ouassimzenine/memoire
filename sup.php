<?php
include 'conn.php';


if (isset($_GET["numero"])) {
    $numero = $_GET["numero"];
    $sql = "delete from  `equipe` WHERE numero = $numero";
    $result=mysqli_query($con, $sql);
    if($result){
        header("location:affequipe.php");
    }
    else  {
        die(mysqli_error($con));
    }
   
}



?>