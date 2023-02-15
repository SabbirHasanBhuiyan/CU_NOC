<?php

$app_id = $_SESSION['id'];
$dept=$_SESSION['dept'];
include 'db_connect.php';


$sqlQuery="SELECT e.Leave_id FROM study_leave_application s,evaluates e, user u WHERE s.leave_id=e.leave_id AND s.applicant_id=u.ID AND u.Department='$dept' AND e.status='Pending' AND e.evaluation_type='Chairman'";
$result= mysqli_query($connection,$sqlQuery);
while($row = mysqli_fetch_assoc($result)){
    $ans=$row['Leave_id'];
   echo ' <div class="grid grid-cols-6 gap-3">
  <div class="col-start-2 col-span-4">
    <a href="chairman_confirmation.php?id2=';
    echo  $ans ;
    echo '" class="block w-9/10 p-2 bg-gradient-to-r from-blue-500 to-black rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
    <div class="flex flex-row justify-between items-center">
      <img class="w-8 h-8 rounded-full" src="./images/leave.png" alt="">
      <h5 class="mb-2  text-lg font-serif font-light tracking-tight text-white text-center">';
      echo $ans ;
    echo ' </h5>
      <button type="button" class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Icon description</span>
      </button>
   
    </div>  
    </a>
  </div>
</div>
<br>';
}

?>