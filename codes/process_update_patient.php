


<?php
session_start();



   
$var_em =$_SESSION["updPatientDet"]["user_id"];

 if(isset($_POST["email"]) && isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["contact"]) && isset($_POST["address"]) && isset($_POST["city"]) && isset($_POST["password"]))
  {	    
     
    		//something was posted
		$email = $_POST["email"];
		$fname = $_POST["fname"];
                $lname = $_POST["lname"];
		$contact = $_POST["contact"];
		$address = $_POST["address"];
		$city = $_POST["city"];
		$password = $_POST["password"]; 
		$var_dob = $_POST["selectedDate"]; 
		$gender = $_POST["gender"]; 
                


     $con = mysqli_connect("localhost", "root" , "" , "abc_lab" );

     if($email!=''){
         $fetch = "  SELECT  email FROM user_det WHERE email = '".$email."'  ";
         $que=mysqli_query($con, $fetch);
         $row= mysqli_num_rows($que);
         if($row==0)
         {
              
              
         }else{
              $response = array(    'data' => "Email already taken"    );     
              echo json_encode($response);
              die;
         }
         
     }

     if($contact!=''){
         $fetch = "  SELECT  contact_no FROM user_det WHERE contact_no = '".$contact."'  ";
         $que=mysqli_query($con, $fetch);
         $row= mysqli_num_rows($que);
         if($row==0)
         {
              
              
         }else{
              $response = array(    'data' => "Contact already taken"    );     
              echo json_encode($response);
              die;
         }
         
     }



     if($email!=''){
         $Q2 = "UPDATE user_det SET email='".$email."' WHERE user_id= '".$var_em."'  " ;

         mysqli_query($con, $Q2); 
     }

     if($contact!=''){
         $Q2 = "UPDATE user_det SET contact_no='".$contact."' WHERE user_id= '".$var_em."'  " ;

         mysqli_query($con, $Q2); 
     }

     if($fname!=''){
         $Q2 = "UPDATE user_det SET fname='".$fname."' WHERE user_id= '".$var_em."'  " ;

         mysqli_query($con, $Q2); 
     }

     if($lname!=''){
         $Q2 = "UPDATE user_det SET lname='".$lname."' WHERE user_id= '".$var_em."'  " ;

         mysqli_query($con, $Q2); 
     }

     if($address!=''){
         $Q2 = "UPDATE user_det SET address='".$address."' WHERE user_id= '".$var_em."'  " ;

         mysqli_query($con, $Q2); 
     }


     if($city!=''){
         $Q2 = "UPDATE user_det SET city='".$city."' WHERE user_id= '".$var_em."'  " ;

         mysqli_query($con, $Q2); 
     }

     if($gender!=$_SESSION["updPatientDet"]["gender"]){
         $Q2 = "UPDATE user_det SET gender='".$gender."' WHERE user_id= '".$var_em."'  " ;

         mysqli_query($con, $Q2);
     }

     if($var_dob!=$_SESSION["updPatientDet"]["date_of_birth"]){
         $Q2 = "UPDATE user_det SET date_of_birth='".$var_dob."' WHERE user_id= '".$var_em."'  " ;

         mysqli_query($con, $Q2);
     }

     if($password!=''){
         $Q2 = "UPDATE user_login SET user_password=SHA('".$password."') WHERE user_id= '".$var_em."'  " ;

         mysqli_query($con, $Q2);
     }     
              

               mysqli_close($con);         

               $response = array(    'data' => "done"    );
     
               echo json_encode($response);
               die;
     
  }



?>