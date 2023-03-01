<?php
// on login screen, redirect to dashboard if already logged in
if(isset( $_SESSION['user_type'])){
    $user_type=$_SESSION['user_type'];
    $id=$_SESSION['id'];
    if($user_type=='Teacher') header("location: applicant.php");
    else if($user_type=='Chairman') header("location: chairman.php");
    else if($user_type=="Registrar") header("location: registrar.php");
    else if($user_type=='HigherStudies')header("location: HigherStudies.php");
    else if($user_type=='AccountsController' || $user_type=='Librarian' || $user_type=='College'){
        header("location: departments.php?id=$id");
    }

  exit();
}




?>