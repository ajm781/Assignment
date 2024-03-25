<?php
session_start();
?>



<!DOCTYPE html>
<html>
  <head>

<title> Patient Registration </title>

<script type= "text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" ></script>
<script type= "text/javascript" src="/scripts/patient_reg_script.js" ></script>
<link rel="stylesheet" href="/css/patient_reg_style.css">
<link rel="stylesheet" href="/css/footer.css">
<link rel="stylesheet" href="/css/patient_upd.css">

  </head>
  <body>




<div class="wrapper">

      <h3 style= " text-align:center;"> WELCOME TO </h3>
      <h1 style= " text-align:center;"> ABC Laboratories </h1>

    
    <div id="box">
    <form  id="registraion_form" > 
         
         <div style="font-size: 40px; margin-left: 180px; margin-bottom: 100px;color:white; ">REGISTRATION </div>
         <p><span class="require">* required field</span></p>

         <br>

         

         <div>
               <label for="email" >Email Address:</label>
               <input id="txt_email" name="email" class="txt_input"  type="text"  >
               <span class="require"> * </span>
               
         </div>

         <br> 

         <div>
               <label for="f_name">First name:</label>
               <input id="txt_fname" name="fname" class="txt_input"  type="text"  >
               <span class="require"> * </span>
         </div>

         <br> 

         <div>
               <label for="l_name">Last Name:</label>
               <input id="txt_lname" name="lname" class="txt_input"  type="text"  >
               <span class="require"> * </span>
               
         </div>


         <br> 


         <div>
               <label for="dob">Date Of Birth:</label>
               <input id="user_dob" name="dob" class="txt_input"  type="date"  >
               <span class="require"> * </span>          
               
         </div>

         <br> 


         <div>
               <label for="gender">Gender:</label>
               <select id="gender" name="gender" class="txt_input"  >
               <option value=""  >Select Gender </option>
               <option value="F" >Female </option>
               <option value="M">Male </option>
               </select>
               <span class="require"> * </span>          
               
         </div>

         <br> 


         <div>
               <label for="contact">Contact:</label>
               <input id="txt_contact" name="contact" class="txt_input"  type="text"  >
               <span class="require"> * </span>          
               
         </div>



         <br> 



         <div>
               <label for="address">Address:</label>
               <input id="txt_address" name="address" class="txt_input"  type="text"  >
               <span class="require"> * </span>
               
         </div>

         <br> 


         <div>
               <label for="city">City:</label>
               <input id="txt_city" name="city" class="txt_input"  type="text"  >
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


         <button type="button" id="button1" class="btn btn-success" onclick="myfunction()">ADD</button>
         <input id="button2" type="reset" value="CLEAR" ><br><br>

         <div style="font-size: 25px; margin-left: 0px; margin-top: 50px;color:white; "> Already a user? </div>
         <div style="font-size: 25px; margin-left: 0px; margin-bottom: 0px;color:white; "> <a href="login.php"> Login here </a> </div>
    </form>
    </div>


   </br></br></br></br><br><br>


<div class="push"> </div>
</div>






  </body>
</html>