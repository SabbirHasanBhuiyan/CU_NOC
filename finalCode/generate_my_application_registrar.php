<?php 

require (__DIR__ . '/dompdf/vendor/autoload.php');
use Dompdf\Dompdf;
use Dompdf\Options;

$options=new Options;
$options->setChroot(__DIR__);
$dompdf= new Dompdf($options);

$dompdf->setPaper("A4","portrait");

$html_file=file_get_contents("basic_noc_application.html");

include 'db_connect.php';


$details_finding_query="SELECT * from study_leave_application where Leave_ID='$leave_id' ";
$details_finding_result= mysqli_query($connection,$details_finding_query);
$details_finding_row=mysqli_fetch_assoc($details_finding_result);

$nameOfProgram = $details_finding_row["Name_of_Program"];
$designation = $details_finding_row["designation"];
$joining_date = $details_finding_row["joining_date"];
$destination_univerity = $details_finding_row["Destination"];
$Destination_Department = $details_finding_row["Department"];
$Program_Duration=$details_finding_row['Duration'];
$leave_start_date=$details_finding_row['Leave_Start_Date'];
$program_start_date=$details_finding_row['Program_Start_Date'];
$Financial_Source=$details_finding_row['Financial_Source'];
$app_id=$details_finding_row['applicant_id'];
$Destination_country=$details_finding_row['Destination_Country'];
$applied_date=$details_finding_row['applied_date'];
$Attachments=$details_finding_row['Attachments'];
$my_application_chairman=$details_finding_row['my_application_chairman'];

$details_finding_query2="SELECT * from user where ID='$app_id' ";
$details_finding_result2= mysqli_query($connection,$details_finding_query2);
$details_finding_row2=mysqli_fetch_assoc($details_finding_result2);

$app_name=$details_finding_row2['Name'];
$app_dept=$details_finding_row2['Department'];
$today_date=date('Y-m-d');
$html_file=str_replace("{{Name of Program}}",$nameOfProgram, $html_file);
$html_file=str_replace("{{teacher name}}",$app_name, $html_file);
$html_file=str_replace("{{Department}}",$app_dept, $html_file);
$html_file=str_replace("{{Today's Date}}",$today_date, $html_file);
$html_file=str_replace("{{Fund}}",$Financial_Source, $html_file);
$html_file=str_replace("{{To Role}}","Registrar", $html_file);
$program_start_date2=strtotime($program_start_date);
$date=date('d',$program_start_date2);
$month=date('m',$program_start_date2);
$year=date('Y',$program_start_date2)+$Program_Duration;
$program_end_date = $year . "-" . $month . "-" . $date;

$html_file=str_replace("{{Applied-date}}",$applied_date, $html_file);
$html_file=str_replace("{{program duration}}",$Program_Duration, $html_file);
$html_file=str_replace("{{program start date}} ",$program_start_date, $html_file);
$html_file=str_replace("{{Destination University}}",$destination_univerity, $html_file);
$html_file=str_replace("{{leave start date}} ",$leave_start_date, $html_file);
$html_file=str_replace("{{Destination Country}}",$Destination_country, $html_file);
$html_file=str_replace("{{program end time}}",$program_end_date, $html_file);
$html_file=str_replace("{{Designation}}",$designation, $html_file);
$html_file=str_replace("{{joining date}}",$joining_date, $html_file);
$html_file=str_replace("{{Attachments}}",$Attachments, $html_file);


    $dompdf->loadHtml($html_file);
$dompdf->render();
//$dompdf->stream(); 
$output=$dompdf->output();

    $pname = rand(1000, 10000) . "-" . "my_noc_application_registrar.pdf";

$destdir='pdf/';

file_put_contents($destdir.$pname,$output);

$update_query="UPDATE `study_leave_application` SET `my_application_registrar` = '$pname' WHERE `study_leave_application`.`Leave_ID` = '$leave_id'";
$update_result= mysqli_query($connection,$update_query);


   


?>