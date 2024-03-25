<?php
   session_start();


if(isset($_POST["username"]) && isset($_POST["password"])){

     $connection = mysqli_connect("localhost", "root" , "" , "abc_lab" );

                        $user_name= $_POST["username"];
                        $password = $_POST["password"];

   			//read from database
   			//$query1 = "select * from user_det where email = '$user_name' limit 1";
                        $query1=" SELECT user_det.email, user_login.user_password FROM user_det LEFT JOIN user_login ON user_det.user_id=user_login.user_id WHERE user_login.user_password=SHA('.$password.') limit 1";

                        $query2=" SELECT user_det.email, user_login.user_password FROM user_det LEFT JOIN user_login ON user_det.user_id=user_login.user_id WHERE user_login.user_password='$password' limit 1";
   			$result = mysqli_query($connection, $query1);
   
   			if($result)
   			{
   				if($result && mysqli_num_rows($result) > 0)
   				{
   
   					$userdata = mysqli_fetch_assoc($result);

                                                  $_SESSION["IDlog"] = $userdata;
                                                  $response = array(    'data' => "Success"    );     
                                                  echo json_encode($response);
                                                  die;

   				} else
                                   {
                                                  $response = array(    'data' => "Invalid username or password. Please try again"    );    
                                                  echo json_encode($response);
                                                  die;
                                             
                                   }
   			}

              

}



?>