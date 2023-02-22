<?php
session_start();
include 'db_connect.php';
$id;
if(isset($_GET['id2'])){ 
    $id=$_GET['id2'];
    $sqlQuery="SELECT * from study_leave_application where leave_id='$id' ";
    $result= mysqli_query($connection,$sqlQuery);
    $row = mysqli_fetch_assoc($result);

    $nameOfProgram = $row["Name_of_Program"];
    $destination_univerity = $row["Destination"];
    $Destination_Department = $row["Department"];
    $Program_Duration=$row['Duration'];
    $leave_start_date=$row['Leave_Start_Date'];
    $program_start_date=$row['Program_Start_Date'];
    $Financial_Source=$row['Financial_Source'];
    $app_id=$row['applicant_id'];
    $file_name=$row['Attachments'];
    
    $sqlQuery2="SELECT * from user where ID='$app_id' ";
    $result2= mysqli_query($connection,$sqlQuery2);
    $row2 = mysqli_fetch_assoc($result2);

    $app_name=$row2['Name'];
    $app_dept=$row2['Department'];


}
