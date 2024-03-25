


<?php
session_start();





class ConnectDb {
  // Hold the class instance.
  private static $instance = null;
  private $conn;
  
  private $host = 'localhost';
  private $user = 'root';
  private $pass = '';
  private $name = 'abc_lab';
   
  // The db connection is established in the private constructor.
  private function __construct()
  {
    $this->conn = new PDO("mysql:host={$this->host};
    dbname={$this->name}", $this->user,$this->pass,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
  }
  
  public static function getInstance()
  {
    if(!self::$instance)
    {
      self::$instance = new ConnectDb();
    }
   
    return self::$instance;
  }
  
  public function getConnection()
  {
    return $this->conn;
  }
}



 if(isset($_POST["email"]) && isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["contact"]) && isset($_POST["address"]) && isset($_POST["city"]) && isset($_POST["password"]))
  {	    

             $var_em =$_SESSION["my_profile"]["user_id"];
     
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
                

      
     //$con = mysqli_connect("localhost", "root" , "" , "abc_lab" );
     $instance = ConnectDb::getInstance();
     $con=$instance->getConnection();


     if($email!=''){
         $fetch = "  SELECT  email FROM user_det WHERE email = '".$email."'  ";
         $stmt=$con->prepare($fetch);
         $stmt->execute();
         $row=$stmt->fetchColumn();
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
         $stmt=$con->prepare($fetch);
         $stmt->execute();
         $row=$stmt->fetchColumn();
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

         //mysqli_query($con, $Q2); 
                  $stmt=$con->prepare($Q2);
                  $stmt->execute();

     }

 

     if($contact!=''){
         $Q2 = "UPDATE user_det SET contact_no='".$contact."' WHERE user_id= '".$var_em."'  " ;

         //mysqli_query($con, $Q2); 
         $stmt=$con->prepare($Q2);
         $stmt->execute();
     }

     if($fname!=''){
         $Q2 = "UPDATE user_det SET fname='".$fname."' WHERE user_id= '".$var_em."'  " ;

         //mysqli_query($con, $Q2); 
         $stmt=$con->prepare($Q2);
         $stmt->execute();
     }

     if($lname!=''){
         $Q2 = "UPDATE user_det SET lname='".$lname."' WHERE user_id= '".$var_em."'  " ;

         //mysqli_query($con, $Q2); 
         $stmt=$con->prepare($Q2);
         $stmt->execute();
     }

     if($address!=''){
         $Q2 = "UPDATE user_det SET address='".$address."' WHERE user_id= '".$var_em."'  " ;

         //mysqli_query($con, $Q2); 
         $stmt=$con->prepare($Q2);
         $stmt->execute(); 
     }


     if($city!=''){
         $Q2 = "UPDATE user_det SET city='".$city."' WHERE user_id= '".$var_em."'  " ;

         //mysqli_query($con, $Q2); 
         $stmt=$con->prepare($Q2);
         $stmt->execute();
     }

     if($gender!=$_SESSION["my_profile"]["gender"]){
         $Q2 = "UPDATE user_det SET gender='".$gender."' WHERE user_id= '".$var_em."'  " ;

         //mysqli_query($con, $Q2); 
         $stmt=$con->prepare($Q2);
         $stmt->execute();
     }

     if($var_dob!=$_SESSION["my_profile"]["date_of_birth"]){
         $Q2 = "UPDATE user_det SET date_of_birth='".$var_dob."' WHERE user_id= '".$var_em."'  " ;

         //mysqli_query($con, $Q2); 
         $stmt=$con->prepare($Q2);
         $stmt->execute();
     }

     if($password!=''){
         $Q2 = "UPDATE user_login SET user_password=SHA('".$password."') WHERE user_id= '".$var_em."'  " ;

         //mysqli_query($con, $Q2); 
         $stmt=$con->prepare($Q2);
         $stmt->execute();
     }     
              

               //var_dump($con);         

               $response = array(    'data' => "done"    );
     
               echo json_encode($response);
               die;
    
  }



?>