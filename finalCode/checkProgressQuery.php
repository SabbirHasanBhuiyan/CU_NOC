<?php 
 session_start();
  $deptChairmain=0;
  $registerPrimaryApproval=0;
  $higherStudyPrimaryApproval=0;
  $assignedToDept=0;
  $registerSecondaryApproval=0;
  $VCApproval=0;
  $registerFinalApproval=0;
  $higherStudyBranchFinalApproval=0;

  include 'db_connect.php';


  if(isset($_GET['Leave_ID'])){     //Openning of this page
    $Leave_ID=mysqli_real_escape_string($connection, $_GET['Leave_ID']);
    $sql="SELECT status FROM evaluates where Leave_ID=$Leave_ID and Evaluation_type='Chairman' " ;
    $result=mysqli_query($connection,$sql);
    $application=mysqli_fetch_assoc($result);
    if(!empty($application) && $application['status']=="Approved"){ //checking for chairman approved
      $deptChairmain=2;
      $registerPrimaryApproval=1;

      $sql="SELECT status FROM evaluates where Leave_ID=$Leave_ID and Evaluation_type='Register Primary Approval' " ;
      $result=mysqli_query($connection,$sql);
      $application=mysqli_fetch_assoc($result);
      if(!empty($application) && $application['status']=="Approved"){  //Register Primary Approval
        $registerPrimaryApproval=2;
        $higherStudyPrimaryApproval=1;

        $sql="SELECT status FROM evaluates where Leave_ID=$Leave_ID and Evaluation_type='Higher Study Brunch Primary Approval' " ;
        $result=mysqli_query($connection,$sql);
        $application=mysqli_fetch_assoc($result);
        if(!empty($application) && $application['status']=="Approved"){ //Higher Study Brunch Primary Approval check
          $higherStudyPrimaryApproval=2;
          $assignedToDept=1;

          $sql="SELECT status FROM evaluates where Leave_ID=$Leave_ID and Evaluation_type='Assigned To Different Departments' " ;
          $result=mysqli_query($connection,$sql);
          $application=mysqli_fetch_assoc($result);          
          if(!empty($application) && $application['status']=="Approved"){ //various Department checking
            $assignedToDept=2;
            $registerSecondaryApproval=1;

            $sql="SELECT status FROM evaluates where Leave_ID=$Leave_ID and Evaluation_type='Register Second Approval' " ;
            $result=mysqli_query($connection,$sql);
            $application=mysqli_fetch_assoc($result); 
            if(!empty($application) && $application['status']=="Approved"){
              $registerSecondaryApproval=2;
              $VCApproval=1;

              $sql="SELECT status FROM evaluates where Leave_ID=$Leave_ID and Evaluation_type='Vice Chancellor Office' " ;
              $result=mysqli_query($connection,$sql);
              $application=mysqli_fetch_assoc($result);               
              if(!empty($application) && $application['status']=="Approved"){
                $VCApproval=2;
                $registerFinalApproval=1;

                $sql="SELECT status FROM evaluates where Leave_ID=$Leave_ID and Evaluation_type='Register Final Approval' " ;
                $result=mysqli_query($connection,$sql);
                $application=mysqli_fetch_assoc($result);            
                if(!empty($application) && $application['status']=="Approved"){
                  $registerFinalApproval=2;
                  $higherStudyBranchFinalApproval=1;

                  $sql="SELECT status FROM evaluates where Leave_ID=$Leave_ID and Evaluation_type='Higher Study Branch Final Approval' " ;
                  $result=mysqli_query($connection,$sql);
                  $application=mysqli_fetch_assoc($result);                   
                  if(!empty($application) && $application['status']=="Approved"){
                    $higherStudyBranchFinalApproval=2;
                  }
                }
                
              }
            }
          }

        }
      }
    }else $deptChairmain=1;

    mysqli_free_result($result);
    mysqli_close($connection);
  }

?>