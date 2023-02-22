<?php
 include 'db_connect.php';
   
   session_start();
    $id=$_SESSION['leave_id'];
    $comment=$_SESSION['comment'];

    $sql="SELECT * FROM `study_leave_application` WHERE Leave_Id='$id' ";
    $result1=mysqli_query($connection,$sql);
    $row=mysqli_fetch_assoc($result1);
    $app_id=$row['applicant_id'];
  $sqlQuery="UPDATE `evaluates` SET `status` = 'Approved', `evaluation_time` = CURRENT_TIME(), `comment` = '$comment' WHERE `evaluates`.`Evaluation_type` = 'Higher Study Branch Primary Approval' AND `evaluates`.`Leave_ID` = '$id'" ;
     
     
 if($_SERVER["REQUEST_METHOD"]=="POST")
 {
  $sqlQuery10="INSERT INTO `evaluates`(`Evaluation_type`, `Leave_ID`, `applicant_id`, `status`, `evaluation_time`, `comment`) VALUES ('Assigned To Different Departments', '$id', '$app_id', 'Pending', CURRENT_TIME(),' ')";


  $result=mysqli_query($connection ,$sqlQuery10);
  $res=mysqli_query($connection,$sqlQuery);



    
  if(isset($_POST['AccountsController']))
  {
    $reg=$_POST['AccountsController'];
    $app_id=$row['applicant_id'];
   $sqlQuery2="INSERT INTO `evaluates`(`Evaluation_type`, `Leave_ID`, `applicant_id`, `status`, `evaluation_time`, `comment`) VALUES ('$reg', '$id', '$app_id', 'Pending', CURRENT_TIME(),' ')";
   $result5=mysqli_query($connection,$sqlQuery2);
   


 
  }
  if(isset($_POST['Librarian']))
  {
      
    
    $reg=$_POST['Librarian'];
    $app_id=$row['applicant_id'];
   $sqlQuery2="INSERT INTO `evaluates`(`Evaluation_type`, `Leave_ID`, `applicant_id`, `status`, `evaluation_time`, `comment`) VALUES ('$reg', '$id', '$app_id', 'Pending', CURRENT_TIME(),' ')";
   $result5=mysqli_query($connection,$sqlQuery2);
 
 
  }
  if(isset($_POST['college']))
  {
      
    $reg=$_POST['college'];
    $app_id=$row['applicant_id'];
   $sqlQuery2="INSERT INTO `evaluates`(`Evaluation_type`, `Leave_ID`, `applicant_id`, `status`, `evaluation_time`, `comment`) VALUES ('$reg', '$id', '$app_id', 'Pending', CURRENT_TIME(),' ')";
   $result5=mysqli_query($connection,$sqlQuery2);
 
  }
  if(isset($_POST['ExamController']))
  {
      
    $reg=$_POST['ExamController'];
    $app_id=$row['applicant_id'];
   $sqlQuery2="INSERT INTO `evaluates`(`Evaluation_type`, `Leave_ID`, `applicant_id`, `status`, `evaluation_time`, `comment`) VALUES ('$reg', '$id', '$app_id', 'Pending', CURRENT_TIME(),' ')";
   $result5=mysqli_query($connection,$sqlQuery2);
 
  }
  
  if(isset($_POST['PrimeEngineer']))
 {
     
  $reg=$_POST['PrimeEngineer'];
  $app_id=$row['applicant_id'];
 $sqlQuery2="INSERT INTO `evaluates`(`Evaluation_type`, `Leave_ID`, `applicant_id`, `status`, `evaluation_time`, `comment`) VALUES ('$reg', '$id', '$app_id', 'Pending', CURRENT_TIME(),' ')";
 $result5=mysqli_query($connection,$sqlQuery2);

 }
 if(isset($_POST['Director']))
 {
     
  $reg=$_POST['Director'];
  $app_id=$row['applicant_id'];
 $sqlQuery2="INSERT INTO `evaluates`(`Evaluation_type`, `Leave_ID`, `applicant_id`, `status`, `evaluation_time`, `comment`) VALUES ('$reg', '$id', '$app_id', 'Pending', CURRENT_TIME(),' ')";
 $result5=mysqli_query($connection,$sqlQuery2);

 }
 if(isset($_POST['SubRegister']))
 {
     
  $reg=$_POST['SubRegister'];
  $app_id=$row['applicant_id'];
 $sqlQuery2="INSERT INTO `evaluates`(`Evaluation_type`, `Leave_ID`, `applicant_id`, `status`, `evaluation_time`, `comment`) VALUES ('$reg', '$id', '$app_id', 'Pending', CURRENT_TIME(),' ')";
 $result5=mysqli_query($connection,$sqlQuery2);

 }
 if(isset($_POST['DeputyRegister']))
 {
  $reg=$_POST['DeputyRegister'];
  $app_id=$row['applicant_id'];
 $sqlQuery2="INSERT INTO `evaluates`(`Evaluation_type`, `Leave_ID`, `applicant_id`, `status`, `evaluation_time`, `comment`) VALUES ('$reg', '$id', '$app_id', 'Pending', CURRENT_TIME(),' ')";
 $result5=mysqli_query($connection,$sqlQuery2);  


 }
 if(isset($_POST['DeputyRegisterHidden']))
 {
     
  $reg=$_POST['DeputyRegisterHidden'];
  $app_id=$row['applicant_id'];
 $sqlQuery2="INSERT INTO `evaluates`(`Evaluation_type`, `Leave_ID`, `applicant_id`, `status`, `evaluation_time`, `comment`) VALUES ('$reg', '$id', '$app_id', 'Pending', CURRENT_TIME(),' ')";
 $result5=mysqli_query($connection,$sqlQuery2);

 }

 header("location: HigherStudies.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Which Department to forward letter</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.49.0/dist/full.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css"  rel="stylesheet" />
</head>
<body class="bg-blue-800">
    <!------------------------- Navigation Bar----------------------->
    <nav class=" navbar bg-base-100 bg-gradient-to-r from-blue-500 to-white px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900">
        <div class="container flex flex-wrap items-center justify-between mx-auto">
        <a href="https://flowbite.com/" class="flex items-center">
            <img src="./images/logo.png" class="h-12 w-8 mr-3 sm:h-9" alt="CU Logo" />
            <span class="self-center text-2xl text-white font-serif font-bold  dark:text-white">University Of Chittagong</span>
        </a>
        <div class="flex items-center md:order-2 ">
            <button type="button" class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
              <span class="sr-only">Open user menu</span>
              <img class="w-8 h-8 rounded-full " src="./images/user.png" alt="">
            </button>
            <!-- Dropdown menu -->
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
              <div class="px-4 py-3">
                <span class="block text-sm text-gray-900 dark:text-white">HigherStudies</span>
                <span class="block text-sm font-medium text-gray-500 truncate dark:text-gray-400">HigherStudies@gamil.com</span>
              </div>
              <ul class="py-2" aria-labelledby="user-menu-button">
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Log out</a>
                </li>
              </ul>
            </div>
            <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
              <span class="sr-only">Open main menu</span>
              <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
          </button>
        </div>
        </div>
      </nav>
      <!------------------Main Section--------------------->
<main>
    <form  class="flex "  method="POST" >
    <div class=" w-full md:w-3/5 md:h-4/5 p-4 mt-16 mx-auto bg-sky-900  border border-gray-200 rounded-lg shadow sm:p-6 dark:bg-gray-800 dark:border-gray-700">
        <h5 class="mb-3 text-base font-semibold text-sky-300 dark:text-gray-400 md:text-xl text-white">
            Select Required Departments To Assign Task
        </h5>
        <p class="text-sm font-normal text-sky-300 dark:text-gray-400">Department / Register / Office</p>
        <ul class="my-4 space-y-3">

            <li>
                <a href="#" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                  <img class="w-10 h-10" src="images/editor2.png" alt="">  
                  <span class="flex-1 ml-3 whitespace-nowrap">হিসাব নিয়ামক, চ.বি.
                  </span>
                   <input id="link-checkbox" type="checkbox" name="AccountsController" value="AccountsController" class="w-4 h-4 text-blue-600 bg-sky-50 border-black rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-800">
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                  <img  class="w-10 h-10" src="images/libarary.png" alt="">  
                  <span class="flex-1 ml-3 whitespace-nowrap">গ্রন্থাগারিক, চ.বি.
                  </span>
                   <input id="link-checkbox" type="checkbox" name="Librarian" value="Librarian" class="w-4 h-4 text-blue-600 bg-sky-50 border-black rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-800">
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                  <img  class="w-10 h-10" src="images/college.jpeg" alt="">
                    <span class="flex-1 ml-3 whitespace-nowrap">কলেজ প্রদর্শক, চ.বি.
                    </span>
                   <input id="link-checkbox" type="checkbox"  name="college" value="College" class="w-4 h-4 text-blue-600 bg-sky-50 border-black rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-800">
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                  <img  class="w-10 h-10" src="images/examCommittee.png" alt=""> 
                  <span class="flex-1 ml-3 whitespace-nowrap">পরীক্ষা নিয়ন্ত্রক, চ.বি.
                  </span>
                   <input id="link-checkbox" type="checkbox"  name="ExamController" value="ExamController" class="w-4 h-4 text-blue-600 bg-sky-50 border-black rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-800">
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                  <img  class="w-10 h-10" src="images/Architect.jpeg" alt="">  
                  <span class="flex-1 ml-3 whitespace-nowrap">প্রধান প্রকৌশলী, চ.বি.</span>
                   <input id="link-checkbox" type="checkbox" name="PrimeEngineer" value="PrimeEngineer" class="w-4 h-4 text-blue-600 bg-sky-50 border-black rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-800">
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                  <img  class="w-12 h-8" src="images/committee.png" alt="">  
                  <span class="flex-1 ml-3 whitespace-nowrap">পরিচালক ,পরিকল্পনা ও উন্নয়ন দপ্তর, <br> চ.বি.
                  </span>
                   <input id="link-checkbox" type="checkbox" name="Director" value="Director" class="w-4 h-4 text-blue-600 bg-sky-50 border-black rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-800">
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                  <img  class="w-10 h-10" src="images/deputyRegister.png" alt="">  
                  <span class="flex-1 ml-3 whitespace-nowrap">উপ রেজিস্টার (শিক্ষক সেল) <br> রেজিস্টার অফিস, চ.বি.</span>
                   <input id="link-checkbox" type="checkbox" name="SubRegister" value="SubRegister" class="w-4 h-4 text-blue-600 bg-sky-50 border-black rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-800">
                </a>
            </li>
            
            <li>
                <a href="#" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                  <img  class="w-10 h-10" src="images/register.png" alt="">  
                  <span class="flex-1 ml-3 whitespace-nowrap">ডেপুটি রেজিস্টার (একাডেমির শাখা) <br> রেজিস্টার অফিস , চ.বি.</span>
                   <input id="link-checkbox" type="checkbox" name="DeputyRegister" value="DeputyRegister" class="w-4 h-4 text-blue-600 bg-sky-50 border-black rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-800">
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                  <img  class="w-10 h-10" src="images/secrect.png" alt="">  
                  <span class="flex-1 ml-3 whitespace-nowrap">ডেপুটি রেজিস্টার (গোপনীয় শাখা) <br> রেজিস্টার অফিস , চ.বি</span>
                   <input id="link-checkbox" type="checkbox" name="DeputyRegisterHidden" value="DeputyRegisterHidden" class="w-4 h-4 text-blue-600 bg-sky-50 border-black rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-800">
                </a>
            </li>


        </ul>
        <div>
           
                <button type='submit' name='submit' id='submit' class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    Assign
                </span>
              </button>
                <button  type="reset" name="reset" id="reset" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    Reset
                </span>
              </button>
      
        </div>
         </form>
    </div>

</main>
      <!------------------------------Footer----------------------->
      <footer class="mt-20 footer items-center p-4 bg-gradient-to-r from-black to-blue-500 text-neutral-content">
        <div class="items-center grid-flow-col">
          <svg width="36" height="36" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" class="fill-current"><path d="M22.672 15.226l-2.432.811.841 2.515c.33 1.019-.209 2.127-1.23 2.456-1.15.325-2.148-.321-2.463-1.226l-.84-2.518-5.013 1.677.84 2.517c.391 1.203-.434 2.542-1.831 2.542-.88 0-1.601-.564-1.86-1.314l-.842-2.516-2.431.809c-1.135.328-2.145-.317-2.463-1.229-.329-1.018.211-2.127 1.231-2.456l2.432-.809-1.621-4.823-2.432.808c-1.355.384-2.558-.59-2.558-1.839 0-.817.509-1.582 1.327-1.846l2.433-.809-.842-2.515c-.33-1.02.211-2.129 1.232-2.458 1.02-.329 2.13.209 2.461 1.229l.842 2.515 5.011-1.677-.839-2.517c-.403-1.238.484-2.553 1.843-2.553.819 0 1.585.509 1.85 1.326l.841 2.517 2.431-.81c1.02-.33 2.131.211 2.461 1.229.332 1.018-.21 2.126-1.23 2.456l-2.433.809 1.622 4.823 2.433-.809c1.242-.401 2.557.484 2.557 1.838 0 .819-.51 1.583-1.328 1.847m-8.992-6.428l-5.01 1.675 1.619 4.828 5.011-1.674-1.62-4.829z"></path></svg> 
          <p>Copyright © 2023 - All right reserved</p>
        </div> 
        <div class="grid-flow-col gap-4 md:place-self-center md:justify-self-end">
          <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path></svg>
          </a> 
          <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path></svg></a>
          <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path></svg></a>
        </div>
      </footer>
  <!-- flowbite -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
  <!-- tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>         
</body>
</html>