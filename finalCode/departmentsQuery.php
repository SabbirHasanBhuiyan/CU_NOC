<?php 
 //session_start();
 //session_start();
 $id = $_GET['id'];
 include 'db_connect.php';
 $newApplications;


 $sql="SELECT user_type FROM user where ID='$id'";
 $result=mysqli_query($connection,$sql);
 $userType = mysqli_fetch_assoc($result);

 $usrTyp = $userType["user_type"];

 $sql="SELECT Leave_ID FROM evaluates where Evaluation_type='$usrTyp' and status='Pending'";
 $result=mysqli_query($connection,$sql);
 $newApplications = mysqli_fetch_all($result, MYSQLI_ASSOC);
    


 mysqli_close($connection);

?>