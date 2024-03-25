<?php

session_start();

if(isset($_POST['jsVariable'])){
    $phpVariable=$_POST['jsVariable'];
    $records=array();


    $connection = mysqli_connect("localhost", "root" , "" , "abc_lab" );

    $query2=" SELECT user_det.lname , user_det.email FROM user_det  JOIN doctor_info ON user_det.user_id=doctor_info.user_id LEFT JOIN test_specialization ON doctor_info.specialization_id = test_specialization.specialization_id JOIN test_type ON test_specialization.type_id=test_type.type_id WHERE test_type.type_name='".$phpVariable."' "  ;
    $result = mysqli_query($connection, $query2);
    while($row=mysqli_fetch_array($result)){
      $records[]=$row; 
   } 


  
    $_SESSION["type_det"]=  $phpVariable;
    $response = array(    'data' => $records   );
    echo json_encode($response);
}

if(isset($_POST['var_selType'])){
    $var_queue=0;
    $connection = mysqli_connect("localhost", "root" , "" , "abc_lab" );
    $query1="SELECT type_price FROM test_type WHERE type_name='".$_POST['var_selType']."' ";
    $result= mysqli_query($connection, $query1);
    $price = mysqli_fetch_row($result);
    mysqli_free_result($result);

    //$query2="SELECT MAX(pat_queue_num) AS pat_queue_num FROM appointments WHERE appointment_date='".$_POST['var_date']."' ";
    //$query2="SELECT MAX(rel) AS rel FROM product WHERE rel>90000 ";
    $query2="SELECT pat_queue_num FROM appointments WHERE appointment_date='".$_POST['var_date']."' ";
    if($result2= mysqli_query($connection, $query2)){
        $var_queue=mysqli_num_rows($result2);
        mysqli_free_result($result2);
        //$var_queue=8700;
    }

    if($var_queue>0)
    {
       $query3="SELECT MAX(pat_queue_num) AS pat_queue_num FROM appointments WHERE appointment_date='".$_POST['var_date']."' ";
       $result3= mysqli_query($connection, $query3);
       $var_row=mysqli_fetch_row($result3);
       $var_queue=$var_row[0];
       mysqli_free_result($result3);
    }

     $query4="SELECT patient_id FROM appointments WHERE patient_id=".$_SESSION['IDlog']['user_id']." AND appointment_date='".$_POST['var_date']."' ";
     if($result4= mysqli_query($connection, $query4)){
        $var_usercheck=mysqli_num_rows($result4);
        mysqli_free_result($result4);
        //$var_queue=8700;
        if($var_usercheck>0)
        {
                 $response = array(    'data' => "exist"   );
                 echo json_encode($response);
                 die;
        }
     }
     
    $var_queue = $var_queue+1;

   
    
    
    
    $store = array($_POST['var_selType'] , $_POST['var_doc'] , $_POST['var_date'] , $var_queue , $price );
    $_SESSION['aptStore']=$store;
    $response = array(    'data' => $_SESSION['aptStore'][4]   );
    echo json_encode($response);
}

if(isset($_POST['payment'])){
    
    $response = array(    'data' => $_POST['payment']   );
    echo json_encode($response);
}


die;

?>