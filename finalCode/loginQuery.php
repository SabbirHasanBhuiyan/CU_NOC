<?php
$showError = false;
$login = false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'db_connect.php';
    $email = $_POST["email"];
    $pass = $_POST["password"];

    $sqlQuery="SELECT * from user where email='$email'AND password='$pass' ";
    $result= mysqli_query($connection,$sqlQuery);

    $num = mysqli_num_rows($result);

    if($num==1){
                $login=true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $email;
                header("location: applicant.php");

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