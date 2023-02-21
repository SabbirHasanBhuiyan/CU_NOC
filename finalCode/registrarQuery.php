<?php 
 //session_start();
 include 'db_connect.php';

 $sql="SELECT Leave_ID FROM evaluates where Evaluation_type='Register Primary Approval' and status='Pending'";
 $result=mysqli_query($connection,$sql);
 $newApplications = mysqli_fetch_all($result, MYSQLI_ASSOC);

 $sql="SELECT Leave_ID FROM evaluates where Evaluation_type='Assigned To Different Departments' and status='Approved'";
 $result=mysqli_query($connection,$sql);
 $higherStudyApprovedS = mysqli_fetch_all($result, MYSQLI_ASSOC); 

 $sql="SELECT Leave_ID FROM evaluates where Evaluation_type='Vice Chancellor Office' and status='Approved'";
 $result=mysqli_query($connection,$sql);
 $VCApprovedS = mysqli_fetch_all($result, MYSQLI_ASSOC);
 

 mysqli_close($connection);

?>