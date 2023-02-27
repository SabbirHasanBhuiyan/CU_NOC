<?php 
 //session_start();
 include 'db_connect.php';

 $sql="SELECT Leave_ID FROM evaluates where Evaluation_type='Registrar Primary Approval' and status='Pending'";
 $result=mysqli_query($connection,$sql);
 $newApplications = mysqli_fetch_all($result, MYSQLI_ASSOC);

 $sql="SELECT Leave_ID FROM evaluates where Evaluation_type='Registrar Secondary Approval' and status='Pending'";
 $result=mysqli_query($connection,$sql);
 $higherStudyApprovedS = mysqli_fetch_all($result, MYSQLI_ASSOC); 

 $sql="SELECT Leave_ID FROM evaluates where Evaluation_type='Registrar Final Approval' and status='Pending'";
 $result=mysqli_query($connection,$sql);
 $VCApprovedS = mysqli_fetch_all($result, MYSQLI_ASSOC);
 

 mysqli_close($connection);

?>