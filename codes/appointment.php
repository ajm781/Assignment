<?php
session_start();

if(isset($_SESSION['aptStore'])){
  unset($_SESSION['aptStore']);
}

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


$var_email=$_SESSION["IDlog"]["email"];

$connection = mysqli_connect("localhost", "root" , "" , "abc_lab" );

$query1=" SELECT user_id, email , fname, lname,contact_no, date_of_birth,address,city , gender FROM user_det WHERE email='".$var_email."' ";

$result = mysqli_query($connection, $query1);


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
    <title>Make Appointment</title>
    <script type= "text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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




<br><br> <br> <br> 


<br><br> <br> <br> 



<br><br> <br> <br> 

<div  style="margin:0 auto; width:50%; text-align:center;">
<select class="form-select form-select-lg mb-3" id="selTest" onChange="validateSelTestType()" >
   <option value="">Select Test</option>

   <?php 

    $connection = mysqli_connect("localhost", "root" , "" , "abc_lab" );
    $var_test_2 = $_SESSION["IDlog"];

   $query2 = "SELECT type_name FROM test_type";
   $result = mysqli_query($connection, $query2);

   while($row=mysqli_fetch_array($result)){
      echo "<option value='".$row['type_name']."'   >  ".$row['type_name']."</option>"; 
   } 



   ?> 
</select>
</div>

<br><br> <br> <br> 

<div  style="margin:0 auto; width:50%; text-align:center;" >
<select class="form-select form-select-lg mb-3" id="selDoctor" onChange="validateSelDoctor()">
   <option value="">Select Doctor</option>
   <option value="Nam1"> </option>
</select>
</div>


<br><br> <br> <br> 

<div  style="margin:0 auto;  text-align:center;">
<input style="width:50%; font-size: 2rem" id="dateID" type="date" />
</div>

<br><br> <br> <br> 

<div  style="margin:0 auto;  text-align:center;">

<button type="button" class="btn btn-secondary btn-lg" onclick="bookApt()" >BOOK APPOINTMENT </button>
</div>




<script>

    let array_200;

    function validateSelection(){
          var var_sel=document.getElementById("selTest").value;
          if(var_sel ===""){
              alert("Please select a Test Type. ");
          }else{
              
              document.getElementById("java_3").focus();
          }
    }

    function validateSelection2(){
          var var_sel=document.getElementById("selType").value;
          var var_sel2=document.getElementById("selDoctor").value;
          if(var_sel2 ===""){
              alert("Please select a Doctor!!!!. ");
          }else{
              if(var_sel ===""){
              alert("Please select a Test Type!!!!. ");
              }else{
                    
              }
          }
    }


    function validateSelTestType(){
          let array_100;
          var var_sel=document.getElementById("selTest").value;
          
          if(var_sel ===""){
              alert("Please select a Test Type! ");
          }else{
              var selectBox=document.getElementById("selDoctor");
              removeAll(selectBox);
              <?php echo 'var select =document.getElementById("selDoctor"); var option=document.createElement("option"); option.text="Select Doctor"; option.value=""; select.add(option);' ?>
              var jsVariable=var_sel;
                      $.ajax({   
                       url: 'appointment_process.php' ,
	               type: 'post',
                       data: {jsVariable: jsVariable } , 
                       success:function(response) {

                       var var_testing200=document.getElementById("selDoctor");
                       



                       var output=jQuery.parseJSON(response);  
                         array_100=output.data;  
                         array_200=output.data;  
                         for(let i=0; i<array_100.length;i++)
                         {
                             
                  
                             var option=document.createElement("option"); option.text="Dr. "+array_100[i][0]; option.value=array_100[i][0]; var_testing200.add(option);
                          }
                      
                       }  
                     });

              
              
              document.getElementById("selDoctor").focus(); 
              document.getElementById("selDoctor").scrollIntoView();
          }
    }

    function validateSelDoctor(){
          var var_selType=document.getElementById("selTest").value;
          var var_selDoctor=document.getElementById("selDoctor").value;
          if(var_selDoctor ===""){
              alert("Please select a Doctor!!!!. ");
              
          }else{
              if(var_selType ===""){
              alert("Please select a Test Type!!!!. ");
              }else{
                    
              }
          }
    }

    function removeAll(selectBox){
        while(selectBox.options.length>0) {
            selectBox.remove(0);
        }
    }

    function bookApt(){
         var var_selType=document.getElementById("selTest").value;
         var var_doc=document.getElementById("selDoctor").value;
         var var_date= document.getElementById("dateID").value;
         if(var_selType ==''){
         }else if(var_doc ==''){
         }else if(var_date ==''){
         }else{
           $.ajax({url: 'appointment_process.php' ,type: 'post',data: {var_selType: var_selType , var_doc:var_doc, var_date:var_date } ,success:function(response) {var output=jQuery.parseJSON(response);if(output.data=="exist"){alert("You have already made an appointment on this date. Please select a different date")}else{window.location = 'appointment_chk.php';}}  });
         }
    }


   var dtToday=new Date();
   var month=dtToday.getMonth()+1;
   var day=dtToday.getDate()+1;
   var year=dtToday.getFullYear();

   var day_200=dtToday.getDate();
   var month_200=dtToday.getMonth()+2;

   if(month < 10)
   {
     month='0' + month.toString();
     month_200='0' + month_200.toString();

   }
   if(day < 10)
   {
     day='0' + day.toString();
     day_200='0' + day_200.toString();
   }

   var minDate = year + '-' + month + '-' + day ;
   var maxDate = year + '-' + month_200 + '-' + day_200;
   $('#dateID').attr('min',minDate);
   $('#dateID').attr('max',maxDate);

</script>


  </body>
</html>