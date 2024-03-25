<?php
session_start();

$role_tst =$_SESSION["IDlog"];
if (!($_SESSION["IDlog"]))
{

    header("Location: login.php");
    die;
}else if($role_tst['role_id']==1)
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
    <title>Bootstrap Example</title>
    <script type= "text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


  <title> ITEM </title>

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
          <a class="nav-link disabled link-warning fs-4" aria-disabled="true">Patient</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fs-4"  href="patient_myprofile.php">My Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active fs-4" href="patient_lab_report_view.php">Lab Reports</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle fs-4" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Appointments
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item fs-5 " href="appointment.php">Make Appointment</a></li>
            <li><a class="dropdown-item fs-5 " href="appointment_view.php">View Appointments</a></li>
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
<div style="font-size: 80px;  margin-bottom: 100px;  color:black; ">LAB REPORTS</div>
<table class="table table-hover" id="java_3">
<thead class="table-dark">
<tr>
<th scope="col">Lab Report Id</th>
<th scope="col">Appointment Id</th>
<th scope="col">Patient </th>
<th scope="col">Doctor</th>
<th scope="col">Test Type</th>
<th scope="col">Date Issued</th>
<th scope="col"></th>
</tr>
</thead>
<tbody>


<?php

    $connection = mysqli_connect("localhost", "root" , "" , "abc_lab" );
    $var_test_2 = $_SESSION["IDlog"];

   $query2 = "SELECT * FROM lab_report WHERE patient_id=".$_SESSION['IDlog']['user_id']."  ";
   $result = mysqli_query($connection, $query2);

   while($row=mysqli_fetch_array($result)){
      echo "<tr>";
      echo "<th scope='row'>".$row['0']."</th>";
      echo "<td>".$row[1]."</td>";
      echo "<td>".$row['patient_fname']." ".$row['patient_lname']."</td>";
      echo "<td>Dr. ".$row['doctor_lname']."</td>";
      echo "<td>".$row['test_type']."</td>";
      echo "<td>".$row['date_of_issue']."</td>";
      echo "<td> <button class='' onclick='patientUpdate(this)'><img src='view.png' ></button> </td>";
      echo "</tr>";    
   }
?>


</tbody>
</table>
</div>

<br><br> <br> <br> 



<script>


function patientUpdate(r) {

  var x = r.parentNode.parentNode.rowIndex;
  var java_docs=document.getElementById("java_3");
  var first_x=java_docs.rows[x].cells.item(0).innerHTML;

  $.ajax({url: 'process.php' ,type: 'post',data: {first_x: first_x } , success:function(response) {var output=jQuery.parseJSON(response);if(output.data=='valid'){location.href="patient_lab_report_doc.php";}}});
  
}

</script>


  </body>
</html>
