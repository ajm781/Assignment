<?php
session_start();

$role_tst =$_SESSION["IDlog"];
if (!($_SESSION["IDlog"]))
{

    header("Location: login.php");
    die;
}else if($role_tst['role_id']==2)
{
//include ("nav_technician_BACKUP.php");
}else{
    header("Location: login.php");
    die;
}



?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Upcoming Appointments</title>
    <script type= "text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


  <title> ITEM </title>
<script type= "text/javascript" src="/scripts/add_item.js" ></script>
<link rel="stylesheet" href="/css/add_item.css">
<link rel="stylesheet" href="/css/footer.css">
<link rel="stylesheet" href="/css/technician_patients_crt.css">


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
          <a class="nav-link active fs-4"  href="technician_appointments.php">Appointments</a>
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


   <br><br><br>

<div class="push"> </div>
</div>

<div style="margin:0 auto; width:80%; text-align:center;">
<div style="font-size: 80px;  margin-bottom: 100px;  color:black; ">UPCOMING APPOINTMENTS</div>
<table class="table table-hover" id="java_3">
<thead class="table-dark">
<tr>
<th scope="col">Appointment Reference Id</th>
<th scope="col">Doctor</th>
<th scope="col">Test Type</th>
<th scope="col">Appointment Date</th>
<th scope="col">Price</th>
</tr>
</thead>
<tbody>


<?php

    $connection = mysqli_connect("localhost", "root" , "" , "abc_lab" );
    $var_test_2 = $_SESSION["IDlog"];

   $query2 = "SELECT appointment_ref_num, doctor_lname, test_type, pat_queue_num, appointment_date, price  FROM appointments WHERE appointment_date>= CURRENT_TIMESTAMP ORDER BY appointment_date ASC";
   $result = mysqli_query($connection, $query2);

   while($row=mysqli_fetch_array($result)){
      echo "<tr>";
      echo "<th scope='row'>".$row['appointment_ref_num']."</th>";
      echo "<td>Dr. ".$row['doctor_lname']."</td>";
      echo "<td>".$row['test_type']."</td>";
     echo "<td>".$row['appointment_date']."</td>";
      echo "<td>".$row['price']."</td>";
      echo "</tr>";    
   }
?>


</tbody>
</table>
</div>

<br><br> <br> <br> 



<script>
function deleteRow(r) {
  var i = r.parentNode.parentNode.rowIndex;
  var java2=document.getElementById("java_3");
  var first1=java2.rows[i].cells.item(0).innerHTML;

                      $.ajax({   url: 'technician_delete_patients.php' ,type: 'post',data: {first1: first1 } , success:function(response) {var output=jQuery.parseJSON(response);if(output.data=='Deleted patient'){ document.getElementById("java_3").deleteRow(i);}}});}

function patientUpdate(r) {
  var x = r.parentNode.parentNode.rowIndex;
  var java_docs=document.getElementById("java_3");
  var first_x=java_docs.rows[x].cells.item(0).innerHTML;

                      $.ajax({   url: 'update_pass.php' ,type: 'post',data: {first_x: first_x } , success:function(response) {var output=jQuery.parseJSON(response);if(output.data=='valid'){location.href="update_patient.php";}}});
  
}

</script>


  </body>
</html>
