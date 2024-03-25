


<?php

   

 if(isset($_POST["first1"]))
  {	    
     
    		//something was posted
		$email = $_POST["first1"];
                


     //$con = mysqli_connect("localhost", "root" , "" , "abc_lab" );

     //Sanatize input to prevent sql injection
     //$id=$conn->real_escape_string($email);


   $conn = new mysqli("localhost", "root" , "" , "abc_lab" );
   if($conn->connect_error){
   die;
   }

   $sql="DELETE FROM user_det WHERE email='".$email."'  " ;

   if($conn->query($sql)===TRUE)
   {
   $response = array(    'data' => "Deleted patient"    );
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