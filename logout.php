<?php
   session_start();
   
   if(session_destroy()) {
      header("Location: pat_home.html");
   }
?>
