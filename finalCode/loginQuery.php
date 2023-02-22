<?php

use FontLib\Table\Type\head;

$showError = false;
$login = false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'db_connect.php';
    $email = $_POST["email"];
    $pass = $_POST["password"];

    $sqlQuery="SELECT * from user where email='$email'AND password='$pass' ";
    $result= mysqli_query($connection,$sqlQuery);
    $row = mysqli_fetch_assoc($result);
    $num = mysqli_num_rows($result);
    
    $id=$row['ID'];
    $name=$row['Name'];
    $user_type=$row['user_type'];
    $dept=$row['Department'];
    if($num==1){
        
                $login=true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['id'] = $id;
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                $_SESSION['user_type'] = $user_type;
                $_SESSION['dept'] = $dept;
                if($user_type=='Teacher') header("location: applicant.php");
                else if($user_type=='Chairman') header("location: chairman.php");
                else if($user_type=="Registrar") header("location: registrar.php");
                else if($user_type=='HigherStudies')header("location: HigherStudies.php");
                else if($user_type=='AccountsController' || $user_type=='Librarian' || $user_type=='College'){
                    header("location: departments.php?id=$id");  
                    
                }
                else if( $user_type=='Vice Chancellor Office')
                {
                   header("location: ViceChanchelor.php");
                }
    }
    else {
        $showError = "Invalid Email or Password";
    }

    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("location: index.php");
        exit;
    }


}


?>