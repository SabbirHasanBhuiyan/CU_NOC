<?php
session_start();
$id2 = $_GET['id2'];
include 'db_connect.php';
$sqlQuery="SELECT * from study_leave_application where leave_id='$id2' ";
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

if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'db_connect.php';
    $comment = $_POST["comment"];
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){

        $sqlQuery2="INSERT INTO `evaluates` (`Evaluation_type`, `Leave_ID`, `applicant_id`, `status`, `evaluation_time`, `comment`) VALUES ('Register Primary Approval', '$id2', '$app_id', 'Pending', CURRENT_TIME(), '');";

        $result2= mysqli_query($connection,$sqlQuery2);

        $sqlQuery3="UPDATE `evaluates` SET `status` = 'Approved', `evaluation_time` = CURRENT_TIME(), `comment` = '$comment' WHERE `evaluates`.`Evaluation_type` = 'Chairman' AND `evaluates`.`Leave_ID` = '$id2' AND `evaluates`.`applicant_id` = '$app_id'";

        $result3= mysqli_query($connection,$sqlQuery3);

        // Query For Sending Mail 
        $mail_finding_query="SELECT * from user where user_type='Registrar' ";
        $mail_finding_result= mysqli_query($connection,$mail_finding_query);
        $mail_finding_row=mysqli_fetch_assoc($mail_finding_result);
        $rec_add=$mail_finding_row['Email'];
        $rec_name=$mail_finding_row['Name'];
         require 'sendmail.php' ;
        $mail->addAddress($rec_add);

        $mail->Subject="Evaluation Required for NOC";
        $mail->Body="Hello ".$rec_name.", An Application for Study Leave is awaiting your approval. Please Visit NOC Website to send Your valuable Response. Thank You.";
        $mail->send();



        header("location: chairman.php");
      }

      else {
        
      }

    

   

}


?>