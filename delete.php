<?php
include 'conn.php';

    $id = $_GET['delete'];
    $numEquipe=$_GET['numEquipe'];
    $sql="delete from `chercheur` where id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
       
        $sql = "select * from `chercheur` where id=$id ";
        $result=mysqli_query($con, $sql);
        $row=mysqli_fetch_assoc($result);
        $k=$row['numero'];
        
        header("location:affihchage.php?numEquipe=$numEquipe");
        
         
         
    }
    else  {
        die(mysqli_error($con));
    }
    

                   
                    













?>