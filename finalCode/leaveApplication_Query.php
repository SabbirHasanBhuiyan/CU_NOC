<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'db_connect.php';
    $nameOfProgram = $_POST["nameOfProgram"];
    $destination_univerity = $_POST["destination_univerity"];
    $Destination_Department = $_POST["Destination_Department"];
    $Program_Duration=$_POST['Program_Duration'];
    $Financial_Source=$_POST['Financial_Source'];
   // $important_document=$_POST['important_document'];
    $start_date=strtotime($_POST['start_date']);
    $date1=date('d',$start_date);
    $month1=date('m',$start_date);
    $year1=date('Y',$start_date);
    $stdate = $year1 . "-" . $month1 . "-" . $date1;
    $end_date=strtotime($_POST['end_date']);
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
        $sqlQuery="INSERT INTO `study_leave_application` ( `Name_of_Program`, `Destination`, `Department`, `Duration`, `Financial_Source`, `Leave_Start_Date`, `Program_Start_Date`, `Attachments`, `applicant_id`) VALUES ( '$nameOfProgram', '$destination_univerity', '$Destination_Department', '$Program_Duration', '$Financial_Source', '$stdate', '$eddate', '$pname', '$app_id')";  

        $result= mysqli_query($connection,$sqlQuery);
        header("location: applicant.php");
      }

    

   

}


?>