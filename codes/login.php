
<?php 
   session_start();
   


   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Login </title>
      <style type="text/css">

      a:visited{
         color:orange;
         background-color:transparent;
         text-decoration:none;
      }

      a:link{
         color:orange;
         background-color:transparent;
         text-decoration:none;
      }

      label {
        display: inline-block;
        width: 150px;
        color: #0;
      }

      input {
        padding: 5px 10px;
      }

     .input_txt{

		height: 30px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #000;
		width: 40%;
	}      

     #text{

		height: 30px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #000;
		width: 40%;
	}

         #button{
         padding: 10px;
         width: 200px;
         color: black;
         font-size:20px;
         background-color: #18B49F;
         border: none;
         position:relative;
         left:30%;
         }
         #box{
         background-color: black;
         color:white;
         margin: auto;
         width: 500px;
         padding: 50px;
         }



       body{
       background-color: #2274C0;
       }





      </style>
   </head>
   <body>
<script type= "text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" ></script>
<div class="wrapper">

      <h3 style= " text-align:center;"> WELCOME TO </h3>
      <h1 style= " text-align:center;"> ABC Laboratories </h1>
      <div id="box">
         <form method="post" action="#">

            <div style="font-size: 20px;margin: 10px;color: white; text-align:center; font-size:25px;"> <b>LOGIN PAGE </b></div>


           <br><br><br>

                    <div>
               <label >EMAIL</label>
               <input id="txt_username" class="input_txt" name="user_name"  type="text"  >

               
         </div>

         <br> 

         <div>
               <label >PASSWORD</label>
               <input id="txt_password" class="input_txt" name="password" type="password"  >

         </div>


<br><br><br>
         <button type="button" id="button"  onclick="myfunction()">LOGIN</button> 


         <div style="font-size: 25px; margin-left: 0px; margin-top: 80px;color:white; "> Not registered yet? </div>
         <div style="font-size: 25px; margin-left: 0px; margin-bottom: 0px;color:white; "> <a href="patient_reg.php"> Register here </a> </div>



         </form>
      </div>

  </br>


<br><br><br><br>


<div class="push"> </div>
</div>



<script>

function myfunction(){

	var username = document.getElementById("txt_username").value;
	var password = document.getElementById("txt_password").value;

        if(username == ''){ //check username not empty
		alert('please enter username!'); 
	}
        else if(password == ''){ // check password not empty
                alert('please enter password!');
        }
        else{			
		$.ajax({url: 'lab_login_chk.php',type: 'post',data: {username:username,password:password},success: function(response){var output=jQuery.parseJSON(response);if(output.data=='Technician'){alert('Success');window.location = 'technician_myprofile.php';}else if(output.data=='User'){alert('Success');window.location = 'patient_myprofile.php';}else if(output.data=='Doctor'){window.location = 'doc.php';}else{alert(output.data);}}});}

}



</script>

   </body>
</html>
