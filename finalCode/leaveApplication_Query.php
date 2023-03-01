<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'db_connect.php';
    $nameOfProgram = $_POST["nameOfProgram"];
    $destination_univerity = $_POST["destination_univerity"];
    $Destination_Department = $_POST["Destination_Department"];
    $Program_Duration=$_POST['Program_Duration'];
    $Financial_Source=$_POST['Financial_Source'];
    $Destination_Country=$_POST['destination_country'];
    $designation=$_POST['designation'];
   // $important_document=$_POST['important_document'];
   $joining_date=strtotime($_POST['joining_date']);
   $date1=date('d',$joining_date);
   $month1=date('m',$joining_date);
   $year1=date('Y',$joining_date);
   $jdate = $year1 . "-" . $month1 . "-" . $date1;
    $start_date=strtotime($_POST['leave_start_date']);
    $date1=date('d',$start_date);
    $month1=date('m',$start_date);
    $year1=date('Y',$start_date);
    $stdate = $year1 . "-" . $month1 . "-" . $date1;
    $end_date=strtotime($_POST['program_start_date']);
    $date2=date('d',$end_date);
    $month2=date('m',$end_date);
    $year2=date('Y',$end_date);
    $eddate = $year2 . "-" . $month2 . "-" . $date2;
    $pname = rand(1000, 10000) . "-" . $_FILES["important_document"]["name"];

    $tname = $_FILES["important_document"]["tmp_name"];

    $uploads_dir = 'pdf';

    move_uploaded_file($tname, $uploads_dir.'/'.$pname);


    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
        $app_id = $_SESSION['id'];
        $leave_id = rand(1, 100000000);
        $sqlQuery="INSERT INTO `study_leave_application` (`Leave_ID`, `Name_of_Program`, `Destination`, `Department`, `Duration`, `Destination_Country`, `Financial_Source`, `designation`,  `joining_date`, `Leave_Start_Date`, `Program_Start_Date`, `Attachments`, `applicant_id`) VALUES ('$leave_id', '$nameOfProgram', '$destination_univerity', '$Destination_Department', '$Program_Duration','$Destination_Country', '$Financial_Source','$designation','$jdate', '$stdate', '$eddate', '$pname', '$app_id')";  

        $result= mysqli_query($connection,$sqlQuery);

        $sqlQuery2="INSERT INTO `evaluates` (`Evaluation_type`, `Leave_ID`, `applicant_id`, `status`, `evaluation_time`, `comment`) VALUES ('Chairman', '$leave_id', '$app_id', 'Pending', CURRENT_TIME(), '');";

        require('generate_my_application_chairman.php');

        // Query For Sending Mail 

        $result2= mysqli_query($connection,$sqlQuery2);
        $dept_finding_query="SELECT * from user where id='$app_id'";
        $dept_finding_result= mysqli_query($connection,$dept_finding_query);
        $dept_finding_row=mysqli_fetch_assoc($dept_finding_result);
        $app_dept=$dept_finding_row['Department'];
        
        $mail_finding_query="SELECT * from user where Department='$app_dept' AND user_type='Chairman' ";
        $mail_finding_result= mysqli_query($connection,$mail_finding_query);
        $mail_finding_row=mysqli_fetch_assoc($mail_finding_result);
        $rec_add=$mail_finding_row['Email'];
        $rec_name=$mail_finding_row['Name'];
         require 'sendmail.php' ;
        $mail->addAddress($rec_add);

        $mail->Subject="Evaluation Required for NOC";
        $mail->Body="Hello ".$rec_name.", An Application for Study Leave is awaiting your approval. Please Visit NOC Website to send Your valuable Response. Thank You.";
        $mail->send();

        header("location: applicant.php");
      }

      else {
        
      } 

}

?>