<?php 
require (__DIR__ . '/dompdf/vendor/autoload.php');
use Dompdf\Dompdf;
use Dompdf\Options;

$options=new Options;
$options->setChroot(__DIR__);

$dompdf= new Dompdf($options);

$dompdf->setPaper("A4","portrait");

$html_file=file_get_contents("final_noc_application.html");

include 'db_connect.php';
$leave_id='97818181';
$details_finding_query="SELECT * from study_leave_application where Leave_ID='$leave_id' ";
$details_finding_result= mysqli_query($connection,$details_finding_query);
$details_finding_row=mysqli_fetch_assoc($details_finding_result);

$nameOfProgram = $details_finding_row["Name_of_Program"];
$destination_univerity = $details_finding_row["Destination"];
$Destination_Department = $details_finding_row["Department"];
$Program_Duration=$details_finding_row['Duration'];
$leave_start_date=$details_finding_row['Leave_Start_Date'];
$program_start_date=$details_finding_row['Program_Start_Date'];
$Financial_Source=$details_finding_row['Financial_Source'];
$app_id=$details_finding_row['applicant_id'];

$details_finding_query2="SELECT * from user where ID='$app_id' ";
$details_finding_result2= mysqli_query($connection,$details_finding_query2);
$details_finding_row2=mysqli_fetch_assoc($details_finding_result2);

$app_name=$details_finding_row2['Name'];
$app_dept=$details_finding_row2['Department'];
$app_designation=$details_finding_row2['user_type'];
$today_date=date('Y-m-d');

$html_file=str_replace("{{applicant_name}}",$app_name, $html_file);
$html_file=str_replace("{{Designation}}",$app_designation, $html_file);
$html_file=str_replace("{{Department}}",$app_dept, $html_file);
$html_file=str_replace("{{Today's Date}}",$today_date, $html_file);
//eta thik korte hobe db te
$html_file=str_replace("{{Applied-date}}",$today_date, $html_file);

$html_file=str_replace("{{Program Duration}}",$Program_Duration, $html_file);
$html_file=str_replace("{{Program Start Date}}",$program_start_date, $html_file);
$html_file=str_replace("{{Destination University}}",$destination_univerity, $html_file);
$html_file=str_replace("{{Leave Start date}}",$leave_start_date, $html_file);

$dompdf->loadHtml($html_file);
$dompdf->render();
$dompdf->stream(); 
?>