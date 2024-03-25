


<?php

   session_start();

if(isset($_POST["first_x"]))
  {	

    $var =$_POST["first_x"];    
     
   $conn = new mysqli("localhost", "root" , "" , "abc_lab" );
   if($conn->connect_error){
   die;
   }

   $sql="SELECT user_id,email,fname,lname,gender,address,contact_no,city,date_of_birth FROM user_det WHERE email='".$var."'  " ;
   $result = $conn->query($sql);
   if($result->num_rows>0)
   {
   
   $userdata = $result->fetch_assoc();
   $_SESSION["updPatientDet"]=$userdata;
   $response = array(    'data' => "valid"    );
               echo json_encode($response);
               
   }else{

               $response = array(    'data' => "Error"    );
               echo json_encode($response);
               $conn->close();
               die;
   }
            
               $conn->close();
               die;

}



?>