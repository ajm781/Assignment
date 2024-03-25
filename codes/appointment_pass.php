<?php

session_start();

    $connection = mysqli_connect("localhost", "root" , "" , "abc_lab" );



    $query1="SELECT user_id,fname,lname,date_of_birth,gender FROM user_det WHERE user_id=".$_SESSION['IDlog']['user_id']." ";
    $result= mysqli_query($connection, $query1);
    $patid=mysqli_fetch_row($result);

    $query1="SELECT email FROM user_det WHERE user_id=".$_SESSION['IDlog']['user_id']." ";
    $result= mysqli_query($connection, $query1);
    $patEmail=mysqli_fetch_row($result);

    $query1="SELECT specialization_det.specialization_type FROM user_det JOIN user_role ON user_det.user_id=user_role.user_id JOIN doctor_info ON doctor_info.user_id=user_role.user_id JOIN specialization_det ON specialization_det.specialization_id=doctor_info.specialization_id WHERE user_det.lname='".$_SESSION['aptStore'][1]."' ";
    $result= mysqli_query($connection, $query1);
    $spec_typ=mysqli_fetch_row($result);    


    $query3="INSERT INTO appointments(patient_id,doctor_lname,test_type,pat_queue_num,appointment_date,price) VALUES ($patid[0],'".$_SESSION['aptStore'][1]."','".$_SESSION['aptStore'][0]."' , ".$_SESSION['aptStore'][3].", '".$_SESSION['aptStore'][2]."' , ".$_SESSION['aptStore'][4][0].")";
    $result2= mysqli_query($connection, $query3);
    

   $query4="INSERT INTO sales(patient_fname , patient_lname , patient_dob , doctor_lname , doctor_specialization , test_type , appointment_date , price	) VALUES ('".$patid[1]."','".$patid[2]."','".$patid[3]."' , '".$_SESSION['aptStore'][1]."', '".$spec_typ[0]."' , '".$_SESSION['aptStore'][0]."' , '".$_SESSION['aptStore'][2]."' , ".$_SESSION['aptStore'][4][0].")";
    $result3= mysqli_query($connection, $query4);







    $query4="SELECT appointment_ref_num FROM appointments WHERE appointment_date='".$_SESSION['aptStore'][2]."' AND patient_id=".$_SESSION['IDlog']['user_id']." ";
    $result5= mysqli_query($connection, $query4);
    $appo_id=mysqli_fetch_row($result5);



    $query3="INSERT INTO test2(test_id) VALUES($appo_id[0])";
    $result2= mysqli_query($connection, $query3); 




$var_str="

Appointment Details:

Appointment Id :".$appo_id[0]."
Doctor :Dr. ".$_SESSION['aptStore'][1]."
Test Type :".$_SESSION['aptStore'][0]."
Appointment Date :".$_SESSION['aptStore'][2]."



Notice: 

Dr. ".$_SESSION['aptStore'][1]." will be arriving at 8:30 AM on ".$_SESSION['aptStore'][2]." .We kindly request all patients with appoints on that day to arrive before 8:30 AM, regardless of your queue number.As this will help us efficiently carry out our services and minimize any potential delays regarding your appointment.

Thankyou for choosing ABC Laboratories.



";


   mail($patEmail[0] , 'Appointment' , $var_str, 'From: ABC Laboratories' );    



if(isset($_SESSION['aptStore'])){
  unset($_SESSION['aptStore']);
}


die;
?>