
<?php
   session_start();
   
    if(session_destroy()) {
        // Redirecting To Login Page
        header("Location: login.php");
    }

   ?>

