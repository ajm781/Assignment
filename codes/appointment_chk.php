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

  if(!isset($_SESSION['aptStore'])){
    header("Location: appointment_view.php");
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
    <title>Confirm Appointment </title>
    <script type= "text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="/css/patient_upd.css">
<link rel="stylesheet" href="/css/footer.css">
    <style>
        .popup {
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            display: none;
        }
        .popup-content {
            background-color: white;
            margin: 15% auto;
            padding: 0px;
            border: 1px solid #888888;
            width: 40%;
            height: 50%;
            font-weight: bolder;
        }
        .popup-content button {
            display: block;
            margin: 0 auto;
        }
        .show {
            display: block;
        }
        h1 {
            color: green;
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
          <a class="nav-link fs-4"  href="patient_profile.php">My Profile</a>
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

    <div id="myPopup" class="popup">
        <div class="popup-content">
            <h1 style="color:green; text-align:center; ">
                  Payment Gateway 
              </h1>
<br>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form id="paymentForm" >
                <div class="form-group">
                    <label for="cardHolder">Card Holder</label>
                    <input type="text" class="form-control" id="cardHolder" placeholder="Enter Card Holder's Name" required>
                </div>
                <div class="form-group">
                    <label for="cardNumber">Card Number</label>
                    <input type="text" class="form-control" id="cardNumber" placeholder="Enter card number" pattern="[0-9]{16}" title="Please enter a valid Card Number" required>
                </div>
                <div class="row align-items-start">
                    <div class="col">
                        <label for="expiryDate">Expiry Date </label>
                        <input type="text" class="form-control" id="expiryDate" placeholder="MM/YY" pattern="[0-9]{2}/[0-9]{2}" title="Please enter a valid expiry date (MM/YY)" required>
                    </div>
                    <div class="col">
                        <label for="cvv">CVV</label>
                        <input type="text" class="form-control" id="cvv" placeholder="CVV" pattern="[0-9]{3}" title="Please enter a valid CVV (3 digits)" required>
                    </div>
                </div><br>
                <button type="submit" class="btn  btn-primary" onclick="testA()" >Submit Payment</button>
            </form>
        </div>
    </div>
</div>
<br>
            <button id="closePopup" class="btn  btn-secondary">
                  Close
              </button>
        </div>
    </div>


<br><br><br><br><br><br>

<div style="margin:0 auto; width:35%; text-align:center;">
<div style="font-size: 80px;  margin-bottom: 100px;  color:black; ">Summary</div>
<table class="table table-hover" id="java_3">
<thead class="table-dark">

</thead>
<tbody>

<tr>
<td> Doctor </td>
<td> Dr. <?php echo $_SESSION['aptStore'][1]; ?> </td>
<td>  </td>
</tr>

<tr>
<td> Test Type </td>
<td> <?php echo $_SESSION['aptStore'][0]; ?> </td>
<td>  </td>
</tr>

<tr>
<td> Appointment Date </td>
<td> <?php echo $_SESSION['aptStore'][2]; ?> </td>
<td>  </td>
</tr>

<tr>
<td>Patient Queue Number </td>
<td> <?php echo $_SESSION['aptStore'][3]; ?> </td>
<td>  </td>
</tr>

<tr>
<td> Price </td>
<td> <?php echo $_SESSION['aptStore'][4][0]; ?> </td>
<td>  </td>
</tr>

</tbody>
</table>

     <button id="myButton" type="submit" class="btn btn-lg btn-primary mt-3" style="background-color:orange;">Confirm Appointment</button>

     

    <script>
        myButton.addEventListener("click", function () {
            myPopup.classList.add("show");
        });
        closePopup.addEventListener("click", function () {
            myPopup.classList.remove("show");
        });
        window.addEventListener("click", function (event) {
            if (event.target == myPopup) {
                myPopup.classList.remove("show");
            }
        });




    document.getElementById('paymentForm').addEventListener('submit', function(event) {window.location.href ="appointment_pass.php";});






    // Auto-insert '/' in Expiry Date field after two digits
    document.getElementById('expiryDate').addEventListener('input', function(event) {
        let input = event.target.value;
        if (input.length === 2 && !input.includes('/')) {
            event.target.value = input + '/';
        }
    });

    function isValidCardNumber(cardNumber) {
        // Add your card number validation logic here
        return true;
    }

    function isValidExpiryDate(expiryDate) {
        // Add your expiry date validation logic here
        return true;
    }

    function isValidCVV(cvv) {
        // Add your CVV validation logic here
        return true;
    }


    </script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</body>
</html>