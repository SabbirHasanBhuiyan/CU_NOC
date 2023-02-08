<?php

$errors= array('email'=>'','password'=>'');
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'db_connect.php';
    $username = $_POST["first_name"] . " " . $_POST["last_name"];
    $email = $_POST["user_email"];
    $pass = $_POST["user_password"];
    $department = $_POST["dept"];
    $confirmPass=$_POST['repeat_password'];

    


    $sqlQuery="INSERT INTO `user` ( `Name`, `Email`, `Password`, `Department`) VALUES ('$username', '$email', '$pass', '$department')";

    $result= mysqli_query($connection,$sqlQuery);

}


?>