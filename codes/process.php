


<?php

   //session_start();
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


 if(isset($_POST["email"]) && isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["contact"]) && isset($_POST["address"]) && isset($_POST["city"]) && isset($_POST["password"]) && !isset($_POST["var_spec"]))
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
       


     //$con = mysqli_connect("localhost", "root" , "" , "abc_lab" );
         $instance = ConnectDb::getInstance();
         $con=$instance->getConnection();


     $fetch = "  SELECT email FROM user_det WHERE email = '".$email."'  ";
         //$que=mysqli_query($con, $fetch);
         //$row= mysqli_num_rows($que);

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
    


            

               

                $Q2 = "INSERT INTO user_det( email , fname , lname , contact_no , address , city , gender , date_of_birth) values ( '".$email."',  '".$fname."' , '".$lname."' , '".$contact."' , '".$address."' , '".$city."' , '".$gender."' , '".$var_dob."' ) " ;

                //mysqli_query($con, $Q2); 
                $stmt=$con->prepare($Q2);
                $stmt->execute();


                $Q3= "INSERT INTO user_role( user_id , role_id ) values (  (  SELECT  user_id FROM user_det WHERE email = '".$email."'  )  ,   (SELECT  role_id FROM role_det WHERE title = 'User') )  ";
    
                //mysqli_query($con, $Q3);  
                $stmt=$con->prepare($Q3);
                $stmt->execute();


                $Q4= "INSERT INTO user_login( user_id , user_password ) values (  (  SELECT  user_id FROM user_det WHERE email = '".$email."'  )  ,       SHA('".$password."')    )  ";
    
                //mysqli_query($con, $Q4);
                $stmt=$con->prepare($Q4);
                $stmt->execute();


               //mysqli_close($con);         

               $response = array(    'data' => "Successfully Registered!"    );
     
               echo json_encode($response);
               die;
     
  }

 if(isset($_POST["email"]) && isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["contact"]) && isset($_POST["address"]) && isset($_POST["city"]) && isset($_POST["password"])&& isset($_POST["var_spec"]))
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
                $var_spec = $_POST["var_spec"]; 
                


     $con = mysqli_connect("localhost", "root" , "" , "abc_lab" );

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
                

                $Q1 = "select * from user_det";
                $res=mysqli_query($con,$Q1);
                $val=mysqli_num_rows($res);
                $val=$val+1;

                while(strlen($val)<6){
                $val='0'.$val;
                }
               

                $Q2 = "INSERT INTO user_det( email , fname , lname , contact_no , address , city , gender , date_of_birth) values ( '".$email."',  '".$fname."' , '".$lname."' , '".$contact."' , '".$address."' , '".$city."' , '".$gender."' , '".$var_dob."' ) " ;

                mysqli_query($con, $Q2); 


                $Q3= "INSERT INTO user_role( user_id , role_id ) values (  (  SELECT  user_id FROM user_det WHERE email = '".$email."'  )  ,   (SELECT  role_id FROM role_det WHERE title = 'Doctor') )  ";
    
                mysqli_query($con, $Q3);  



                $Q4= "INSERT INTO user_login( user_id , user_password ) values (  (  SELECT  user_id FROM user_det WHERE email = '".$email."'  )  ,       SHA('".$password."')    )  ";
    
                mysqli_query($con, $Q4);


                $Q5= "INSERT INTO doctor_info(   user_id , specialization_id   )  VALUES (  ( SELECT user_id FROM user_det WHERE email='".$email."') ,  ( SELECT specialization_id FROM specialization_det WHERE specialization_type='".$var_spec."')  )  ;";
    
                mysqli_query($con, $Q5);



               mysqli_close($con);         

               $response = array(    'data' => "Doctor added!"    );
     
               echo json_encode($response);
               die;
     
  }


 if(isset($_POST["appointment_id"]) && isset($_POST["result"]) )
 {
                session_start();

                $email=$_SESSION['IDlog']['user_id'];
      

    		//something was posted
		$appointment_id = $_POST["appointment_id"];
		$result = $_POST["result"];

         $fetch = "  SELECT  appointment_ref_num FROM appointments WHERE appointment_ref_num = ".$appointment_id."  ";
         $instance = ConnectDb::getInstance();
         $con=$instance->getConnection();
         $stmt=$con->prepare($fetch);
         $stmt->execute();
         $row=$stmt->fetchColumn();
         if($row==0)
         {
              $response = array(    'data' => "Appointment Id does not exist"    );     
              echo json_encode($response);
              die; 
              
         }else{


              
         }



         $fetch = "  SELECT  appointment_ref_num FROM lab_report WHERE appointment_ref_num = ".$appointment_id."  ";
         $stmt=$con->prepare($fetch);
         $stmt->execute();
         $row=$stmt->fetchColumn();
         if($row==0)
         {

              
         }else{

              $response = array(    'data' => "Lab Report already created for this Appointment Id"    );     
              echo json_encode($response);
              die;
              
         }



    $query1="SELECT appointment_ref_num , patient_id,doctor_lname,test_type,appointment_date , price FROM appointments WHERE appointment_ref_num = ".$appointment_id." ";
    $stmt=$con->prepare($query1);
    $stmt->execute();
    $patid=$stmt->fetch(PDO::FETCH_ASSOC) ;




         $query1="SELECT user_id,fname,lname,date_of_birth,gender FROM user_det WHERE user_id = ".$patid['patient_id']." ";
         $stmt=$con->prepare($query1);
         $stmt->execute();
         $patient_det=$stmt->fetch(PDO::FETCH_ASSOC) ;


         $query1="SELECT bio_ref FROM test_type WHERE type_name = '".$patid['test_type']."' ";
         $stmt=$con->prepare($query1);
         $stmt->execute();
         $bioRef=$stmt->fetch(PDO::FETCH_ASSOC) ;


       $Q5= "INSERT INTO lab_report( appointment_ref_num , patient_id , patient_fname , patient_lname , patient_dob , technician_fname , technician_lname , doctor_lname , date_of_issue , test_type , test_result , test_ref , cost)  VALUES (  ".$patid['appointment_ref_num']." ,   ".$patid['patient_id'].", '".$patient_det['fname']."' , '".$patient_det['lname']."' , '".$patient_det['date_of_birth']."' , (  SELECT  fname FROM user_det WHERE user_id = ".$email."  ) , (  SELECT  lname FROM user_det WHERE user_id = ".$email."  )  , '".$patid['doctor_lname']."'  , CURDATE()  , '".$patid['test_type']."' , ".$_POST["result"]." , '".$bioRef['bio_ref']."' , '".$patid['price']."'  ) ";
    
                         $stmt=$con->prepare($Q5);
                         $stmt->execute();   


               $response = array(    'data' => "valid"    );
     
               echo json_encode($response);
               die;

 }


if(isset($_POST["first_x"]))
  {

                session_start();

                $var =$_POST["first_x"];



     $query1="SELECT * FROM lab_report WHERE lab_report_id = ".$var." ";
     $instance = ConnectDb::getInstance();
     $con=$instance->getConnection();	
     $stmt=$con->prepare($query1);
     $stmt->execute();
     $patient_det=$stmt->fetch(PDO::FETCH_ASSOC) ;


     $_SESSION['lab_rep']=$patient_det;



 $response = array(    'data' => 'valid' );
               echo json_encode($response);
               die;

}

?>