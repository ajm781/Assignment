<?php
session_start();

$role_tst =$_SESSION["IDlog"];
if (!($_SESSION["IDlog"]))
{

    header("Location: login.php");
    die;
}else if($role_tst['role_id']==2)
{
//include ("nav_technician.php");
}else{
    header("Location: login.php");
    die;
}



/*
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
           $var=$_POST["dob"];
           echo "<script> alert('".$var."'); </script>";
        }


if(isset($_POST['dob'])){
           $var=$_POST["dob"];
           echo "<script> alert('".$var."'); </script>";
}

*/

?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Update Patient</title>
    <script type= "text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script type= "text/javascript" src="/scripts/patient_upd.js" ></script>
<link rel="stylesheet" href="/css/patient_upd.css">
<link rel="stylesheet" href="/css/footer.css">



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
          <a class="nav-link fs-4"  href="technician_myprofile.php">My Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active fs-4"  href="technician_patients.php">Patients</a>
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
            <li><a class="dropdown-item fs-5 " href="appointment.php">Add Lab Report</a></li>
            <li><a class="dropdown-item fs-5 " href="appointment_view.php">View Lab Reports</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle fs-4" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Reports
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item fs-5 " href="#">Monthly Sales Report</a></li>
            <li><a class="dropdown-item fs-5 " href="#">Demographic Report</a></li>
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


<div class="wrapper">

    
    <div id="box" style="position:absolute; top:10%;left:50%; transform:translate(-50%);">
    <form  id="registraion_form"  > 
         
         <div style="font-size: 40px; margin-left: 180px; margin-bottom: 100px;color:white; ">Edit Patient </div>
         <p><span class="require">* required field</span></p>

         <br>

         

         <div>
               <label for="email" >Email Address:</label>
               <input id="txt_email" name="email" class="txt_input"  type="text" placeholder="<?php echo  $_SESSION['updPatientDet']['email']; ?>"  >
               <span class="require"> * </span>
               
         </div>

         <br> 

         <div>
               <label for="f_name">First name:</label>
               <input id="txt_fname" name="fname" class="txt_input"  type="text" placeholder="<?php echo  $_SESSION['updPatientDet']['fname']; ?>" >
               <span class="require"> * </span>
         </div>

         <br> 

         <div>
               <label for="l_name">Last Name:</label>
               <input id="txt_lname" name="lname" class="txt_input"  type="text" placeholder="<?php echo  $_SESSION['updPatientDet']['lname']; ?>" >
               <span class="require"> * </span>
               
         </div>


         <br> 


         <div>
               <label for="dob">Date Of Birth:</label>
               <input id="user_dob" name="dob" class="txt_input"  type="date" value="<?php echo  $_SESSION['updPatientDet']['date_of_birth']; ?>" type="text" />
               <span class="require"> * </span>          
               
         </div>

         <br> 


         <div>
               <label for="gender">Gender:</label>
               <select id="gender" name="gender" class="txt_input"  >
               <option value="<?php echo  $_SESSION['updPatientDet']['gender']; ?>" disabled selected hidden >  <?php echo  $_SESSION['updPatientDet']['gender']; ?> </option>
               <option value="F" >F </option>
               <option value="M">M </option>
               </select>
               <span class="require"> * </span>          
               
         </div>

         <br> 


         <div>
               <label for="contact">Contact:</label>
               <input id="txt_contact" name="contact" class="txt_input"  type="text" placeholder="<?php echo  $_SESSION['updPatientDet']['contact_no']; ?>"  >
               <span class="require"> * </span>          
               
         </div>



         <br> 



         <div>
               <label for="address">Address:</label>
               <input id="txt_address" name="address" class="txt_input"  type="text" placeholder="<?php echo  $_SESSION['updPatientDet']['address']; ?>" >
               <span class="require"> * </span>
               
         </div>

         <br> 


         <div>
               <label for="city">City:</label>
               <input id="txt_city" name="city" class="txt_input"  type="text" placeholder="<?php echo  $_SESSION['updPatientDet']['city']; ?>"  >
               <span class="require"> * </span>
               
         </div>

         <br> 


         <div>
               <label for="password">Password:</label>
               <input id="txt_password" name="password" class="txt_input"  type="password"  >
               <span class="require"> * </span>
               
         </div>


         <br> 


         <div>
               <label for="conf_password">Confirm Password:</label>
               <input id="txt_conf_password" name="conf_password" class="txt_input"  type="password"  >
               <span class="require"> * </span>
               
         </div>
         <br/><br/><br/> 


         <button type="button" id="button1" class="btn btn-success" name="upd" onclick="myfunction()">UPDATE</button>
         <input id="button2" type="reset" value="CLEAR" ><br><br>

    </form>
    </div>


   </br></br></br></br><br><br>


<div class="push"> </div>
</div>





  </body>
</html>