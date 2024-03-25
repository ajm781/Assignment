
<?php

   

 if(isset($_POST["first1"]))
  {	    
     
    		//something was posted
		$email = $_POST["first1"];
                



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