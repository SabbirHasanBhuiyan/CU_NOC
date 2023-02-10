<?php
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
    if($num==1){
        
                $login=true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['id'] = $id;
                $_SESSION['name'] = $name;
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