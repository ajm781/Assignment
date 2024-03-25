<?php
session_start();
if (!($_SESSION["IDlog"]))
{
  header("Location: login.php");
  die;
}
else if($_SESSION["IDlog"]["role_id"]==2)
{
  //include ("nav_patient.php");
}
else {
  header("Location: login.php");
  die;
}
$var_email=$_SESSION["IDlog"]["user_id"];
$connection = mysqli_connect("localhost",
"root" ,
"" ,
"abc_lab" );
$query1=" SELECT user_id, email , fname, lname,contact_no, date_of_birth,address,city , gender FROM user_det WHERE user_id=".$var_email." ";
$result = mysqli_query($connection,
$query1);
if($result)
   			{
  if($result && mysqli_num_rows($result) > 0)
   				{
    $userdata = mysqli_fetch_assoc($result);
    $_SESSION["my_profile"] = $userdata;
  }
}
mysqli_close($connection);
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script type= "text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script type= "text/javascript" src="/scripts/xtest100.js" ></script>
<link rel="stylesheet" href="/css/patient_upd.css">
<link rel="stylesheet" href="/css/footer.css">

<style>  </style>

  </head>
  <body>

<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">ABC Laboratories</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link disabled link-warning fs-4" aria-disabled="true">Technician</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active fs-4"  href="technician_myprofile.php">My Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fs-4"  href="technician_patients.php">Patients</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle fs-4" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Doctors
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item fs-5 " href="add_doctor.php">Add Doctor</a></li>
            <li><a class="dropdown-item fs-5 " href="technician_doctors.php">View Doctors</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link fs-4"  href="technician_appointments.php">Appointments</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle fs-4" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Lab Reports
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item fs-5 " href="add_report.php">Add Lab Report</a></li>
            <li><a class="dropdown-item fs-5 " href="technician_lab_report_view.php">View Lab Reports</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle fs-4" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Reports
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item fs-5 " href="appointment.php">Monthly Sales Report</a></li>
            <li><a class="dropdown-item fs-5 " href="appointment_view.php">Demographic Report</a></li>
          </ul>
        </li>        
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
           <a class="nav-link fs-4" href="logout.php"> LOGOUT </a>
        </li>
     </ul>
    </div>
  </div>
</nav>


<div class="wrapper" >

    
    <div id="box" style="position:absolute; top:10%;left:50%; transform:translate(-50%);">
    <form  id="registraion_form"  > 
         
         <div style="font-size: 40px; margin-left: 180px; margin-bottom: 100px;color:white; ">My Profile </div>


         <br>

         

         <div>
               <label for="email" >Email Address:</label>
               <label for="email" ><?php echo  $_SESSION['my_profile']['email'];
?></label>
               
         </div>

         <br> 

         <div>
               <label for="f_name">First name:</label>
               <label for="email" ><?php echo  $_SESSION['my_profile']['fname'];
?></label>
         </div>

         <br> 

         <div>
               <label for="l_name">Last Name:</label>
               <label for="email" ><?php echo  $_SESSION['my_profile']['lname'];
?></label>
               
         </div>


         <br> 


         <div>
               <label for="dob">Date Of Birth:</label>
               <label for="email" ><?php echo  $_SESSION['my_profile']['date_of_birth'];
?></label>
               
         </div>

         <br> 


         <div>
               <label for="gender">Gender:</label>
               <label for="email" ><?php echo  $_SESSION['my_profile']['gender'];
?></label>
               
         </div>

         <br> 


         <div>
               <label for="contact">Contact:</label>
               <label for="email" ><?php echo  $_SESSION['my_profile']['contact_no'];
?></label>               
         </div>



         <br> 



         <div>
               <label for="address">Address:</label>
               <label for="email" ><?php echo  $_SESSION['my_profile']['address'];
?></label>   
               
         </div>

         <br> 


         <div>
               <label for="city">City:</label>
               <label for="email" ><?php echo  $_SESSION['my_profile']['city'];
?></label>
               
<br><br>


                 <div style="text-align: center;">
                    <a href="technician_editprofile.php" class="btn btn-primary btn-lg" >Edit Profile</a>
                 </div>

    </form>
    </div>


   </br></br></br></br><br><br>


<div class="push"> </div>
</div>





  </body>
</html>