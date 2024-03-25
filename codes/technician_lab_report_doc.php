<?php
session_start();
$role_tst =$_SESSION["IDlog"];
if (!($_SESSION["IDlog"]))
{
  header("Location: login.php");
  die;
}
else if($role_tst['role_id']==2)
{
}
else {
  header("Location: login.php");
  die;
}
if (!($_SESSION['lab_rep']))
{
  header("Location: technician_lab_report_view.php");
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
    <title>Laboratory Report</title>
    <script type= "text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src=
 "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <script src=
"https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js">
    </script>
    <script src=
 "https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js">
    </script>

<script type= "text/javascript" src="/scripts/add_item.js" ></script>
<link rel="stylesheet" href="/css/add_item.css">
<link rel="stylesheet" href="/css/footer.css">
<link rel="stylesheet" href="/css/technician_patients_crt.css">

<style>

.s100 {
  border:2px solid #333;
  width:210mm;
  height:297mm;
  background-color:white;
}
.test1 {
  width:100;
  height:5px;
  border-bottom:1px solid black;
}
</style>


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
          <a class="nav-link fs-4"  href="technician_appointments.php">Appointments</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active  fs-4" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
<div style="font-size: 80px;  margin-bottom: 100px;  color:black; ">LAB REPORT</div>
</div>


<div class="s100" id="s1200" style="margin-left:auto; margin-right:auto; width:50%; " >
    <div style="text-align: center">
        <h1 style="text-align: center;"> ABC Laboratories </h1>
    </div>

   <br>

    <div style="text-align: center">
        <h2 style="text-align: center;"> LABORATORY
&nbsp;
REPORT </h2>
    </div>

   <br>

    <div style="text-align: right;">
        <h20 style="text-align: right;"> 8th Avenue,
</h20>
    </div>
    <div style="text-align: right;">
        <h20 style="text-align: right;"> Colombo 5,
</h20>
    </div>
    <div style="text-align: right;">
        <h20 style="text-align: right;"> Tel:+94 111 5532800 </h20>
    </div>

    <div style="text-align: right;">
        <h20 style="text-align: right;"> Email:abc.lab@gmail.com </h20>
    </div>
   
   <div class="test1"></div>

   <br>

    <div style="text-align: left;">
        <h20 style="text-align: left;"> Patient Id :<?php  echo  $_SESSION['lab_rep']['patient_id'];
?> </h20>
   </div>
    <div style="text-align: left;">
        <h20 style="text-align: left;"> Patients Name :<?php  echo  $_SESSION['lab_rep']['patient_fname'];
?> <?php  echo  $_SESSION['lab_rep']['patient_lname'];
?> </h20>
    </div> 
    <div style="text-align: left;">
        <h20 style="text-align: left;"> Appointment Id : <?php  echo  $_SESSION['lab_rep']['appointment_ref_num'];
?></h20>
    </div> 
    <div style="text-align: left;">
        <h20 style="text-align: left;"> Date of Birth : <?php  echo  $_SESSION['lab_rep']['patient_dob'];
?></h20>
    </div>
    <div style="text-align: left;">
        <h20 style="text-align: left;"> Doctor :Dr. <?php  echo  $_SESSION['lab_rep']['doctor_lname'];
?> </h20>
    </div>  
    <div style="text-align: left;">
        <h20 style="text-align: left;"> Technician :<?php  echo  $_SESSION['lab_rep']['technician_fname'];
?> <?php  echo  $_SESSION['lab_rep']['technician_lname'];
?> </h20>
    </div>    

   <br>
   <br>

    <div style="text-align: left;">
        <h20 style="text-align: left;"> Date Created :<?php  echo  $_SESSION['lab_rep']['date_of_issue'];
?>  </h20>
    </div>   

   <br>

   <div class="test1"></div>

  <div style="width:100%;">

  <div style="float:left; width:40%"><b>Test Type</b></div>  
  <div style="float:left; width:40%"><b>Result</b></div>
  <div style="float:left; width:20%"><b>Biological Reference</b></div>

  </div>

  <br><br><br><br>

  <div style="width:100%;">

    <div style="float:left; width:40%"><?php  echo  $_SESSION['lab_rep']['test_type'];
?></div>  
    <div style="float:left; width:40%"><?php  echo  $_SESSION['lab_rep']['test_result'];
?></div>
    <div style="float:left; width:20%"><?php  echo  $_SESSION['lab_rep']['test_ref'];
?></div>

  </div>

   <br><br><br><br><br><br><br><br>

   <div style="text-align:center;">** End of Report **</div>

   </div>



<br><br><br><br><br><br><br>



<button onclick="convertHTMLtoPDF()" class="btn btn-lg btn-primary" style="background-color:orange; display:block; margin:auto; width:20%;" >Download</button>

<br><br><br><br><br><br><br>

		<script>
			const button = document.getElementById('download-button');
function generatePDF() {
  // Choose the element that your content will be rendered to.
				const element = document.getElementById('s1200');
  // Choose the element and save the PDF for your user.
				html2pdf().from(element).save();
}
button.addEventListener('click',
generatePDF);
function convertHTMLtoPDF() {
  const {
    jsPDF 
  }
  = window.jspdf;
  let doc = new jsPDF('l',
  'mm',
  [1500,
  1500]);
  
            let pdfjs = document.querySelector('#s1200');
  doc.html(pdfjs,
 {
    callback: function(doc) {
      doc.save("Laboratory Report.pdf");
    }
    ,
    x: 0,
    y: 0
            
  }
  );
}
</script>

  </body>
</html>