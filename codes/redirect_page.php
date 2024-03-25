<?php

session_start();
$var_role=$_SESSION['IDlog'];

if($var_role['user_role']==1)
{
  header("Location: login.php");
}

if($var_role['user_role']==2)
{
  header("Location: technicial_patients.php");
}

if($var_role['user_role']==3)
{
  header("Location:login.php ");
}

?>