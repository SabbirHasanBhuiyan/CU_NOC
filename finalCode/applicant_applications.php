<?php

$app_id = $_SESSION['id'];
include 'db_connect.php';


$sqlQuery="SELECT Name_of_Program,Leave_ID from study_leave_application where applicant_id='$app_id' ";
$result= mysqli_query($connection,$sqlQuery);

$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

//close connection
mysqli_close($connection);

?>