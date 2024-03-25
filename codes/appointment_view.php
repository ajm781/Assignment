<?php
session_start();


if (!($_SESSION["IDlog"]))
{

    header("Location: login.php");
    die;
}else if($_SESSION["IDlog"]["role_id"]==1)
{
//include ("nav_patient.php");
}else{
    header("Location: login.php");
    die;
}

if(isset($_SESSION['aptStore'])){
  unset($_SESSION['aptStore']);
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
<link rel="stylesheet" href="/css/patient_upd.css">
<link rel="stylesheet" href="/css/footer.css">


<script>
function deleteRow(r) {
  var i = r.parentNode.parentNode.rowIndex;
  var java2=document.getElementById("java_3");
  var first1=java2.rows[i].cells.item(0).innerHTML;

                      $.ajax({url: 'technician_delete_patients.php',type: 'post',data: {first1: first1 } ,success:function(response) {var output=jQuery.parseJSON(response);if(output.data=='Deleted patient'){document.getElementById("java_3").deleteRow(i);}}});

}

function patientUpdate(r) {
  var x = r.parentNode.parentNode.rowIndex;
  var java_docs=document.getElementById("java_3");
  var first_x=java_docs.rows[x].cells.item(0).innerHTML;

                      $.ajax({url: 'update_pass.php' ,type: 'post',data: {first_x: first_x } , success:function(response) {var output=jQuery.parseJSON(response);if(output.data=='valid'){location.href="update_patient.php";}}});
  
}

</script>

<style>
.link-hover:hover{
  background-color:white;
  color:black;
}
</style>
  </head>
 
<body class="p-3 m-0 border-0 bd-example m-0 border-0">

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
          <a class="nav-link fs-4" href="patient_lab_report_view.php">Lab Reports</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle fs-4" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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



  <br><br><br>

<div class="push"> </div>
</div>

<div style="margin:0 auto; width:80%; text-align:center;">
<div style="font-size: 80px;  margin-bottom: 100px;  color:black; ">Upcoming Appointments</div>
<table class="table table-hover fs-5" id="java_3">
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

   $query2 = "SELECT appointment_ref_num, doctor_lname, test_type, pat_queue_num, appointment_date, price  FROM appointments WHERE patient_id=".$_SESSION["IDlog"]["user_id"]." AND appointment_date>= CURRENT_TIMESTAMP ORDER BY appointment_date ASC";
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



</script>   



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</body>
</html>