<?php
session_start();
include 'db_connect.php';
$leave_id;
$deptID=$_GET['id'];
if($_SERVER["REQUEST_METHOD"]=="post") header("location: departments.php");
if(isset($_GET['leave_id'])){ 
    $leave_id=$_GET['leave_id'];
    $sqlQuery="SELECT * from study_leave_application where leave_id='$leave_id' ";
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

    
    $id2=$leave_id;
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $comment = $_POST["comment"];
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    
           // $sqlQuery2="INSERT INTO `evaluates` (`Evaluation_type`, `Leave_ID`, `applicant_id`, `status`, `evaluation_time`, `comment`) VALUES ('Higher Study Branch Primary Approval', '$id2', '$app_id', 'Pending', CURRENT_TIME(), '');";
    
           // $result2= mysqli_query($connection,$sqlQuery2);
           $sql="SELECT user_type FROM user where ID='$deptID'";
           $result=mysqli_query($connection,$sql);
           $userType = mysqli_fetch_assoc($result);
          
           $usrTyp = $userType["user_type"];           


            $sqlQuery3="UPDATE `evaluates` SET `status` = 'Approved', `evaluation_time` = CURRENT_TIME(), `comment` = '$comment' WHERE `evaluates`.`Evaluation_type` = '$usrTyp' AND `evaluates`.`Leave_ID` = '$id2' AND `evaluates`.`applicant_id` = '$app_id'";
    
            mysqli_query($connection,$sqlQuery3);
    
            

            $flag=1;
            $departments = array("AccountsController", "Librarian", "College" , "ExamController" , "PrimeEngineer" , "Director" , "SubRegister" , "DeputyRegister" , "DeputyRegisterHidden");
            
            foreach($departments as $department){
                $sqlQuery="SELECT * from evaluates where (`status`='Pending' and leave_id='$leave_id' and Evaluation_type='$department')";
                $result= mysqli_query($connection,$sqlQuery);
                $num = mysqli_num_rows($result);
                if($num>=1){
                    $flag=0;
                    break;
                }
            }

            if($flag){
                $sqlQuery3="UPDATE `evaluates` SET `status` = 'Approved', `evaluation_time` = CURRENT_TIME(), `comment` = '$comment' WHERE `evaluates`.`Evaluation_type` = 'Assigned To Different Departments' AND `evaluates`.`Leave_ID` = '$leave_id' ";

                $sqlQuery2="INSERT INTO `evaluates` (`Evaluation_type`, `Leave_ID`, `applicant_id`, `status`, `evaluation_time`, `comment`) VALUES ('Higher Study Branch Secondary Approval', '$leave_id', '$app_id', 'Pending', CURRENT_TIME(), '');";
    
                $result2= mysqli_query($connection,$sqlQuery2);

                $result3= mysqli_query($connection,$sqlQuery3);
            }
            header("location: departments.php?id=$deptID");
          }
    
          else {
            
          }        
 

    }





?>