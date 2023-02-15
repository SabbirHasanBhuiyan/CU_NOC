<?php
    include 'db_connect.php';
    $errors= array('email'=>'','password'=>'');
    $email=$pass=$department=$confirmPass=$fName=$lName=$department='';

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $email = $_POST["user_email"];
        $pass = $_POST["user_password"];
        $department = $_POST["dept"];
        $confirmPass=$_POST['repeat_password'];
        $fName=$_POST['first_name'];
        $lName=$_POST['last_name'];

        if(!empty($email)){
            $sql="SELECT * FROM user where email='$email'";
            $result=mysqli_query($connection,$sql);
            $user=mysqli_fetch_assoc($result);;
            mysqli_free_result($result);            
    
            if(!empty($user)){
                $errors['email']='This email has an account already';
            }
        }

        if($pass!=$confirmPass){
            $errors['password']='Password does not matches';
        }

        
        if(!array_filter($errors)){
            $email=mysqli_real_escape_string($connection,$_POST['user_email']);
            $password=mysqli_real_escape_string($connection,$_POST['user_password']);
            $username = mysqli_real_escape_string($connection,$_POST['first_name']) . " " . mysqli_real_escape_string($connection,$_POST['last_name']);
            $sqlQuery="INSERT INTO user( `Name`, `Email`, `Password`, `Department`, `user_type`) VALUES ('$username', '$email', '$pass', '$department','Teacher')";
            
            if(mysqli_query($connection,$sqlQuery)){
                header('Location: index.php');
            }else{
                echo 'query error : '.mysqli_error($connection);
            }
        }

    }


?>